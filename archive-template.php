<?php 
/*
Template Name: Archive Template
*/
?>

<?php get_header(); ?>

	<div class="content-area">
		<main>
			<section class="slide">
				<div class="container-fluid">
					<div>Slide</div>
				</div>
			</section>
			<section class="categories">
				<div class="container">
					<div class="row">Categories</div>
				</div>
			</section>
			<section class="middle-area">
				<div class="container">
					<div class="row">
						<div class="posts col-md-9">

							<?php
							if( have_posts() ):
								while( have_posts() ): the_post();
							?>

							<article>
								<h2><?php the_title(); ?></h2>
								<p>Posted in <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>
								<p>Categories: <?php the_category( ' ' ); ?></p>
								<p><?php the_tags( 'Tags:', ' ' ); ?></p>
								<p><?php the_content(); ?></p>
							</article>
							
							<?php
								endwhile;
							else:
							?>

							<p>There's is nothing to be displayed yet.</p>

							<?php endif; ?>
						</div>
						<aside class="sidebar col-md-3">Sidebar</aside>
					</div>
				</div>
			</section>
		</main>
	</div>

<?php get_footer() ?>