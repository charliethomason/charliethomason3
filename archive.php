<?php get_header(); ?>
 
<div class="blog-index">

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>
		<?php $cat = get_term_by('name', single_cat_title('',false), 'category'); ?>
		<h2 class="hashtag"><a href="<?php $cat->slug; ?>"><?php single_cat_title(); ?></a></h2>
		<p class="return-link"><a href="/blog">&laquo; Return to Main Blog</a></p>
		<?php if (is_category('Recycled Film')) { ?>
		<p class="about-rf">RecycledFilm.net was a popular movie blog that I wrote, designed, and developed from 2006 til 2009, and again from 2011 til 2012. The "Recycled Film" category on this blog offers some of the best reviews and essays from the old site, as well as new ones.</p>
		<?php } ?>
	<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<?php $tag = get_term_by('name', single_tag_title('',false), 'tag'); ?>
		<h2 class="hashtag"><a href="<?php $tag->slug ?>"><?php single_tag_title(); ?></a></h2>
		<p class="return-link"><a href="/gallery">&laquo; Return to Main Gallery</a></p>
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2>Archive for <?php the_time('F jS, Y'); ?>:</h2>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2>Archive for <?php the_time('F, Y'); ?>:</h2>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2>Archive for <?php the_time('Y'); ?>:</h2>
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2>Author Archive</h2>
	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2>Blog Archives</h2>
	<?php } ?>

	<div class="blog-posts">
			
		<?php if(have_posts()) : ?>

			<?php while(have_posts()) : the_post(); ?>

				<?php if (is_tag()) { ?>
					<?php
						$custom = get_post_custom($post->ID);
						$medium = $custom["medium"][0];
						$year = $custom["year"][0];
						$thumb_id = get_post_thumbnail_id();
						$thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
					?>
					<article class="blog-item">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<a href="<?php the_permalink(); ?>" class="blog-thumb"><?php the_post_thumbnail('thumbnail'); ?></a>
						<div class="info"><?=$year?>&nbsp;&bull;&nbsp;<?=$medium?></div>
						<ul class="subjects">
							<?php
								if( $tags = get_the_tags() ) {
								    foreach( $tags as $tag ) {
								        $sep = ( $tag === end( $tags ) ) ? '' : ', ';
								        echo '<li>' . '<a href="' . get_term_link( $tag, $tag->taxonomy ) . '">#' . $tag->name . '</a>' . $sep . ' </li>';
								    }
								}
							?>
						</ul>
					</article>
				<?php } else { ?>
					<article class="blog-item">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<a href="<?php the_permalink(); ?>" class="blog-thumb"><?php the_post_thumbnail('thumbnail'); ?></a>
						<div class="info"><?php the_time('D, M j, Y'); ?>
						<ul class="subjects">
							<?php
								if( $categories = get_the_category() ) {
								    foreach( $categories as $category ) {
								        $sep = ( $category === end( $categories ) ) ? '' : ', ';
								        echo '<li>' . '<a href="' . get_category_link( $category->term_id ) . '">#' . $category->cat_name . '</a>' . $sep . ' </li>';
								    }
								}
							?>
						</ul>
					</article>
				<?php } ?>
		 
			<?php endwhile; ?>

		<?php else : ?>

			<article>
				<div>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				</div>
			</article>
 
		<?php endif; ?>

	</div>

</div>
   
<?php get_footer(); ?>