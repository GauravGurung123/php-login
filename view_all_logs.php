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

        <div class="container-fluid">
            <h2 class="text-center mt-4">All Logs</h2> 
            <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Log_User_ID</th>
                <th>Log_Username</th>
                <th>log_Action</th>
                <th>log_Time</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>

           <?php
            $query = "SELECT * FROM logs ORDER BY log_time DESC";
            $sel_logs = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($sel_logs)) {

            $log_id = $row['log_id'];
            $log_user_id = $row['log_user_id'];
            $log_username = $row['log_username'];
            $log_action = $row['log_action'];
            $log_time = $row['log_time'];

                echo "<tr>";
                echo "<td>$log_id</td>";
                echo "<td>$log_user_id</td>";
                echo "<td>$log_username</td>";
                echo "<td>$log_action</td>";
                echo "<td>$log_time</td>";
                echo "<td><a href='view_all_logs.php?delete={$log_id}'>Delete</a></td>";
                echo "</tr>";
        }
            ?>
            </tbody>
            </table>
        </div>
 </div>


<?php
//delete contact query
if(isset($_GET['delete'])) {
    $the_contact_id = mysqli_real_escape_string($connection,$_GET['delete']);
    $query = "DELETE FROM contacts where contact_id = {$the_contact_id} ";
    $del_contact_query = mysqli_query($connection, $query);
    header("location: view_all_contacts.php");

}

?>