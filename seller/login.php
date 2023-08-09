<?php
session_start();

if(isset($_SESSION['sname']))
{

   header("Location: http://localhost/grocery%20store/seller/adminpanel.php");
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>login page</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
 <style media="screen">
   a {
    text-decoration: none;
       }
  .login-page {
    width: 100%;
    height: 100vh;
    display: inline-block;
    display: flex;
    align-items: center;
   }
   #box{
      border: 2px solid white;
      height:  100%;
      background: url(greenback.jpg);
      background-position: center;
      background-size: cover;
   }
.form-right i {
    font-size: 100px;
     }
 </style>

</head>
<body>

   <div class="login-page bg-light">
       <div class="container">
           <div class="row">
               <div class="col-lg-10 offset-lg-1">
                 <h3 class="mb-3"> Seller Login Page</h3>
                   <div class="bg-white shadow rounded">
                       <div class="row">
                           <div class="col-md-7 pe-0">
                               <div class="form-left h-100 py-5 px-5">
                                   <form action="<?php $_SERVER['PHP_SELF'] ?>" class="row g-4" method="post">
                                           <div class="col-12">
                                               <label>Username<span class="text-danger">*</span></label>
                                               <div class="input-group">
                                                   <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                   <input type="email" class="form-control" name="email" placeholder="Enter Username">
                                               </div>
                                           </div>

                                           <div class="col-12">
                                               <label>Password<span class="text-danger">*</span></label>
                                               <div class="input-group">
                                                   <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                                   <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                               </div>
                                           </div>

                                           <div class="col-sm-6">
                                               <div class="form-check">
                                                   <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                                                   <label class="form-check-label" for="inlineFormCheck">Remember me</label>
                                               </div>
                                           </div>

                                           <div class="col-sm-6">
                                               <a href="#" class="float-end text-primary">Forgot Password?</a>
                                           </div>

                                           <div class="col-12">
                                               <button type="submit" class="btn btn-primary px-4 float-end mt-4"><a style="color:white;"href="signup.php">Sign-Up</a> </button>
                                               <button  style="margin-right:2rem;"type="submit" name="login" class="btn btn-primary px-4 float-end mt-4">Login</button>
                                           </div>
                                   </form>

                                   <?php

                                        if(isset($_POST['login']))
                                       {

                                          $email=$_POST['email'];
                                          $password= md5($_POST['password']) ;
                                          include 'config.php';
                                         $sql="SELECT SID,email,passward,sname FROM salesman WHERE email = '{$email}'  AND  passward= '{$password}'";
                                          $result=mysqli_query($conn,$sql);

                                              if( mysqli_num_rows($result)>0)
                                              {
                                               while ($row=mysqli_fetch_assoc($result))
                                                {
                                                     session_start();
                                                      $_SESSION['email']= $row['email'];
                                                      $_SESSION['sname']= $row['sname'];
                                                      $_SESSION['SID']= $row['SID'];
                                                      header("Location: http://localhost/grocery%20store/seller/storeinformation.php");

                                                 }
                                               }

                                              else{
                                               echo  '<p class="alert alert-danger"> User not exsits</p>';
                                              }

                                           mysqli_close($conn);
                                          }
                                    ?>



                               </div>
                           </div>
                           <div class="box col-md-5 ps-0 d-none d-md-block">
                               <div  id="box"  >
                                   <i></i>
                                   <h2></h2>
                               </div>
                           </div>
                       </div>
                   </div>

               </div>
           </div>
       </div>
   </div>

   <!-- Bootstrap JS -->

</body>
</html>
