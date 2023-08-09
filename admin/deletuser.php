<?php
include 'config.php';
 $Id=$_GET['id'];

  $sql="DELETE FROM users WHERE UID={$Id}";


  if(mysqli_multi_query($conn,$sql))
  {
  	 header("Location: http://localhost/grocery%20store/admin/users.php");
  }

 ?>
