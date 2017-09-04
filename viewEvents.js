$(document).ready(function(){

$('#searchBtn').click(function(){


      var country = $("#mySelect").val();

      // POST details to login.php
      $.ajax({
         type: "POST",
         url: "getEvents.php",
         dataType: 'json',
         data: {
                country : country
               },
         success: function(response){

         	if(response == "No events"){
              $("#events").html("");
              $("#events" ).append( "<div class='no_data'><p>There are no events for this day</p></div>" );
            }
            else{   
               $("#events").html(""); 
               /* Add header to table */
               $( "#events" ).append( "<p class='events' style='background:#80bdff;'>Events</p>" );

              for(var i = 0; i < response.length; i++){  
                 $( "#events" ).append( "<p class='events'>" + response[i]["eventName"] + " - " + response[i]["address"] + "</p>" );
              }
            }

         }
         });
	});
});