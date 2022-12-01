<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ddoc
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function ddoc_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'blog_sidebar' ) ) {
		$classes[] = 'no-sidebar';
	}else{
		$classes[] = 'has-active-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'ddoc_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */

function ddoc_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'ddoc_pingback_header' );

function ddoc_continue_reading_text() {
	$continue_reading = sprintf(
		/* translators: %s: Name of current post. */
		esc_html__( 'Continue reading %s', 'ddoc' ),
		the_title( '<span class="screen-reader-text">', '</span>', false )
	);

	return $continue_reading;
}

function ddoc_continue_reading_link_excerpt() {
	global $post;
	return ' ...';
}

// Filter the excerpt more link.
add_filter( 'excerpt_more', 'ddoc_continue_reading_link_excerpt' );

if(!function_exists('')) :

/**
 * Print the first instance of a block in the content, and then break away.
 *
 * @since ddoc 1.0
 *
 * @param string      $block_name The full block type name, or a partial match.
 *                                Example: `core/image`, `core-embed/*`.
 * @param string|null $content    The content to search in. Use null for get_the_content().
 * @param int         $instances  How many instances of the block will be printed (max). Defaults to 1.
 *
 * @return bool Returns true if a block was located & printed, otherwise false.
 */

function ddoc_print_first_instance_of_block( $block_name, $content = null, $instances = 1 ) {
	$instances_count = 0;
	$blocks_content  = '';

	if ( ! $content ) {
		$content = get_the_content();
	}

	// Parse blocks in the content.
	$blocks = parse_blocks( $content );

	// Loop blocks.
	foreach ( $blocks as $block ) {

		// Sanity check.
		if ( ! isset( $block['blockName'] ) ) {
			continue;
		}

		// Check if this the block matches the $block_name.
		$is_matching_block = false;

		// If the block ends with *, try to match the first portion.
		if ( '*' === $block_name[-1] ) {
			$is_matching_block = 0 === strpos( $block['blockName'], rtrim( $block_name, '*' ) );
		} else {
			$is_matching_block = $block_name === $block['blockName'];
		}

		if ( $is_matching_block ) {
			// Increment count.
			$instances_count++;

			// Add the block HTML.
			$blocks_content .= render_block( $block );

			// Break the loop if the $instances count was reached.
			if ( $instances_count >= $instances ) {
				break;
			}
		}
	}

	if ( $blocks_content ) {
		echo apply_filters( 'the_content', $blocks_content ); // phpcs:ignore WordPress.Security.EscapeOutput
		return true;
	}

	return false;
}

endif;


if(!function_exists('ddoc_can_show_post_thumbnail')) :
/**
 * Determines if post thumbnail can be displayed.
 *
 * @since ddoc 1.0
 *
 * @return bool
 */
function ddoc_can_show_post_thumbnail() {
	return apply_filters(
		'ddoc_can_show_post_thumbnail',
		! post_password_required() && ! is_attachment() && has_post_thumbnail()
	);
}

endif;

/**
 * Change custom logo class
 *
 **/
add_filter( 'get_custom_logo', 'ddoc_custom_logo_class' );


function ddoc_custom_logo_class( $html ) {

    $html = str_replace( 'custom-logo-link', 'custom-logo-link navbar-brand', $html );

    return $html;
}

//Comment Field Order
add_filter( 'comment_form_fields', 'ddoc_comment_fields_custom_order' );
function ddoc_comment_fields_custom_order( $fields ) {
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
    $url_field = $fields['url'];
    $cookies_field = $fields['cookies'];
    unset( $fields['comment'] );
    unset( $fields['author'] );
    unset( $fields['email'] );
    unset( $fields['url'] );
    unset( $fields['cookies'] );
    // the order of fields is the order below, change it as needed:
    $fields['author'] = $author_field;
    $fields['email'] = $email_field;
    $fields['url'] = $url_field;
    $fields['comment'] = $comment_field;
    $fields['cookies'] = $cookies_field;
    // done ordering, now return the fields:
    return $fields;
}


if(!function_exists('ddoc_wrapper_start')) {

	function ddoc_wrapper_start( $sidebar = 'right', $column = 8, $post_id = '', $bannar_type = '' ) {
		do_action('_ddoc_banner_content', $post_id, $bannar_type);

		$row_class = 'row';

		if ($sidebar == 'left' && is_active_sidebar( 'blog_sidebar' ) ) {
			$row_class = 'row flex-row-reverse';
		}

		if ( $sidebar == 'full' || !is_active_sidebar( 'blog_sidebar' ) ) {
			$row_class = 'row justify-content-center';

		}

		if ( $column == !is_active_sidebar( 'blog_sidebar' ) ) {
            $column = '10';
        }

		?>
		 <div class="container sec_padding">
			<div class="<?php echo esc_attr($row_class); ?>">
				<div class="col-lg-<?php echo esc_attr( $column ); ?>">
		<?php

	}

}
if(!function_exists('ddoc_wrapper_end')) {

	function ddoc_wrapper_end( $sidebar = 'right' ) {
		?>
		  </div>
		 <?php
			if($sidebar != 'full' && is_active_sidebar( 'blog_sidebar' )){
				get_sidebar();
			}
	     ?>

		 </div>
	   </div>
		<?php
	}

}
if(!function_exists('ddoc_pagination')){

	function ddoc_pagination(){

		the_posts_pagination( array(
			'mid_size'  => 2,
			'prev_text' => '<i class="fas fa-angle-left"></i>',
			'next_text' => '<i class="fas fa-angle-right"></i>',
		) );
	}

}



