<?php
class WCML_Product_Bundles{
    function __construct(){
		add_action('wcml_gui_additional_box',array($this,'product_bundles_box'),10,3);
		add_action('wcml_after_duplicate_product_post_meta',array($this,'sync_bundled_ids'),10,3);
		add_action('wcml_extra_titles',array($this,'product_bundles_title'),10,1);
		add_action('wcml_update_extra_fields',array($this,'bundle_update'),10,2);
		add_action('woocommerce_get_cart_item_from_session', array( $this, 'resync_bundle'),5,3);
		add_filter('woocommerce_cart_loaded_from_session', array($this, 'resync_bundle_clean'),10);
		add_filter('wcml_exception_duplicate_products_in_cart', array($this, 'bundles_duplicate_exception'),10,2);
    }
    // Sync Bundled product '_bundle_data' with translated values when the product is duplicated
    function sync_bundled_ids($original_product_id, $trnsl_product_id, $data = false){
        global $sitepress;
        $atts = maybe_unserialize(get_post_meta($original_product_id, '_bundle_data', true));
        if( $atts ){
            $lang = $sitepress->get_language_for_element($trnsl_product_id,'post_product');
            $tr_ids = array();
            $i = 2;
            foreach($atts as $id=>$bundle_data){
                $tr_id = apply_filters( 'translate_object_id',$id,get_post_type($id),true,$lang);
                if(isset($tr_bundle[$tr_id])){
                    $bundle_key = $tr_id.'_'.$i;
                    $i++;
                }else{
                    $bundle_key = $tr_id;
                }
                $tr_bundle[$bundle_key] = $bundle_data;
                $tr_bundle[$bundle_key]['product_id'] = $tr_id;
                if(isset($bundle_data['product_title'])){
                    if($bundle_data['override_title']=='yes'){
                        $tr_bundle[$bundle_key]['product_title'] =  '';
                    }else{
                        $tr_title= get_the_title($tr_id);
                        $tr_bundle[$bundle_key]['product_title'] =  $tr_title;
                    }
                }
                if(isset($bundle_data['product_description'])){
                    if($bundle_data['override_description']=='yes'){
                        $tr_bundle[$bundle_key]['product_description'] =  '';
                    }else{
                        $tr_prod = get_post($tr_id);
                        $tr_desc = $tr_prod->post_excerpt;
                        $tr_bundle[$bundle_key]['product_description'] =  $tr_desc;
                    }
                }
                if(isset($bundle_data['filter_variations']) && $bundle_data['filter_variations']=='yes'){
                    $allowed_var = $bundle_data['allowed_variations'];
                    foreach($allowed_var as $key=>$var_id){
                        $tr_var_id = apply_filters( 'translate_object_id',$var_id,get_post_type($var_id),true,$lang);
                        $tr_bundle[$bundle_key]['allowed_variations'][$key] =  $tr_var_id;
                    }
                }
                if(isset($bundle_data['bundle_defaults']) && !empty($bundle_data['bundle_defaults'])){
                    foreach($bundle_data['bundle_defaults'] as $tax=>$term_slug){
                        global $woocommerce_wpml;
                        $term_id = $woocommerce_wpml->products->wcml_get_term_id_by_slug( $tax, $term_slug );
                        if( $term_id ){
                            // Global Attribute
                            $tr_def_id = apply_filters( 'translate_object_id',$term_id,$tax,true,$lang);
                            $tr_term = $woocommerce_wpml->products->wcml_get_term_by_id( $tr_def_id, $tax );
                            $tr_bundle[$bundle_key]['bundle_defaults'][$tax] =  $tr_term->slug;
                        }else{
                            // Custom Attribute
                            $args = array( 'post_type' => 'product_variation', 'meta_key' => 'attribute_'.$tax,  'meta_value' => $term_slug, 'meta_compare' => '=');
                            $variationloop = new WP_Query( $args );
                            while ( $variationloop->have_posts() ) : $variationloop->the_post();
                                $tr_var_id = apply_filters( 'translate_object_id',get_the_ID(),'product_variation',true,$lang);
                                $tr_meta = get_post_meta($tr_var_id, 'attribute_'.$tax , true);
                                $tr_bundle[$bundle_key]['bundle_defaults'][$tax] =  $tr_meta;
                            endwhile;
                        }
                    }
                }
            }
            update_post_meta($trnsl_product_id,'_bundle_data',$tr_bundle);
        }
    }
    // Update Bundled products title and descritpion after saving the translation
    function bundle_update($tr_id, $data){
    	global $sitepress;
    	$tr_bundle_data = array();
    	$tr_bundle_data = maybe_unserialize(get_post_meta($tr_id,'_bundle_data', true));
    	if(!empty($data['bundles'])){
	    	foreach($data['bundles'] as $bundle_id => $bundle_data){
	    		if(isset($tr_bundle_data[$bundle_id])){
	    			$tr_bundle_data[$bundle_id]['product_title'] = $bundle_data['bundle_title'];
	    			$tr_bundle_data[$bundle_id]['product_description'] = $bundle_data['bundle_desc'];
	    		}
	    	}
		    update_post_meta( $tr_id, '_bundle_data', $tr_bundle_data );
		    $tr_bundle_data = array();
    	}
    }
    // Add 'Product Bundles' title to the WCML Product GUI if the current product is a bundled product
    function product_bundles_title($product_id){
    	$bundle_data = maybe_unserialize(get_post_meta($product_id,'_bundle_data', true));
    	if(!empty($bundle_data) && $bundle_data!=false){ ?>
	        <th scope="col"><?php _e('Product Bundles', 'wcml_product_bundles'); ?></th>
        <?php }
    }
    // Add Bundles Box to WCML Translation GUI
    function product_bundles_box($product_id,$lang, $is_duplicate_product = false ) {
        global $sitepress, $woocommerce_wpml;
        $isbundle = true;
        $translated = true;
        $template_data = array();
        $default_language = $woocommerce_wpml->products->get_original_product_language( $product_id );
        if($default_language != $lang){
            $tr_product_id = apply_filters( 'translate_object_id',$product_id, 'product', true, $lang);
            if($tr_product_id == $product_id){
	            $translated = false;
            }else{
	            $product_id = $tr_product_id;
            }
        }
        $bundle_data = maybe_unserialize(get_post_meta($product_id,'_bundle_data', true));
        if(empty($bundle_data) || $bundle_data==false){
	        $isbundle = false;
        }
        if(!$isbundle){
	        return;
        }
        if($default_language == $lang){
            $template_data['original'] = true;
        }else{
            $template_data['original'] = false;
        }
        if (!$translated ) {
        	$template_data['empty_translation'] = true;
            $template_data['product_bundles'] = array();
        }else{
            $product_bundles = array_keys($bundle_data);
            $k = 0;
			foreach($product_bundles as $original_id){
				$tr_bundles_ids[$k] = apply_filters( 'translate_object_id',$original_id,'product',false,$lang);
				$k++;
			}
			$template_data['product_bundles'] = $tr_bundles_ids;
			$tr_bundles_ids = $template_data['product_bundles'];
            if (empty($tr_bundles_ids)) {
                $template_data['empty_bundles'] = true;
                $template_data['product_bundles'] = array();
            } else {
                if ($default_language == $lang) {
                    $template_data['product_bundles'] = $tr_bundles_ids;
                }
                foreach ($product_bundles as $bundle_id) {
                	$bundles_texts = array();
                    $bundle_name = get_the_title($bundle_id);
                    if(isset($bundle_data[$bundle_id]['override_title']) && $bundle_data[$bundle_id]['override_title']=='yes'){
                    	$bundle_title = $bundle_data[$bundle_id]['product_title'];
                    	$template_data['bundles_data'][$bundle_name]['override_bundle_title'] = 'yes';
                    }else{
	                    $bundle_title = get_the_title($bundle_id);
                    }
                    if(isset($bundle_data[$bundle_id]['override_description']) && $bundle_data[$bundle_id]['override_description']=='yes'){
                    	$bundle_desc = $bundle_data[$bundle_id]['product_description'];
                    	$template_data['bundles_data'][$bundle_name]['override_bundle_desc'] = 'yes';
                    }else{
                    	$bundle_prod = get_post($bundle_id);
					    $bundle_desc = $bundle_prod->post_excerpt;
                    }
                    $template_data['bundles_data'][$bundle_name]['bundle_title'] = $bundle_title;
                    $template_data['bundles_data'][$bundle_name]['bundle_desc'] = $bundle_desc;
                }
            }
        }
        include WCML_PLUGIN_PATH . '/compatibility/templates/bundles_box.php';
    }
    function resync_bundle( $cart_item, $session_values, $cart_item_key ) {
    	if ( isset( $cart_item[ 'bundled_items' ] ) && $cart_item[ 'data' ]->product_type === 'bundle' ) {
    		$current_bundle_id = apply_filters( 'translate_object_id', $cart_item[ 'product_id' ], 'product', true );
			if ( $cart_item[ 'product_id' ] != $current_bundle_id ) {
				$old_bundled_item_ids      = array_keys( $cart_item[ 'data' ]->bundle_data );
				$cart_item[ 'data' ]       = wc_get_product( $current_bundle_id );
				$new_bundled_item_ids      = array_keys( $cart_item[ 'data' ]->bundle_data );
				$remapped_bundled_item_ids = array();
				foreach ( $old_bundled_item_ids as $old_item_id_index => $old_item_id ) {
    				$remapped_bundled_item_ids[ $old_item_id ] = $new_bundled_item_ids[ $old_item_id_index ];
    			}
    			$cart_item[ 'remapped_bundled_item_ids' ] = $remapped_bundled_item_ids;
    			if ( isset( $cart_item[ 'stamp' ] ) ) {
    				$new_stamp = array();
    				foreach ( $cart_item[ 'stamp' ] as $bundled_item_id => $stamp_data ) {
    					$new_stamp[ $remapped_bundled_item_ids[ $bundled_item_id ] ] = $stamp_data;
    				}
    				$cart_item[ 'stamp' ] = $new_stamp;
    			}
			}
    	}
    	if ( isset( $cart_item[ 'bundled_by' ] ) && isset( WC()->cart->cart_contents[ $cart_item[ 'bundled_by' ] ] ) ) {
    		$bundle_cart_item = WC()->cart->cart_contents[ $cart_item[ 'bundled_by' ] ];
    		if ( isset( $bundle_cart_item[ 'remapped_bundled_item_ids' ] ) && isset( $cart_item[ 'bundled_item_id' ] ) && isset( $bundle_cart_item[ 'remapped_bundled_item_ids' ][ $cart_item[ 'bundled_item_id' ] ] ) ) {
				$old_id                         = $cart_item[ 'bundled_item_id' ];
				$remapped_bundled_item_ids      = $bundle_cart_item[ 'remapped_bundled_item_ids' ];
				$cart_item[ 'bundled_item_id' ] = $remapped_bundled_item_ids[ $cart_item[ 'bundled_item_id' ] ];
    			if ( isset( $cart_item[ 'stamp' ] ) ) {
    				$new_stamp = array();
    				foreach ( $cart_item[ 'stamp' ] as $bundled_item_id => $stamp_data ) {
    					$new_stamp[ $remapped_bundled_item_ids[ $bundled_item_id ] ] = $stamp_data;
    				}
    				$cart_item[ 'stamp' ] = $new_stamp;
    			}
    		}
    	}
    	return $cart_item;
    }
    function resync_bundle_clean( $cart ) {
    	foreach ( $cart->cart_contents as $cart_item_key => $cart_item ) {
	    	if ( isset( $cart_item[ 'bundled_items' ] ) && $cart_item[ 'data' ]->product_type === 'bundle' ) {
	    		if ( isset( $cart_item[ 'remapped_bundled_item_ids' ] ) ) {
	    			unset( WC()->cart->cart_contents[ $cart_item_key ][ 'remapped_bundled_item_ids' ] );
	    		}
	    	}
    	}
    }
	function bundles_duplicate_exception( $exclude, $cart_item ) {
		if ( isset( $cart_item[ 'bundled_items' ] ) || isset( $cart_item[ 'bundled_by' ] ) ) {
			$exclude = true;
		}
		return $exclude;
	}
}
