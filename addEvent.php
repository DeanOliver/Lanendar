<?php

require_once 'dbHandler.php';

$eventName = $_POST['eventName'];
$country = $_POST['country'];
$address = $_POST['address'];
$eventGame = $_POST['eventGame'];
$eventDateStart = $_POST['eventDateStart'];
$eventDateEnd = $_POST['eventDateEnd'];
$entranceCost = $_POST['entranceCost'];
$prizePool = $_POST['prizePool'];
$eventLink = $_POST['eventLink']; 

$db = connect();

       $insert = "INSERT INTO events 
                (eventName, country, address, game, eventDateStart, eventDateEnd,
                 entranceCost, prizePool, link)
                 VALUES('". $eventName ."',
                        '". $country ."',
                        '". $address ."',
                        '". $eventGame ."', 
                        '". $eventDateStart ."',
                        '". $eventDateEnd ."',                        
                        '". $entranceCost ."', 
                        '". $prizePool ."',
                        '". $eventLink ."')";
       insert($db, $insert);

       echo json_encode("complete");

?>

