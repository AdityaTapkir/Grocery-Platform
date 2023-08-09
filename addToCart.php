
<?php include 'header.php'; ?>
<?php
include 'config.php';
session_start();

if(!isset($_SESSION["emailid"]))
{

   header("Location:  http://localhost/grocery%20store/login.php ");
}

?>
<head>
  <style media="screen">
  .addcontainer .box1 .btn{
    position: absolute;
    top:90%;
    font-size:2rem;
    background: #fff;
    padding: 1rem;
    color: var(--green);
    border-radius: 0.8rem;
    border: 1px solid  var(--green);
  }
  .addcontainer .box1 .btn i
  {
    margin: 0 1rem;
  }
  .addcontainer .box1 .btn:hover
  {
    color: #fff;
    background-color: var(--green);
  }
    .addcontainer .box1 a{
    position:relative;
  }
  </style>
</head>
      <section>
     <div class="addcontainer">
         <div class="box1" style="overflow:auto">
          <table class="tabel" style="text-align:center">
             <thead class="thead">
               <?php
               include 'config.php';
               $sql2="SELECT count(amount) FROM cart WHERE UID='{$_SESSION['UID']}'";
               $result2=mysqli_query($conn,$sql2);

               if(mysqli_num_rows($result2)>0)
               {
                 while ($row2=mysqli_fetch_assoc($result2)) {
               ?>
               <th style="margin-left:-3rem;">item(<?php echo $row2['count(amount)']  ?>) deatil</th>
               <?php
                 }
               }else{
                 echo "no post available";
               }
                mysqli_close($conn);
               ?>

               <th>Quantity</th>
               <th>Amount</th>
               <th>Action</th>
             </thead>
             <tbody class="tbody"  >
               <?php

                 include 'config.php';

                $sql="SELECT product.product_name,product.weight,product.price,cart.quantity,product.image ,cart.amount,cart.CID  FROM cart LEFT JOIN product ON cart.PID = product.PID  where cart.UID = '{$_SESSION['UID'] }'";
                 $result=mysqli_query($conn,$sql) or die("query failed");

                 if(mysqli_num_rows($result)>0)
                 {
                   while ($row=mysqli_fetch_assoc($result))
                   {

                 ?>
                <tr>
                  <td class="item">
                     <div class="img">
                       <img src="admin\upload\<?php echo  $row['image'] ?>" alt="">
                     </div>
                     <div class="productName">
                        <h3><?php  echo $row['product_name']; ?>-<?php  echo $row['weight']; ?>KG</h3>
                         <h2>Rs <?php  echo $row['price']; ?></h2>
                     </div>
                  </td>
                  <td>
                    <div class="quantity">
                      <form class="input" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                         <input   style="border:1px solid;   background-color: #fff; margin:15px 0; font-size:15px; border-radius:0.8rem; width:100px; text-align:center"  type="number" name="quant" value="<?php echo $row['quantity'] ?>">
                      </form>

                    </div>
                  </td>

                  <td class="amount">
                    <?php echo $row['amount'] ?>
                </td>

                    <td>  <a href="deletaddtocart.php?id=<?php echo $row['CID'] ?> "><i class='fa fa-trash-o' style="font-size:2rem;"></i></a>
                     </td>




                  <?php
                }
              }else{
                echo "Empty";
              }

               mysqli_close($conn);
              ?>


                </tr>

             </tbody>
          </table>
          <a class="btn" href="ShopNow.php"><i class="footer fa fa-arrow-left"> </i>Continue Shopping</a>
         </div>






         <div class="box2">
                <table class="table2">
                   <tbody class="tbody2">
                       <tr class="itemcost">
                         <?php
                         include 'config.php';
                         $sql2="SELECT count(amount) FROM cart WHERE UID='{$_SESSION['UID']}'";
                         $result2=mysqli_query($conn,$sql2);

                         if(mysqli_num_rows($result2)>0)
                         {
                           while ($row2=mysqli_fetch_assoc($result2)) {
                         ?>
                         <td>item(<?php echo $row2['count(amount)']  ?>) Total</td>
                         <?php
                           }
                         }else{
                           echo "no post available";
                         }
                          mysqli_close($conn);
                         ?>
                         <?php
                         include 'config.php';
                         $sql2="SELECT sum(amount) FROM cart WHERE UID='{$_SESSION['UID']}'";
                         $result2=mysqli_query($conn,$sql2);

                         if(mysqli_num_rows($result2)>0)
                         {
                           while ($row2=mysqli_fetch_assoc($result2)) {
                         ?>
                        <td class="amt">Rs <?php echo $row2['sum(amount)']  ?></td>

                                        <?php
                                          }
                                        }else{
                                          echo "no post available";
                                        }
                                         mysqli_close($conn);
                                        ?>

                       </tr>
                       <tr class="delivery">
                         <td>Delivery Charge</td>
                         <td class="free">Free</td>
                       </tr>
                       <tr class="totalamount">
                         <td>Amount Payable</td>
                         <?php
                         include 'config.php';
                         $sql2="SELECT sum(amount) FROM cart WHERE UID='{$_SESSION['UID']}'";
                         $result2=mysqli_query($conn,$sql2);

                         if(mysqli_num_rows($result2)>0)
                         {
                           while ($row2=mysqli_fetch_assoc($result2)) {
                         ?>
                         <td>Rs <?php echo $row2['sum(amount)'] ?></td>

                                    <?php
                                          }
                                        }else{
                                          echo "no post available";
                                        }

                                         mysqli_close($conn);
                                    ?>
                       </tr>
                   </tbody>
                </table>


                <?php
                include 'config.php';
                $sql2="SELECT sum(amount)  FROM cart WHERE UID='{$_SESSION['UID']}'";
                $result2=mysqli_query($conn,$sql2);

                if(mysqli_num_rows($result2)>0)
                {
                  while ($row2=mysqli_fetch_assoc($result2)) {
                ?>

                 <button class="btn" type="submit" name="button"> <a href="checkout.php?id=<?php echo $row2['sum(amount)']; ?>" style="text-decoration:none; color: black ">CHECKOUT</a> </button>
                           <?php
                                 }
                               }else{
                                 echo "no post available";
                               }

                                mysqli_close($conn);
                           ?>

         </div>
     </div>
  </section>


  </body>
</html>
