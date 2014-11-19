/**
 * Custom theme styles
 */

( function( $ ) {

	// WooCommerce: hide the tabs if there isn't any aditional information

	var l = $('.tabs li').length;
	if (l === 1) {
	    $('.tabs').hide();
	} else {
	    $('.tabs').show();
	}

	//WooCommerce: hide the gift message unless the box is ticked

	if ($("#is_gift").is(":checked")) {
		$("#gift_message_field").show();
	} else {
		$("#gift_message_field").hide();
	}

	$("#is_gift").change(function() {
	    if(this.checked) {
	        $("#gift_message_field").slideDown();
	    } else {
	        $("#gift_message_field").slideUp();
	    }
	});

} )( jQuery );
