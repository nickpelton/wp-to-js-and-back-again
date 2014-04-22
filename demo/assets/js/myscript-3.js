$ = jQuery.noConflict();

jQuery(document).ready(function(){

	/**
	 * Accessing HTML data using AJAX from WP to JS after page load
	 */

	// Access WP data using $.ajax()
	$.ajax({
		method: "POST",
		dataType: "html",
		url: myLocalizedData3.ajax_url,
		data: {action:'my_action_1'},

	}).done(function(myAjaxData){ // note using promise

	  	console.log(myAjaxData);

	  	// Place Data in DOM
	  	$('#displayData').append(myAjaxData);

	});

	

});
