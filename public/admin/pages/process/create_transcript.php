<?php
//this page creates the Transcript
//getting neccessary info to generate transcript
$id = isset($_GET['id'])? $_GET['id'] :'-1';
$file_name = "test.pdf";
$admin_id = '1';

//creating a  new transcript
$new_transcript = Transcript::make($file_name, $id, $admin_id);
if ($new_transcript && $new_transcript->save()) {
  //transcript record saved
  $message = "Transcript Creation Successfully.";
  $class = "success";
} else {
  //transcript record not saved
  $message = "Transcript Creation Unsuccessfully.";
  $class = "fail";
}

$source = $new_transcript->get_trans_file();
?>
<div class="row">
    <?php output_message($message, $class)?>
  <div class="col-sm-4">
      <a  class="btn btn-success" href="?page=send<?php echo "&id={$id}"; ?>">Deliver Transcript</a>
  </div>
</div>
<div class="row">
  <div class="col-sm-offset-1 col-sm-10">
    <?php echo "<iframe src='{$source}'  style='width: 100%; height:100%;' ></iframe>"; ?>
  </div>
</div>
