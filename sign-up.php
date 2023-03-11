<?php include "head.php"; ?>
<?php  
  
    include "config.php";

    if(isset($_POST['save']))
    {
      if(isset($_FILES['fileToUpload'])){
      $errors = array(); 

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
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

    if(empty($errors) == true){
      move_uploaded_file($file_tmp,$target);
    }else{
      print_r($errors);
      die();
    }
    }

      $fname =mysqli_real_escape_string($conn,$_POST['fname']);
      $lname =mysqli_real_escape_string($conn,$_POST['lname']);
      $user  =mysqli_real_escape_string($conn,$_POST['user']);
      $email  =mysqli_real_escape_string($conn,$_POST['email']);
      $phone  =mysqli_real_escape_string($conn,$_POST['phone']);
      $password =mysqli_real_escape_string($conn,md5($_POST['password']));

      $sql = "SELECT username FROM n_user WHERE username = '{$user}'";
      $result=mysqli_query($conn,$sql);

      if(mysqli_num_rows($result) > 0)
      {
        echo "User name are alredy exist Please Choose Diffrent User Name";
      }else{
        $sql1 = "INSERT INTO n_user (first_name,last_name,username,email,phone,password,n_user_img) 
                VALUES ('{$fname}','{$lname}','{$user}','{$email}','{$phone}','{$password}','{$new_name}')";

            if(mysqli_query($conn,$sql1))
            {
              header("Location: {$hostname}");
            }else{
              echo "There Are some Problem Can't Inserted User....!!!";
            }
      }
    }

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Sign Up</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF'] ?>" method ="POST" autocomplete="off" enctype="multipart/form-data">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Email</label>
                          <input type="text" name="email" class="form-control" placeholder="Email" required>
                      </div>

                      <div class="form-group">
                          <label>Phone No</label>
                          <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Profile Photo</label>
                          <input type="file" name="fileToUpload" required>
                      </div>
                       <div>
                        Have Account ?  <a href="log-in.php">Log in</a>
                    </div><br>
                      <input type="submit"  name="save" class="btn btn-primary" value="Sing Up" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
