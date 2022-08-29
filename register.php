<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <!--  LOGO  SHOWN HERE -->
      <img src="assets/logo.png" alt="Project Logo">
      <div class="form-container">
         <form method="post" action="register.php">
            <h3 class="title">Register now</h3>
            <?php include('errors.php'); ?>
            <input type="username" name="username" placeholder="Enter your username" class="box" required>
            <input type="email" name="email" placeholder="Enter your email" class="box" required>
            <input type="password_1" name="password_1" placeholder="Enter your password" class="box" required>
            <input type="password_2" name="password_2" placeholder="Confirm your password" class="box" required>
            <input type="submit" value="register now" class="form-btn" name="reg_user">
            <p>Already have an account? <a href="login.php">Login now!</a></p>
         </form>
      </div>
   </body>
</html>