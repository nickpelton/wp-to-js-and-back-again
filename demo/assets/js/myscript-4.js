$ = jQuery.noConflict();

jQuery(document).ready(function(){

	/**
	 * js-load-posts
	 * 
	 * Accessing JSON data using AJAX from WP to JS after page load with user action
	 */
	
	// Access WP data using $.ajax()
	$.ajax({
		method: "POST",
		dataType: "JSON",
		url: myLocalizedData3.ajax_url,
		data: {action:"my_action_4"},

	}).done(function(myAjaxData){

		$html = "";

	  	$.each(myAjaxData,function(index,value){
	  		$html += "<h3>"+value.post_title+"</h3><br>";
	  		$html += "<div>"+value.post_content+"</div><br><br>";
	  	});
	  	
	  	$('#displayData').append($html); // Note one insert

	});
	

});