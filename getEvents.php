<?php

require_once 'dbHandler.php';

$country = $_POST['country'];
//$country = "United Kingdom";
$db = connect();

$query = "SELECT * FROM events WHERE country='" . $country . "' ";
$result = mysqli_query($db, $query);

if($result == "Failed Query"){
  echo json_encode("No events");
  return 0;
}

if (!mysqli_num_rows($result) > 0) {
  echo json_encode("No events");
  return 0;
}

$returnData = array();

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {


      //echo $row['eventName'];
    array_push($returnData, array('eventName' => $row["eventName"],
                                    'country' => $row["country"],
                                    'address' => $row["address"],
                                    'game' => $row["game"],
                                    'eventDateStart' => $row["eventDateStart"],
                                    'eventDateEnd' => $row["eventDateEnd"],
                                    'entranceCost' => $row["entranceCost"],
                                    'prizePool' => $row["prizePool"],
                                    'link' => $row["link"]));

  }
}

echo json_encode($returnData);
return 0;
?>