<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php bloginfo('name'); ?> <?php wp_title ('|'); ?></title>
<link rel="icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico">
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<?php wp_head(); ?>
</head>
<body>

<header id="header">
	<div class="headwrap">
		<h1>
			<a href="<?php echo get_option('home'); ?>"><span class="first-name">Charlie</span> <span class="last-name">Thomason</span></a>
		</h1>

		<aside id="social">
			<ul>
				<li><a href="http://twitter.com/charliethomason" alt="Twitter" rel="nofollow" target="_blank" title="Twitter"><img src="<?php bloginfo('template_directory'); ?>/images/twitter02.png" alt="Twitter"></a></li>
				<li><a href="http://instagram.com/charliethomason" alt="Instagram" rel="nofollow" target="_blank" title="Instagram"><img src="<?php bloginfo('template_directory'); ?>/images/instagram02.png" alt="Instagram"></a></li>
			</ul>
		</aside>
	</div>
</header>

<main id="main">

	<nav id="main-nav">
		<ul>
			<li<?php if (is_front_page()) { ?> class="active"<?php } ?>>
				<a href="<?php echo get_option('home'); ?>">Home</a>
			</li>
			<li<?php if (is_page_template('about.php')) { ?> class="active"<?php } ?>>
				<a href="/about">About</a>
			</li>
			<li<?php if (is_page_template('art.php') || is_singular('art') || is_tag()) { ?> class="active"<?php } ?>>
				<a href="/gallery">Art</a>
			</li>
			<li<?php if (is_home() || is_singular('post') || is_category()) { ?> class="active"<?php } ?>>
				<a href="/blog">Blog</a>
			</li>
			<li<?php if (is_page_template('shop.php')) { ?> class="active"<?php } ?>>
				<a href="/shop">Shop</a>
			</li>
		</ul>
	</nav>

	<section id="content">