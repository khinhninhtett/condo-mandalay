<?php
if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Our team section</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

	<style>
      .About{
        border-bottom:1px solid #F1E2AD;
      }
	
.post{
   display: inline-block;
  padding: 1.2rem 2rem;
  font-size: 2.5rem;
  color:black;
  background-color:#56453E; 
  margin-left:800px;
  margin-top: 400px;
  padding:15px 20px 15px 20px;
  position:fixed;
 border-radius: 90%;
 position: right;

}
img{
   width:50px;
   height:70px;
}
   </style>
	
</head>
<?php include 'user_header.php'; ?>
<body>
	<section class="team">
		<div class="middle">
			<h1>Our Team</h1>
			<a href="post_property.php" class="post hover-post"><i class="fas fa-paper-plane"></i></a>
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
		<div class="team-content">

			<div class="block">
				<img src="images/chan.jpg" style="width:250px;height:350px";>
				<h3>Khin Chan Thar</h3>
				<h5>KPTM_10092</h5>
				<div class="teamicons">
					<a href="https://www.facebook.com/profile.php?id=100051426528196&mibextid=ZbWKwL"><i class="ri-facebook-box-fill"></i></a>
					<a href="https://www.instagram.com/khinchanthar.thar.5?utm_source=qr&igsh=MzNlNGNkZWQ4Mg%3D%3D"><i class="ri-instagram-fill"></i></a>
					<a href="https://t.me/chanucuc"><i class="ri-telegram-fill"></i></a>
				</div>
			</div>
			
			<div class="block">
				<img src="images/khin.jpg" style="width:250px;height:350px";>
				<h3>Khin Hnin Htet</h3>
				<h5>KPTM_9979</h5>
				<div class="teamicons">
					<a href="https://www.facebook.com/khin.hninhtet.31542?mibextid=ZbWKwL"><i class="ri-facebook-box-fill"></i></a>
					<a href="https://www.instagram.com/your_priority_23?igsh=M3FsbWRzM3BwOGtn"><i class="ri-instagram-fill"></i></a>
					<a href="https://t.me/KhinHnin21"><i class="ri-telegram-fill"></i></a>
				</div>
			</div>

			<div class="block">
				<img src="images/moe.jpg" style="width:250px;height:350px">
				<h3>Moe Thiri Khin</h3>
				<h5>KPTM_9990</h5>
				<div class="teamicons">
					<a href="https://www.facebook.com/thiri.htetmyat.3?mibextid=ZbWKwL"><i class="ri-facebook-box-fill"></i></a>
					<a href="https://www.instagram.com/moe.thiri.3517?igsh=dnpvOTU0c29yZXd0"><i class="ri-instagram-fill"></i></a>
					<a href="https://t.me/moethiri18"><i class="ri-telegram-fill"></i></a>
				</div>
			</div>
	</section>
           
   
		</div>
</body>
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
</html>