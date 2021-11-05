<?php
include './header.php';
include './config.php';
$id = $_GET['id'];
?>
<a href="./detail.php" class="btn btn-success">Quay lại</a>
<h2>Thay đổi thông tin </h2>
<form action ="" method="post">
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Mã người dùng</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="user_id">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Mã số dự án</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="project_id">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Tên</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="project_name">
        </div>
    </div>

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Ngày bắt đầu</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="start_date" placeholder="YYYY-MM-DD">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Ngày kết thúc</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="end_date" placeholder="YYYY-MM-DD">
        </div>
    </div>
    <div class="form-group row">
        <label for="saveBtn" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <button type="submit" name="Save" class="btn btn-success">Lưu lại</button>
        </div>
    </div>

</form>

<?php
if (isset($_POST['Save'])) {
    $project_name = $_POST['project_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    //? câu lệnh truy vấn 
   $sql = "UPDATE `project_list` SET project_id= '$id', project_name = '$project_name' , start_date = '$start_date', end_date = '$end_date',user_id = '$user_id' WHERE project_id = $id";
    //? kiểm tra và thực thi câu lệnh
    if (mysqli_query($conn, $sql)) {
        header('location:./index.php');
    } else {
        header('location:error.php');
    }
}
//? đóng kết nối
mysqli_close($conn);

include './footer.php';
