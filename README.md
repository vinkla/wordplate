A WordPress theming boilerplate with snippets used in almost every WP project.

**Custom Post Type Usage**
```
$book = new CustomPostType('book', [
	'menu_icon' => 'dashicons-location-alt',
	'supports' => ['title', 'editor'],
]);
$book->add_taxonomy('Language');
```
