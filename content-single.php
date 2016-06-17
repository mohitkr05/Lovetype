<?php
/**
 * @package lovetype
 */
$format = get_post_format();
$formats = get_theme_support( 'post-formats' );

if ( 'image' == $format || 'video' == $format ) //If Image or Video, put the_content() in a variable for regex
	$content = apply_filters( 'the_content', get_the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'lovetype' ) ) );
else
	$content = '';
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="post-wrapper row">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		 
	</header><!-- .entry-header -->

<aside class="meta col-md-2 text-center">
			<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
				<?php echo get_avatar( get_the_author_meta('email'), '128' ); ?>
			</a>
			<?php if ( 'post' == get_post_type() ) : ?>
			<div id="time">
			<span class="month"><?php the_time( 'M' ); ?></span>
			<span class="day"><?php the_time( 'd' ); ?></span>
			<span class="year"><?php the_time( 'o' ); ?></span>
			</div>
			<?php endif; ?>
			
		 </aside>
                
	<div class="entry-content  col-md-10">
		
	<?php if ( has_post_thumbnail() && 'image' == $format ) : ?>
		<figure class="entry-thumbnail">
			<?php the_post_thumbnail( 'lovetype-featured' ); ?>
		</figure>
	<?php elseif ( 'image' == $format ) : ?>
		<?php
			$image = lovetype_get_first_image( $content );
			
			$content = preg_replace( '!<img.*src=[\'"]([^"]+)[\'"].*/?>!iUs', '', $content ); //Strip out all images from content
			
			if ( ! empty( $image ) ) : ?>
				<figure class="entry-thumbnail">
					<?php printf( '<img src="%1$s" />', esc_url( $image['src'] ) ); ?>
				</figure>
			<?php endif; ?>
	<?php endif; ?>

	<?php if ( 'video' == $format ) :

		$media = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );

		?>
		<?php if ( ! empty( $media ) ) : ?>
		    <?php
		    foreach( $media as $embed_html ) {
		        $content = str_replace( $embed_html, '', $content );
		    } ?>
			<div class="entry-video jetpack-video-wrapper">
		    <?php
		        foreach ( $media as $embed_html ) {
		            printf( '%1$s', $embed_html );
		        } ?>
	    	</div>
		<?php endif; ?>
	<?php endif; ?>

	<div class="entry-content">
		<?php if ( 'video' == $format || 'image' == $format ) : ?>
			<?php echo $content; ?>
		<?php else : ?>
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'lovetype' ) ); ?>
		<?php endif; ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'lovetype' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		 
		<?php
			$tags_list = get_the_tag_list( '', '' );
			if ( $tags_list ) :
		?>
		<span class="tags-links">
			<?php echo $tags_list; ?>
		</span>
		<?php endif; // End if $tags_list ?>

		<?php edit_post_link( __( 'Edit', 'lovetype' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- .entry-content -->
</div>	
	<footer class="entry-footer well">
		
			
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'lovetype' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'lovetype' ) );

			if ( ! lovetype_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'lovetype' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'lovetype' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'lovetype' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'lovetype' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( 'Edit', 'lovetype' ), '<span class="edit-link">', '</span>' ); ?>
		<?php if ( of_get_option( 'lovetype_social_shares_single' ) ) { ?>
		<div class="social-likes" data-url="<?php get_permalink();?>" data-title="<?php the_title(); ?>">
	<div class="facebook" title="Share link on Facebook">Facebook</div>
	<div class="twitter" data-via="@twitter" title="Share link on Twitter">Twitter</div>
	<div class="plusone" title="Share link on Google+">Google+</div>
	<div class="pinterest" title="Share image on Pinterest" data-media="">Pinterest</div>
	<?php } ?>
</div>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->


