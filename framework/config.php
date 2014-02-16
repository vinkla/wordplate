<?php

return array(
	'template_dir' => get_template_directory(),
	'template_uri' => get_template_directory_uri(),

	'footer_text' => 'Thank you for creating with <a href="http://vinkla.com">Vincent Klaiber</a>',

	'login_image_path' => get_template_directory().'/images/admin-login-logo.png',
	'login_header_url' => get_site_url(),
	'login_error_message' => 'Whoops! Looks like you missed something there. Have another go.',

	'tinymce_blockformats' => array('p', 'h2', 'h3'),
	'tinymce_disabled' => array(
		'strikethrough',
		'underline',
		'forecolor',
		'justifyfull'
	)
);
