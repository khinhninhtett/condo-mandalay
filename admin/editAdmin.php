
<?php

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
   <title>Update</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="admin_style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
   button:hover{
      background-color: blue;
   }
</style>


</head>
<body >
   
<!-- header section starts  -->
<?php include 'admin_header.php'; ?>
<!-- header section ends -->

<!-- update section starts  -->

<section >
<?php
$id=$_GET['id'];

$sql="SELECT *FROM admins WHERE id ='$id'";

$res=mysqli_query($conn1,$sql);
if($res){
    $count=mysqli_num_rows($res);

   if($count==1){
      $row=mysqli_fetch_assoc($res);
      $name=$row['name'];
    

   }
  
}else{
   $warning_msg[] = 'Fail edit!';
}



?>
   <div class="container"  style="margin-top: 100px;width:900px;  " >
    <div class="row pt-4 pb-4 text-color "  >
        

        <div class="col-md-7">
            <div class="border p-3 rounded-3" style="background-color: aqua; " >
                <form action="" method="post" style="height:150px; " >
                
                    <div class="mb-3">                        
                     <label for="fullname" class="form-label" style="font-size:15px;">Admin Name</label>
                        <input type="text" style="font-size:15px;height: 40px;"class="form-control" id="name" name="name" maxlength="10" class="box" value="<?=$name?>"required>

                    </div>
                    
                    <input type="hidden" value="<?=$id?>" name="id">
                    <button  style="height: 30px;width:200px; border-radius:50px;color:black;margin-top:8px; color:black;font-size:13px;" >Change </button>

                </form>
            </div>
        </div>
    </div>
 </div>

<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id=$_POST['id'];
    $name=$_POST['name'];

    $sql="UPDATE admins SET name='$name' WHERE id='$id'";
    $res=mysqli_query($conn1,$sql);


    if($res){
        
        header('location:admins.php');
        //$success_msg[]= 'edit successful';
    }else{
        $warning_msg[] = 'Fail to edit!';
        header('location:login.php');
    }
}


?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src=".admin_script.js"></script>

<?php if(isset($success_msg)){
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