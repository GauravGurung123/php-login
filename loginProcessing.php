<?php  session_start(); ?>
<?php include "dbconfig.php"; ?>
<?php include "functions.php"; ?>

<?php
if(isset($_POST['login'])) {
    login_user($_POST['username'], $_POST['password']);
}

?>