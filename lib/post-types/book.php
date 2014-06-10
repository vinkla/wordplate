<?php

/**
 * Example custom post type. For further information how to setup a custom
 * post type, please read README.
 */
$books = new CPT('book');

$books->register_taxonomy('genre');

$books->columns(array(
	'cb' => '<input type="checkbox" />',
	'title' => __('Title'),
	'genres' => __('Genres'),
	'price' => __('Price'),
	'rating' => __('Rating'),
	'date' => __('Date')
));

$books->populate_column('price', function($column, $post)
{
	echo function_exists('get_field') ? '£' . get_field('price') : 'N/A';
});

$books->populate_column('rating', function($column, $post)
{
	echo function_exists('get_field') ? get_field('rating') . '/5' : 'N/A';
});

$books->sortable(array(
	'price' => array('price', true),
	'rating' => array('rating', true)
));

$books->menu_icon('dashicons-book-alt');
