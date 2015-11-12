<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package martable
 */

get_header(); ?>

	<?php if(get_theme_mod('martable_show_front_welcome_section', 'yes') != 'no'):?>
	<div class="content-area-full">
		<main class="site-main" role="main">
        
			<div class="ecom-welcome">
            	<h2>
                    <?php 
                        if( get_theme_mod('martable_frontpage_welcome_heading') ){
                            echo esc_html( get_theme_mod('martable_frontpage_welcome_heading') );
                        }else {
                            _e('Welcome to Our Shop',  'martable');
                        }
                    ?>                  
                </h2>
                <p>
                    <?php 
                        if( get_theme_mod('martable_frontpage_welcome_text') ){
                            echo esc_html( get_theme_mod('martable_frontpage_welcome_text') );
                        }else {
                            _e('You can change this text in front page welcome text box in front page options tab of customizer in Appearance section of dashboard. Write something awesome.',  'martable');
                        }
                    ?>                 
                </p>
            </div> 
            
		</main><!-- .site-main -->
	</div><!-- .content-area-full -->            
	<?php endif; ?>
    
	<?php 
		
		if( get_theme_mod('martable_show_frontpage_posts', 'two') != 'three' ){
			
			get_template_part('template', 'ecom');
		
		}
		
		if( get_theme_mod('martable_show_frontpage_posts', 'two') != 'one' ){
			if( 'page' == get_option( 'show_on_front' ) ){
				get_template_part('template', 'page');
			}else{
				get_template_part('template', 'posts');
			}
		}
		
	?>

<?php get_footer(); ?>
