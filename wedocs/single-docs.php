
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ddoc_theme
 */
global $post;
$default_banner = ddoc_IMAGES.'/ddoc/single_default_banner.webp';
$support_img = ddoc_IMAGES.'/blog/support.webp';
$call_support = ddoc_IMAGES.'/blog/call-center-agent.png';
$topic_icon = ddoc_IMAGES.'/docs/topic-icon.svg';
$skip_sidebar = ( get_post_meta( $post->ID, 'skip_sidebar', true ) == 'yes' ) ? true : false;
get_header();

    /**
     * @since 1.4
     *
     * @hooked wedocs_template_wrapper_start - 10
     */
    do_action( 'wedocs_before_main_content', $default_banner );
    while ( have_posts() ) : the_post();
        ?>
        <div class="ddoc-single-content container-fluid p-0">
            <div class="row ddoc-single-breadcrumbs">
                <div class="col-md-7">
                    <?php wedocs_breadcrumbs(); ?>
                </div>
                <div class="col-md-5 text-md-end ddoc_date">
                    <?php
                    $datetime1 = new DateTime( get_the_modified_date() );
                    $datetime2 = new DateTime(); // current date
                    $interval = $datetime1->diff( $datetime2 );
                    if($interval->days > 1 ){
                        $day_stype = __('days', 'ddoc');
                    }else{
                        $day_stype = __('day', 'ddoc');
                    }
                    printf(__('Last updated %s %s ago', 'ddoc'), $interval->days, $day_stype);
                    ?>
                </div>
                <div class="clickIconLeft">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>
            <div class="row dt_product_body_wrap">
                <div class="col-lg-3 col-md-4">
                    <div class="doc-sidebar-menu sidebar_left ps-lg-5">
                        <?php
                        if ( !$skip_sidebar ) {
                            single_single_page_sidebar();
                        }
                        ?>
                   </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(  'ddoc-single-post' ); ?> itemscope itemtype="http://schema.org/Article">
                        <div class="ajx-progress ddoc-d-none"></div>
                        <header class="entry-header">
                            <?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
                            <ul class="list-unstyled ddoc-single-post-meta">
                                <li><i class="far fa-user"></i><?php esc_html_e('Author:', 'ddoc'); ?> <?php ddoc_posted_by(); ?></li>
                                <li><i class="far fa-clock"></i><?php ddoc_artical_read_time(get_the_content()); ?></li>
                                <li>
                                    <i class="far fa-eye"></i>
                                    <?php
                                    ddoc_set_doc_views(get_the_ID());
                                    ddoc_get_doc_views(get_the_ID());
                                    ?>
                                </li>
                            </ul>
                        </header><!-- .entry-header -->

                        <div class="entry-content" itemprop="articleBody">
                            <div class="ddoc-page-content">
                                <?php
                                    the_content( sprintf(
                                        /* translators: %s: Name of current post. */
                                        wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ddoc' ), [ 'span' => [ 'class' => [] ] ] ),
                                        the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                    ) );
                                ?>
                                <div class="row">
                                    <?php  ddoc_doc_child_page(get_the_ID()); ?>
                                </div>
                            </div>
                        </div><!-- .entry-content -->
                        <?php ddoc_doc_nav(); ?>
                        <footer class="entry-footer wedocs-entry-footer text-center">
                            <?php if ( wedocs_get_option( 'email', 'wedocs_settings', 'on' ) == 'on' ) { ?>
                                <div class="wedocs-help-link wedocs-hide-print">
                                    <img src="<?php echo esc_url($support_img);?>" alt="img_footer">
                                    <h3><?php printf( __( 'Still stuck?', 'ddoc' ));?></h3>
                                    <span><?php printf( '%s <a id="wedocs-stuck-modal" href="%s">%s</a>', __( 'We can help you.', 'ddoc'), '#', __('How can we help?', 'ddoc' ) ); ?></span>
                                </div>
                            <?php } ?>

                            <div class="wedocs-article-author" itemprop="author" itemscope itemtype="https://schema.org/Person">
                                <meta itemprop="name" content="<?php echo get_the_author(); ?>" />
                                <meta itemprop="url" content="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" />
                            </div>

                            <meta itemprop="datePublished" content="<?php echo get_the_time( 'c' ); ?>"/>
                            <time itemprop="dateModified" datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>"><?php printf( __( 'Updated on %s', 'ddoc' ), get_the_modified_date() ); ?></time>
                        </footer>

                        <?php if ( wedocs_get_option( 'helpful', 'wedocs_settings', 'on' ) == 'on' ) { ?>
                            <?php wedocs_get_template_part( 'content', 'feedback' ); ?>
                        <?php } ?>

                        <?php if ( wedocs_get_option( 'email', 'wedocs_settings', 'on' ) == 'on' ) { ?>
                            <?php wedocs_get_template_part( 'content', 'modal' ); ?>
                        <?php } ?>

                        <?php if ( wedocs_get_option( 'comments', 'wedocs_settings', 'off' ) == 'on' ) { ?>
                            <?php if ( comments_open() || get_comments_number() ) { ?>
                                <div class="wedocs-comments-wrap">
                                    <?php comments_template(); ?>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </article><!-- #post-## -->
                </div>
                <?php get_sidebar('docs') ?>
           </div>
        </div>
        <?php
    endwhile;
    wp_reset_postdata();

get_footer();