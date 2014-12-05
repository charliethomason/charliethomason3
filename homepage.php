<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

<div id="homepage">
	<img src="<?php bloginfo('template_directory'); ?>/images/charlie-big02.jpg" alt="Photo of Charlie Thomason" class="bigpic">
	<article class="intro">
		<h2>Artist &amp; Web Developer from Chicago</h2>
		<p>Charlie Thomason is a Front-end Web Developer and Artist living in Chicago, Illinois. By day, he is a Presentation Layer Engineer for <a href="http://razorfish.com" target="_blank" rel="nofollow">Razorfish</a>. By night, he enjoys painting, drawing, and photography. As a Developer, he specializes in responsive design, web accessibility, and cross-browser compatibility. As an Artist, he specializes in water-based media, birds &amp; landscapes, and original movie posters. This website features a collection of his best artwork, a personal blog, and a store featuring his first self-published book, <a href="http://www.blurb.com/b/2868673-open-range" target="_blank" rel="nofollow"><em>Open Range: From Monument Valley to the Mojave Desert</em></a>.</p>
		<div class="button-row"><a href="about" class="btn secondary">Learn More</a></div>
	</article>
	<section id="home-recent">

		<div class="the-latest recent-art">
			<h2>Latest from <a href="gallery">the Gallery</a></h2>
			<?php 
				$temp = $wp_query; 
				$wp_query = null; 
				$wp_query = new WP_Query(); 
				$wp_query->query('showposts=1&post_type=art'.'&paged='.$paged);
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
			<?php 
				endwhile; 
				wp_reset_query();
			?>
		</div>

		<div class="the-latest recent-blog">
			<h2>Latest from <a href="blog">the Blog</a></h2>
			<?php 
				query_posts( 'posts_per_page=1');
			?>
	        <?php while(have_posts()) : the_post(); ?>
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
			<?php 
				endwhile; 
				wp_reset_query();
			?>
		</div>

	</section>
</div>

   
<?php get_footer(); ?>