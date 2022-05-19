<?php 
 
	$sql = "SELECT * FROM tb_user";
	$query = mysqli_query($conn,$sql);
   
?>



<div class="row justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">ตารางข้อมูลสมาชิก</h1>
    </div>
    <div class="col-auto">

    </div>
</div>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">

            <div class="app-card-body">
                <table class="table table-hover" id="TableAll">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">ชื่อผู้ใช้</th>
                            <th scope="col">ชื่อ - นามสกุล</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">เบอร์โทรศัพท์</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">เมนู</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php foreach($query as $data):?>
                        <tr>
                            <td class="align-middle"><?=$data['username'] ?></td>
                            <td class="align-middle"><?=$data['firstname'].' '.$data['lastname'] ?></td>
                            <td class="align-middle"><?=$data['email'] ?></td>
                            <td class="align-middle"><?=$data['phone'] ?></td>
                            <td class="align-middle"><?=($data['status'] ? ' <span class="text-success"> เปิดใช้งาน </span>' :
                                ' <span class="text-danger"> ปิดใช้งาน </span>')?>
                            </td>
                            <td class="align-middle">
                                <a href="?page=<?=$_GET['page']?>&function=update&id=<?=
                                $data['id']?>" class="btn btn-sm btn-warning">เเก้ไข</a>
                                <a href="?page=<?=$_GET['page']?>&function=resetpassword&id=<?=
                                $data['id']?>" class="btn btn-sm btn-secondary">reset password</a>
                                <a href="?page=<?=$_GET['page']?>&function=delete&id=<?=
                                $data['id']?>" class="btn btn-sm btn-danger delete">ลบ</a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <!--//app-card-body-->

        </div>
        <!--//app-card-->
    </div>
</div>
<!--//row-->
<script type="text/javascript">
$(document).ready(function() {
    $('#TableAll').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "ไม่มีข้อมูล",
            "info": "เเสดง _START_ - _END_ จาก _TOTAL_ รายการทั้งหมด",
            "infoEmpty": "เเสดง 0 - 0 จาก 0 รายการทั้งหมด",
            "infoFiltered": "(filtered from _MAX_ total entries)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "เเสดง _MENU_ รายการ",
            "loadingRecords": "Loading...",
            "processing": "Processing...",
            "search": "ค้นหา:",
            "zeroRecords": "No matching records found",
            "paginate": {
                "first": "First",
                "last": "Last",
                "next": "หน้าถัดไป",
                "previous": "ก่อนหน้า"
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }
    });
});
$(document).ready(function() {
    $('.delete').click(function(e) {
        e.preventDefault();
        var id = $(this).val();
        swal({
                title: "Are you sure delete Username : <?=$data['username']?>",
                text: "Once deleted, you will not be able to recover!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            });
    });

});
</script>
<?php 
	mysqli_close($conn);
?>