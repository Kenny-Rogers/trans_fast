<?php
$ordered = 0;
$pending = 0;
$delivered = 0;
$processed = 0;

$ordered = Applicant::count_all();
$pending = Applicant::count_all_with("status='Pending'");
$delivered = Applicant::count_all_with("status='Delivered'");
$processed = Applicant::count_all_with("status='Processed'");
?>

<div class="row">

<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<div class="info-box dark-bg">
<i class="fa fa-thumbs-o-up"></i>
<div class="count"><?php echo "{$ordered}"; ?></div>
<div class="title">Ordered</div>
</div><!--/.info-box-->
</div><!--/.col-->

<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<div class="info-box green-bg">
<i class="fa fa-cubes"></i>
<div class="count"><?php echo "{$pending}"; ?></div>
<div class="title">Pending</div>
</div><!--/.info-box-->
</div><!--/.col-->


<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<div class="info-box blue-bg">
<i class="fa fa-cloud-download"></i>
<div class="count"><?php echo "{$delivered}"; ?></div>
<div class="title">Processed</div>
</div><!--/.info-box-->
</div><!--/.col-->

<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<div class="info-box brown-bg">
<i class="fa fa-shopping-cart"></i>
<div class="count"><?php echo "{$processed}"; ?></div>
<div class="title">Delivered</div>
</div><!--/.info-box-->
</div><!--/.col-->

</div><!--/.row-->
