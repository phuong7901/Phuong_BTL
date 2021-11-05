<?php
include './header.php';
include './config.php';
$id = $_GET['id'];
?>
<a href="./index.php" class="btn btn-success">Quay lại</a>
<h2>Thay đổi thông tin </h2>
<form action ="" method="post">
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Mã số</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="user_id">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Họ Tên</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="email">
        </div>
    </div>

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Mật khẩu</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="password">
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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    //? câu lệnh truy vấn 
   $sql = "UPDATE `users` SET user_id = '$id', name = '$name' , email = '$email', password = '$password' WHERE user_id = $id";
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
