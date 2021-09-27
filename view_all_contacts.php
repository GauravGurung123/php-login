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

    if($source=='edit_contact'){
        include "edit_contact.php";
    }
    if($source=='add_contact'){
        include "add_contact.php";
    }

?>
        <div class="container-fluid">

            <h2 class="text-center mt-4">All Contact</h2> 
            <span><a href='view_all_contacts.php?source=add_contact'>Add New Contact</a></span>      
            <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Contact no</th>
                <th>Document</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>

            <?php
            if (!is_admin($_SESSION['username'])){
            $query = "select * from contacts where contact_user_id={$_SESSION['user_id']}";
            } else {
                $query = "select * from contacts";
            }
            $sel_contacts = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($sel_contacts)) {
            $contact_id = $row['contact_id'];
            $contact_no = $row['contact_no'];
            $contact_document = $row['contact_document'];

                echo "<tr>";
                echo "<td>$contact_id</td>";
                echo "<td>$contact_no</td>";
                echo "<td>doc</td>";
                echo "<td><a href='view_all_contacts.php?source=edit_contact&edit_contact={$contact_id}'>Edit</a></td>";
                echo "<td><a href='view_all_contacts.php?delete={$contact_id}'>Delete</a></td>";
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
    $log_action="contact deleted";
    $the_contact_id = mysqli_real_escape_string($connection,$_GET['delete']);

    $query = "DELETE FROM contacts where contact_id = {$the_contact_id} ";
    create_log($_SESSION['username'], $_SESSION['user_id'], $log_action);
    $del_contact_query = mysqli_query($connection, $query);
    header("location: view_all_contacts.php");

}

?>