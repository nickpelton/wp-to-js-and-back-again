$ = jQuery.noConflict();

jQuery(document).ready(function(){

	// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "HTML",
			url: myLocalizedData.ajax_url,
			data: {action:'secure_endpoint',security: myLocalizedData.ajax_nonce},

		}).done(function(myAjaxData){ 

		  	// Place Data in DOM
		  	$('#displayData').append(myAjaxData);

		});
	

});
