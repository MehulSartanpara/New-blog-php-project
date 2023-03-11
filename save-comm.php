<?php 
    include "config.php";
    session_start();
    $comment = ($_POST['comment']);
    $date = date("d M, Y");
    $post_id = ($_POST['post_id']);
    $n_user_username = $_SESSION['username'];
    $n_user_img = $_SESSION['n_user_img'];


    $sql1 = "INSERT INTO comments (post_id, n_user_username, comment, date, n_user_img)
            VALUES( {$post_id} , '{$n_user_username}' , '{$comment}' , '{$date}' , '{$n_user_img}' )"; 
    if(mysqli_query($conn, $sql1)){
      header("location: {$hostname}");
    }else{
      echo "<div class='alert alert-danger'>Query Failed.</div>";
    }
?>