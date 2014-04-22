jQuery(document).ready(function(){

	
	/**
	 * Accessing data passed to JS from WP on page load
	 */

	// Place Data in DOM
	$('#displayData').append("Name from Local: "+myLocalizedData1.data.person.name+"<br>");




	/**
	 * Accessing JSON data using AJAX from WP to JS after page load
	 */

	// Access WP data using $.ajax()
	$.ajax({
		method: "POST",
		dataType: "html",
		url: myLocalizedData2.ajax_url,
		data: {action:'my_action_1'},

	}).done(function(myAjaxData){ // note using promise

	  	console.log(myAjaxData);

	  	// Place Data in DOM
	  	$('#displayData').append("Action 1: "+myAjaxData+"<br>");

	});





	/**
	 * js-ajax-action-1
	 * 
	 * Accessing JSON data using AJAX from WP to JS after page load with user action
	 */

	$('#interaction').on('click','.js-ajax-action-1',function(){

		// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "HTML",
			url: myLocalizedData2.ajax_url,
			data: {action:'my_action_1'},

		}).done(function(myAjaxData){ // note using promise

		  	console.log(myAjaxData);

		  	// Place Data in DOM
		  	$('#displayData').append("Action 1: "+myAjaxData+"<br>");

		});

	});


	/**
	 * js-ajax-action-2
	 * 
	 * Accessing JSON data using AJAX from WP to JS after page load with user action
	 */

	$('#interaction').on('click','.js-ajax-action-2',function(){

		// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "json",
			url: myLocalizedData2.ajax_url,
			data: {action:'my_action_1'},

		}).done(function(myAjaxData){ // note using promise

		  	console.log(myAjaxData.data);

		  	// Place Data in DOM
		  	$('#displayData').append("Name from Ajax: "+myAjaxData.data.person.name+"<br>");

		});

	});


	/**
	 * js-ajax-action-3
	 * 
	 * Accessing JSON data using AJAX from WP to JS after page load with user action
	 */

	$('#interaction').on('click','.js-ajax-action-3',function(){

		// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "json",
			url: myLocalizedData2.ajax_url,
			data: {action:'my_action_1'},

		}).done(function(myAjaxData){ // note using promise

		  	console.log(myAjaxData.data);

		  	// Place Data in DOM
		  	$('#displayData').append("Name from Ajax: "+myAjaxData.data.person.name+"<br>");

		});

	});


	/**
	 * js-ajax-action-4
	 * 
	 * Accessing JSON data using AJAX from WP to JS after page load with user action
	 */

	$('#interaction').on('click','.js-ajax-action-4',function(){

		// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "json",
			url: myLocalizedData2.ajax_url,
			data: {action:'my_action_1'},

		}).done(function(myAjaxData){ // note using promise

		  	console.log(myAjaxData.data);

		  	// Place Data in DOM
		  	$('#displayData').append("Name from Ajax: "+myAjaxData.data.person.name+"<br>");

		});

	});


	/**
	 * js-ajax-action-5
	 * 
	 * Accessing JSON data using AJAX from WP to JS after page load with user action
	 */

	$('#interaction').on('click','.js-ajax-action-5',function(){

		// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "json",
			url: myLocalizedData2.ajax_url,
			data: {action:'my_action_1'},

		}).done(function(myAjaxData){ // note using promise

		  	console.log(myAjaxData.data);

		  	// Place Data in DOM
		  	$('#displayData').append("Name from Ajax: "+myAjaxData.data.person.name+"<br>");

		});

	});


	/**
	 * js-ajax-action-6
	 * 
	 * Accessing JSON data using AJAX from WP to JS after page load with user action
	 */

	$('#interaction').on('click','.js-ajax-action-6',function(){

		// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "json",
			url: myLocalizedData2.ajax_url,
			data: {action:'my_action_1'},

		}).done(function(myAjaxData){ // note using promise

		  	console.log(myAjaxData.data);

		  	// Place Data in DOM
		  	$('#displayData').append("Name from Ajax: "+myAjaxData.data.person.name+"<br>");

		});

	});


	/**
	 * js-ajax-action-7
	 * 
	 * Accessing JSON data using AJAX from WP to JS after page load with user action
	 */

	$('#interaction').on('click','.js-ajax-action-7',function(){

		// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "json",
			url: myLocalizedData3.ajax_url,
			data: {action:'my_action_1', nonce: myLocalizedData3.ajax_nonce},

		}).done(function(myAjaxData){ // note using promise

		  	console.log(myAjaxData.data);

		  	// Place Data in DOM
		  	$('#displayData').append("Name from Ajax: "+myAjaxData.data.person.name+"<br>");

		});

	});


	

	

});
