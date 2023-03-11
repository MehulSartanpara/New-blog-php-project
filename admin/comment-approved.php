<?php include "header.php";
/*if($_SESSION["user_role"] == '0'){
header("Location: {$hostname}/admin/post.php");
}*/
?>
  <div id="admin-content">
      <div class="container">
          <div class="row"> 
              <div class="col-md-10">
                  <h1 class="admin-heading"><i class="fa fa-comments-o" aria-hidden="true"></i> Listed Comments</h1>
              </div>
              <div class="col-md-2">
                  <?php 
                      $sqlm="SELECT status FROM comments WHERE status = 0";
                      $querym=mysqli_query($conn,$sqlm);
                      $rowm=mysqli_num_rows($querym);
                  ?>
                  <a class="add-new" href="comment-pending.php">Pending Com..
                    <sup style="font-size: 17px; color: yellow;"><?php echo $rowm ?></sup>
                  </a>
              </div>
              <div class="col-md-12">
                <?php
                  include "config.php"; // database configuration
                  /* Calculate Offset Code */
                  $limit = 5;
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }
                  $offset = ($page - 1) * $limit;
                  /* select query of user table with offset and limit */
                  $sql = "SELECT * FROM comments WHERE status = 1 ORDER BY comm_id DESC LIMIT {$offset},{$limit}";
                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Comment's</th>
                          <th>User Name</th>
                          <th>Posting Date</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                          $serial = $offset + 1;
                          while($row = mysqli_fetch_assoc($result)) {
                        ?>
                          <tr>
                              <td class='id'><?php echo $serial; ?></td>
                              <td style="text-align: left;"><?php echo $row['comment']; ?></td>
                              <td><?php echo $row['n_user_username']; ?></td>
                              <td><?php echo $row['date']; ?></td>
                              
                              <td class='delete'><a href='comm-delete.php?id=<?php echo $row["comm_id"]; ?>' onclick='return delcom()'><i class='fa fa-trash-o'></i></a></td>
                          </tr> 
                        <?php
                          $serial++;
                        } ?>
                      </tbody>
                  </table>
                  <?php
                }else {
                  echo "<h3>No Results Found.</h3>";
                }
                // show pagination
                $sql1 = "SELECT * FROM comments";
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if(mysqli_num_rows($result1) > 0){

                  $total_records = mysqli_num_rows($result1);

                  $total_page = ceil($total_records / $limit);

                  echo '<ul class="pagination admin-pagination">';
                  if($page > 1){
                    echo '<li><a href="comment-approved.php?page='.($page - 1).'">Prev</a></li>';
                  }
                  for($i = 1; $i <= $total_page; $i++){
                    if($i == $page){
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    echo '<li class="'.$active.'"><a href="comment-approved.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  if($total_page > $page){
                    echo '<li><a href="comment-approved.php?page='.($page + 1).'">Next</a></li>';
                  }

                  echo '</ul>';
                }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>


