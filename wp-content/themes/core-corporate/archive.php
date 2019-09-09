<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Core_Corporate
 */

get_header(); ?>
	<?php 
		$layout_class ='col-8';
		$sidebar_layout = core_corporate_get_option('layout_options'); 
		if( is_active_sidebar('sidebar-1') && 'no-sidebar' !==  $sidebar_layout){
			$layout_class = 'custom-col-8';
		}
		else{
			$layout_class = 'custom-col-12';
		}		
	?>

	<div id="primary" class="content-area <?php echo esc_attr($layout_class);?>">
		<main id="main" class="site-main list-view" role="main">

		<?php
		if ( have_posts() ) : ?>


			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			$pagination_option = core_corporate_get_option( 'pagination_option' );
			if( 'default' == $pagination_option){
				the_posts_navigation();	
			} else{
	            the_posts_pagination( array(
	                'mid_size' => 5,
	                'prev_text' => esc_html__( 'PREV', 'core-corporate' ),
	                'next_text' => esc_html__( 'NEXT', 'core-corporate' ),
	            ) );
			}
			

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
