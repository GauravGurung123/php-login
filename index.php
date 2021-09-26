<?php include "includes/header.php" ?>
  
<div class="container mt-5">
  <div class="row">
    <div class="col">
      <?php if(!isLoggedIn()): ?>
      <?php include "registration.php" ?>
        <?php endif ?>
    </div>
    <div class="col">
      <?php if(!isLoggedIn()): ?>
      <?php include "login.php" ?>
      <?php endif ?>
    </div>
  </div>

<?php include "includes/footer.php" ?>
