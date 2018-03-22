<?php get_header( 'home' ); ?>

<main>
	<section class="container-fluid">
		<div id="front-page-content">
			<div class="row mx-auto col-12 text-center">
				<span class="lead"><?php echo esc_attr( get_option( 'custom_general_settings' )['typewriter_pretext'] ); ?></span>
			</div>
			<div class="row">
				<h1><?php echo esc_attr( get_option( 'blogname' ) ); ?></h1>
			</div>
			<div class="row">
				<h4><?php echo esc_attr( get_option( 'custom_general_settings' )['typewriter_static_text'] ); ?>
					<strong class="typewrite" data-period="2000" data-type='[ <?php echo esc_attr( get_option( 'custom_general_settings' )['typewriter_text'] ); ?> ]'>
						<span class="wrap"></span>
					</strong>
				</h4>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
