<?php
/**
 * template Name: _PageFluid
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _pagefullwidth
 */

get_header();


$page_sidebar = ddoc_opt('page_layout');


?>

	<main id="primary" class="site-main">

		<?php 
		/**
		 * Banner display 
		 * @package display banner
		 * @since 1.0
		 * action display_banner -- 10
		 */
		do_action('ddoc_banner');


		while ( have_posts() ) :
			the_post();
            the_content();
		endwhile; // End of the loop.
		?>
	</main><!-- #main -->

<?php
get_footer();