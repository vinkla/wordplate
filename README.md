WordPress boilerplate
=====================

A [WordPress](https://github.com/WordPress/WordPress) theming boilerplate with snippets used in almost every WordPress project. This project is trying to simplify the way we're setting up a new WordPress themes. [Don't repeat yourself (DRY)](http://en.wikipedia.org/wiki/Don't_repeat_yourself).

This boilerplate requires PHP 5.4+ and is built for the latest version of [WordPress](https://github.com/WordPress/WordPress).

### Usage
This is an example of setting up a new custom post type feed. With a simple way to add custom Taxonomies.

```php
$book = new CustomPostType('book', [
	'menu_icon' => 'dashicons-book',
	'supports' => ['title', 'editor'],
]);

// Super simple taxonomies
$book->add_taxonomy('Language', 'Languages');
```

###### To-do
- Add a simple way to add meta boxes to pages and posts.
- Move all configuration to init.php in admin framework.
- Test if [remove_menu_page()](http://codex.wordpress.org/Function_Reference/remove_menu_page) is less buggy in new versions of WordPress.
- Write down coding and naming conventions.

