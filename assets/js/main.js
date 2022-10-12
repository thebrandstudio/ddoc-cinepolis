/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/src/doc_search_ajax.js":
/*!***************************************!*\
  !*** ./assets/src/doc_search_ajax.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ \"jquery\");\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);\n\r\njQuery(function ($){\r\n    $(document).on('keyup', '.ajax-ddoc-search', function(){\r\n        let searchKeywords = $(this).val();\r\n        let parrentId = $(this).data('parent-id');\r\n        var data = {\r\n\t\t\t'action': 'doc_search_result',\r\n\t\t\t'parentId': parrentId,\r\n            'keyworkds': searchKeywords, \r\n            'nonce'    :ddoc_single_ajax_call.nonce\r\n\t\t};\r\n\r\n\t\t// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php\r\n\t\tjQuery.post(ddoc_single_ajax_call.ajaxurl, data, function(response) {\r\n            $('.ajax_sajation').html(response);\r\n\t\t\tconsole.log(response)\r\n\t\t});\r\n    });\r\n});\n\n//# sourceURL=webpack://Ddoc/./assets/src/doc_search_ajax.js?");

/***/ }),

/***/ "./assets/src/index.js":
/*!*****************************!*\
  !*** ./assets/src/index.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ \"jquery\");\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _doc_search_ajax__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./doc_search_ajax */ \"./assets/src/doc_search_ajax.js\");\n/** @format */\r\n\r\n\r\n\r\njQuery(function ($) {\r\n\t'use strict';\r\n\t//*============ parallaxie js ==============*/\r\n\r\n\tif ($('.parallaxie').length) {\r\n\t\tif ($(window).width() > 767) {\r\n\t\t\t$('.parallaxie').parallaxie({\r\n\t\t\t\tspeed: 0.5,\r\n\t\t\t});\r\n\t\t}\r\n\t}\r\n\r\n\t//*============ background image js ==============*/\r\n\t$('[data-bg-img]').each(function () {\r\n\t\tvar bg = $(this).data('bg-img');\r\n\t\t$(this).css({\r\n\t\t\tbackground: 'no-repeat center 0/cover url(' + bg + ')',\r\n\t\t});\r\n\t});\r\n\r\n\t//* Navbar Fixed\r\n\tfunction navbarFixedTwo() {\r\n\t\tif ($('.sticky_nav').length) {\r\n\t\t\t$(window).scroll(function () {\r\n\t\t\t\tvar scroll = $(window).scrollTop();\r\n\t\t\t\tif (scroll) {\r\n\t\t\t\t\t$('.sticky_nav').addClass('navbar_fixed');\r\n\t\t\t\t} else {\r\n\t\t\t\t\t$('.sticky_nav').removeClass('navbar_fixed');\r\n\t\t\t\t}\r\n\t\t\t});\r\n\t\t}\r\n\t}\r\n\tnavbarFixedTwo();\r\n\r\n\tif ($('.site-header').hasClass('site-header')) {\r\n\t\tvar nav = $('.site-header');\r\n\t\t$(window).on('load resize', function () {\r\n\t\t\tvar headerHeight = nav.outerHeight();\r\n\t\t\tnav.css('height', headerHeight).show();\r\n\t\t});\r\n\t}\r\n\r\n\tfunction Menu_js() {\r\n\t\tif ($('.submenu').length) {\r\n\t\t\t$('.submenu > .dropdown-toggle').click(function () {\r\n\t\t\t\tvar location = $(this).attr('href');\r\n\t\t\t\twindow.location.href = location;\r\n\t\t\t\treturn false;\r\n\t\t\t});\r\n\t\t}\r\n\t}\r\n\tMenu_js();\r\n\r\n\tfunction menu_dropdown() {\r\n\t\tif ($(window).width() < 992) {\r\n\t\t\t$('.menu > li .mobile_dropdown_icon,.search_cart .shpping-cart').on(\r\n\t\t\t\t'click',\r\n\t\t\t\tfunction (event) {\r\n\t\t\t\t\t// $(this)\r\n\t\t\t\t\t// \t// .parents('.dropdown-menu')\r\n\t\t\t\t\t// \t.first()\r\n\t\t\t\t\t// \t.find('.open')\r\n\t\t\t\t\t// \t.addClass('open');\r\n\t\t\t\t\t// $(this).toggleClass('open');\r\n\t\t\t\t\t$(this).parent().find('.dropdown-menu').first().slideToggle(700);\r\n\t\t\t\t\t$(this)\r\n\t\t\t\t\t\t.parent()\r\n\t\t\t\t\t\t.find('.mobile_dropdown_icon')\r\n\t\t\t\t\t\t.first()\r\n\t\t\t\t\t\t.toggleClass('arrow_rotate');\r\n\t\t\t\t\t$(this).parent().siblings().find('.dropdown-menu').slideUp(700);\r\n\t\t\t\t\t$(this)\r\n\t\t\t\t\t\t.parent()\r\n\t\t\t\t\t\t.siblings()\r\n\t\t\t\t\t\t.find('.mobile_dropdown_icon')\r\n\t\t\t\t\t\t.removeClass('arrow_rotate');\r\n\t\t\t\t}\r\n\t\t\t);\r\n\t\t}\r\n\t}\r\n\tmenu_dropdown();\r\n\r\n\t$('.search > a').on('click', function () {\r\n\t\tif ($(this).parent().hasClass('open')) {\r\n\t\t\t$(this).parent().removeClass('open');\r\n\t\t} else {\r\n\t\t\t$(this).parent().addClass('open');\r\n\t\t}\r\n\t\treturn false;\r\n\t});\r\n\r\n\t$('.navbar-toggler').on('click', function () {\r\n\t\tif ($('.navbar-toggler').hasClass('collapsed')) {\r\n\t\t\t$(this).removeClass('collapsed');\r\n\t\t} else {\r\n\t\t\t$(this).addClass('collapsed');\r\n\t\t}\r\n\r\n\t\tif ($('.navbar-collapse').not('show')) {\r\n\t\t\t$('.navbar-collapse').removeClass('show').slideToggle(700);\r\n\t\t} else {\r\n\t\t\t$('.navbar-collapse').addClass('show').slideUp(700);\r\n\t\t}\r\n\t});\r\n\r\n\t//  do coc  single page menu\r\n\r\n\t$(document).on('click', '.doc-nav-list > li span', function (e) {\r\n\t\te.preventDefault();\r\n\t\t$(this).parents('li').find('.children').slideToggle();\r\n\t\t$(this).parents('li').siblings('li').find('.children').slideUp();\r\n\t});\r\n\r\n\tif ($('.doc-nav-list > li').hasClass('wd-state-open')) {\r\n\t\t$('.doc-nav-list > li.wd-state-open').find('.children').slideDown(700);\r\n\t}\r\n\r\n\t$('.doc-nav-list > li span').each(function () {\r\n\t\tvar $this = $(this);\r\n\t\t$this.on('click', function (e) {\r\n\t\t\tvar has = $this.parents('li').hasClass('wd-state-open');\r\n\t\t\t$('.doc-nav-list > li').removeClass('wd-state-open');\r\n\t\t\tif (has) {\r\n\t\t\t\t$this.parents('li').removeClass('wd-state-open');\r\n\t\t\t} else {\r\n\t\t\t\t$this.parents('li').addClass('wd-state-open');\r\n\t\t\t}\r\n\t\t});\r\n\t});\r\n\r\n\t//  ajax call for ddoc single page\r\n\t$(document).on('click', '.doc-sidebar-menu .doc-nav-list li a', function (e) {\r\n\t\te.preventDefault();\r\n\t\tif (e.target !== this) return;\r\n\t\t//  Get page id on click\r\n\t\tlet pageId = $(this).find('span[data-page-id]').data('page-id');\r\n\t\t//  get div where want to dispaly content\r\n\t\tlet dispaly_container = $(this).parents('.row').find('.ddoc-page-content');\r\n\t\t//  get div to display title\r\n\t\tlet display_title = $(this)\r\n\t\t\t.parents('.row')\r\n\t\t\t.find('.entry-header .entry-title');\r\n\t\t//  display progressbar\r\n\t\tlet progressbar = $(this).parents('.row').find('.ajx-progress');\r\n\t\tprogressbar.fadeIn();\r\n\t\tvar data = {\r\n\t\t\taction: 'ddoc_single_page_ajax',\r\n\t\t\tpageId: pageId,\r\n\t\t\tsecurity: ddoc_single_ajax_call.nonce,\r\n\t\t};\r\n\t\tlet current_url = $(this).attr('href');\r\n\t\tconsole.log($(this).attr('href'));\r\n\t\tjQuery.post(ddoc_single_ajax_call.ajaxurl, data, function (response) {\r\n\t\t\tlet obj = JSON.parse(response);\r\n\t\t\tdisplay_title.html(obj.post_title);\r\n\t\t\tdispaly_container.html(obj.post_content);\r\n\t\t\twindow.history.pushState(null, '', current_url);\r\n\t\t\tprogressbar.css('width', '100%');\r\n\t\t\tsetTimeout(function () {\r\n\t\t\t\tprogressbar.css('width', '0%');\r\n\t\t\t\tprogressbar.hide();\r\n\t\t\t}, '500');\r\n\t\t});\r\n\t});\r\n\r\n\tvar inputs = $('.search-doc .form-control').not(':submit');\r\n\r\n\tinputs.on('input', function (idx) {\r\n\t\tvar top_text = $(this).parent('.search-doc').find('.ajax_sajation');\r\n\t\t$(this).toggleClass('animated', this.value > '');\r\n\t\t$(top_text).toggleClass('animated', this.value > '');\r\n\t});\r\n\r\n\t$(document).ready(function () {\r\n\t\tfunction openRightSiDebar() {\r\n\t\t\tif ('.clickIconRight'.length > 0) {\r\n\t\t\t\t$('.clickIconRight').on('click', function () {\r\n\t\t\t\t\t$('.dt_product_body_wrap').toggleClass('openRightSIdebar');\r\n\t\t\t\t});\r\n\t\t\t\t$('.clickIconRight .fa-angle-left').on('click', function () {\r\n\t\t\t\t\t$('.dt_product_body').append(\"<div class='overlay_bg'></div>\");\r\n\t\t\t\t});\r\n\t\t\t\t$('.clickIconRight .fa-angle-right').on('click', function () {\r\n\t\t\t\t\t$('.dt_product_body').find('.overlay_bg').remove();\r\n\t\t\t\t});\r\n\t\t\t\t$('.dt_product_body, .dt_side_menu_left_content').on(\r\n\t\t\t\t\t'click',\r\n\t\t\t\t\tfunction () {\r\n\t\t\t\t\t\t$('.dt_product_body_wrap').removeClass('openRightSIdebar');\r\n\t\t\t\t\t\t$('.dt_product_body').find('.overlay_bg').remove();\r\n\t\t\t\t\t}\r\n\t\t\t\t);\r\n\t\t\t}\r\n\t\t}\r\n\t\topenRightSiDebar();\r\n\t});\r\n\r\n\t$('.clickIconLeft').on('click', function (n) {\r\n\t\t$(this).toggleClass('open');\r\n\t\tif ($('.sidebar_left').hasClass('menu-opened')) {\r\n\t\t\t$('.sidebar_left').removeClass('menu-opened').slideToggle();\r\n\t\t} else {\r\n\t\t\t$('.sidebar_left').addClass('menu-opened').slideDown();\r\n\t\t}\r\n\t});\r\n});\r\n\n\n//# sourceURL=webpack://Ddoc/./assets/src/index.js?");

/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/***/ ((module) => {

module.exports = jQuery;

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./assets/src/index.js");
/******/ 	
/******/ })()
;