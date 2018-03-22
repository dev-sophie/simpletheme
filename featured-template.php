<?php 
/*
Template Name: Featured Template
*/
?>

<?php get_header(); ?>

	<div class="content-area">
		<main>
			<section class="slide">
				<div class="container-fluid">
					<div>Slide-FEATURED</div>
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
							<div class="container">
								<div class="row">
									<?php
									//First loop
									$featured = new WP_Query( 'post_type=post&posts_per_page=1&cat=8' );

									if( $featured->have_posts() ):
										while( $featured->have_posts() ): $featured->the_post();
									?>

									<div class="col-12">
										<?php get_template_part( 'template-parts/post/content-featured', 'featured' ); ?>
									</div>
									
									<?php		
										endwhile;
										// It's important to reset the wp query
										wp_reset_postdata();
									endif;

									// Second loop
									$args = array(
										'post_type'		   => 'post',
										'posts_per_page'   => 2,
										'category__not_in' => array( 5 ),
										'category__in' 	   => array( 8,9 ),
										// 'offset'		   => 1
									);
									$secondary = new WP_Query( $args );

									if( $secondary->have_posts() ):
										while( $secondary->have_posts() ): $secondary->the_post();
									?>

									<div class="col-6">
										<?php get_template_part( 'template-parts/post/content', 'secondary' ); ?>
									</div>
									
									<?php		
										endwhile;
										// It's important to reset the wp query
										wp_reset_postdata();
									endif; ?>
								</div>
							</div>
						</div>
						<aside class="sidebar col-md-3">Sidebar</aside>
					</div>
				</div>
			</section>
		</main>
	</div>

<?php get_footer() ?>
