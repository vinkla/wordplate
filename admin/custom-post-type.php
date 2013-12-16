<?php

/**
 * Custom Post Type: Simplifies the way we add custom post types.
 */
class CustomPostType
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
    public $options;

    /**
     * Sets default values, registers the passed post type, and
     * listens for when the post is saved.
     *
     * @return void
     */
    public function __construct($name, $options = [])
    {
    	$this->post_type_name = strtolower($name);
    	$this->options = (array) $options;

        // First step, register that new post type
    	add_action('init', [&$this, 'register_post_type']);
    }

    /**
     * Registers a new post type in the WP database.
     * Find more dashboard icons: http://melchoyce.github.io/dashicons
     */
    public function register_post_type()
    {
    	$n = ucwords($this->post_type_name);

    	$args = [
    		'label' => $n . 's',
    		'singular_name' => $n,
    		'public' => true,
    		'publicly_queryable' => true,
    		'query_var' => true,
            'menu_icon' => 'dashicons-location-alt',
    		'rewrite' => true,
    		'capability_type' => 'post',
    		'hierarchical' => false,
    		'menu_position' => 5,
    		'supports' => ['title', 'editor', 'thumbnail'],
    		'has_archive' => true
    	];

        // Take user provided options, and override the defaults.
    	$args = array_merge($args, $this->options);

    	register_post_type($this->post_type_name, $args);
    }

    /**
     * Registers a new taxonomy, associated with the instantiated post type.
     *
     * @return void
     */
    public function add_taxonomy($name, $plural = '', $options = [])
    {
        // Create local reference so we can pass it to the init cb.
    	$post_type_name = $this->post_type_name;

        // If no plural form of the taxonomy was provided, do a crappy fix.
    	if (empty($plural)) { $plural = $name . 's'; }

        // Taxonomies need to be lowercase, but displaying them will look better this way...
    	$name = ucwords($name);

    	// Taxonomy slug converted to lowercase
    	$slug = strtolower($name);

        // At WordPress' init, register the taxonomy
    	add_action('init', function() use($name, $plural, $post_type_name, $options)
    	{
			// Override defaults with user provided options
    		$options = array_merge([
				'hierarchical' => false,
				'label' => $name,
				'singular_label' => $plural,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => ['slug' => $slug]
			], $options);

			// name of taxonomy, associated post type, options
    		register_taxonomy($slug, $post_type_name, $options);
    	});
    }
}
