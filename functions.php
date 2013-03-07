<?php

define('DIR', get_bloginfo( 'template_directory' ));

if(!defined('URL')){
	define('URL', get_option('home'));
}


/* eye catch */
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(960, 640, true);

/* delete p tag */
	remove_filter('the_excerpt', 'wpautop');

/* js files */
	function addScripts(){
		if(!is_admin()){
			wp_enqueue_script('mootools', '//ajax.googleapis.com/ajax/libs/mootools/1.4.5/mootools-yui-compressed.js', array(), '1.4.5');
			wp_enqueue_script('naika', DIR . '/javascripts/script.js');
		}
	}
	add_action('wp_print_scripts', 'addScripts');


/* img_tag helper */
	function img_tag($file, $alt = '', $opt = array()){
		$path = DIR . '/images/' . $file;
		if(!empty($alt)){
			$opt['alt'] = $alt;
		}
		$etc = '';
		foreach($opt as $key => $value){
			$etc .= ' ' . $key . '="' . $value . '" ';
		}

		$path = sprintf('<img src="%s" %s>',
			$path,
			$etc
		);

		echo $path;
	}

// css_tag  helper
	function css_tag($file){
		echo sprintf('<link rel="stylesheet" href="%s" >',
			DIR . '/stylesheets/' . $file
		);
	}

