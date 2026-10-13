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
   <title>Search Page</title>

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
  margin-left:1220px;
  margin-top: 350px;
  position:fixed;
 border-radius: 90%;
 position: right;
padding:15px 20px 15px 20px;

} 
.filters{
   margin-left:150px;
   margin-right:150px;
}
.listings{
   margin-left:150px;
   margin-right:150px;
}
.location{
   margin-left:20px;
}
</style>
<?php include 'user_header.php'; ?>

<!-- search filter section starts  -->

<section class="filters" style="padding-bottom: 0;">

   <form action="" method="post">
      <div id="close-filter"><i class="fas fa-times"></i></div>
      <h3>Filter Your Search</h3>
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
         <div class="flex">
            <div class="box">
               <p style="color:black";>Enter Location</p>
               <input type="text" name="location" required maxlength="50" placeholder="Enter City Name" class="input">
            </div>
            <div class="box">
               <p style="color:black";>Property Type</p>
               <select name="type" class="input" required>
                  <option value="condo">condo</option>
               </select>
            </div>
            <div class="box">
               <p style="color:black";>How Many MBR</p>
               <select name="mbr" class="input" required>
                  <option value="1">1 MBR</option>
                  <option value="2">2 MBR</option>
                  <option value="3">3 MBR</option>
                  <option value="4">4 MBR</option>
                  <option value="5">5 MBR</option>
                  <option value="6">6 MBR</option>
                  <option value="7">7 MBR</option>
                  <option value="8">8 MBR</option>
                  <option value="9">9 MBR</option>
               </select>
            </div>
            <div class="box">
               <p style="color:black";>Minimum Budget</p>
               <select name="min" class="input" required>
                  <option value="5000">5k</option>
                  <option value="10000">10k</option>
                  <option value="15000">15k</option>
                  <option value="20000">20k</option>
                  <option value="30000">30k</option>
                  <option value="40000">40k</option>
                  <option value="40000">40k</option>
                  <option value="50000">50k</option>
                  <option value="100000">1 lac</option>
                  <option value="500000">5 lac</option>
                  <option value="1000000">10 lac</option>
                  <option value="2000000">20 lac</option>
                  <option value="3000000">30 lac</option>
                  <option value="4000000">40 lac</option>
                  <option value="4000000">40 lac</option>
                  <option value="5000000">50 lac</option>
                  <option value="6000000">60 lac</option>
                  <option value="7000000">70 lac</option>
                  <option value="8000000">80 lac</option>
                  <option value="9000000">90 lac</option>
                  <option value="10000000">1 Cr</option>
                  <option value="20000000">2 Cr</option>
                  <option value="30000000">3 Cr</option>
                  <option value="40000000">4 Cr</option>
                  <option value="50000000">5 Cr</option>
                  <option value="60000000">6 Cr</option>
                  <option value="70000000">7 Cr</option>
                  <option value="80000000">8 Cr</option>
                  <option value="90000000">9 Cr</option>
                  <option value="100000000">10 Cr</option>
                  <option value="150000000">15 Cr</option>
                  <option value="200000000">20 Cr</option>
               </select>
            </div>
            <div class="box">
               <p style="color:black";>Maximum Budget</p>
               <select name="max" class="input" required>
                  <option value="5000">5k</option>
                  <option value="10000">10k</option>
                  <option value="15000">15k</option>
                  <option value="20000">20k</option>
                  <option value="30000">30k</option>
                  <option value="40000">40k</option>
                  <option value="40000">40k</option>
                  <option value="50000">50k</option>
                  <option value="100000">1 lac</option>
                  <option value="500000">5 lac</option>
                  <option value="1000000">10 lac</option>
                  <option value="2000000">20 lac</option>
                  <option value="3000000">30 lac</option>
                  <option value="4000000">40 lac</option>
                  <option value="4000000">40 lac</option>
                  <option value="5000000">50 lac</option>
                  <option value="6000000">60 lac</option>
                  <option value="7000000">70 lac</option>
                  <option value="8000000">80 lac</option>
                  <option value="9000000">90 lac</option>
                  <option value="10000000">1 Cr</option>
                  <option value="20000000">2 Cr</option>
                  <option value="30000000">3 Cr</option>
                  <option value="40000000">4 Cr</option>
                  <option value="50000000">5 Cr</option>
                  <option value="60000000">6 Cr</option>
                  <option value="70000000">7 Cr</option>
                  <option value="80000000">8 Cr</option>
                  <option value="90000000">9 Cr</option>
                  <option value="100000000">10 Cr</option>
                  <option value="150000000">15 Cr</option>
                  <option value="200000000">20 Cr</option>
               </select>
            </div>
            <div class="box">
               <p style="color:black";>Furnished</p>
               <select name="furnished" class="input" required>
                  <option value="unfurnished">unfurnished</option>
                  <option value="furnished">furnished</option>
                  <option value="semi-furnished">semi-furnished</option>
               </select>
            </div>
         </div>
         <input type="submit" value="search property" name="filter_search" class="btn">
   </form>

