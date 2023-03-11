<?php include 'header.php' ?>
<?php  
  
    include "config.php";

    if(isset($_POST['sendmessage']))
    {
      $name =mysqli_real_escape_string($conn,$_POST['name']);
      $email  =mysqli_real_escape_string($conn,$_POST['email']);
      $message =mysqli_real_escape_string($conn,$_POST['message']);
      $date = date("d M, Y");
      $sql = "INSERT INTO contact (name,email,message,cdate) 
            VALUES ('{$name}','{$email}','{$message}','{$date}')";

        if(mysqli_query($conn,$sql)){ 
          header("Location: {$hostname}/contact.php");
        }else{
          echo "Message Not Send Something wen't Wrong";
        }
    }

?> 
    <div id="con-div">
      <div class="row" id="con-row">
        <div class="col-md-6 mr-auto">
          <h1><b>About</b></h1>
          <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quaerat autem corrupti asperiores accusantium et fuga! Facere excepturi, quo eos, nobis doloremque dolor labore expedita illum iusto, aut repellat fuga!</p><br>

          <ul class="list-unstyled pl-md-5 mb-5">
            <li class="d-flex text-black mb-2">
              <span class="mr-3"><span class="icon-map"></span></span><i class="fa fa-building-o" ></i> 401 Pramukh Darshan, Surat, <br> Gujarat <br> India
            </li>
            <li class="d-flex text-black mb-2"><span class="mr-3"><span class="icon-phone"></span></span><i class="fa fa-phone" aria-hidden="true"></i> +91 7405745891</li>
            <li class="d-flex text-black"><span class="mr-3"><span class="icon-envelope-o"></span></span><i class="fa fa-envelope" aria-hidden="true"></i>  mehulsartanpara@gmail.com </li>
          </ul>
        </div>

        <div class="col-md-6">
          <form class="mb-5" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" style="background-color: lightgreen;">
          <b>Conact with us</b><hr>
          <div class="row">
              <div class="col-md-12 form-group">
                <label for="name" class="col-form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Your Name">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 form-group">
                <label for="email" class="col-form-label">Email</label>
                <input type="text" class="form-control" name="email" placeholder="example@email.com" >
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 form-group">
                <label for="message" class="col-form-label">Message</label>
                <textarea class="form-control" name="message" placeholder="Write Message here.." cols="30" rows="5"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <input type="submit" name="sendmessage" value="Send Message" class="btn btn-primary ">
                <!-- <span class="submitting"></span> -->
              </div>
            </div>
          </form>
         </div>
      </div>
  </div>

  <style>
    #con-div{

      margin-top: 3%;
      margin-bottom: 5%;
    }
    #con-row{
      background-color: white;
      padding: 25px;
      width: 800px; 
      margin-left: 21%; 
      box-shadow: 0 4px 5px rgba(0.5,0.5,0.5,0.5);
    }
  </style>
 <?php include 'footer.php' ?>