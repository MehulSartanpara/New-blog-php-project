<?php
  include "config.php";
 session_start();

  if(!isset($_SESSION["username"])){
   header("Location: {$hostname}/admin/");
  }
  // error_reporting(0);
  ob_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <!--3.3.7 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
        <!-- v4.0 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
        
        <!-- this link for pop model delete
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/style2.css">
        <!-- Summernote CSS - CDN Link -->
            <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <!-- //Summernote CSS - CDN Link -->
        

    </head>
    <body>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->

                    <div class="col-md-2">
                        <?php 
                        
                        if($_SESSION["user_role"] == '1'){ ?>
                            <a href="dashboard.php"><img class="logo" src="images/news.jpg"></a>
                        <?php }else{ ?> 
                            <a href="post.php"><img class="logo" src="images/news.jpg"></a>
                        <?php } ?>
                    </div>
                    <div class="col-md-offset-6 col-md-4">
                        <a href="profile.php?id=<?php echo $_SESSION['user_id']; ?>"><img id="headimg" src="<?php echo "upload/".$_SESSION['user_img']; ?>"></a>
                        <p id="hello-user" >Hello</p>
                        <p id="hello-user" ><?php echo $_SESSION["username"]; ?><br></p>
                        <a href="logout.php" class="admin-logout">logout</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                     
                           <?php

                              if($_SESSION["user_role"] == '1'){
                            ?>
                            <li>
                                <a href="dashboard.php">Dashboard</a>
                            </li>
                            <?php
                              }
                            ?>
                            <li>
                                <a href="post.php">Post</a>
                            </li>
                            <li>
                                <a href="category.php">Category</a>
                            </li>
                             <li>
                                <a href="comment-approved.php">Comments</a>
                            </li>
                            <?php
                              if($_SESSION["user_role"] == '1'){
                            ?>
                            <li>
                                <a href="users.php">Users</a>
                            </li>
                            <li>
                                <a href="visitor-user.php">Register  Users</a>
                            </li>
                             <?php
                              }
                            ?>
                           <?php
                                if($_SESSION["user_role"] == '1'){
                           ?>
                           <li>
                                <a href="message.php">Message</a>
                            </li>
                            <?php
                                }
                            ?>
                            <?php
                              if($_SESSION["user_role"] == '1'){
                            ?>
                            <li>
                                <a href="settings.php">Settings</a>
                            </li>
                            <?php
                              }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->

