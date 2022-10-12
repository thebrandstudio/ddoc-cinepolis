<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ddoc
 */

get_header();

$description = ddoc_opt('archive_description', 'show');

$blog_sidebar = ddoc_opt('blog_layout');
global $post;
?>
	<main id="primary" class="site-main">
	<?php
		 $banner_id = get_themebuilder_Id($post->ID, 'banner');
		ddoc_wrapper_start( $blog_sidebar, 8, $banner_id, 'archive');

		
		 if ( have_posts() && $description == 'show') : ?>

			<header class="page-header">
				<?php
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/blog/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) );

			endwhile;

			ddoc_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		ddoc_wrapper_end( $blog_sidebar );
		?>
	</main><!-- #main -->

<?php
get_footer();