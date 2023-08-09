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
         <h1>FEEDBACKS TABLE</h1>
         <div class="btn1">

         </div>
      </div>
            <div class="usercontainer">
              <table class="table table-striped table-hover">
                <thead>
                <tr>
                  <th scope="col">FID</th>
                  <th scope="col">Name</th>
                  <th scope="col">EmailID</th>
                  <th scope="col"> Message</th>
                  <th schope="col">Actions</th>
                </tr>
               </thead>
               <tbody>
                 <?php

                   include 'config.php';
                   $sql="SELECT * FROM feedback";
                   $result=mysqli_query($conn,$sql) or die("query failed");

                   if(mysqli_num_rows($result)>0)
                   {
                     while ($row=mysqli_fetch_assoc($result)) {


                   ?>
                <tr>
                  <th scope="row"><?php  echo $row['FID'] ?></th>
                  <td><?php  echo $row['name'] ?></td>
                  <td><?php  echo $row['email'] ?></td>
                  <td><?php  echo $row['COMMENT'] ?></td>
                  <td class='edit'><a href='#'><i class='fa fa-edit'></i></a></td>
                  <td class='delete'><a href='#'><i class='fa fa-trash-o'></i></a></td>
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
