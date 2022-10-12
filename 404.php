<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ddoc
 */

get_header();

$blog_sidebar = ddoc_opt('blog_layout');
global $post;
?>

	<main id="primary" class="site-main">
		
		<section class="error-404 not-found text-center">
			<div class="container">
            	<header class="page-header">
                <img src="<?php echo get_template_directory_uri().'/assets/images/404.png' ?>" alt="<?php esc_attr_e('Not Found', 'ddoc'); ?>">
				<h1 class="page-title"><?php esc_html_e( '404', 'ddoc' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'We cannot seem to find that Page.', 'ddoc' ); ?><a class="back_btn" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html__('Go back', 'ddoc') ?></a></p>
			</div><!-- .page-content -->
            </div>
		</section><!-- .error-404 -->
	</main><!-- #main -->

<?php
get_footer();