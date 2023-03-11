<?php include "header.php"; ?>

<div class="container">
<h2><i class="fa fa-id-card" aria-hidden="true"></i> Register  User</h2>
<?php
    /*include "config.php";
    /* Calculate Offset Code */
    /*$limit = 4;
    if(isset($_GET['page'])){
      $page = $_GET['page'];
    }else{
      $page = 1;
    }
    $offset = ($page - 1) * $limit;*/
    $sql = "SELECT * FROM n_user ORDER BY user_id DESC "; /*LIMIT {$offset},{$limit}*/
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
  ?>
  <div id="rowvis">

    <div id="columnvis">
      <div id="cardvis" style="height: 380px; margin-bottom: 20px;">
        <hr style="border: 10px solid #1E90FF; margin-top: -16px; margin-left: -16px; border-bottom-right-radius: 20px ; ">
        <!-- src="images/<?php echo $row['n_user_img']; ?>" -->
        <!-- <?php echo 'images/' . $row['n_user_img']; ?> --> 
        <img src="/news-web/images/<?php echo $row['n_user_img']; ?>" alt="profil" id="img-fix-vis"><hr>
        <h3><?php echo $row['first_name'] . " ". $row['last_name']; ?></h3>
        <p id="title-vis"><?php echo $row['username'];  ?></p>
        <p><?php echo $row['email'];  ?></p>
        <p><a id="link-vis" href="/news-web/delete-n-user.php?id=<?php echo $row["user_id"]; ?>" onclick='return checkDelete()'><button id="button-vis">Remove user</button></p></a>
      </div>  
    </div>

    <?php }} 

      // show pagination
      /*$sql1 = "SELECT * FROM n_user";
      $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

      if(mysqli_num_rows($result1) > 0){

        $total_records = mysqli_num_rows($result1);

        $total_page = ceil($total_records / $limit);

        echo '<ul class="pagination admin-pagination" >';
        if($page > 1){
          echo '<li><a href="visitor-user.php?page='.($page - 1).'">Prev</a></li>';
        }
        for($i = 1; $i <= $total_page; $i++){
          if($i == $page){
            $active = "active";
          }else{
            $active = "";
          }
          echo '<li class="'.$active.'"><a href="visitor-user.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($total_page > $page){
          echo '<li><a href="visitor-user.php?page='.($page + 1).'">Next</a></li>';
        }

        echo '</ul>';
      }*/
    ?>
  </div>
</div>


<style>
/*Vsitor-user-page CSS START*/

/* Float four columns side by side */
#columnvis {
  float: left;
  width: 285px;
  padding: 0 10px;
  margin-top: 20px;
}


/* Clear floats after the columns */
#rowvis:after {
  content: "";
  display: table;
  clear: both;
}



/* Style the counter cards */
#cardvis {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #fff;
}


#title-vis {
  color: grey;
  font-size: 18px;
}

#button-vis {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 5px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 80%;
  font-size: 18px;
}

#link-vis{
  text-decoration: none;
  font-size: 22px;
  color: black;
}

#button-vis:hover, a:hover {
  opacity: 0.7;
}

#img-fix-vis{
    display: block;
    max-width:150px;
    max-height:150px;
    width: auto;
    height: auto;
    margin-left: 48px;
}
/*Visistor-user-page CSS END*/


</style>

<script language="JavaScript" type="text/javascript">
                                      
      function checkDelete(){
          return confirm('Delete User..!!! Are you sure?');
        }
</script> 
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php /*include "footer.php"*/ ?>