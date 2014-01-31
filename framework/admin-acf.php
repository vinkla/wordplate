<?php

/**
 * Add a simpler editor toolbar to ACF.
 *
 * @param string $toolbars
 * @return void
 */
add_filter('acf/fields/wysiwyg/toolbars', function($toolbars)
{
	$toolbars['Simple' ] = [];
	$toolbars['Simple' ][1] = ['bold', 'italic', 'underline'];

	if (($key = array_search('code' , $toolbars['Full' ][2])) !== false)
	{
	    unset($toolbars['Full' ][2][$key]);
	}

	return $toolbars;
});
