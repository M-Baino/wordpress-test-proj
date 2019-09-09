/**
* Custom Js for backend 
*
* @package Core_Corporate
*/
jQuery(document).ready(function($) {
    $('#core-corporate-img-container li label img').click(function(){    	
        $('#core-corporate-img-container li').each(function(){
            $(this).find('img').removeClass ('core-corporate-radio-img-selected') ;
        });
        $(this).addClass ('core-corporate-radio-img-selected') ;
    });                    
});