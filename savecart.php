<?php

  echo "hello";

 
  echo  $Qty=$_POST['quantity'];
  echo $weight=$_POST['PID'];

    include 'config.php';
  echo $sql1="INSERT INTO cart(UID,PID,quantity) VALUES( {$UID},{$PID},{$Qty} )";
       $result1=mysqli_query($conn,$sql1);
      // header("Location: http://localhost/grocery%20store/login.php");
    mysqli_close($conn);

 ?>
