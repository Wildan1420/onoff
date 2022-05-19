<?php 
    session_start();
    
    // if (!isset($_SESSION['username'])) {
    //     $_SESSION['msg'] = "You must log in first";
    //     header('location: login.php');
    // }

    // if (isset($_GET['logout'])) {
    //     session_destroy();
    //     unset($_SESSION['username']);
    //     header('location: login.php');
    // }
?>
<!DOCTYPE HTML>
<html lang="en">
<?php include('includes/head.php');?>

<body>
    <!-- navbar -->
    <?php include('includes/navbar.php'); ?>

    <div class="container my-5 mt-5 pt-5 text-center">
        <div style="padding:50px"></div>
        <div class="row">
            <div class="col-3">
                <ul class="list-group mt-4 ">
                    <li class="list-group-item text-dark p-3">
                        <h3>Control</h3>
                    </li>
                    <a href="?page=dashboard" class="list-group-item text-dark list-menu-custom my-2 
                        <?php echo !isset($_GET['page']) && empty($_GET['page']) ? 'active' : '' ?>">Streamroom</a>
                    <a href="?page=lightroom"
                        class="list-group-item text-dark list-menu-custom my-2
                        <?php echo isset($_GET['page']) && $_GET['page'] == 'lightroom' ? 'active' : ''  ?>">Lightroom</a>
                    <a href="?page=plugroom"
                        class="list-group-item text-dark list-menu-custom my-2 
                        <?php echo isset($_GET['page']) && $_GET['page'] == 'plugroom' ? 'active' : ''  ?>">Plugroom</a>
                    <!-- <a href="?page=setting" class="list-group-item text-dark list-menu-custom 
                        <?php echo isset($_GET['page']) && $_GET['page'] == 'logout' ? 'active' : ''  ?>">Setting</a> -->
                    <a href="?page=logout" class="list-group-item text-dark list-menu-custom my-2">Log out</a>
                    <!-- index.php?logout='1' -->
                </ul>
            </div>
            <div class="col-9">
                <div class="row">
                    <?php 
                        if(!isset($_GET['page']) && empty($_GET['page'])){
                            include ('dashboard.php');
                        }elseif(isset($_GET['page']) && $_GET['page'] == 'lightroom'){
                            include ('lightroom.php');
                        }elseif(isset($_GET['page']) && $_GET['page'] == 'plugroom'){
                            include ('plugroom.php');
                        }elseif (isset($_GET['page']) && $_GET['page'] == 'logout'){
                            include ('logout.php');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

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