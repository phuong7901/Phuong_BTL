<?php
$id = $_GET['id'];

//?mở kết nối
include './config.php';

//? set câu lệnh truy vấn
$sql = "DELETE FROM `users` WHERE user_id = '$id'";

//? kiểm tra và thực thi câu lệnh
if (mysqli_query($conn, $sql)) {
    header('location:./index.php');
} else {
    header('location:error.php');
}

//? đóng kết nối
mysqli_close($conn);

include './index.php';