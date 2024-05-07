<?php
include "index.php";

if (isset($_POST['them_kh'])) {
  // Nhan du lieu tu form
  $makh = $_POST['makh'];
  $tenkh = $_POST['tenkh'];
  $diachi = $_POST['diachi'];
  $sodt = $_POST['sodt'];

  // Viet lenh sql de them data
  $sql = "INSERT INTO KHACHHANG(MaKH, TenKH, DiaChi, SoDT) VALUES ('$makh', '$tenkh', '$diachi', '$sodt')";

  // Thuc thi
  $query = mysqli_query($con, $sql);
  if ($query) {
    echo "<h3>Them KH thanh cong</h3>";
  }
}

if (isset($_POST['them_dh'])) {
  // Nhan du lieu tu form
  $makh = $_POST['makh'];
  $madh = $_POST['madh'];
  $tendh = $_POST['tendh'];
  $ngaydat = date('Y-m-d', strtotime($_POST['ngaydat']));
  $tonggia = $_POST['tonggia'];
  $trangthai = isset($_POST['trangthai']) ? 1 : 0;

  // Viet lenh sql de them data
  $sql = "INSERT INTO DONHANG(MaDH,TenDH,NgayDat,TongGia,TrangThai,MaKH) VALUES ('$madh', '$tendh', '$ngaydat','$tonggia','$trangthai','$makh')";

  // Thuc thi
  $query = mysqli_query($con, $sql);
  if ($query) {
    echo "<h3>Them DH thanh cong</h3>";
  }
}
