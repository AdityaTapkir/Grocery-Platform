<?php 
include 'config.php';
 $Id=$_GET['id'];
 $category=$_GET['catid'];
  $sql="DELETE FROM category WHERE CID={$Id}";
  

  if(mysqli_multi_query($conn,$sql))
  {
  	 header("Location: http://localhost/grocery%20store/admin/category.php");
  }
   
 ?>