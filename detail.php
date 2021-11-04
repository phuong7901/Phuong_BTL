<?php
include './header.php';
$id = $_GET['id'];
?>
<a href="./index.php" class="btn btn-success">Quay lại trang chủ</a>

<table class="table table-responsive">
    <thead>
        <tr>
        <th scope="col">Mã số</th>
            <th scope="col">Họ</th> 
            <th scope="col">Tên</th>         
            <th scope="col">Email</th>
            <th scope="col">Mật khẩu</th>
            <th scope="col">Kiểu</th>
            <th scope="col">Ngày tạo</th>
        </tr>
    </thead>
    <tbody>
        <!--xuất dữ liệu theo CSDL -->
        <?php
        //* B1: mở kết nối
        include './config.php';
        //* B2: Truy vấn
        $sql = "SELECT * FROM `users` WHERE id = '$id' ";

        //? lưu kết quả trả về $result
        $result = mysqli_query($conn, $sql);
        $gender;

        //* B3: Phân tích sử lý kết quả
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['firstname'] . '</td>';
                echo '<td>' . $row['lastname'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['password'] . '</td>';
                echo '<td>' . $row['type'] . '</td>';
                echo '<td>' . $row['date_created'] . '</td>';
                echo '</tr>';
            }
        }
        //* B4: đóng kết nối
        mysqli_close($conn);
        ?>
    </tbody>
</table>
<?php include './footer.php' ?>