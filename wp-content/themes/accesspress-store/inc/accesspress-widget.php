<?php
/**
 * AccessPress Pro Custom Widgets
 *
 * @package Accesspress Pro
 */

/**
 * Include helper functions that display widget fields in the dashboard
 *
 * @since Accesspress Widget Pack 1.0
 */
require get_template_directory() . '/inc/widgets/widget-fields.php';

/**
 * Include helper functions that display widget fields in the dashboard
 *
 * @since Accesspress Widget Pack 1.0
 */
require get_template_directory() . '/inc/widgets/widget-icon-text.php';

/**
 * Include helper functions that display widget fields in the dashboard
 *
 * @since Accesspress Widget Pack 1.0
 */
require get_template_directory() . '/inc/widgets/widget-cta-simple.php';


/**
 * Include helper functions that display widget fields in the dashboard
 *
 * @since Accesspress Widget Pack 1.0
 */
require get_template_directory() . '/inc/widgets/widget-promo.php';

/**
 * Include helper functions that display widget fields in the dashboard
 *
 * @since Accesspress Widget Pack 1.0
 */
/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    require get_template_directory() . '/inc/widgets/widget-product1.php';
}

/**
 * Include helper functions that display widget fields in the dashboard
 *
 * @since Accesspress Widget Pack 1.0
 */
/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
   require get_template_directory() . '/inc/widgets/widget-product2.php';
}

/**
 * Include helper functions that display widget fields in the dashboard
 *
 * @since Accesspress Widget Pack 1.0
 */
require get_template_directory() . '/inc/widgets/widget-cta-video.php';