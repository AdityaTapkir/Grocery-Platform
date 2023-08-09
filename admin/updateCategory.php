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
           <h1>ADD CATEGORY</h1>
        </div>
         <form class="" action="saveupdatecategory.php" method="post" >
          <?php

                   include 'config.php';
                   $id=$_GET['id'];
                   $sql="SELECT * FROM category WHERE CID = '{$id} '";
                   $result=mysqli_query($conn,$sql) or die("query failed");

                   if(mysqli_num_rows($result)>0)
                   {
                     while ($row=mysqli_fetch_assoc($result)) {


                   ?>
                     <input type="hidden" name="id"  class="form-control" value="<?php echo $row['CID'] ?>" placeholder="">
           <div class="box">
             <label for="">Category Name</label>
             <br>
               <input type="text" name="categoryName" value="<?php  echo $row['categoryname'] ?>" placeholder="Product Name">
           </div>
           <div class="box">
             <label for="">Category Description</label>   <br>
              <input type="text" name="categoryDescription" value="<?php  echo $row['categorydescription'] ?>" placeholder="description">
           </div>


              <div class="btn2">
                <button type="submit" name="button">Update </button>
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
