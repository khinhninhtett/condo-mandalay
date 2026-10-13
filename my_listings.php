<?php  

include 'connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
}

if(isset($_POST['delete'])){

   $delete_id = $_POST['property_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   $verify_delete = $conn->prepare("SELECT * FROM `property` WHERE id = ?");
   $verify_delete->execute([$delete_id]);

   if($verify_delete->rowCount() > 0){
      $select_images = $conn->prepare("SELECT * FROM `property` WHERE id = ?");
      $select_images->execute([$delete_id]);
      while($fetch_images = $select_images->fetch(PDO::FETCH_ASSOC)){
         $image_01 = $fetch_images['image_01'];
         $image_02 = $fetch_images['image_02'];
         $image_03 = $fetch_images['image_03'];
         $image_04 = $fetch_images['image_04'];
         $image_05 = $fetch_images['image_05'];
         unlink('uploaded_files/'.$image_01);
         if(!empty($image_02)){
            unlink('uploaded_files/'.$image_02);
         }
         if(!empty($image_03)){
            unlink('uploaded_files/'.$image_03);
         }
         if(!empty($image_04)){
            unlink('uploaded_files/'.$image_04);
         }
         if(!empty($image_05)){
            unlink('uploaded_files/'.$image_05);
         }
      }
      $delete_saved = $conn->prepare("DELETE FROM `saved` WHERE property_id = ?");
      $delete_saved->execute([$delete_id]);
      $delete_requests = $conn->prepare("DELETE FROM `requests` WHERE property_id = ?");
      $delete_requests->execute([$delete_id]);
      $delete_listing = $conn->prepare("DELETE FROM `property` WHERE id = ?");
      $delete_listing->execute([$delete_id]);
      $success_msg[] = 'listing deleted successfully!';
   }else{
      $warning_msg[] = 'listing deleted already!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>my listings</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
<style>
      .post{
   display: inline-block;
  padding: 1.2rem 2rem;
  font-size: 2.5rem;
  color:black;
  background-color:#56453E; 
  margin-left:1300px;
  margin-top: 400px;
  position:fixed;
 border-radius: 90%;
 position: right;
padding:15px 20px 15px 20px;

} 
      </style>
<?php include 'user_header.php'; ?>

<section class="my-listings">

   <h1 class="heading">my listings</h1>
   <a href="post_property.php" class="post hover-post"><i class="fas fa-paper-plane"></i></a>
   <script>
   document.addEventListener('DOMContentLoaded', function () {
    var hoverDiv = document.querySelector('.hover-post');
    var targetDiv = document.querySelector('.fa-paper-plane');

    hoverDiv.addEventListener('mouseover', function () {
        targetDiv.style.backgroundColor = 'black';
        targetDiv.style.color = 'black';
    });

    hoverDiv.addEventListener('mouseout', function () {
        targetDiv.style.backgroundColor = '#56453E';
        targetDiv.style.color='white';
    });
});

</script>
   <div class="box-container">

   <?php
      $total_images = 0;
      $select_properties = $conn->prepare("SELECT * FROM `property` WHERE user_id = ? ORDER BY date DESC");
      $select_properties->execute([$user_id]);
      if($select_properties->rowCount() > 0){
         while($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)){

         $property_id = $fetch_property['id'];

         if(!empty($fetch_property['image_02'])){
            $image_coutn_02 = 1;
         }else{
            $image_coutn_02 = 0;
         }
         if(!empty($fetch_property['image_03'])){
            $image_coutn_03 = 1;
         }else{
            $image_coutn_03 = 0;
         }
         if(!empty($fetch_property['image_04'])){
            $image_coutn_04 = 1;
         }else{
            $image_coutn_04 = 0;
         }
         if(!empty($fetch_property['image_05'])){
            $image_coutn_05 = 1;
         }else{
            $image_coutn_05 = 0;
         }

         $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);

   ?>
   <form accept="" method="POST" class="box">
      <input type="hidden" name="property_id" value="<?= $property_id; ?>">
      <div class="thumb">
         <p><i class="far fa-image"></i><span><?= $total_images; ?></span></p> 
         <img src="uploaded_files/<?= $fetch_property['image_01']; ?>" alt="">
      </div>
      <div class="price"><i class="fas fa-indian-rupee-sign"></i><span><?= $fetch_property['price']; ?></span></div>
      <!-- <h3 class="name"><?= $fetch_property['property_name']; ?></h3> -->
      <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['address']; ?></span></p>
      <div class="flex-btn">
         <a href="update_property.php?get_id=<?= $property_id; ?>" class="btn">update</a>
         <input type="submit" name="delete" value="delete" class="btn" onclick="return confirm('delete this listing?');">
      </div>
      <a href="view_property.php?get_id=<?= $property_id; ?>" class="btn">view property</a>
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">no properties added yet! <a href="post_property.php" style="margin-top:1.5rem;" class="btn">add new</a></p>';
      }
      ?>

   </div>

</section>








<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- footer section starts -->
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
<script src="js/script.js"></script>

<?php include 'message.php'; ?>

</body>
</html>