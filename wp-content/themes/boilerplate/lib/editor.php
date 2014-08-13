<?php

/**
 * Add a simpler editor toolbar to ACF.
 *
 * @param string $toolbars
 * @return void
 */
add_filter('acf/fields/wysiwyg/toolbars', function($toolbars)
{
	$toolbars['Simple'] = array();
	$toolbars['Simple'][1] = array('bold', 'italic', 'underline');

	if (!array_search('code' , $toolbars['Full'][2]))
	{
		unset($toolbars['Full'][2][$key]);
	}

	return $toolbars;
});

/**
 * Force perfect JPG images.
 *
 * @return integer
 */
add_filter('jpeg_quality', function() use ($config)
{
	return isset($config['jpeg_quality']) ? $config['jpeg_quality'] : 100;
});

/**
 * Filters that allow shortcodes in text widgets.
 */
add_filter('widget_text', 'shortcode_unautop');
add_filter('widget_text', 'do_shortcode');

/**
 * Force slug to update on save.
 *
 * @return array
 */
add_filter('wp_insert_post_data', function($data, $postarr)
{
	if (!in_array($data['post_status'], array('draft', 'pending', 'auto-draft')))
	{
		$title = remove_accents($data['post_title']);
			$title = sanitize_title($title);
			$data['post_name'] = wp_unique_post_slug(
				$title,
				$postarr['ID'],
				$data['post_status'],
				$data['post_type'],
				$data['post_parent']
			);
	}

	return $data;
}, 99, 2);

/**
 * Modifying TinyMCE editor to remove unused items.
 *
 * @return array
 */
add_filter('tiny_mce_before_init', function($init) use ($config)
{
	// Add block format elements you want to show in dropdown
	$init['block_formats'] = implode(';', $config['tinymce_blockformats']);

	// Disable buttons for the two toolbars
	$toolbar1 = explode(',', $init['toolbar1']);
	$buttons1 = array_diff($toolbar1, $config['tinymce_disabled']);

	$toolbar2 = explode(',', $init['toolbar2']);
	$buttons2 = array_diff($toolbar2, $config['tinymce_disabled']);

	$init['toolbar1'] = implode(',', $buttons1);
	$init['toolbar2'] = implode(',', $buttons2);

	// Disable custom format on copy paste (useful when clients copy from Ms Word)
	$init['extended_valid_elements'] = 'span[!class]';
	$init['paste_auto_cleanup_on_paste'] = true;
	$init['paste_strip_class_attributes'] = "all";
	$init['paste_remove_styles'] = true;

	return $init;
});

/**
 * Remove Microsoft Word formatting on save for TinyMCE
 *
 * @return var
 */
add_filter('content_save_pre', function($content)
{
	return preg_replace( '/<!--\[if gte mso.*?-->/ms', '', $content );
});
