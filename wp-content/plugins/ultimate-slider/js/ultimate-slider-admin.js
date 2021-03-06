jQuery(function() {
    wireReorderList();
});

function wireReorderList() {
    jQuery(".wp-list-table tbody").sortable({
    	stop: function( event, ui ) {saveOrderClick(); }
    }).disableSelection();
}

function saveOrderClick() {
    // ----- Retrieve the li items inside our sortable list
    var items = jQuery(".wp-list-table tbody tr");

    var linkIDs = [items.size()];
    var index = 0;

    // ----- Iterate through each li, extracting the ID embedded as an attribute
    items.each(
        function(intIndex) {
            linkIDs[intIndex] = jQuery(this).attr("id").substring(5);
            jQuery(this).find('.menu_order').html(intIndex);
            index++;
        });

    var data = 'IDs=' + JSON.stringify(linkIDs) + '&action=ewd_us_slides_update_order';
    jQuery.post(ajaxurl, data, function(response) {});

    //$get("<%=txtExampleItemsOrder.ClientID %>").value = linkIDs.join(",");
}

function ShowOptionTab(TabName) {
    jQuery(".ewd-us-option-set").each(function() {
        jQuery(this).addClass("ewd-us-hidden");
    });
    jQuery("#"+TabName).removeClass("ewd-us-hidden");

    jQuery(".options-subnav-tab").each(function() {
        jQuery(this).removeClass("options-subnav-tab-active");
    });
    jQuery("#"+TabName+"_Menu").addClass("options-subnav-tab-active");
    jQuery('input[name="Display_Tab"]').val(TabName);
}

jQuery(document).ready(function(){
    jQuery('.ewd-us-meta-menu-item').on('click', function() {
        var ID = jQuery(this).attr('id');
        var ID_Base = ID.substring(5);

        jQuery(".ewd-us-meta-body").each(function() {
            jQuery(this).addClass("ewd-us-hidden");
        });
        jQuery('#Body_'+ID_Base).removeClass("ewd-us-hidden");
    
        jQuery(".ewd-us-meta-menu-item").each(function() {
            jQuery(this).removeClass("meta-menu-tab-active");
        });
        jQuery(this).addClass("meta-menu-tab-active");
    });
});

jQuery(document).ready(function() {
    SetButtonDeleteHandlers();
    SetButtonDisableHandlers();

    jQuery('.ewd-us-add-button-list-item').on('click', function(event) {
        var ID = jQuery(this).data('nextid');

        var HTML = "<tr id='ewd-us-button-list-item-" + ID + "'>";
        HTML += "<td><a class='ewd-us-delete-button-list-item' data-buttonid='" + ID + "'>Delete</a></td>";
        HTML += "<td><input type='text' name='Button_List_" + ID + "_Text'></td>";
        HTML += "<td><select name='Button_List_" + ID + "_Post_ID' class='ewd-us-post-select' id='ewd-us-post-select-" + ID + "'><option value='0'>Custom Link</option></select></td>";
        HTML += "<td><input type='text' name='Button_List_" + ID + "_Custom_Link' id='ewd-us-post-link-" + ID + "'></td>";
        HTML += "</tr>";

        //jQuery('table > tr#ewd-uasp-add-reminder').before(HTML);
        jQuery('#ewd-us-buttons-list-table tr:last').before(HTML);

        AJAXPostIDs("#ewd-us-post-select-" + ID);

        ID++;
        jQuery(this).data('nextid', ID); //updates but doesn't show in DOM

        SetButtonDeleteHandlers();
        SetButtonDisableHandlers();

        event.preventDefault();
    });
});

function SetButtonDeleteHandlers() {
    jQuery('.ewd-us-delete-button-list-item').on('click', function(event) {
        var ID = jQuery(this).data('buttonid');
        var tr = jQuery('#ewd-us-button-list-item-'+ID);

        tr.fadeOut(400, function(){
            tr.remove();
        });

        event.preventDefault();
    });
}

function SetButtonDisableHandlers() {
    jQuery('.ewd-us-post-select').on('change', function() {
        var Full_ID = jQuery(this).attr('id');
        var ID = Full_ID.substring(19);

        if (jQuery(this).val() != 0) {
            jQuery('#ewd-us-post-link-'+ID).prop('disabled', true);
        }
        else {
            jQuery('#ewd-us-post-link-'+ID).prop('disabled', false);
        }
    })
}

jQuery(document).ready(function() {
    jQuery('.ewd-us-image-radio').on('change', function() {
        if (jQuery(this).val() == "youtube_video") {jQuery('#ewd-us-youtube-url').prop('disabled', false);}
        else {jQuery('#ewd-us-youtube-url').prop('disabled', true);}
    });
});

function AJAXPostIDs(selectID) {
    var data = '&action=ewd_us_get_post_ids';
    jQuery.post(ajaxurl, data, function(response) {
        response = response.substring(0, response.length - 1);
        var posts_array = jQuery.parseJSON(response);
        jQuery(posts_array).each(function(index, post) {
            //console.log('post', post);
            jQuery(selectID).append("<option value='"+post.ID+"'>"+post.Name+"</option>");
        });
    });
}

