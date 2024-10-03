<?php
include('../../config/config.php');

// Lấy dữ liệu từ form POST
$tenloaisp = $_POST['tendanhmuc'];
$thutu = $_POST['thutu'];

if (isset($_POST['themdanhmuc'])) {
    // Câu lệnh SQL để thêm dữ liệu vào bảng tbl_danhmuc
    $sql_them = "INSERT INTO tbl_danhmuc (tendanhmuc, thutu) VALUES ('" . $tenloaisp . "', '" . $thutu . "')";
    mysqli_query($mysqli, $sql_them);
    header('Location: ../../index.php?action=quanlydanhmucsanpham&query=them');

    
}
elseif (isset($_POST['suadanhmuc'])) {
	$sql_update = "UPDATE tbl_danhmuc SET tendanhmuc='" . mysqli_real_escape_string($mysqli, $tenloaisp) . "', thutu='" . mysqli_real_escape_string($mysqli, $thutu) . "' WHERE id_danhmuc='" . mysqli_real_escape_string($mysqli, $_GET['iddanhmuc']) . "'";

    mysqli_query($mysqli, $sql_update);
    header('Location: ../../index.php?action=quanlydanhmucsanpham');
	
}
else{
	$id = $_GET['iddanhmuc'];
	$sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc = '".$id."'";
	 mysqli_query($mysqli, $sql_xoa);
	 header('Location: ../../index.php?action=quanlydanhmucsanpham');

}
?>
