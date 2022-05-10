<?php 
session_start();
    include ('connection/server.php');
    if(isset($_POST) && !empty($_POST)){
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // exit ();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = sprintf("SELECT * FROM tb_user WHERE username = '%s' AND password ='%s' AND status =0",$username,$password);
        // echo $sql;
        // exit();
        $query = mysqli_query($conn,$sql);
        $row = mysqli_num_rows($query);
        // echo $row;
        // exit();
        if($row > 0){
            $result = mysqli_fetch_assoc($query);
            $_SESSION['username_id'] = $result['id'];
            $message = 'log in successful';
            echo '<script>';
            echo 'alert("'.$message.'");';
            echo 'window.location.href = "index.php"';
            echo '</script>';
            exit();
        }else{
            $message = 'username and password is not correct';
            echo '<script>';
            echo 'alert("'.$message.'");';
            echo 'window.location.href = "login.php"';
            echo '</script>';
        }
    }
?>
<!DOCTYPE HTML>
<html lang="en">
  <?php include('includes/head.php');?>
  <body>
    <!-- navbar -->
    <?php include('includes/navbar.php'); ?>
    <!-- <h1 class="my-5 py-5 text-center bg-secondary bg-gradient text-white">Log in</h1> -->
    <!-- <div class="container mb-5">
        <div class="row">
            <div class="col-6 offset-3">
                <form method="post">
                    <div class="form-group mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username">
                        <div class="form-text">Please write your username</div>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        <div class="form-text">Please write your password</div>
                    </div>
                    <p><?=(isset($message) && !empty($message) ? $message : '' ) ?></p>
                    <button type="submit" class="btn btn-primary">Log in</button>
                </form>
            </div>
        </div>
    </div> -->
<div style ="padding-top:70px;"></div>
<div class="row g-0 app-auth-wrapper">
<div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
    <div style="padding-top:80px;">
        <img src="upload/logo1.jpg"  class="mx-auto d-block" alt="" style="width:65%; height:454.6px;">
    </div>
    <div class="auth-background-mask"></div>
    <div class="auth-background-overlay p-3 p-lg-5">
        <div class="d-flex flex-column align-content-end h-100">
            <div class="h-100"></div>
            <!-- <div class="overlay-content p-3 p-lg-4 rounded">
                <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
                <div>Portal is a free Bootstrap 5 admin dashboard template. You can download and view the template license <a href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.</div>
            </div> -->
        </div>
    </div><!--//auth-background-overlay-->
</div><!--//auth-background-col-->

<div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
    <div class="d-flex flex-column align-content-end">
        <div class="app-auth-body mx-auto">	
            <h2 class="auth-heading text-center mb-5">WELLCOME TO</h2>
            <div class="app-auth-branding mb-5"><a class="app-logo" href="index.html"><img class="logo-icon me-2 rounded" src="upload/logo1.jpg" alt="logo" style="width:50px; height:50px;"></a></div>
            <div class="auth-form-container text-start">
                <form acction="" method="post" class="auth-form login-form">         
                    <div class="email mb-3">
                        <input name="username" type="text" class="form-control signin-email" placeholder="username" 
                        required="required">
                    </div><!--//form-group-->
                    <div class="password mb-3">
                        <input name="password" type="password" class="form-control signin-password" placeholder="password" 
                        required="required">
                        <div class="extra mt-3 row justify-content-between">
                            <!-- <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="RememberPassword">
                                    <label class="form-check-label" for="RememberPassword">
                                    Remember me
                                    </label>
                                </div>
                            </div> -->
                            <!--//col-6-->
                            <!-- <div class="col-6">
                                <div class="forgot-password text-end">
                                    <a href="reset-password.html">Forgot password?</a>
                                </div>
                            </div> -->
                            <!--//col-6-->
                        </div><!--//extra-->
                    </div><!--//form-group-->
                    <div class="text-center mt-5">
                        <button type="submit" class="btn app-btn w-100 theme-btn mx-auto">Login</button>
                    </div>
                </form>
                
                <!-- <div class="auth-option text-center pt-5">No Account? Sign up 
                    <a class="text-link" href="signup.html" >here</a>.
                </div> -->
            </div>
            <!--//auth-form-container-->	

        </div><!--//auth-body-->	
    </div><!--//flex-column-->   
</div><!--//auth-main-col-->
    
    <!-- footer -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>