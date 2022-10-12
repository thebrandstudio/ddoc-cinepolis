<?php 

if(class_exists('\DroitHead\Includes\Supports\Support')){
	 
	class ddoc_banner_display extends \DroitHead\Includes\Supports\Support{
		 public function __construct(){}

		 public function apply_method1(){}
	
		 public function apply_method2(){}
	
		 public function replace_header(){}
	
		 public function replace_header_method2(){}
	
		 public function replace_footer(){}
	
		 public function replace_footer_method2(){}

		 public function get_banner_template_id() {
			$id = $this->get_templates('banner');
			return $id;
		 }
	}  
}

add_action('ddoc_banner', 'display_banner', 10);

function display_banner() {
    
    if(class_exists('\DroitHead\Includes\Supports\Support')){

      $get_template_id = new ddoc_banner_display();
      $template_id = $get_template_id->get_banner_template_id();

      if($template_id){
        echo drdt_kses_html(\Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $template_id ) );
      }else{
          if(is_page()) {
            get_template_part('template-parts/banner/banner', 'page');
          }elseif(is_archive()){
            get_template_part('template-parts/banner/banner', 'archive');
          }elseif(is_404()) {
            get_template_part('template-parts/banner/banner', '404');
          }elseif(is_home()){
            get_template_part('template-parts/banner/banner', 'blog');   
        }
      }
    }else{
        if(is_page()) {
            get_template_part('template-parts/banner/banner', 'page');
          }elseif(is_archive()){
            get_template_part('template-parts/banner/banner', 'archive');
          }elseif(is_404()) {
            get_template_part('template-parts/banner/banner', '404');
          }elseif(is_home()){
            get_template_part('template-parts/banner/banner', 'blog'); 
          }
    }
}
