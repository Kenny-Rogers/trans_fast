<?php
  include('initialize.php');
  //IF first time::get the page clicked on
  //ELSE :: set to default
  $display = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
  $view = "";

  switch ($display) {

    case 'view_order':
      //display display_order page
      $view = "pages/view_order/display_orders.php";
      $page_title = "View Order";
      $title_class = "fa fa-file";
      break;

    case 'process_order':
      //display process_order page
      $view = "pages/process/process_order.php";
      $page_title = "Process Order";
      $title_class = "fa fa-tasks";
      break;

    case 'generate':
      //display summary report
      $view = "pages/generate/summary.php";
      $page_title = "Generate";
      $title_class = "fa fa-laptop";
      break;

    case 'deliver':
      $view = "pages/deliver/deliver_trans.php";
      $page_title = "Deliver";
      $title_class = "fa fa-envelope";
      break;

    case 'dashboard':
      //display summary report
      $view = "pages/generate/summary.php";
      $page_title = "Dashboard";
      $title_class = "fa fa-laptop";
      break;

    default:
      $view = "pages/generate/summary.php";
      $page_title = "Dashboard";
      $title_class = "fa fa-laptop";
      break;
  }
?>
