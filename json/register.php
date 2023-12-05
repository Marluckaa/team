<?php require("register.class.php");?>
<?php 
    if(isset($_POST["submit"])){
        $user = new RegisterUser($_POST['username'],$_POST['password'],$_POST['email'],$_POST['hometown'],$_POST['bday']);
    }
?>


<!doctype html>
<html lang="en">
<head>
  <title>A&M</title>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="login.css" >
</head>
<body>
  <div class="login-box">
    <h2>Register</h2>
    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="user-box">
      <input type="" name="username" required="">
        <label>Username</label>
      </div>
      <div class="user-box">
        <input type="text" name="email" required="">
        <label>Email</label>
      </div>
      <div class="user-box">`
        <input type="text" name="hometown" required="">
        <label>Hometown</label>
      </div>
      <div class="user-box">`
        <input type="date" name="bday" required="">
        <label>Birthday</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required="">
        <label>Password</label>
      </div>

      <a href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <button type="submit" name="submit">Register</button>
      </a>

      <a href="login.php">login here</a>

      <p class="error"></p>
        <p class="success" ></p>

        <p class="error"><?php echo @$user->error ?></p>
        <p class="success"><?php echo @$user->success ?></p>

    </form>
  </div>
</body>
</html>