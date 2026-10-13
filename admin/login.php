<?php

include '../connect.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="admin_style.css">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  
</head>
<body style="padding-left: 0; background-color:antiquewhite;">

<!-- login section starts  -->

<section class="form-container" style="min-height: 100vh; ">

   <form action="" method="post" style="background-color: white; height:280px; border-radius:50px 0px ;">
      <h3 style="font-weight: bold;">welcome back!</h3>
      
      
<div class="form-floating mb-4">
  <input type="text"  class="form-control box"   name="name" placeholder="enter adminName" maxlength="20" required oninput="this.value = this.value.replace(/\s/g, '')">
  <label for="floatingInput" >Admin Name</label>
</div>
      
<div class="form-floating mb-4 ">
  <input type="password" class="form-control box" id="floatingPassword"name="pass" placeholder="enter password" maxlength="20" required oninput="this.value = this.value.replace(/\s/g, '')">
  <label for="floatingPassword" >Password</label>
</div>
<input type="submit" value="login now" name="submit" class="btn" style="background-color: blue; color:beige; height:35px;font-size:15px">

   </form>

</section>

<!-- login section ends -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>



</body>
</html>
<?php
if(isset($_POST['submit'])){

    $name = $_POST['name'];
    //$name = filter_var($name, FILTER_SANITIZE_STRING); 
   $pass = $_POST['pass'];
    //$pass = filter_var($pass, FILTER_SANITIZE_STRING); 
 
   $select_admins = $conn->prepare("SELECT * FROM `admins` WHERE name =? AND password =? LIMIT 1");
  $select_admins->execute([$name, $pass]);
   $row = $select_admins->fetch(PDO::FETCH_ASSOC);
 
   if($select_admins->rowCount() > 0){
     setcookie('admin_id', $row['id'], time() + 60*60*24*30, '/');
    header('location:dashboard.php');
   }else{
  $warning_msg[] = 'Incorrect username or password!';
   }
}

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

   
 
 ?>