<?php
include './header.php';

?>
<a href="./detail.php" class="btn btn-primary">Quay lại</a>
<a href="./detail.php" class="btn btn-success">Thêm</a>
<a href="./detail.php" class="btn btn-success">Sắp xếp</a>
<table class="table table-responsive">
    <thead>
        <tr>
            <th scope="col"> Mã số dự án </th>  
            <th scope="col">Mã số công việc</th>     
            <th scope="col">Tên công việc</th>
            <th class="col" scope="col">Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
        <!--xuất dữ liệu theo CSDL -->
        <?php
        //* B1: mở kết nối
        include './config.php';
        //* B2: Truy vấn
        $sql = "SELECT * FROM `task_list` ";

        //? lưu kết quả trả về $result
        $result = mysqli_query($conn, $sql);
        
        //* B3: Phân tích sử lý kết quả
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo '<td>' . $row['project_id'] . '</td>';
                echo '<td>' . $row['task_id'] . '</td>';
                echo '<td>' . $row['task'] . '</td>';
                echo '<td>
                <a href="./sua1.php?id=' . $row['project_id'] . '" class="btn btn-success">Sửa</a>
                <a href="./xoa1.php?id=' . $row['project_id'] . '" class="btn btn-danger">Xóa</a>
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