<div class="container mt-4">
<?php
if(isset($_GET['edit_contact'])) {
    $the_contact_id = $_GET['edit_contact'];

    $query = "SELECT * FROM contacts where contact_id = $the_contact_id ";
    $sel_contacts_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($sel_contacts_query)) {
        $contact_id = $row['contact_id'];
        $contact_no = $row['contact_no'];
        $contact_document = $row['contact_document'];
    }

}


if(isset($_POST['edit_contact'])) {
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

    $query = "UPDATE contacts SET ";
    $query .="contact_no = '{$contact_no}', ";
    $query .="contact_document = '{$contact_document}' ";
    $query .="WHERE contact_id = {$the_contact_id} ";

    $log_action="Contact updated";
    create_log($_SESSION['username'], $_SESSION['user_id'], $log_action);
    $update_contact_query = mysqli_query($connection, $query);
    confirm($update_contact_query);
    }
}
?>

<div class="container">

<form action="" method="post" enctype="multipart/form-data"> 
<div class="row ">
  <div class="col mb-3">
    <label for="inputContact">Contact number</label>
    <input type="text" class="form-control" value="<?php echo $contact_no ?>" id="inputContacts" name="contact" placeholder="980******">
  </div>
    <div class="col mb-3">
    <label for="inputFile">Upload file</label>
    <input type="file" class="form-control"  
    id="inputFiles" name="document">
  </div>
  <div class="col mb-3">
  <input type="submit" name="edit_contact" class="btn btn-primary mt-4" value="Update">
  </div>
   <div class="col mb-3 p-5">
      <p><a href="documents/<?php echo $contact_document?>"><?php echo $contact_document?></a></p>
  </div>
  </div>
</form>

  <div>


</div>
<hr>