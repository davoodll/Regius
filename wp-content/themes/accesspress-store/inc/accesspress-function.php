<?php
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function accesspress_store_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'AP: Right Sidebar', 'accesspress-store' ),
		'id'            => 'sidebar-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s ">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );
	
	register_sidebar( array(
		'name'          => __( 'AP: Left Sidebar', 'accesspress-store' ),
		'id'            => 'sidebar-left',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );	
	
	register_sidebar( array(
		'name'          => __( 'Shop Sidebar', 'accesspress-store' ),
		'id'            => 'shop',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="%2$s '.accesspress_count_widgets( 'shop' ).'">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
		) );
	register_sidebar( array(
		'name'          => __( 'Header Call To Box', 'accesspress-store' ),
		'id'            => 'header-callto-action',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="%2$s '.accesspress_count_widgets( 'header-callto' ).'">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
		) );
	
	register_sidebar( array(
		'name'          => __( 'AP: Promo Widget 1', 'accesspress-store' ),
		'id'            => 'promo-widget-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s '.accesspress_count_widgets( 'promo-widget-1' ).'">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );
	
	register_sidebar( array(
		'name'          => __( 'AP: Product Listing Widget 1', 'accesspress-store' ),
		'id'            => 'product-widget-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="title-bg"><h2 class="prod-title">',
		'after_title'   => '</h2></div>',
		) );
	
	register_sidebar( array(
		'name'          => __( 'AP: Promo Widget 2', 'accesspress-store' ),
		'id'            => 'promo-widget-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );
	
	register_sidebar( array(
		'name'          => __( 'AP: Product Listing Widget 2', 'accesspress-store' ),
		'id'            => 'product-widget-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="title-bg"><h2 class="prod-title">',
		'after_title'   => '</h2></div>',
		) );
	
	register_sidebar( array(
		'name'          => __( 'AP: Video Call to Action', 'accesspress-store' ),
		'id'            => 'cta-video',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );
	
	register_sidebar( array(
		'name'          => __( 'AP: Product Listing Widget 3', 'accesspress-store' ),
		'id'            => 'product-widget-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		) );	
	
	register_sidebar( array(
		'name'          => __( 'AP: Promo Widget 3', 'accesspress-store' ),
		'id'            => 'promo-widget-3',
		'description'   => 'You can use widget AP: Icon Set which is what it is designed that it will horizontally allign with 3 row',
		'before_widget' => '<aside id="%1$s" class="widget %2$s '.accesspress_count_widgets( 'promo-widget-3' ).'">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
		) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Area 1', 'accesspress-store' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
		) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Area 2', 'accesspress-store' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
		) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Area 3', 'accesspress-store' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
		) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Area 4', 'accesspress-store' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
		) );
	
}
add_action( 'widgets_init', 'accesspress_store_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function accesspress_store_scripts() {

	$font_args = array(
		'family' => 'Open+Sans:400,600,700,300|Oswald:400,700,300|Dosis:400,300,500,600,700|Lato:300,400,700,900',
		);
	wp_enqueue_style('accesspress-store-google-fonts', add_query_arg($font_args, "//fonts.googleapis.com/css"));

	wp_enqueue_style( 'accesspress-store-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');

	wp_enqueue_style( 'accesspress-store-animate', get_template_directory_uri() . '/css/animate.css');
	
	wp_enqueue_style( 'accesspress-store-slick', get_template_directory_uri() . '/css/slick.css');
	
	wp_enqueue_style( 'accesspress-store-ticker', get_template_directory_uri() . '/css/ticker-style.css');

	wp_enqueue_style( 'accesspress-store-style', get_stylesheet_uri() );

	//check if responsive mode is enabled.
	if(get_theme_mod('accesspress_ed_responsive','1')==1){
		wp_enqueue_style( 'accesspress-store-style-responsive', get_template_directory_uri() . '/css/responsive.css');
	}

	wp_enqueue_script( 'accesspress-store-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	
	wp_enqueue_script( 'accesspress-store--slick', get_template_directory_uri() . '/js/slick.js', array('jquery'), '1.5.0', true );

	wp_enqueue_script( 'accesspress-store-wow', get_template_directory_uri() . '/js/wow.min.js',array(),'1.1.2',true);

	wp_enqueue_script( 'accesspress-ticker-js', get_template_directory_uri() . '/js/jquery.ticker.js', array('jquery'), '1.0.0', true );

	wp_enqueue_script( 'accesspress-store-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'accesspress-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'accesspress_store_scripts' );

function accesspress_ticker_header_customizer(){
	//Check if ticker is enabled
	if(get_theme_mod('accesspress_ticker_checkbox')===1)
	{
		$ticker_title = get_theme_mod('accesspress_ticker_title');
		if(empty($ticker_title)){$ticker_title="Latest";}
		$ticker_text1 = get_theme_mod('accesspress_ticker_text1');
		$ticker_text2 = get_theme_mod('accesspress_ticker_text2');
		$ticker_text3 = get_theme_mod('accesspress_ticker_text3');
		$ticker_text4 = get_theme_mod('accesspress_ticker_text4');
		$ticker_array = array($ticker_text1, $ticker_text2, $ticker_text3, $ticker_text4);
		?>
		<script>
			jQuery(document).ready(function($){
				$('#ticker').ticker({
		            speed: 0.10,           // The speed of the reveal
		            ajaxFeed: false,       // Populate jQuery News Ticker via a feed
		            feedUrl: false,        // The URL of the feed
		    	    // MUST BE ON THE SAME DOMAIN AS THE TICKER
		            //feedType: 'xml',       // Currently only XML
		            htmlFeed: true,        // Populate jQuery News Ticker via HTML
		            debugMode: true,       // Show some helpful errors in the console or as alerts
		      	    // SHOULD BE SET TO FALSE FOR PRODUCTION SITES!
		            controls: true,        // Whether or not to show the jQuery News Ticker controls
		            titleText: '<?php echo $ticker_title;?>',   // To remove the title set this to an empty String
		            displayType: 'reveal', // Animation type - current options are 'reveal' or 'fade'
		            direction: 'ltr',       // Ticker direction - current options are 'ltr' or 'rtl'
		            fadeInSpeed: 900,      // Speed of fade in animation
		            fadeOutSpeed: 300,   
		            pauseOnItems: 3000,    // The pause on a news item before being replaced  
		        });
});
</script>
<style type="text/css">#ticker{display:none;}</style>
<ul id="ticker">
	<?php 
	$i=0;
	foreach($ticker_array as $ticker){
		$i++;
		?>
		<li>
			<h5 class="ticker_tick ticker-h5-<?php echo $i; ?>"> <?php echo $ticker ?> </h5>
		</li>
		<?php 
	} ?>
</ul>
<?php
}
}

function accesspress_slickliderscript(){
	$accesspress_show_slider = get_theme_mod('show_slider') ;
	$accesspress_show_pager = (get_theme_mod('show_pager') == "0") ? "false" : "true";
	$accesspress_show_controls = (get_theme_mod('show_controls') == "0") ? "false" : "true";
	$accesspress_auto_transition = (get_theme_mod('auto_transition') == "0") ? "false" : "true";
	$accesspress_slider_transition = (!get_theme_mod('slider_transition')) ? "true" : get_theme_mod('slider_transition');
	$accesspress_slider_speed = (!get_theme_mod('slider_speed')) ? "5000" : get_theme_mod('slider_speed');
	$accesspress_slider_pause = (!get_theme_mod('slider_pause')) ? "5000" : get_theme_mod('slider_pause');
	if( $accesspress_show_slider == "1") : 
		?>
	<script type="text/javascript">
		jQuery(function($){
			$('#main-slider .bx-slider').slick({
				dots: <?php echo esc_attr($accesspress_show_pager); ?>,
				arrows: <?php echo esc_attr($accesspress_show_controls); ?>,
				speed: <?php echo esc_attr($accesspress_slider_speed); ?>,
				fade: <?php echo esc_attr($accesspress_slider_transition); ?>,
				cssEase: 'linear',
				slickPause:<?php echo esc_attr($accesspress_slider_pause); ?>,
				autoplay:<?php echo esc_attr($accesspress_auto_transition); ?>,
				adaptiveHeight:true,
				infinite:false
			});				
		});
	</script>
	<?php
	endif;
}

add_action('wp_head', 'accesspress_slickliderscript');

function accesspress_slidercb(){
	$accesspress_show_slider = get_theme_mod('show_slider') ;
	$accesspress_show_caption = get_theme_mod('show_caption') ;
	if( $accesspress_show_slider == 1) :
		?>
	<section id="main-slider">
		<div class="bx-slider">
			<?php 			
			for ($i=1; $i <= 5 ; $i++) { 
				$slider_post = get_theme_mod('slider_'.$i.'_post');
				$slider_button_text = get_theme_mod('slider'.$i.'_button_text');
				$slider_button_link = get_theme_mod('slider'.$i.'_button_link');

				if(!empty($slider_post)) :
					?>
				<div class="slides">
					<?php
						$args = array('post__in'=> array($slider_post));
						$query1 = new WP_Query( $args );
						while ( $query1->have_posts() ) {
							$query1->the_post();
							$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', true);
					?>
						<img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr(the_title()); ?>"/>
					
					<?php if($accesspress_show_caption == '1'): ?>
						<div class="slider-caption">
							<div class="ak-container">
								
								<div class="caption-content-wrapper">
									<h2 class="caption-title"><?php echo esc_attr(the_title());?></h2>
									<div class="caption-content">
										<?php echo accesspress_letter_count(get_the_content(), '165'); ?>
									</div>
								</div>

								<?php if($slider_button_text): ?>
									<a class="caption-read-more1" href="<?php echo esc_url($slider_button_link); ?>"><?php echo esc_attr($slider_button_text); ?></a>
								<?php endif; ?>

							</div>
						</div>
					<?php endif; ?>
					<?php
					}
						wp_reset_postdata();
					?>
				</div>
				<?php 
				endif; ?>
				<?php 
			} ?>

		</div>
		<?php  
		endif; ?>
	</section>
	<?php
}
add_action('accesspress_slickslider','accesspress_slidercb', 10);

if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}

if(is_woocommerce_activated()):
	function accesspress_wcmenucart() {
     //Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
		if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ))
			ob_start();
		global $woocommerce;
		$viewing_cart = __('View your shopping cart', 'accesspress-store');
		$start_shopping = __('Start shopping', 'accesspress-store');
		$cart_url = $woocommerce->cart->get_cart_url();
		$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
		$cart_contents_count = $woocommerce->cart->cart_contents_count;
		$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'accesspress-store'), $cart_contents_count);
		$cart_total = $woocommerce->cart->get_cart_total();
//        // Uncomment the line below to hide nav menu cart item when there are no items in the cart
//        // if ( $cart_contents_count > 0 ) {
		if ($cart_contents_count == 0) {
			$menu_item = '<div class="view-cart"><a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $viewing_cart .'">';
			$menu_item .= '<i class="fa fa-cart-plus"></i>';
			
		} else {
			$menu_item = '<div class="view-cart"><a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $viewing_cart .'">';
			$menu_item .= '<i class="fa fa-shopping-cart"></i> ';
			
		}
		$menu_item .= $cart_contents.' - '. $cart_total;
		$menu_item .= '</a></div>';
		
        // Uncomment the line below to hide nav menu cart item when there are no items in the cart
        // }
		echo $menu_item;
		$social = ob_get_clean();
		return $social;
	}

	add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

	function woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
		
		ob_start();
		$cart_url = $woocommerce->cart->get_cart_url();  
		?>
		<div class="view-cart"><a title="View your shopping cart" href="<?php echo $cart_url; ?>" class="wcmenucart-contents"><?php echo __('CART', 'accesspress-store'); ?> [ <?php echo $woocommerce->cart->cart_contents_count; ?> / <span class="amount"><?php echo $woocommerce->cart->get_cart_total(); ?></span> ]</a>
			<?php /*
			<ul class="sub-menu <?php if ( sizeof( WC()->cart->get_cart() ) < 1 ){ echo "empty";}?>">
				<?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>

					<?php
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
							$product_name  = apply_filters( 'woocommerce_cart_item_name',sprintf( '<a class="quick-cart-title" href="%s">%s </a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );
							$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
							$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							?>
							<li class="<?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
								<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">&times;</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'accesspress-store' ) ), $cart_item_key ); ?>
								<?php if ( ! $_product->is_visible() ) : ?>
									<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) . $product_name . '&nbsp;'; ?>
								<?php else : ?>
									<a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
										<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ) . $product_name . '&nbsp;'; ?>
									</a>
								<?php endif; ?>
								<?php echo WC()->cart->get_item_data( $cart_item ); ?>

								<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
							</li>
							<?php
						}
					}
					?>

				<?php else : ?>

					<li class="empty"><?php _e( 'No products in the cart.', 'accesspress-sore' ); ?></li>

				<?php endif; ?>

			</ul>
			*/ ?>
		</div>
		<?php
		$fragments['div.view-cart'] = ob_get_clean();
		return $fragments;
		
	}
	endif;

	function accesspress_footer_count(){
		$count = 0;
		if(is_active_sidebar('footer-1'))
			$count++;

		if(is_active_sidebar('footer-2'))
			$count++;

		if(is_active_sidebar('footer-3'))
			$count++;

		if(is_active_sidebar('footer-4'))
			$count++;

		return $count;
	}


	function accesspress_count_widgets( $sidebar_id ) {
	// If loading from front page, consult $_wp_sidebars_widgets rather than options
	// to see if wp_convert_widget_settings() has made manipulations in memory.
		global $_wp_sidebars_widgets;
		if ( empty( $_wp_sidebars_widgets ) ) :
			$_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
		endif;
		
		$sidebars_widgets_count = $_wp_sidebars_widgets;
		
		if ( isset( $sidebars_widgets_count[ $sidebar_id ] ) ) :
			$widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );
		$widget_classes = 'widget-count-' . count( $sidebars_widgets_count[ $sidebar_id ] );
		return $widget_classes;
		endif;
	}

	function accesspress_header_scripts(){
		$fav_icon = get_theme_mod('accesspress_favicon');
		$page_background_option = get_theme_mod('accesspress_background_type');
		$show_slider = get_theme_mod('show_slider');
		if(!empty($fav_icon)):
			?>
		<link rel="icon" type="image/png" href="<?php echo $fav_icon; ?>"> 
		<?php    
		endif;
		echo "<style>";
		echo "html body{";
		if($page_background_option == 'image'): 
			$background = get_theme_mod('background_image');
		echo 'background:url('.esc_url($background["image"]).') '.esc_attr($background["repeat"]).' '.esc_attr($background["position"]).' '.esc_attr($background["attachment"]).' '.esc_attr($background["color"]);
		elseif($page_background_option == 'color'): 
			echo 'background:'.esc_attr(get_theme_mod('background_color'));
		elseif($page_background_option == 'pattern'):
			echo 'background:url('.get_template_directory_uri().'/inc/option-framework/images/patterns/'.esc_attr(get_theme_mod("accesspress_background_image_pattern")).'.png)';
		else:
			echo 'background:none;';
		endif;
		echo "}";
		
		if($show_slider == '0'):
			echo '#masthead{margin-bottom:40px}';
		endif;
		if(get_theme_mod('hide_header_cart_link')):
			echo ".ap-store-cart{display:none;}";
		endif;
		echo "</style>";


	}
	add_action('wp_head', 'accesspress_header_scripts');

	function accesspress_bodyclass($classes){
		$classes[]= get_theme_mod('accesspress_webpage_layout');
		return $classes;
	}

	add_filter( 'body_class', 'accesspress_bodyclass' );


	/**
	 * Output the WooCommerce Breadcrumb
	 */
	function woocommerce_breadcrumb( $args = array() ) {
		$args = wp_parse_args( $args, apply_filters( 'woocommerce_breadcrumb_defaults', array(
			'delimiter'   => '&nbsp;',
			'wrap_before' => '<div class="woocommerce-breadcrumb accesspress-breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '>',
			'wrap_after'  => '</div>',
			'before'      => '',
			'after'       => '',
			'home'        => _x( 'Home', 'breadcrumb', 'accesspress-store' )
			) ) );

		$breadcrumbs = new WC_Breadcrumb();

		if ( $args['home'] ) {
			$breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
		}

		$args['breadcrumb'] = $breadcrumbs->generate();

		wc_get_template( 'global/breadcrumb.php', $args );
	}


	function accesspress_breadcrumbs() {
		global $post;
    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show

    $delimiter = '';
    
    $home = __('Home', 'accesspress-store'); // text for the 'Home' link

    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb

    $homeLink = home_url();

    if (is_home() || is_front_page()) {

    	if ($showOnHome == 1)
    		echo '<div id="accesspress-breadcrumb"><a href="' . $homeLink . '">' . $home . '</a></div></div>';
    } else {

    	echo '<div id="accesspress-breadcrumb"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

    	if (is_category()) {
    		$thisCat = get_category(get_query_var('cat'), false);
    		if ($thisCat->parent != 0)
    			echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
    		echo $before . __('Archive by category','accesspress-store').' "' . single_cat_title('', false) . '"' . $after;
    	} elseif (is_search()) {
    		echo $before . __('Search results for','accesspress-store'). '"' . get_search_query() . '"' . $after;
    	} elseif (is_day()) {
    		echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
    		echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
    		echo $before . get_the_time('d') . $after;
    	} elseif (is_month()) {
    		echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
    		echo $before . get_the_time('F') . $after;
    	} elseif (is_year()) {
    		echo $before . get_the_time('Y') . $after;
    	} elseif (is_single() && !is_attachment()) {
    		if (get_post_type() != 'post') {
    			$post_type = get_post_type_object(get_post_type());
    			$slug = $post_type->rewrite;
    			echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
    			if ($showCurrent == 1)
    				echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
    		} else {
    			$cat = get_the_category();
    			$cat = $cat[0];
    			$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
    			if ($showCurrent == 0)
    				$cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
    			echo $cats;
    			if ($showCurrent == 1)
    				echo $before . get_the_title() . $after;
    		}
    	} elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
    		$post_type = get_post_type_object(get_post_type());
    		echo $before . $post_type->labels->singular_name . $after;
    	} elseif (is_attachment()) {
    		$parent = get_post($post->post_parent);
    		$cat = get_the_category($parent->ID);
    		$cat = $cat[0];
    		echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
    		echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
    		if ($showCurrent == 1)
    			echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
    	} elseif (is_page() && !$post->post_parent) {
    		if ($showCurrent == 1)
    			echo $before . get_the_title() . $after;
    	} elseif (is_page() && $post->post_parent) {
    		$parent_id = $post->post_parent;
    		$breadcrumbs = array();
    		while ($parent_id) {
    			$page = get_page($parent_id);
    			$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
    			$parent_id = $page->post_parent;
    		}
    		$breadcrumbs = array_reverse($breadcrumbs);
    		for ($i = 0; $i < count($breadcrumbs); $i++) {
    			echo $breadcrumbs[$i];
    			if ($i != count($breadcrumbs) - 1)
    				echo ' ' . $delimiter . ' ';
    		}
    		if ($showCurrent == 1)
    			echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
    	} elseif (is_tag()) {
    		echo $before . __('Posts tagged','accesspress-store').' "' . single_tag_title('', false) . '"' . $after;
    	} elseif (is_author()) {
    		global $author;
    		$userdata = get_userdata($author);
    		echo $before . __('Articles posted by ','accesspress-store'). $userdata->display_name . $after;
    	} elseif (is_404()) {
    		echo $before . 'Error 404' . $after;
    	}

    	if (get_query_var('paged')) {
    		if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
    			echo ' (';
    				echo __('Page', 'accesspress-store') . ' ' . get_query_var('paged');
    				if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
    					echo ')';
}

echo '</div>';
}
}

