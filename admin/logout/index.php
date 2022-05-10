<?php 
//  session_destroy();
 unset($_SESSION['username_login']);
 unset($_SESSION['image_login']);
 $alert= '<script type="text/javascript">';
        $alert .= 'alert("Log Out");';
        $alert .= 'window.location.href = "../admin/";';
        $alert .= '</script>';
        echo $alert;

?>