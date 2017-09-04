$(document).ready(function(){

$('#add-event-btn').click(function(){


      var eventName = $("#eventName").val();
      var country = $("#mySelect").val();
      var address = $("#address").val();      
      var eventGame = $("#eventGame").val();
      var eventDateStart = $("#eventDateStart").val();
      var eventDateEnd = $("#eventDateEnd").val();
      var entranceCost = $("#entranceCost").val();
      var prizePool = $("#prizePool").val();
      var eventLink = $("#eventLink").val();

      // POST details to login.php
      $.ajax({
         type: "POST",
         url: "addEvent.php",
         dataType: 'json',
         data: {
                eventName : eventName,
                country : country,
                address : address,
                eventGame : eventGame,
                eventDateStart : eventDateStart,
                eventDateEnd : eventDateEnd,                
                entranceCost : entranceCost,
                prizePool : prizePool,
                eventLink : eventLink
               },
         success: function(response){

         	alert("The event was added");
         	window.location.href = "viewEvents.php";
         }
         });
	});
});