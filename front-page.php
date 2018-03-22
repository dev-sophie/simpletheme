<?php get_header( 'home' ); ?>

<?php $backgroundImage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>

<main>
	<div class="^jumbotron parallax parallax-window" data-parallax="scroll" data-image-src="<?php echo $backgroundImage[0]; ?>">
		<p class="lead"><?php echo esc_attr( get_option( 'custom_general_settings' )['typewriter_pretext'] ); ?></p>
		<h1 class="display-3 text-uppercase"><strong><?php echo esc_attr( get_option( 'blogname' ) ); ?></strong></h1>
		<p class="lead"><?php echo esc_attr( get_option( 'custom_general_settings' )['typewriter_static_text'] ); ?>
			<strong class="typewrite" data-period="2000" data-type='[ <?php echo esc_attr( get_option( 'custom_general_settings' )['typewriter_text'] ); ?> ]'>
				<span class="wrap"></span>
			</strong>
		</p>
	</div>
</main>

<?php get_footer( 'home' ); ?>
