<?php
$applicant_id = $_GET['id'];
$applicant = Applicant::find_by_id($applicant_id);
$applicant->recipient = Recipient::find_by_id("appl_id={$applicant->id}");
$applicant->transcript = Transcript::find_by_id("generated_for={$applicant->id}");

$reciever = $applicant->recipient->email();
$title = "Transcript delivery for ".$applicant->full_name();
$message = "Hello ,
  This mail is a transcript from TransFast containing the transcript
  of ".$applicant->full_name();
$file = $applicant->transcript->get_trans_file();

$text_message = "Hello Jacqueline Kumi,Your transcript has been delivered.";
$number = "233209459533";

$email =new Email();
if ($email->send($reciever, $title, $message, $file)) {
  $status = Message::send_message($number, $message);

  if ($status){
    $message = "Transcript Delivered Successfully.";
    $class = "success";
  }
} else {
  $message = "Transcript Not Delivered.";
  $class = "fail";
}
?>

<div class="row">
  <?php echo output_message($message, $class); ?>
</div>
