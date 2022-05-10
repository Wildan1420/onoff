<?php 
$username = $_SESSION['username_login'];
$sql = "SELECT * FROM tb_admin WHERE username ='$username'";
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_assoc($query);

//print_r($_POST);
if(isset($_POST) && !empty($_POST)){
    if(isset($_POST['profile'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $oldimage = $_POST['oldimage'];
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
                        $alert= '<script type="text/javascript">';
                        $alert .= 'alert("เพิ่มไฟล์เข้า folder ไม่สำเร็จ");';
                        $alert .= 'window.location.href = "?page=admin&function=add";';
                        $alert .= '</script>';
                        echo $alert;
                        exit();
                    }
                }else{
                    $newfilename = time().$filename;
                    if(move_uploaded_file($filetmp,$target.$newfilename)){
                        $filename = $newfilename;
                    }else{
                        $alert= '<script type="text/javascript">';
                        $alert .= 'alert("เพิ่มไฟล์เข้า folder ไม่สำเร็จ");';
                        $alert .= 'window.location.href = "?page=admin&function=add";';
                        $alert .= '</script>';
                        echo $alert;
                        exit();
                    }
                }
            }else{
                $alert= '<script type="text/javascript">';
                $alert .= 'alert("ประเภทไฟล์ไม่ถูกต้อง");';
                $alert .= 'window.location.href = "?page=admin&function=add";';
                $alert .= '</script>';
                echo $alert;
                exit();
            }
    
        }else{
            $filename = $oldimage;
        }
        //echo $filename;
        //exit();
        $sql ="UPDATE tb_admin SET firstname = '$firstname' ,lastname ='$lastname',email ='$email',phone = '$phone' 
        ,image = '$filename' WHERE username ='$username'";
        if (mysqli_query($conn,$sql)) {
            $_SESSION['image_login']=$filename;
            //echo "Updated successfully";
            $alert= '<script type="text/javascript">';
            $alert .= 'alert("Updated successfully");';
            $alert .= 'window.location.href = "?page=profile";';
            $alert .= '</script>';
            echo $alert;
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        mysqli_close($conn);
    }
    if(isset($_POST['changepassword'])){
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        $oldpassword = sha1(md5($_POST['oldpassword']));
        $newpassword = sha1(md5($_POST['newpassword']));
        $confirmpassword = sha1(md5($_POST['confirmpassword']));
            if(isset($oldpassword) && !empty($oldpassword)){
                $sql_check = "SELECT * FROM tb_admin WHERE username ='$username' AND password = '$oldpassword'"; 
                $query_check =mysqli_query($conn,$sql_check);
                $row_check =mysqli_num_rows($query_check);
                if($row_check == 0 ){
                    $alert= '<script type="text/javascript">';
                    $alert .= 'alert("old password incorrect please again");';
                    $alert .= 'window.location.href = "?page=profile";';
                    $alert .= '</script>';
                    echo $alert;
                    exit();
                }else{
                    if ($newpassword != $confirmpassword ){
                        $alert= '<script type="text/javascript">';
                        $alert .= 'alert("new password incorrect please again");';
                        $alert .= 'window.location.href = "?page=profile";';
                        $alert .= '</script>';
                        echo $alert;
                        exit();
                    }else{
                        $sql = "UPDATE tb_admin SET password='$newpassword' WHERE username = '$username'";
                        if (mysqli_query($conn,$sql)) {
                            //echo "Updated successfully";
                            $alert= '<script type="text/javascript">';
                            $alert .= 'alert("Changed password successfully");';
                            $alert .= 'window.location.href = "?page=profile";';
                            $alert .= '</script>';
                            echo $alert;
                            exit();
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        mysqli_close($conn);
                    }

                }
            }

    }
}
?>
<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title">My Account</h1>
    </div>
    <div class="col-auto">
        
    </div>
