<?php include './header.php'; ?>

<a href=" ../logout.php " class="btn btn-danger "> Đăng xuất</a>
<a href="./detail.php" class="btn btn-success "> Dự án</a>
<table class="table table-responsive">
    <thead>
        <tr>
            <th scope="col">Mã số</th>
            <th scope="col">Họ Tên</th>          
            <th scope="col">Email</th>
            <th scope="col">Mật khẩu</th>
        </tr>
    </thead>
    <tbody>
        <!--xuất dữ liệu theo CSDL -->
        <?php
        //* B1: mở kết nối
        //* include './config.php';
        
    //Start Session
    session_start();


    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/db_quanli/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'db_quanli');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //SElecting Database   
       //* B2: Truy vấn
       $sql = "SELECT * FROM users ";

        //? lưu kết quả trả về $result
        $result = mysqli_query($conn, $sql);

        //* B3: Phân tích sử lý kết quả
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo '<td>' . $row['user_id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' .md5( $row['password'] ). '</td>';
                echo '</tr>';
            }
        }
        //* B4: đóng kết nối
        mysqli_close($conn);
        ?>
    </tbody>
</table>
<?php include './footer.php' ?>
