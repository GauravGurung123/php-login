<div class="container border border-secondary p-5">
<h2>Login Here</h2>
<hr>
<form action="loginProcessing.php" method="post">
  <div class="mb-3">
    <label for="inputUsername" class="form-label">Username</label>
    <input type="text"  name="username"  class="form-control" id="inputUsername" placeholder="username">
    <div class="form-text">We'll never share your information with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="password" required>
  </div>
  
  <button type="submit" name="login" class="btn btn-primary">Get Started</button>
</form>
</div>