</div>
<div class="row gy-4">
    <div class="col-12 col-lg-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                            <div class="app-icon-holder">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                </svg>
                            </div><!--//icon-holder-->
                            
                        </div><!--//col-->
                        <div class="col-auto">
                            <h4 class="app-card-title">Profile</h4>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//app-card-header-->
                    <div class="app-card-body px-4 w-100">
                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="item-label mb-2"><strong>Image</strong></div>
                                    <div class="item-data">
                                        <img id = "preview" class="profile-image rounded-circle" src="upload/admin/<?=$_SESSION['image_login']?>" alt="">
                                    </div>
                                    
                                </div>
                                <!--//col-->
                                <div class="col text-end">
                                    <a class="btn-sm app-btn-secondary" onclick="return triggerFile();" href="#">Change</a>
                                    <input type="file" name="image" id="image" style="display:none;">
                                    <input type="hidden" name="oldimage" value="<?=$result['image']?>">
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item-->
                        <div class="item border-bottom py-3">
                            <div class="row  align-items-center">
                                <div class="">
                                    <div class="item-label mb-2"><strong>Firstame</strong></div>
                                    <div class="item-data"> <input type="text" class="form-control" name="firstname" value="<?=$result['firstname']?>"></div>
                                </div>
                            </div><!--//row-->
                        </div><!--//item-->
                        <div class="item border-bottom py-3">
                            <div class="row  align-items-center">
                                <div class="">
                                    <div class="item-label mb-2"><strong>Lastname</strong></div>
                                    <div class="item-data"> <input type="text" class="form-control" name="lastname" value="<?=$result['lastname']?>"></div>
                                </div>
                            </div><!--//row-->
                        </div><!--//item-->

                        <div class="item border-bottom py-3">
                            <div class="row  align-items-center">
                                <div class="">
                                    <div class="item-label mb-2"><strong>Email</strong></div>
                                    <div class="item-data"> <input type="text" class="form-control" name="email" value="<?=$result['email']?>"></div>
                                </div>
                            </div><!--//row-->
                        </div><!--//item-->

                        <div class="item border-bottom py-3">
                            <div class="row  align-items-center">
                                <div class="">
                                    <div class="item-label mb-2"><strong>Phone</strong></div>
                                    <div class="item-data"> <input type="text" class="form-control" name="phone" value="<?=$result['phone']?>"></div>
                                </div>
                            </div><!--//row-->
                        </div><!--//item-->
                    </div><!--//app-card-body-->
                    <div class="app-card-footer p-4 mt-auto">
                        <input type="hidden" name="profile">
                        <input type="submit" class="btn app-btn-secondary" value="Update Profile">
                    </div><!--//app-card-footer-->
            </div><!--//app-card-->
        </form>
    </div><!--//col-->
    <div class="col-12 col-lg-6">
        <form action="" method="post">
            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                <div class="app-card-header p-3 border-bottom-0">
                    <div class="row align-items-center gx-3">
                        <div class="col-auto">
                            <div class="app-icon-holder">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shield-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"/>
                                <path fill-rule="evenodd" d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            </div><!--//icon-holder-->
                            
                        </div><!--//col-->
                        <div class="col-auto">
                            <h4 class="app-card-title">Change password</h4>
                        </div><!--//col-->
                    </div><!--//row-->
                </div><!--//app-card-header-->
                <div class="app-card-body px-4 w-100">
                    
                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="">
                                <div class="item-label mb-2"><strong>Old password</strong></div>
                                <div class="item-data"> <input type="text" class="form-control" name="oldpassword" placeholder="Old password"></div>
                            </div>
                        </div><!--//row-->
                    </div><!--//item-->

                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="">
                                <div class="item-label mb-2"><strong>New password</strong></div>
                                <div class="item-data"> <input type="text" class="form-control" name="newpassword" placeholder="New password"></div>
                            </div>
                        </div><!--//row-->
                    </div><!--//item-->

                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="">
                                <div class="item-label mb-2"><strong>Confirm password</strong></div>
                                <div class="item-data"> <input type="text" class="form-control" name="confirmpassword" placeholder="Confirm password"></div>
                            </div>
                        </div><!--//row-->
                    </div><!--//item-->

                    <div class="item border-bottom py-3">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <div class="item-label"><strong>Two-Factor Authentication</strong></div>
                                <div class="item-data">You haven't set up two-factor authentication. </div>
                            </div><!--//col-->
                            <div class="col text-end">
                                <a class="btn-sm app-btn-secondary" href="#">Set up</a>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//item-->
                </div><!--//app-card-body-->
                
                <div class="app-card-footer p-4 mt-auto">
                    <input type="hidden" name = "changepassword" >
                    <input type="submit" class="btn app-btn-secondary" value="Updatepassword">
                </div><!--//app-card-footer-->
                
            </div><!--//app-card-->
        </form>
    </div>
</div><!--//row-->
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