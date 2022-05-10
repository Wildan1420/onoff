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

  <?php include('includes/slide-banner.php'); ?>
  <div style="padding:50px;">
    <!-- <div class="text-center">
      <img src="upload/K.png" alt="" height="350px" width="550px">
    </div> -->
    <div class="text-center" style="padding-top:20px;"><a class="btn btn-primary mx-auto" href="login.php" role="button">Get Start</a></div>

  </div>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  -->
</body>
</html>
