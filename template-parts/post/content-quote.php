<article <?php post_class(); ?>>
	<div class="container-fluid post-content">
		<div class="row post-format-quote py-4 text-center text-sm-left">
			<i class="col-12 col-sm-1 fas fa-quote-left post-format-icon mb-3"></i>
			<div class="col-12 col-sm-11 post-format-quote-content">
				<blockquote class="blockquote font-italic">
					<p class="mb-0"><?php the_content(); ?></p>
				</blockquote>
				<footer class="blockquote-footer"><?php the_title(); ?></footer>
			</div>
		</div>
	</div>
</article>
