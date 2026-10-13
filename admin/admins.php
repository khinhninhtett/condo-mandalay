<?php

include '../connect.php';
include '../connection.php';
if(isset($_COOKIE['admin_id'])){
   $admin_id = $_COOKIE['admin_id'];
}else{
   $admin_id = '';
   header('location:login.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admins</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="admin_style.css">

<!------>

   
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <!----->

<style>
   
</style>


</head>
<body style="background-color:aquamarine;">
   
<!-- header section starts  -->
<?php include 'admin_header.php'; ?>

<div id="menu-btn" class="fas fa-bars"></div>


<!-- admins section starts  -->

<section class="grid"  >

<div class="container" style="margin-top: 20px;margin-left: 50px;">
    <div class="row pt-5 pb-5 gt-3">
        <h1 class="mt-4 mb-3">Manage-Admin</h1>

        <div class="col-11">
          
        <a href="register.php" class="btn btn-primary w-20 mb-10" style="display: inline;font-size:20px">add admin</a>
        
<table class="table table-light table-striped" style="margin-top: 10px;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">password</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

  <?php
include '../connection.php';
$sql1="SELECT * FROM admins";
$res1=mysqli_query($conn1,$sql1);
if($res1){
  $count1=mysqli_num_rows($res1);
  if($count1==0){
    echo "no data";

  }else{
    $sn=1;
    while($row=mysqli_fetch_assoc(($res1))){
      $id=$row['id'];
      $name=$row['name'];
      $password=$row['password'];
?>
 <tr>
      <th scope="row"><?= $sn?></th>
      <td><?= $name?></td>
      <td><?=$password?></td>
      <td>
        <a href="update.php?id=<?=$id?>" class="bg-white p-2 rounded mx-1" title="update " style="text-decoration: none;">

        <img src="icons8-forgot-password-64.png" width="30px;" height="30px" alt="">
        </a>
        <a href="editAdmin.php?id=<?=$id?>" class="bg-white p-2 rounded mx-1" title="edit"  style="text-decoration: none;">

        <img src="icons8-edit-64.png" width="25px;" height="25px" alt="">
        </a>
      
        <a href="deleteAdmin.php?id=<?=$id?>" class="bg-white p-2 rounded mx-1" title="delete"  style="text-decoration: none;">

        <img src="icons8-delete-100.png" width="25px;" height="25px" alt="">
        </a>
      </td>
    </tr>
<?php
$sn++;

    }
  }
}



?>
 
  </tbody>
</table>
        </div>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    </section>

<!-- admins section ends -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="admin_script.js"></script>

<?php include '../message.php'; ?>


</body>
</html>