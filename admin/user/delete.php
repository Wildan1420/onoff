<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE  FROM tb_user WHERE id ='$id'";
    
    if (mysqli_query($conn,$sql)) {
        //echo "created successfully";
        echo '<script>
                setTimeout(function() {
                swal({
                    title: "ลบบัญชีผู้ใช้นี้เรียบร้อย",
                    type: "success",
                    button: "OK",
                }, function() {
                    window.location.href = "?page=user";
                });
                        }, 1000);
            </script>';
    exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
}
?>