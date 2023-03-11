<?php include "header.php"; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div id="containerr">  
  <?php
    include "config.php";
    $user_id = $_GET['id'];
    $sql = "SELECT * FROM n_user WHERE user_id = {$user_id}";
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
  ?>
    <div class="product-details">
      <input type="hidden" name="user_id" value="<?php echo $row['user_id'];  ?>" placeholder="" >
      <h1><?php echo $row['first_name'] . " ". $row['last_name']; ?></h1>
      <span class="hint-star star">
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star-o" aria-hidden="true"></i>
      </span>
      <div>
        <a href='edit-n-user.php?id=<?php echo $row["user_id"]; ?>'><button class="btn btn-primary" style="margin-top: 10px;">Update</button></a>
      </div>
    </div>
    
  <div class="product-image">
    
    <img src="images/<?php echo $row['n_user_img']; ?>" alt="Profile" >
  <div class="info">
    <h2> Description</h2>
    <ul>
      <li><strong>&nbsp Name : </strong><?php echo $row['first_name'] . " ". $row['last_name']; ?></li>
      <li><strong>&nbsp User Name : </strong><?php echo $row['username'];  ?></li>
      <li><strong>&nbsp Phone : </strong><?php echo $row['phone'];  ?></li>
      <li><strong>&nbsp Email : </strong><?php echo $row['email'];  ?></li>
    </ul>
  </div>
</div>
<?php 
    }
  }
?>
</div>
<?php include "footer.php"; ?> 

<style>
  /*Profile CSS START*/
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bree+Serif&family=EB+Garamond:ital,wght@0,500;1,800&display=swap');

#containerr{
  box-shadow: 0 15px 30px 1px grey;
  background: rgba(255, 255, 255, 0.90);
  text-align: center;
  border-radius: 5px;
  overflow: hidden;
  margin: 5em auto;
  height: 300px;
  width: 700px;
  margin-bottom: 10%;
  
  
}

.product-details {
  position: relative;
  text-align: left;
  overflow: hidden;
  padding: 30px;
  height: 100%;
  float: left;
  width: 40%;

}

#containerr .product-details h1{
  font-family: 'Bebas Neue', cursive;
  display: inline-block;
  position: relative;
  font-size: 30px;
  color: #344055;
  margin: 0;
  
}

#containerr .product-details h1:before{
  position: absolute;
  content: '';
  right: 0%; 
  top: 0%;
  transform: translate(25px, -15px);
  font-family: 'Bree Serif', serif;
  display: inline-block;
  background: #ffe6e6;
  border-radius: 5px;
  font-size: 14px;
  padding: 5px;
  color: white;
  margin: 0;
  animation: chan-sh 6s ease infinite;

}

.hint-star {
  display: inline-block;
  margin-left: 0.5em;
  color: gold;
  width: 50%;
}


#containerr .product-details > p {
font-family: 'EB Garamond', serif;
  text-align: center;
  font-size: 18px;
  color: #7d7d7d;
  
}
.control{
  position: absolute;
  bottom: 20%;
  left: 22.8%;
  
}



.product-image {
  transition: all 0.3s ease-out;
  display: inline-block;
  position: relative;
  overflow: hidden;
  height: 100%;
  float: right;
  width: 45%;
  display: inline-block;
}

#containerr img {width: 100%;height: 100%;}

.info {
    background: rgba(27, 26, 26, 0.9);
    font-family: 'Bree Serif', serif;
    transition: all 0.3s ease-out;
    transform: translateX(-100%);
    position: absolute;
    line-height: 1.8;
    text-align: left;
    font-size: 120%;
    cursor: no-drop;
    color: #FFF;
    height: 100%;
    width: 100%;
    left: 0;
    top: 0;
}

.info h2 {text-align: center}
.product-image:hover .info{transform: translateX(0);}

.info ul li{transition: 0.3s ease;}
.info ul li:hover{transform: translateX(50px) scale(1.3);}

.product-image:hover img {transition: all 0.3s ease-out;}
.product-image:hover img {transform: scale(1.2, 1.2);}
/*Profile CSS END*/
</style>

