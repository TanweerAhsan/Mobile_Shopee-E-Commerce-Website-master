<!-- Top Sale -->
<?php

    shuffle($product_shuffle);
    $showAlert = false;
    $showError = false;
    
    // request method post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){   
      if(empty($_POST['password'] && $_POST['username'] && $_POST['user_email'] )) {
        $showError = true;
      } else{
      // call method SignupDatabase
      $password = $_POST['password'];
      $password1 = password_hash($password, PASSWORD_DEFAULT);
      $result =  $SignupDatabase->insertIntoUser($_POST['username'], $_POST['user_email'],$password1);
      if($result){
        $showAlert = true;
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
if($showAlert){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Registered successfully !!!</strong> Click here to <a href="login.php" class="alert-link" style="color: #0000FF;"> Login </a> and starting shopping.
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
      <h3 class="font-baloo">Signup Here</h3>
    </div>

    <!-- Signup Form -->
    <form method="post">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="username" style="border-bottom: 2px solid #5fbae9;">
      <input type="email" id="email" class="fadeIn second" name="user_email" placeholder="Email" style="border-bottom: 2px solid #5fbae9;">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password" style="border-bottom: 2px solid #5fbae9;">
      <input type="submit" class="fadeIn fourth signupnow" placeholder="Signup Now">
      <span>
      <?php
if($showError){
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Please fill all the required input.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';  
}
?>
      </span>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="" href="#" style="text-decoration: none;">
        <h5 class="">Or Login With</h5>
        <img src="assets/Facebooklogo.png" alt="" style="height: 45px; width: 45px; margin-right: 23px">
        <img src="assets/google-logo.png" alt="" style="height: 45px; width: 45px; margin-right: 23px">
        <img src="assets/Linkedin_icon.svg.png" alt="" style="height: 45px; width: 45px;">
      </a>
    </div>

  </div>
</div>
<!-- !Signup template -->