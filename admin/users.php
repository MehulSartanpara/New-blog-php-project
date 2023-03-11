<?php include "header.php";
if($_SESSION["user_role"] == '0'){
  header("Location: {$hostname}/admin/post.php");
}
?>
  <div id="admin-content"> 
      <div class="container">
          <div class="row"> 
              <div class="col-md-10">
                  <h1 class="admin-heading"><i class="fa fa-id-card" aria-hidden="true"></i> All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
                <?php
                  include "config.php"; // database configuration
                  /* Calculate Offset Code */
                  $limit = 4;
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }
                  $offset = ($page - 1) * $limit;
                  /* select query of user table with offset and limit */
                  $sql = "SELECT * FROM user ORDER BY user_id DESC LIMIT {$offset},{$limit}";
                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Profile</th>
                          <!-- <th>Full Name</th> -->
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                          $serial = $offset + 1;
                          while($row = mysqli_fetch_assoc($result)) {
                        ?>
                          <tr>
                              <td class='id'><?php echo $serial; ?></td>
                              <td><a href='profile.php?id=<?php echo $row["user_id"]; ?>'><img id="usertabimg" src="<?php echo "upload/".$row['user_img']; ?>" alt="image"></a></td>
                              <!-- <td><?php echo $row['first_name'] . " ". $row['last_name']; ?></td> -->
                              <td><?php echo $row['username']; ?></td>
                              <td><?php
                                  if($row['role'] == 1){
                                    echo "<p style='font-weight: bold;'>Admin</p>";
                                  }else{
                                    echo "<p>Normal</p>";
                                  }
                               ?></td>
                              <td class='edit'><a href='update-user.php?id=<?php echo $row["user_id"]; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-user.php?id=<?php echo $row["user_id"]; ?>' onclick='return checkDelete()'><i class='fa fa-trash-o'></i></a></td>
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
                $sql1 = "SELECT * FROM user";
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if(mysqli_num_rows($result1) > 0){

                  $total_records = mysqli_num_rows($result1);

                  $total_page = ceil($total_records / $limit);

                  echo '<ul class="pagination admin-pagination">';
                  if($page > 1){
                    echo '<li><a href="users.php?page='.($page - 1).'">Prev</a></li>';
                  }
                  for($i = 1; $i <= $total_page; $i++){
                    if($i == $page){
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    echo '<li class="'.$active.'"><a href="users.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  if($total_page > $page){
                    echo '<li><a href="users.php?page='.($page + 1).'">Next</a></li>';
                  }

                  echo '</ul>';
                }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
<style>
    /*User Page CSS START*/
#usertabimg{
    border: 1px solid #ddd;
    border-radius: 5%;
    padding: 5px;
    min-width: 60px;
    max-width: 60px;
    min-height: 60px;
    max-height: 60px;
    display: block;
    overflow: hidden;
    transition: border .3s;
}
#usertabimg:hover {
    box-shadow: 0 0 2px 1px darkblue;
}
/*User PAge CSS END*/
</style>

