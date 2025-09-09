<?php

include('config.php');

session_start();


if(isset($_POST['submit'])){

   $filter_username = filter_var($_POST['username']);
   $username = mysqli_real_escape_string($conn, $filter_username);
   $filter_pass = filter_var($_POST['pass']);
   $pass = mysqli_real_escape_string($conn, md5($filter_pass));

   
   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username' AND password = '$pass'") or die('query failed');    
   


   if(mysqli_num_rows($select_users) > 0){
      
      $row = mysqli_fetch_assoc($select_users);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['username'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){ 

         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['username'];
         $_SESSION['user_id'] = $row['id'];
         header('location:index.php');

      }else{
         $message[] = 'no user found!';
      }

   }else{
      $message[] = 'incorrect username or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
// login error mg  
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
      <h3>login now</h3>
      <input type="text" name="username" class="box" placeholder="enter your User name" required>
      <input type="password" name="pass" class="box" placeholder="enter your password" required>
      <input type="submit" class="button" name="submit" value="login now">
      <p>don't have an account? <a href="./register.php">register now</a></p>
   </form>

</section>

</body>
</html>