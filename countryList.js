$(document).ready(function(){

	$.ajax({
	type: "POST",
	url: "getCountries.php",
	dataType: "json",
	success: function(countries) {

		for(var i = 0; i < countries.length; i++){  
        	$( "#mySelect" ).append( "<option>" + countries[i] + "</option>" );             
        }
	}
	});

});