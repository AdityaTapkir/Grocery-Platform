<?php

    if(isset($_POST['button']))
    {

        if(isset($_FILES['img']))
        {
             $errors =  array();
             $FileName=$_FILES['img']['name'];
             $FileSize=$_FILES['img']['size'];
             $FileTmpName=$_FILES['img']['tmp_name'];
             $FileType=$_FILES['img']['type'];
        /*     $FileExt= end(explode('.',$FileName));

             $extention = array("jpeg","jpg","png","jfif","webp");


             if(in_array($FileExt, $extention) === false)
             {
                $errors[]="This extention File not allowed";
             }

             if($FileSize>2097152)
             {
                $errors[]="File size must be less then 2mb";
             }

             if(empty($errors)==true)
             {
                move_uploaded_file($FileTmpName,"upload/".$FileName);

             }else
             {
                   print_r($errors);
                   die();
             }
             */
        }



     $pname=$_POST['pname'];
     $unit=$_POST['unit'];
     $weight=$_POST['weight'];
     $CID=$_POST['category'];
     $price=$_POST['price'];
     $prodes=$_POST['prodes'];


    include 'config.php';
     echo   $sql = " INSERT INTO product(product_name,units,image,weight,CID,price,product_description) VALUES('{$pname}',{$unit},'{$FileName}',{$weight},{$CID},{$price},'{$prodes}')";




      if(mysqli_query($conn,$sql))
      {
         header("Location: http://localhost/grocery%20store/admin/products.php");
     }else{
        echo "Query failed";
     }
     mysqli_close($conn);
   }
  ?>
