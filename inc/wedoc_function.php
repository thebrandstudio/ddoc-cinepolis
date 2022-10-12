<?php
/**
 * New function for wedoc
 */

 require_once __DIR__.'/wedoc_list_page.php';

function single_single_page_sidebar() {
    global $post;
    ?>
    <div class="wedocs-sidebar">
        <?php
        $ancestors = [];
        $root      = $parent = false;

        if ( $post->post_parent ) {
            $ancestors = get_post_ancestors( $post->ID );
            $root      = count( $ancestors ) - 1;
            $parent    = $ancestors[$root];
        } else {
            $parent = $post->ID;
        }

        // var_dump( $parent, $ancestors, $root );
        $walker   = new \dl\doc\Walker();
        $children = wp_list_pages( [
            'title_li'  => '',
            'order'     => 'menu_order',
            'child_of'  => $parent,
            'echo'      => false,
            'post_type' => 'docs',
            'walker'    => $walker,
        ] );

        ?>

        <h3 class="widget-title"><?php echo get_post_field( 'post_title', $parent, 'display' ); ?></h3>

        <?php if ( $children ) { ?>
            <ul class="doc-nav-list dddd">
                <?php echo wp_kses_post($children); ?>
            </ul>
        <?php } ?>
    </div>
    <?php
}

if ( !function_exists('ddoc_artical_read_time') ) {

    function ddoc_artical_read_time( $get_content ) {

        $stripped_content = strip_tags( $get_content );
        $wordn            = str_word_count( $stripped_content );
        $reading_minute   = floor( $wordn / 200 );
        $reading_seconds  = floor( $wordn % 200 / ( 200 / 60 ) );
        $minutes_lable = $reading_minute > 0 ? 'minutes': 'minute';
        $seconds_lable = $reading_seconds > 0 ? 'seconds': 'second';

        if($reading_minute == 0 ){
            printf(__('<span>Reading time: <span>%s %s</span></span>', 'ddoc'), $reading_seconds, $seconds_lable);
        }else{
            printf(__('<span>Reading time: <span>%s %s</span> <span>%s %s</span></span>', 'ddoc'), $reading_minute, $minutes_lable, $reading_seconds, $seconds_lable);
        }

    }
}

function ddoc_get_doc_views( $postID ) {
    $count_key = 'ddoc_doc_view_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }
    $view_lable = __('Views', 'ddoc');
    if($count == '') {
        $count = 0;
        $view_lable = __('View', 'ddoc');
    }
    printf(__('%s %s', 'ddoc'), $count, $view_lable);
}

