<!--dropdown menus-->
<?php
//page for finding and displaying the list
//corresponding to the selected values
$process_page = "pages/general/display_list.php";
?>

<form class="form-horizontal">
<div class="form-group">
  <label class="col-sm-2 control-label">Choose type of order</label>
  <div class="col-sm-3">
      <select class="form-control" id="order_type"
        onchange="find_all_with(this.value, <?php echo "'{$process_page}'"; ?>, 'display' )">
      <option value="-1">---Choose A Type------</option>
      <option value="normal">Normal Order</option>
      <option value="express">Express Order</option>
      </select>
  </div>
</div>
</form>

<!-- order table -->
<div class="row">
  <div class="col-sm-10" id="display">
  </div>


</div>
