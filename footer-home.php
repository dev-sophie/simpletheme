	<footer>
		<section class="bottom-bar border-top navbar-light bg-light">
			<div class="container">
				<div class="row align-items-center">
					<span class="copyright navbar-text col-12 col-sm-7 order-2 order-sm-1 text-center text-sm-left">Copyright © 2018 Sophie Senftleben</span>
					<div class="navbar navbar-expand col-sm-5 order-1 order-sm-2">
						<?php wp_nav_menu(
							array(
								'theme_location' => 'footer_menu',
								'menu_id'        => 'footer-menu',
								'container'      => false,
								'depth'          => 2,
								'menu_class'	 => 'footer-menu navbar-nav mx-auto mr-sm-0',
								'walker'         => new Custom_Frontend_NavWalker(),
								'fallback_cb'    => 'Custom_Frontend_NavWalker::fallback'
							)
						); ?>
					</div>
				</div>
			</div>
		</section>
	</footer>

	<?php wp_footer() ?>

</body>
</html>
