<?php

include 'connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING); 
    $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING); 

   $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
   $select_users->execute([$email, $pass]);
   $row = $select_users->fetch(PDO::FETCH_ASSOC);

   if($select_users->rowCount() > 0){
      setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
      header('location:home.php');
   }else{
      $warning_msg[] = 'Incorrect username or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <?php include 'user_header.php'; ?>
<!-- login section starts  -->

<section class="form-container">

    <form action="" method="post">
       <h3>welcome back!</h3>
       <input type="email" name="email" required maxlength="50" placeholder="Please Enter Your Email" class="box">
       <input type="password" name="pass" required maxlength="20" placeholder="Please Enter Your Password" class="box">
       <p>Don't have an account? <a href="register.php">register new</a></p>
       <input type="submit" value="login now" name="submit" class="btn">
    </form>
 
 </section>
 
 <!-- login section ends -->
 <!-- footer section starts  -->

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
          <a href="https://www.instagram.com/your_priority_23?igsh=MXBrNjlvNmpkajN6Yw=="><span>instagram</span><i class="fab fa-instagram"></i></a>
 
       </div>
 
    </section>
 
    <div class="credit">&copy; copyright <span>3CS</span> we all rights reserved!</div>
 
 </footer>
 
 <!-- footer section ends -->
 
 
 <!-- custom js file link  -->
 <script src="script.js"></script>
 
 </body>
 </html>