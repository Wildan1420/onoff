<?php 
    include ('connection/server.php');
    include ('includes/head.php');
    if(isset($_POST) && !empty($_POST)){
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // exit ();
        $username = $_POST['username'];
        $password = sha1(md5($_POST['password']));
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql_check = "SELECT * FROM tb_user WHERE username = '$username'";
        $query_check = mysqli_query($conn,$sql_check);
        $row_check = mysqli_num_rows($query_check);
            if($row_check > 0 ) {
                echo '<script>
                setTimeout(function() {
                swal({
                    title: "มีผู้ใช้งานนี้อยู่เเล้ว",
                    type: "error",
                    button: "OK",
                }, function() {
                    window.location.href = "register.php";
                });
                        }, 1000);
                </script>';
                exit();
            }else{
                if(isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['repassword']) && 
                !empty($_POST['repassword'])){
                $password = sha1(md5($_POST['password']));
                $repassword =  sha1(md5($_POST['repassword']));
                if($password != $repassword){
                    echo '<script>
                    setTimeout(function() {
                    swal({
                        title: "password and confirm password not match",
                        type: "error",
                        button: "OK",
                    }, function() {
                        window.location.href = "register.php";
                    });
                            }, 1000);
                    </script>';
                    exit();
                }
                $password = md5($password);
                }else{
                    echo '<script>
                    setTimeout(function() {
                    swal({
                        title: "Please write your password",
                        type: "error",
                        button: "OK",
                    }, function() {
                        window.location.href = "register.php";
                    });
                            }, 1000);
                    </script>';
                    exit();
                }   
    
                $sql = sprintf("INSERT INTO tb_user (username,password,firstname,lastname,phone,email) VALUE 
                ('%s','%s','%s','%s','%s','%s')",$username,$password,$firstname,$lastname,$phone,$email);
                $query = mysqli_query($conn,$sql);
                if($query){
                    echo '<script>
                    setTimeout(function() {
                    swal({
                        title: "Sign up is successs",
                        type: "success",
                        button: "OK",
                    }, function() {
                        window.location.href = "login.php";
                    });
                            }, 1000);
                    </script>';
                    exit();
                }else{
                    echo '<script>';
                    echo 'alert("sign up is not success");';
                    echo 'window.location.href = "register.php"';
                    echo '</script>';
                    exit();
                    echo '<script>
                    setTimeout(function() {
                    swal({
                        title: "sign up is not success",
                        type: "error",
                        button: "OK",
                    }, function() {
                        window.location.href = "register.php";
                    });
                            }, 1000);
                    </script>';
                    exit();
                }
            // echo $sql;
            // exit();
            }
        
    }

?>
<!DOCTYPE HTML>
<html lang="en">
<?php include('includes/head.php');?>

<body>
    <!-- navbar -->
    <?php include('includes/navbar.php'); ?>
    <div style="padding-top:100px;"></div>
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-5 col-lg-4 h-100 auth-background-col">
            <div class="">
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

        <div class="col-12 col-md-7 col-lg-4 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="auth-form-container text-start">
                        <div class="row">
                            <h1 class="mb-5 text-center">Register</h1>
                            <div class="auth-form-container text-start">
                                <!-- <div class="col-6 offset-3"> -->
                                <form method="post">
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <!-- <label class="form-label">ชื่อ<span class="text-danger">*</span></label> -->
                                                <input type="text" class="form-control" name="firstname"
                                                    placeholder="firstname" autocomplete="off" required>
                                                <div class="form-text">Please write your firstname</div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <!-- <label class="form-label">นามสกุล<span class="text-danger">*</span></label> -->
                                                <input type="text" class="form-control" name="lastname"
                                                    placeholder="lastname" autocomplete="off" required>
                                                <div class="form-text">Please write your lastname</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <!-- <label class="form-label">อีเมลล์เเอดเเดรส<span class="text-danger">*</span></label> -->
                                                <input type="email" class="form-control" name="email"
                                                    placeholder="email-address" autocomplete="off" required>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <!-- <label class="form-label">เบอร์โทรศัพท์<span class="text-danger">*</span></label> -->
                                                <input type="text" class="form-control" name="phone" placeholder="phone"
                                                    autocomplete="off" maxLength="10" oninput="javascript: if(this.value.length > this.maxLength) this.
                                value = this.value.slice(0,this.maxLength);" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <!-- <label  class="form-label">Username <span class="text-danger">*</span></label> -->
                                        <input type="text" class="form-control" name="username" placeholder="username"
                                            autocomplete="off" required>
                                    </div>
                                    <div class="mb-3">
                                        <!-- <label  class="form-label">Password <span class="text-danger">*</span></label> -->
                                        <input type="password" class="form-control" name="password"
                                            placeholder="password" autocomplete="off" required>
                                    </div>
                                    <div class="mb-3">
                                        <!-- <label  class="form-label">Re-password <span class="text-danger">*</span></label> -->
                                        <input type="password" class="form-control" name="repassword"
                                            placeholder="re-password" autocomplete="off" required>
                                    </div>

                                    <button type="submit"
                                        class="btn app-btn w-100 theme-btn mx-auto text-center mt-1">Sign up</button>

                                </form>
                                <!-- </div> -->
                            </div>
                        </div>

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