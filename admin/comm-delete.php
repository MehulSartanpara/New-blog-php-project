<?php
include "config.php";

$comm_id = $_GET['id'];

$sql = "DELETE FROM comments WHERE comm_id = {$comm_id}";

if(mysqli_query($conn, $sql)){
  header("Location: {$hostname}/admin/comment-approved.php");
}else{
  echo "<p style='color:red;margin: 10px 0;'>Can\'t Delete the Comment.</p>";
}

mysqli_close($conn);

?> 
