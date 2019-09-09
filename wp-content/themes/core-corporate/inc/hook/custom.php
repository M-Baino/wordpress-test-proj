<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Core_Corporate
 */

if( ! function_exists( 'core_corporate_site_branding' ) ) :
	/**
  	 * Site Branding
  	 *
  	 * @since 1.0.0
  	 */
	function core_corporate_site_branding() { ?>	

    	<div class="top-menu-toggle_bar_wrapper">
	      	<div class="top-menu-toggle_trigger">
		        <span></span>
		        <span></span>
		        <span></span>
	  		</div>	  		
        </div>
        
        <?php $enable_top_header = core_corporate_get_option( 'enable_top_header' );
        $header_top_bar = '';
        if( !'true' == $enable_top_header ){
        	$header_top_bar = 'header-top-bar';
        }
        if( 'true' == $enable_top_header):?>
			<div class="top-menu-toggle_body_wrapper hide-menu">
				<div class="top-bar">
					<div class="container">
						<div class="row">
						<?php $top_left_search = core_corporate_get_option('top_left_search'); 
							$search_class = 'custom-col-11';
							if( 'no-search' == $top_left_search){
								$search_class = 'custom-col-12';
							} else{
								$search_class = 'custom-col-11';
							}
							if ( 'no-search' !== $top_left_search ) {?>						
								<div id="left-search" class="custom-col-1">
										<div class="search-toggle"> </div>
										<div class="search-section">
											<?php get_search_form();?>
											<span class="search-arrow"></span>
										</div>						
								</div>
							<?php } ?>	
							<div class="<?php echo esc_attr($search_class);?>">
								<div class="row">

								<?php $header_address = core_corporate_get_option('header_address');
								$header_number = core_corporate_get_option('header_number');
								$header_emial = core_corporate_get_option('header_emial');
								if( !empty($header_address) || !empty($header_number) || !empty($header_emial) ){
									$header_class = 'custom-col-6';
								} else{
									$header_class = 'custom-col-12';
								}
								?>
									<div class="custom-col-6 topbar-left">
										<div class="post-meta-author">
											<ul>
												<?php if(!empty($header_address)):?>
													<li>
														<a href="tel:<?php echo preg_replace( '/\D+/', '', esc_attr( $header_number ) ); ?>"><i class="fa fa-phone"></i><?php echo esc_attr($header_number);?></a>
													</li>
												<?php endif;?>

												<?php if(!empty($header_address)):?>
													<li><i class="fa fa-map-marker"></i><?php echo esc_html( $header_address );?></li>
												<?php endif;?>

												<?php if(!empty($header_emial)):?>
													<li>
														<a href="mailto:<?php echo esc_attr($header_emial);?>"><i class="fa fa-envelope"></i><?php echo esc_attr( antispambot( $header_emial ) ); ?></a>
													</li>
												<?php endif;?>
												
											</ul>
										</div>													

									</div>

									<?php 
									$top_right_header = core_corporate_get_option('top_right_header');
									$top_right_class = '';
									if( 'social+menu' == $top_right_header){ 
										$top_right_class ='topbar-right-menu';
									} ?>
									<div class="<?php echo esc_attr($header_class);?>">
									<div class="topbar-right menu-right <?php echo  esc_attr($top_right_class);?>">
										<?php 			

											if( 'social+menu' == $top_right_header){ ?>
												
													<?php $enable_social_header = core_corporate_get_option('enable_social_header'); 
													if( 'false' == $enable_social_header):
														if( has_nav_menu( 'social-menu')):?>
															<div class="inline-social-icons social-links"> <!-- inline social links starting from here -->
																<?php
																	wp_nav_menu( array(
																		'theme_location'  => 'social-menu',
																		'container'       => false,								
																		'depth'           => 1,
																		'fallback_cb'     => 'core_corporate_primary_navigation_fallback',
																	) );
																?>
															</div> <!-- inline social links ends here -->
														<?php endif;
													endif;?>
												
												<div class="tobbar-button">
													<?php
														wp_nav_menu( array(
															'theme_location'  => 'top-menu',
															'container'       => false,								
															'depth'           => 1,
															'fallback_cb'     => 'core_corporate_primary_navigation_fallback',
														) );
													?>
												</div>
											<?php } else{ ?>
												<div class="tobbar-button">
													<?php
														wp_nav_menu( array(
															'theme_location'  => 'top-menu',
															'container'       => false,								
															'depth'           => 1,
															'fallback_cb'     => 'core_corporate_primary_navigation_fallback',
														) );
													?>
												</div>

												
													<?php $enable_social_header = core_corporate_get_option('enable_social_header'); 
													if( 'false' == $enable_social_header):
														if( has_nav_menu( 'social-menu')):?>
															<div class="inline-social-icons social-links"> <!-- inline social links starting from here -->
																<?php
																	wp_nav_menu( array(
																		'theme_location'  => 'social-menu',
																		'container'       => false,								
																		'depth'           => 1,
																		'fallback_cb'     => 'core_corporate_primary_navigation_fallback',
																	) );
																?>
															</div> <!-- inline social links ends here -->
														<?php endif;
													endif;?>
												

											<?php } ?>	
									</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif;?>
		<div class="home-menu-wrapper">
			<div class="hgroup-wrap <?php echo esc_attr($header_top_bar);?>">
				<div class="container">
					<section class="site-branding"> <!-- site branding starting from here -->
						<?php $site_identity = core_corporate_get_option( 'site_identity' );
							$title = get_bloginfo( 'name', 'display' );
							$description    = get_bloginfo( 'description', 'display' );

							if( 'logo-only' == $site_identity){

								if ( has_custom_logo() ) {

									the_custom_logo();

								}
							} elseif( 'logo-text' == $site_identity){

								if ( has_custom_logo() ) {

									the_custom_logo();

								}

								if ( $description ) {
									echo '<p class="site-description">'.esc_attr( $description ).'</p>';
								}

							} elseif( 'title-only' == $site_identity && $title ){ ?>

								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php 

							}elseif( 'title-text' == $site_identity){ 
								echo '<div class="site-branding">';

								if( $title ){ ?>

									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php 
								}

								if ( $description ) {

									echo '<p class="site-description">'.esc_attr( $description ).'</p>';

								}
								echo '</div>';
						} ?> 
					  <!-- <span class="site-description">satisfied home</span> -->
					</section> <!-- site branding ends here -->
					<div class="hgroup-right"> <!-- hgroup right starting from here -->
					  <div id="navbar" class="navbar">  <!-- navbar starting from here -->
					      	<nav id="site-navigation" class="navigation main-navigation">
						        <div class="menu-top-menu-container clearfix">
						        <?php
									wp_nav_menu(
										array(
											'theme_location' => 'menu-1',				
											'items_wrap'	 =>  '<ul>%3$s</ul>',
											'fallback_cb'    => 'wp_page_menu',
											)
										);
								?>
						        </div>
					      	</nav>
					  </div> <!-- navbar ends here -->
					</div> <!-- hgroup right ends here -->
				</div>
			</div>
		</div>

		<?php if( is_front_page() ){
			do_action( 'core_corporate_main_slider' );	
		} else{
			do_action( 'core_corporate_main_header_image' );	
		}?>

	<?php }
	add_action( 'core_corporate_action_before_header', 'core_corporate_site_branding');
