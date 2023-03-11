<?php include 'head.php'; ?>
<!doctype html> 
<html>

<body>
<div id="wrapper-admin" class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4">
                <?php
                include "config.php";

                $sql = "SELECT * FROM settings";

                $result = mysqli_query($conn, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)) {
                    if($row['logo'] == ""){
                      echo '<h1>'.$row['websitename'].'</h1>';
                    }else{
                      echo '<img src="admin/images/'. $row['logo'] .'" class="logo">';
                    }

                  }
                }
                ?>
                <h3 class="heading">Log in</h3>
                <!-- Form Start -->
                <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="" required>
                    </div>
                    <div>
                        new user ?  <a href="sign-up.php">Sign Up</a>
                    </div><br>
                    <input type="submit" name="login" class="btn btn-primary" value="login" />
                </form>
                <!-- /Form  End -->
             <?php
                      if(isset($_POST['login'])){
                        include "config.php";
                        if(empty($_POST['username']) || empty($_POST['password'])){
                          echo '<div class="alert alert-danger">All Fields must be entered.</div>';
                          die();
                        }else{
                          $username = mysqli_real_escape_string($conn, $_POST['username']);
                          $password = md5($_POST['password']);

                          $sql = "SELECT user_id, username ,n_user_img FROM n_user WHERE username = '{$username}' AND password= '{$password}'";

                          $result = mysqli_query($conn, $sql) or die("Query Failed.");

                          if(mysqli_num_rows($result) > 0){

                            while($row = mysqli_fetch_assoc($result)){
                              session_start();
                              $_SESSION["username"] = $row['username'];
                              $_SESSION["user_id"] = $row['user_id']; 
                              $_SESSION["n_user_img"] = $row['n_user_img'];  
                              header("Location: {$hostname}");
                            }

                          }else{
                          echo '<div class="alert alert-danger">Username and Password are not matched.</div>';
                        }
                      }
                      }
                    ?>  
        </div>
    </div>
</div>
</body>
</html>
