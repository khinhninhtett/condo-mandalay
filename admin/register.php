<?php


include '../connect.php';
include '../connection.php';
if(isset($_COOKIE['admin_id'])){
   $admin_id = $_COOKIE['admin_id'];
}else{
   $admin_id = '';
   header('location:login.php');
}




if($_SERVER['REQUEST_METHOD']=='POST'){
   //$id = create_unique_id();
   $name = $_POST['name'];
   $pass = $_POST['pass'];
   $cpass = $_POST['c_pass'];
   $sql1="SELECT * FROM `admins` WHERE name ='$name'";
   $res1=mysqli_query($conn1,$sql1);

   if(mysqli_num_rows($res1)>0){
      $warning_msg[] = 'Username already taken!';
   } else {
      if($pass != $cpass){
        
         $warning_msg[] = 'Password not matched!';
      } else {
         $sql= "INSERT INTO admins ( name, password) VALUES ( '$name', '$cpass')";
         $res=mysqli_query($conn1,$sql);
         if($res){
            $success_msg[] = 'Registered successfully!';
            header('location:admins.php');
         } else {
            echo "fill";
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
   <title>Register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="admin_style.css">


   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
   .container{
      position:relative;
      top: 30px;
      margin-left: 20px;
      font-size: 15px;
   }
   button:hover{
         background-color: blue;
   }

</style>

</head>
<body style="background-color: beige; ">
   
<!-- header section starts  -->
<?php include 'admin_header.php'; ?>

   <div class="container" >
    <div class="row pt-4 pb-4 text-color gt-3">
        <h1 class="mt-4 mb3"> Add new admin</h1>

        <div class="col-md-7" >
            <div class="border p-3 rounded-3" style="background-color: aqua;width: 500px;height:300px;">
                <form action="" method="post" >
                
                    <div class="mb-3">                        
                     <label for="fullname" class="form-label">Name</label>
                        <input type="text" style="height: 40px;"class="form-control" id="name" name="name" required>

                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="password" style="height: 40px;" class="form-control" id="pass" name="pass" required>

                    </div>
                    <div class="mb-3">
                        <label for="c_pass" class="form-label">comfirm password</label>
                        <input type="password" style="height: 40px;" class="form-control" id="c_pass" name="c_pass" required>

                    </div>
                    
                    <button  style="height: 40px;width:100px; border-radius:50px;color:black;margin-top:8px;" >Add </button>

                </form>
            </div>
        </div>
    </div>
 </div>


<!--</section>-->

<!-- register section ends -->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>
<?php

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



</body>
</html>