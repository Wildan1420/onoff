<?php 
	include('../connection/server.php')
?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<!-- head -->
<?php include ('include/head.php')?>
<!-- head -->
<!-- cript -->
<?php include ('include/script.php')?>
    <?php if(isset($_SESSION['username_login']) && !empty($_SESSION['username_login'])):?>

    <body class="app">
        <!-- header -->
        <?php include ('include/header.php')?>
        <!-- header -->

        <div class="app-wrapper">

            <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="container-xl">
                    <?php 
                        // print_r($_SESSION);
                        if(!isset($_GET['page']) && empty($_GET['page'])){
                            include ('dashboard/index.php');
                        }elseif(isset($_GET['page']) && $_GET['page'] == 'about'){
                            include ('about/index.php');
                        }elseif(isset($_GET['page']) && $_GET['page'] == 'product'){
                            include ('product/index.php');
                        }elseif(isset($_GET['page']) && $_GET['page'] == 'user'){
                            if(isset($_GET['function']) && $_GET['function'] == 'add'){
                                include ('user/insert.php');
                            }elseif(isset($_GET['function']) && $_GET['function'] == 'update'){
                                include ('user/edit.php');
                            }elseif(isset($_GET['function']) && $_GET['function'] == 'resetpassword'){
                                    include ('user/resetpassword.php');
                            }elseif(isset($_GET['function']) && $_GET['function'] == 'delete'){
                                include ('user/delete.php');
                            
                            }else{
                                include ('user/index.php');
                            }
                        }elseif(isset($_GET['page']) && $_GET['page'] == 'admin'){
                            if(isset($_GET['function']) && $_GET['function'] == 'add'){
                                include ('admin/insert.php');
                            }elseif(isset($_GET['function']) && $_GET['function'] == 'update'){
                                include ('admin/edit.php');
                            }elseif(isset($_GET['function']) && $_GET['function'] == 'resetpassword'){
                                    include ('admin/resetpassword.php');
                            }elseif(isset($_GET['function']) && $_GET['function'] == 'delete'){
                                include ('admin/delete.php');
                            
                            }else{
                                include ('admin/index.php');
                            }
                        }elseif (isset($_GET['page']) && $_GET['page'] == 'profile'){
                            include ('profile/index.php');
                        }elseif (isset($_GET['page']) && $_GET['page'] == 'logout'){
                                include ('logout/index.php');
                        }
                        
                    ?>

                </div>
                <!--//container-fluid-->
            </div>
            <!--//app-content-->

            <!--footer-->
            <?php include ('include/footer.php') ?>
            <!--footer-->

        </div>
        <!--//app-wrapper-->

    </body>

<?php else: ?>
    <?php include ('login/index.php') ?>
<?php endif; ?>
</html>