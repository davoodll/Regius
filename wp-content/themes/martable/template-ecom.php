	<div class="content-area-full">
		<main class="site-main" role="main">

		<?php
			$martable_front_page_ecom = array(
				'post_type' => 'product',
				'paged' => get_query_var('paged')
			);
			$martable_front_page_ecom['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			$martable_front_page_ecom_the_query = new WP_Query( $martable_front_page_ecom );
			
			$martable_front_page_temp_query = $wp_query;
			$wp_query   = NULL;
			$wp_query   = $martable_front_page_ecom_the_query;        
		?>
        
		<?php if ( have_posts() && post_type_exists('product') ) : ?>
		<div class="ecom-products-container">

			<?php /* Start the Loop */ ?>
			<?php $ecom_i = 0; while ( $martable_front_page_ecom_the_query->have_posts() ) : $martable_front_page_ecom_the_query->the_post();  $ecom_i++; ?>

            	<div class="<?php if( (($ecom_i - 1) % 3) == 0 ){ echo 'ecom-clear-both '; } ?> ecom-product <?php if( ($ecom_i % 3) == 0 ){ echo 'ecom-third-product'; } ?>">
                
                	<div class="ecom-product-image">
                        <?php the_post_thumbnail('ecomproduct'); ?>
                    </div><!-- .ecom-product-image -->
                    
                    <div class="ecom-product-desc-cont">
                    
                        <?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                        <?php the_excerpt(); ?>
                    
                    </div><!-- .ecom-product-desc-cont -->
                    
                    <div class="ecom-product-price-cont">
                    	<?php 
							$ecom_product = new WC_Product( get_the_ID() );
							$ecom_price = $ecom_product->get_price_html();
							if( $ecom_price ){
							echo '<p class="ecom-product-price"><span>'.$ecom_price.'</span></p>';
							}
						?>
                        <p class="ecom-product-buy"><span><a href="<?php echo esc_url( get_permalink() ); ?>">Buy Now</a></span></p>
                    </div><!-- .ecom-product-price-cont -->                  
                
                </div><!-- .ecom-product -->

			<?php endwhile; ?>
            
        </div>
        
        <?php martable_paging_nav(); ?>

		<?php else : ?>

			<div class="ecom-products-container">
            
            	<div class="ecom-product">
                
                	<div class="ecom-product-image">
                    	<img src="<?php echo get_template_directory_uri(); ?>/images/01.jpg" />
                    </div><!-- .ecom-product-image -->
                    
                    <div class="ecom-product-desc-cont">
                    
                    	<h2>Product Name</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in augue purus.</p>
                    
                    </div><!-- .ecom-product-desc-cont -->
                    
                    <div class="ecom-product-price-cont">
                    	<p class="ecom-product-price"><span>$35</span></p>
                        <p class="ecom-product-buy"><span><a href="#">Buy Now</a></span></p>
                    </div><!-- .ecom-product-price-cont -->                  
                
                </div><!-- .ecom-product -->
                
            	<div class="ecom-product">
                
                	<div class="ecom-product-image">
                    	<img src="<?php echo get_template_directory_uri(); ?>/images/02.jpg" />
                    </div><!-- .ecom-product-image -->
                    
                    <div class="ecom-product-desc-cont">
                    
                    	<h2>Product Name</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in augue purus.</p>
                    
                    </div><!-- .ecom-product-desc-cont -->
                    
                    <div class="ecom-product-price-cont">
                    	<p class="ecom-product-price"><span>$35</span></p>
                        <p class="ecom-product-buy"><span><a href="#">Buy Now</a></span></p>
                    </div><!-- .ecom-product-price-cont -->                  
                
                </div><!-- .ecom-product -->
                
            	<div class="ecom-product ecom-third-product">
                
                	<div class="ecom-product-image">
                    	<img src="<?php echo get_template_directory_uri(); ?>/images/03.jpg" />
                    </div><!-- .ecom-product-image -->
                    
                    <div class="ecom-product-desc-cont">
                    
                    	<h2>Product Name</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in augue purus.</p>
                    
                    </div><!-- .ecom-product-desc-cont -->
                    
                    <div class="ecom-product-price-cont">
                    	<p class="ecom-product-price"><span>$35</span></p>
                        <p class="ecom-product-buy"><span><a href="#">Buy Now</a></span></p>
                    </div><!-- .ecom-product-price-cont -->                  
                
                </div><!-- .ecom-product -->                                
            
            </div><!-- .ecom-products-container -->
		
		<?php 
			
			endif; 
			wp_reset_postdata(); 
			$wp_query = NULL;
			$wp_query = $martable_front_page_temp_query;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->