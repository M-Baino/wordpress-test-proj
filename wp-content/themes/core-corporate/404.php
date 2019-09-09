<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Core_Corporate
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
	          	<figure class="error-icon">
	                <img src="<?php echo get_template_directory_uri();?>/assest/img/error-icon.png" alt="">
	            </figure>
				<div class="entry-content">
					<p><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'core-corporate' ); ?></p>
					<a href="javascript:history.go(-1)" class="box-button"><?php echo esc_html_e( 'Back to previous Page', 'core-corporate');?></a>
				</div><!-- .page-header -->				
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->


<?php
get_footer();