function accesspress_letter_count($content, $limit) {
	$striped_content = strip_tags($content);
	$striped_content = strip_shortcodes($striped_content);
	$limit_content = mb_substr($striped_content, 0 , $limit );

	if($limit_content < $content){
		$limit_content .= "..."; 
	}
	return $limit_content;
}

if(is_woocommerce_activated()){
	function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
		global $post;

		if ( has_post_thumbnail() ) {
			return get_the_post_thumbnail( $post->ID, $size );
		} elseif ( wc_placeholder_img_src() ) {
			$placeholder = accesspress_woocommerce_placeholder_img_src();
			$alt = get_the_title();
			$placeholder_img = '<img src="'.$placeholder.'" alt="'.$alt.'" />';
			return $placeholder_img;
		}
	}
	function accesspress_woocommerce_placeholder_img_src(){
		$placeholder = "";
		$custom_placeholder = get_theme_mod('custom_placeholder');
		if($custom_placeholder!='')
		{
			$placeholder = $custom_placeholder;
		}
		else
		{
			$placeholder = wc_placeholder_img_src();
		}
		return $placeholder;
	}

	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );

	add_filter( 'wc_product_sku_enabled', '__return_true' );


	/**
	 * WooCommerce Extra Feature
	 * --------------------------
	 *
	 * Change number of related products on product page
	 * Set your own value for 'posts_per_page'
	 *
	 */ 
	function woo_related_products_limit() {
		global $product;

		$args['posts_per_page'] = 3;
		return $args;
	}
	add_filter( 'woocommerce_output_related_products_args', 'as_related_products_args' );
	function as_related_products_args( $args ) {
		$args['posts_per_page'] = 3; // 3 related products
		return $args;
	}

	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
	add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );

	if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
		function woocommerce_output_upsells() {
		    woocommerce_upsell_display( 2,1 ); 
		    // Display 3 products in rows of 3
		}
	}
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
	if($item->title == "Cart"){ 
		$classes[] = "ap-store-cart";
	}
	return $classes;
}

