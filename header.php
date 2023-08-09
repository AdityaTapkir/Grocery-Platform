
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
     <meta charset="utf-8">
     <title>Grocery</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="style.css">
    <!--bootstrap-->
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <style media="screen">

  .btn{
    border: 1px solid ;
    padding: 1rem 2rem;
    border-radius: 0.5rem;
    color: var(--black);
    text-decoration: none;
    font-size: 1.5rem;
  }
  .btn:hover{
      background: var(--green);
      color: #fff;

  }
  .quantity{
     font-size: 1rem;
  }
  </style>



  </head>
  <body>
  <header>
      <a href="#" class="logo"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Grocery</a>
       <nav>
         <a href="index.php">Home</a>
         <a href="#Grocery">Grocery</a>
         <a href="ShopNow.php">Categories</a>
         <a href="#Products">Products</a>

         <a href="#Testimonial">Testimonial</a>
         <a href="#ContectUs">ContactUs</a>

       </nav>
         <div class="icons">
            <div id="search-btn" class="fa fa-search"></div>

            <div id="cart-btn" > <a href="addToCart.php"> <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></div>

            <div id="user" style="margin-right: 3rem;">  <?php include'dropdown.php' ?> </div>


          <?php
                session_start();
          if(isset($_SESSION["emailid"])) {  ?>

            <div style="display:inline; width:100px; font-size:10px;">   <a  style="text-decoration : none; color:black" href="logout.php"   > <?php echo  $_SESSION['fname'] ?> logout</a></div>
          <?php
        }
         else {
           ?>
           <div style="display:inline; width:100px; font-size:10px">   <a style="text-decoration : none; color:black" href="login.php">login</a></div>
       <?php } ?>
         </div>

            <form class="search-from" action="index.php" method="post">
                <input type="search" id="search-bar"name="" value="" placeholder="search">
                <label for="search-bar" class="fa fa-search"></label>
            </form>

  </header>
