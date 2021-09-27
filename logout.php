<?php  session_start(); ?>
<?php include "functions.php" ?>
<?php include "dbconfig.php"; ?>

<?php
$log_action="Loggedout";
create_log($_SESSION['username'], $_SESSION['user_id'], $log_action);

$_SESSION['user_id'] = null;
$_SESSION['username'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['email'] = null;
$_SESSION['user_role'] = null;

header("location: index.php");

?>