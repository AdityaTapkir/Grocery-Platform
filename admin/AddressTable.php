<?php
include 'header.php'; ?>
<head>
  <style media="screen">
    tbody th{
      text-transform: lowercase;
    }
  </style>
</head>
  <body>
    <header >
      <div class="adminlogo">
        <a href="#" class="logo"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Grocery</a>
      </div>
      <?php
      include 'dropdown.php' ?>
    </header>
    <section class="section">
      <div class="users">
         <h1>Address Table</h1>
      </div>
            <div class="usercontainer">
              <table class="table table-striped table-hover">
                <thead>
                <tr>
                  <th scope="col">UAID</th>
                  <th scope="col">UID</th>
                  <th scope="col">first_name</th>
                  <th scope="col">last_name</th>
                  <th scope="col">username</th>
                  <th scope="col">email</th>
                  <th scope="col">Address Line 1</th>
                  <th scope="col">Address Line 2</th>
                  <th scope="col">Country</th>
                  <th scope="col">State</th>
                  <th scope="col">Zip Code</th>


                </tr>
               </thead>
               <tbody>
                 <?php
                        echo $id=$_GET['id'];
                      include 'config.php';

                        $sql="SELECT * FROM useraddress   ";

                      $result2=mysqli_query($conn,$sql);

                      if(mysqli_num_rows( $result2 )>0)
                      {
                        while($row=mysqli_fetch_assoc($result2))
                        {


                 ?>
                <tr>
                  <th scope="row"><?php echo  $row['UAID'] ?></th>
                  <td><?php echo  $row['UID'] ?></td>
                  <td><?php echo  $row['fname'] ?></td>
                  <td><?php echo  $row['lname'] ?></td>
                  <td><?php echo  $row['username'] ?></td>
                  <td><?php echo  $row['email'] ?></td>
                  <td><?php echo  $row['address1'] ?></td>
                  <td><?php echo  $row['address2'] ?></td>
                  <td><?php echo  $row['country'] ?></td>
                  <td><?php echo  $row['state'] ?></td>
                  <td><?php echo  $row['zip'] ?></td>


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
