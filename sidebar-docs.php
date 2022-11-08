<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ddoc
 */

if ( ! is_active_sidebar( 'dddoc_sidebar' ) ) {
	return;
}
?>

<div class="col-lg-2">
    <div class="doc-sidebar-menu doc-sidebar-right me-0">
        <?php dynamic_sidebar( 'dddoc_sidebar' ); ?>
    </div>
</div>
