<?php
/**
 * The template for displaying page content
 *
 * content section = "#content" div
 *
 * @package WordPress
 * @subpackage Bootstrap
 * @since Bootstrap Wordpress Theme by Bwebdesign 1.0
 */
?>
<?php get_header(); ?>
	<div id="content" class="site-content">
		<div id="page-title" class="container">
			<div class="row">
				<div class="col-sm-12">			
					<h1 class="mt-5"><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></h1>
				</div>
			</div>
		</div>
		<?php 
		
			if (have_posts()) {
			  while (have_posts()) {
				the_post();
				the_content(); 
			  }
			} 
			
		?>
	</div>
	<?php get_footer(); ?>