<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Sophie Senftleben</title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header>
		<section class="top-bar border-bottom navbar-light bg-light">
			<div class="container">
				<nav class="row navbar navbar-expand-sm align-items-start align-items-sm-center" id="top-navbar">
					<?php wp_nav_menu(
						array(
							'theme_location' => 'top_menu_left',
							'menu_id'        => 'about-menu',
							'container'      => false,
							'depth'          => 2,
							'menu_class'	 => 'top-menu navbar-nav mr-auto col-8 col-sm-5 navbar-expand justify-content-start order-2 order-sm-1',
							'walker'         => new Custom_Frontend_NavWalker(),
							'fallback_cb'    => 'Custom_Frontend_NavWalker::fallback'
						)
					); ?>
					<?php wp_nav_menu(
						array(
							'theme_location' => 'top_menu_middle',
							'menu_id'        => 'languages-menu',
							'container'      => false,
							'depth'          => 2,
							'menu_class'	 => 'language-icons navbar-nav col-4 col-sm-2 navbar-expand justify-content-end justify-content-sm-center pr-0 order-3 order-sm-2',
							'walker'         => new Custom_Frontend_NavWalker(),
							'fallback_cb'    => 'Custom_Frontend_NavWalker::fallback'
						)
					); ?>
					<?php wp_nav_menu(
						array(
							'theme_location' => 'top_menu_right',
							'menu_id'        => 'social-menu',
							'container'      => false,
							'depth'          => 2,
							'menu_class'	 => 'social-media-icons navbar-nav col-12 col-sm-5 navbar-expand order-1 order-sm-3 justify-content-between justify-content-sm-end pr-0',
							'walker'         => new Custom_Frontend_NavWalker(),
							'fallback_cb'    => 'Custom_Frontend_NavWalker::fallback'
						)
					); ?>
					<div class="dropdown-divider d-sm-none d-block"></div>
				</nav>
			</div>
		</section>
	</header>
	