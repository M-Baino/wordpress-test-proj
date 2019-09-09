<?php

$Custom_CSS = get_option("EWD_US_Custom_CSS");
$Autoplay_Slideshow = get_option("EWD_US_Autoplay_Slideshow");
$Autoplay_Delay = get_option("EWD_US_Autoplay_Delay");
$Autoplay_Interval = get_option("EWD_US_Autoplay_Interval");
$Autoplay_Pause_Hover = get_option("EWD_US_Autoplay_Pause_Hover");
$Transition_Time = get_option("EWD_US_Transition_Time");
$Aspect_Ratio = get_option("EWD_US_Aspect_Ratio");
$Carousel = get_option("EWD_US_Carousel");
$Carousel_Columns = get_option("EWD_US_Carousel_Columns");
$Carousel_Link_To_Full = get_option("EWD_US_Carousel_Link_To_Full");
$Carousel_Advance = get_option("EWD_US_Carousel_Advance");
$Show_TinyMCE = get_option("EWD_US_Show_TinyMCE");
$Timer_Bar = get_option("EWD_US_Timer_Bar");
$Slide_Indicators = get_option("EWD_US_Slide_Indicators");
$Link_Action = get_option("EWD_US_Link_Action");
 
$Slide_Transition_Effect = get_option("EWD_US_Slide_Transition_Effect");
$WC_Product_Image_Slider = get_option("EWD_US_WC_Product_Image_Slider");
$Mobile_Aspect_Ratio = get_option("EWD_US_Mobile_Aspect_Ratio");
$Hide_On_Mobile = get_option("EWD_US_Hide_On_Mobile");
$Mobile_Link_To_Full = get_option("EWD_US_Mobile_Link_To_Full");
$Title_Animate = get_option("EWD_US_Title_Animate");
$Force_Full_Width = get_option("EWD_US_Force_Full_Width");
$Add_Watermark = get_option("EWD_US_Add_Watermark");
$Lightbox = get_option("EWD_US_Lightbox");

$us_Slide_Title_Font = get_option("EWD_us_Slide_Title_Font");
$us_Slide_Title_Font_Size = get_option("EWD_us_Slide_Title_Font_Size");
$us_Slide_Title_Font_Color = get_option("EWD_us_Slide_Title_Font_Color");
$us_Slide_Text_Font = get_option("EWD_us_Slide_Text_Font");
$us_Slide_Text_Font_Size = get_option("EWD_us_Slide_Text_Font_Size");
$us_Slide_Text_Font_Color = get_option("EWD_us_Slide_Text_Font_Color");
$us_Button_Font = get_option("EWD_us_Button_Font");
$us_Button_Font_Size = get_option("EWD_us_Button_Font_Size");
$us_Button_Background_Color = get_option("EWD_us_Button_Background_Color");
$us_Button_Border_Color = get_option("EWD_us_Button_Border_Color");
$us_Button_Text_Color = get_option("EWD_us_Button_Text_Color");
$us_Button_Background_Hover_Color = get_option("EWD_us_Button_Background_Hover_Color");
$us_Button_Border_Hover_Color = get_option("EWD_us_Button_Border_Hover_Color");
$us_Button_Text_Hover_Color = get_option("EWD_us_Button_Text_Hover_Color");

$us_Arrow = get_option("EWD_us_Arrow");
$us_Arrow_Background_Shape = get_option("EWD_us_Arrow_Background_Shape");
$us_Arrow_Color = get_option("EWD_us_Arrow_Color");
$us_Arrow_Font_Size = get_option("EWD_us_Arrow_Font_Size");
$us_Arrow_Background_Color = get_option("EWD_us_Arrow_Background_Color");
$us_Arrow_Background_Size = get_option("EWD_us_Arrow_Background_Size");
$us_Clickable_Area_Background_Color = get_option("EWD_us_Clickable_Area_Background_Color");
$us_Clickable_Area_Size = get_option("EWD_us_Clickable_Area_Size");
$us_Arrow_Line_Height = get_option("EWD_us_Arrow_Line_Height");

if (isset($_POST['Display_Tab'])) {$Display_Tab = $_POST['Display_Tab'];}
else {$Display_Tab = "";}
?>

