!function($){var e=$(".tabs li").length;1===e?$(".tabs").hide():$(".tabs").show(),$("#is_gift").is(":checked")?$("#gift_message_field").show():$("#gift_message_field").hide(),$("#is_gift").change(function(){this.checked?$("#gift_message_field").slideDown():$("#gift_message_field").slideUp()})}(jQuery);