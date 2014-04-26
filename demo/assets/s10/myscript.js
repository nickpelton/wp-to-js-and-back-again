$ = jQuery.noConflict();

jQuery(document).ready(function(){

	// Have our "state" saved in JS memory
	var voteModel = {
		votes : parseInt(myLocalizedData.data)
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

		update_votes(voteModel.votes);
		
	});


	/**
	 * js-ajax-reset-clicks
	 * 
	 * Reset the value for number of clicks to zero
	 */

	$('#btn_events').on('click','.js-ajax-reset-votes',function(){

		// Quick change value
		voteModel.votes = 0;
		$('.votes').html(voteModel.votes);
		
		update_votes(0);

	});

	/**
	 * Update votes function
	 * 
	 * Async update db with new votes count
	 */
	update_votes = _.debounce(function(votes){

		// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "JSON",
			url: myLocalizedData.ajax_url,
			data: {action:'save_votes_secure',vote:votes, nonce: myLocalizedData.ajax_nonce },

		}).done(function(myAjaxData){ 

		  	$('#displayData').append("Status: "+myAjaxData.success+", value: "+myAjaxData.data+"<br>");

		});

	},500);

	

});
