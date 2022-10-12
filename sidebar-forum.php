<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ddoc
 */

if ( ! is_active_sidebar( 'forum_sidebar' ) ) {
	return;
}
?>



<div class="col-lg-4">
    <div class="forum_sidebar me-0">
        <?php dynamic_sidebar( 'forum_sidebar' ); ?>
    </div>
</div>