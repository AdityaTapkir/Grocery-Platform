<?php
include 'header.php'; ?>
  <body>
    <header>
      <div class="adminlogo">
        <?php
        include 'dropdown.php' ?>
        <a href="#" class="logo"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Grocery</a>
      </div>
   </header>
   <section class="section">
     <div class="adminname">
       <h1>Dashboard</h1>
     </div>
         <div class="dashcontainer">

            <div class="box">
              <?php
              include 'config.php';
              $sql="SELECT count(categoryname) FROM category WHERE storeID='{$_SESSION['SID']}'";
              $result=mysqli_query($conn,$sql);

              if(mysqli_num_rows($result)>0)
              {
                while ($row=mysqli_fetch_assoc($result)) {
              ?>
              <div class="">
                <h3>TOTAL CATEGORY</h3>
                <h3><?php echo $row['count(categoryname)'] ?></h3>
              </div>
              <?php
                }
              }else{
                echo "no post available";
              }
               mysqli_close($conn);
              ?>
              <div class="">
                <h1><i class="fa fa-comments" aria-hidden="true"></i></h1>
              </div>
            </div>
            <div class="box">
              <?php
              include 'config.php';
              $sql="SELECT count(PID) FROM product WHERE storeID='{$_SESSION['SID']}'";
              $result=mysqli_query($conn,$sql);

              if(mysqli_num_rows($result)>0)
              {
                while ($row=mysqli_fetch_assoc($result)) {


              ?>
              <div class="">
                <h3>TOTAL PRODUCTS</h3>
                <h3><?php echo $row['count(PID)'] ?></h3>
              </div>
              <?php
                }
              }else{
                echo "no post available";
              }
               mysqli_close($conn);
              ?>
              <div class="">
                <h1><i class="fa fa-comments" aria-hidden="true"></i></h1>
              </div>
            </div>
           
            <div class="box">
              <div class="">
                <h3>TOTAL ORDERS</h3>
                <h3>7</h3>
              </div>
              <div class="">
                <h1><i class="fa fa-comments" aria-hidden="true"></i></h1>
              </div>
            </div>
            <div class="box">
              <div class="">
                <h3>TOTAL PAYMENTS</h3>
                <h3>7</h3>
              </div>
              <div class="">
                <h1><i class="fa fa-comments" aria-hidden="true"></i></h1>
              </div>
            </div>

         </div>
   </section>
     <script type="text/javascript" src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"> </script>
  </body>
</html>
