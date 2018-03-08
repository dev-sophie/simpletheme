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
					<div>Slide-ARCHIV</div>
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
									get_template_part( 'template-parts/post/content', get_post_format() );
								endwhile;
							else:
							?>

							<p>There's is nothing to be displayed yet.</p>

							<?php endif; ?>


							<?php
							$category = new WP_Query( 'post_type=post&cat=5' );
							if( $category->have_posts() ):
								while( $category->have_posts() ): $category->the_post();
									get_template_part( 'template-parts/post/content', get_post_format() );
								endwhile;
								wp_reset_postdata();
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
