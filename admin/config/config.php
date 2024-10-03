<?php
// Sửa khoảng trắng trong mật khẩu (để trống nếu không có mật khẩu)
$mysqli = new mysqli("localhost", "root", "", "web_mysqli", 3306); // Cổng mặc định MySQL là 3306

// Kiểm tra kết nối
if ($mysqli -> connect_errno) {
  echo "Kết nối MYSQLi thất bại: " . $mysqli -> connect_error;
  exit();
}
?>
