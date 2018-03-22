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

	// Text typing effect
	wp_enqueue_script( 'typewriter', get_template_directory_uri() . '/assets/js/typewriter.js', array(), '20171214' );
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );

// Load Custom-NavWalker extension to use Bootstrap menu style and a font awesome svg icon for each menu item
require get_template_directory() . '/inc/custom-frontend-navwalker.php';
require get_template_directory() . '/inc/custom-backend-navwalker.php';

// Main configuration
function configure(){
	// Register menus
	register_nav_menus(
		array(
			'top_menu_left'	  => 'About Menu',
			'top_menu_middle' => 'Languages Menu',
			'top_menu_right'  => 'Social Menu',
			'main_menu'       => 'Main Menu',
			'footer_menu'     => 'Footer Menu'
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

/***********************************************************************************************
 Menu Custom Fields
***********************************************************************************************/
// Add custom fields to $item nav object in order to be used in custom Walker
function smi_add_custom_menu_fields( $menu_item ) {

	$menu_item->icon = get_post_meta( $menu_item->ID, '_menu_item_icon', true );
	$menu_item->showOnlyIconOnAll = get_post_meta( $menu_item->ID, '_menu_item_showOnlyIconOnAll', true );
	$menu_item->showOnlyIconOnSmall = get_post_meta( $menu_item->ID, '_menu_item_showOnlyIconOnSmall', true );
	return $menu_item;

}
// add custom menu fields to menu
add_filter( 'wp_setup_nav_menu_item', 'smi_add_custom_menu_fields' );

// Save menu custom fields
function smi_update_custom_menu_fields( $menu_id, $menu_item_db_id, $args ) {

	// Check if element is properly sent
	if ( is_array( $_REQUEST['menu-item-icon']) ) {
		$icon_value = $_REQUEST['menu-item-icon'][$menu_item_db_id];
		update_post_meta( $menu_item_db_id, '_menu_item_icon', $icon_value );
	}

	if ( is_array( $_REQUEST['menu-item-showOnlyIconOnAll']) ) {
		$showOnlyIconOnAll_value = $_REQUEST['menu-item-showOnlyIconOnAll'][$menu_item_db_id];
		update_post_meta( $menu_item_db_id, '_menu_item_showOnlyIconOnAll', $showOnlyIconOnAll_value );
	}

	if ( is_array( $_REQUEST['menu-item-showOnlyIconOnSmall']) ) {
		$showOnlyIconOnSmall_value = $_REQUEST['menu-item-showOnlyIconOnSmall'][$menu_item_db_id];
		update_post_meta( $menu_item_db_id, '_menu_item_showOnlyIconOnSmall', $showOnlyIconOnSmall_value );
	}

}
// save menu custom fields
add_action( 'wp_update_nav_menu_item', 'smi_update_custom_menu_fields' , 10, 3 );

// Define new Walker edit
function smi_edit_walker( $walker, $menu_id ) {

	return 'Custom_Backend_NavWalker';

}
// edit menu walker
add_filter( 'wp_edit_nav_menu_walker', 'smi_edit_walker', 10, 2 );

/***********************************************************************************************
 Settings Custom Fields
***********************************************************************************************/
// Register and define the settings
add_action('admin_init', 'define_settings_fields');

function define_settings_fields() {
	register_setting(
		'general',                  // settings page
		'custom_general_settings'   // option name
	);
	
	add_settings_field(
		'typewriter_pretext',     			// id
		'TypeWriter Pre-Text',    			// setting title
		'display_custom_general_setting_typewriter_pretext',  // display callback
		'general',                			// settings page
		'default'                 			// settings section
	);

	add_settings_field(
		'typewriter_static_text',       	// id
		'TypeWriter Static Text',      		// setting title
		'display_custom_general_setting_typewriter_static_text',  // display callback
		'general',                			// settings page
		'default'                 			// settings section
	);
		
	add_settings_field(
		'typewriter_text',       			// id
		'TypeWriter Text',      			// setting title
		'display_custom_general_setting_typewriter_text',  // display callback
		'general',                			// settings page
		'default'                 			// settings section
	);

}

// Display and fill the form field
function display_custom_general_setting_typewriter_pretext() {
	// get option 'typewriter_pretext' value from the database
	$options = get_option( 'custom_general_settings' );
	$value = $options['typewriter_pretext'];
	
	// echo the field
	?>
	<input id='typewriter_pretext' name='custom_general_settings[typewriter_pretext]'
	 type='text' value='<?php echo esc_attr( $value ); ?>' /> Introduce yourself, this will be displayed before the site title.
	<?php
}

// Display and fill the form field
function display_custom_general_setting_typewriter_static_text() {
	// get option 'typewriter_static_text' value from the database
	$options = get_option( 'custom_general_settings' );
	$value = $options['typewriter_static_text'];
	
	// echo the field
	?>
	<input id='typewriter_static_text' name='custom_general_settings[typewriter_static_text]'
	 type='text' value='<?php echo esc_attr( $value ); ?>' /> This is a static text right in front of the typewriter text.
	<?php
}

// Display and fill the form field
function display_custom_general_setting_typewriter_text() {
	// get option 'typewriter_text' value from the database
	$options = get_option( 'custom_general_settings' );
	$value = $options['typewriter_text'];
	
	// echo the field
	?>
	<input id='typewriter_text' name='custom_general_settings[typewriter_text]'
	 type='text' value='<?php echo esc_attr( $value ); ?>' /> This is the typewriter text itsel, please add in the following format: "text1", "text2", "text3" etc.
	<?php
}
