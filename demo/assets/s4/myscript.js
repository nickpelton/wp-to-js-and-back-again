$ = jQuery.noConflict();

jQuery(document).ready(function(){

	/**
	 * js-load-posts
	 * 
	 * Accessing JSON data using AJAX from WP to JS after page load with user action
	 */
	

	$('#btn_events').on('click','.js-ajax-get-data',function(e){

		// Access WP data using $.ajax()
		$.ajax({
			method: "POST",
			dataType: "JSON",
			url: myLocalizedData.ajax_url,
			data: {action:"load_posts"},

		}).done(function(myAjaxData){
			
			html = "";

		  	$.each(myAjaxData,function(index,value){
		  		html += "<h3>"+value.post_title+"</h3><br>";
		  		html += "<div>"+value.post_content+"</div><br><br>";
		  	});
		  	
		  	$('#displayData').append(html); // Note one insert

		});

	});
	

});