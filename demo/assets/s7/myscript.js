$ = jQuery.noConflict();

jQuery(document).ready(function(){


	/**
	 * Load initial votes on page load
	 */
	// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "JSON",
			url: myLocalizedData.ajax_url,
			data: {action:'get_votes_async'},

		}).done(function(myAjaxData){ 

		  	// Place Data in DOM
		  	$('.votes').html(myAjaxData.data);
		  	$('#displayData').append("Status: "+myAjaxData.success+", value: "+myAjaxData.data+"<br>");

		  	$('.spinner').hide();
		  	$('#btn_events').find('button').prop('disabled',false);
		});


	/**
	 * js-ajax-save-clicks
	 * 
	 * Save the number of times a user clicks on a button
	 */

	$('#btn_events').on('click','.js-ajax-save-votes',function(){

		// Disable button
		$('#btn_events').find('button').prop('disabled',true);
		$('.spinner').show();


		// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "JSON",
			url: myLocalizedData.ajax_url,
			data: {action:'save_votes_async',vote:1},

		}).done(function(myAjaxData){ 

		  	// Place Data in DOM
		  	$('.votes').html(myAjaxData.data)
		  	$('#displayData').append("Status: "+myAjaxData.success+", value: "+myAjaxData.data+"<br>");

		  	// enable button
		  	$('#btn_events').find('button').prop('disabled',false);
		  	$('.spinner').hide();

		});

	});


	/**
	 * js-ajax-reset-clicks
	 * 
	 * Reset the value for number of clicks to zero
	 */

	$('#btn_events').on('click','.js-ajax-reset-votes',function(){

		// Disable button
		$('#btn_events').find('button').prop('disabled',true);
		$('.spinner').show();
		
		// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "JSON",
			url: myLocalizedData.ajax_url,
			data: {action:'reset_votes_async'},

		}).done(function(myAjaxData){

		  	console.log(myAjaxData.data);

		  	// Place Data in DOM
		  	$('.votes').html(myAjaxData.data);
		  	$('#displayData').append("Status: "+myAjaxData.success+", value: "+myAjaxData.data+"<br>");

		  	// enable button
		  	$('.spinner').hide();
		  	$('#btn_events').find('button').prop('disabled',false);

		});

	});


	

});
