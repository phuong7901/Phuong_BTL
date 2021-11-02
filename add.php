<?php
include '../header.php';
include '../config.php';
?>

<form action="add.php" method="post">
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Mã số</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="ID">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Họ</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="Lname">
        </div>
    </div>

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Tên</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="Fname">
        </div>
    </div> 
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" name="Email">
        </div>
    </div>

    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Mật khẩu</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="Password">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Kiểu</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="Type">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Ngày tạo</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="date_created">
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
    $id = $_POST['ID'];
    $lname = $_POST['Lname']; 
    $fname = $_POST['Fname'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $type = $_POST['Type'];
    $date_created = $_POST['Date_created'];
    $bgroup = strtoupper($_POST['Bgroup']);
    //? câu lệnh
    $sql = "INSERT INTO users(id, lastname, firstname, email, password, type, date_created)
    VALUES ('$id','$lname','$fname','$email','$password','$type','$date_created','$bgroup')";

    //? kiểm tra và thực thi lệnh
    if (mysqli_query($conn, $sql)) {
        header('location:../index.php');
    } else {
        header('location:Error.php');
    }
}


//? đóng kết nối
mysqli_close($conn);

include '../footer.php';