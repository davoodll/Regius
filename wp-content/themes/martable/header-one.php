    <div class="header-one">
        
        <div class="responsive-container">
       
       		<div class="header-one-overlay">
            
            	<h1>
                	<?php
						if( get_theme_mod('martable_header_one_name') ){
							echo get_theme_mod('martable_header_one_name');
						}else{
							echo "Ecommerce Theme";
						}
					?>
                </h1>
                <p>
                	<?php
						if( get_theme_mod('martable_header_one_text') ){
							echo get_theme_mod('martable_header_one_text');
						}else{
							echo "Ecommerce Theme with header, product section and social icons.";
						}
					?>                
                </p>
                <p>
                <a href="<?php (get_theme_mod('martable_header_one_cta_link')) ? $martable_header_link = get_theme_mod('martable_header_one_cta_link') : $martable_header_link = "#"; echo $martable_header_link; ?>">
                	<?php
						if( get_theme_mod('martable_header_one_cta') ){
							echo get_theme_mod('martable_header_one_cta');
						}else{
							echo "Download Now";
						}
					?>                
                </a>
                </p>
            
            </div><!-- .header-one-content -->
        
        </div>
         
    </div>