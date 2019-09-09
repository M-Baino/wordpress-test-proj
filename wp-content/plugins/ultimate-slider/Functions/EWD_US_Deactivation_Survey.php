<?php
add_action('current_screen', 'EWD_US_Deactivation_Survey');
function EWD_US_Deactivation_Survey() {
	if (in_array(get_current_screen()->id, array( 'plugins', 'plugins-network' ), true)) {
		add_action('admin_enqueue_scripts', 'EWD_US_Enqueue_Deactivation_Scripts');
		add_action( 'admin_footer', 'EWD_US_Deactivation_Survey_HTML'); 
	}
}

function EWD_US_Enqueue_Deactivation_Scripts() {
	wp_enqueue_style('ewd-us-deactivation-css', EWD_US_CD_PLUGIN_URL . 'css/ewd-us-plugin-deactivation.css');
	wp_enqueue_script('ewd-us-deactivation-js', EWD_US_CD_PLUGIN_URL . 'js/ewd-us-plugin-deactivation.js', array('jquery'));

	wp_localize_script('ewd-us-deactivation-js', 'ewd_us_deactivation_data', array('site_url' => site_url()));
}

function EWD_US_Deactivation_Survey_HTML() {
	$Install_Time = get_option("EWD_US_Install_Time");

	$options = array(
		1 => array(
			'title'   => esc_html__( 'I no longer need the plugin', 'ultimate-slider' ),
		),
		2 => array(
			'title'   => esc_html__( 'I\'m switching to a different plugin', 'ultimate-slider' ),
			'details' => esc_html__( 'Please share which plugin', 'ultimate-slider' ),
		),
		3 => array(
			'title'   => esc_html__( 'I couldn\'t get the plugin to work', 'ultimate-slider' ),
			'details' => esc_html__( 'Please share what wasn\'t working', 'ultimate-slider' ),
		),
		4 => array(
			'title'   => esc_html__( 'It\'s a temporary deactivation', 'ultimate-slider' ),
		),
		5 => array(
			'title'   => esc_html__( 'Other', 'ultimate-slider' ),
			'details' => esc_html__( 'Please share the reason', 'ultimate-slider' ),
		),
	);
	?>
	<div class="ewd-us-deactivate-survey-modal" id="ewd-us-deactivate-survey-ultimate-faqs">
		<div class="ewd-us-deactivate-survey-wrap">
			<form class="ewd-us-deactivate-survey" method="post" data-installtime="<?php echo $Install_Time; ?>">
				<span class="ewd-us-deactivate-survey-title"><span class="dashicons dashicons-testimonial"></span><?php echo ' ' . __( 'Quick Feedback', 'ultimate-slider' ); ?></span>
				<span class="ewd-us-deactivate-survey-desc"><?php echo __('If you have a moment, please share why you are deactivating Ultimate Slider:', 'ultimate-slider' ); ?></span>
				<div class="ewd-us-deactivate-survey-options">
					<?php foreach ( $options as $id => $option ) : ?>
						<div class="ewd-us-deactivate-survey-option">
							<label for="ewd-us-deactivate-survey-option-ultimate-faqs-<?php echo $id; ?>" class="ewd-us-deactivate-survey-option-label">
								<input id="ewd-us-deactivate-survey-option-ultimate-faqs-<?php echo $id; ?>" class="ewd-us-deactivate-survey-option-input" type="radio" name="code" value="<?php echo $id; ?>" />
								<span class="ewd-us-deactivate-survey-option-reason"><?php echo $option['title']; ?></span>
							</label>
							<?php if ( ! empty( $option['details'] ) ) : ?>
								<input class="ewd-us-deactivate-survey-option-details" type="text" placeholder="<?php echo $option['details']; ?>" />
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="ewd-us-deactivate-survey-footer">
					<button type="submit" class="ewd-us-deactivate-survey-submit button button-primary button-large"><?php _e('Submit and Deactivate', 'ultimate-slider' ); ?></button>
					<a href="#" class="ewd-us-deactivate-survey-deactivate"><?php _e('Skip and Deactivate', 'ultimate-slider' ); ?></a>
				</div>
			</form>
		</div>
	</div>
	<?php
}

?>