<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Core_Corporate
 */

?>

<?php
  /**
   * Hook - core_corporate_action_before_footer.
   *
   * 
   */
  do_action( 'core_corporate_action_before_footer' );
?>
<?php
  /**
   * Hook - core_corporate_action_top_footer.
   *
   * 
   */
  do_action( 'core_corporate_action_top_footer' );
?>         
<?php
  /**
   * Hook - core_corporate_action_footer.
   *
   * 
   */
  do_action( 'core_corporate_action_footer' );
?>  
<?php 
  /**
   * Hook - core_corporate_action_section_footer.
   *
   * 
   */
  do_action( 'core_corporate_action_section_footer' );
?>
<?php
  /**
   * Hook - core_corporate_action_after.
   *
   */
  do_action( 'core_corporate_action_after' );
?>

<?php wp_footer(); ?>

</body>
</html>
