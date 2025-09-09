<?php

include('config.php');

if(isset($_POST['submit'])){

   $filter_name = filter_var($_POST['name']);
   $name = mysqli_real_escape_string($conn, $filter_name);
   $filter_username = filter_var($_POST['username']);
   $username = mysqli_real_escape_string($conn, $filter_username);
   $filter_pass = filter_var($_POST['pass']);
   $pass = mysqli_real_escape_string($conn, md5($filter_pass));
   $filter_cpass = filter_var($_POST['cpass']);
   $cpass = mysqli_real_escape_string($conn, md5($filter_cpass));
   
   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, username, password) VALUES('$name', '$username', '$pass')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
      }
   }

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
// register error mg 
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span style="color:white;">'.$message.'</span>
         <i class="fas fa-times" style="color:white;" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<section class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <input type="text" name="name" class="box" placeholder="enter your name" required>
      <input type="text" name="username" class="box" placeholder="enter your username" required>
      <input type="password" name="pass" class="box" placeholder="enter your password" required>
      <input type="password" name="cpass" class="box" placeholder="confirm your password" required>
      <input type="submit" class="button" name="submit" value="register now">
      <p>already have an account? <a href="./login.php">login now</a></p>
   </form>

</section>

</body>
</html>