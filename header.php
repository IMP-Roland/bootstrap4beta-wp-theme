<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the HTML5 "</header>"  closing tag.
 *
 * @package WordPress
 * @subpackage Bootstrap
 * @since Bootstrap Wordpress Theme by Bwebdesign 1.0
 */
?>
<!DOCTYPE html>
<html lang="hu">
  <head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php wp_head(); ?>
  </head>
<body <?php body_class(); ?>>
	
	<!-- Page Header -->
	<header id="masthead" class="site-header">
		<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		  <div class="container">
			<!-- Logo or site name text -->
			<?php
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				echo '<a class="navbar-brand" href="/" rel="home">';
				if ( has_custom_logo() ) {
					echo '<img src="'. esc_url( $logo[0] ) .'" alt="logo">';
				} else {
					bloginfo( 'name' );
				}
				echo '</a>';
			?>
			<!-- Hamburger icon -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<!-- Menu -->
			<?php
			wp_nav_menu( array(
				'theme_location'    => 'primary',
				'depth'             => 2,
				'container'         => 'div',
				'container_class'   => 'collapse navbar-collapse',
				'container_id'      => 'navbarResponsive',
				'menu_class'        => 'navbar-nav ml-auto',
				'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
				'walker'            => new WP_Bootstrap_Navwalker())
			);
			?>
		  </div>
		</nav>
	</header>
	<!-- Page Content -->