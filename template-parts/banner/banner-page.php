<?php 
 /**
  * Display page banner 
  */
$show_banner = ddoc_opt('page_banner_toggle', 'show');
$show_banner_in_page = ddoc_page_meta('is_banner', get_the_ID(), 1);

$banner_url = ddoc_opt('page_banner_img_upload');
$banner_url_page= ddoc_page_meta('banner_background_image', get_the_ID());  

$how_title = ddoc_opt('page_banner_title', 'show');
$show_breadcrumbs = ddoc_opt('page_banner_breadcrumb', 'show');

$banner_background_url = ddoc_IMAGES.'/blog/banner/banner.webp';

if($banner_url_page && $banner_url_page != ''){
    $banner_background_url = $banner_url_page;
}elseif($banner_url && !empty($banner_url['url'])) {
    $banner_background_url = $banner_url['url'];
}
if(!class_exists('Redux')){
    $banner_background_url = '';
  }
if($show_banner == 'show') :
 if($show_banner_in_page):
?>

<?php if($banner_background_url != '') :  ?>
<div class="blog_breadcrumbs_area_two" data-bg-img="<?php echo esc_url($banner_background_url); ?>">
<?php else: ?>
<div class="blog_breadcrumbs_area_two banner-with-color">
<?php endif; ?>       
        <div class="container">
            <div class="breadcrumb_content text-center">
               <?php if($how_title == 'show') : ?>
                <h2 class="page_title"><?php single_post_title(); ?></h2>
               <?php endif;
               if($show_breadcrumbs  == 'show') : 
                ddoc_breadcrumbs();
               endif; ?> 
            </div>
        </div>
</div>
<?php 
endif;
endif;
