<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Core_Corporate
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<?php $sidebar_layout = core_corporate_get_option('layout_options'); 
if ( 'no-sidebar' !== $sidebar_layout ) {?>
	<div id="secondary" class="widget-area custom-col-4" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #secondary -->
<?php } ?>
