$ = jQuery.noConflict();

jQuery(document).ready(function(){
	
	/**
	 * Accessing data passed to JS from WP on page load
	 */

	// Place Data in DOM
	$('#displayData').append("Name: "+myLocalizedData.data.person.name+"<br>");
	$('#displayData').append("Job: "+myLocalizedData.data.person.job+"<br>");


});