<div class="container mt-4">
<?php
if(isset($_GET['edit_user'])) {
    $the_user_id = $_GET['edit_user'];

    $query = "SELECT * FROM users where user_id = $the_user_id ";
    $sel_users_query = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($sel_users_query)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
}

}
if(isset($_POST['edit_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];


    $query = "UPDATE users SET ";
    $query .="user_firstname = '{$user_firstname}', ";
    $query .="user_lastname = '{$user_lastname}', ";
    $query .="username = '{$username}', ";
    $query .="user_email = '{$user_email}' ";
    $query .="WHERE user_id = {$the_user_id} ";
    $log_action="User profile updated";
    create_log($_SESSION['username'], $_SESSION['user_id'], $log_action);

    $update_user_query = mysqli_query($connection, $query);
    confirm($update_user_query);
    echo "USER Updated Succesfully";

}



?>
    <div class="container-fluid">
            <p class="text-uppercase display-4 mt-4"><?php echo $user_firstname ." " ; echo $user_lastname ?></p>    
<div class="row">
    <div class="col">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="user_firstname">First Name</label>
                    <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
                </div>
                <div class="form-group">
                    <label for="user_lastname">Last Name</label>
                    <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
                </div>
              
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
                <label for="post_content">Email</label>
                <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
            </div>
           
            <div class="form-group">
                <input type="submit" class="btn btn-primary mt-2" name="edit_user" value="Update User">
            </div>

        </form>
        <hr>
    </div>

<div class="col">

<?php
if(isset($_POST['edit_password'])) {
$user_password = $_POST['user_password'];

if (!empty($user_password)) {
    $query_password = "select user_password from users where user_id = $the_user_id";
    $get_user_query = mysqli_query($connection, $query_password);
    confirm($get_user_query);
    $row = mysqli_fetch_array($get_user_query);
    $db_user_password = $row['user_password'];

    if ($db_user_password != $user_password) {
        $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
    }
        $query = "UPDATE users SET ";
        $query .="user_password = '{$hashed_password}' ";
        $query .="WHERE user_id = {$the_user_id} ";
        $log_action="User password updated";
        create_log($_SESSION['username'], $_SESSION['user_id'], $log_action);
        $update_user_query = mysqli_query($connection, $query);
        confirm($update_user_query);
        echo "Password Updated Succesfully";

    }
}


?>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="post_content">Password</label>
                <input type="password" class="form-control" name="user_password">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary mt-2" name="edit_password" value="Update Password">
            </div>

        </form>
</div>

    </div>
    </div>
</div>
<hr>