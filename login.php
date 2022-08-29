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
    <h2> SMOVE </h2>  
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
      <input type="email" name="email" placeholder="Enter your email" class="box" required>
      <input type="password" name="password" placeholder="Enter your password" class="box" required>
  		<button type="submit" class="form-btn" name="login_user">Login</button>
        <p>Not yet a member? <a href="register.php">Register now!</a></p>
  </form>

</body>
</html>