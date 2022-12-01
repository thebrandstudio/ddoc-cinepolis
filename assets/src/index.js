/** @format */

import $ from 'jquery';
import './doc_search_ajax';
jQuery(function ($) {
	'use strict';
	//*============ parallaxie js ==============*/

	if ($('.parallaxie').length) {
		if ($(window).width() > 767) {
			$('.parallaxie').parallaxie({
				speed: 0.5,
			});
		}
	}






	var container = document.getElementById('test-boton');
	var elements = container.getElementsByTagName('boton');
	    container.addEventListener("click",function(){
	      this.style.backgroundColor = 'red'; // change element bgcolor to red
	      echo '<script>window.location.href=window.location.href;</script>';
	    },false);
	}





	//*============ background image js ==============*/
	$('[data-bg-img]').each(function () {
		var bg = $(this).data('bg-img');
		$(this).css({
			background: 'no-repeat center 0/cover url(' + bg + ')',
		});
	});

	//* Navbar Fixed
	function navbarFixedTwo() {
		if ($('.sticky_nav').length) {
			$(window).scroll(function () {
				var scroll = $(window).scrollTop();
				if (scroll) {
					$('.sticky_nav').addClass('navbar_fixed');
				} else {
					$('.sticky_nav').removeClass('navbar_fixed');
				}
			});
		}
	}
	navbarFixedTwo();

	if ($('.site-header').hasClass('site-header')) {
		var nav = $('.site-header');
		$(window).on('load resize', function () {
			var headerHeight = nav.outerHeight();
			nav.css('height', headerHeight).show();
		});
	}

	function Menu_js() {
		if ($('.submenu').length) {
			$('.submenu > .dropdown-toggle').click(function () {
				var location = $(this).attr('href');
				window.location.href = location;
				return false;
			});
		}
	}
	Menu_js();

	function menu_dropdown() {
		if ($(window).width() < 992) {
			$('.menu > li .mobile_dropdown_icon,.search_cart .shpping-cart').on(
				'click',
				function (event) {
					// $(this)
					// 	// .parents('.dropdown-menu')
					// 	.first()
					// 	.find('.open')
					// 	.addClass('open');
					// $(this).toggleClass('open');
					$(this).parent().find('.dropdown-menu').first().slideToggle(700);
					$(this)
						.parent()
						.find('.mobile_dropdown_icon')
						.first()
						.toggleClass('arrow_rotate');
					$(this).parent().siblings().find('.dropdown-menu').slideUp(700);
					$(this)
						.parent()
						.siblings()
						.find('.mobile_dropdown_icon')
						.removeClass('arrow_rotate');
				}
			);
		}
	}
	menu_dropdown();

	$('.search > a').on('click', function () {
		if ($(this).parent().hasClass('open')) {
			$(this).parent().removeClass('open');
		} else {
			$(this).parent().addClass('open');
		}
		return false;
	});

	$('.navbar-toggler').on('click', function () {
		if ($('.navbar-toggler').hasClass('collapsed')) {
			$(this).removeClass('collapsed');
		} else {
			$(this).addClass('collapsed');
		}

		if ($('.navbar-collapse').not('show')) {
			$('.navbar-collapse').removeClass('show').slideToggle(700);
		} else {
			$('.navbar-collapse').addClass('show').slideUp(700);
		}
	});

	//  do coc  single page menu

	$(document).on('click', '.doc-nav-list > li span', function (e) {
		e.preventDefault();
		$(this).parents('li').find('.children').slideToggle();
		$(this).parents('li').siblings('li').find('.children').slideUp();
	});

	if ($('.doc-nav-list > li').hasClass('wd-state-open')) {
		$('.doc-nav-list > li.wd-state-open').find('.children').slideDown(700);
	}

	$('.doc-nav-list > li span').each(function () {
		var $this = $(this);
		$this.on('click', function (e) {
			var has = $this.parents('li').hasClass('wd-state-open');
			$('.doc-nav-list > li').removeClass('wd-state-open');
			if (has) {
				$this.parents('li').removeClass('wd-state-open');
			} else {
				$this.parents('li').addClass('wd-state-open');
			}
		});
	});





  ajax call for ddoc single page
	$(document).on('click', '.doc-sidebar-menu .doc-nav-list li a', function (e) {
		e.preventDefault();
		if (e.target !== this) return;
		  Get page id on click
		let pageId = $(this).find('span[data-page-id]').data('page-id');
		  get div where want to dispaly content
		let dispaly_container = $(this).parents('.row').find('.ddoc-page-content');
		  get div to display title
		let display_title = $(this)
			.parents('.row')
			.find('.entry-header .entry-title');
		  display progressbar
		let progressbar = $(this).parents('.row').find('.ajx-progress');
		progressbar.fadeIn();
		var data = {
			action: 'ddoc_single_page_ajax',
			pageId: pageId,
			security: ddoc_single_ajax_call.nonce,
		};
		let current_url = $(this).attr('href');

		jQuery.post(ddoc_single_ajax_call.ajaxurl, data, function (response) {
			let obj = JSON.parse(response);
			display_title.html(obj.post_title);
			dispaly_container.html(obj.post_content);
			window.history.pushState(null, '', current_url);
			progressbar.css('width', '100%');
			setTimeout(function () {
				progressbar.css('width', '0%');
				progressbar.hide();
			}, '500');
		});
	});

	var inputs = $('.search-doc .form-control').not(':submit');

	inputs.on('input', function (idx) {
		var top_text = $(this).parent('.search-doc').find('.ajax_sajation');
		$(this).toggleClass('animated', this.value > '');
		$(top_text).toggleClass('animated', this.value > '');
	});

	$(document).ready(function () {
		function openRightSiDebar() {
			if ('.clickIconRight'.length > 0) {
				$('.clickIconRight').on('click', function () {
					$('.dt_product_body_wrap').toggleClass('openRightSIdebar');
				});
				$('.clickIconRight .fa-angle-left').on('click', function () {
					$('.dt_product_body').append("<div class='overlay_bg'></div>");
				});
				$('.clickIconRight .fa-angle-right').on('click', function () {
					$('.dt_product_body').find('.overlay_bg').remove();
				});
				$('.dt_product_body, .dt_side_menu_left_content').on(
					'click',
					function () {
						$('.dt_product_body_wrap').removeClass('openRightSIdebar');
						$('.dt_product_body').find('.overlay_bg').remove();
					}
				);
			}
		}
		openRightSiDebar();
	});

	$('.clickIconLeft').on('click', function (n) {
		$(this).toggleClass('open');
		if ($('.sidebar_left').hasClass('menu-opened')) {
			$('.sidebar_left').removeClass('menu-opened').slideToggle();
		} else {
			$('.sidebar_left').addClass('menu-opened').slideDown();
		}
	});
});
