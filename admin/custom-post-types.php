<?php

/**
 * Post Types
 * Simplifies the way we add custom post types. For bigger project please use
 * @elliotcondon's Advanced Custom Fields - http://www.advancedcustomfields.com
 */
class PostType
{
    /**
     * The name of the post type.
     * @var string
     */
    public $post_type_name;

    /**
     * A list of user-specific options for the post type.
     * @var array
     */
    public $post_type_args;

    /**
     * Sets default values, registers the passed post type, and
     * listens for when the post is saved.
     *
     * @param string $name The name of the desired post type.
     * @param array @post_type_args Override the options.
     */
    function __construct($name, $post_type_args = [])
    {
    	if (!isset($_SESSION['taxonomy_data']))
    	{
    		$_SESSION['taxonomy_data'] = [];
    	}

    	$this->post_type_name = strtolower($name);
    	$this->post_type_args = (array) $post_type_args;

        // First step, register that new post type
    	$this->init([&$this, 'register_post_type']);
    	$this->save_post();
    }

    /**
     * Helper method, that attaches a passed function to the 'init' WP action
     * @param function $callback Passed callback function.
     */
    function init($callback)
    {
    	add_action('init', $callback);
    }

    /**
     * Helper method, that attaches a passed function to the 'admin_init' WP action
     * @param function $callback Passed callback function.
     */
    function admin_init($callback)
    {
    	add_action('admin_init', $callback);
    }

    /**
     * Registers a new post type in the WP database.
     */
    function register_post_type()
    {
    	$n = ucwords($this->post_type_name);

    	$args = [
    		'label' => $n . 's',
    		'singular_name' => $n,
    		'public' => true,
    		'publicly_queryable' => true,
    		'query_var' => true,
            //'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
    		'rewrite' => true,
    		'capability_type' => 'post',
    		'hierarchical' => false,
    		'menu_position' => null,
    		'supports' => ['title', 'editor', 'thumbnail'],
    		'has_archive' => true
    	];

        // Take user provided options, and override the defaults.
    	$args = array_merge($args, $this->post_type_args);

    	register_post_type($this->post_type_name, $args);
    }


    /**
     * Registers a new taxonomy, associated with the instantiated post type.
     *
     * @param string $taxonomy_name The name of the desired taxonomy
     * @param string $plural The plural form of the taxonomy name. (Optional)
     * @param array $options A list of overrides
     */
    function add_taxonomy($taxonomy_name, $plural = '', $options = [])
    {
        // Create local reference so we can pass it to the init cb.
    	$post_type_name = $this->post_type_name;

        // If no plural form of the taxonomy was provided, do a crappy fix.
    	if (empty($plural))
    	{
    		$plural = $taxonomy_name . 's';
    	}

        // Taxonomies need to be lowercase, but displaying them will look better this way...
    	$taxonomy_name = ucwords($taxonomy_name);

        // At WordPress' init, register the taxonomy
    	$this->init(function() use($taxonomy_name, $plural, $post_type_name, $options)
    	{
			// Override defaults with user provided options
    		$options = array_merge([
				'hierarchical' => false,
				'label' => $taxonomy_name,
				'singular_label' => $plural,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => ['slug' => strtolower($taxonomy_name)]
			], $options);

			// name of taxonomy, associated post type, options
    		register_taxonomy(strtolower($taxonomy_name), $post_type_name, $options);
    	});
    }

