<?php include "header.php"; ?>
<?php

if(isset($_POST['submit'])){
  include "config.php"; 

  
    if(empty($_FILES['new-image']['name'])){
            $new_name = $_POST['old_image'];
      }else{
      $errors = array();

    $file_name = $_FILES['new-image']['name'];
    $file_size = $_FILES['new-image']['size'];
    $file_tmp = $_FILES['new-image']['tmp_name'];
    $file_type = $_FILES['new-image']['type'];
    $file_ext = end(explode('.',$file_name));

    $extensions = array("jpeg","jpg","png");

    if(in_array($file_ext,$extensions) === false)
    {
      $errors[] = "This extension file not allowed, Please choose a JPG or PNG file.";
    }

    if($file_size > 2097152){
      $errors[] = "File size must be 2mb or lower.";
    }
    $new_name = time(). "-".basename($file_name);
    $target = "images/".$new_name;
    /*$image_name = $new_name;*/

    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
  }
  

  $userid =mysqli_real_escape_string($conn,$_POST['user_id']);
  $fname =mysqli_real_escape_string($conn,$_POST['f_name']);
  $lname = mysqli_real_escape_string($conn,$_POST['l_name']);
  $user = mysqli_real_escape_string($conn,$_POST['username']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $phone = mysqli_real_escape_string($conn,$_POST['phone']);

  $sql = "UPDATE n_user SET first_name = '{$fname}', last_name = '{$lname}', username = '{$user}', email = '{$email}', phone = '{$phone}', n_user_img = '{$new_name}' WHERE user_id = {$userid}";

    if(mysqli_query($conn,$sql)){
      header("Location: {$hostname} ");
    }
}
?>





  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                <?php
                    include "config.php";
                    $user_id = $_GET['id'];
                    $sql = "SELECT * FROM n_user WHERE user_id = $user_id";
                    $result = mysqli_query($conn, $sql) or die("Query Failed.");
                    if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $row['user_id'];  ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name'];  ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name'];  ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username'];  ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" value="<?php echo $row['email'];  ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Phone No</label>
                          <input type="text" name="phone" class="form-control" value="<?php echo $row['phone'];  ?>" placeholder="" required>
                      </div>
                      <div>
                          <input type="file" name="new-image"><br>
                          <img  src="images/<?php echo $row['n_user_img']; ?>" height="150px">
                          <input type="hidden" name="old_image" value="<?php echo $row['n_user_img']; ?>">
                      </div>
                      <script language="JavaScript" type="text/javascript">
                                      function checkDelete(){
                                              return confirm('Update User..!!! Are you sure?');
                                      }
                      </script><hr>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" onclick='return checkDelete()' required />
                  </form>
              </div>
          </div>
      </div>
      
      <?php 
        }
      }
    ?>
  </div>

<br><br><br><br>

<?php include "footer.php"; ?>
