<?php include('includes/conn.php'); ?>
<?php
if (isset($_SESSION['username'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=dashboard.php\">";
    exit();
} else {
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Flux Games - Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
  <?php
            $uid = @$_POST['email'];
            $pwd = @$_POST['password'];
            $error = "";
            if (isset($_POST['login'])) {
                //Error Handlers
                //Check if inputs are empty
                if (empty($uid) || empty($pwd)) {
                    $error = "
                    <div class='alert alert-danger' role='alert'>
                    You Cannot Leave The Input Fields Empty!
</div>";
                } else {
                    $sql = "SELECT * FROM admin WHERE email='$uid'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck < 1) {
                        $error = "
                        <div class='alert alert-danger' role='alert'>
                        Username is incorrect!
</div>";
                    } else {
                        if ($row = mysqli_fetch_assoc($result)) {
                            $id_login = $row['id'];
                            $username_login = $row['email'];
                            $password_login = $row['password'];
                            //dehashing the password        
                            if ($pwd == $password_login) {
                                $_SESSION['id'] = $id_login;
                                $_SESSION['username'] = $username_login;
                                $_SESSION['password'] = $password_login;
                                echo "<meta http-equiv=\"refresh\" content=\"0; url=dashboard.php\">";
                                exit();
                            } else {
                                $error = "
                                <div class='alert alert-danger' role='alert'>
                                Unknown Credentials. Check Again Your Inputs!
</div>";
                            }
                        }
                    }
                }
            }
            ?>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <center><img src="assets/images/logo.png"></center><br>
                <h3 class="card-title text-left mb-3">Login</h3>
                <?php
                  echo $error;
                ?>
                <form action="index.php" method="POST">
                  <div class="form-group">
                    <label>Username or email *</label>
                    <input type="text" name="email" value="<?php echo $uid; ?>" class="form-control p_input">
                  </div>
                  <div class="form-group">
                    <label>Password *</label>
                    <input type="password" name="password" class="form-control p_input">
                  </div>
                  <br>
                  <div class="text-center">
                    <button type="submit" name="login" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                  </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>