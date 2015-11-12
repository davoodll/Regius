<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package martable
 */

if ( ! function_exists( 'martable_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function martable_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'martable' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'martable' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'martable' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'martable_author_bio' ) ) :
/**
 * Display author bio on single post page.
 */
function martable_author_bio() {
	?>
	<div class="single_author_bio">
    	<div class="single_author_bio_avatar">
        	<?php echo get_avatar( get_the_author_meta('ID'), 88 ); ?>
        </div><!-- .single_author_bio_avatar -->
        <div class="single_author_details">
        	<p class="single_author_name"><span><?php the_author() ?></span></p>
            <p class="single_author_description"><?php the_author_meta('description'); ?></p>
    	</div><!-- .single_author_details -->
    </div><!-- .single_author_bio -->
	<?php
}
endif;

if ( ! function_exists( 'martable_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function martable_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'martable' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous"><span>Previous post</span>%link</div>', _x( '%title', 'Previous post link', 'martable' ) );
				next_post_link(     '<div class="nav-next"><span>Next post</span>%link</div>',     _x( '%title', 'Next post link',     'martable' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'martable_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function martable_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		$time_string
	);

	$byline = sprintf(
		_x( '%s', 'post author', 'martable' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	
	$num_comments = get_comments_number(); // get_comments_number returns only a numeric value
	
	if ( comments_open() ) {
		if ( $num_comments == 0 ) {
			$comments = __('No Comments', 'martable');
		} elseif ( $num_comments > 1 ) {
			$comments = $num_comments . __(' Comments', 'martable');
		} else {
			$comments = __('1 Comment', 'martable');
		}
		$write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
	} else {
		$write_comments =  __('Comments Closed', 'martable');
	}	

	echo '<span class="byline"> ' . $byline . '</span>';
	
	echo '<span class="posted-on">' . $posted_on . '</span>';
	
	echo '<span class="comments-number"><span>' . $write_comments . '</span></span>';

}
endif;

if ( ! function_exists( 'martable_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function martable_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'martable_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the
	 * URL of the next adjacent image in a gallery, or the first image (if
	 * we're looking at the last image in a gallery), or, in a gallery of one,
	 * just the link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
		esc_url( $next_attachment_url ),
		the_title_attribute( array( 'echo' => false ) ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function martable_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'martable_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'martable_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so martable_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so martable_categorized_blog should return false.
		return false;
	}
}

if ( ! function_exists( 'martable_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function martable_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<div class="comment-content">
				<?php _e( 'Pingback:', 'martable' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'martable' ), '<span class="edit-link">', '</span>' ); ?>
            </div>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			
            <div class="comment-author vcard">
                
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
            	
                    <span class="comment-author-name">
                        <?php printf( __( '%s', 'martable' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                    </span> 
                    
                    <span class="comment-author-time">
                            <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                                    <time datetime="<?php comment_time( 'c' ); ?>">
                                        <?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'martable' ), get_comment_date(), get_comment_time() ); ?>
                                    </time>
                            </a>                
                    </span>
                    
                    <span class="comment-author-edit">
                        <?php edit_comment_link( __( 'Edit', 'martable' ), '<span class="edit-link">', '</span>' ); ?>
                    </span>
                    
                    <?php if ( '0' == $comment->comment_approved ) : ?>
                    <span class="comment-awaiting-moderation">
                        <?php _e( 'Your comment is awaiting moderation.', 'martable' ); ?>
                    </span>
                    <?php endif; ?> 
            </div>
            
			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->
            
			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->            
            
                        
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for martable_comment()

/**
 * Flush out the transients used in martable_categorized_blog.
 */
function martable_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'martable_categories' );
}
add_action( 'edit_category', 'martable_category_transient_flusher' );
add_action( 'save_post',     'martable_category_transient_flusher' );