// register_nav_menus( array(
// 	'custom_header_menu' => 'Custom Header Menu'
// 	) );

function as_before_top_header_enabled()
{
	if(is_user_logged_in() || get_theme_mod('accesspress_ticker_checkbox')===1)
	{
		return true;
	}
	else
	{
		return false;
	}
}

//Declare Woocommerce support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}

function custom_fallback_menu(){
	$args = array(
		'menu_class'  => 'store-menu',
		'echo'        => true,);
	wp_page_menu( $args );
}

/**
 * Load Options Plugin Activation
 */
require get_template_directory() . '/inc/accesspress-plugin-activation.php';

function accesspress_store_register_required_plugins() {

    $plugins = array(
        array(
            'name' => 'AccessPress Instagram Feed',
            'slug' => 'accesspress-instagram-feed',
            'required' => false,
        ),
        array(
            'name' => 'AccessPress Twitter Feed',
            'slug' => 'accesspress-twitter-feed',
            'required' => false,
        ),
        array(
            'name' => 'AccessPress Social Icons',
            'slug' => 'accesspress-social-icons',
            'required' => false,
        ),
        array(
            'name' => 'WooCommerce',
            'slug' => 'woocommerce',
            'required' => false,
        ),        
        array(
            'name' => 'WooCommerce Grid / List toggle',
            'slug' => 'woocommerce-grid-list-toggle',
            'required' => false,
        ),
        array(
            'name' => 'YITH WooCommerce Wishlist',
            'slug' => 'yith-woocommerce-wishlist',
            'required' => false,
        ),
        array(
            'name' => 'Email Subscribers',
            'slug' => 'email-subscribers',
            'required' => false,
        )
    );

    $config = array(
        'id' => 'tgmpa', // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '', // Default absolute path to pre-packaged plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'parent_slug' => 'themes.php', // Parent menu slug.
        'capability' => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.
        'strings' => array(
            'page_title' => __('Install Required Plugins', 'accesspress-store'),
            'menu_title' => __('Install Plugins', 'accesspress-store'),
            'installing' => __('Installing Plugin: %s', 'accesspress-store'), // %s = plugin name.
            'oops' => __('Something went wrong with the plugin API.', 'accesspress-store'),
            'notice_can_install_required' => _n_noop(
                    'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'accesspress-store'
            ), // %1$s = plugin name(s).
            'notice_can_install_recommended' => _n_noop(
                    'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'accesspress-store'
            ), // %1$s = plugin name(s).
            'notice_cannot_install' => _n_noop(
                    'Sorry, but you do not have the correct permissions to install the %1$s plugin.', 'Sorry, but you do not have the correct permissions to install the %1$s plugins.', 'accesspress-store'
            ), // %1$s = plugin name(s).
            'notice_ask_to_update' => _n_noop(
                    'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'accesspress-store'
            ), // %1$s = plugin name(s).
            'notice_ask_to_update_maybe' => _n_noop(
                    'There is an update available for: %1$s.', 'There are updates available for the following plugins: %1$s.', 'accesspress-store'
            ), // %1$s = plugin name(s).
            'notice_cannot_update' => _n_noop(
                    'Sorry, but you do not have the correct permissions to update the %1$s plugin.', 'Sorry, but you do not have the correct permissions to update the %1$s plugins.', 'accesspress-store'
            ), // %1$s = plugin name(s).
            'notice_can_activate_required' => _n_noop(
                    'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'accesspress-store'
            ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop(
                    'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'accesspress-store'
            ), // %1$s = plugin name(s).
            'notice_cannot_activate' => _n_noop(
                    'Sorry, but you do not have the correct permissions to activate the %1$s plugin.', 'Sorry, but you do not have the correct permissions to activate the %1$s plugins.', 'accesspress-store'
            ), // %1$s = plugin name(s).
            'install_link' => _n_noop(
                    'Begin installing plugin', 'Begin installing plugins', 'accesspress-store'
            ),
            'update_link' => _n_noop(
                    'Begin updating plugin', 'Begin updating plugins', 'accesspress-store'
            ),
            'activate_link' => _n_noop(
                    'Begin activating plugin', 'Begin activating plugins', 'accesspress-store'
            ),
            'return' => __('Return to Required Plugins Installer', 'accesspress-store'),
            'plugin_activated' => __('Plugin activated successfully.', 'accesspress-store'),
            'activated_successfully' => __('The following plugin was activated successfully:', 'accesspress-store'),
            'plugin_already_active' => __('No action taken. Plugin %1$s was already active.', 'accesspress-store'), // %1$s = plugin name(s).
            'plugin_needs_higher_version' => __('Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'accesspress-store'), // %1$s = plugin name(s).
            'complete' => __('All plugins installed and activated successfully. %1$s', 'accesspress-store'), // %s = dashboard link.
            'contact_admin' => __('Please contact the administrator of this site for help.', 'accesspress-store'),
            'nag_type' => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa($plugins, $config);
}

add_action('tgmpa_register', 'accesspress_store_register_required_plugins');

