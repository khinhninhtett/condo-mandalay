<!-- header section starts  -->

<header class="header">
   <div class="nav1">
<!-- <nav class="navbar nav-1">
   <div class="flex1"> -->
      <a href="home.php" class="logo" style="margin-left:15px";><i class="fas fa-house" style="color:white";></i>Horizon</a>
         <nav class="item">
            <a href="home.php" style="color:white;"; class="Home">Home</a>
            <a href="contact.php" style="color:white"; class="Contact">Contact</a>
           <a href="about.php" style="color:white"; class="About">About</a>
      
      <!-- <ul>
         <li><a href="post_property.php" class="post-property">post property<i class="fas fa-paper-plane"></i></a></li>
      </ul>  -->

</nav>
</div>
   <nav class="navbar nav-2">
      <section class="flex">
         <div id="menu-btn" class="fas fa-bars"></div>

         <div class="menu">
            <ul>
               <li><a href="#">my listings<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="dashboard.php">dashboard</a></li>
                     <li><a href="post_property.php">post property</a></li>
                     <li><a href="my_listings.php">my listings</a></li>
                  </ul>
               </li>
               <li><a href="#">options<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="search.php"> search</a></li>
                     <li><a href="listings.php">all listings</a></li>
                  </ul>
               </li>
               <!-- <li><a href="#">help<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="about.php">about us</a></i></li>
                     <li><a href="contact.php">contact us</a></i></li>
                     <li><a href="contact.php#faq">FAQ</a></i></li>
                  </ul>
               </li>
            </ul> -->
</div>

         <ul class="menu1">
            <li><a href="saved.php">saved <i class="far fa-heart"></i></a></li>
            <li><a href="#">account <i class="fas fa-angle-down"></i></a>
               <ul>
                  <li><a href="login.php">login now</a></li>
                  <li><a href="register.php">register new</a></li>
                  <?php if($user_id != ''){ ?>
                  <li><a href="update.php">update profile</a></li>
                  <li><a href="user_logout.php" onclick="return confirm('logout from this website?');">logout</a>
                  <?php } ?></li>
               </ul>
            </li>
         </ul>
                  
      </section>
   </nav>

</header>

<!-- header section ends -->