<?php
// Bao gồm tệp kết nối cơ sở dữ liệu nếu chưa bao gồm
// require_once 'path/to/your/db_connection_file.php';

// Kiểm tra xem 'iddanhmuc' có được thiết lập trong URL hay không để tránh thông báo biến chưa xác định
if (isset($_GET['iddanhmuc'])) {
    // Khử dữ liệu để ngăn chặn SQL injection
    $iddanhmuc = mysqli_real_escape_string($mysqli, $_GET['iddanhmuc']);
    
    // Chuẩn bị truy vấn SQL để lấy danh mục
    $sql_su_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc = '$iddanhmuc' LIMIT 1";
    
    // Thực hiện truy vấn
    $query_sua_danhmucsp = mysqli_query($mysqli, $sql_su_danhmucsp);

    // Kiểm tra xem truy vấn có thành công và có kết quả hay không
    if ($query_sua_danhmucsp && mysqli_num_rows($query_sua_danhmucsp) > 0) {
        $row = mysqli_fetch_array($query_sua_danhmucsp);
    } else {
        echo "Không tìm thấy danh mục hoặc có lỗi trong truy vấn.";
        exit; // Thoát nếu không có kết quả
    }
?>

<p>Sửa danh mục sản phẩm</p>
<table border="1px" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo htmlspecialchars($iddanhmuc); ?>">
        <tr>
            <td>Tên danh mục</td>
            <td>
                <input type="text" name="tendanhmuc" value="<?php echo htmlspecialchars($row['tendanhmuc']); ?>"> 
            </td>
        </tr>
        <tr>
            <td>Thứ tự</td>
            <td>
                <input type="text" name="thutu" value="<?php echo htmlspecialchars($row['thutu']); ?>"> 
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm"> 
            </td>
        </tr>
    </form>
</table>

<?php
} // Đóng khối if ở đây
?>
