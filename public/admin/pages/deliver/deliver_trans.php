<!--dropdown menus-->
<?php
//page for finding and displaying the list
//corresponding to the selected values
$process_page = "pages/general/display_list.php";
?>

<form class="form-horizontal">
<div class="form-group">
  <label class="col-sm-2 control-label">Choose delivery type</label>
  <div class="col-sm-3">
      <select class="form-control" id="order_type"
        onchange="find_all_with(this.value, <?php echo "'{$process_page}'"; ?>, 'display')">
      <option value="-1">---Choose A Type------</option>
      <option value="email">Email</option>
      <option value="ems">EMS</option>
      <option value="pick_up">Pick Up</option>
      </select>
  </div>
  </div>
</form>

<!-- order table -->
<div class="row">
  <div class="col-sm-10" id="display">

  </div>
</div>
