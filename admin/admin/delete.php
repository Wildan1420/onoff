<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE  FROM tb_admin WHERE id ='$id'";
    
    if (mysqli_query($conn,$sql)) {
        //echo "created successfully";
        $alert= '<script type="text/javascript">';
        $alert .= 'alert("DELETE Successfully");';
        $alert .= 'window.location.href = "?page=admin";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
}
?>