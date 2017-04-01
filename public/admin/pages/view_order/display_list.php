<?php
$val = isset($_GET['query1'])?$_GET['query1']:'Null';
echo "{$val}";
?>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Date Applied</th>
        <th>Delivery Point</th>
      </tr>
    </thead>
    <?php //TODO::code to display rows of the data ?>
  </table>
</div>
