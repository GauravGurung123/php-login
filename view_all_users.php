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
    <?php
    if(isset($_GET['source'])) {
        $source = $_GET['source']; 
    } else {
        $source = '';
    }

    if($source=='edit_user'){
        include "edit_user.php";
    }

?>
        <div class="container-fluid">
            <h2 class="text-center mt-4">All Users</h2>                
            <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Role</th>
                <th>Upgrade</th>
                <th>Downgrade</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT * FROM users ORDER BY username";
            $sel_users = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($sel_users)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_role = $row['user_role'];

                echo "<tr>";
                echo "<td>{$user_id}</td>";
                echo "<td>{$username}</td>";
                echo "<td>{$user_firstname}</td>";
                echo "<td>{$user_lastname}</td>";
                echo "<td>{$user_email}</td>";
                echo "<td>{$user_role}</td>";
                echo "<td><a href='view_all_users.php?change_to_admin={$user_id}'>Make Admin</a></td>";
                echo "<td><a href='view_all_users.php?change_to_member={$user_id}'>Make Member</a></td>";
                echo "<td><a href='view_all_users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
                echo "<td><a href='view_all_users.php?delete={$user_id}'>Delete</a></td>";
                echo "</tr>";

            }
            ?>

            </tbody>
            </table>
        </div>
 </div>


<?php
//change to  admin query
if(isset($_GET['change_to_admin'])) {
    $the_user_id = $_GET['change_to_admin'];

    $query = "UPDATE users SET user_role = 'admin' where  user_id = $the_user_id  ";
    $log_action="Changed to admin";
    create_log($_SESSION['username'], $_SESSION['user_id'], $log_action);

    $change_to_admin_query = mysqli_query($connection, $query);
    header("location: view_all_users.php");

}
//change to member  query
if(isset($_GET['change_to_member'])) {
    $the_user_id = $_GET['change_to_member'];

    $query = "UPDATE users SET user_role = 'member' where  user_id = $the_user_id  ";
    $log_action="Changed to member";
    create_log($_SESSION['username'], $_SESSION['user_id'], $log_action);
    $change_to_member_query = mysqli_query($connection, $query);
    header("location: view_all_users.php");

}

//delete user query
if(isset($_GET['delete'])) {
    if (isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] == 'admin') {
        $the_user_id = mysqli_real_escape_string($connection,$_GET['delete']);

        $query = "DELETE FROM users where user_id = {$the_user_id} ";
        $log_action="User deleted";
        create_log($_SESSION['username'], $_SESSION['user_id'], $log_action);
        $del_user_query = mysqli_query($connection, $query);
        header("location: view_all_users.php");
        }

    }

}

?>