function ddoc_set_doc_views( $postID ) {
    $count_key = 'ddoc_doc_view_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

//  ajax loading

add_action( 'wp_ajax_ddoc_single_page_ajax', 'ddoc_single_page_ajax' );
add_action( 'wp_ajax_nopriv_ddoc_single_page_ajax', 'ddoc_single_page_ajax' );

function ddoc_single_page_ajax() {

    check_ajax_referer( 'ddoc_single_ajax', 'security' );
    $get_post = get_post($_POST['pageId']);
    echo wp_json_encode($get_post);
    wp_die();

}


//  add banner

add_action( 'wedocs_before_main_content', 'ddoc_doc_banner', 10, 1 );

function ddoc_doc_banner( $banner ) {  ?>
    <div class="ddoc-banner" style="min-height: 400px; padding: 200px 0px 50px; background: url(<?php the_field('imagen_fondo'); ?>)">
      <div class="container">
        <div class="row justify-content-center">
             <?php

                global $post;
                $get_id = get_ancestors($post->ID, 'docs');
                $parent_ID = end($get_id);
                $parent_id_check = $parent_ID? $parent_ID : $post->ID;

                if(!empty($get_id)) {
                   $parent_post = get_post($parent_ID);
                   $title = $parent_post->post_title;
                }else{
                    $title = get_the_title($post->ID);
                }

                  $placeholder_base = esc_html__('¿Que estás buscando hoy?', 'ddoc');
			    /*$placeholder = $placeholder_base.' '.$title; ?>*/
			      $placeholder = $placeholder_base; ?>

      			   <div class="col-md-12 text-center">
      				   <div id="custom-titulo">
      					   <h3 class="custom-titulo"><?php the_field('titulo_tema'); ?></h3>
      				   </div>
      			   </div>

               <div class="col-md-8">
                 <div class="search-doc">
                    <input class="form-control ajax-ddoc-search"  id="exampleDataList" placeholder="<?php echo esc_attr($placeholder) ?>" data-parent-id="<?php echo esc_attr($parent_id_check); ?>">
                    <button type="submit" class="btn btn_search"><i class="fa fa-search"></i></button>
                    <div class="ajax_sajation"></div>
                 </div>
               </div>

               <div class="col-md-12 text-center" style="margin-top: 50px;">
                 <div class="row">
                   <div class="col-4 col-sm-2">
                     <div class="icono-categoria">
                       <div class="icono">
                         <img width="60" height="60" src="<?php the_field('icono1'); ?>" class="attachment-full size-full" alt="" loading="lazy">
                       </div>
                       <div class="info">
                           <h5><a href="#" class="text-decoration-none" style="color: white;">Cinépolis Klic®</a></h5>
                       </div>
                     </div>
                    </div>
                   <div class="col-4 col-sm-2">
                     <div class="icono-categoria">
                       <div class="icono">
                         <img width="60" height="60" src="<?php the_field('icono2'); ?>" class="attachment-full size-full" alt="" loading="lazy">
                       </div>
                       <div class="info">
                           <h5><a href="#" class="text-decoration-none" style="color: white;">Contenido</a></h5>
                       </div>
                     </div>
                   </div>
                   <div class="col-4 col-sm-2">
                     <div class="icono-categoria">
                       <div class="icono">
                         <img width="60" height="60" src="<?php the_field('icono3'); ?>" class="attachment-full size-full" alt="" loading="lazy">
                       </div>
                       <div class="info">
                           <h5><a href="#" class="text-decoration-none" style="color: white;">Métodos de Pago</a></h5>
                       </div>
                     </div>
                   </div>
                   <div class="col-4 col-sm-2">
                     <div class="icono-categoria">
                       <div class="icono">
                         <img width="60" height="60" src="<?php the_field('icono4'); ?>" class="attachment-full size-full" alt="" loading="lazy">
                       </div>
                       <div class="info">
                           <h5><a href="#" class="text-decoration-none" style="color: white;">Dispositivos</a></h5>
                       </div>
                     </div>
                   </div>
                   <div class="col-4 col-sm-2">
                     <div class="icono-categoria">
                       <div class="icono">
                         <img width="60" height="60" src="<?php the_field('icono5'); ?>" class="attachment-full size-full" alt="" loading="lazy">
                       </div>
                       <div class="info">
                           <h5><a href="#" class="text-decoration-none" style="color: white;">Canales</a></h5>
                       </div>
                     </div>
                   </div>
                   <div class="col-4 col-sm-2">
                     <div class="icono-categoria">
                       <div class="icono">
                         <img width="60" height="60" src="<?php the_field('icono6'); ?>" class="attachment-full size-full" alt="" loading="lazy">
                       </div>
                       <div class="info">
                           <h5><a href="#" class="text-decoration-none" style="color: white;">Promociones</a></h5>
                       </div>
                     </div>
                   </div>
                 </div>
      			   </div>
        </div>
      </div>
    </div>
   <?php
}


add_action( 'wp_ajax_doc_search_result', 'doc_search_result' );
add_action( 'wp_ajax_nopriv_doc_search_result', 'doc_search_result' );

function doc_search_result() {

    check_ajax_referer( 'ddoc_single_ajax', 'nonce' );

    if($_POST['keyworkds'] == '') {
        return;
    }

     $args = [
        's' => $_POST['keyworkds'],
        'post_type' => 'docs',
        'post_parent' => $_POST['parentId'],
        'posts_per_page' => 10
     ];

    $query = new WP_Query($args );
        if ($query->have_posts()) :
            while($query->have_posts()): $query->the_post();
            the_title('<h3><a href="'.get_the_permalink(get_the_ID()).'">', '</a></h3>');
            endwhile;
            wp_reset_postdata();
        else: printf(esc_html__('Nothing found with " %s "', 'ddoc'), $_POST['keyworkds']);
    endif;
    wp_die();
}



function get_all_pages( $Id ) {

    if (empty($Id)) return array();

    $children = new WP_Query(
      array(
        'post_type' => 'docs',
        'post_parent' => $Id,
        'fields' => 'ids'
      )
    );
    array_unshift($children->posts,"{$Id}");
    return $children->posts;
  }


  //  doc get child page
if(!function_exists('ddoc_doc_child_page')){
	function ddoc_doc_child_page( $id = '' ) {
		if($id == ''){
			return;
		}
		global $post;

		if($post->post_parent){
			return;
		}
		$child_args = array(
			'post_parent' => $post->ID,
			'post_type'   => 'docs',
			'post_status' => 'publish',
			'depth'		  => 1
		);

		$children = get_children( $child_args );


		foreach($children as $post) {
			?>
			<div class="col-sm-4">
                <div class="dt_knowledge_item">
                    <div class="media">
                        <div class="media-left">
                            <div class="img_wrap">
                                <?php
                                    if ( ddoc_get_icon($post->ID) != '' ) {
                                        echo ddoc_get_icon($post->ID);
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="media-body">
                            <h4><a href="<?php echo esc_url(get_the_permalink($post->ID)) ?>" class="text-decoration-none"><?php echo esc_html(get_the_title($post->ID)) ?></a></h4>
				            <p><?php echo wpautop( wp_trim_words(get_the_excerpt($post->ID), 10, '') ); ?><p>
                        </div>
                    </div>
                </div>
			</div>
			<?php
		}


	}
}

function ddoc_get_icon ( $post_id )  {
    $icon = '';
     if(function_exists('get_field')) {
        $get_icon_type = get_field('select_icon_type_', $post_id, true);

        if($get_icon_type == 'icon'){
            $icon = get_field('select_icon', $post_id, true);
        }elseif($get_icon_type == 'image'){
            $imgeId = get_field('upload_image_icon_svg', $post_id, true);
            $icon = wp_get_attachment_image($imgeId['ID'], 'full');
        }
     }
     return $icon;
 }

 // doc next prev function
if ( !function_exists('ddoc_doc_nav')) {
	function ddoc_doc_nav() {
		global $post, $wpdb;

		$next_query = "SELECT ID FROM {$wpdb->posts}
			WHERE post_parent = {$post->post_parent} and post_type = 'docs' and post_status = 'publish' and menu_order > {$post->menu_order}
			ORDER BY menu_order ASC
			LIMIT 0, 1";

		$prev_query = "SELECT ID FROM {$wpdb->posts}
			WHERE post_parent = {$post->post_parent} and post_type = 'docs' and post_status = 'publish' and menu_order < {$post->menu_order}
			ORDER BY menu_order DESC
			LIMIT 0, 1";

		$next_post_id = (int) $wpdb->get_var( $next_query );
		$prev_post_id = (int) $wpdb->get_var( $prev_query );

		if ( $next_post_id || $prev_post_id ) {
			echo '<div class="dt_content_pagonation">';

			if ( $prev_post_id ) {
				printf('<a href="%s" class="prev_content prev"><i class="fas fa-arrow-left"></i>%s</a>',
				get_permalink( $prev_post_id ),
				esc_html__('Previous', 'ddoc'));
			}

			if ( $next_post_id ) {
				printf('<a href="%s" class="prev_content next">%s<i class="fas fa-arrow-right"></i></i></a>',
				get_permalink( $next_post_id ),
				esc_html__('Next', 'ddoc'));
			}

			echo '</div>';
		}

	}
}
