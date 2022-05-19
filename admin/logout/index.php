<?php 
//  session_destroy();
include ('include/head.php');
$id = $_SESSION['id_login'];
$sql = "UPDATE `tb_admin` SET `status`= '0' WHERE `id` = ".$id;
mysqli_query($conn,$sql);

 unset($_SESSION['username_login']);
 unset($_SESSION['image_login']);
        echo '<script>
        setTimeout(function() {
         swal({
             title: "Log out success!",
             text: "See you later.",
             type: "success"
         }, function() {
                window.location.href = "../login.php";
         });
     }, 1000);
 </script>';
?>