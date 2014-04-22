$ = jQuery.noConflict();

jQuery(document).ready(function(){


	/**
	 * Load initial votes on page load
	 */
	// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "JSON",
			url: myLocalizedData3.ajax_url,
			data: {action:'get_votes_async'},

		}).done(function(myAjaxData){ 

		  	// Place Data in DOM
		  	$('.votes').html(myAjaxData.data);
		  	$('#displayData').append("Status: "+myAjaxData.success+", value: "+myAjaxData.data+"<br>");

		});


	/**
	 * js-ajax-save-clicks
	 * 
	 * Save the number of times a user clicks on a button
	 */

	$('#btn_events').on('click','.js-ajax-save-votes',function(){

		//$self = $(this);
		//$self.prop('disabled',true);

		// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "JSON",
			url: myLocalizedData3.ajax_url,
			data: {action:'save_votes_async',vote:1},

		}).done(function(myAjaxData){ 

		  	// Place Data in DOM
		  	$('.votes').html(myAjaxData.data);
		  	$('#displayData').append("Status: "+myAjaxData.success+", value: "+myAjaxData.data+"<br>");

		  	//$self.prop('disabled',false);

		});

	});


	/**
	 * js-ajax-reset-clicks
	 * 
	 * Reset the value for number of clicks to zero
	 */

	$('#btn_events').on('click','.js-ajax-reset-votes',function(){

		// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "JSON",
			url: myLocalizedData3.ajax_url,
			data: {action:'reset_votes_async'},

		}).done(function(myAjaxData){

		  	console.log(myAjaxData.data);

		  	// Place Data in DOM
		  	$('.votes').html(myAjaxData.data);
		  	$('#displayData').append("Status: "+myAjaxData.success+", value: "+myAjaxData.data+"<br>");

		});

	});


	

});
