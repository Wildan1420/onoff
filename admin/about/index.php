<?php 
    $id = 1;
    $sql = "SELECT * FROM tb_about WHERE id ='$id'";
    $query =mysqli_query($conn,$sql);
    $result =mysqli_fetch_assoc($query); 

//print_r($_POST);
if(isset($_POST) && !empty($_POST)){
    // print_r($_POST);
    // exit();
    $name = $_POST['name'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql ="UPDATE tb_about SET name = '$name' ,description ='$description',address ='$address',email = '$email' 
    ,phone = '$phone' WHERE id = '$id'";
    if (mysqli_query($conn,$sql)) {
        //echo "created successfully";
        $alert= '<script type="text/javascript">';
        $alert .= 'alert("managed my information successfully");';
        $alert .= 'window.location.href = "?page='.$_GET['page'].'";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    mysqli_close($conn);
}

?>
<div class="row justify-content-between">
<div class="col-auto">
    <h1 class="app-page-title">จัดการข้อมูลเกี่ยวกับฉัน</h1>
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
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" 
                        value="<?=$result['name']?>"autocomplete="off" required>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">Description</label>
                        <textarea name = "description" class="from-control"><?=$result['description']?></textarea>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label class="form-label">Address</label>
                        <textarea name = "address" class="from-control" style="height:300px"><?=$result['address']?></textarea>
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