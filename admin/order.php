<?php include 'header.php'; ?>

  <body>
    <header >
      <div class="adminlogo">
        <?php
        include 'dropdown.php' ?>
        <a href="#" class="logo"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Grocery</a>
      </div>
    </header>
    <section class="section">
      <div class="users">
         <h1>Order Table</h1>
      </div>
            <div class="usercontainer">
              <table class="table table-striped table-hover">
                <thead>
                <tr>
                  <th scope="col">OID</th>
                  <th scope="col">Payment_Method</th>
                  <th scope="col">Order_Date</th>
                  <th scope="col">Total items</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Shipping_id</th>
                  <th scope="col">User_Name</th>

                </tr>
               </thead>
               <tbody>
                 <?php

                      include 'config.php';

                        $sql="SELECT *  FROM ordertable  ";

                      $result2=mysqli_query($conn,$sql);

                      if(mysqli_num_rows( $result2 )>0)
                      {
                        while($row=mysqli_fetch_assoc($result2))
                        {


                 ?>
                <tr>
                  <th scope="row"><?php  echo $row['OID']; ?></th>
                  <td><?php  echo $row['paymentmethod']; ?></td>
                  <td><?php  echo $row['orderdate']; ?></td>
                  <td><?php  echo $row['items']; ?></td>
                  <td><?php  echo $row['amount']; ?></td>
                  <td><?php  echo $row['shipping']; ?></td>

                  <?php

                       include 'config.php';

                         $sql3="SELECT *  FROM users WHERE UID = '{$row['UID']}' ";

                       $result3=mysqli_query($conn,$sql3);

                       if(mysqli_num_rows( $result3 )>0)
                       {
                         while($row3=mysqli_fetch_assoc($result3))
                         {


                  ?>
                  <td><?php  echo $row3['first_name']; ?></td>
                  <?php
                       }
                     }else{
                      echo "empty";
                     }
                     mysqli_close($conn);
                  ?>


                </tr>
                <?php
                     }
                   }else{
                    echo "empty";
                   }

                ?>


      </tbody>
   </table>
  </div>
 </section>
    <script type="text/javascript" src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js">
    </script>
  </body>
</html>
