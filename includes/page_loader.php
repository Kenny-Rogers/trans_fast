<?php
  //IF first time::get the page clicked on
  //ELSE :: set to default
  $display = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
  $view = "";

  switch ($display) {

    case 'view_order':
      //display display_order page
      $view = "pages/view_order/display_orders.php";
      break;

    case 'process_order':
      //display process_order page
      $view = "pages/process/process_order.php";
      break;

    case 'generate':
      //display summary report
      $view = "pages/generate/summary.php";
      break;

    case 'deliver':
      $view = "pages/deliver/deliver_trans.php";
      break;

    case 'dashboard':
      //display summary report
      $view = "pages/generate/summary.php";
      break;

    default:
      $view = "pages/generate/summary.php";
      break;
  }
?>
