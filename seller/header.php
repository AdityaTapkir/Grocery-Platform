<?php
session_start();

if(!isset($_SESSION['sname']))
{

   header("Location: http://localhost/grocery%20store/seller/login.php");
}

 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
<style media="screen">
.usercontainer{
  overflow-y: auto;

}
.section{
  border: 2px solid white;
}
.logout{
  margin-left: 2rem;
   background-color: green;
}


</style>

  </head>
  <body>
    <header >
      <div class="adminlogo">
        <a href="#" class="logo"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Grocery</a>


      </div>
      <?php
      include 'dropdown.php' ?>


       <div class="logout" >
         <?php
         include 'account.php' ?>
       </div>
    </header>
