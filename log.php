<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Chandan's - login &amp; signup form</title>
  <link rel="stylesheet" href="./login.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="wrapper">
  <div class="title-text">
    <div class="title login">Login Here</div>
    <div class="title signup">Signup Here</div>
  </div>
  <div class="form-container">
    <div class="slide-controls">
      <input type="radio" name="slide" id="login" checked>
      <input type="radio" name="slide" id="signup">
      <label for="login" class="slide login">Login</label>
      <label for="signup" class="slide signup">Signup</label>
      <div class="slider-tab"></div>
    </div>
    <div class="form-inner">
      <form action="login.php" method="POST" class="login">
        <div class="field">
          <input type="text" name="email" placeholder="Email Address" required>
        </div>
        <div class="field">
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="pass-link"><a href="forgot_password.html">Forgot password?</a></div>
        <div class="field btn">
          <div class="btn-layer"></div>
          <input type="submit" value="Login">
          <div class="signup-link">Not a member? <a href="#">Signup now</a></div>
        </div>
      </form>      
      <form action="signup.php" method="POST" class="signup">
        <div class="field">
          <input type="text" name="email" placeholder="Email Address" required>
        </div>
        <div class="field">
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="field">
          <input type="password" name="confirm_password" placeholder="Confirm password" required>
        </div>
        <div class="field btn">
          <div class="btn-layer"></div>
          <input type="submit" value="Signup">
        </div>
      </form>      
    </div>
  </div>
</div>
<!-- partial -->
  <script  src="./login.js"></script>

</body>
</html>
