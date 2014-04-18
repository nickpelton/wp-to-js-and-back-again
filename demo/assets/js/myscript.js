jQuery(document).ready(function(){

	
	/**
	 * Accessing data passed to JS from WP on page load
	 */

	// Access Localize script data
	console.log(myLocalizedData.data);

	// Place Data in DOM
	$('#displayData').append("Name from Local: "+myLocalizedData.data.person.name+"<br>");




	/**
	 * Accessing JSON data using AJAX from WP to JS after page load
	 */

	// Access WP data using $.ajax()
	$.ajax({
		method: "POST",
		dataType: "json",
		url: myLocalizedData.ajax_url,
		data: {action:'my_action', nonce: myLocalizedData.ajax_nonce},

	}).done(function(myAjaxData){ // note using promise

	  	console.log(myAjaxData.data);

	  	// Place Data in DOM
	  	$('#displayData').append("Name from Ajax: "+myAjaxData.data.person.name+"<br>");

	});





	/**
	 * Accessing JSON data using AJAX from WP to JS after page load with user intervention
	 */

	$('#interaction').on('click','button.js-get-name',function(){

		// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "json",
			url: myLocalizedData.ajax_url,
			data: {action:'my_action', nonce: myLocalizedData.ajax_nonce},

		}).done(function(myAjaxData){ // note using promise

		  	console.log(myAjaxData.data);

		  	// Place Data in DOM
		  	$('#displayData').append("Name from Ajax: "+myAjaxData.data.person.name+"<br>");

		});

	});


	

	

});
