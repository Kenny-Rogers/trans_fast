<?php
$message = "Hello Jacqueline Kumi,Your transcript has been delivered.";
$number = "233209459533";


//$status = Message::send_message($number, $message);

if ($status){
    echo "Transcript delivered successfully.<br>";
} else {
  echo "Transcript not delivered .<br>";
}

?>