jQuery(document).ready(function() {
    jQuery('.ewd-us-widget-slider-type').each(function() {
        var id = jQuery(this).attr('id');
        var widget_id = id.slice(0,-11);
        var slider_type = jQuery(this).val();

        EWD_US_Fill_Widget_Categories_Select(widget_id, slider_type);
    });

    jQuery('.ewd-us-widget-slider-type').on('change', function() {
        var id = jQuery(this).attr('id');
        var widget_id = id.slice(0,-11);
        var slider_type = jQuery(this).val();
alert("Type: " + slider_type); alert("Widget ID: " + widget_id);
        EWD_US_Fill_Widget_Categories_Select(widget_id, slider_type);
    });
});

function EWD_US_Fill_Widget_Categories_Select(widget_id, slider_type) {
    jQuery('#'+widget_id+'category').find('option').remove().end();

    jQuery('#'+widget_id+'category').append('<option value="">All</option>');

    if (slider_type == 'woocommerce') {
        if (typeof woocommerce_categories !== 'undefined' && woocommerce_categories !== null) {
            jQuery(woocommerce_categories).each(function(index, el) {
                jQuery('#'+widget_id+'category').append('<option value="'+el.Category_Slug+'">'+el.Category_Name+'</option>');
            });
        }
    }
    else if (slider_type == 'upcp') {
        if (typeof upcp_categories !== 'undefined' && upcp_categories !== null) {
            jQuery(upcp_categories).each(function(index, el) {
                jQuery('#'+widget_id+'category').append('<option value="'+el.Category_Slug+'">'+el.Category_Name+'</option>');
            });
        }
    }
    else {
        if (typeof slider_categories !== 'undefined' && slider_categories !== null) {
            jQuery(slider_categories).each(function(index, el) {
                console.log(el);
                jQuery('#'+widget_id+'category').append('<option value="'+el.Category_Slug+'">'+el.Category_Name+'</option>');
            });
        }
    }
}

jQuery(document).ready(function() {
    jQuery('.ewd-us-spectrum').spectrum({
        showInput: true,
        showInitial: true,
        preferredFormat: "hex",
        allowEmpty: true
    });

    jQuery('.ewd-us-spectrum').css('display', 'inline');

    jQuery('.ewd-us-spectrum').on('change', function() {
        if (jQuery(this).val() != "") {
            jQuery(this).css('background', jQuery(this).val());
            var rgb = EWD_US_hexToRgb(jQuery(this).val());
            var Brightness = (rgb.r * 299 + rgb.g * 587 + rgb.b * 114) / 1000;
            if (Brightness < 100) {jQuery(this).css('color', '#ffffff');}
            else {jQuery(this).css('color', '#000000');}
        }
        else {
            jQuery(this).css('background', 'none');
        }
    });

    jQuery('.ewd-us-spectrum').each(function() {
        if (jQuery(this).val() != "") {
            jQuery(this).css('background', jQuery(this).val());
            var rgb = EWD_US_hexToRgb(jQuery(this).val());
            var Brightness = (rgb.r * 299 + rgb.g * 587 + rgb.b * 114) / 1000;
            if (Brightness < 100) {jQuery(this).css('color', '#ffffff');}
            else {jQuery(this).css('color', '#000000');}
        }
    });
});

function EWD_US_hexToRgb(hex) {
    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;
}



