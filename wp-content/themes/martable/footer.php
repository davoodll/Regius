<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package martable
 */
?>
    
	</div><!-- #content -->

	<?php if(get_theme_mod('martable_show_social_section', 'yes') != 'no'):?>
    <div class="footer-social">
    <div class="responsive-container">
    	<div class="footer_social_icons">

                	<?php if(get_theme_mod('martable_social_facebook')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_facebook')); ?>">&#xf09a;</a></span>
                    <?php endif; ?>
					<?php if(get_theme_mod('martable_social_twitter')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_twitter')); ?>">&#xf099;</a></span>
                    <?php endif; ?>
                	<?php if(get_theme_mod('martable_social_behance')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_behance')); ?>">&#xf1b4;</a></span>
                    <?php endif; ?>
					<?php if(get_theme_mod('martable_social_bitbucket')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_bitbucket')); ?>">&#xf171;</a></span>
                    <?php endif; ?>
					<?php if(get_theme_mod('martable_social_github')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_github')); ?>">&#xf113;</a></span>
                	<?php endif; ?>
					<?php if(get_theme_mod('martable_social_instagram')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_instagram')); ?>">&#xf16d;</a></span> 
                    <?php endif; ?>
					<?php if(get_theme_mod('martable_social_youtube')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_youtube')); ?>">&#xf167;</a></span>
                    <?php endif; ?>
					<?php if(get_theme_mod('martable_social_dribble')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_dribble')); ?>">&#xf17d;</a></span>
                	<?php endif; ?>
					<?php if(get_theme_mod('martable_social_googleplus')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_googleplus')); ?>">&#xf0d5;</a></span>
                    <?php endif; ?>
					<?php if(get_theme_mod('martable_social_tumblr')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_tumblr')); ?>">&#xf173;</a></span>
                    <?php endif; ?>
					<?php if(get_theme_mod('martable_social_vine')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_vine')); ?>">&#xf1ca;</a></span>  
                    <?php endif; ?>
					<?php if(get_theme_mod('martable_social_wp')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_wp')); ?>">&#xf19a;</a></span>
                	<?php endif; ?>
					<?php if(get_theme_mod('martable_social_spotify')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_spotify')); ?>">&#xf1bc;</a></span>
                    <?php endif; ?>
					<?php if(get_theme_mod('martable_social_soundcloud')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_soundcloud')); ?>">&#xf1be;</a></span>
                    <?php endif; ?>
					<?php if(get_theme_mod('martable_social_reddit')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_reddit')); ?>">&#xf1a1;</a></span> 
                    <?php endif; ?>
					<?php if(get_theme_mod('martable_social_pinterest')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_pinterest')); ?>">&#xf0d2;</a></span>
                    <?php endif; ?>
					<?php if(get_theme_mod('martable_social_linkedin')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_linkedin')); ?>">&#xf0e1;</a></span>
                	<?php endif; ?>
					<?php if(get_theme_mod('martable_social_flickr')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_flickr')); ?>">&#xf16e;</a></span>  
                    <?php endif; ?>
					<?php if(get_theme_mod('martable_social_stackexchange')):?>
                    <span><a href="<?php echo esc_url(get_theme_mod('martable_social_stackexchange')); ?>">&#xf16c;</a></span>
                    <?php endif; ?> 
    
    	</div><!-- .footer-social -->
    </div><!-- .responsive-container -->    
    </div><!-- .footer-social -->
    <?php endif; ?>
    
	<footer id="colophon" class="site-footer" role="contentinfo">
    	<div class="site-info-container">
            <div class="site-info">
            	<div class="bottom-site-name">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </div>
                <p><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'martable' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'martable' ), 'WordPress' ); ?></a></p>
            </div><!-- .site-info -->
        </div><!-- .site-info-container -->    
        <div class="bottom-footer-widget-left">

            	<?php if ( dynamic_sidebar('bottom-footer-left') ){ } else { ?>

                    <aside id="meta" class="widget">
                        <h1 class="widget-title"><?php _e( 'Footer Left', 'martable' ); ?></h1>
                        <ul>
                            <?php wp_register(); ?>
                            <li><?php wp_loginout(); ?></li>
                            <?php wp_meta(); ?>
                        </ul>
                    </aside>                                                                                
                                                                                
                <?php } ?>              
            
        </div><!-- .footer-widget-left -->
        <div class="bottom-footer-widget-center">
            
            	<?php if ( dynamic_sidebar('bottom-footer-center') ){ } else { ?>

                    <aside id="meta" class="widget">
                        <h1 class="widget-title"><?php _e( 'Footer Center', 'martable' ); ?></h1>
                        <ul>
                            <?php wp_register(); ?>
                            <li><?php wp_loginout(); ?></li>
                            <?php wp_meta(); ?>
                        </ul>
                    </aside>                                                                                
                                                                                
                <?php } ?>             
            
        </div><!-- .footer-widget-center -->
        <div class="bottom-footer-widget-right">

            	<?php if ( dynamic_sidebar('bottom-footer-right') ){ } else { ?>

                    <aside id="meta" class="widget">
                        <h1 class="widget-title"><?php _e( 'Footer Right', 'martable' ); ?></h1>
                        <ul>
                            <?php wp_register(); ?>
                            <li><?php wp_loginout(); ?></li>
                            <?php wp_meta(); ?>
                        </ul>
                    </aside>                                                                                
                                                                                
                <?php } ?> 
                            
        </div><!-- .footer-widget-right -->                
	</footer><!-- #colophon -->
    
</div><!-- #page -->

</div><!-- .wrapper_one -->
</div><!-- .wrapper_two -->
</div><!-- .wrapper_three -->

<?php wp_footer(); ?>

</body>
</html>
