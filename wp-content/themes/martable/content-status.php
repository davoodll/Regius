<?php
/**
 * @package martable
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'martable' ) ); ?>
	</div><!-- .entry-content -->
    
    <div class="entry-content-permalink">
    	<?php printf( __( '<a rel="bookmark" href="%1$s">%2$s</a>' ), esc_url( get_permalink() ), '&#xf0c1;'); ?>
    </div>

</article><!-- #post-## -->
