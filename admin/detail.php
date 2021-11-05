<?php
include './header.php';

?>
<a href="./index.php" class="btn btn-primary">Quay lại</a>
<a href="./them.php" class="btn btn-success">Thêm</a>
<a href="./sapxep.php" class="btn btn-success">Sắp xếp</a>
<a href="./task.php" class="btn btn-success">Công việc</a>
<table class="table table-responsive">
    <thead>
        <tr>
            <th scope="col">Mã người dùng</th>
            <th scope="col">Mã số dự án</th>
            <th scope="col"> Tên</th>       
            <th scope="col">Ngày bắt đầu</th>
            <th scope="col">Ngày kết thúc</th>
            <th class="col" scope="col">Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
        <!--xuất dữ liệu theo CSDL -->
        <?php
        //* B1: mở kết nối
        include './config.php';
        //* B2: Truy vấn
        $sql = "SELECT * FROM `project_list` ";

        //? lưu kết quả trả về $result
        $result = mysqli_query($conn, $sql);
        
        //* B3: Phân tích sử lý kết quả
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo '<td>' . $row['user_id'] . '</td>';
                echo '<td>' . $row['project_id'] . '</td>';
                echo '<td>' . $row['project_name'] . '</td>';
                echo '<td>' . $row['start_date'] . '</td>';
                echo '<td>' . $row['end_date'] . '</td>';
                echo '<td>
                <a href="./sua.php?id=' . $row['project_id'] . '" class="btn btn-success">Sửa</a>
                <a href="./xoa.php?id=' . $row['project_id'] . '" class="btn btn-danger">Xóa</a>
                </td>';
                echo '</tr>';
            }
        }
        //* B4: đóng kết nối
        mysqli_close($conn);
        ?>
    </tbody>
</table>
<?php include './footer.php' ?>