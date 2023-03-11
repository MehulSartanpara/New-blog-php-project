<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
              <div class="col-md-10">
                  <h1 class="admin-heading"><i class="fa fa-commenting" aria-hidden="true"></i> Received Message</h1>
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

                  if($_SESSION["user_role"] == '1'){
                    /* select query of post table for admin user */
                    $sql = "SELECT * FROM contact ORDER BY cid DESC LIMIT {$offset},{$limit}";
                  }
                  $result = mysqli_query($conn, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Message</th>
                          <th>Email</th>
                          <th>User Name</th>
                          <th>Date</th>
                          <!-- <th colspan="2">Action</th> -->
                      </thead>
                      <tbody>
                        <?php
                        $serial = $offset + 1;
                        while($row = mysqli_fetch_assoc($result)) {?>
                          <tr>
                              <td class='id'><?php echo $serial; ?></td>
                              <td><?php echo $row['message']; ?></td>
                              <td style="text-align: left;"><?php echo $row['email']; ?></td>
                              <td style="text-align: left;"><?php echo $row['name']; ?></td>
                              <td style="text-align: left;"><?php echo $row['cdate']; ?></td>
                              <!-- <td class='edit'><a href='#'><i class='fa fa-edit'></i></a></td> -->
                              <!-- <td class='delete' onclick='return delmess()'><a href='#'><i class='fa fa-trash-o'></i></a></td> -->
                              <!-- <input type="hidden" class="delete_id_value" value="#"> -->
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
                  $sql1 = "SELECT * FROM contact";
                }
                $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if(mysqli_num_rows($result1) > 0){

                  $total_records = mysqli_num_rows($result1);

                  $total_page = ceil($total_records / $limit);

                  echo '<ul class="pagination admin-pagination">';
                  if($page > 1){
                    echo '<li><a href="contact.php?page='.($page - 1).'">Prev</a></li>';
                  }
                  for($i = 1; $i <= $total_page; $i++){
                    if($i == $page){
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    echo '<li class="'.$active.'"><a href="contact.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  if($total_page > $page){
                    echo '<li><a href="contact.php?page='.($page + 1).'">Next</a></li>';
                  }

                  echo '</ul>';
                }
                  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>