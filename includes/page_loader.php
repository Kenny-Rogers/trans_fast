<?php
  //IF first time::get the page clicked on
  //ELSE :: set to default
  $view = "";
  $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

  switch ($page) {
    case 'dashboard':
      $view="template.php";
      break;

    default:
      $view="template.php";
      break;
  }
?>
