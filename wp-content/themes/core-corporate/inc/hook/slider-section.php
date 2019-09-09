<?php
/**
 * The slider hook for our theme.
 *
 * This is the template that displays slider of the theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Core_Corporate
 */
if( ! function_exists('core_corporate_slider')):

	function core_corporate_slider() { ?>		

		<?php 	$disable_slider 		= core_corporate_get_option( 'disable_slider_section' );
				$layout_slider    		= core_corporate_get_option( 'slider_layout' );					 
				$slider_category   		= core_corporate_get_option( 'slider_category' );			
				$slider_number	   		= core_corporate_get_option( 'slider_number' );		
				$banner_image			= core_corporate_get_option( 'banner_image' );		
				$button_title	   		= core_corporate_get_option( 'slider_button_title' );
				$button_url	   			= core_corporate_get_option( 'slider_button_url' );					 
		if( 'true' == $disable_slider): ?>		
			<section class="featured-slider "> <!-- featured-slider starting from here -->
				<?php if( 'slider' == $layout_slider ) {?>

			    	<?php   $slider_args = array(
								'posts_per_page' => absint( $slider_number ),				
								'post_type' => 'post',
				                'post_status' => 'publish',
				                'paged' => 1,
							);

						if ( absint( $slider_category ) > 0 ) {
							$slider_args['cat'] = absint( $slider_category );
						}
						
						// Fetch posts.
						$the_query = new WP_Query( $slider_args );
						
					?>

					<?php if ( $the_query->have_posts() ) : ?>

						<div id="owl-slider-demo" class="owl-carousel owl-theme">
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

								<div class="slider-content">
									<?php if(has_post_thumbnail()){ ?>
										<figure class="slider-image">
											<?php the_post_thumbnail( 'core-corporate-slider' );?>
										</figure>
									<?php } else{ ?>
										<figure class="no-banner-image">
											
										</figure>
									<?php  }?> 
									<div class="slider-text v-center">
										<h3 class="slider-title"><?php the_title();?></h3>
										<?php
											$excerpt = core_corporate_the_excerpt( 20 );
											echo wp_kses_post( wpautop( $excerpt ) );
										?>									
										<div class="slider-btn">
											<a href="<?php the_permalink();?>" class="box-button"><?php echo esc_html_e( 'Read More','core-corporate');?></a>
											<?php if (!empty($button_title)) :?>
												<a href="<?php echo esc_url($button_url	);?>" class="box-button"><?php echo esc_html($button_title);?></a>
											<?php endif;?>											
										</div>
									</div>									
								</div>

							<?php endwhile;?>
							<?php wp_reset_postdata();?>
						</div>

					<?php endif;?>

				<?php } else{ 
					
						$banner_img_args = array( 
							'p'             => absint( $banner_image ), 
							'post_status'     => 'publish'
						);

				        $banner_img_query = new WP_Query( $banner_img_args ); 
				        if ( $banner_img_query->have_posts() ) :
				        	while ( $banner_img_query->have_posts() ) : $banner_img_query->the_post();  ?>	


								<div class="slider-content">
									<?php if(has_post_thumbnail()){ ?>
										<figure class="slider-image">
											<?php the_post_thumbnail( 'core-corporate-slider' );?>
										</figure>
									<?php } else{ ?>
										<figure class="no-banner-image">
											
										</figure>
									<?php  }?>
									<div class="slider-text v-center">
										<h3 class="slider-title"><?php the_title();?></h3>
										<?php
											$excerpt = core_corporate_the_excerpt( 20 );
											echo wp_kses_post( wpautop( $excerpt ) );
										?>									
										<div class="slider-btn">
											<a href="<?php the_permalink();?>" class="box-button"><?php echo esc_html_e( 'Read More','core-corporate');?></a>
											<?php if (!empty($button_title)) :?>
												<a href="<?php echo esc_url($button_url	);?>" class="box-button"><?php echo esc_html($button_title);?></a>
											<?php endif;?>											
										</div>
									</div>
								</div>
							<?php endwhile;
							wp_reset_postdata();
						endif;

					} ?>

			</section> <!-- featured-slider ends here -->	
		<?php endif;
	}
add_action( 'core_corporate_main_slider','core_corporate_slider' );	

endif;

if( ! function_exists('core_corporate_header_image')):

	function core_corporate_header_image() {

    $bg_image_url = get_header_image(); ?>
	
	<div class="page-title-wrap" style="background-image:url(<?php echo esc_url( $bg_image_url ); ?>);">
	    <div class="container">
	        <h2 class="page-title">
	            <?php if ( is_archive() ) {
	                the_archive_title();
	            }elseif (is_search()) {
	            	printf( esc_html__( 'Search Results for: %s', 'core-corporate' ), '<span>' . get_search_query() . '</span>' );
	            }elseif(is_404()){
	            	esc_html_e( 'Page not Found', 'core-corporate' ); 
	            }else{	            	
	               echo single_post_title();
	            
	            } ?>
	        </h2>
	    </div>	    
	</div>

	<?php }
add_action( 'core_corporate_main_header_image','core_corporate_header_image' );	

endif;
