<?php
/**
 * template Name: ddoc Left Sidebar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ddoc
 */

get_header();
global $post;
?>

	<main id="primary" class="site-main">

		<?php 

		$banner_id = get_themebuilder_Id($post->ID, 'banner');
		ddoc_wrapper_start( $page_sidebar, 12, $banner_id, 'page');


	    ddoc_wrapper_start( 'left');

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		ddoc_wrapper_end( 'left' );
		?>
	</main><!-- #main -->

<?php
get_footer();
