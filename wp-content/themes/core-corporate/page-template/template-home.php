<?php
/**
 *
 * Template Name: Home Page
 *
 * The template for displaying home page. 
 * @package Core_Corporate_Pro
 * 
 * 
 */
get_header(); ?>

	<div id="primary" class="content-area"> <!-- primary-home starting from here --> 
		<main id="main" class="site-main">
		<!-- ************************* Intro Section ********************************************* -->
			<?php 	$intro_title 				= core_corporate_get_option( 'intro_title' );
					$intro_page 				= core_corporate_get_option( 'intro_page' );

			if( !empty( $intro_page ) ): ?>
		      	<?php $args = array (	            		            
		          	'page_id'			=> absint($intro_page ),
                	'post_status'   	=> 'publish',
                	'post_type' 		=> 'page',
		        );

		        $loop = new WP_Query($args); 

		        if ( $loop->have_posts() ) : ?>		        	

		        	<section class="introduction-section">

		        		<?php while ($loop->have_posts()) : $loop->the_post();?>			
						
							<div class="container">
								<div class="introduction-content-wrapper">
									<header class="entry-header heading">
										<?php if( !empty($intro_title)):?>

											<span class=""><?php echo esc_html( $intro_title );?></span>

										<?php endif;?>

										<h2 class="entry-title"><?php the_title();?></h2>

									</header>
									<div class="entry-content">

										<?php
											$excerpt = core_corporate_the_excerpt(70);
											echo wp_kses_post( wpautop( $excerpt ) );
										?>

									</div>
									<a href="<?php the_permalink();?>" class="box-button"><?php echo esc_html_e( 'Read More','core-corporate' );?></a>
								</div>
							</div>

						<?php endwhile;?>
						<?php wp_reset_postdata();?>

					</section>
				<?php endif;?>

			<?php endif;?>

		<!-- ************************* Service Section ********************************************* -->	
			<?php 	$disable_service_section 	= core_corporate_get_option( 'disable_service_section' );
			if( true == $disable_service_section): ?>

				<section class="service-section">
					<div class="container">
						<?php $service_title 		= core_corporate_get_option( 'service_title' );
						$service_page 				= core_corporate_get_option( 'service_page' );
						$service_category   		= core_corporate_get_option( 'service_category' );

						$service_number	   			= core_corporate_get_option( 'service_number' );

						if( !empty( $service_page ) ): ?>

					      	<?php $args = array (	            		            
					          	'page_id'			=> absint($service_page ),
			                	'post_status'   	=> 'publish',
			                	'post_type' 		=> 'page',
					        );

					        $loop = new WP_Query($args); 

					        if ( $loop->have_posts() ) : 

					        	while ( $loop->have_posts() ) : $loop->the_post(); ?>	

									<header class="entry-header heading">

										<?php if( !empty( $service_title ) ):?>
											<span class=""><?php echo esc_html( $service_title );?></span>
										<?php endif;?>

										<h2 class="entry-title"><?php the_title();?></h2>

										<div class="entry-content">
											<?php
												$excerpt = core_corporate_the_excerpt( 20 );
												echo wp_kses_post( wpautop( $excerpt ) );
											?>		
										</div>
									</header>

								<?php endwhile;
								wp_reset_postdata();

							endif;?>

						<?php endif;?>

						<div class="service-content-wrap">

					    	<?php   $service_args = array(
										'posts_per_page' => absint( $service_number ),				
										'post_type' => 'post',
						                'post_status' => 'publish',
						                'paged' => 1,
									);

								if ( absint( $service_category ) > 0 ) {
									$service_args['cat'] = absint( $service_category );
								}
								
								// Fetch posts.
								$the_query = new WP_Query( $service_args );
								
							?>

							<?php if ( $the_query->have_posts() ) : 

								while ( $the_query->have_posts() ) : $the_query->the_post();?>
									<div class="service-item">
										<?php if( has_post_thumbnail() ): ?>

											<figure class="featured-image">

												<?php the_post_thumbnail( 'core-corporate-service' );?>

											</figure>

										<?php endif;?>

										<header class="entry-header">
											<h3 class="entry-title">
												<a href="<?php the_permalink();?>"><?php the_title();?></a>
											</h3>
										</header>

										<div class="entry-content">
											<?php
												$excerpt = core_corporate_the_excerpt( 20 );
												echo wp_kses_post( wpautop( $excerpt ) );
											?>	
										</div>
									</div>	
								<?php endwhile;
								wp_reset_postdata();

							endif;?>

						</div>
					</div>
				</section>

			<?php endif;?>

		<!-- ************************* Work Section ********************************************* -->	
		<?php 	$disable_work_section 	= core_corporate_get_option( 'disable_work_section' );		
			if( true == $disable_work_section): ?>
				<section class="gallery-section" id="gallery-section">

					<?php $work_title 	= core_corporate_get_option( 'work_title' );
					$work_category 	= core_corporate_get_option( 'work_category' );		
					$work_number 	= core_corporate_get_option( 'work_number' );				
					if( !empty($work_title) ):?>
						<div class="custom-container">
							<header class="entry-header heading">
								<h2 class="entry-title"><?php echo esc_html( $work_title );?></h2>
							</header>
						</div>
					<?php endif;?>

					<div class="portfolio-gallery-section">
						<div class="portfolio-gallery-menu">
							<ul>
								<li class="filter" data-filter="all"><?php echo esc_html_e('All','core-corporate');?></li>
								<?php
								if ( ! empty( $work_category ) ) :
									foreach ( $work_category as $category ) :
									$term = get_term( (int) $category, 'category' );							
									?>
										<li class="filter" data-filter=".<?php echo esc_attr($term->slug);?>"><?php echo esc_attr( $term->name ); ?></li>	
									<?php endforeach;				
								endif;?>
							</ul>
						</div>

						<div id="mixit-container" class="portfolio-gallery-demo">
							<?php if ( ! empty( $work_category ) ) { 
								$work_arg = array(
									'type'              => 'post',
									'posts_per_page' 	=> absint($work_number),
									'cat'				=> $work_category,
									);
								$work_posts = new WP_Query( $work_arg );
								if ( $work_posts->have_posts() ) :
									while ( $work_posts->have_posts() ) :$work_posts->the_post(); 
									$categories = get_the_category( );
									$category_slug='';
									foreach($categories as $key=>$value){
										$category_slug .= $value->slug.' ';
									}
									?>							
										<div class="single-work mix <?php echo esc_attr($category_slug );?> ">
											<div class="portfolio-single-gallery">
												<figure class="protfolio-image">
													<?php the_post_thumbnail( 'core-corporate-work' ); ?>
													<div class="work-infomation">
														<a href="<?php the_permalink();?>"><i class="fa fa-plus"></i></a>
													</div>	
												</figure>
											</div>
										</div>
									<?php endwhile;
									wp_reset_postdata();
								endif;
							} ?>
						</div>
					</div>
				</section> <!-- gallery section ends here -->
			<?php endif;?>				

		<!-- ************************* Blog Section ********************************************* -->
			<?php 	$disable_blog_section 	= core_corporate_get_option( 'disable_blog_section' );
			if( true == $disable_blog_section): ?>		
				<section class="blog-section">
					<div class="container">
						<?php $blog_title 		= core_corporate_get_option( 'blog_title' );
						$blog_description		= core_corporate_get_option( 'blog_description' );
						$blog_category   		= core_corporate_get_option( 'blog_category' );			
						$blog_number	   		= core_corporate_get_option( 'blog_number' ); ?>	

						<?php if( !empty( $blog_title ) && !empty( $blog_description ) ):?>	

							<header class="entry-header heading">
								<?php if( !empty( $blog_title) ):?>

									<h2 class="entry-title"><?php echo esc_html( $blog_title );?></h2>

								<?php endif;?>	

								<?php if( !empty( $blog_description ) ):?>
									<div class="entry-content">
										<p><?php echo esc_html($blog_description);?></p>	
									</div>
								<?php endif;?>
							</header>

						<?php endif;?>

				    	<?php   $blog_args = array(
									'posts_per_page' => absint( $blog_number ),				
									'post_type' => 'post',
					                'post_status' => 'publish',
					                'paged' => 1,
								);

							if ( absint( $blog_category ) > 0 ) {
								$blog_args['cat'] = absint( $blog_category );
							}
							
							// Fetch posts.
							$the_query = new WP_Query( $blog_args );

							$blog_category_link = get_category_link(absint($blog_category));						
							
						?>

						<?php if ( $the_query->have_posts() ) : $cn =0;

							while ( $the_query->have_posts() ) : $the_query->the_post(); $cn++;
								$blog_class = ''; 
								if( $cn  % 2 == 0){
									$blog_class = 'opp';
								}
								?>
								<article class="post flexible-post <?php echo esc_attr( $blog_class );?>">
									<?php if( has_post_thumbnail()):?>
										<figure class="featured-image">
											<?php the_post_thumbnail( 'core-corporate-blog' );?>
										</figure>
									<?php endif;?>


									<div class="flexible-post-content">

										<header class="entry-header">
											<h3 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
											<div class="entry-meta">
												<?php core_corporate_author_info(); 	
												core_corporate_posted_on();
												core_corporate_entry_footer();?> 												                                
											</div>

										</header>

										<div class="entry-content">
											<?php
												$excerpt = core_corporate_the_excerpt( 50 );
												echo wp_kses_post( wpautop( $excerpt ) );
											?>	
											<a href="<?php the_permalink();?>"><?php echo esc_html_e( 'Read More','core-corporate' );?><i class="fa fa-long-arrow-right"></i></a>
										</div>

									</div>
								</article>	

							<?php endwhile;
							wp_reset_postdata(); ?>

							<div class="load-portfolio">
								<a class="load-button" href="<?php echo esc_url( $blog_category_link);?>"><?php echo esc_html_e( 'View All Posts','core-corporate' );?></a>
							</div>

						<?php endif;?>
					</div>
				</section>
			<?php endif;?>



		</main>
	</div> <!-- primary-home ends here -->

<?php get_footer();?>