//OPTIONS HELP/DESCRIPTION TEXT
jQuery(document).ready(function($) {
    $('.ewd-us-option-set .form-table tr').each(function(){
        var thisOptionClick = $(this);
        thisOptionClick.find('th').click(function(){
            thisOptionClick.find('td p').toggle();
        });
    });
    $('.ewdOptionHasInfo').each(function(){
        var thisNonTableOptionClick = $(this);
        thisNonTableOptionClick.find('.ewd-us-admin-styling-subsection-label').click(function(){
            thisNonTableOptionClick.find('fieldset p').toggle();
        });
    });
    $(function(){
        $(window).resize(function(){
            $('.ewd-us-option-set .form-table tr').each(function(){
                var thisOption = $(this);
                if( $(window).width() < 783 ){
                    if( thisOption.find('.ewd-us-admin-hide-radios').length > 0 ) {
                        thisOption.find('td p').show();         
                        thisOption.find('th').css('background-image', 'none');          
                        thisOption.find('th').css('cursor', 'default');         
                    }
                    else{
                        thisOption.find('td p').hide();
                        thisOption.find('th').css('background-image', 'url(../wp-content/plugins/ultimate-slider/img/options-asset-info.png)');          
                        thisOption.find('th').css('background-position', '95% 20px');           
                        thisOption.find('th').css('background-size', '18px 18px');          
                        thisOption.find('th').css('background-repeat', 'no-repeat');            
                        thisOption.find('th').css('cursor', 'pointer');                             
                    }       
                }
                else{
                    thisOption.find('td p').hide();
                    thisOption.find('th').css('background-image', 'url(../wp-content/plugins/ultimate-slider/img/options-asset-info.png)');          
                    thisOption.find('th').css('background-position', 'calc(100% - 20px) 15px');         
                    thisOption.find('th').css('background-size', '18px 18px');          
                    thisOption.find('th').css('background-repeat', 'no-repeat');            
                    thisOption.find('th').css('cursor', 'pointer');         
                }
            });
            $('.ewdOptionHasInfo').each(function(){
                var thisNonTableOption = $(this);
                if( $(window).width() < 783 ){
                    if( thisNonTableOption.find('.ewd-us-admin-hide-radios').length > 0 ) {
                        thisNonTableOption.find('fieldset p').show();           
                        thisNonTableOption.find('ewd-us-admin-styling-subsection-label').css('background-image', 'none');         
                        thisNonTableOption.find('ewd-us-admin-styling-subsection-label').css('cursor', 'default');            
                    }
                    else{
                        thisNonTableOption.find('fieldset p').hide();
                        thisNonTableOption.find('ewd-us-admin-styling-subsection-label').css('background-image', 'url(../wp-content/plugins/ultimate-slider/img/options-asset-info.png)');         
                        thisNonTableOption.find('ewd-us-admin-styling-subsection-label').css('background-position', 'calc(100% - 30px) 15px');            
                        thisNonTableOption.find('ewd-us-admin-styling-subsection-label').css('background-size', '18px 18px');         
                        thisNonTableOption.find('ewd-us-admin-styling-subsection-label').css('background-repeat', 'no-repeat');           
                        thisNonTableOption.find('ewd-us-admin-styling-subsection-label').css('cursor', 'pointer');                                
                    }       
                }
                else{
                    thisNonTableOption.find('fieldset p').hide();
                    thisNonTableOption.find('ewd-us-admin-styling-subsection-label').css('background-image', 'url(../wp-content/plugins/ultimate-slider/img/options-asset-info.png)');         
                    thisNonTableOption.find('ewd-us-admin-styling-subsection-label').css('background-position', 'calc(100% - 30px) 15px');            
                    thisNonTableOption.find('ewd-us-admin-styling-subsection-label').css('background-size', '18px 18px');         
                    thisNonTableOption.find('ewd-us-admin-styling-subsection-label').css('background-repeat', 'no-repeat');           
                    thisNonTableOption.find('ewd-us-admin-styling-subsection-label').css('cursor', 'pointer');            
                }
            });
        }).resize();
    }); 
});


//OPTIONS PAGE YES/NO TOGGLE SWITCHES
jQuery(document).ready(function($) {
    jQuery('.ewd-us-admin-option-toggle').on('change', function() {
        var Input_Name = jQuery(this).data('inputname'); console.log(Input_Name);
        if (jQuery(this).is(':checked')) {
            jQuery('input[name="' + Input_Name + '"][value="Yes"]').prop('checked', true).trigger('change');
            jQuery('input[name="' + Input_Name + '"][value="No"]').prop('checked', false);
        }
        else {
            jQuery('input[name="' + Input_Name + '"][value="Yes"]').prop('checked', false).trigger('change');
            jQuery('input[name="' + Input_Name + '"][value="No"]').prop('checked', true);
        }
    });
    $(function(){
        $(window).resize(function(){
            $('.ewd-us-option-set .form-table tr').each(function(){
                var thisOptionTr = $(this);
                if( $(window).width() < 783 ){
                    if( thisOptionTr.find('.ewd-us-admin-switch').length > 0 ) {
                        thisOptionTr.find('th').css('width', 'calc(90% - 50px');            
                        thisOptionTr.find('th').css('padding-right', 'calc(5% + 50px');         
                    }
                    else{
                        thisOptionTr.find('th').css('width', '90%');            
                        thisOptionTr.find('th').css('padding-right', '5%');         
                    }       
                }
                else{
                    thisOptionTr.find('th').css('width', '200px');          
                    thisOptionTr.find('th').css('padding-right', '46px');           
                }
            });
        }).resize();
    }); 
});



/*************************************************************************
CONDITIONAL OPTIONS
**************************************************************************/
jQuery(document).ready(function($){
    $('input[data-inputname="slider-autoplay"]').click(function(){
        if($(this).attr('checked') == 'checked'){
            $('.ewd-us-admin-conditional-autoplay-options').show();
        }
        else{
            $('.ewd-us-admin-conditional-autoplay-options').hide();
        }
    });
    $('input[data-inputname="slider_carousel"]').click(function(){
        if($(this).attr('checked') == 'checked'){
            $('.ewd-us-admin-conditional-carousel-options').show();
        }
        else{
            $('.ewd-us-admin-conditional-carousel-options').hide();
        }
    });
});




