<?php
include 'auth.php';

if (!isLoggedIn()) {
    header('Location: login.php');
    exit();
}
$user_id = $_SESSION['user_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   <style type="text/css">
    .heading{
      text-align: center;
    }
    .form-wrapper{
      padding-top:50px;
    }
    .header-top{
      text-align: right;
      padding-right:120px;
    }
  </style>
  <style>
      .up-block{display:none;}
      .shw-table{display:block;}
  </style>
 <?php 
  if($_REQUEST['id']!=''){
$sql_b1=mysqli_query($conn,"select * from user_data where user_id='$user_id' and id='".$_REQUEST['id']."'");
$res_b1=mysqli_fetch_assoc($sql_b1);
}

  if($_REQUEST['task']=='update')
{?>
  <style>
      .up-block{display:block !important;}
      .shw-table{display:none;}
  </style>  
<?php }

if($_REQUEST['task']=='add')
{?>
  <style>
      .up-block{display:block !important;}
      .shw-table{display:none;}
  </style>  
<?php }
?>
<script>
    function confirm_delete(id)
    {
        if (confirm('Are you sure want to delete?')) {
        window.top.location="user_store.php?taskType=Delete&id="+id
        } else {
        exit();
            }
    }
</script>
   
</head>
<body>
  <div class="header-top">
        <h2 class="mt-4">Welcome, <?php echo $_SESSION['username']; ?></h2>
        <a href="logout.php" class="btn btn-danger mb-3">Logout</a>
  </div>     
  <div class="container form-wrapper shw-table">
    <a href="index.php?task=add&id="><input type="button" class="btn btn-primary"   name="btnNew" id="btnNew" value="Add User Data" /></a>
          
<?php
  $query="select * from user_data where user_id='$user_id'";
  $sql=mysqli_query($conn,$query);
  $count=mysqli_num_rows($sql);
  if($count>0){
  ?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Sr.No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
  <?php

    $i=1;
    while($res=mysqli_fetch_assoc($sql)){
    ?>
    
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $res['name'];?></td>
        <td><?php echo $res['email'];?></td>
        <td> 
          <a href="index.php?task=update&id=<?php echo $res['id']?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a onClick="confirm_delete('<?php echo $res['id']?>')" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i> Delete
                    </a></td>
      </tr>
    
        
    <?php
$i++;
  }?>
  </tbody>
  </table>
  <?php
  }
  
?>
</div>
<div class="container form-wrapper up-block">
  <h2 class="heading">Users form</h2>
  <form action="user_store.php" method="post">
    <input type="hidden" name="tasktype" value="<?php echo $_REQUEST['task'];?>">
    <input type="hidden" name="id" value="<?php echo $_REQUEST['id'];?>">
        
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="name" class="form-control" value="<?php if($_REQUEST['task']=='update'){ echo $res_b1['name'];}?>" id="name" placeholder="Enter Name" name="name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" value="<?php if($_REQUEST['task']=='update'){ echo $res_b1['email'];}?>" placeholder="Enter email" name="email">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>