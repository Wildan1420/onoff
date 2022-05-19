<?php 
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM tb_user WHERE id ='$id'";
    $query =mysqli_query($conn,$sql);
    $result =mysqli_fetch_assoc($query); 
}
//print_r($_POST);
if(isset($_POST) && !empty($_POST)){
    // print_r($_POST);
    // echo '<pre>';
    // // print_r($_FILES);
    // echo '</pre>';
    // exit();
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    // $oldimage = $_POST['oldimage'];
    // if(isset($_FILES['image']['name']) && !empty($_FILES['image']
    //     ['name'])){
    //     $extension = array("jpeg","jpg","png");
    //     $target = 'upload/admin/';
    //     $filename = $_FILES['image']['name'];
    //     $filetmp = $_FILES['image']['tmp_name'];
    //     $ext = pathinfo($filename,PATHINFO_EXTENSION);
    //     if(in_array($ext,$extension)){
    //         if(!file_exists($target.$filename)) {
    //             if(move_uploaded_file($filetmp,$target.$filename)){
    //                 $filename = $filename;
    //             }else{
    //                 $alert= '<script type="text/javascript">';
    //                 $alert .= 'alert("เพิ่มไฟล์เข้า folder ไม่สำเร็จ");';
    //                 $alert .= 'window.location.href = "?page=admin&function=add";';
    //                 $alert .= '</script>';
    //                 echo $alert;
    //                 exit();
    //             }
    //         }else{
    //             $newfilename = time().$filename;
    //             if(move_uploaded_file($filetmp,$target.$newfilename)){
    //                 $filename = $newfilename;
    //             }else{
    //                 $alert= '<script type="text/javascript">';
    //                 $alert .= 'alert("เพิ่มไฟล์เข้า folder ไม่สำเร็จ");';
    //                 $alert .= 'window.location.href = "?page=admin&function=add";';
    //                 $alert .= '</script>';
    //                 echo $alert;
    //                 exit();
    //             }
    //         }
    //     }else{
    //         $alert= '<script type="text/javascript">';
    //         $alert .= 'alert("ประเภทไฟล์ไม่ถูกต้อง");';
    //         $alert .= 'window.location.href = "?page=admin&function=add";';
    //         $alert .= '</script>';
    //         echo $alert;
    //         exit();
    //     }

    // }else{
    //     $filename = $oldimage;
    // }
    //echo $filename;
    //exit();
    $sql ="UPDATE tb_user SET firstname = '$firstname' ,lastname ='$lastname',email ='$email',phone = '$phone' WHERE id = '$id'";
    // echo $sql;
    if (mysqli_query($conn,$sql)) {
        //echo "created successfully";
        echo '<script>
            setTimeout(function() {
            swal({
                title: "เเก้ไขข้อมูลสำเร็จ",
                type: "success",
                button: "OK",
            }, function() {
                window.location.href = "?page=user&function=update&id='.$id.'";
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
<script type="text/javascript">

</script>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title">เเก้ไขข้อมูลผู้ดูเเลระบบ</h1>
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
                        <!-- <div class="mb-3">
                            <label class="form-label">Image</label>
                            <div class="mb-3">
                                <img id="preview" src="upload/admin/<?=$result['image']?>" class="rounded" width="100"
                                    height="100">
                            </div>
                            <button onclick="return triggerFile();" class="btn btn-success text-white">Choose file
                                image</button>
                            <input type="file" name="image" id="image" style="display:none;">
                            <input type="hidden" name="oldimage" value="<?=$result['image']?>">
                        </div> -->
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="<?=$result['username']?>"
                                placeholder="admin" autocomplete="off" required disabled>
                        </div>
                        <hr class="mb-3 mt-4">
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Firstname</label>
                            <input type="text" class="form-control" name="firstname" placeholder="ABCD"
                                value="<?=$result['firstname']?>" autocomplete="off" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Laststname</label>
                            <input type="text" class="form-control" name="lastname" placeholder="EFGH"
                                value="<?=$result['lastname']?>" autocomplete="off" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Abcd@general.com"
                                value="<?=$result['email']?>" autocomplete="off" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="0123456789"
                                value="<?=$result['phone']?>" autocomplete="off" required>
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
function triggerFile() {
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