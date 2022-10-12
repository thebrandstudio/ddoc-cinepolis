<?php 

$is_banner = ddoc_opt('error_banner_toggle', 'show');
$is_banner_title = ddoc_opt('is_error_banner_title', 'show');
$banner_title = ddoc_opt('error_banner_title', '404');
  
$banner_url = ddoc_opt('error_banner_img_upload');
$show_breadcrumbs = ddoc_opt('error_banner_breadcrumb', 'show');
$banner_background_url = ddoc_IMAGES.'/blog/banner/banner.webp';

if ($banner_url && !empty($banner_url['url'])) {
    $banner_background_url = $banner_url['url'];
}

if (!class_exists('Redux')) {
    $banner_background_url = '';
}

if ( $is_banner == 'show' ) {
    if ( $banner_background_url != '') :  ?>
        <div class="blog_breadcrumbs_area_two parallaxie" data-bg-img="<?php echo esc_url($banner_background_url); ?>">
        <div class="overlay_bg"></div>
    <?php else: ?>
        <div class="blog_breadcrumbs_area_two banner-with-color">
    <?php endif; ?>
        <div class="container">
            <div class="breadcrumb_content text-white text-center">
                <?php
                if ( $is_banner_title == 'show' ) {  ?>
                    <h1 class="page-title page_title"><?php echo  esc_html($banner_title); ?></h1>
                    <?php
                }
                if ( $show_breadcrumbs == 'show' ) {
                    ddoc_breadcrumbs();
                }
                ?>
            </div>
        </div>
    </div>
    <?php
}
