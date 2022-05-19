<?php 
//print_r($_POST);
if(isset($_POST) && !empty($_POST)){
    //print_r($_POST);
    //echo '<pre>';
    //print_r($_FILES);
    //echo '</pre>';
    //exit();
    $username = $_POST['username'];
    $password = sha1(md5($_POST['password']));
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if(!empty($username)){
        $sql_check = "SELECT * FROM tb_admin WHERE username = '$username'";
        $query_check = mysqli_query($conn,$sql_check);
        $row_check = mysqli_num_rows($query_check);
            if($row_check > 0 ) {
                echo '<script>
                    setTimeout(function() {
                    swal({
                        title: "มีผู้ใช้งานนี้อยู่เเล้ว",
                        type: "error",
                        button: "OK",
                    }, function() {
                        window.location.href = "?page=admin&function=add";
                    });
                            }, 1000);
                    </script>';
                exit();
            }else{
                if(isset($_FILES['image']['name']) && !empty($_FILES['image']
        ['name'])){
        $extension = array("jpeg","jpg","png");
        $target = 'upload/admin/';
        $filename = $_FILES['image']['name'];
        $filetmp = $_FILES['image']['tmp_name'];
        $ext = pathinfo($filename,PATHINFO_EXTENSION);
        if(in_array($ext,$extension)){
            if(!file_exists($target.$filename)) {
                if(move_uploaded_file($filetmp,$target.$filename)){
                    $filename = $filename;
                }else{
                    echo '<script>
                    setTimeout(function() {
                     swal({
                         title: "เพิ่มไฟล์เข้า folder ไม่สำเร็จ",
                         type: "error",
                         button: "OK",
                     }, function() {
                        window.location.href = "?page=admin&function=add";
                     });
                            }, 1000);
                        </script>';
                        exit();
                }
            }else{
                $newfilename = time().$filename;
                if(move_uploaded_file($filetmp,$target.$newfilename)){
                    $filename = $newfilename;
                }else{
                    echo '<script>
                    setTimeout(function() {
                     swal({
                         title: "เพิ่มไฟล์เข้า folder ไม่สำเร็จ",
                         type: "error",
                         button: "OK",
                     }, function() {
                        window.location.href = "?page=admin&function=add";
                     });
                            }, 1000);
                        </script>';
                        exit();
                }
            }
        }else{
            echo '<script>
                    setTimeout(function() {
                     swal({
                         title: "ประเภทไฟล์ไม่ถูกต้อง",
                         type: "error",
                         button: "OK",
                     }, function() {
                        window.location.href = "?page=admin&function=add";
                     });
                            }, 1000);
                        </script>';
                        exit();
        }

    }else{
        $filename = '';
    }
    //echo $filename;
    //exit();

    $sql = "INSERT INTO tb_admin
            (firstname, lastname, email, phone, username, password,image)
    VALUES ('$firstname','$lastname','$email','$phone','$username','$password','$filename')";
    
    if (mysqli_query($conn,$sql)) {
        //echo "created successfully";
        echo '<script>
        setTimeout(function() {
         swal({
             title: "เพิ่ม admin สำเร็จ",
             type: "success",
             button: "OK",
         }, function() {
            window.location.href = "?page=admin";
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
    
}
?>
<script type="text/javascript">

</script>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title">เพิ่มข้อมูลผู้ดูเเลระบบ</h1>
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
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <div class="mb-3">
                                <img id="preview" class="rounded" width="100" height="100">
                            </div>
                            <button onclick="return triggerFile();" class="btn btn-success text-white">Choose file
                                image</button>
                            <input type="file" name="image" id="image" style="display:none;">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="admin"
                                autocomplete="off" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" placeholder="1234567"
                                autocomplete="off" required>
                        </div>
                        <hr class="mb-3 mt-4">
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Firstname</label>
                            <input type="text" class="form-control" name="firstname" placeholder="ABCD" value="<?=
                        (isset($_POST['firstname']) &&  !empty($_POST['firstname']) ? $_POST['firstname']:'' )?>"
                                autocomplete="off" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Laststname</label>
                            <input type="text" class="form-control" name="lastname" placeholder="EFGH" value="<?=
                        (isset($_POST['lastname']) &&  !empty($_POST['lastname']) ? $_POST['lastname']:'' )?>"
                                autocomplete="off" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Abcd@general.com" value="<?=
                        (isset($_POST['email']) &&  !empty($_POST['email']) ? $_POST['email']:'' )?>"
                                autocomplete="off" required>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="0123456789" value="<?=
                        (isset($_POST['phone']) &&  !empty($_POST['phone']) ? $_POST['phone']:'' )?>"
                                autocomplete="off" required>
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