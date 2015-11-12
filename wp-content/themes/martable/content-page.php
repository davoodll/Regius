<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package martable
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if( get_theme_mod('martable_show_title_page') == 'yes' ){ the_title( '<h1 class="entry-title">', '</h1>' ); } ?>
	</header><!-- .entry-header -->
	<div class="page-featured-image">
    <?php 
	if ( has_post_thumbnail() && get_theme_mod('martable_show_featured_image_page') == 'yes' ) { // check if the post has a Post Thumbnail assigned to it.
	  the_post_thumbnail();
	} 
	?>
    </div>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'martable' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'martable' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
