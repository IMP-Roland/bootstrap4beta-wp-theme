<?php
/**
 * The template for displaying the footer
 *
 * content section = "footer" HTML5 tag
 *
 * @package WordPress
 * @subpackage Bootstrap
 * @since Bootstrap Wordpress Theme by Bwebdesign 1.0
 */
?>
	
	<!-- Page Footer -->
	<footer id="footer" class="site-footer">
		 <div id="footer-wrapper" class="container-fluid">
			<div id="footer-container" class="container">
				<div class="row">
					<div class="col-sm-12">		
						<?php
							if(is_active_sidebar('footer-widget')){
								dynamic_sidebar('footer-widget');
							}
						?>
					</div>
				</div>
				<div class="row">
					<div id="copyright" class="col-lg-12 text-center">		
						<p><? echo $_SERVER['HTTP_HOST'] ?> &copy; <? echo date("Y") ?> Minden jog fenntartva</p>
					</div>
				</div>
			</div>
		</div>
	</footer>

<?php wp_footer(); ?>

</body>
</html>