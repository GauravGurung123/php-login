<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = trim($_POST['username']);
    $user_firstname = trim($_POST['firstname']);
    $user_lastname = trim($_POST['lastname']);
    $user_email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $user_address = trim($_POST['address']);
    // $user_contact_no = trim($_POST['contact']);
$error = [
    'username'=> '',
    'firstname'=> '',
    'lastname'=> '',
    'email'=> '',
    'password'=> ''
];

    if (strlen($username) < 4) {
        $error['username'] = 'username cannot be less than 4 characters <hr color="red">';
    }
    if (username_exists($username)) {
        $error['username'] = 'username already exists, pick another one <hr color="red">';

    }
    if (email_exists($user_email)) {
        $error['email'] = 'Email already exists, pick another one <hr color="red">';
    }

    foreach ($error as $key => $value) {
    if (empty($value)) {
    unset($error[$key]);
    }

    } 
if (empty($error)) {
    register_user($username, $user_firstname, $user_lastname, $user_email, $password, $user_address);
    login_user($username, $password);
  }
}
?>

<div class="container border border-secondary p-5">
<h2>Please register here</h2>
<hr>
<form action="index.php" method="post" autocomplete="on"> 
  <div class="row ">
    <div class="col mb-3">
    <label for="inputAddress">User Name</label>
    <input type="text" class="form-control" id="inputUsername" name="username" 
    value="<?php echo isset($username) ? $username : '' ?>" required placeholder="must be unique">
    <small><?php echo isset($error['username']) ? $error['username'] : '' ?></small>
  </div>
   <div class="form-group col-md-6 mb-3">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email"
      value="<?php echo isset($user_email) ? $user_email : '' ?>" required>
   <small style="font-size: small; color: #e94e02"><?php echo isset($error['email']) ? $error['email'] : '' ?></small>
    </div>
  <div class="form-group col-md-6 mb-3">
    <label for="inputAddress">first Name </label>
    <input type="text" class="form-control" id="inputName" name="firstname" placeholder="Enter first name"
    value="<?php echo isset($user_firstname) ? $user_firstname : '' ?>" required>
  </div> 
  <div class="form-group col-md-6 mb-3">
    <label for="inputAddress">last Name </label>
    <input type="text" class="form-control" id="inputName" name="lastname" placeholder="Enter last name"
    value="<?php echo isset($user_lastname) ? $user_lastname : '' ?>" required>
  </div>
    <div class="col mb-3">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" name="password" placeholder="Password" required>
    </div>
  </div>
  <div class="col mb-3">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St">
  </div>

  <button type="submit" name="submit" value="submit" class="btn btn-primary mt-3">Register</button>
</form>

</div>

<style>
  small {
    font-size: small; color: #e94e02; 
}
</style>
