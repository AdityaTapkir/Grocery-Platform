<?php
include 'header.php'; ?>
  <body>
    <header >
      <div class="adminlogo">
        <?php
        include 'dropdown.php' ?>
        <a href="#" class="logo"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Grocery</a>
      </div>
    </header>
    <section class="section section1">
        <div class="AddProductContainer">
          <div class="">
             <h1>UPDATE PRODUCT</h1>
          </div>
           <form class="" action="savepdateproduct.php" method="post" enctype="multipart/form-data">
            <?php

                   include 'config.php';
                   $id=$_GET['id'];
                   $sql="SELECT * FROM product WHERE PID = '{$id} '";
                   $result=mysqli_query($conn,$sql) or die("query failed");

                   if(mysqli_num_rows($result)>0)
                   {
                     while ($row=mysqli_fetch_assoc($result)) {


                   ?>
                   <input type="hidden" name="id"  class="form-control" value="<?php echo $row['PID'] ?>" placeholder="">
             <div class="box">
               <label for="">Product Name</label>
               <br>
                 <input type="text" name="pname" value="<?php  echo $row['product_name'] ?>" placeholder="Product Name">
             </div>
             <div class="box">
               <label for="">Units</label>   <br>
                <input type="number" name="unit" value="<?php  echo $row['units'] ?>" placeholder="Units">
             </div>

              <div class="box">
                <label for="">Picture</label>   <br>
                  <input type="file" name="img" value="" placeholder="Upload image">
                    <img  src="upload/<?php echo $row['image']; ?>" height="150px">
                   <input type="hidden" name="old-image" value="">
              </div>

               <div class="box">
                 <label for="box">Weight</label>   <br>
                  <input type="number" name="weight" value="<?php  echo $row['weight'] ?>" placeholder="Weight">
               </div>
                <div class="box">
                  <label for="">Category Id</label>   <br>
                  <select name="category" class="form-control">
                    <option disabled=""> Select Category</option>
                     <?php
                         include 'config.php';
                           $sql1="SELECT * FROM category";
                     $result1=mysqli_query($conn,$sql1);

                     if(mysqli_num_rows( $result1 )>0)
                     {
                       while($row1=mysqli_fetch_assoc($result1))
                       {

                         if($row['CID']==$row1['CID'])
                                    {
                                           $selected="selected";
                                    }
                                    else
                                        $selected="";

                          echo "<option {$selected} value=' {$row1['CID']}'> {$row1['categoryname']} </option>";

                         
                       }

                      }

                       ?>

                  </select>
                </div>
               <div class="box">
                 <label for="">Price</label>   <br>
                 <input type="number" name="price" value="<?php  echo $row['price'] ?>">
               </div>
               <div class="box">
                 <label for="">Product Description</label>   <br>
                 <input type="text" name="prodes" value="<?php  echo $row['product_description'] ?>">
               </div>
                <div class="btn2">
                  <button type="submit" name="button">ADD</button>
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
    </section>
      <script type="text/javascript" src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"> </script>
  </body>
</html>
