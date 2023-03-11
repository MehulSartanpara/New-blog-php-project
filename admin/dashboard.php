<?php include 'header.php' ?>
<div class="container">
	<h1><i class="fa fa-window-maximize" aria-hidden="true"></i> Dashboard</h1>
	  <div id="row">
	  	<div id="column">
	      <div id="card" style="height: 150px; margin-bottom: 20px;">
	   		<?php 
	   				include "config.php";
            $sql="SELECT post_id FROM post";
            $query=mysqli_query($conn,$sql);
            $row=mysqli_num_rows($query);
        ?>
	      	<a href="post.php" style="color: black;"><h1 id="headingdesh"><i class="fa fa-book fa-fw" aria-hidden="true"></i>Post</h1></a>
	      	<div id="count">
	      			<a href="post.php"><h3 id="forh3"><?php echo $row ?></h3></a>
	      	</div>
	      </div>  
	    </div>
	    <div id="column">
	      <div id="card" style="height: 150px; margin-bottom: 20px;">
	      	<?php 
	   				include "config.php";
            $sql="SELECT category_id FROM category";
            $query=mysqli_query($conn,$sql);
            $row=mysqli_num_rows($query);
        	?>
	        <a href="category.php" style="color: black;"><h1 id="headingdesh"><i class="fa fa-list-alt" aria-hidden="true"></i> Category</h1></a>
	        <div id="count">
	      			<a href="category.php"><h3 id="forh3"><?php echo $row ?></h3></a>
	      	</div>
	      </div>  
	    </div>
	    <div id="column">
	      <div id="card" style="height: 150px; margin-bottom: 20px;">
	      	<?php 
	   		include "config.php";
            $sql="SELECT user_id FROM user";
            $query=mysqli_query($conn,$sql);
            $row=mysqli_num_rows($query);
        	?>
	        <a href="users.php" style="color: black;"><h1 id="headingdesh"><i class="fa fa-user-circle" aria-hidden="true"></i> Users</h1></a>
	        <div id="count">
	      			<a href="users.php"><h3 id="forh3"><?php echo $row ?></h3></a>
	      	</div>
	      </div>  
	    </div>
	    <div id="column">
	      <div id="card" style="height: 150px; margin-bottom: 20px;">
	      	<?php 
	   				include "config.php";
            $sql="SELECT comm_id FROM comments";
            $query=mysqli_query($conn,$sql);
            $row=mysqli_num_rows($query);
        	?>
	        <a href="comment-approved.php" style="color: black;"><h1 id="headingdesh"><i class="fa fa-comments-o" aria-hidden="true"></i> Comment</h1></a>
	        <div id="count">
	      			<a href="comment-approved.php"><h3 id="forh3"><?php echo $row ?></h3></a>
	      	</div>
	      </div>  
	    </div>
	  </div>
</div>
<br><br><br><br><br><br><br><br>
<?php include 'footer.php' ?>

