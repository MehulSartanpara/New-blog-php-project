<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                      <?php
                        include "config.php";  

                        $post_id = $_GET['id'];

                        $sql = "SELECT post.post_id, post.title, post.description,post.post_date,post.author,
                        category.category_name,user.username,post.category,post.post_img FROM post
                        LEFT JOIN category ON post.category = category.category_id
                        LEFT JOIN user ON post.author = user.user_id
                        WHERE post.post_id = {$post_id}";

                        $result = mysqli_query($conn, $sql) or die("Query Failed.");
                        if(mysqli_num_rows($result) > 0){
                          while($row = mysqli_fetch_assoc($result)) {
                      ?>
                        <div class="post-content single-post">
                            <h3><?php echo $row['title']; ?></h3>
                            <div class="post-information"> 
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <a href='category.php?cid=<?php echo $row['category']; ?>'><?php echo $row['category_name']; ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php?aid=<?php echo $row['author']; ?>'><?php echo $row['username']; ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['post_date']; ?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/>
                            <p class="description">
                                <?php echo $row['description']; ?>
                            </p>
                        </div>
                        <?php
                          }
                        }else{
                          echo "<h2>No Record Found.</h2>";
                        }

                        ?>
                    </div>
                    <!-- /post-container -->
                    
                    <!-- Comments Section -->
                    <div class="container" id="main-content" style="width: 1145px;">
                    <div class="row bootstrap snippets bootdeys">
                        <div class="col-md-8 col-sm-12">
                            <div class="comment-wrapper">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Comment panel
                                    </div>
                                    <?php
                                        if(isset($_SESSION["username"])){
                                    ?>
                                    <form action="save-comm.php" method="POST" enctype="multipart/form-data" style="background-color: #fff;"> 

                                    <div class="panel-body">
                                        <?php 
                                            $sql11 = "SELECT post_id FROM post WHERE post_id = {$post_id}";

                                            $result11 = mysqli_query($conn, $sql11) or die("Query Failed.");
                                            if(mysqli_num_rows($result11) > 0){
                                            while($row = mysqli_fetch_assoc($result11)) {
                                        ?>
                                        <input type="hidden" name="post_id" value="<?php echo $row['post_id']; ?>">
                                        <?php
                                          }
                                        }
                                         ?>
                                        <textarea class="form-control" placeholder="write a comment..." rows="3" name="comment"></textarea> 
                                        <br> 
                                        <input type="submit" class="btn btn-primary pull-right" onclick='return GoingtoApproved()'>
                                        <div class="clearfix"></div>
                                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                                        </form>
                                        <?php 
                                            $sql2 = "SELECT * FROM comments WHERE post_id = {$post_id} AND status = 1 ORDER BY comm_id DESC";

                                            $result2 = mysqli_query($conn, $sql2) or die("Query Failed.");
                                            if(mysqli_num_rows($result2) > 0){
                                            while($row = mysqli_fetch_assoc($result2)) {
                                        ?>
                                        <ul class="media-list">
                                            <li class="media">
                                                <span class="pull-left">
                                                    <img src="<?php echo 'images/' . $row['n_user_img']; ?>" alt="" class="img-circle" id="img-circle"> 
                                                </span>
                                                <div class="media-body">
                                                    <span class="text-muted pull-right">
                                                        <small class="text-muted"><?php echo $row['date']; ?></small>
                                                    </span>
                                                    <strong class="text-success">@<?php echo $row['n_user_username']; ?></strong>
                                                    <p>
                                                        <?php echo $row['comment']; ?>
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                        <hr>
                                        <?php 
                                            }
                                        }
                                        ?>
                                    </div>
                                    <?php
                                        }else{
                                            echo "<h4 style='text-align: center; color: red;'>You have to login First</h4>";
                                        } 
                                    ?>   
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- /Comments section -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
<style>

     #img-circle{
        border: 1px solid #ddd;
        border-radius: 50%;
        width: 50px;
        box-shadow: 0 0 2px 1px white;
    }
    

</style>
<script>

    function GoingtoApproved(){
        return confirm("Your Comment Display After Verify.");
      } 
</script>