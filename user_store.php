<?php
include("database.php");

 $name=$_POST['name'];
 $email=$_POST['email'];
$task= $_POST['tasktype'];
$user_id = $_SESSION['user_id'];


if($task=='add')
{
  
    $sql="INSERT INTO `user_data`( `name`, `email`,`user_id`) VALUES ('$name','$email','$user_id')";
mysqli_query($conn,$sql);


}
if($task=='update')
{
    $sql="update user_data set name='".$_POST['name']."',email='".$_POST['email']."' where user_id='$user_id' and  id='".$_POST['id']."'";
    mysqli_query($conn,$sql);
}



if($_REQUEST['taskType']=='Delete')
{
    $sql="delete from user_data where user_id='$user_id' and id='$_REQUEST[id]'";
    mysqli_query($conn,$sql);
    
    
}

echo "<script>window.top.location='index.php?task=&id='</script>";
