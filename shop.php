<?php
/*
Template Name: Shop
*/
?>
<?php get_header(); ?>


	<article class="blog-single page shop">

		<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>

		<div class="info">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</div>
		
		<div class="the-content">
			<ol class="shop-grid">
				<li>
					<a href="http://www.blurb.com/b/2868673-open-range" target="_blank" rel="nofollow" class="product-image"><img src="<?php bloginfo('template_directory'); ?>/images/shop-openrange-150.jpg" alt="Open Range book"></a>
					<h3><a href="http://www.blurb.com/b/2868673-open-range" target="_blank" rel="nofollow">Book: &quot;Open Range&quot;</a></h3>
					<div class="product">Photography book</div>
					<div class="size">152 pages</div>
					<div class="seller"><strong>Sold by: </strong>Blurb.com</div>
					<a href="http://www.blurb.com/b/2868673-open-range" target="_blank" rel="nofollow" class="btn">View Book Details</a>
				</li>
				<li>
					<a href="http://society6.com/cthomason/prints" target="_blank" rel="nofollow" class="product-image"><img src="<?php bloginfo('template_directory'); ?>/images/shop-bluejay-150.jpg" alt="Blue Jay in the Desert art print"></a>
					<h3><a href="http://society6.com/cthomason/prints" target="_blank" rel="nofollow">Art Prints</a></h3>
					<div class="product">Archival paper</div>
					<div class="size">Multiple sizes</div>
					<div class="seller"><strong>Sold by: </strong>Society6.com</div>
					<a href="http://society6.com/cthomason/prints" target="_blank" rel="nofollow" class="btn">Shop Art Prints</a>
				</li>
				<li>
					<a href="http://society6.com/cthomason/cases" target="_blank" rel="nofollow" class="product-image"><img src="<?php bloginfo('template_directory'); ?>/images/shop-iphone-150.jpg" alt="Frederic Chopin iPhone case"></a>
					<h3><a href="http://society6.com/cthomason/cases" target="_blank" rel="nofollow">Phone Cases</a></h3>
					<div class="product">Apple iPhone &amp; Samsung Galaxy</div>
					<div class="size">Multiple sizes</div>
					<div class="seller"><strong>Sold by: </strong>Society6.com</div>
					<a href="http://society6.com/cthomason/cases" target="_blank" rel="nofollow" class="btn">Shop iPhone Cases</a>
				</li>
				<li>
					<a href="http://society6.com/cthomason/framed-prints" target="_blank" rel="nofollow" class="product-image"><img src="<?php bloginfo('template_directory'); ?>/images/shop-framed-150.jpg" alt="Eternal Sunshine framed print"></a>
					<h3><a href="http://society6.com/cthomason/framed-prints" target="_blank" rel="nofollow">Framed Prints</a></h3>
					<div class="product">Gallery-quality framed prints</div>
					<div class="size">Multiple varieties</div>
					<div class="seller"><strong>Sold by: </strong>Society6.com</div>
					<a href="http://society6.com/cthomason/framed-prints" target="_blank" rel="nofollow" class="btn">Shop Framed Prints</a>
				</li>
			</ol>
		</div>

		<?php endwhile; ?>
		<?php endif; ?>

	</article>


<?php get_footer(); ?>