<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logged In</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        table {
        border-collapse: collapse;
        }

        table, th, td {
        border: 2px solid black;
        }
    </style>
</head>
<body>
   <div class="container">
    <h3 class="text-center mt-3">Welcome <?php echo $_SESSION['name']; ?><br>You are now logged in</h3>
    
<!--    <input type="submit" name="logout" value="Log out">-->

<table  class="table  text-center">
    <tr>
        <td>Name</td>
        <td><?php echo $_SESSION['name']; ?></td>
    </tr>
    <tr>
        <td>Scholar No</td>
        <td><?php echo $_SESSION['scholar']; ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php echo $_SESSION['email']; ?></td>
    </tr>
    <tr>
        <td>Department</td>
        <td><?php echo $_SESSION['dept']; ?></td>
    </tr>
</table>
<form action="" method="post">
        <input type="submit" name="logout" value="Log out">
    </form>
</div>
</body>
</html>



<?php  
if(isset($_POST['logout'])){
    $_SESSION['email']=null;
        $_SESSION['name']=null;
    header("Location:login.php");
}

