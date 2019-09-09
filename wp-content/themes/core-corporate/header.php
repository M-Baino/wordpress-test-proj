<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Core_Corporate
 */

?>
  <?php
    /**
    * Hook - core_corporate_action_doctype.
    *
    * @hooked core_corporate_doctype -  10
    */
    do_action( 'core_corporate_action_doctype' );
  ?>

<head>
  <?php
    /**
    * Hook - core_corporate_action_head.
    *
    * @hooked core_corporate_head -  10
    */
    do_action( 'core_corporate_action_head' );
  ?>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php
    /**
    * Hook - core_corporate_action_before.
    *
    * @hooked core_corporate_page_start - 10
    * @hooked core_corporate_skip_to_content - 10
    */
    do_action( 'core_corporate_action_before' );
    ?>
  <?php
    /**
    * Hook - core_corporate_action_before_header.
    *
    * @hooked core_corporate_header_start - 10
    */
    do_action( 'core_corporate_action_before_header' );
  ?> 
  <?php 
    /**
     *Hook - core_corporate_action_head.
     *
     *@hooked core_corporate_site_branding
     */
    do_action( 'core_corporate_action_header' )
  ?>
  <?php
    /**
    * Hook - commuinty_action_before_content.
    *
    * @hooked commuinty_content - 10
    */
    do_action( 'core_corporate_action_before_content' );
  ?>  
