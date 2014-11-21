<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package jv-a-taste-of-the-season
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=960">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- Fonts -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'jv-a-taste-of-the-season' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<div class="headertitlescontainer">
			
			<?php if ( is_front_page() ) :
				?>
				<div class="headertitles">
					<a href="#order-yours-today" class="buynowbutton"></a>
					<div class="finefoods"></div>
				</div>
			
			<?php else :
			?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><div class="headertitles">
					<div class="finefoods"></div>
				</div></a>
			<?php endif; ?>
			</div>		
			
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="season"><?php bloginfo( 'description' ); ?></h2>
			<h3 class="with-who">with <span>ROBERT OWEN BROWN</span><br> and friends</h3>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
