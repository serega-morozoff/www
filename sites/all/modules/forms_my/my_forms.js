jQuery(document).ready(function(){
	jQuery('body.page-node-edit.node-type-rating-raking table.field-multiple-table thead').live('click',function(){
		jQuery(this).parent().find('tbody');
		if (jQuery(this).parent().find('tbody').css('display') == 'none') {
			jQuery(this).parent().find('tbody').slideDown();
		} else {
			jQuery(this).parent().find('tbody').slideUp();
		}
	});

	jQuery('body.page-node-edit.node-type-rating-raking table.field-multiple-table tbody').each(function(){
		jQuery(this).css('display','none');
	});

});