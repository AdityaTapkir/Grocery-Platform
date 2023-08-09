<?php
include 'config.php';
 $Id=$_GET['id'];

  $sql="DELETE FROM cart WHERE CID={$Id}";


  if(mysqli_multi_query($conn,$sql))
  {
  	 header("Location: http://localhost/grocery%20store/addToCart.php");
  }

 ?>
