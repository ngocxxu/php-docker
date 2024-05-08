<?php
include "index.php";

// ***** TẠO KHÁCH HÀNG *****
if (isset($_POST['them_kh'])) {
  // Nhan du lieu tu form
  $makh = $_POST['makh'];
  $tenkh = $_POST['tenkh'];
  $diachi = $_POST['diachi'];
  $sodt = $_POST['sodt'];

  $sql = "INSERT INTO KHACHHANG(MaKH, TenKH, DiaChi, SoDT) VALUES ('$makh', '$tenkh', '$diachi', '$sodt')";

  $query = mysqli_query($con, $sql);
  if ($query) {
    echo "<h3>Them KH thanh cong</h3>";
  }
}


// ***** TẠO ĐƠN HÀNG *****
if (isset($_POST['them_dh'])) {
  $makh = $_POST['makh'];
  $madh = $_POST['madh'];
  $tendh = $_POST['tendh'];
  $ngaydat = date('Y-m-d', strtotime($_POST['ngaydat']));
  $tonggia = $_POST['tonggia'];
  $trangthai = isset($_POST['trangthai']) ? 1 : 0;

  $sql = "INSERT INTO DONHANG(MaDH,TenDH,NgayDat,TongGia,TrangThai,MaKH)
          VALUES ('$madh', '$tendh', '$ngaydat','$tonggia','$trangthai','$makh')";

  $query = mysqli_query($con, $sql);
  if ($query) {
    echo "<h3>Them DH thanh cong</h3>";
  }
}


// ***** LẤY DANH SÁCH SẢN PHẨM *****
if (isset($_GET["madh"])) {
  $madh = $_GET['madh'];

  $sql = "SELECT *
            FROM SANPHAM SP
            JOIN CHITIETDONHANG CT ON SP.MaSP = CT.MaSP
            WHERE CT.MaDH = '$madh'";

  $query = mysqli_query($con, $sql);

  $products = array();

  while ($row = $query->fetch_assoc()) {
    $products[] = $row;
  }

  echo json_encode($products);
}


// ***** XÓA SẢN PHẨM *****
if (isset($_POST['_method']) && $_POST['_method'] === 'DELETE') {
  $masp = $_POST['masp'];

  $sql = "DELETE FROM CHITIETDONHANG CT WHERE CT.MaSP = '$masp'";
  $query = mysqli_query($con, $sql);
}


// ***** CẬP NHẬT SẢN PHẨM *****
if (isset($_POST['update_sp'])) {
  $masp = $_POST['masp'];
  $tensp = $_POST['tensp'];
  $soluong = $_POST['soluong'];
  $giaban = $_POST['giaban'];

  // Cập nhật bảng CHITIETDONHANG
  $sql = "UPDATE CHITIETDONHANG SET SoLuong='$soluong', GiaBan='$giaban' WHERE MaSP='$masp'";
  $query = mysqli_query($con, $sql);

  if ($query) {
    echo "<h3>Cap nhat SP thanh cong</h3>";
  } else {
    echo "<h3>Co loi xay ra khi cap nhat SP</h3>";
  }
}
