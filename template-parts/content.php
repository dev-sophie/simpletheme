<article <?php post_class(); ?>>
	<h2><?php the_title(); ?></h2>
	<?php the_post_thumbnail( array(275, 275) ); ?>
	<p><?php the_content(); ?></p>
</article>
