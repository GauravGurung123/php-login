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
    <div class="row">

        <div class="col-sm-3 mt-4">
    <!-- member user card -->
            <div class="card">
                <?php if (!is_admin($_SESSION['username'])): ?>
                <div class="card-body">
                    <h5 class="card-title">Username:&nbsp;<?php echo $_SESSION['username']; ?></h5>
                    <p class="card-text">Email:&nbsp;<?php echo $_SESSION['email']; ?></p>
                </div>
                        
<?php
    $query = "SELECT * FROM users";
    $sel_users = mysqli_query($connection, $query);

    if($row = mysqli_fetch_assoc($sel_users)) {
        // $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];

        }
        echo "<a href='dashboard.php?source=edit_user&edit_user={$_SESSION['user_id']}'class='btn btn-primary'>Edit</a>";

?>    
        <!-- Admin user card -->
            <?php else: ?>
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text"><?php echo $user_counts = recordCount('users'); ?></p>
                        <a href="view_all_users.php" class="btn btn-primary">View All Users</a>
                    </div><?php endif; ?> 
                </div> <!-- /.card ended -->
            </div>  <!-- /.col-sm-3 mt-4 -->

<div class="col-sm-3 mt-4">
        <!-- Member contact card -->
                <div class="card">
                    <?php if (!is_admin($_SESSION['username'])): ?>
                    <div class="card-body">
                        <h5 class="card-title">Contacts</h5>
                        <p class="card-text">
                    <?php echo $user_counts = contactCount($_SESSION['user_id']); ?></p>
                    </div><!-- /.card-body ended -->
                    
    <?php
    $query = "SELECT * FROM contacts";
    $sel_contacts = mysqli_query($connection, $query);

    if($row = mysqli_fetch_assoc($sel_contacts)) {
        $contact_id = $row['contact_id'];
        $contact_no = $row['contact_no'];
        $contact_document = $row['contact_document'];

        }
        if(!isset($contact_id)){
            echo "<a href='dashboard.php?source=edit_contact&edit_contact={$contact_id}'class='col text-center'</div>Edit</a>" ;
        }
            echo "<div class='row'><a href='dashboard.php?source=add_contact'class='col text-center'>Add</a>" ;
       
    ?>    
                        <?php else: ?>
        <!-- Admin contact card -->

                    <div class="card-body">
                        <h5 class="card-title">Contacts</h5>
                        <p class="card-text"><?php echo $user_counts = contactCount($_SESSION['user_id']); ?></p>
                        <a href="view_all_contacts.php" class="btn btn-primary">View All Contacts</a>
                    </div><!-- /.card-body ended -->
                    <?php endif; ?> 
                </div> <!-- /.card ended -->
            </div>  <!-- /.col-sm-3 -->
              <?php if (is_admin($_SESSION['username'])): ?>
            <div class="col-sm-3 mt-4">
        <!-- Activity Log card -->
            <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Logs</h5>
                        <p class="card-text">See all Logs</p>
                        <a href="view_all_logs.php" class="btn btn-primary">View All Logs</a>
                    </div>
                </div> <!-- /.card ended -->
            </div>  <!-- /.col-sm-3 mt-4 -->
            <?php endif; ?>
    </div><!-- /.row ended -->
    <div class="row">
    <div class="col-12">

            

<?php
    if(isset($_GET['source'])) {
        $source = $_GET['source']; 
    } else {
        $source = '';
    }

    if($source=='edit_user'){
        include "edit_user.php";
    }

    if($source=='edit_contact'){
        include "edit_contact.php";
    }
    if($source=='add_contact'){
        include "add_contact.php";
    }

?>

        </div><!-- /.col-12 ended -->
    </div><!-- /.row ended -->
</div>   <!-- /.container-fluid -->


<?php include "includes/footer.php" ?>
