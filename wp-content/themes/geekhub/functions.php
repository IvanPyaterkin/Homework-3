<?php

remove_filter('the_content', 'wpautop');


if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	add_theme_support('menus');
}

?>