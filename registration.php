
<?php

if(isset($_POST['submit'])){
    $s_name=$_POST['name'];
    $sch_no=$_POST['scholar'];
    $dept=$_POST['department'];
    $course=$_POST['course'];
    $sem=$_POST['semester'];
    $email_id=$_POST['email'];
    $pw=$_POST['password'];
    
    
    $connection=mysqli_connect('localhost','root','','registration');
    if(!empty($s_name) && !empty($sch_no) && !empty($email_id) && !empty($pw)){

    $pw = password_hash($pw, PASSWORD_DEFAULT);
    $query="INSERT INTO std_reg(sch_no,s_name,email_id,pw,dept,course,sem) VALUES('{$sch_no}','{$s_name}','{$email_id}','{$pw}','{$dept}','{$course}','{$sem}' ) ";
    $register_user_query= mysqli_query($connection,$query);
    if(!$register_user_query){
        die('Query Failed');
    }
        
        $message="Your registration is successful";
    }else{
        $message="Fields cannot be empty";
    }
    
    }else{
    $message="";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <div class="container mt-3 mb-3" style="border: 2px solid black;">
   <h2 class="text-center">Student Registration</h2>
      <hr style="border:1px solid black;">
      <h5 class="text-center"><?php echo $message; ?></h5>
       <form action="registration.php" method="post">
           <label for="name">Name </label><br>
           <input type="text" name="name" placeholder="Enter your full name"><br><br>
           <label for="scholar">Scholar No. </label><br>
           <input type="text" name="scholar" placeholder="Enter your scholar number"><br><br>
           <label for="department">Department </label><br>
           <select name="department">
<!--                     <option >Select Department</option>-->
                     <option value="CSE">CSE</option>
                     <option value="ECE">ECE</option>
                     <option value="MECH">MECH</option>
                     <option value="EE">EE</option>
                     <option value="CIVIL">CIVIL</option>
                     <option value="MSME">MSME</option>
                  </select><br><br>
            <label for="course">Course </label><br>
            <select name="course">
<!--                    <option >Select Course</option>-->
                    <option value="BTECH">BTECH</option>
                    <option value="MTECH">MTECH</option>
                    <option value="PHD">PHD</option>
                 </select><br><br>
            <label for="semester">Semester </label><br>
            <select name="semester">
<!--                    <option >Select Semester</option>-->
                    <option value="2">2</option>
                    <option value="4">4</option>
                    <option value="6">6</option>
                    <option value="8">8</option>             
                 </select><br><br>
           <label for="email">Email Id </label><br>
           <input type="text" name="email" placeholder="Enter your email id"><br><br>
           <label for="password">Password </label><br>
           <input type="password" name="password" placeholder="Enter password"><br><br>
          
           <input class="btn-btn primary" type="submit" value="Submit" name="submit"><br><br>
       </form>
       <p>For student Login <a href="login.php">Click here</a></p>
   </div>
   
    
</body>
</html>





