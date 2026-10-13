<?php  

include 'connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
}

if(isset($_POST['post'])){

   $id = create_unique_id();
   $property_name = $_POST['property_name'];
   $property_name = filter_var($property_name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $address = $_POST['address'];
   $address = filter_var($address, FILTER_SANITIZE_STRING);
   $offer = $_POST['offer'];
   $offer = filter_var($offer, FILTER_SANITIZE_STRING);
   $type = $_POST['type'];
   $type = filter_var($type, FILTER_SANITIZE_STRING);
   $furnished = $_POST['furnished'];
   $furnished = filter_var($furnished, FILTER_SANITIZE_STRING);
   $mbr = $_POST['mbr'];
   $mbr = filter_var($mbr, FILTER_SANITIZE_STRING);
   $sbr = $_POST['sbr'];
   $sbr = filter_var($sbr, FILTER_SANITIZE_STRING);
   $bathroom = $_POST['bathroom'];
   $bathroom = filter_var($bathroom, FILTER_SANITIZE_STRING);
   $carpet = $_POST['carpet'];
   $carpet = filter_var($carpet, FILTER_SANITIZE_STRING); 
   $age = $_POST['age'];
   $age = filter_var($age, FILTER_SANITIZE_STRING);
   $description = $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);

   if(isset($_POST['lift'])){
      $lift = $_POST['lift'];
      $lift = filter_var($lift, FILTER_SANITIZE_STRING);
   }else{
      $lift = 'no';
   }
   if(isset($_POST['security_guard'])){
      $security_guard = $_POST['security_guard'];
      $security_guard = filter_var($security_guard, FILTER_SANITIZE_STRING);
   }else{
      $security_guard = 'no';
   }
   if(isset($_POST['play_ground'])){
      $play_ground = $_POST['play_ground'];
      $play_ground = filter_var($play_ground, FILTER_SANITIZE_STRING);
   }else{
      $play_ground = 'no';
   }
   if(isset($_POST['garden'])){
      $garden = $_POST['garden'];
      $garden = filter_var($garden, FILTER_SANITIZE_STRING);
   }else{
      $garden = 'no';
   }
   if(isset($_POST['water_supply'])){
      $water_supply = $_POST['water_supply'];
      $water_supply = filter_var($water_supply, FILTER_SANITIZE_STRING);
   }else{
      $water_supply = 'no';
   }
   if(isset($_POST['power_backup'])){
      $power_backup = $_POST['power_backup'];
      $power_backup = filter_var($power_backup, FILTER_SANITIZE_STRING);
   }else{
      $power_backup = 'no';
   }
   if(isset($_POST['parking_area'])){
      $parking_area = $_POST['parking_area'];
      $parking_area = filter_var($parking_area, FILTER_SANITIZE_STRING);
   }else{
      $parking_area = 'no';
   }
   if(isset($_POST['gym'])){
      $gym = $_POST['gym'];
      $gym = filter_var($gym, FILTER_SANITIZE_STRING);
   }else{
      $gym = 'no';
   }
   if(isset($_POST['shopping_mall'])){
      $shopping_mall = $_POST['shopping_mall'];
      $shopping_mall = filter_var($shopping_mall, FILTER_SANITIZE_STRING);
   }else{
      $shopping_mall = 'no';
   }
   if(isset($_POST['hospital'])){
      $hospital = $_POST['hospital'];
      $hospital = filter_var($hospital, FILTER_SANITIZE_STRING);
   }else{
      $hospital = 'no';
   }
   if(isset($_POST['school'])){
      $school = $_POST['school'];
      $school = filter_var($school, FILTER_SANITIZE_STRING);
   }else{
      $school = 'no';
   }
   if(isset($_POST['market_area'])){
      $market_area = $_POST['market_area'];
      $market_area = filter_var($market_area, FILTER_SANITIZE_STRING);
   }else{
      $market_area = 'no';
   }

   $image_02 = $_FILES['image_02']['name'];
   $image_02 = filter_var($image_02, FILTER_SANITIZE_STRING);
   $image_02_ext = pathinfo($image_02, PATHINFO_EXTENSION);
   $rename_image_02 = create_unique_id().'.'.$image_02_ext;
   $image_02_tmp_name = $_FILES['image_02']['tmp_name'];
   $image_02_size = $_FILES['image_02']['size'];
   $image_02_folder = 'uploaded_files/'.$rename_image_02;

   if(!empty($image_02)){
      if($image_02_size > 2000000){
         $warning_msg[] = 'image 02 size is too large!';
      }else{
         move_uploaded_file($image_02_tmp_name, $image_02_folder);
      }
   }else{
      $rename_image_02 = '';
   }

   $image_03 = $_FILES['image_03']['name'];
   $image_03 = filter_var($image_03, FILTER_SANITIZE_STRING);
   $image_03_ext = pathinfo($image_03, PATHINFO_EXTENSION);
   $rename_image_03 = create_unique_id().'.'.$image_03_ext;
   $image_03_tmp_name = $_FILES['image_03']['tmp_name'];
   $image_03_size = $_FILES['image_03']['size'];
   $image_03_folder = 'uploaded_files/'.$rename_image_03;

   if(!empty($image_03)){
      if($image_03_size > 2000000){
         $warning_msg[] = 'image 03 size is too large!';
      }else{
         move_uploaded_file($image_03_tmp_name, $image_03_folder);
      }
   }else{
      $rename_image_03 = '';
   }

   $image_04 = $_FILES['image_04']['name'];
   $image_04 = filter_var($image_04, FILTER_SANITIZE_STRING);
   $image_04_ext = pathinfo($image_04, PATHINFO_EXTENSION);
   $rename_image_04 = create_unique_id().'.'.$image_04_ext;
   $image_04_tmp_name = $_FILES['image_04']['tmp_name'];
   $image_04_size = $_FILES['image_04']['size'];
   $image_04_folder = 'uploaded_files/'.$rename_image_04;

   if(!empty($image_04)){
      if($image_04_size > 2000000){
         $warning_msg[] = 'image 04 size is too large!';
      }else{
         move_uploaded_file($image_04_tmp_name, $image_04_folder);
      }
   }else{
      $rename_image_04 = '';
   }

   $image_05 = $_FILES['image_05']['name'];
   $image_05 = filter_var($image_05, FILTER_SANITIZE_STRING);
   $image_05_ext = pathinfo($image_05, PATHINFO_EXTENSION);
   $rename_image_05 = create_unique_id().'.'.$image_05_ext;
   $image_05_tmp_name = $_FILES['image_05']['tmp_name'];
   $image_05_size = $_FILES['image_05']['size'];
   $image_05_folder = 'uploaded_files/'.$rename_image_05;

   if(!empty($image_05)){
      if($image_05_size > 2000000){
         $warning_msg[] = 'image 05 size is too large!';
      }else{
         move_uploaded_file($image_05_tmp_name, $image_05_folder);
      }
   }else{
      $rename_image_05 = '';
   }

   $image_01 = $_FILES['image_01']['name'];
   $image_01 = filter_var($image_01, FILTER_SANITIZE_STRING);
   $image_01_ext = pathinfo($image_01, PATHINFO_EXTENSION);
   $rename_image_01 = create_unique_id().'.'.$image_01_ext;
   $image_01_tmp_name = $_FILES['image_01']['tmp_name'];
   $image_01_size = $_FILES['image_01']['size'];
   $image_01_folder = 'uploaded_files/'.$rename_image_01;

   if($image_01_size > 2000000){
      $warning_msg[] = 'image 01 size too large!';
   }else{
      $insert_property = $conn->prepare("INSERT INTO `property`(id, user_id, property_name, address, price, type, offer, furnished, mbr, sbr, bathroom,carpet,age,lift, security_guard, play_ground, garden, water_supply, power_backup, parking_area, gym, shopping_mall, hospital, school, market_area, image_01, image_02, image_03, image_04, image_05, description) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"); 
      $insert_property->execute([$id, $user_id, $property_name, $address, $price, $type, $offer,  $furnished, $mbr, $sbr, $bathroom, $carpet, $age,  $lift, $security_guard, $play_ground, $garden, $water_supply, $power_backup, $parking_area, $gym, $shopping_mall, $hospital, $school, $market_area, $rename_image_01, $rename_image_02, $rename_image_03, $rename_image_04, $rename_image_05, $description]);
      move_uploaded_file($image_01_tmp_name, $image_01_folder);
      $success_msg[] = 'property posted successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Post Property</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">
</head>
<body>
   <style>
      .property-form{
         margin-left:200px;
         margin-right:200px;
         color: rgba(96, 96, 84, 0.3);
      }

   </style>
<?php include 'user_header.php'; ?>

<section class="property-form">

   <form action="" method="POST" enctype="multipart/form-data">
      <h3>property details</h3>
      <div class="box">
         <p style="color:black";>street number<span style="color:red";>*</span></p>
         <input type="text" name="property_name" required maxlength="50" placeholder="enter street number" class="input">
      </div>
      <div class="box">
            <p style="color:black";>property address  <span style="color:red";>*</span></p>
            <input type="text" name="address" required maxlength="100" placeholder="enter property full address" class="input">
         </div>
      <div class="flex">
         <div class="box">
            <p style="color:black";>property price  <span style="color:red";>*</span></p>
            <input type="number" name="price" required min="0" max="9999999999" maxlength="10" placeholder="enter property price" class="input">
         </div>
         
         <div class="box">
            <p style="color:black";>offer type  <span style="color:red";>*</span></p>
            <select name="offer" required class="input">
               <option value="sale">sale</option>
                 <option value="resale">resale</option> 
               <option value="rent">rent</option> 
            </select>
         </div>
         <div class="box">
            <p style="color:black"; >property type  <span style="color:red";>*</span></p>
            <select name="type" required class="input">
               <option value="condo">condo</option>
            </select>
         </div> 
         <div class="box">
            <p style="color:black";>furnished status  <span style="color:red";>*</span></p>
            <select name="furnished" required class="input">
               <option value="furnished">furnished</option>
               <option value="semi-furnished">semi-furnished</option>
               <option value="unfurnished">unfurnished</option>
            </select>
         </div>
         <div class="box">
            <p style="color:black";>how many MBR  <span style="color:red";>*</span></p>
            <select name="mbr" required class="input">
               <option value="1">1  MBR</option>
               <option value="2">2  MBR</option>
               <option value="3">3  MBR</option>
               <option value="4">4  MBR</option>
               <option value="5">5  MBR</option>
               <option value="6">6  MBR</option>
               <option value="7">7  MBR</option>
               <option value="8">8  MBR</option>
               <option value="9">9  MBR</option>
            </select>
         </div>
         <div class="box">
            <p style="color:black";>how many SBR <span style="color:red";>*</span></p>
            <select name="sbr" required class="input">
               <option value="0">0 SBR</option>
               <option value="1" selected>1 SBR</option>
               <option value="2">2 SBR</option>
               <option value="3">3 SBR</option>
               <option value="4">4 SBR</option>
               <option value="5">5 SBR</option>
               <option value="6">6 SBR</option>
               <option value="7">7 SBR</option>
               <option value="8">8 SBR</option>
               <option value="9">9 SBR</option>
            </select>
         </div>
         <div class="box">
            <p style="color:black";>how many bathrooms  <span style="color:red";>*</span></p>
            <select name="bathroom" required class="input">
               <option value="1">1 bathroom</option>
               <option value="2">2 bathroom</option>
               <option value="3">3 bathroom</option>
               <option value="4">4 bathroom</option>
               <option value="5">5 bathroom</option>
               <option value="6">6 bathroom</option>
               <option value="7">7 bathroom</option>
               <option value="8">8 bathroom</option>
               <option value="9">9 bathroom</option>
            </select>
         </div>
         <div class="box">
            <p style="color:black";>carpet area  <span style="color:red";>*</span></p>
            <input type="number" name="carpet" required min="1" max="9999999999" maxlength="10" placeholder="how many squarefits?" class="input">
         </div>
         <div class="box">
            <p style="color:black";>property age (in years) <span style="color:red";>*</span></p>
            <input type="number" name="age" required min="0" max="99" maxlength="2" placeholder="how old is property?" class="input">
         </div>
      </div>
      <div class="box">
         <p style="color:black";>property description  <span style="color:red";>*</span></p>
         <textarea name="description" maxlength="1000" class="input" required cols="30" rows="10" placeholder="write about property..."></textarea>
      </div>
      <div class="checkbox">
         <div class="box">
            <p><input type="checkbox" name="lift" value="yes" />lifts</p>
            <p><input type="checkbox" name="security_guard" value="yes" />security guard</p>
            <p><input type="checkbox" name="play_ground" value="yes" />play ground</p>
            <p><input type="checkbox" name="garden" value="yes" />garden</p>
            <p><input type="checkbox" name="water_supply" value="yes" />water supply</p>
            <p><input type="checkbox" name="power_backup" value="yes" />power backup</p>
         </div>
         <div class="box">
            <p><input type="checkbox" name="parking_area" value="yes" />parking area</p>
            <p><input type="checkbox" name="gym" value="yes" />gym</p>
            <p><input type="checkbox" name="shopping_mall" value="yes" />shopping_mall</p>
            <p><input type="checkbox" name="hospital" value="yes" />hospital</p>
            <p><input type="checkbox" name="school" value="yes" />school</p>
            <p><input type="checkbox" name="market_area" value="yes" />market area</p>
         </div>
      </div>
      <div class="box">
         <p>image 01  <span style="color:red";>*</span></p>
         <input type="file" name="image_01" class="input" accept="image/*" required>
      </div>
      <div class="flex"> 
         <div class="box">
            <p>image 02</p>
            <input type="file" name="image_02" class="input" accept="image/*">
         </div>
         <div class="box">
            <p>image 03</p>
            <input type="file" name="image_03" class="input" accept="image/*">
         </div>
         <div class="box">
            <p>image 04</p>
            <input type="file" name="image_04" class="input" accept="image/*">
         </div>
         <div class="box">
            <p>image 05</p>
            <input type="file" name="image_05" class="input" accept="image/*">
         </div>   
      </div>
      <input type="submit" value="post property" class="btn" name="post">
   </form>

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