<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package indexfurinture
 */

?>
		</div><!--.row-->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer page-footer">
		<div class="site-info well-xs text-center">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'indexfurniture' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'indexfurniture' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'indexfurniture' ), 'indexfurniture', '<a href="https://plus.google.com/u/0/113587414402501665542">Khan vuthy</a>' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
