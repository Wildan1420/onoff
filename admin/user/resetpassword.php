<?php 
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_user WHERE id ='$id'";
    $query =mysqli_query($conn,$sql);
    $result =mysqli_fetch_assoc($query); 
}
//print_r($_POST);
if(isset($_POST) && !empty($_POST)){
    $password = sha1(md5($_POST['password']));
    $confirmpassword = sha1(md5($_POST['confirmpassword']));
    if ($password != $confirmpassword ){
        echo '<script>
                setTimeout(function() {
                swal({
                    title: "รหัสผ่านไหม่ผิด กรอกอีกครั้ง",
                    type: "error",
                    button: "OK",
                }, function() {
                    window.location.href = "?page=admin&function=resetpassword&id='.$id.'";
                });
                        }, 1000);
            </script>';
        exit();
    }else{
        $sql = "UPDATE tb_user SET password='$password' WHERE id = '$id'";
        if (mysqli_query($conn,$sql)) {
            //echo "Updated successfully";
            echo '<script>
                setTimeout(function() {
                swal({
                    title: "เปลี่ยนรหัสผ่าน ผู้ใช้ : '.$result['username'].' เสร็จเรียบร้อย",
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
}
?>
<script type="text/javascript">

</script>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title">Reset password Username : <?=$result['username'] ?></h1>
    </div>
    <div class="col-auto">
        <a href="?page=<?=$_GET['page']?>" class="btn app-btn-secondary">ย้อนกลับ</a>
    </div>

<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">

            <div class="app-card-body">
                
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">New Password</label>
                        <input type="text" class="form-control" name="password" placeholder="1234567" autocomplete="off" required>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">Confirm Password</label>
                        <input type="text" class="form-control" name="confirmpassword" placeholder="1234567" autocomplete="off" required>
                    </div>
                    <button type="submit" class="btn app-btn-primary">Save Changes</button>
                </form>
            </div>
            <!--//app-card-body-->

        </div>
        <!--//app-card-->
    </div>
</div>
<!--//row-->

<!-- Jqueryscript -->

<script type="text/javascript">
function triggerFile(){
    //console.log('test')
    $("#image").trigger("click");
    return false;
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#image").change(function() {
    readURL(this);
});
</script>