<?php
/*
Template Name: Gallery
*/
?>
<?php get_header(); ?>
<div class="blog-index">

	<h2>Art &amp; Photo Gallery</h2>

	<div class="blog-posts">

		<?php 
		  $temp = $wp_query; 
		  $wp_query = null; 
		  $wp_query = new WP_Query(); 
		  $wp_query->query('showposts=1000&post_type=art'.'&paged='.$paged); 
		  while ($wp_query->have_posts()) : $wp_query->the_post(); 
		?>
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
		<?php endwhile; ?>

	</div>

	<?php 
	  $wp_query = null; 
	  $wp_query = $temp;  // Reset
	?>

</div>
<?php get_footer(); ?>