function get_themebuilder_Id( $id, $type = 'header' ) {

 $content_id = '';
  $arg = [
	'post_type' => 'droit-templates',
	'post_status' => 'publish',
	'sort_order' => 'DESC',
	'sort_column' => 'ID,post_title',
	'numberposts' => -1,
 ];
 $pages = get_posts( $arg );

 $dispaly_list = [];

 foreach($pages as $page) {
	$get_tempalte = get_post_meta($page->ID, 'dtdr_header_templates', true);

	//  Check display Header
	if($get_tempalte['type'] == $type) {
		$dispaly = $get_tempalte['display'];
		$dispaly_list[$page->ID] = $dispaly;
	}
 }

 return _ddoc_themebuilder_id($dispaly_list, $id);

}

if(!function_exists('_ddoc_header')){
	function _ddoc_header( $header_id ) {

        if ( $header_id != '' && class_exists('\Elementor\Plugin' ) ) {
            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_id );
        } else{
            ?>
            <header id="masthead" class="site-header sticky_nav">
                <?php get_template_part( 'template-parts/header/nav/content',  'nav'); ?>
            </header><!-- #masthead -->
            <?php
        }

	}

	add_action('_ddoc_header_content', '_ddoc_header');
}

if(!function_exists('_ddoc_footer')){
	function _ddoc_footer( $footer_id ) {

		if ( $footer_id != '' && class_exists( '\Elementor\Plugin' ) ) {
			echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_id );
		} else {
			$footer_text = ddoc_opt('footer_copyright_txt', 'Copyright &copy; 2022 <a href="#">DroitThemes</a> | All rights reserved');
			?>
			<footer id="colophon" class="site-footer text-center">
				<div class="site-info container">
					<?php echo ddoc_kses($footer_text); ?>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
			<?php
		}
	}

	add_action('_ddoc_footer_content', '_ddoc_footer');
}

if(!function_exists('_ddoc_banner_display')) {
	function _ddoc_banner_display( $banner_id = '', $display_on = '' ) {

		if ( $banner_id != '' && class_exists( '\Elementor\Plugin' ) ) {
			echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $banner_id );
		} else {
			get_template_part('template-parts/banner/banner', $display_on);
		}

	}
	add_action('_ddoc_banner_content', '_ddoc_banner_display', 10, 2);
}
function get_builder_id($arr, $key) {
	foreach ($arr as $k => $val) {
		if(in_array($key, $val)){
			return $k;
		}
	}
	return null;
 }

if(!function_exists('_ddoc_themebuilder_id')){
function _ddoc_themebuilder_id($arr = [], $id = '') {
  if(empty($arr)) {
	  return $arr;
  }
  global $post;
  $post_type = get_post_type(get_the_ID());

  //  check custom postype select header
  if(is_singular($post_type) && get_builder_id($arr, $post_type)) {
	return $content_id = get_builder_id($arr, $post_type);
  }
    //  Check custom postype select Archive
  if(is_post_type_archive($post_type) && get_builder_id($arr, $post_type)) {
	return $content_id = get_builder_id($arr, $post_type);
  }

  if(is_front_page() && get_builder_id($arr, 'front_page')) {
	return $content_id = get_builder_id($arr, 'front_page');
  }
  //  Check block page
  if(is_home() && get_builder_id($arr, 'home_page')) {
	return $content_id = get_builder_id($arr, 'home_page');
  }
// Check 404 page
  if(is_404() && get_builder_id($arr, 'four_0_4')) {
	return $content_id = get_builder_id($arr, 'four_0_4');
  }
// Check category
if(is_category() && get_builder_id($arr, 'category')) {
	return $content_id = get_builder_id($arr, 'category');
  }
// if has header on archive page
if(is_archive() && get_builder_id($arr, 'archives')) {
	return $content_id = get_builder_id($arr, 'archives');
  }
//  Check is search page
if(is_search() && get_builder_id($arr, 'search')) {
return $content_id = get_builder_id($arr, 'search');
}
// if page has uniqeuue header
if(get_builder_id($arr, $id)) {
	return $content_id = get_builder_id($arr, $id);
}
if(is_single() && get_builder_id($arr, 'single_block')) {
	return $content_id = get_builder_id($arr, 'single_block');
}
if(is_page() && get_builder_id($arr, 'all_page')) {
	return $content_id = get_builder_id($arr, 'all_page');
}
if(get_builder_id($arr, 'entire_website')) {
	return $content_id = get_builder_id($arr, 'entire_website');
}

	return '';
 }
}
