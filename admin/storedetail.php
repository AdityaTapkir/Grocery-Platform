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
<h1>Store Details</h1>
<br>
<div class="row">
<!-- left column -->
<div class="col-md-3">
 <div class="text-center">




 </div>
</div>


<div class="col-md-9 personal-info">

 <h3>Store info</h3>

 <form class="form-horizontal" action="saveupdateaccount.php" role="form" method="post">

   <?php
             session_start();
            include 'config.php';

           $sql="SELECT  * FROM store WHERE salername = '{$_GET['id']}'";
            $result=mysqli_query($conn,$sql) or die("query failed");

            if(mysqli_num_rows($result)>0)
            {
              while ($row=mysqli_fetch_assoc($result))  {


            ?>
   <div class="form-group">
     <label class="col-lg-3 control-label">Store name:</label>
     <div class="col-lg-8">
       <input class="form-control" name="fname" type="text" value="<?php echo $row['storename'] ?>">
     </div>
   </div>
   <div class="form-group">
     <label class="col-lg-3 control-label">Retailer Name:</label>
     <div class="col-lg-8">
       <input class="form-control" type="text" name="lname" value="<?php echo $row['retailername'] ?>">
       </div>
     </div>
   <div class="form-group">
     <label class="col-lg-3 control-label">Address 1:</label>
     <div class="col-lg-8">
       <input class="form-control" type="text"name="company" value="<?php echo $row['address1'] ?>">
     </div>
   </div>

   <div class="form-group">
     <label class="col-md-3 control-label">Address 2:</label>
     <div class="col-md-8">
       <input class="form-control" type="text" name="sname" value="<?php echo $row['address2'] ?>">
     </div>
   </div>
   <div class="form-group">
     <label class="col-lg-3 control-label">Email:</label>
     <div class="col-lg-8">
       <input class="form-control" type="email" name="email" value="<?php echo $row['email'] ?>">
     </div>
   </div>
   <div class="form-group">
     <label class="col-md-3 control-label">City:</label>
     <div class="col-md-8">
       <input class="form-control" type="text" name="sname" value="<?php echo $row['city'] ?>">
     </div>
   </div>
   <div class="form-group">
     <label class="col-md-3 control-label">State:</label>
     <div class="col-md-8">
       <input class="form-control" type="text" name="sname" value="<?php echo $row['state'] ?>">
     </div>
   </div>
   <div class="form-group">
     <label class="col-md-3 control-label">ZIP:</label>
     <div class="col-md-8">
       <input class="form-control" type="text" name="sname" value="<?php echo $row['zip'] ?>">
     </div>
   </div>
   <div class="form-group">
     <label class="col-md-3 control-label"> Registration Date:</label>
     <div class="col-md-8">
       <input class="form-control" type="text" name="sname" value="<?php echo $row['rdate'] ?>">
     </div>
   </div>




   <div class="form-group">
     <label class="col-md-3 control-label"></label>
     <div class="col-md-8">

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
