$ = jQuery.noConflict();

jQuery(document).ready(function(){

	/**
	 * Accessing HTML data using AJAX from WP to JS after page load
	 */

	$('#btn_events').on('click','.js-ajax-get-data',function(e){

		// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "HTML",
			url: myLocalizedData.ajax_url,
			data: {action:'my_action_1'},

		}).done(function(myAjaxData){ // note using promise

			console.log();

		  	// Place Data in DOM
		  	$('#displayData').append(myAjaxData);

		});


	});

	

});
