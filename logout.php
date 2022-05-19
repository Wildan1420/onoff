<?php 
//  session_destroy();
include ('includes/head.php');
include ('connection/server.php');
$id = $_SESSION['id_login'];
$sql = "UPDATE `tb_user` SET `status`= '0' WHERE `id` = ".$id;
mysqli_query($conn,$sql);
unset($_SESSION['username_login']);
//  $alert= '<script type="text/javascript">';
//         $alert .= 'alert('."$id".');';
//         $alert .= 'window.location.href = "../onoff/login.php";';
//         $alert .= '</script>';
        echo '<script>
        setTimeout(function() {
         swal({
             title: "Log out success!",
             text: "See you later.",
             type: "success"
         }, function() {
                window.location.href = "../onoff/login.php"; //หน้าที่ต้องการให้กระโดดไป
         });
     }, 1000);
 </script>';

?>