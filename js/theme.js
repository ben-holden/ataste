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

	// WooCommerce: hide the ship to a different address inputs unless the box is ticked

	if ($(".shipping_address").checked) {
		$(this).show();
	} else {
		$(this).hide();
	}

	$("#ship-to-different-address-checkbox").change(function() {
	    if(this.checked) {
	        $(".shipping_address").show();
	    } else {
	        $(".shipping_address").hide();
	    }
	});

} )( jQuery );
