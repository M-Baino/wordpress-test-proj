<?php
/* Add any update or error notices to the top of the admin page */
function EWD_US_Error_Notices(){
	global $ewd_us_message;
	if (isset($ewd_us_message)) {
		if (isset($ewd_us_message['Message_Type']) and $ewd_us_message['Message_Type'] == "Update") {echo "<div class='updated'><p>" . $ewd_us_message['Message'] . "</p></div>";}
		if (isset($ewd_us_message['Message_Type']) and $ewd_us_message['Message_Type'] == "Error") {echo "<div class='error'><p>" . $ewd_us_message['Message'] . "</p></div>";}
	}

	if( get_transient( 'ewd-us-admin-install-notice' ) ){ ?>
		<div class="updated notice is-dismissible">
            <p>Head over to the <a href="edit.php?post_type=ultimate_slider">Ultimate Slider Dashboard</a> to get started using the plugin!</p>
        </div>

        <?php
        delete_transient( 'ewd-us-admin-install-notice' );
	}

	$Ask_Review_Date = get_option('EWD_US_Ask_Review_Date');
	if ($Ask_Review_Date == "") {$Ask_Review_Date = get_option("EWD_US_Install_Time") + 3600*24*4;}

	if ($Ask_Review_Date < time() and get_option("EWD_US_Install_Time") < time() - 3600*24*4) {

		global $pagenow;
		if($pagenow != 'post.php' && $pagenow != 'post-new.php'){ ?>

			<div class='notice notice-info is-dismissible ewd-us-main-dashboard-review-ask' style='display:none'>
				<div class='ewd-us-review-ask-plugin-icon'></div>
				<div class='ewd-us-review-ask-text'>
					<p class='ewd-us-review-ask-starting-text'>Enjoying using the Ultimate Slider plugin?</p>
					<p class='ewd-us-review-ask-feedback-text us-hidden'>Help us make the plugin better! Please take a minute to rate the plugin. Thanks!</p>
					<p class='ewd-us-review-ask-review-text us-hidden'>Please let us know what we could do to make the plugin better!<br /><span>(If you would like a response, please include your email address.)</span></p>
					<p class='ewd-us-review-ask-thank-you-text us-hidden'>Thank you for taking the time to help us!</p>
				</div>
				<div class='ewd-us-review-ask-actions'>
					<div class='ewd-us-review-ask-action ewd-us-review-ask-not-really ewd-us-review-ask-white'>Not Really</div>
					<div class='ewd-us-review-ask-action ewd-us-review-ask-yes ewd-us-review-ask-green'>Yes!</div>
					<div class='ewd-us-review-ask-action ewd-us-review-ask-no-thanks ewd-us-review-ask-white us-hidden'>No Thanks</div>
					<a href='https://wordpress.org/support/plugin/ultimate-slider/reviews/' target='_blank'>
						<div class='ewd-us-review-ask-action ewd-us-review-ask-review ewd-us-review-ask-green us-hidden'>OK, Sure</div>
					</a>
				</div>
				<div class='ewd-us-review-ask-feedback-form us-hidden'>
					<div class='ewd-us-review-ask-feedback-explanation'>
						<textarea></textarea>
						<br>
						<input type="email" name="feedback_email_address" placeholder="<?php _e('Email Address', 'ultimate-slider'); ?>">
					</div>
					<div class='ewd-us-review-ask-send-feedback ewd-us-review-ask-action ewd-us-review-ask-green'>Send Feedback</div>
				</div>
				<div class='ewd-us-clear'></div>
			</div>

			<?php
		}
	}

}

