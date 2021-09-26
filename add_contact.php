<script src="../js/script.js"></script>

<?php
if(isset($_POST['create_post'])){
    $post_cat_id = $_POST['post_category'];
    $post_title = escape($_POST['post_title']);
    $post_user = $_SESSION['username'];
    $post_tags = escape($_POST['post_tags']);
    $post_content = escape($_POST['post_content']);
    $post_status = escape($_POST['post_status']);

    $post_date = date('y-m-d');

    
    $query = "INSERT INTO posts(post_cat_id,post_title,post_user,post_date,post_content,post_tags,post_status)
    VALUES({$post_cat_id},'{$post_title}','{$post_user}',now(),'{$post_content}','{$post_tags}','{$post_status}')";

    $create_post_query = mysqli_query($connection, $query);
    confirm($create_post_query);
    $the_post_id = mysqli_insert_id($connection);
    echo "<p class='bg-success'>Post Created Successfully! &nbsp; <a href='../post.php?p_id={$the_post_id}'>View Post</a>
            &nbsp;||&nbsp; <a href='posts.php'>Edit Other Posts</a></p>";

}
?>


<form action="index.php" method="post" enctype="multipart/form-data"> 
  <div class="row ">
  <div class="col mb-3">
    <label for="inputAddress2">Contact number</label>
    <input type="text" class="form-control" id="inputContact" name="contact" placeholder="980******">
  </div>
   <div class="col mb-3">
    <label for="inputAddress2">Contact number</label>
    <input type="file" class="form-control" id="inputContact" name="file" placeholder="980******">
  </div>
  <div class="col mb-3">
  <button type="submit" name="submit" value="submit" class="btn btn-primary mt-3">Add</button>
  </div>
  </div>
</form>
