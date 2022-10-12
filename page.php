<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package docly
 */

get_header();

global $post;


_ddoc_banner_display('', 'page');

$wrap_class = 'page_wrapper';


while ( have_posts() ) : the_post();
    ?>
    <section class="sec_padding <?php echo esc_attr($wrap_class) ?>">
        <div class="container">
            <?php
            the_content();
            wp_link_pages(array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'ddoc' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'ddoc' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ));

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>
        </div>
    </section>
<?php
endwhile; // End of the loop.

get_footer();
