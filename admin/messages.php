<?php

include '../connection.php';
include '../connect.php';
if(isset($_COOKIE['admin_id'])){
   $admin_id = $_COOKIE['admin_id'];
}else{
   $admin_id = '';
   header('location:login.php');
}

if(isset($_POST['delete'])){

   $delete_id = $_POST['delete_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   $verify_delete = $conn->prepare("SELECT * FROM `messages` WHERE id = ?");
   $verify_delete->execute([$delete_id]);

   if($verify_delete->rowCount() > 0){
      $delete_bookings = $conn->prepare("DELETE FROM `messages` WHERE id = ?");
      $delete_bookings->execute([$delete_id]);
      $success_msg[] = 'Message deleted!';
   }else{
      $warning_msg[] = 'Message deleted already!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Messages</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="admin_style.css">

</head>
<body style="background-color:aquamarine;">
   
<!-- header section starts  -->
<?php include 'admin_header.php'; ?>
<!-- header section ends -->

<!-- messages section starts  -->

<section class="grid">

   <h1 class="heading">messages</h1>

   <div class="box-container">

   <?php
   
     $sql1="SELECT * FROM messages";
$res1=mysqli_query($conn1,$sql1);
if($res1){
  $count1=mysqli_num_rows($res1);
  if($count1==0){
   echo '<p class="empty">you have no messages!</p>';;

      }else{
            
            while($fetch_messages=mysqli_fetch_assoc(($res1))){
      

?>
   <!---            -->    
   <div class="box">
      <p>name : <span><?= $fetch_messages['name']; ?></span></p>
      <p>email : <a href="mailto:<?= $fetch_messages['email']; ?>"><?= $fetch_messages['email']; ?></a></p>
      <p>number : <a href="tel:<?= $fetch_messages['number']; ?>"><?= $fetch_messages['number']; ?></a></p>
      <p>message : <span><?= $fetch_messages['message']; ?></span></p>
      <form action="" method="post">
         <input type="hidden" name="delete_id" value="<?= $fetch_messages['id']; ?>">
         <input type="submit" value="delete message" onclick="return confirm('delete this message?');" name="delete" class="delete-btn">
      </form>
   </div>
   <?php
   
      }
   
   }
}
   ?>

   </div>

</section>

<!-- messages section ends -->
















<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="admin_script.js"></script>

<?php include '../message.php'; ?>

</body>
</html>