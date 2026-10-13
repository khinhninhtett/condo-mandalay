<?php

include 'connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['submit'])){

   $id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING); 
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING); 
   $c_pass = sha1($_POST['c_pass']);
   $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);   

   $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
   $select_users->execute([$email]);

   if($select_users->rowCount() > 0){
      $warning_msg[] = 'email already taken!';
   }else{
      if($pass != $c_pass){
         $warning_msg[] = 'Password not matched!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(id, name, number, email, password) VALUES(?,?,?,?,?)");
         $insert_user->execute([$id, $name, $number, $email, $c_pass]);
         
         if($insert_user){
            $verify_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
            $verify_users->execute([$email, $pass]);
            $row = $verify_users->fetch(PDO::FETCH_ASSOC);
         
            if($verify_users->rowCount() > 0){
               setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
               header('location:home.php');
            }else{
               $error_msg[] = 'something went wrong!';
            }
         }

      }
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
<?php include 'user_header.php';?>

<!-- register section starts  -->

<section class="form-container">

    <form action="" method="post">
       <h3>create an account!</h3>
       <input type="tel" name="name" required maxlength="50" placeholder=" Please Enter Your Name" class="box">
       <input type="email" name="email" required maxlength="50" placeholder="Please Enter Your Email" class="box">
       <input type="number" name="number" required maxlength="11" placeholder="Please Enter Your Phone Number" class="box">
       <input type="password" name="pass" required maxlength="20" placeholder="Please Enter Your Password" class="box">
       <input type="password" name="c_pass" required maxlength="20" placeholder="Confirm Your Password" class="box">
       <p>Already have an account? <a href="login.php">register now</a></p>
       <input type="submit" value="register now" name="submit" class="btn">
    </form>
 
 </section>
 
 <!-- register section ends -->


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
          <!--<span>telegram</span><i class="fa-brands fa-telegram"></i></a>-->
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