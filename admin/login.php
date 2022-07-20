<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>themelock.com - Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

      <!-- Global stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
      <link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
      <link href="assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
      <link href="assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
      <link href="assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
      <!-- /global stylesheets -->

      <!-- Core JS files -->
      <script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
      <script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
      <script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
      <script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
      <!-- /core JS files -->


      <!-- Theme JS files -->
      <script type="text/javascript" src="assets/js/core/app.js"></script>
      <!-- /theme JS files -->

</head>

<body>

      <!-- Page container -->
      <div class="page-container login-container">
            <!-- Page content -->
            <div class="page-content">
                  <!-- Main content -->
                  <div class="content-wrapper">
                        <!-- Content area -->
                        <div class="content">

                              <?php
                              require_once "controller/dbConfig.php";
                              if (!empty($_POST)) {
                                    unset($_SESSION['errorMsg']);

                                    $email    = $_POST['email'];
                                    $password = $_POST['password'];

                                    $selectQury  = "SELECT name, email FROM admins WHERE email = '{$email}' AND password = '{$password}' " ;
                                    $resultQury  = mysqli_query($dbCon,  $selectQury);
                                    $checkResult = mysqli_fetch_array($resultQury );

                                    // echo "<pre>";
                                    // print_r($checkResult=['name']);
                                    // print_r($checkResult=['email']);
                                    // echo "</pre>"; 

                                    if (!empty($checkResult)) {
                                          $_SESSION['userName'] = $checkResult['name'];
                                          $_SESSION['userEmail'] = $checkResult['email'];
                                          $_SESSION['suessMsg'] = 'You are Success Login';
                                          header("location: index.php");
                                    } else {
                                          $_SESSION['errorMsg'] = 'You Email and Password Does Not Match';
                                    }
                                    
                              }
                              ?>
                              <!-- Simple login form -->
                              <form action="" method="post">
                                    <div class="panel panel-body login-form">
                                          <div class="text-center">
                                                <?php
                                                if(!empty($_SESSION['errorMsg'])){
                                                      echo "<small>{$_SESSION['errorMsg']}</small>";
                                                      unset($_SESSION['errorMsg']);
                                                }
                                                
                                                ?>
                                                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                                                <h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
                                          </div>

                                          <div class="form-group has-feedback has-feedback-left" for="email">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email">
                                                <div class="form-control-feedback">
                                                      <i class="icon-user text-muted"></i>
                                                </div>
                                          </div>

                                          <div class="form-group has-feedback has-feedback-left" for="password">
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password">
                                                <div class="form-control-feedback">
                                                      <i class="icon-lock2 text-muted"></i>
                                                </div>
                                          </div>

                                          <div class="form-group">
                                                <button type="loginButton" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
                                          </div>

                                          <div class="text-center">
                                                <a href="login_password_recover.html">Forgot password?</a>
                                          </div>
                                    </div>
                              </form>
                              <!-- /simple login form -->


                              <!-- Footer -->
                              <div class="footer text-muted">
                                    &copy; 2022. <a href="#">MD SHAKIL SIKDER</a> by <a href="#" target="_blank">MD Shakil Sikder</a>
                              </div>
                              <!-- /footer -->

                        </div>
                        <!-- /content area -->

                  </div>
                  <!-- /main content -->

            </div>
            <!-- /page content -->

      </div>
      <!-- /page container -->

</body>

</html>