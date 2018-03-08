<?php
// Include style sheet and script files
function load_scripts(){
	// Load jQuery and Bootstrap JavaScript
	wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array( 'jquery' ), '4.0.0', true );

	// Load theme styles
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap-custom.css', array(), '4.0.0', 'all' );
	wp_enqueue_style( 'simpletheme-style', get_stylesheet_uri() );

	// Font Awesome
	wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/releases/v5.0.8/js/all.js', array(), '5.0.8' );
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

// Load Bootstrap-NavWalker extension to use Bootstrap menu style
require get_template_directory() . '/inc/bootstrap-navwalker.php';

// Main configuration
function configure(){
	// Register menus
	register_nav_menus(
		array(
			'top_menu'	  => 'Top Menu',
			'main_menu'   => 'Main Menu',
			'footer_menu' => 'Footer Menu'
		)
	);

	// Add theme support
	$args = array(
		'height' => 225,
		'width'  => 1920
	);
	add_theme_support( 'custom-header', $args );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array( 'image', 'video', 'quote' ) );
}
add_action( 'after_setup_theme', 'configure', 0 );

// Register sidebars
function create_sidebars(){
	register_sidebar(
		array(
			'name'			=> 'Archive Sidebar',
			'id' 			=> 'sidebar-archive',
			'description'   => 'This is the Archive Sidebar. You can add your widgets here.',
			'before_widget' => '<section class="widget">',
			'after_widget' 	=> '</section>',
			'before_title' 	=> '<h2 class="widget_title">',
			'after_tile' 	=> '</h2>'
		)
	);
}
add_action( 'widgets_init', 'create_sidebars' );



// // ~~~~~~~~~~~~~~~~~~~~~ Add Image Title - Crunchify.com Tips ~~~~~~~~~~~~~~~~~~~~~~~~
// function crunchify_add_image_title( $html, $id ) {
// 	$crunchify_attach = get_post($id);
// 	if (strpos($html, "title=")) {
//     		return $html;
//     	}
//     	else {
// 		$crunchifyTitle = esc_attr($crunchify_attach->post_title);
// 		return str_replace('<img', '<img title="' . $crunchifyTitle . '" '  , $html);      
// 	}
// }
// add_filter( 'media_send_to_editor', 'crunchify_add_image_title', 15, 2 );
 
// function crunchify_add_image_title_gallery( $content, $id ) {
// 	$crunchify_title = get_the_title($id);
// 	return str_replace('<a', '<a title="' . esc_attr($crunchify_title) . '" ', $content);
// }	
// add_filter('wp_get_attachment_link', 'crunchify_add_image_title_gallery', 10, 4);


// function addImageAttributes($content)
// {
//   $content  = mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8");
//   $document = new \DOMDocument();
//   libxml_use_internal_errors(true);
//   $document->loadHTML(utf8_decode($content));
//   $images = $document->getElementsByTagName('img');
//   foreach ($images as $image) {
//       $image->setAttribute('title', 'tesst');
//   }
//   return $document->saveHTML();
// }
// add_filter( 'the_content', 'addImageAttributes');