<?php 
session_start();
    include ('connection/server.php');
    include ('includes/head.php');
    // }
    if(isset($_POST) && !empty($_POST)){

        $username = $_POST['username'];
        $password = sha1(md5($_POST['password']));
        $password_user = $_POST['password'];

        $sql_admin = "SELECT * FROM tb_admin WHERE username ='$username' AND password ='$password'";
        $query_admin = mysqli_query($conn,$sql_admin);
        $row_admin = mysqli_num_rows($query_admin);

        $sql_user = sprintf("SELECT * FROM tb_user WHERE username = '%s' AND password ='%s'",$username,$password_user);
        $query_user = mysqli_query($conn,$sql_user);
        $row_user = mysqli_num_rows($query_user);
        // echo ($row);
        if($row_admin > 0){
            $result = mysqli_fetch_assoc($query_admin);
            $_SESSION['username_login']= $result['username'];
            $_SESSION['image_login']= $result['image'];
            $_SESSION['id_login']= $result['id'];
            $id = $result['id'];
            if($result['id'] >= 0){
                $sql = "UPDATE `tb_admin` SET `status`= '1' WHERE `id` = ".$id;
                mysqli_query($conn,$sql);
            } 
            echo '<script>
            setTimeout(function() {
             swal({
                 title: "Login success!",
                 text: "Welcome to my admin",
                 type: "success"
             }, function() {
                window.location.href = "admin/index.php";
             });
                    }, 1000);
                </script>';
            exit();
        }else if($row_user > 0){
            $result = mysqli_fetch_assoc($query_user);
           
            $_SESSION['username_login']= $result['username'];
            $_SESSION['id_login']= $result['id'];
            $id = $result['id'];
            if($result['id'] >= 0){
                $sql = "UPDATE `tb_user` SET `status`= '1' WHERE `id` = ".$id;
                mysqli_query($conn,$sql);
            }
            echo '<script>
            setTimeout(function() {
             swal({
                 title: "Login success!",
                 text: "Welcome to my onoff system",
                 type: "success"
             }, function() {
                window.location.href = "index.php";
             });
                    }, 1000);
                </script>';
            exit();
        }else{
            // $alert= '<script type="text/javascript">';
            // $alert .= 'alert("Username and Password is not corret");';
            // $alert .= 'window.location.href = "";';
            // $alert .= '</script>';
            // echo $alert;
            echo '<script>
            setTimeout(function() {
             swal({
                 title: "Login failed!",
                 text: "Username and Password is not corret",
                 type: "error"
             }, function() {
                window.location.href = "";
             });
                    }, 1000);
                </script>';
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
    <div style="padding-top:70px;"></div>
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div style="padding-top:80px;">
                <img src="upload/logo1.jpg" class="mx-auto d-block" alt="" style="width:65%; height:454.6px;">
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
            </div>
            <!--//auth-background-overlay-->
        </div>
        <!--//auth-background-col-->

        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <h2 class="auth-heading text-center mb-5">WELLCOME TO</h2>
                    <div class="app-auth-branding mb-5"><a class="app-logo" href="index.html"><img
                                class="logo-icon me-2 rounded" src="upload/logo1.jpg" alt="logo"
                                style="width:50px; height:50px;"></a></div>
                    <div class="auth-form-container text-start">
                        <form acction="" method="post" class="auth-form login-form">
                            <div class="email mb-3">
                                <input name="username" type="text" class="form-control signin-email"
                                    placeholder="username" required="required">
                            </div>
                            <!--//form-group-->
                            <div class="password mb-3">
                                <input name="password" type="password" class="form-control signin-password"
                                    placeholder="password" required="required">
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
                                </div>
                                <!--//extra-->
                            </div>
                            <!--//form-group-->
                            <div class="text-center mt-5">
                                <button type="submit" class="btn app-btn w-100 theme-btn mx-auto">Login</button>
                            </div>
                        </form>

                        <!-- <div class="auth-option text-center pt-5">No Account? Sign up 
                    <a class="text-link" href="signup.html" >here</a>.
                </div> -->
                    </div>
                    <!--//auth-form-container-->

                </div>
                <!--//auth-body-->
            </div>
            <!--//flex-column-->
        </div>
        <!--//auth-main-col-->

        <!-- footer -->

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>
</html>