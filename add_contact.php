<?php
if(isset($_POST['create_contact'])){
    $contact_no = $_POST['contact'];
    $contact_document = $_FILES['document']['name'];
    $contact_document_temp = $_FILES['document']['tmp_name'];

    move_uploaded_file($contact_document_temp, "documents/$contact_document");

    $allowed_extension = array('jpeg', 'jpg', 'pdf', 'doc', 'docx');
    $filename = $_FILES['document']['name'];
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($file_extension, $allowed_extension)){
      echo "only jpg, jpeg, pdf, doc and docx allowed";
    }
    else{
   
    $query = "insert into contacts(contact_user_id, contact_no, contact_document)";
    $query .= "values({$_SESSION['user_id']}, '{$contact_no}','$contact_document')";

    $log_action="Contact added";
    create_log($_SESSION['username'], $_SESSION['user_id'], $log_action);
    $create_contact_query = mysqli_query($connection, $query);
    confirm($create_contact_query);
    }
}
?>
<form action="" method="post" enctype="multipart/form-data"> 
  <div class="row mt-2">
  <div class="col mb-3">
    <label for="inputContact">Contact number</label>
    <input type="text" class="form-control" id="inputContacts" name="contact" placeholder="980******">
  </div>
    <div class="col mb-3">
    <label for="inputFile">Upload file</label>
    <input type="file" class="form-control" id="inputFiles" name="document" placeholder="jpg/jpeg/pdf/doc">
  </div>
  <div class="col mb-3">
  <input type="submit" name="create_contact"  class="btn btn-primary mt-4" value="Add">
  </div>
  </div>
</form>
