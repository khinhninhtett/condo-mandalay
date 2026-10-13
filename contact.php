<?php  

include 'connect.php';
include 'connection.php';
if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}


if($_SERVER['REQUEST_METHOD']=='POST'){
    //$id = create_unique_id();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

          $sql= "INSERT INTO messages ( name,email,number,message) VALUES ( '$name', '$email','$number','$message')";
          $res=mysqli_query($conn1,$sql);
          if($res){
             $success_msg[] = 'message send successfully!';
           
          } else {
            $error_msg[] = 'message send fail!';
          }
       }
    

 


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
            <link rel="stylesheet" href="stylechan.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

            <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,200&display=swap" rel="stylesheet">
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      
                  <meta charset="UTF-8">
                  <meta http-equiv="X-UA-Compatible" content="IE=edge">
                  <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  <title>Home</title>
                  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
                  <link rel="stylesheet" href="style.css">      
   
</head>
<body>
<style>
      .Contact{
        border-bottom:1px solid #F1E2AD;
      }

   </style>
<?php include 'user_header.php'; ?>


<section class="sub-header">
                  
                  <h1>Contact Us</h1>

            </section>

            <!--  Contact Us -->
            <section class="location">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3704.7270022976354!2d96.11191747510307!3d21.79082428005613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30cb75ab46393931%3A0xd7a9c58f0f5cfaef!2sUniversity%20of%20Computer%20Studies%2C%20Mandalay%20(Ta-Ohn)!5e0!3m2!1sen!2smm!4v1708518424322!5m2!1sen!2smm" width="600" height="450" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </section>
            <section class="contact-us">
                  <div class="row">
                        <div class="contact-col">
                              <div>
                                    <i class="fa fa-home"></i>
                                    <span>
                                          <h5>Mandalay city</h5>
                                          <p>  </p>        
                                    </span>
                              </div>
                              <div>
                                    <i class="fa fa-phone"></i>
                                    <span>
                                          <h5>+95 9775784683</h5>
                                          <p>Monday to Saturday, 10 AM to 6PM</p>        
                                    </span>
                              </div>
                              <div>
                                    <i class="fa fa-envelope-o"></i>
                                    <span>
                                          <h5>khinhninhtet447@gmail.com</h5>
                                          <p>Email Us Your Query</p>        
                                    </span>
                              </div>
                        </div>
                        <div class="contact-col">
                              <form action="" method="post">
                                    <input type="text" name="name"  placeholder="Enter Your Name" required>
                                    <input type="email" name="email" required placeholder="enter your email">
                                    <input type="number" name="number" required maxlength="10" max="9999999999" min="0" placeholder="enter your number" >
                                    <textarea name="message" placeholder="enter your message" maxlength="1000" cols="30" rows="10" required></textarea>
                                    <button type="submit" class="hero-btn red-btn">Send Message</button>
                                  
                              </form>
                        </div>
                  </div>
            </section>
<footer class="footer">

<section class="flex">

   <div class="box">
      <a href="tel:1234567890"><i class="fas fa-phone"></i><span>775784683</span></a>
      <a href="tel:1112223333"><i class="fas fa-phone"></i><span>694179176</span></a>
      <a href="mailto:khinhninhtet447@gmail.com"><i class="fas fa-envelope"></i><span>khinhninhtet447@gmail.com</span></a>
      <a href="#"><i class="fas fa-map-marker-alt"></i><span>UCS(Mdy)</span></a>
   </div>

   <div class="box">
      <a href="home.php"><span>home</span></a>
      <a href="about.php"><span>about</span></a>
      <a href="contact.php"><span>contact</span></a>
      <a href="listings.php"><span>all listings</span></a>
      <a href="saved.php"><span>saved properties</span></a>
   </div>

   <div class="box">
      <a href="https://www.facebook.com/khin.hninhtet.315428"><span>facebook</span><i class="fab fa-facebook-f"></i></a>
      <a href="https://invite.viber.com/?g2=AQAjo1ZPLHvG81Jb%2BCAhmX8zdZieILUPYAj1DccPbwkqNu2X6Y%2FhSC2KwqeUgVpB"><span>viber</span><i class="fab fa-viber"></i></a>
      <a href="https://t.me/KhinHnin21"><span>telegram</span><i class="fab fa-telegram"></i></a>
      <!--<span>telegram</span><i class="fa-brands fa-telegram"></i></a>-->
      <a href="https://www.instagram.com/your_priority_23?igsh=MXBrNjlvNmpkajN6Yw=="><span>instagram</span><i class="fab fa-instagram"></i></a>

   </div>

</section>

<div class="credit">&copy; copyright <span>3CS</span> we all rights reserved!</div>

</footer>

<!-- footer section ends -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>




<script src="js/script.js"></script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
<?php

if(isset($success_msg)){
   foreach($success_msg as $success_msg){
      echo '<script>swal("'.$success_msg.'", "" ,"success");</script>';
   }
}

if(isset($warning_msg)){
   foreach($warning_msg as $warning_msg){
      echo '<script>swal("'.$warning_msg.'", "" ,"warning");</script>';
   }
}

if(isset($info_msg)){
   foreach($info_msg as $success_msg){
      echo '<script>swal("'.$info_msg.'", "" ,"info");</script>';
   }
}

if(isset($error_msg)){
   foreach($error_msg as $error_msg){
      echo '<script>swal("'.$error_msg.'", "" ,"error");</script>';
   }
}

?>