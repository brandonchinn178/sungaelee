<?php

add_theme_support('automatic-feed-links');

register_nav_menus(array(
	'internal' => 'Internal Links',
	'external' => 'External Links',
));

function page_title() {
	global $page, $paged;

	wp_title('~', true, 'right');

	bloginfo('name');

	$desc = get_bloginfo('description', 'display');
	if ($desc && (is_home() || is_front_page()))
		echo " ~ $desc";

	if ($paged >= 2 || $page >= 2)
		echo ' ~ ' . sprintf('Page %s', max($paged, $page));
}

/* Changes bloginfo('stylesheet_directory') to be TEMPLATE_ROOT/css */
function get_new_stylesheet_directory($stylesheet_dir_uri) {
	return $stylesheet_dir_uri . "/css";
}
add_filter('stylesheet_directory_uri', 'get_new_stylesheet_directory');

/* Returns the URI to the js/ directory */
function get_scripts_directory_uri() {
	return get_template_directory_uri().'/js';
}

/* Adds any necessary tags to the <head> section */
function add_to_head() {
	return;
}
add_action('wp_head', 'add_to_head');

?>