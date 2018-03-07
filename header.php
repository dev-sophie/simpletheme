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
				<nav class="row navbar navbar-expand-sm align-items-start">
					<?php wp_nav_menu(
						array(
							'theme_location' => 'top_menu',
							'menu_id'        => 'top-menu',
							'container'      => false,
							'depth'          => 2,
							'menu_class'	 => 'top-menu navbar-nav mr-auto col-8 col-sm-5',
							'walker'         => new Bootstrap_NavWalker(),
							'fallback_cb'    => 'Bootstrap_NavWalker::fallback'
						)
					); ?>
					<div class="language-icons col-4 col-sm-2 text-right text-sm-center">Language Icons</div>
					<div class="social-media-icons col-12 col-sm-5 text-center text-sm-right">Social Media Icons</div>
				</nav>				
			</div>
		</section>
		<section class="logo jumbotron text-center">
			<div class="container-fluid">
				<h1 class="jumbotron-heading">
					<a href="home">Logo</a>
				</h1>
				<p class="lead text-muted">Description</p>
			</div>
		</section>
		<section class="menu-bar navbar-light bg-light">
			<div class="container">
				<nav class="main-menu navbar navbar-expand-sm">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarContent">
						<?php wp_nav_menu(
						array(
							'theme_location' => 'main_menu',
							'menu_id'        => 'main-menu',
							'container'      => false,
							'depth'          => 2,
							'menu_class'	 => 'main-menu navbar-nav mx-auto w-100 justify-content-center',
							'walker'         => new Bootstrap_NavWalker(),
							'fallback_cb'    => 'Bootstrap_NavWalker::fallback'
						)
					); ?>
					</div>
			  </div>
			</nav>
			</div>
		</section>
	</header>