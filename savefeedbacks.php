
 <?php
    if(isset($_POST['button']))
    {
      $name=($_POST['name']);
      $email=($_POST['email']);
      $feedback=$_POST['message'];
      include 'config.php';

        $sql1="INSERT INTO feedback(name,email,COMMENT) VALUES( '$name','$email','$feedback')";
        $result1=mysqli_query($conn,$sql1);
        header("Location: http://localhost/grocery%20store/index.php");

      mysqli_close($conn);
    }
  ?>
