jQuery(document).ready(function($){

	$('#menuBars').click(function(){
		$('#mobileMenu').slideToggle();
	});

	$(function(){
		$(window).resize(function(){
			if($(window).width() > 768){
				$('#mobileMenu').hide();
			}
		}).resize();
	});

});

jQuery(document).ready(function($){

	$('.ajax-catalogue-search').on('submit', function(event) {
		if (jQuery(this).hasClass('woocommerce')) {var Type = 'WooCommerce';}
		else {var Type = 'UPCP';}

		var Format = 'Full_Results';
		Run_AJAX_Product_Search(Type, Format);

		event.preventDefault();
	});

	$('.autocomplete-catalogue-search input').on('keyup', function() {
		if (jQuery(this).hasClass('woocommerce')) {var Type = 'WooCommerce';}
		else {var Type = 'UPCP';}

		var Input_Value = jQuery(this).val();
		var Format = 'Autocomplete';
		if (Input_Value.length >= 3) {Run_AJAX_Product_Search(Type, Format);}
	});
});

function Close_Ajax_Results_Lightbox(){
	jQuery('#upcp-theme-ajax-results-background.upcp-theme-Full_Results').click(function(e){
		if(e.target != this) return;
		jQuery('#upcp-theme-ajax-results-background.upcp-theme-Full_Results').hide();
		jQuery('#upcp-theme-ajax-results-div').hide();
	});
	jQuery('#upcp-theme-ajax-close-div.upcp-theme-Full_Results #upcp-theme-ajax-close-button').click(function(e){
		if(e.target != this) return;
		jQuery('#upcp-theme-ajax-results-background.upcp-theme-Full_Results').hide();
		jQuery('#upcp-theme-ajax-results-div').hide();
	});
}

var RequestCount = 0;
function Run_AJAX_Product_Search(Type, Format) {
	var searchValue = jQuery('#headerSearchCatalog').val();
	var catalogueURL = jQuery('#headerSearch').attr('action');

	RequestCount = RequestCount + 1;
	var data = 'Search=' + searchValue + '&Request_Count=' + RequestCount + '&Catalogue_URL=' + catalogueURL;
	if (Type == 'WooCommerce') {data += '&action=upcp_theme_wc_ajax_search';}
	else {data += '&action=upcp_ajax_search';} console.log(data);
	jQuery.post(ajaxurl, data, function(response) {
	   	var parsed_response = jQuery.parseJSON(response);
		if (parsed_response.request_count == RequestCount) {
	    	jQuery('#upcp-theme-ajax-results').html(parsed_response.message);
	   	}
	   	Close_Ajax_Results_Lightbox();
	});

	jQuery('#upcp-theme-ajax-results-background, #upcp-theme-ajax-results-div').remove();

	var HTML = '<div id="upcp-theme-ajax-results-background" class="upcp-theme-' + Format + '"></div>';
	HTML += '<div id="upcp-theme-ajax-results-div" class="upcp-theme-' + Format + '">';
	HTML += '<div id="upcp-theme-ajax-close-div" class="upcp-theme-' + Format + '"><span id="upcp-theme-ajax-close-button">x</span></div>';
	HTML += '<div id="upcp-theme-ajax-results"><span class="upcp-theme-ajax-retrieving">Retrieving Search Results...</span></div>';
	HTML += '<a href="' + catalogueURL + '?prod_name=' + searchValue + '" class="upcp-theme-ajax-view-all">View All Search Results</a>';
	HTML += '</div>'

	jQuery('#headerSearch').after(HTML);
}