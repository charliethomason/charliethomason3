<?php get_header(); ?>

	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
	<article class="blog-single">
		<div class="info">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="publish">
				<span class="date"><?php the_time('D, M j, Y'); ?></span>&nbsp;&bull;&nbsp;<span class="category"><?php the_category(', '); ?></span>
			</div>
		</div>
		<div class="the-content">
			<?php the_content(); ?>
		</div>

		<p class="tweet-link">
			<a class="btn blue" href="http://twitter.com/share?text=<?php echo urlencode(the_title()); ?>&url=<?php echo urlencode(the_permalink()); ?>&via=charliethomason" title="Opens Twitter.com in a new window" rel="nofollow" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/twitter01.png" alt="Twitter"> Tweet This</a>
		</p>

	</article>

	<?php endwhile; ?>
	
	<nav class="page-nav">
		<div class="prev"><?php previous_post_link( '%link', '&#9668; %title' ) ?></div>
		<div class="next"><?php next_post_link( '%link', '%title &#9658;' ) ?></div>
	</nav>

	<?php endif; ?>
	
<?php get_footer(); ?>