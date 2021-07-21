<!-- Top Sale -->
<?php

shuffle($product_shuffle);
$showAlert = false;
$showError = false;

// request method post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (empty($_POST['username'] && $_POST['password'])) {
    $showError = true;
  } else {

    // call method LoginDatabase
    $formPassword = $_POST['password'];
    $username = $_POST['username'];
    $result =  $LoginDatabase->selectFromUser($username, $formPassword);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
      while ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($formPassword, $row['password'])) {
          session_start();
            $_SESSION['loggedin'] = true;
            //$_SESSION['sno'] = $row['sno'];
            $_SESSION['username'] = $username;
          header("Location: index.php?loggedinSuccess=true");
          exit();
        }else{
          $showError = true;
        }
      }
    } else {
      $showError = true;
    }
  }
}

?>
<!-- Signup template -->

<head>
  <link rel="stylesheet" href="logincss.css">
</head>

<!-- Alert Message -->
<div class="container">
  <?php
  if ($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>LoggedIn successfully !!!</strong> you are logged in successfully
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  ?>

  <?php
  if ($showError) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Invalid credentials !!!</strong> Your username or password is incorrect
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
  }
  ?>

</div>
<!-- !Alert Message -->


<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <!-- Icon -->
    <div class="fadeIn first">
      <h3 class="font-baloo">Login Here</h3>
    </div>

    <!-- Login Form -->
    <form method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="username" style="border-bottom: 2px solid #5fbae9;">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password" style="border-bottom: 2px solid #5fbae9;">
      <input type="submit" class="fadeIn fourth signupnow" placeholder="Login Now">
      <span>
      </span>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#" style="text-decoration: none;">Forgot Password?</a><br>
      <a href="signup.php" class="underlineHover" style="text-decoration: none;">New to Shopppe? Create an account</a>
    </div>


  </div>
</div>
<!-- !Signup template -->