</section>

<!-- search filter section ends -->

<div id="filter-btn" class="fas fa-filter"></div>

<?php
if(isset($_POST['filter_search'])){

   $location = $_POST['location'];
   $location = filter_var($location, FILTER_SANITIZE_STRING);
   $type = $_POST['type'];
   $type = filter_var($type, FILTER_SANITIZE_STRING);
   $MBR = $_POST['mbr'];
   $MBR = filter_var($MBR, FILTER_SANITIZE_STRING);
   $min = $_POST['min'];
   $min = filter_var($min, FILTER_SANITIZE_STRING);
   $max = $_POST['max'];
   $max = filter_var($max, FILTER_SANITIZE_STRING);
   $furnished = $_POST['furnished'];
   $furnished = filter_var($furnished, FILTER_SANITIZE_STRING);

   $select_properties = $conn->prepare("SELECT * FROM `property` WHERE address LIKE '%{$location}%' AND type LIKE '%{$type}%' AND MBR LIKE '%{$MBR}%' AND furnished LIKE '%{$furnished}%' AND price BETWEEN $min AND $max ORDER BY date DESC");
   $select_properties->execute();

}else{
   $select_properties = $conn->prepare("SELECT * FROM `property` ORDER BY date DESC LIMIT 6");
   $select_properties->execute();
}

?>

<!-- listings section starts  -->

<section class="listings">

   <?php 
      if(isset($_POST['filter_search'])){
         echo '<h1 class="heading">search results</h1>';
      }else{
         echo '<h1 class="heading">latest listings</h1>';
      }
   ?>

   <div class="box-container">
      <?php
         $total_images = 0;
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
            <button type="submit" name="save" class="save"><i class="fas fa-heart"></i><span style="color:black";>saved</span></button>
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
         <div class="box">
            <div class="price"><span><?= $fetch_property['price']; ?>&nbsp;<b>MMK</b></span></div>
            <h3 class="name"><?= $fetch_property['property_name']; ?></h3>
            <p class="location"><i class="fas fa-map-marker-alt"></i><span><?= $fetch_property['address']; ?></span></p>
            <div class="flex">
               <p><i class="fas fa-house"></i><span><?= $fetch_property['type']; ?></span></p> 
                <p><i class="fas fa-tag"></i><span><?= $fetch_property['offer']; ?></span></p> 
               <p><i class="fas fa-bed"></i><span><?= $fetch_property['mbr']; ?> MBR</span></p>
               <!-- <p><i class="fas fa-trowel"></i><span></span></p> -->
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
         echo '<p class="empty" style="font-size:30px;color:red;position:center";>no results found!</p>';
      }
      ?>
      
   </div>

</section>

<!-- listings section ends -->











<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>



<!-- custom js file link  -->
<script src="js/script.js"></script>
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
<?php include 'message.php'; ?>

<script>

document.querySelector('#filter-btn').onclick = () =>{
   document.querySelector('.filters').classList.add('active');
}

document.querySelector('#close-filter').onclick = () =>{
   document.querySelector('.filters').classList.remove('active');
}

</script>

</body>
</html>