<?php
include "config.php";

$comm_id = $_GET['id'];

echo $sql = "UPDATE comments SET status = 1 WHERE comm_id = {$comm_id}";
/*UPDATE `comments` SET `status` = '1' WHERE `comments`.`comm_id` = 12;*/

if(mysqli_query($conn, $sql)){
  header("Location: {$hostname}/admin/comment-approved.php");
}else{
  echo "<p style='color:red;margin: 10px 0;'>Can\'t Approved This Comments.</p>";
}

mysqli_close($conn);

?>