<?php get_header(); ?>

	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
	<?php	
		$custom = get_post_custom($post->ID);
		$print = $custom["print"][0];
		$year = $custom["year"][0];
		$medium = $custom["medium"][0];
		$thumb_id = get_post_thumbnail_id();
		$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
	?>
	<article class="art-single">
		<div class="info">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="publish">
				<span class="year"><?=$year?></span>&nbsp;&bull;&nbsp;<span class="medium"><?=$medium?></span>
			</div>
		</div>
		<div class="description"> 
			<?php the_content(); ?>
		</div>
		<aside class="meta">
			<p class="subjects">
				<?php
					if( $tags = get_the_tags() ) {
					    foreach( $tags as $tag ) {
					        $sep = ( $tag === end( $tags ) ) ? '' : ', ';
					        echo '<a href="' . get_term_link( $tag, $tag->taxonomy ) . '">#' . $tag->name . '</a>' . $sep;
					    }
					}
				?>
			</p>
			<p class="buy-link"><?php if ($print != "") { ?>
					<a href="<?=$print?>" target="_blank" rel="nofollow" class="btn"><?php if (strpos($print,'blurb') !== false || strpos($print,'amazon') !== false) { echo 'Buy Book'; } else { echo 'Buy Prints'; } ?></a>
				<?php } else { ?>
					Not currently for sale
				<?php } ?>
			</p>
			<p class="tweet-link">
				<a class="btn blue" href="http://twitter.com/share?text=<?php echo urlencode(the_title()); ?>&url=<?php echo urlencode(the_permalink()); ?>&via=charliethomason" title="Opens Twitter.com in a new window" rel="nofollow" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/twitter01.png" alt="Twitter"> Tweet This</a>
			</p>
		</aside>

	</article>

	<?php endwhile; ?>
	
	<nav class="page-nav">
	    <div class="prev"><?php previous_post_link( '%link', '&#9668; %title' ) ?></div>
		<div class="next"><?php next_post_link( '%link', '%title &#9658;' ) ?></div>
	</nav>

	<?php endif; ?>

<?php get_footer(); ?>