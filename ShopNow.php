
<?php
session_start();
    if(isset($_POST['button']))
    {
   $Qty=$_POST['quantity'];
   $PID=$_POST['PID'];
   $UID=$_POST['UID'];
    include 'config.php';

    $sql="SELECT price FROM product WHERE PID='{$PID}'";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0)
    {
      while ($row=mysqli_fetch_assoc($result)) {
        $amount=$row['price']*$Qty;
      }
    }

   $sql1="INSERT INTO cart(UID,PID,quantity,amount) VALUES( {$UID},{$PID},{$Qty},{$amount} )";
       $result1=mysqli_query($conn,$sql1);
       $amount=0;
     // header("Location: http://localhost/grocery%20store/login.php");
    mysqli_close($conn);
  }
 ?>

 <head>
   <style media="screen">
     .Categories{
       position: absolute;
         box-shadow:var(--box-shadow);
         width: 15%;
         height: 80%;
         font-size: 1.5rem;
         background-color: #fff;
         padding: 1rem 0.8rem;

     }
     .Categories h3{
       padding: 0.8rem;
       font-size: 1.3rem;

     }
     .Categories h3 a{
       text-decoration: none;
       color: var(--black);
     }
     .Categories h3 a:hover{
       border: 1px solid green;
       padding: 0.3rem;
       border-radius: 0.5rem;
       background-color: green;
       color: white;
     }
   </style>
 </head>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Shop Now</title>
     <link rel="stylesheet" href="style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <header>
        <a href="#" class="logo"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Grocery</a>
         <nav>
           <a href="index.php">Home</a>
           <a href="#Grocery">Grocery</a>
           <a href="#Categories">Categories</a>
           <a href="index.php">Products</a>



         </nav>
           <div class="icons">
              <div id="search-btn" class="fa fa-search"></div>


              <?php

              if(isset($_SESSION["emailid"])) {
             include 'config.php';

              $sql="SELECT count(PID) FROM cart WHERE UID='{$_SESSION['UID']}'";
              $result=mysqli_query($conn,$sql);

              if(mysqli_num_rows($result)>0)
              {
                while ($row=mysqli_fetch_assoc($result)) {

              ?>

              <div id="cart-btn" > <a href="addToCart.php"> <i class="fa fa-shopping-cart" aria-hidden="true"><?php echo $row['count(PID)'] ?> </i></a></div>

               <?php
                 }
               }else{
                 echo "no post available";
               }

                mysqli_close($conn);
            }
            else { ?>
              <div id="cart-btn" > <a href="addToCart.php"> <i class="fa fa-shopping-cart" aria-hidden="true"> </i></a></div>

          <?php }  ?>

              <div id="user" >  <a href="login.php"><i class="fa fa-user" aria-hidden="true"></i></a> </div>

           </div>

              <form class="search-from" action="index.html" method="post">
                  <input type="search" id="search-bar"name="" value="" placeholder="search">
                  <label for="search-bar" class="fa fa-search"></label>
              </form>
      </header>
      <section>

          <div class="shopcontainer">

              <div class="Categories">
                 <h1>Categories</h1>
                 <div class="list">
                   <h3><a href="ShopNow.php">All Categories</a></h3>
                   <?php

                        include 'config.php';

                          $sql4="SELECT * FROM category ";

                        $result4=mysqli_query($conn,$sql4);

                        if(mysqli_num_rows( $result4 )>0)
                        {
                          while($row4=mysqli_fetch_assoc($result4))
                          {


                   ?>
                   <h3><a href="ShopNow.php?id=<?php echo $row4['CID'] ?>"><?php echo $row4['categoryname'] ?></a> </h3>

                    <?php
                      }
                    }else{
                      echo "no post available";
                    }
                     mysqli_close($conn);
                    ?>

                 </div>
              </div>

              <div class="headbox">
                <div class="heading">

                  <?php
                  include 'config.php';
                  $sql3="SELECT count(PID) FROM product";
                  $result3=mysqli_query($conn,$sql3);

                  if(mysqli_num_rows($result3)>0)
                  {
                    while ($row3=mysqli_fetch_assoc($result3)) {


                  ?>


                    <h1>All items(<?php echo $row3['count(PID)'] ?> items)</h1>

                  <?php
                    }
                  }else{
                    echo "no post available";
                  }
                   mysqli_close($conn);
                  ?>

                   <h2>Sort By
                   <select class="select" name="">
                      <option value="">newest</option>
                      <option>popularity</option>
                      <option value="">Low to High</option>
                   </select>
                   </h2>
                </div>
                <table class="table" >
                  <tbody class="tbody" style="  display: grid;
                    grid-template-columns:repeat(auto-fit,minmax(30rem,1fr));
                    gap: 10rem;
                    justify-content: center;
                    align-items: center;">
                     <?php   if( isset($_GET['id'])) { ?>


                    <?php

                         include 'config.php';

                           $sql="SELECT * FROM product  WHERE CID='{$_GET['id']}'";

                         $result2=mysqli_query($conn,$sql);

                         if(mysqli_num_rows( $result2 )>0)
                         {
                           while($row=mysqli_fetch_assoc($result2))
                           {


                    ?>
                      <tr>
                        <td class="box box1">

                          <div class="img">
                            <img src=" admin\upload\<?php echo  $row['image'] ?>" alt="pic">
                          </div>
                          <div class="productName">
                             <h3 style="text-align:center"><?php  echo $row['product_name']; ?>-<?php  echo $row['weight']; ?>Kg</h3>
                              <h2  >Rs <?php  echo $row['price']; ?></h2>
                              <form class="" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

                                <input style="border:1px solid;   background-color: #eee; margin:15px 0; font-size:20px; border-radius:0.8rem; width:100px; text-align:center" type="number" name="quantity" value="" placeholder="Qty"><br>
                                <input type="hidden" name="PID" value="<?php echo $row['PID']; ?>">
                                <input type="hidden" name="UID" value=" <?php   echo  $_SESSION['UID'] ?>">
                                 <button class="btn"type="submit" name="button"> add to cart  </button>

                              </form>
                           </div>


                      </tr>


                          <?php
                               }
                             }else{
                              echo " <h1 style='margin-left:5rem; color:red;'>Out Of Stock</h1> ";
                             }

                          ?>
                       <?php }

                       else{

                         ?>
                         <?php

                              include 'config.php';

                                $sql="SELECT * FROM product ";

                              $result2=mysqli_query($conn,$sql);

                              if(mysqli_num_rows( $result2 )>0)
                              {
                                while($row=mysqli_fetch_assoc($result2))
                                {


                         ?>
                           <tr>
                             <td class="box box1">
                               <div class="img">
                                 <img src=" admin\upload\<?php echo  $row['image'] ?>" alt="pic">
                               </div>
                               <div class="productName">
                                  <h3 style="text-align:center"><?php  echo $row['product_name']; ?>-<?php  echo $row['weight']; ?>Kg</h3>
                                   <h2  >Rs <?php  echo $row['price']; ?></h2>
                                   <form class="" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

                                     <input style="border:1px solid;   background-color: #eee; margin:15px 0; font-size:20px; border-radius:0.8rem; width:100px; text-align:center" type="number" name="quantity" value="" placeholder="Qty"><br>
                                     <input type="hidden" name="PID" value="<?php echo $row['PID']; ?>">
                                     <input type="hidden" name="UID" value=" <?php   echo  $_SESSION['UID'] ?>">
                                      <button class="btn"type="submit" name="button"> add to cart  </button>

                                   </form>
                                </div>


                           </tr>


                               <?php
                                    }
                                  }else{
                                   echo "empty";
                                  }

                               ?>
                         <?php } ?>
                  </tbody>
                </table>

              </div>
          </div>
      </section>

  </body>
</html>
