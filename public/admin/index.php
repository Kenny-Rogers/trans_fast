<?php include('../../includes/page_loader.php'); ?>
//if(!$session->is_logged_in()){redirect_to('login.php');}
<?php include('layout/header.php'); ?>
<body>
 <!-- container section start -->
 <section id="container" class="">

  <!--header end-->
  <?php include('layout/navbar.php'); ?>
  <!--header end-->

  <!--sidebar start-->
  <?php include('layout/main_menu.php'); ?>
  <!--sidebar end-->

  <!--main content start-->
  <?php include('layout/main_page.php'); ?>
  <!--main content end-->
 </section>
 <!-- container section start -->

</body>
<?php include('layout/footer.php'); ?>
