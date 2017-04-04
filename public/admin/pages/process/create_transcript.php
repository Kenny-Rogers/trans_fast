<?php
//this page creates the Transcript
//getting the id
$id = isset($_GET['id'])? $_GET['id'] :'-1';
$message = "Transcript Successfully Created.";
$source = "../transcripts/test.pdf";
?>

<div class='alert alert-success'>
  	  <?php echo $message; ?>
</div>
<div class="row">
  <div class="col-sm-offset-1 col-sm-10">
    <?php echo "<iframe src='{$source}'  style='width: 100%; height:100%;' ></iframe>"; ?>
  </div>
</div>
