<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "dbconfig.php"; ?>
<?php include "functions.php" ?>

<?php include "includes/header.php" ?>

 <div class="container mt-4">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to <a href='dashboard.php'>dashboard!</a><small>&nbsp;<?php echo $_SESSION['username']; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
                <div class="row">

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text"><?php echo $user_counts = recordCount('users'); ?></p>
                       
                        <?php
                        // if (!is_admin($_SESSION['username'])) {
                        // header("location: index.php");
                        // }

                        ?>
                        <a href="view_all_users.php" class="btn btn-primary">View all</a>
                        </div>
                    </div>
                </div>
            </div>  <!-- /.row -->
        </div>   <!-- /.container-fluid -->


<?php include "includes/footer.php" ?>