endif;
if ( ! function_exists( 'core_corporate_footer_top_section' ) ) :

  /**
   * Top  Footer 
   *
   * @since 1.0.0
   */
	function core_corporate_footer_top_section() { ?>	
		<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>
		
			<div class="widget-area"> <!-- widget area starting from here -->
				<div class="container">
					<?php
					$column_count = 0;
					$class_coloumn =12;
					for ( $i = 1; $i <= 3; $i++ ) {
						if ( is_active_sidebar( 'footer-' . $i ) ) {
							$column_count++;
							$class_coloumn = 12/$column_count;
						}
					} ?>

					<?php $column_class = 'custom-col-' . absint( $class_coloumn );
					for ( $i = 1; $i <= 3 ; $i++ ) {
						if ( is_active_sidebar( 'footer-' . $i ) ) { ?>
							<div class="<?php echo esc_attr( $column_class ); ?>">
								<?php dynamic_sidebar( 'footer-' . $i ); ?>
							</div>
						<?php }
					} ?>
				</div>

			</div> <!-- widget area starting from here -->
		<?php endif;?> 	    

	<?php }

endif;
add_action( 'core_corporate_action_top_footer', 'core_corporate_footer_top_section', 10 ); 

if ( ! function_exists( 'core_corporate_footer_section' ) ) :

	/**
	* Footer copyright
	*
	* @since 1.0.0
	*/
	function core_corporate_footer_section() { ?>

		<div class="bottom-footer"> <!-- site-generator starting from here -->
			<div class="container">
				<div class="site-generator">
					<?php 
					$copyright_footer = core_corporate_get_option('copyright_text'); 
						if ( ! empty( $copyright_footer ) ) {
							$copyright_footer = wp_kses_data( $copyright_footer );
						}
						// Powered by content.
						$powered_by_text = sprintf( __( 'Theme of %s', 'core-corporate' ), '<a target="_blank" rel="designer" href="https://aarambhathemes.com/">AARAMBHA THEME.</a>' );
					?>
					<span class="copy-right"><?php echo $powered_by_text;?><?php echo esc_html( $copyright_footer );?></span>
					<?php $enable_social_footer = core_corporate_get_option('enable_social_footer'); 
					if( 'false' == $enable_social_footer):
						if( has_nav_menu( 'social-menu')):?>
							<div class="inline-social-icons social-links"> <!-- inline social links starting from here -->
								<?php
									wp_nav_menu( array(
										'theme_location'  => 'social-menu',
										'container'       => false,								
										'depth'           => 1,
										'fallback_cb'     => 'core_corporate_primary_navigation_fallback',
									) );
								?>
							</div> <!-- inline social links ends here -->
						<?php endif;
					endif;?>
				</div>
			</div> 
		</div> <!-- site-generator ends here -->
	<?php }

endif;
add_action( 'core_corporate_action_footer', 'core_corporate_footer_section', 10 );
