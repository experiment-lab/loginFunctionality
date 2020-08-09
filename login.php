<?php session_start();?>
<?php

if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $connection=mysqli_connect('localhost','root','','registration');
    $query="SELECT * FROM std_reg WHERE email_id='{$email}' ";
    $select_user_query= mysqli_query($connection,$query);
    
    if(!$select_user_query){
        die('Query Failed');
    }
    while($row= mysqli_fetch_array($select_user_query)){
          $db_email= $row['email_id'];
         $db_password= $row['pw'];
        $db_name=$row['s_name'];
        $db_scholar=$row['sch_no'];
        $db_dept=$row['dept'];
        
}
    if($email==$db_email && !password_verify($password,$db_password)){
        echo "<h5 class='text-center mt-5'>Incorrect Login Details</h5>";
//        header("Location:login.php");
    
    } else if($email==$db_email && password_verify($password,$db_password)){
        $_SESSION['email']=$db_email;
        $_SESSION['name']=$db_name;
        $_SESSION['scholar']=$db_scholar;
        $_SESSION['dept']=$db_dept;
        header("Location:logout.php");
    }

        
    }
$message="";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="position: absolute;width: 300px;height: 350px;z-index: 15;top: 50%;left: 50%;margin: -150px 0 0 -150px;border: 2px solid black;">
        <h2 class="text-center">Student Login</h2>
        <hr style="border:1px solid black;">
        <h5><?php echo $message; ?></h5>
        <form action="" method="post">
               <label for="email">Email</label><br>
                <input  type="text" name="email" placeholder="Enter your email id"><br><br>
                <label for="password">Password</label><br>
                <input type="password" name="password" placeholder="Enter your password"><br><br>
                <input type="submit" name="submit" value="Login"><br><br>
        </form>
        <p>For student registraion <a href="registration.php">Click here</a></p>
    </div>
</body>
</html>