<div class="wrap us-options-page-tabbed">
	<div class="us-options-submenu-div">
		<ul class="us-options-submenu us-options-page-tabbed-nav">
			<li><a id="Basic_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == '' or $Display_Tab == 'Basic') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Basic');">Basic</a></li>
			<li><a id="Premium_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Premium') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Premium');">Premium</a></li>
			<li><a id="Styling_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Styling') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Styling');">Styling</a></li>
			<li><a id="Control_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Control') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Control');">Control</a></li>
		</ul>
	</div>

	<div class="us-options-page-tabbed-content">
		<form method="post" action="edit.php?post_type=ultimate_slider&page=us-options&Action=EWD_US_UpdateOptions">
			<?php wp_nonce_field( 'EWD_US_Save_Options', 'EWD_US_Save_Options' );  ?>

			<input type='hidden' name='Display_Tab' value='<?php echo $Display_Tab; ?>' />

			<div id='Basic' class='ewd-us-option-set<?php echo ( ($Display_Tab == '' or $Display_Tab == 'Basic') ? '' : ' ewd-us-hidden' ); ?>'>

				<br />

				<div class="ewd-us-shortcode-reminder">
					<?php _e('<strong>REMINDER:</strong> To display the slider, place the <strong>[ultimate-slider]</strong> shortcode on a page', 'ultimate-slider'); ?>
				</div>

				<br />

				<div class="ewd-us-admin-section-heading"><?php _e('Basic Options', 'ultimate-slider'); ?></div>

				<table class="form-table">
					<tr>
						<th scope="row">Custom CSS</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Custom CSS</span></legend>
								<label title='Custom CSS'></label><textarea class='ewd-us-textarea' name='custom_css'> <?php echo $Custom_CSS; ?></textarea><br />
								<p>You can add custom CSS styles to your slider in the box above.</p>
							</fieldset>
						</td>
					</tr>

					<tr>
						<th scope="row">Autoplay Slideshow</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Autoplay Slideshow</span></legend>
								<div class="ewd-us-admin-hide-radios">
									<label title='Yes'><input type='radio' name='slider-autoplay' value='Yes' <?php if($Autoplay_Slideshow == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
									<label title='No'><input type='radio' name='slider-autoplay' value='No' <?php if($Autoplay_Slideshow  == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
								</div>
								<label class="ewd-us-admin-switch">
									<input type="checkbox" class="ewd-us-admin-option-toggle" data-inputname="slider-autoplay" <?php if($Autoplay_Slideshow == "Yes") {echo "checked='checked'";} ?>>
									<span class="ewd-us-admin-switch-slider round"></span>
								</label>		
								<p>Should the slider automatically toggle through slides?</p>
							</fieldset>
						</td>
					</tr>

					<tr class="ewd-us-admin-conditional-autoplay-options<?php echo ($Autoplay_Slideshow != 'Yes' ? ' us-hidden' : ''); ?>">
						<th scope="row">Autoplay Delay (seconds)</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Autoplay Delay (seconds)</span></legend>
								<input type='text' name='autoplay_delay' value='<?php echo $Autoplay_Delay; ?>' />
								<p>If autoplay is on, how long should the timer wait before starting the slideshow? (Should be greater than 0)</p>
							</fieldset>
						</td>
					</tr>

					<tr class="ewd-us-admin-conditional-autoplay-options<?php echo ($Autoplay_Slideshow != 'Yes' ? ' us-hidden' : ''); ?>">
						<th scope="row">Autoplay Interval (seconds)</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Autoplay Interval (seconds)</span></legend>
								<input type='text' name='autoplay_interval' value='<?php echo $Autoplay_Interval; ?>' />
								<p>If autoplay is on, how long should the slideshow wait between each slide? (Should be greater than 0)</p>
							</fieldset>
						</td>
					</tr>

					<tr class="ewd-us-admin-conditional-autoplay-options<?php echo ($Autoplay_Slideshow != 'Yes' ? ' us-hidden' : ''); ?>">
						<th scope="row">Pause Autoplay on Hover</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Pause Autoplay on Hover</span></legend>
								<div class="ewd-us-admin-hide-radios">
									<label title='Yes'><input type='radio' name='autoplay_pause_hover' value='Yes' <?php if($Autoplay_Pause_Hover == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
									<label title='No'><input type='radio' name='autoplay_pause_hover' value='No' <?php if($Autoplay_Pause_Hover  == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
								</div>
								<label class="ewd-us-admin-switch">
									<input type="checkbox" class="ewd-us-admin-option-toggle" data-inputname="autoplay_pause_hover" <?php if($Autoplay_Pause_Hover == "Yes") {echo "checked='checked'";} ?>>
									<span class="ewd-us-admin-switch-slider round"></span>
								</label>		
								<p>Should the slider autoplay automatically pause when you hover over it?</p>
							</fieldset>
						</td>
					</tr>

					<tr>
						<th scope="row">Slide Transition Time (seconds)</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Slider Transition Time (seconds)</span></legend>
								<input type='text' name='transition_time' value='<?php echo $Transition_Time; ?>' />
								<p>How long should each transition take to complete?</p>
							</fieldset>
						</td>
					</tr>

					<tr>
						<th scope="row">Aspect Ratio</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Aspect Ratio</span></legend>
								<select name="aspect_ratio">
							  		<option value="3_1" <?php if($Aspect_Ratio == "3_1") {echo "selected=selected";} ?> >3:1</option>
							  		<option value="16_7" <?php if($Aspect_Ratio == "16_7") {echo "selected=selected";} ?> >16:7 (default)</option>
									<option value="2_1" <?php if($Aspect_Ratio == "2_1") {echo "selected=selected";} ?> >2:1</option>
							  		<option value="16_9" <?php if($Aspect_Ratio == "16_9") {echo "selected=selected";} ?> >16:9</option>
							  		<option value="3_2" <?php if($Aspect_Ratio == "3_2") {echo "selected=selected";} ?> >3:2</option>
							  		<option value="4_3" <?php if($Aspect_Ratio == "4_3") {echo "selected=selected";} ?> >4:3</option>
							  		<option value="1_1" <?php if($Aspect_Ratio == "1_1") {echo "selected=selected";} ?> >1:1</option>
								</select>
							</fieldset>
						</td>
					</tr>

					<tr>
						<th scope="row">Carousel</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Carousel</span></legend>
								<div class="ewd-us-admin-hide-radios">
									<label title='Yes'><input type='radio' name='slider_carousel' value='Yes' <?php if($Carousel == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
									<label title='No'><input type='radio' name='slider_carousel' value='No' <?php if($Carousel  == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
								</div>
								<label class="ewd-us-admin-switch">
									<input type="checkbox" class="ewd-us-admin-option-toggle" data-inputname="slider_carousel" <?php if($Carousel == "Yes") {echo "checked='checked'";} ?>>
									<span class="ewd-us-admin-switch-slider round"></span>
								</label>		
								<p>Display a carousel slider instead of the default. <em>Slide Transition Effect</em> has to be set to <em>Default</em>.</p>
							</fieldset>
						</td>
					</tr>

					<tr class="ewd-us-admin-conditional-carousel-options<?php echo ($Carousel != 'Yes' ? ' us-hidden' : ''); ?>">
						<th scope="row">Carousel Number of Columns</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Carousel Number of Columns</span></legend>
								<label title='2' class='ewd-us-admin-input-container'><input type='radio' name='carousel_columns' value='2' <?php if($Carousel_Columns == "2") {echo "checked='checked'";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>2</span></label><br />
								<label title='3' class='ewd-us-admin-input-container'><input type='radio' name='carousel_columns' value='3' <?php if($Carousel_Columns  == "3") {echo "checked='checked'";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>3</span></label><br />
								<label title='4' class='ewd-us-admin-input-container'><input type='radio' name='carousel_columns' value='4' <?php if($Carousel_Columns  == "4") {echo "checked='checked'";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>4</span></label><br />
							</fieldset>
						</td>
					</tr>

					<tr class="ewd-us-admin-conditional-carousel-options<?php echo ($Carousel != 'Yes' ? ' us-hidden' : ''); ?>">
						<th scope="row">Carousel Link to Full Post?</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Carousel Link to Full Post</span></legend>
								<div class="ewd-us-admin-hide-radios">
									<label title='Yes'><input type='radio' name='carousel_link_to_full' value='Yes' <?php if($Carousel_Link_To_Full == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
									<label title='No'><input type='radio' name='carousel_link_to_full' value='No' <?php if($Carousel_Link_To_Full  == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
								</div>
								<label class="ewd-us-admin-switch">
									<input type="checkbox" class="ewd-us-admin-option-toggle" data-inputname="carousel_link_to_full" <?php if($Carousel_Link_To_Full == "Yes") {echo "checked='checked'";} ?>>
									<span class="ewd-us-admin-switch-slider round"></span>
								</label>		
							</fieldset>
						</td>
					</tr>

						<tr class="ewd-us-admin-conditional-carousel-options<?php echo ($Carousel != 'Yes' ? ' us-hidden' : ''); ?>">
							<th scope="row">Carousel Advance</th>
							<td>
								<fieldset><legend class="screen-reader-text"><span>Carousel Advance</span></legend>
									<label title='Full' class='ewd-us-admin-input-container'><input type='radio' name='carousel_advance' value='Full' <?php if($Carousel_Advance == "Full") {echo "checked='checked'";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Full</span></label><br />
									<label title='OneImage' class='ewd-us-admin-input-container'><input type='radio' name='carousel_advance' value='OneImage' <?php if($Carousel_Advance  == "OneImage") {echo "checked='checked'";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>One Image</span></label><br />
								</fieldset>
							</td>
						</tr>

						<tr>
						<th scope="row">Show Editor Helper</th>
							<td>
								<fieldset><legend class="screen-reader-text"><span>Show Editor Helper</span></legend>
								<div class="ewd-us-admin-hide-radios">
									<label title='Yes'><input type='radio' name='show_tinymce' value='Yes' <?php if($Show_TinyMCE == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
									<label title='No'><input type='radio' name='show_tinymce' value='No' <?php if($Show_TinyMCE == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
								</div>
								<label class="ewd-us-admin-switch">
									<input type="checkbox" class="ewd-us-admin-option-toggle" data-inputname="show_tinymce" <?php if($Show_TinyMCE == "Yes") {echo "checked='checked'";} ?>>
									<span class="ewd-us-admin-switch-slider round"></span>
								</label>		
								<p>Should the shortcode builder be shown above the WordPress page/post editor, in the toolbar buttons?</p>
								</fieldset>
							</td>
						</tr>

						<tr>
						<th scope="row">Timer Bar</th>
							<td>
								<fieldset><legend class="screen-reader-text"><span>Timer Bar</span></legend>
								<label title='Top' class='ewd-us-admin-input-container'><input type='radio' name='timer_bar' value='Top' <?php if($Timer_Bar == "Top") {echo "checked='checked'";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Top</span></label><br />
								<label title='Bottom' class='ewd-us-admin-input-container'><input type='radio' name='timer_bar' value='Bottom' <?php if($Timer_Bar == "Bottom") {echo "checked='checked'";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Bottom</span></label><br />
								<label title='Off' class='ewd-us-admin-input-container'><input type='radio' name='timer_bar' value='Off' <?php if($Timer_Bar == "Off") {echo "checked='checked'";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Off</span></label><br />
								<p>Display a timer bar at the top or bottom of your slider.</p>
								</fieldset>
							</td>
						</tr>

						<tr>
						<th scope="row">Slide Indicators</th>
							<td>
								<fieldset><legend class="screen-reader-text"><span>Slide Indicators</span></legend>
								<label title='None' class='ewd-us-admin-input-container'><input type='radio' name='slide_indicators' value='None' <?php if($Slide_Indicators == "None") {echo "checked='checked'";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>None</span></label><br />
								<label title='Dots' class='ewd-us-admin-input-container'><input type='radio' name='slide_indicators' value='Dots' <?php if($Slide_Indicators == "Dots") {echo "checked='checked'";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Dots</span></label><br />
								<label title='Thumbnails' class='ewd-us-admin-input-container'><input type='radio' name='slide_indicators' value='Thumbnails' <?php if($Slide_Indicators == "Thumbnails") {echo "checked='checked'";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Thumbnails</span></label><br />
								<label title='Side Thumbnails' class='ewd-us-admin-input-container'><input type='radio' name='slide_indicators' value='SideThumbnails' <?php if($Slide_Indicators == "SideThumbnails") {echo "checked='checked'";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Side Thumbnails</span></label><br />
								<p>Display navigation controls to jump between slides.</p>
								</fieldset>
							</td>
						</tr>

						<tr>
						<th scope="row">Button Link Action</th>
							<td>
								<fieldset><legend class="screen-reader-text"><span>Button Link Action</span></legend>
								<label title='Same' class='ewd-us-admin-input-container'><input type='radio' name='link_action' value='Same' <?php if($Link_Action == "Same") {echo "checked='checked'";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Same Window</span></label><br />
								<label title='New' class='ewd-us-admin-input-container'><input type='radio' name='link_action' value='New' <?php if($Link_Action == "New") {echo "checked='checked'";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>New Window</span></label><br />
								<label title='Smart' class='ewd-us-admin-input-container'><input type='radio' name='link_action' value='Smart' <?php if($Link_Action == "Smart") {echo "checked='checked'";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Smart</span></label><br />
								<p>Should button links open in the same or new windows? "Smart" opens external links in new windows and links on your site in the same window.</p>
								</fieldset>
							</td>
						</tr>

				</table>
			</div>

			<div id='Premium' class='ewd-us-option-set<?php echo ( $Display_Tab == 'Premium' ? '' : ' ewd-us-hidden' ); ?>'>

				<br />

				<div class="ewd-us-admin-section-heading"><?php _e('Premium Options', 'ultimate-slider'); ?></div>

				<table class="form-table ewd-us-premium-options-table">
					<tr>
						<th scope="row">Slide Transition Effect</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Slide Transition Effect</span></legend>
								<label title='Default' class='ewd-us-admin-input-container'><input type='radio' name='slide_transition_effect' value='slide' <?php if($Slide_Transition_Effect == "slide") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Default</span></label><br />
								<label title='Fade' class='ewd-us-admin-input-container'><input type='radio' name='slide_transition_effect' value='fade' <?php if($Slide_Transition_Effect  == "fade") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Fade</span></label><br />
								<label title='SlideUp' class='ewd-us-admin-input-container'><input type='radio' name='slide_transition_effect' value='slide-up' <?php if($Slide_Transition_Effect  == "slide-up") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Slide Up</span></label><br />
								<label title='SlideDown' class='ewd-us-admin-input-container'><input type='radio' name='slide_transition_effect' value='slide-down' <?php if($Slide_Transition_Effect  == "slide-down") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Slide Down</span></label><br />
								<label title='StretchRight' class='ewd-us-admin-input-container'><input type='radio' name='slide_transition_effect' value='stretch-right' <?php if($Slide_Transition_Effect  == "stretch-right") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Stretch Right</span></label><br />
								<label title='StretchLeft' class='ewd-us-admin-input-container'><input type='radio' name='slide_transition_effect' value='stretch-left' <?php if($Slide_Transition_Effect  == "stretch-left") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Stretch Left</span></label><br />
								<label title='Grow' class='ewd-us-admin-input-container'><input type='radio' name='slide_transition_effect' value='grow' <?php if($Slide_Transition_Effect  == "grow") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Grow</span></label><br />
								<label title='Expand' class='ewd-us-admin-input-container'><input type='radio' name='slide_transition_effect' value='expand' <?php if($Slide_Transition_Effect  == "expand") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Expand</span></label><br />
								<p>Which effect should be used to transition between slides?</p>
							</fieldset>
						</td>
					</tr>

					<tr>
						<th scope="row">WooCommerce Product Image Slider</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>WooCommerce Product Image Slider</span></legend>
								<div class="ewd-us-admin-hide-radios">
									<label title='Yes'><input type='radio' name='wc_product_image_slider' value='Yes' <?php if($WC_Product_Image_Slider == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
									<label title='No'><input type='radio' name='wc_product_image_slider' value='No' <?php if($WC_Product_Image_Slider  == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
								</div>
								<label class="ewd-us-admin-switch">
									<input type="checkbox" class="ewd-us-admin-option-toggle" data-inputname="wc_product_image_slider" <?php if($WC_Product_Image_Slider == "Yes") {echo "checked='checked'";} ?>>
									<span class="ewd-us-admin-switch-slider round"></span>
								</label>		
								<p>Should the WooCommerce product page image be converted into a slider when there's more than one image? (Might require changing the "Aspect Ratio" option for the slider, depending on the theme you're using)</p>
							</fieldset>
						</td>
					</tr>


					<tr>
						<th scope="row">Mobile Aspect Ratio</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Mobile Aspect Ratio</span></legend>
								<select name="mobile_aspect_ratio">
							  		<option value="3_1" <?php if($Mobile_Aspect_Ratio == "3_1") {echo "selected=selected";} ?> >3:1</option>
							  		<option value="16_7" <?php if($Mobile_Aspect_Ratio == "16_7") {echo "selected=selected";} ?> >16:7 (default)</option>
									<option value="2_1" <?php if($Mobile_Aspect_Ratio == "2_1") {echo "selected=selected";} ?> >2:1</option>
							  		<option value="16_9" <?php if($Mobile_Aspect_Ratio == "16_9") {echo "selected=selected";} ?> >16:9</option>
							  		<option value="3_2" <?php if($Mobile_Aspect_Ratio == "3_2") {echo "selected=selected";} ?> >3:2</option>
							  		<option value="4_3" <?php if($Mobile_Aspect_Ratio == "4_3") {echo "selected=selected";} ?> >4:3</option>
							  		<option value="1_1" <?php if($Mobile_Aspect_Ratio == "1_1") {echo "selected=selected";} ?> >1:1</option>
								</select>
								<p>What should the aspect ratio of the slider be on smaller screens?</p>
							</fieldset>
						</td>
					</tr>

					<tr>
						<th scope="row">Hide Elements from Mobile View</th>
						<td>
						    <fieldset><legend class="screen-reader-text"><span>Hide Elements from Mobile View</span></legend>
						        <label title='title' class='ewd-us-admin-input-container'><input type='checkbox' name='hide_on_mobile[]' value='title' <?php if(in_array("title", $Hide_On_Mobile)) {echo "checked='checked'";} ?> /><span class='ewd-us-admin-checkbox'></span> <span>Title</span></label><br />
						        <label title='body' class='ewd-us-admin-input-container'><input type='checkbox' name='hide_on_mobile[]' value='body' <?php if(in_array("body", $Hide_On_Mobile)) {echo "checked='checked'";} ?> /><span class='ewd-us-admin-checkbox'></span> <span>Body</span></label><br />
						        <label title='buttons' class='ewd-us-admin-input-container'><input type='checkbox' name='hide_on_mobile[]' value='buttons' <?php if(in_array("buttons", $Hide_On_Mobile)) {echo "checked='checked'";} ?> /><span class='ewd-us-admin-checkbox'></span> <span>Buttons</span></label><br />
						        <label title='arrows' class='ewd-us-admin-input-container'><input type='checkbox' name='hide_on_mobile[]' value='arrows' <?php if(in_array("arrows", $Hide_On_Mobile)) {echo "checked='checked'";} ?> /><span class='ewd-us-admin-checkbox'></span> <span>Arrows</span></label><br />
						        <label title='thumbnails' class='ewd-us-admin-input-container'><input type='checkbox' name='hide_on_mobile[]' value='thumbnails' <?php if(in_array("thumbnails", $Hide_On_Mobile)) {echo "checked='checked'";} ?> /><span class='ewd-us-admin-checkbox'></span> <span>Thumbnails</span></label><br />
						    </fieldset>
						</td>
					</tr>

					<tr>
						<th scope="row">Mobile Link to Full Post?</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Mobile Link to Full Post</span></legend>
								<div class="ewd-us-admin-hide-radios">
									<label title='Yes'><input type='radio' name='mobile_link_to_full' value='Yes' <?php if($Mobile_Link_To_Full == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
									<label title='No'><input type='radio' name='mobile_link_to_full' value='No' <?php if($Mobile_Link_To_Full  == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
								</div>
								<label class="ewd-us-admin-switch">
									<input type="checkbox" class="ewd-us-admin-option-toggle" data-inputname="mobile_link_to_full" <?php if($Mobile_Link_To_Full == "Yes") {echo "checked='checked'";} ?>>
									<span class="ewd-us-admin-switch-slider round"></span>
								</label>		
								<p>Should clicking on a slide bring up the individual slide post on mobile?</p>
							</fieldset>

						</td>
						
					</tr>

					<tr>
						<th scope="row">Title Animation</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Title Animation</span></legend>
								<label title='None' class='ewd-us-admin-input-container'><input type='radio' name='title_animate' value='None' <?php if($Title_Animate == "None") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>None</span></label><br />
								<label title='SlideFromLeft' class='ewd-us-admin-input-container'><input type='radio' name='title_animate' value='SlideFromLeft' <?php if($Title_Animate == "SlideFromLeft") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Slide From Left</span></label><br />
								<label title='SlideFromRight' class='ewd-us-admin-input-container'><input type='radio' name='title_animate' value='SlideFromRight' <?php if($Title_Animate == "SlideFromRight") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Slide From Right</span></label><br />
								<label title='FadeIn' class='ewd-us-admin-input-container'><input type='radio' name='title_animate' value='FadeIn' <?php if($Title_Animate == "FadeIn") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Fade In</span></label><br />
								<label title='ScrollDown' class='ewd-us-admin-input-container'><input type='radio' name='title_animate' value='ScrollDown' <?php if($Title_Animate == "ScrollDown") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span> <span>Scroll Down</span></label><br />
							</fieldset>
						</td>
					</tr>

					<tr>
						<th scope="row">Force Full Width</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Force Full Width</span></legend>
								<div class="ewd-us-admin-hide-radios">
									<label title='Yes'><input type='radio' name='force_full_width' value='Yes' <?php if($Force_Full_Width == "Yes") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Yes</span></label><br />
									<label title='No'><input type='radio' name='force_full_width' value='No' <?php if($Force_Full_Width == "No") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /> <span>No</span></label><br />
								</div>
								<label class="ewd-us-admin-switch">
									<input type="checkbox" class="ewd-us-admin-option-toggle" data-inputname="force_full_width" <?php if($Force_Full_Width == "Yes") {echo "checked='checked'";} ?>>
									<span class="ewd-us-admin-switch-slider round"></span>
								</label>		
								<p>Force the slider to go the full width of the window, regardless of the container it's in.</p>
							</fieldset>
						</td>
					</tr>

					<tr>
						<th scope="row">Add Watermark</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Add Watermark</span></legend>
								<div class="ewd-us-admin-hide-radios">
									<label title='Yes'><input type='radio' name='add_watermark' value='Yes' <?php if($Add_Watermark == "Yes") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Yes</span></label><br />
									<label title='No'><input type='radio' name='add_watermark' value='No' <?php if($Add_Watermark == "No") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /> <span>No</span></label><br />
								</div>
								<label class="ewd-us-admin-switch">
									<input type="checkbox" class="ewd-us-admin-option-toggle" data-inputname="add_watermark" <?php if($Add_Watermark == "Yes") {echo "checked='checked'";} ?>>
									<span class="ewd-us-admin-switch-slider round"></span>
								</label>		
								<p>Should a watermark be added to each image? Requires GD PHP module to be installed on your server.</p>
							</fieldset>
						</td>
					</tr>

					<tr>
						<th scope="row">Lightbox on Image Click</th>
						<td>
							<fieldset><legend class="screen-reader-text"><span>Lightbox on Image Click</span></legend>
								<div class="ewd-us-admin-hide-radios">
									<label title='Yes'><input type='radio' name='lightbox' value='Yes' <?php if($Lightbox == "Yes") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Yes</span></label><br />
									<label title='No'><input type='radio' name='lightbox' value='No' <?php if($Lightbox == "No") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /> <span>No</span></label><br />
								</div>
								<label class="ewd-us-admin-switch">
									<input type="checkbox" class="ewd-us-admin-option-toggle" data-inputname="lightbox" <?php if($Lightbox == "Yes") {echo "checked='checked'";} ?>>
									<span class="ewd-us-admin-switch-slider round"></span>
								</label>		
								<p>Should a lightbox be opened when an image is clicked on? Particularly useful if you're using carousel mode.<br />
								<?php _e("Want to customize this lightbox? Install the <a href='https://wordpress.org/plugins/ultimate-lightbox/'> 'Ultimate Lightbox' plugin </a>, and you switch the lightbox colors, controls, behaviour and more!", 'ultimate-slider'); ?> </p>
							</fieldset>
						</td>
					</tr>
					<?php if ($US_Full_Version != "Yes") { ?>
						<tr class="ewd-us-premium-options-table-overlay">
							<th colspan="2">
								<div class="ewd-us-unlock-premium">
									<img src="<?php echo plugins_url( '../img/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Slider Premium">
									<p>Access this section by by upgrading to premium</p>
									<a href="https://www.etoilewebdesign.com/plugins/ultimate-slider/#buy" class="ewd-us-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
								</div>
							</th>
						</tr>
					<?php } ?>
				</table>
			</div>

			<div id='Styling' class='ewd-us-option-set<?php echo ( $Display_Tab == 'Styling' ? '' : ' ewd-us-hidden' ); ?>'>

				<br />

				<div class="ewd-us-admin-section-heading"><?php _e('Styling Options', 'ultimate-slider'); ?></div>

				<div class="ewd-us-admin-styling-section">
					<div class="ewd-us-admin-styling-subsection">
						<div class="ewd-us-admin-styling-subsection-label"><?php _e('Slide Title', 'ultimate-slider'); ?></div>
						<div class="ewd-us-admin-styling-subsection-content">
							<div class="ewd-us-admin-styling-subsection-content-each">
								<div class="ewd-us-admin-styling-subsection-content-label"><?php _e('Font Color', 'ultimate-slider'); ?></div>
								<div class="ewd-us-admin-styling-subsection-content-right">
									<div class="ewd-us-admin-styling-subsection-content-color-picker">
										<div class="ewd-us-admin-styling-subsection-content-color-picker-label"></div>
										<input type='text' class='ewd-us-spectrum' name='us_slide_title_font_color' value='<?php echo $us_Slide_Title_Font_Color; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
								</div>
							</div>
							<div class="ewd-us-admin-styling-subsection-content-each">
								<div class="ewd-us-admin-styling-subsection-content-label"><?php _e('Font Family', 'ultimate-slider'); ?></div>
								<div class="ewd-us-admin-styling-subsection-content-right">
									<input type='text' class='ewd-us-admin-font-size' name='us_slide_title_font' value='<?php echo $us_Slide_Title_Font; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
							<div class="ewd-us-admin-styling-subsection-content-each">
								<div class="ewd-us-admin-styling-subsection-content-label"><?php _e('Font Size', 'ultimate-slider'); ?></div>
								<div class="ewd-us-admin-styling-subsection-content-right">
									<input type='text' class='ewd-us-admin-font-size' name='us_slide_title_font_size' value='<?php echo $us_Slide_Title_Font_Size; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
						</div>
					</div>
					<div class="ewd-us-admin-styling-subsection">
						<div class="ewd-us-admin-styling-subsection-label"><?php _e('Slide Text', 'ultimate-slider'); ?></div>
						<div class="ewd-us-admin-styling-subsection-content">
							<div class="ewd-us-admin-styling-subsection-content-each">
								<div class="ewd-us-admin-styling-subsection-content-label"><?php _e('Font Color', 'ultimate-slider'); ?></div>
								<div class="ewd-us-admin-styling-subsection-content-right">
									<div class="ewd-us-admin-styling-subsection-content-color-picker">
										<div class="ewd-us-admin-styling-subsection-content-color-picker-label"></div>
										<input type='text' class='ewd-us-spectrum' name='us_slide_text_font_color' value='<?php echo $us_Slide_Text_Font_Color; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
								</div>
							</div>
							<div class="ewd-us-admin-styling-subsection-content-each">
								<div class="ewd-us-admin-styling-subsection-content-label"><?php _e('Font Family', 'ultimate-slider'); ?></div>
								<div class="ewd-us-admin-styling-subsection-content-right">
									<input type='text' class='ewd-us-admin-font-size' name='us_slide_text_font' value='<?php echo $us_Slide_Text_Font; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
							<div class="ewd-us-admin-styling-subsection-content-each">
								<div class="ewd-us-admin-styling-subsection-content-label"><?php _e('Font Size', 'ultimate-slider'); ?></div>
								<div class="ewd-us-admin-styling-subsection-content-right">
									<input type='text' class='ewd-us-admin-font-size' name='us_slide_text_font_size' value='<?php echo $us_Slide_Text_Font_Size; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
						</div>
					</div>
					<div class="ewd-us-admin-styling-subsection">
						<div class="ewd-us-admin-styling-subsection-label"><?php _e('Slide Buttons', 'ultimate-slider'); ?></div>
						<div class="ewd-us-admin-styling-subsection-content">
							<div class="ewd-us-admin-styling-subsection-content-each">
								<div class="ewd-us-admin-styling-subsection-content-label"><?php _e('Colors', 'ultimate-slider'); ?></div>
								<div class="ewd-us-admin-styling-subsection-content-right">
									<div class="ewd-us-admin-styling-subsection-content-color-picker">
										<div class="ewd-us-admin-styling-subsection-content-color-picker-label"><?php _e('Background', 'ultimate-slider'); ?></div>
										<input type='text' class='ewd-us-spectrum' name='us_button_background_color' value='<?php echo $us_Button_Background_Color; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
									<div class="ewd-us-admin-styling-subsection-content-color-picker">
										<div class="ewd-us-admin-styling-subsection-content-color-picker-label"><?php _e('Border', 'ultimate-slider'); ?></div>
										<input type='text' class='ewd-us-spectrum' name='us_button_border_color' value='<?php echo $us_Button_Border_Color; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
									<div class="ewd-us-admin-styling-subsection-content-color-picker">
										<div class="ewd-us-admin-styling-subsection-content-color-picker-label"><?php _e('Text', 'ultimate-slider'); ?></div>
										<input type='text' class='ewd-us-spectrum' name='us_arrow_color' value='<?php echo $us_Arrow_Color; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
								</div>
							</div>
							<div class="ewd-us-admin-styling-subsection-content-each">
								<div class="ewd-us-admin-styling-subsection-content-label"><?php _e('Hover Colors', 'ultimate-slider'); ?></div>
								<div class="ewd-us-admin-styling-subsection-content-right">
									<div class="ewd-us-admin-styling-subsection-content-color-picker">
										<div class="ewd-us-admin-styling-subsection-content-color-picker-label"><?php _e('Background', 'ultimate-slider'); ?></div>
										<input type='text' class='ewd-us-spectrum' name='us_button_background_hover_color' value='<?php echo $us_Button_Background_Hover_Color; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
									<div class="ewd-us-admin-styling-subsection-content-color-picker">
										<div class="ewd-us-admin-styling-subsection-content-color-picker-label"><?php _e('Border', 'ultimate-slider'); ?></div>
										<input type='text' class='ewd-us-spectrum' name='us_button_border_hover_color' value='<?php echo $us_Button_Border_Hover_Color; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
									<div class="ewd-us-admin-styling-subsection-content-color-picker">
										<div class="ewd-us-admin-styling-subsection-content-color-picker-label"><?php _e('Text', 'ultimate-slider'); ?></div>
										<input type='text' class='ewd-us-spectrum' name='us_button_text_hover_color' value='<?php echo $us_Button_Text_Hover_Color; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
								</div>
							</div>
							<div class="ewd-us-admin-styling-subsection-content-each">
								<div class="ewd-us-admin-styling-subsection-content-label"><?php _e('Font Family', 'ultimate-slider'); ?></div>
								<div class="ewd-us-admin-styling-subsection-content-right">
									<input type='text' class='ewd-us-admin-font-size' name='us_button_font' value='<?php echo $us_Button_Font; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
							<div class="ewd-us-admin-styling-subsection-content-each">
								<div class="ewd-us-admin-styling-subsection-content-label"><?php _e('Font Size', 'ultimate-slider'); ?></div>
								<div class="ewd-us-admin-styling-subsection-content-right">
									<input type='text' class='ewd-us-admin-font-size' name='us_button_font_size' value='<?php echo $us_Button_Font_Size; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
						</div>
					</div>
					<?php if ($US_Full_Version != "Yes") { ?>
						<div class="ewd-us-premium-options-table-overlay">
							<div class="ewd-us-unlock-premium">
								<img src="<?php echo plugins_url( '../img/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Slider Premium">
								<p>Access this section by by upgrading to premium</p>
								<a href="https://www.etoilewebdesign.com/plugins/ultimate-slider/#buy" class="ewd-us-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
							</div>
						</div>
					<?php } ?>
				</div>

			</div> <!-- Styling -->

			<div id='Control' class='ewd-us-option-set<?php echo ( $Display_Tab == 'Control' ? '' : ' ewd-us-hidden' ); ?>'>

				<br />

				<div class="ewd-us-admin-section-heading"><?php _e('Control Options', 'ultimate-slider'); ?></div>

				<div class="ewd-us-admin-styling-section">
					<div class="ewd-us-admin-styling-subsection">
						<div class="ewd-us-admin-styling-subsection-label"><?php _e('Arrows', 'ultimate-slider'); ?></div>
						<div class="ewd-us-admin-styling-subsection-content">
							<div class="ewd-us-admin-styling-subsection-content-each">
								<fieldset class="ewdAdminIconChoice">
									<label class='ewd-us-admin-input-container fourteen'><input type='radio' name='us_arrow' value='None' <?php if ($us_Arrow == "None") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span>  No Arrow</label>
									<label class='ewd-us-admin-input-container'><input type='radio' name='us_arrow' value='a' <?php if ($us_Arrow == "a") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span>  <span class='us-arrow'>b</span></label>
									<label class='ewd-us-admin-input-container'><input type='radio' name='us_arrow' value='c' <?php if ($us_Arrow == "c") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span>  <span class='us-arrow'>d</span></label>
									<label class='ewd-us-admin-input-container'><input type='radio' name='us_arrow' value='e' <?php if ($us_Arrow == "e") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span>  <span class='us-arrow'>f</span></label>
									<label class='ewd-us-admin-input-container'><input type='radio' name='us_arrow' value='g' <?php if ($us_Arrow == "g") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span>  <span class='us-arrow'>h</span></label>
									<label class='ewd-us-admin-input-container'><input type='radio' name='us_arrow' value='i' <?php if ($us_Arrow == "i") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span>  <span class='us-arrow'>j</span></label>
									<label class='ewd-us-admin-input-container'><input type='radio' name='us_arrow' value='k' <?php if ($us_Arrow == "k") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span>  <span class='us-arrow'>l</span></label>
									<label class='ewd-us-admin-input-container'><input type='radio' name='us_arrow' value='m' <?php if ($us_Arrow == "m") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span>  <span class='us-arrow'>n</span></label>
									<label class='ewd-us-admin-input-container'><input type='radio' name='us_arrow' value='o' <?php if ($us_Arrow == "o") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span>  <span class='us-arrow'>p</span></label>
									<label class='ewd-us-admin-input-container'><input type='radio' name='us_arrow' value='q' <?php if ($us_Arrow == "q") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span>  <span class='us-arrow'>r</span></label>
									<label class='ewd-us-admin-input-container'><input type='radio' name='us_arrow' value='A' <?php if ($us_Arrow == "A") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span>  <span class='us-arrow'>B</span></label>
									<label class='ewd-us-admin-input-container'><input type='radio' name='us_arrow' value='E' <?php if ($us_Arrow == "E") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span>  <span class='us-arrow'>F</span></label>
									<label class='ewd-us-admin-input-container'><input type='radio' name='us_arrow' value='G' <?php if ($us_Arrow == "G") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span>  <span class='us-arrow'>H</span></label>
									<label class='ewd-us-admin-input-container'><input type='radio' name='us_arrow' value='I' <?php if ($us_Arrow == "I") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span>  <span class='us-arrow'>J</span></label>
									<label class='ewd-us-admin-input-container'><input type='radio' name='us_arrow' value='K' <?php if ($us_Arrow == "K") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span>  <span class='us-arrow'>L</span></label>
									<label class='ewd-us-admin-input-container'><input type='radio' name='us_arrow' value='M' <?php if ($us_Arrow == "M") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span>  <span class='us-arrow'>N</span></label>
									<label class='ewd-us-admin-input-container'><input type='radio' name='us_arrow' value='O' <?php if ($us_Arrow == "O") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span>  <span class='us-arrow'>P</span></label>
									<label class='ewd-us-admin-input-container'><input type='radio' name='us_arrow' value='Q' <?php if ($us_Arrow == "Q") {echo "checked='checked'";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span>  <span class='us-arrow'>R</span></label>
								</fieldset>
							</div>
						</div>
					</div>
					<div class="ewd-us-admin-styling-subsection">
						<div class="ewd-us-admin-styling-subsection-label"><?php _e('Background Shape', 'ultimate-slider'); ?></div>
						<div class="ewd-us-admin-styling-subsection-content">
							<div class="ewd-us-admin-styling-subsection-content-each">
								<fieldset>
									<label title='None' class='ewd-us-admin-input-container'><input type='radio' name='us_arrow_background_shape' value='None' <?php if ($us_Arrow_Background_Shape == "None") {echo "checked=checked";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span> <span><?php _e("No Background", 'ultimate-slider')?></span></label><br />
									<label title='Square' class='ewd-us-admin-input-container'><input type='radio' name='us_arrow_background_shape' value='Square' <?php if ($us_Arrow_Background_Shape == "Square") {echo "checked=checked";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span> <span><?php _e("Square", 'ultimate-slider')?></span></label><br />
									<label title='Circle' class='ewd-us-admin-input-container'><input type='radio' name='us_arrow_background_shape' value='Circle' <?php if ($us_Arrow_Background_Shape == "Circle") {echo "checked=checked";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span> <span><?php _e("Circle", 'ultimate-slider')?></span></label><br />
									<label title='Diamond' class='ewd-us-admin-input-container'><input type='radio' name='us_arrow_background_shape' value='Diamond' <?php if ($us_Arrow_Background_Shape == "Diamond") {echo "checked=checked";} ?> <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> /><span class='ewd-us-admin-radio-button'></span> <span><?php _e("Diamond", 'ultimate-slider')?></span></label><br />
								</fieldset>
							</div>
						</div>
					</div>
					<div class="ewd-us-admin-styling-subsection">
						<div class="ewd-us-admin-styling-subsection-label"><?php _e('Customize', 'ultimate-slider'); ?></div>
						<div class="ewd-us-admin-styling-subsection-content">
							<div class="ewd-us-admin-styling-subsection-content-each">
								<div class="ewd-us-admin-styling-subsection-content-label"><?php _e('Colors', 'ultimate-slider'); ?></div>
								<div class="ewd-us-admin-styling-subsection-content-right">
									<div class="ewd-us-admin-styling-subsection-content-color-picker">
										<div class="ewd-us-admin-styling-subsection-content-color-picker-label"><?php _e('Arrow', 'ultimate-slider'); ?></div>
										<input type='text' class='ewd-us-spectrum' name='us_arrow_color' value='<?php echo $us_Arrow_Color; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
									<div class="ewd-us-admin-styling-subsection-content-color-picker">
										<div class="ewd-us-admin-styling-subsection-content-color-picker-label"><?php _e('Arrow Background', 'ultimate-slider'); ?></div>
										<input type='text' class='ewd-us-spectrum' name='us_arrow_background_color' value='<?php echo $us_Arrow_Background_Color; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
									<div class="ewd-us-admin-styling-subsection-content-color-picker">
										<div class="ewd-us-admin-styling-subsection-content-color-picker-label"><?php _e('Clickable Area', 'ultimate-slider'); ?></div>
										<input type='text' class='ewd-us-spectrum' name='us_clickable_area_background_color' value='<?php echo $us_Clickable_Area_Background_Color; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
									</div>
								</div>
							</div>
							<div class="ewd-us-admin-styling-subsection-content-each">
								<div class="ewd-us-admin-styling-subsection-content-label"><?php _e('Arrow Size', 'ultimate-slider'); ?></div>
								<div class="ewd-us-admin-styling-subsection-content-right">
									<input type='text' name='us_arrow_font_size' class='ewd-us-admin-font-size' value='<?php echo $us_Arrow_Font_Size; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
							<div class="ewd-us-admin-styling-subsection-content-each">
								<div class="ewd-us-admin-styling-subsection-content-label"><?php _e('Arrow Background Size', 'ultimate-slider'); ?></div>
								<div class="ewd-us-admin-styling-subsection-content-right">
									<input type='text' name='us_arrow_background_size' class='ewd-us-admin-font-size' value='<?php echo $us_Arrow_Background_Size; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
							<div class="ewd-us-admin-styling-subsection-content-each">
								<div class="ewd-us-admin-styling-subsection-content-label"><?php _e('Clickable Area Size', 'ultimate-slider'); ?></div>
								<div class="ewd-us-admin-styling-subsection-content-right">
									<input type='text' name='us_clickable_area_size' class='ewd-us-admin-font-size' value='<?php echo $us_Clickable_Area_Size; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
							<div class="ewd-us-admin-styling-subsection-content-each">
								<div class="ewd-us-admin-styling-subsection-content-label"><?php _e('Line Height Of Arrow Within Background (e.g. "1.25")', 'ultimate-slider'); ?></div>
								<div class="ewd-us-admin-styling-subsection-content-right">
									<input type='text' name='us_arrow_line_height' class='ewd-us-admin-font-size' value='<?php echo $us_Arrow_Line_Height; ?>' <?php if ($US_Full_Version != "Yes") {echo "disabled";} ?> />
								</div>
							</div>
						</div>
					</div>
					<?php if ($US_Full_Version != "Yes") { ?>
						<div class="ewd-us-premium-options-table-overlay">
							<div class="ewd-us-unlock-premium">
								<img src="<?php echo plugins_url( '../img/options-asset-lock.png', __FILE__ ); ?>" alt="Upgrade to Ultimate Slider Premium">
								<p>Access this section by by upgrading to premium</p>
								<a href="https://www.etoilewebdesign.com/plugins/ultimate-slider/#buy" class="ewd-us-dashboard-get-premium-widget-button" target="_blank">UPGRADE NOW</a>
							</div>
						</div>
					<?php } ?>
				</div>

			</div> <!-- Controls -->

			<p class="submit"><input type="submit" name="Options_Submit" id="submit" class="button button-primary" value="Save Changes"  /></p>
		</form>
	</div> <!-- us-options-page-tabbed-content -->
