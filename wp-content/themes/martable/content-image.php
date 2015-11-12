<?php
/**
 * @package martable
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    <div class="entry-content">
		<?php martable_post_format_image_content(); ?>
	</div><!-- .entry-content -->
    
    <div class="post-format-image-permalink">
    	<?php printf( __( '<a rel="bookmark" href="%1$s">%2$s</a>' ), esc_url( get_permalink() ), esc_attr( get_the_title() )); ?>
    </div>  
      
</article><!-- #post-## -->