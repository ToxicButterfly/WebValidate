<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/reg.js"></script>

</head>
<body>

<div class="form-container">

   <form action="" method="post" id="reg_form" class="my-form">
       <h3>register now</h3>
       <input type="text" id="reg_login" name="login" required placeholder="enter your login">
       <span id="error_login"></span>
       <input type="text" id="reg_email" name="email" required placeholder="enter your email">
       <span id="error_email"></span>
       <input type="password" id="reg_password" name="password" required placeholder="enter your password">
       <span id="error_pass"></span>
       <input type="password" id="reg_cpassword" name="cpassword" required placeholder="confirm your password">
       <input type="name" id="reg_name" name="name" required placeholder="enter your name">
       <span id="error_name"></span>
       <input type="submit" name="submit" value="register now" class="form-btn">
       <p>already have an account? <a href="login_form.php">login now</a></p>
   </form>
</div>

<script>
</script>

</body>
</html>