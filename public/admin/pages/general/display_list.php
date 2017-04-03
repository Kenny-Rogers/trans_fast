<?php require_once('../../../../includes/initialize.php');
//if(!$session->is_logged_in()){redirect_to('login.php');}
//values passed  for check {paid or not_paid} {normal or express}
//{ems or pick_up or email}
$check1 = isset($_GET['query1'])?$_GET['query1']:'Null';
$check2 = isset($_GET['query2'])?$_GET['query2']:'Null';
// echo "check1: {$check1}<br>";
// echo "check2: {$check2}<br>";

//query string;
$sql = Applicant::get_list_by($check1, $check2);

//getting list of applicant objects from the db
$applicants = Applicant::find_by_sql($sql);
?>
<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Date Applied</th>
        <th>Delivery Point</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($applicants as $applicant ) { ?>
      <tr>
        <td><?php echo $applicant->school_id;  ?></td>
        <td><?php echo $applicant->full_name(); ?></td>
        <td><?php echo $applicant->find_application_date(); ?></td>
        <td><?php echo $applicant->find_date_delivered(); ?></td>
      </tr>
    <?php } ?>
  </tbody>
  </table>
</div>
