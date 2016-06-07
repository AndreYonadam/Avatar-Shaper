jQuery( document ).ready(function(){

    "use strict";
 
    //This if statement checks if the color picker widget exists within jQuery UI

    //If it does exist then we initialize the WordPress color picker on our text input field

    if( typeof jQuery.wp === 'object' && typeof jQuery.wp.wpColorPicker === 'function' ){

        jQuery( '.select_color' ).wpColorPicker();

    }

    else {

        //We use farbtastic if the WordPress color picker widget doesn't exist

        jQuery( '#colorpicker' ).farbtastic( '.select_color' );

    }/*
jQuery("#avatar_check").change(function() {
    if(!this.checked) {
		jQuery("#square").attr('disabled', 'disabled');
		jQuery("#circle").attr('disabled', 'disabled');
    }
	    if(this.checked) {
		jQuery("#square").attr('disabled', null);
		jQuery("#circle").attr('disabled', null);
    }
});
jQuery(".imagebutton").change(function () {
if(jQuery('#radio_example_one1').is(':checked')) {
jQuery(".cardchecked").attr('disabled', null);
}
else{
jQuery(".cardchecked").attr('disabled', 'disabled');
}
});*/
});