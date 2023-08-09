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
    <section class="section">
      <div class="users">
         <h1>CATEGORY TABLE</h1>

      </div>
            <div class="usercontainer">
              <table class="table table-striped table-hover">
                <thead>
                <tr>
                  <th scope="col">CID</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">Category Description</th>
                  <th scope="col">Actions</th>
                </tr>
               </thead>
               <tbody>
                 <?php

                   include 'config.php';
                   $sql="SELECT * FROM category";
                   $result=mysqli_query($conn,$sql) or die("query failed");

                   if(mysqli_num_rows($result)>0)
                   {
                     while ($row=mysqli_fetch_assoc($result)) {


                   ?>
                <tr>
                  <th scope="row"><?php  echo $row['CID'] ?></th>
                  <td><?php  echo $row['categoryname'] ?></td>
                  <td><?php  echo $row['categorydescription'] ?></td>
                  <td class='edit'><a href='updateCategory.php?id=<?php echo $row['CID'] ?>'><i class='fa fa-edit'></i></a></td>
                  <td class='delete'><a href='deletcategory.php?id=<?php echo $row['CID'] ?>'><i class='fa fa-trash-o'></i></a></td>

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
