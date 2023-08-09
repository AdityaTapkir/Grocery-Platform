
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
      $id=$_POST['id'];
     $pname=$_POST['pname'];
     $unit=$_POST['unit'];
     $weight=$_POST['weight'];
     $CID=$_POST['category'];
     $price=$_POST['price'];
     $prodes=$_POST['prodes'];

      include 'config.php';

        
        
       
       echo  $sql1="UPDATE  product SET   product_name = '{$pname}',   units = '{$unit}', image = '{$FileName}', weight = {$weight}, CID = {$CID}  , price= {$price},  product_description =    '{$prodes}'     WHERE PID = '{$id} ' ";
        $result1=mysqli_query($conn,$sql1);
        header("Location: http://localhost/grocery%20store/admin/products.php");
      
      mysqli_close($conn);
    }
  ?>
