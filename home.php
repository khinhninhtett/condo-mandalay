<?php  

include 'connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

include 'save_send.php';

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
    <style>
      .Home{
        border-bottom:1px solid #F1E2AD;
      }
      .listings{
         margin-left:90px;
         margin-right:90px
      }
      .location{
         margin-left:20px;
      }
      
   </style>
</head>
<body>
<!-- <header class="header">


         <?php include 'user_header.php'; ?>

 <!-- header section ends --> 
 <div class="home" > 
   <div class="text">
   <h1 class="main" style="color:#F1E2AD;margin-left:120px";>Your Condo Marketplace!</h1><br>
         <!-- <h1 class="main" style="color:##56453E";>A home is a place </h1><br> -->
         <!-- <h1 class="sub" style="color:#F1E2AD";>to start your story!</h1> -->
         <div class="plane">
            <a href="post_property.php" class="post hover-post"><i class="fas fa-paper-plane"></i></a>
         </div>
   </div>
   </div>
   
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
   
<section class="listings">

   <h1 class="heading">latest listings</h1>
   

   <div class="box-container">
      <?php
         $total_images = 0;
         $select_properties = $conn->prepare("SELECT * FROM `property` ORDER BY date DESC LIMIT 6");
         $select_properties->execute();
         if($select_properties->rowCount() > 0){
            while($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)){
               
            $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_user->execute([$fetch_property['user_id']]);
            $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

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

            $select_saved = $conn->prepare("SELECT * FROM `saved` WHERE property_id = ? and user_id = ?");
            $select_saved->execute([$fetch_property['id'], $user_id]);

      ?>
      <form action="" method="POST">
         <div class="box">
            <input type="hidden" name="property_id" value="<?= $fetch_property['id']; ?>">
            <?php
               if($select_saved->rowCount() > 0){
            ?>
            <button type="submit" name="save" class="save"><i class="fas fa-heart"></i><span>saved</span></button>
            <?php
               }else{ 
            ?>
            <button type="submit" name="save" class="save"><i class="far fa-heart"></i><span>save</span></button>
            <?php
               }
            ?>
            <div class="thumb">
               <p class="total-images"><i class="far fa-image"></i><span><?= $total_images; ?></span></p> 
               <img src="uploaded_files/<?= $fetch_property['image_01']; ?>" alt="">
            </div>
            <div class="admin">
               <h3><?= substr($fetch_user['name'], 0, 1); ?></h3>
               <div>
                  <p><?= $fetch_user['name']; ?></p>
                  <span><?= $fetch_property['date']; ?></span>
               </div>
            </div>
         </div>
         <!-- <i class="fas fa-indian-rupee-sign"> -->
         <div class="box">
            <div class="price"><span><?= $fetch_property['price']; ?>&nbsp;<b>MMK</b></span></div>
            <h3 class="name"><?= $fetch_property['property_name']; ?></h3> 
            <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['address']; ?></span></p>
            <div class="flex">
               <p><i class="fas fa-house"></i><span><?= $fetch_property['type']; ?></span></p>
               <p><i class="fas fa-tag"></i><span><?= $fetch_property['offer']; ?></span></p>
               <p><i class="fas fa-bed"></i><span><?= $fetch_property['mbr']; ?> MBR</span></p>
               <p><i class="fas fa-bath"></i><span><?= $fetch_property['bathroom']; ?> bathroom</span></p>
               <p><i class="fas fa-couch"></i><span><?= $fetch_property['furnished']; ?></span></p>
               <p><i class="fas fa-maximize"></i><span><?= $fetch_property['carpet']; ?>sqft</span></p>
            </div>
            <div class="flex-btn">
               <a href="view_property.php?get_id=<?= $fetch_property['id']; ?>" class="btn">view property</a>
               <input type="submit" value="send enquiry" name="send" class="btn">
            </div>
         </div>
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">no properties added yet! <a href="post_property.php" style="margin-top:1.5rem;" class="btn">add new</a></p>';
      }
      ?>
      
   </div>
      
   <div style="margin-top: 2rem; text-align:center;">
      <a href="listings.php" class="inline-btn">view all</a>
   </div>

</section>

<!-- listings section ends -->








<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


<!--custom js file link  -->
<script src="script.js"></script>

<?php include 'message.php'; ?>

<script>

   let range = document.querySelector("#range");
   range.oninput = () =>{
      document.querySelector('#output').innerHTML = range.value;
   }

</script>
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
<script src="script.js"></script>
</body>
</html>