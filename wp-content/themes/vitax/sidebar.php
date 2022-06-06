<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vitax
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div id="bdwebteam-blog-sidebar" class="widget-area bdwebteam-sidebar">
    <?php dynamic_sidebar('sidebar-1');?>
</div><!-- #secondary -->