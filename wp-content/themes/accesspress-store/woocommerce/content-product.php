<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if (empty($woocommerce_loop['loop']))
    $woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if (empty($woocommerce_loop['columns']))
    $woocommerce_loop['columns'] = apply_filters('loop_shop_columns', 3);

// Ensure visibility
if (!$product || !$product->is_visible())
    return;

// Increase loop count
$woocommerce_loop['loop'] ++;

// Extra post classes
$classes = array();
if (0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'])
    $classes[] = 'first';
if (0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'])
    $classes[] = 'last';
?>
<li <?php post_class($classes); ?>>
    <?php do_action('woocommerce_before_shop_loop_item'); ?>
    <div class="collection_combine">
        <a href="<?php the_permalink(); ?>" class="full-outer">
            <div class="outer-img">
                <div class="inner-img">
                    <?php
                    /**
                     * woocommerce_before_shop_loop_item_title hook
                     *
                     * @hooked woocommerce_show_product_loop_sale_flash - 10
                     * @hooked woocommerce_template_loop_product_thumbnail - 10
                     */
                    do_action('woocommerce_before_shop_loop_item_title');
                    ?>
                </div>
            </div>
        </a>
        <?php
        if (function_exists('YITH_WCWL')) {
            $url = add_query_arg('add_to_wishlist', $product->id);
            ?>
            <a class="item-wishlist" href="<?php echo $url ?>">Whishlist</a>
            <?php
        }
        ?>
    </div>
    <div class="collection_desc clearfix">
        <a href="<?php the_permalink(); ?>" class="collection_title">
            <h3><?php the_title(); ?></h3>
            <p class="short_desc"><?php echo accesspress_letter_count(get_the_excerpt(), 20); ?></p>
        </a>
        <div class="price-cart">
            <?php
            /**
             * woocommerce_after_shop_loop_item_title hook
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            do_action('woocommerce_after_shop_loop_item_title');
            remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
            /**
             * woocommerce_after_shop_loop_item hook
             *
             * @hooked woocommerce_template_loop_add_to_cart - 10
             */
            do_action('woocommerce_after_shop_loop_item');
            ?>
        </div>
    </div>
</li>
<?php if (0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns']) { ?>
    <li class='space clearfix'></li>
<?php } ?>
