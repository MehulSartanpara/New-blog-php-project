<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
            <?php if($_SESSION["user_role"] == '1'){ ?>
              <div class="col-md-8">
                  <h1 class="admin-heading"><i class="fa fa-book fa-fw" aria-hidden="true"></i>All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="only-my-post.php">Check my post</a>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
            <?php } ?>
            <?php if($_SESSION["user_role"] == '0'){ ?>
              <div class="col-md-10">
                  <h1 class="admin-heading"><i class="fa fa-book fa-fw" aria-hidden="true"></i>All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
            <?php } ?>
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

                  if($_SESSION["user_role"] == '1'){
                    /* select query of post table for admin user */
                    $sql = "SELECT post.post_id, post.title, post.description,post.post_date,
                    category.category_name,user.username,post.category FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.user_id
                    ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
                  }elseif($_SESSION["user_role"] == '0'){
                    /* select query of post table for normal user */
                    $sql = "SELECT post.post_id, post.title, post.description,post.post_date,
                    category.category_name,user.username,post.category FROM post
                    LEFT JOIN category ON post.category = category.category_id
                    LEFT JOIN user ON post.author = user.user_id
                    WHERE post.author = {$_SESSION['user_id']}
                    ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
                  }

                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          
                      </thead>
                      <tbody>
                        <?php
                        $serial = $offset + 1;
                        while($row = mysqli_fetch_assoc($result)) {?>
                          <tr>
                              <td class='id'><?php echo $serial; ?></td>
                              <td><?php echo $row['title']; ?></td>
                              <td><?php echo $row['category_name']; ?></td>
                              <td><?php echo $row['post_date']; ?></td>
                              <td><?php echo $row['username']; ?></td>
                              <td class='edit'><a href='update-post.php?id=<?php echo $row['post_id']; ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete' onclick='return delpost()'><a href='delete-post.php?id=<?php echo $row['post_id']; ?>&catid=<?php echo $row['category']; ?>'><i class='fa fa-trash-o'></i></a></td>
                              <input type="hidden" class="delete_id_value" value="<?php echo $row['post_id']; ?>&catid=<?php echo $row['category']; ?>">
                              <!-- <td><a href="JavaScript:void(0)" class="delete_btn_ajax btn btn-danger">Con Delete</a></td> -->
                              <!-- <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                  Delete
                                </button>
                              </td> -->
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
                if($_SESSION["user_role"] == '1'){
                  /* select query of post table for admin user */
                  $sql1 = "SELECT * FROM post";
                }elseif($_SESSION["user_role"] == '0'){
                  /* select query of post table for normal user */
                  $sql1 = "SELECT * FROM post
                  WHERE author = {$_SESSION['user_id']}";
                }
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if(mysqli_num_rows($result1) > 0){

                  $total_records = mysqli_num_rows($result1);

                  $total_page = ceil($total_records / $limit);

                  echo '<ul class="pagination admin-pagination">';
                  if($page > 1){
                    echo '<li><a href="post.php?page='.($page - 1).'">Prev</a></li>';
                  }
                  for($i = 1; $i <= $total_page; $i++){
                    if($i == $page){
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    echo '<li class="'.$active.'"><a href="post.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  if($total_page > $page){
                    echo '<li><a href="post.php?page='.($page + 1).'">Next</a></li>';
                  }

                  echo '</ul>';
                }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>

<!-- 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle" style="color: red;">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are Your Sure You want to Delete User ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 -->