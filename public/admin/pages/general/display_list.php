<?php session_start();
require_once('../../../../includes/initialize.php');
//values passed  for check {paid or not_paid} {normal or express}
//{ems or pick_up or email}
$check1 = isset($_GET['query1'])?$_GET['query1']:'Null';
$check2 = isset($_GET['query2'])?$_GET['query2']:'Null';
$display = isset($_SESSION['display']) ? $_SESSION['display'] : 'dashboard';
// echo "check1: {$check1}<br>";
// echo "check2: {$check2}<br>";
// echo "display: {$display}<br>";
//query string;
$sql = Applicant::get_list_by($check1, $check2);
//next page
$next_page = Applicant::find_next_page($check1, $check2);
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
        <th>To Be Delivered To</th>
        <th>Payment Status</th>
        <?php if (($display == "process_order") || ($display == "deliver")){ ?>
        <th>Action</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($applicants as $applicant ) {
          //have to set the payment info
            $applicant->payment = Payment::find_by_id("paid_by={$applicant->id}");
            $applicant->recipient = Recipient::find_by_id("appl_id={$applicant->id}");
      ?>
      <tr>
        <td><?php echo $applicant->id;  ?></td>
        <td><?php echo $applicant->full_name(); ?></td>
        <td><?php echo $applicant->find_application_date(); ?></td>
        <td><?php echo $applicant->recipient->name(); ?></td>
        <td><?php echo $applicant->has_paid(); ?></td>
        <?php if (($display == "process_order") || ($display == "deliver")){ ?>
        <td><a href="<?php echo $applicant->link_state($next_page); ?>">
          Process</a></td>
        <?php } ?>
      </tr>
    <?php } ?>
  </tbody>
  </table>
</div>
