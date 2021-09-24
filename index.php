<?php ob_start(); ?>
<?php include "functions.php" ?>
<?php include "dbconfig.php"; ?>
<?php include "includes/header.php" ?>
  
<div class="container mt-5">
  <div class="row">
    <div class="col">
      <?php include "registration.php" ?>

    </div>
    <div class="col">
      <?php include "login.php" ?>
    </div>
  </div>




<?php include "includes/footer.php" ?>
