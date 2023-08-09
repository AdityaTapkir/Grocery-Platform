<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Account Details</title>
    <meta charset="utf-8">
    <title>Admin Panel</title>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

  </head>
  <body>
    <div class="container">
<h1>Edit Profile</h1>
<hr>
<div class="row">
<!-- left column -->
<div class="col-md-3">
 <div class="text-center">




 </div>
</div>

<!-- edit form column -->
<div class="col-md-9 personal-info">

 <h3>Personal info</h3>

 <form class="form-horizontal" action="saveupdateaccount.php" role="form" method="post">

   <?php
             session_start();
            include 'config.php';

           $sql="SELECT salesman.fname,salesman.lname,salesman.passward ,salesman.email,salesman.sname,store.storename FROM salesman LEFT JOIN store ON salesman.SID = store.salername WHERE SID = '{$_SESSION['SID']} '";
            $result=mysqli_query($conn,$sql) or die("query failed");

            if(mysqli_num_rows($result)>0)
            {
              while ($row=mysqli_fetch_assoc($result)) {


            ?>
   <div class="form-group">
     <label class="col-lg-3 control-label">First name:</label>
     <div class="col-lg-8">
       <input class="form-control" name="fname" type="text" value="<?php echo $row['fname'] ?>">
     </div>
   </div>
   <div class="form-group">
     <label class="col-lg-3 control-label">Last name:</label>
     <div class="col-lg-8">
       <input class="form-control" type="text" name="lname" value="<?php echo $row['lname'] ?>">
     </div>
   </div>
   <div class="form-group">
     <label class="col-lg-3 control-label">Company:</label>
     <div class="col-lg-8">
       <input class="form-control" type="text"name="company" value="<?php echo $row['storename'] ?>">
     </div>
   </div>

   <div class="form-group">
     <label class="col-md-3 control-label">Username:</label>
     <div class="col-md-8">
       <input class="form-control" type="text" name="sname" value="<?php echo $row['sname'] ?>">
     </div>
   </div>
   <div class="form-group">
     <label class="col-lg-3 control-label">Email:</label>
     <div class="col-lg-8">
       <input class="form-control" type="email" name="email" value="<?php echo $row['email'] ?>">
     </div>
   </div>



   <div class="form-group">
     <label class="col-md-3 control-label"></label>
     <div class="col-md-8">
       <input type="submit" class="btn btn-primary" name="save" value="Save Changes">
       <span></span>
        <a href="adminpanel.php" class="btn btn-primary"> Back</a>
     </div>
   </div>
   <?php
     }
   }else{
     echo "no post available";
   }
    mysqli_close($conn);
   ?>
 </form>
</div>
</div>
</div>
<hr>
  </body>
</html>
