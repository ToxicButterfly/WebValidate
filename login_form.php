<?php

include 'autoloader.php';

session_start();
if(isset($_POST['submit'])) {
    $rep = new JSONRepository();
    $error = $rep->user_check($_POST['login'], $_POST['password']);
    if(empty($error)){
        $_SESSION['user_name'] = $_POST['login'];
        header('location:user_page.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
   
<div class="form-container">

   <form action="" method="post" id="log_form">
      <h3>login now</h3>
       <?php
       if(isset($error)){
           echo '<span class="error-msg">'.$error.'</span>';
       };
       ?>
       <input type="login" name="login" required placeholder="enter your login">
       <input type="password" name="password" required placeholder="enter your password">
       <input type="submit" name="submit" value="login now" class="form-btn">
       <p>don't have an account? <a href="index.php">register now</a></p>
   </form>

</div>

</body>
</html>