    /**
     * Creates a new custom meta box in the New 'post_type' page.
     *
     * @param string $title
     * @param array $form_fields Associated array that contains the label of the input, and the desired input type. 'Title' => 'text'
     */
    function add_meta_box($title, $form_fields = [])
    {
    	$post_type_name = $this->post_type_name;

        // end update_edit_form
    	add_action('post_edit_form_tag', function()
    	{
    		echo ' enctype="multipart/form-data"';
    	});

        // At WordPress' admin_init action, add any applicable metaboxes.
    	$this->admin_init(function() use($title, $form_fields, $post_type_name)
    	{
    		add_meta_box(
            	strtolower(str_replace(' ', '_', $title)), // id
            	$title, // title
	            function($post, $data)
	            { // function that displays the form fields
	            	global $post;

	            	wp_nonce_field(plugin_basename(__FILE__), 'jw_nonce');

	                // List of all the specified form fields
	            	$inputs = $data['args'][0];

	                // Get the saved field values
	            	$meta = get_post_custom($post->ID);

	                // For each form field specified, we need to create the necessary markup
	                // $name = Label, $type = the type of input to create
	            	foreach ($inputs as $name => $type)
	            	{
	                    #'Happiness Info' in 'Snippet Info' box becomes
	                    # snippet_info_happiness_level
	            		$id_name = $data['id'] . '_' . strtolower(str_replace(' ', '_', $name));

	            		if (is_array($inputs[$name])) {
	                        // then it must be a select or file upload
	                        // $inputs[$name][0] = type of input

	            			if (strtolower($inputs[$name][0]) === 'select')
	            			{
	                            // filter through them, and create options
	            				$select = "<select name=\"$id_name\" class=\"widefat\">";
	            				foreach ($inputs[$name][1] as $option)
	            				{
	                                // if what's stored in the db is equal to the
	                                // current value in the foreach, that should
	                                // be the selected one
	            					$set_selected = '';

	            					if (isset($meta[$id_name]) && $meta[$id_name][0] == $option)
	            					{
	            						$set_selected = "selected=\"selected\"";
	            					}

	            					$select .= "<option value=\"$option\" $set_selected>$option</option>";
	            				}
	            				$select .= "</select>";
	            				array_push($_SESSION['taxonomy_data'], $id_name);
	            			}
	            		}

	                    // Attempt to set the value of the input, based on what's saved in the db.
	            		$value = isset($meta[$id_name][0]) ? $meta[$id_name][0] : '';

	            		$checked = ($type == 'checkbox' && !empty($value) ? 'checked' : '');

	                    // Sorta sloppy. I need a way to access all these form fields later on.
	                    // I had trouble finding an easy way to pass these values around, so I'm
	                    // storing it in a session. Fix eventually.
	            		array_push($_SESSION['taxonomy_data'], $id_name);

	                    // TODO - Add the other input types.
	            		$lookup = [
	            			"text" => "<input type=\"text\" name=\"$id_name\" value=\"$value\" class=\"widefat\">",
	            			"textarea" => "<textarea name=\"$id_name\" class=\"widefat\" rows=\"10\">$value</textarea>",
	            			"checkbox" => "<input type=\"checkbox\" name=\"$id_name\" value=\"$name\" $checked>",
	            			"select" => isset($select) ? $select : '',
	            			"file" => "<input type=\"file\" name=\"$id_name\" id=\"$id_name\">"
	            		];
            			?>

            			<p>
            				<label><?php echo ucwords($name) . ':'; ?></label>
            				<?php echo $lookup[is_array($type) ? $type[0] : $type]; ?>
            			</p>

            			<p>
            				<?php
                            // If a file was uploaded, display it below the input.
            				$file = get_post_meta($post->ID, $id_name, true);
            				if ($type === 'file')
            				{
                                // display the image
            					$file = get_post_meta($post->ID, $id_name, true);

            					$file_type = wp_check_filetype($file);
            					$image_types = ['jpeg', 'jpg', 'bmp', 'gif', 'png'];
            					if (isset($file))
            					{
            						if (in_array($file_type['ext'], $image_types))
            						{
            							echo "<img src=\"$file\" alt=\" style=\"max-width: 400px;\">";
            						}
            						else
            						{
            							echo "<a href=\"$file\">$file</a>";
            						}
            					}
            				}
            				?>
            			</p>
            		<?php
	            	}
	            },
           		$post_type_name, // associated post type
            	'normal', // location/context. normal, side, etc
            	'default', // priority level
            	[$form_fields] // optional passed arguments
            ); // end add_meta_box
		});
	}

    /**
     * When a post saved/updated in the database, this methods updates the meta box params in the db as well.
     */
    function save_post()
    {
    	add_action('save_post', function()
    	{
            // Only do the following if we physically submit the form,
            // and now when autosave occurs.
    		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return; }

    		global $post;

    		if ($_POST && !wp_verify_nonce($_POST['jw_nonce'], plugin_basename(__FILE__)))
    		{
    			return;
    		}

            // Get all the form fields that were saved in the session,
            // and update their values in the db.
    		if (isset($_SESSION['taxonomy_data']))
    		{
    			foreach ($_SESSION['taxonomy_data'] as $form_name)
    			{
    				if (!empty($_FILES[$form_name]) )
    				{
    					if (!empty($_FILES[$form_name]['tmp_name']))
    					{
    						$upload = wp_upload_bits(
    							$_FILES[$form_name]['name'],
    							null,
    							file_get_contents($_FILES[$form_name]['tmp_name'])
    						);

    						if (isset($upload['error']) && $upload['error'] != 0)
    						{
    							wp_die('There was an error uploading your file. The error is: ' . $upload['error']);
    						}
    						else
    						{
    							update_post_meta($post->ID, $form_name, $upload['url']);
    						}
    					}
    				}
    				else
    				{
                        // Make better. Have to do this, because I can't figure
                        // out a better way to deal with checkboxes. If deselected,
                        // they won't be represented here, but I still need to
                        // update the value to false to blank in the table. Hmm...
    					if (!isset($_POST[$form_name]))
    					{
    						$_POST[$form_name] = '';
    					}

    					if (isset($post->ID))
    					{
    						update_post_meta($post->ID, $form_name, $_POST[$form_name]);
    					}
    				}
    			}

    			$_SESSION['taxonomy_data'] = [];
    		}
    	});
	}
}

/** Example usage

$book = new PostType('book');
$book->add_taxonomy('Difficulty');
$book->add_taxonomy('Language');
$book->add_meta_box('Information', [
	'Associated URL' => 'text',
	'GitHub Link' => 'text',
	'Additional Notes' => 'textarea',
	'Original Snippet' => 'checkbox',
	'Snippet Image' => 'file'
]);

*/
