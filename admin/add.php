<?php
include './header.php';
include './config.php';
?>

<form action="./add.php " method="post">
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
    $id = $_POST['user_id'];
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $password = $_POST['password'];
    //? câu lệnh
    $sql = "INSERT INTO users(user_id, name, email, password )
    VALUES ('$id','$name', '$email','$password' )";

    //? kiểm tra và thực thi lệnh
    if (mysqli_query($conn, $sql)) {
        header('location:./index.php');
    } else {
        header('location:Error.php');
    }
}


//? đóng kết nối
mysqli_close($conn);

include './footer.php';