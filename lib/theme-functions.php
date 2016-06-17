<?php


 
function lovetype_the_author() {
	if ( get_the_author_meta( 'description' ) && of_get_option('lovetype_author_box') ) : // If a user has filled out their description and checked the "display author box" option, show a bio on their entries ?>
	 
	<div id="author-info" class="row well">
		<div id="author-avatar" class="img-circle col-md-2">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'lovetype_author_bio_avatar_size', 96 ) ); ?>
		</div><!-- #author-avatar -->
		<div id="author-description" class="col-md-10">
			<h2><?php printf( __( 'About %s', 'lovetype' ), get_the_author() ); ?></h2>
			<p><?php the_author_meta( 'description' ); ?></p>
			<div id="author-link">
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
					<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'lovetype' ), get_the_author() ); ?>
				</a>
			</div><!-- #author-link	-->
		</div><!-- #author-description -->
	</div><!-- #entry-author-info -->
	 
	<?php endif;
}
 

?>
