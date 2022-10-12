import $ from 'jquery';
jQuery(function ($){
    $(document).on('keyup', '.ajax-ddoc-search', function(){
        let searchKeywords = $(this).val();
        let parrentId = $(this).data('parent-id');
        var data = {
			'action': 'doc_search_result',
			'parentId': parrentId,
            'keyworkds': searchKeywords, 
            'nonce'    :ddoc_single_ajax_call.nonce
		};

		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ddoc_single_ajax_call.ajaxurl, data, function(response) {
            $('.ajax_sajation').html(response);
			console.log(response)
		});
    });
});