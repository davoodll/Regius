<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package AccessPress Store
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
        <?php if (has_post_thumbnail()): ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('accesspress-blog-big-thumbnail'); ?>
            </div>
        <?php endif; ?>
        <div class="content-inner clearfix">
            <h2 class="post-title"><?php the_title(); ?></h2>
            <?php /* <p class="meta-info">Posted On <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?> by <?php the_author_posts_link(); ?> /  <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p> */ ?>
            <div class="content-page">
                <?php the_content(); ?>
            </div>
            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . __('Pages:', 'accesspress-store'),
                'after' => '</div>',
            ));
            ?>
        </div>
    </div><!-- .entry-content -->
<!--
    <footer class="entry-footer">
        <?php edit_post_link(__('Edit', 'accesspress-store'), '<span class="edit-link">', '</span>'); ?>
    </footer><!-- .entry-footer -->

</article><!-- #post-## -->
