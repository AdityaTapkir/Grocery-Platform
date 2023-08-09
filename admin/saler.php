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
         <h1>Saler Table</h1>

      </div>
            <div class="usercontainer">
              <table class="table table-striped table-hover">
                <thead>
                <tr>
                  <th scope="col">SID</th>
                  <th scope="col">Saler Name</th>
                  <th scope="col">Email Id</th>
                  <th scope="col">Mobile Number</th>
                  <th scope="col">Address</th>
                  <th scope="col">Actions</th>
                </tr>
               </thead>
               <tbody>
                 <?php

                        include 'config.php';
                        $sql="SELECT * FROM salesman ORDER BY SID DESC";
                      $result2=mysqli_query($conn,$sql);

                      if(mysqli_num_rows( $result2 )>0)
                      {
                        while($row=mysqli_fetch_assoc($result2))
                        {


                 ?>
                <tr>
                  <th scope="row"><?php  echo $row['SID']; ?></th>
                  <td><?php  echo $row['sname']; ?></td>
                  <td><?php  echo $row['email']; ?></td>

                  <td><?php  echo $row['mobile']; ?></td>
                  <td> <a href="storedetail.php?id=<?php  echo $row['SID']; ?> "><i class="fa fa-location-arrow" aria-hidden="true"></i></a> </td>

                  <td class='edit'><a href=' #'><i class='fa fa-edit'></i></a></td>
                  <td class='delete'><a href='deletsaler.php?id=<?php echo $row['SID'] ?>'><i class='fa fa-trash-o'></i></a></td>

                </tr>
                <?php
                     }
                   }else{
                    echo "empty";
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
