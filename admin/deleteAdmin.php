<?php

include '../connection.php';

$id=$_GET['id'];

$sql="DELETE FROM admins WHERE id ='$id'";

$res=mysqli_query($conn1,$sql);
if($res){
   
    $success_msg[] = 'Admin deleted!';
    header('location:admins.php');
}else{
    $warning_msg[] = 'Admin deleted already!';

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