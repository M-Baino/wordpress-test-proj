jQuery(document).ready(function($) {
	jQuery('.ewd-us-main-dashboard-review-ask').css('display', 'block');

	jQuery('.ewd-us-main-dashboard-review-ask').on('click', function(event) {
		if (jQuery(event.srcElement).hasClass('notice-dismiss')) {
			var data = 'Ask_Review_Date=3&action=ewd_us_hide_review_ask';
        	jQuery.post(ajaxurl, data, function() {});
        }
	});

	jQuery('.ewd-us-review-ask-yes').on('click', function() {
		jQuery('.ewd-us-review-ask-feedback-text').removeClass('us-hidden');
		jQuery('.ewd-us-review-ask-starting-text').addClass('us-hidden');

		jQuery('.ewd-us-review-ask-no-thanks').removeClass('us-hidden');
		jQuery('.ewd-us-review-ask-review').removeClass('us-hidden');

		jQuery('.ewd-us-review-ask-not-really').addClass('us-hidden');
		jQuery('.ewd-us-review-ask-yes').addClass('us-hidden');

		var data = 'Ask_Review_Date=7&action=ewd_us_hide_review_ask';
    	jQuery.post(ajaxurl, data, function() {});
	});

	jQuery('.ewd-us-review-ask-not-really').on('click', function() {
		jQuery('.ewd-us-review-ask-review-text').removeClass('us-hidden');
		jQuery('.ewd-us-review-ask-starting-text').addClass('us-hidden');

		jQuery('.ewd-us-review-ask-feedback-form').removeClass('us-hidden');
		jQuery('.ewd-us-review-ask-actions').addClass('us-hidden');

		var data = 'Ask_Review_Date=1000&action=ewd_us_hide_review_ask';
    	jQuery.post(ajaxurl, data, function() {});
	});

	jQuery('.ewd-us-review-ask-no-thanks').on('click', function() {
		var data = 'Ask_Review_Date=1000&action=ewd_us_hide_review_ask';
        jQuery.post(ajaxurl, data, function() {});

        jQuery('.ewd-us-main-dashboard-review-ask').css('display', 'none');
	});

	jQuery('.ewd-us-review-ask-review').on('click', function() {
		jQuery('.ewd-us-review-ask-feedback-text').addClass('us-hidden');
		jQuery('.ewd-us-review-ask-thank-you-text').removeClass('us-hidden');

		var data = 'Ask_Review_Date=1000&action=ewd_us_hide_review_ask';
        jQuery.post(ajaxurl, data, function() {});
	});

	jQuery('.ewd-us-review-ask-send-feedback').on('click', function() {
		var Feedback = jQuery('.ewd-us-review-ask-feedback-explanation textarea').val();
		var EmailAddress = jQuery('.ewd-us-review-ask-feedback-explanation input[name="feedback_email_address"]').val();
		var data = 'Feedback=' + Feedback + '&EmailAddress=' + EmailAddress + '&action=ewd_us_send_feedback';
        jQuery.post(ajaxurl, data, function() {});

        var data = 'Ask_Review_Date=1000&action=ewd_us_hide_review_ask';
        jQuery.post(ajaxurl, data, function() {});

        jQuery('.ewd-us-review-ask-feedback-form').addClass('us-hidden');
        jQuery('.ewd-us-review-ask-review-text').addClass('us-hidden');
        jQuery('.ewd-us-review-ask-thank-you-text').removeClass('us-hidden');
	});
});