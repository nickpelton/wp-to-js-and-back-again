$ = jQuery.noConflict();

jQuery(document).ready(function(){

	/**
	 * Accessing HTML data using AJAX from WP to JS after page load
	 */

	$('#btn_events').on('click','.js-ajax-get-data',function(e){

		// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "JSON",
			url: myLocalizedData.ajax_url,
			data: {action:'my_action_3'},

		}).done(function(myAjaxData){ // note using promise

		  	console.log(myAjaxData);

		  	// Build html from our data
		  	html = '<ul>';
		  	html += '<li>'+myAjaxData.data.person.name+'</li>';
		  	html += '<li>'+myAjaxData.data.person.job+'</li>';
		  	html += '<ul>';

		  	// Place Data in DOM
		  	$('#displayData').append(html);

		});


	});

	

});
