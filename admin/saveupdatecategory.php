
 <?php
    if(isset($_POST['button']))
    {
      $id=$_POST['id'];
      $catname=($_POST['categoryName']);
      $catdes=($_POST['categoryDescription']);
      include 'config.php';
        
       
       echo  $sql1="UPDATE  category SET   categoryname = '$catname',   categorydescription = '$catdes' WHERE CID = '{$id} ' ";
        $result1=mysqli_query($conn,$sql1);
        header("Location: http://localhost/grocery%20store/admin/category.php");
      
      mysqli_close($conn);
    }
  ?>
