!function($){var s=$(".tabs li").length;1===s?$(".tabs").hide():$(".tabs").show(),$(".shipping_address").checked?$(this).show():$(this).hide(),$("#ship-to-different-address-checkbox").change(function(){this.checked?$(".shipping_address").show():$(".shipping_address").hide()})}(jQuery);