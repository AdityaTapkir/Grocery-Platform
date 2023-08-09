 <?php
 include 'header.php'; ?>



    <section class="section">

      <div class=" adminname">
         <h1>Hello <?php
           echo $_SESSION['sname'];

          ?></h1>
      </div>
      <div class="icons">
           <div class="">
               <a href="dashboard.php"><img src="dashboard1.png" alt=""></a>
               <h1>Dashboard</h1>
           </div>
           <div class="">
                <a href="order.php"> <img src="order.png" alt=""></a>
               <h1>Order</h1>
           </div>
           <div class="">
               <a href="products.php"> <img src="products.png" alt=""></a>
               <h1>Products</h1>
           </div>

           <div class="">
               <a href="category.php"> <img src="category.png" alt=""></a>
               <h1>Category</h1>
           </div>
           <div class="">
              <a href="#"> <img src="feedbacks.png" alt=""></a>
               <h1>Feedback</h1>
           </div>


      </div>

  </section>
  <script type="text/javascript" src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"> </script>
  </body>
</html>
