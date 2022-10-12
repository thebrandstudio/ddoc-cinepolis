<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ddoc
 */

get_header();


$blog_sidebar = ddoc_opt('blog_layout');
global $post;

?>

	<main id="primary" class="site-main">
		<?php
		
		        $banner_id = get_themebuilder_Id($post->ID, 'banner');
				ddoc_wrapper_start( $blog_sidebar, 8, $banner_id, 'post-single');


		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/blog/content/content', 'single');
			 
			// Display About auther 
			ddoc_about_author();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		wp_reset_postdata(  );
		
		ddoc_wrapper_end($blog_sidebar);
		?>
	</main><!-- #main -->

<?php

get_footer();