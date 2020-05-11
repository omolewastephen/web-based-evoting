<?php require 'theme\init.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>E-Voting | FPI SUG</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/animate.css"/>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" href="assets/css/pnotify.custom.min.css"/>
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css"/>
    <link rel="stylesheet" href="assets/css/login.css"/>

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
	<link rel="manifest" href="site.webmanifest">
</head>
<body>
	<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5" style="border-right: 2px solid #d0d0ce">
            <img src="assets/img/vote2.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="assets/img/logo.png" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Admin Login</p>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="loginform">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required placeholder="***********">
                  </div>
                  <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                </form>
                <nav class="login-card-footer-nav">
                  <a href="https://github.com/omolewastephen">Developed with <i class="fa fa-heart" style="color: red"></i> by OMOLEWA STEPHEN AYOBAMI </a> &middot;
                  <a href="#!">H/CS/18/0607</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>



<script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/pnotify.custom.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>