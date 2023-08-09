<?php
include 'header.php'; ?>
<head>
  <style media="screen">
    .usercontainer{
      overflow-y: auto;

    }
  </style>
</head>

    <section class="section">
      <div class="users">
         <h1>Products Table</h1>
         <div class="btn1">
           <a href="AddProduct.php">ADD PRODUCT</a>
         </div>
      </div>
            <div class="usercontainer"   >

              <table class="table table-striped table-hover">
                <thead>
                <tr>
                  <th scope="col">PID</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Units</th>
                  <th scope="col">Picture</th>
                  <th scope="col">Weight</th>
                  <th scope="col">Category id</th>
                  <th scope="col">Price</th>
                  <th scope="col">Product Description</th>
                  <th scope="col">Actions</th>
                </tr>
               </thead>
               <tbody style="  overflow: auto;">
                 <?php

                   include 'config.php';
                   $sql="SELECT * FROM product WHERE storeID='{$_SESSION['SID']}' ";
                   $result=mysqli_query($conn,$sql) or die("query failed");

                   if(mysqli_num_rows($result)>0)
                   {
                     while ($row=mysqli_fetch_assoc($result))
                     {

                   ?>
                <tr>
                  <th scope="row"><?php  echo $row['PID'] ?></th>
                  <td><?php  echo $row['product_name'] ?></td>
                  <td><?php  echo $row['units'] ?>Unit</td>
                  <td><img class="image" src=" upload\<?php echo $row['image'] ?>" alt="pic"></td>
                  <td><?php  echo $row['weight'] ?> </td>
                  <td><?php  echo $row['CID'] ?></td>
                  <td>Rs.<?php  echo $row['price'] ?></td>
                  <td><?php  echo $row['product_description'] ?></td>
                  <td class='edit'><a href='updateproduct.php?id=<?php echo $row['PID'] ?>'><i class='fa fa-edit'></i></a></td>
                  <td class='delete'><a href='deletproduct.php?id=<?php echo $row['PID'] ?>'><i class='fa fa-trash-o'></i></a></td>

                </tr>
                <?php
              }
            }else{
              echo "no post available";
            }
             mysqli_close($conn);
            ?>

      </tbody>
   </table>
  </div>
 </section>
    <script type="text/javascript" src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js">
    </script>
  </body>
</html>
