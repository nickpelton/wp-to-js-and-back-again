$ = jQuery.noConflict();

jQuery(document).ready(function(){

	// Have our "state" saved in JS memory
	var voteModel = {
		votes : parseInt(myLocalizedData4.data)
	};

	// Set the initial value on load
	$('.votes').html(voteModel.votes);
	$('#displayData').append("Status: true, value: "+voteModel.votes+"<br>");



	/**
	 * js-ajax-save-votes
	 * 
	 * Save the number of times a user votes on a button
	 */

	$('#btn_events').on('click','.js-ajax-save-votes',function(e){

		// Quick change value
		voteModel.votes += 1;
		$('.votes').html(voteModel.votes);

		update_votes();
		
	});

	update_votes = _.debounce(function(){

		// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "JSON",
			url: myLocalizedData4.ajax_url,
			data: {action:'save_votes_fast',vote:voteModel.votes},

		}).done(function(myAjaxData){ 

		  	$('#displayData').append("Status: "+myAjaxData.success+", value: "+myAjaxData.data+"<br>");

		});

	},500);


	/**
	 * js-ajax-reset-clicks
	 * 
	 * Reset the value for number of clicks to zero
	 */

	$('#btn_events').on('click','.js-ajax-reset-votes',function(){

		// Quick change value
		voteModel.votes = 0;
		$('.votes').html(voteModel.votes);
		
		reset_votes();

	});

	reset_votes = _.debounce(function(){

		// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "JSON",
			url: myLocalizedData4.ajax_url,
			data: {action:'reset_votes_fast'},

		}).done(function(myAjaxData){

		  	$('#displayData').append("Status: "+myAjaxData.success+", value: "+myAjaxData.data+"<br>");

		});

	},500);


	

});
