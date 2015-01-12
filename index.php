<?php get_header(); ?>
	<div class="blog-index">

		<h2>Blog</h2>
		
		<div class="blog-posts">

		<?php if(have_posts()) : ?>

			<?php while(have_posts()) : the_post(); ?>
		 
			<article class="blog-item">
				<a href="<?php the_permalink(); ?>" class="blog-thumb"><?php the_post_thumbnail('thumbnail'); ?></a>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<div class="info"><?php the_time('D, M j, Y'); ?></div>
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
			
			<?php endwhile; ?>

		</div>
		
		<?php else : ?>

			<article>
				<div>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				</div>
			</article>

		<?php endif; ?>

	</div>
   
<?php get_footer(); ?>