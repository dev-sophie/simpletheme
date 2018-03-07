<?php get_header(); ?>

	<img class="img-fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="">

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
									get_template_part( 'template-parts/content', get_post_format(); );
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
