<?php
/**
 * Template partial of index content.
 *
 * @package Extra
 */

$type = strtolower( strval( et_get_option( 'archive_list_style', 'standard' ) ) ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited -- This is not WP $type global variable.

?>
<div class="posts-blog-feed-module <?php echo esc_attr( $type ); ?> post-module et_pb_extra_module module">
	<div class="paginated_content">

		<div class="paginated_page" <?php echo 'masonry' == $type ? 'data-columns' : ''; ?>>
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
			//	$post_format = et_get_post_format();
			//	$post_format_class = !empty( $post_format ) ? 'et-format-' . $post_format : '';
				?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry ' /*. $post_format_class*/ ); ?>>
				
						
						<?php
						if ( !in_array( $post_format, array( 'quote', 'link' ) ) ) {
						?>
						<div class="post-content">
							<?php $color = extra_get_post_category_color(); ?>
							<div class="post__title">
								<h2 class="post-title entry-title"><a class="color-post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<!-- 	<div class="post__share">
							<span class="post__share-icon" href="#"><svg xmlns="http://www.w3.org/2000/svg" fill="#000000" viewBox="0 0 30 30" width="30px" height="30px"><path d="M 23 3 A 4 4 0 0 0 19 7 A 4 4 0 0 0 19.09375 7.8359375 L 10.011719 12.376953 A 4 4 0 0 0 7 11 A 4 4 0 0 0 3 15 A 4 4 0 0 0 7 19 A 4 4 0 0 0 10.013672 17.625 L 19.089844 22.164062 A 4 4 0 0 0 19 23 A 4 4 0 0 0 23 27 A 4 4 0 0 0 27 23 A 4 4 0 0 0 23 19 A 4 4 0 0 0 19.986328 20.375 L 10.910156 15.835938 A 4 4 0 0 0 11 15 A 4 4 0 0 0 10.90625 14.166016 L 19.988281 9.625 A 4 4 0 0 0 23 11 A 4 4 0 0 0 27 7 A 4 4 0 0 0 23 3 z"/></svg> <span class="post__share-text">Share</span>
							</span>
							<div class="social-icons ed-social-share-icons">
									 
								</div>
							</div> -->
							</div> 
						
							
							
							<div class="post-meta vcard">
								<p><?php echo extra_display_archive_post_meta(); ?></p>
							</div>
							<div class="post__excerpt-image">
								<div class="excerpt entry-summary">
									<p><?php
									if ( has_excerpt() ) {
										the_excerpt();
									} else {
										$excerpt_length = get_post_thumbnail_id() ? '100' : '230';
										et_truncate_post( $excerpt_length );
									}
									?></p>
								</div>
								<div class="header post__image">
									<?php
									$thumb_args = array(
										'size'      => 'extra-image-medium',
										'img_after' => '<span class="et_pb_extra_overlay"></span>',
									);
									require locate_template( 'post-top-content.php' );
									?>
								</div>
							</div>

							<div class="post__readmore">
								<span></span>
								<a class="read-more-button" href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Read More', 'extra' ); ?></a>
								
								<div class="post__share">
									<span class="post__share-icon"><svg xmlns="http://www.w3.org/2000/svg" fill="#000000" viewBox="0 0 30 30" width="30px" height="30px"><path d="M 23 3 A 4 4 0 0 0 19 7 A 4 4 0 0 0 19.09375 7.8359375 L 10.011719 12.376953 A 4 4 0 0 0 7 11 A 4 4 0 0 0 3 15 A 4 4 0 0 0 7 19 A 4 4 0 0 0 10.013672 17.625 L 19.089844 22.164062 A 4 4 0 0 0 19 23 A 4 4 0 0 0 23 27 A 4 4 0 0 0 27 23 A 4 4 0 0 0 23 19 A 4 4 0 0 0 19.986328 20.375 L 10.910156 15.835938 A 4 4 0 0 0 11 15 A 4 4 0 0 0 10.90625 14.166016 L 19.988281 9.625 A 4 4 0 0 0 23 11 A 4 4 0 0 0 27 7 A 4 4 0 0 0 23 3 z"/></svg> <span class="post__share-text">Share</span>
									</span>
										<div class="social-icons ed-social-share-icons">
											<?php extra_post_share_links(); ?>
									
							</div>
							

						</div>
						<?php } ?>
					</article>
				<?php
			endwhile;
		else :
			?>
			<article class='nopost'>
				<h5><?php esc_html_e( 'Sorry, No Posts Found', 'extra' ); ?></h5>
			</article>
			<?php
		endif;
		?>
		</div><!-- .paginated_page -->
	</div><!-- .paginated_content -->

	<?php global $wp_query; ?>
	<?php if ( $wp_query->max_num_pages > 1 ) { ?>
	<div class="archive-pagination">
		<?php echo extra_archive_pagination(); ?>
	</div>
	<?php } ?>
</div><!-- /.posts-blog-feed-module -->
