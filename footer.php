<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package lovetype
 */
?>

	</div><!-- #content -->
<!-- Footer -->
 <footer id="colophon" class="footer" role="contentinfo">
		
  	
	<div id="bottom">
		<div class="container">
			 <div class="row">
                    <div class="col-md-4">
                       <?php dynamic_sidebar( 'footer-1' ); ?>
                    </div>
                    <div class="col-md-4">
                       <?php dynamic_sidebar( 'footer-2' ); ?>
                    </div>
                    <div class="col-md-4">
                          <?php dynamic_sidebar( 'footer-3' ); ?>
                       
                    </div>
                </div> <!-- row -->
		</div>
	</div>



	<div class="site-footer ">  
		
			<?php if( of_get_option( 'lovetype_credits' ) == false ) { ?>

			<span class="credit">
				<?php printf( __( 'Powered by <a href="http://wordpress.org/" title="%1$s" rel="generator">%2$s</a> &middot; Theme by <a href="http://kumarmohit.com/" title="%3$s" rel="designer">%4$s</a>', 'tiga' ),
					esc_attr( 'A Semantic Personal Publishing Platform'),
					'WordPress',
					esc_attr( 'Mohit'),
					'Mohit'
				); ?>
			</span>

		<?php } ?>
		
		</div><!-- .site-info -->
  </footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
