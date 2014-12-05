<?php get_header(); ?>


	<article class="blog-single page">

		<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>

		<div class="info">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</div>
		
		<div class="the-content">
			<?php the_content(); ?>
		</div>

		<?php endwhile; ?>
		<?php endif; ?>

	</article>


<?php get_footer(); ?>