<div class="container mt-4">
              
                <?php
                if(isset($_GET['edit_user'])) {
                $the_user_id = $_GET['edit_user'];

                $query = "SELECT * FROM users where user_id = $the_user_id ";
                $sel_users_query = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($sel_users_query)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_role = $row['user_role'];

                }

                }
                if(isset($_POST['edit_user'])) {
                $user_firstname = $_POST['user_firstname'];
                $user_lastname = $_POST['user_lastname'];
                $user_role = $_POST['user_role'];
                $username = $_POST['username'];
                $user_email = $_POST['user_email'];
                $user_password = $_POST['user_password'];

                if (!empty($user_password)) {
                    $query_password = "select user_password from users where user_id = $the_user_id";
                    $get_user_query = mysqli_query($connection, $query_password);
                    confirm($get_user_query);
                    $row = mysqli_fetch_array($get_user_query);
                    $db_user_password = $row['user_password'];

                    if ($db_user_password != $user_password) {
                        $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

                        $query = "UPDATE users SET ";
                        $query .="user_firstname = '{$user_firstname}', ";
                        $query .="user_lastname = '{$user_lastname}', ";
                        $query .="user_role = '{$user_role}', ";
                        $query .="username = '{$username}', ";
                        $query .="user_email = '{$user_email}', ";
                        $query .="user_password = '{$hashed_password}' ";
                        $query .="WHERE user_id = {$the_user_id} ";

                        $update_user_query = mysqli_query($connection, $query);
                        confirm($update_user_query);
                        echo "USER Updated" . "<a href='users.php'>&nbsp;View Users </a>";

                    }
                }

            }
            ?>
      <div class="container-fluid">
            <p class="text-uppercase display-4 mt-4"><?php echo $user_firstname ." " ; echo $user_lastname ?></p>    

            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="user_firstname">First Name</label>
                    <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
                </div>
                <div class="form-group">
                    <label for="user_lastname">Last Name</label>
                    <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
                </div>
<?php if (is_admin(($_SESSION['username']))): ?>
                <div class="form-group mt-2 mb-2">
                    <select name="user_role" id="">
                        <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
                        <?php
                        if($user_role == 'admin') {
                            echo "<option value='member'>member</option>";
                        } 
                        else {
                            echo "<option value='admin'>admin</option>";
                        }

                        ?>
                        >

                    </select>
                </div>
<?php endif; ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
                <label for="post_content">Email</label>
                <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
            </div>
            <div class="form-group">
                <label for="post_content">Password</label>
                <input autocomplete="off" type="password" class="form-control" name="user_password">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary mt-2" name="edit_user" value="Update User">
            </div>

            </form>

    </div>
</div>
<hr>