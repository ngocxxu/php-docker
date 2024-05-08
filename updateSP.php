<?php
require 'index.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Them khach hang</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <h1>Trang cap nhat san pham</h1>

  <form method="POST" action="code.php">
    <?php

    if (isset($_GET["masp"])) {
      $masp = $_GET["masp"];
      $sql = "SELECT DISTINCT * FROM SANPHAM SP
              JOIN CHITIETDONHANG CT ON SP.MaSP = CT.MaSP
              WHERE CT.MaSP = '$masp'";
      $query = mysqli_query($con, $sql);

      $product = $query->fetch_assoc();

      if ($query) {
    ?>
        <label for="masp">Ma san pham:</label>
        <input type="text" id="masp" name="masp" value="<?= $product['MaSP']; ?>" readonly /><br />

        <label for="tensp">Ten san pham:</label>
        <input type="text" id="tensp" name="tensp" value="<?= $product['TenSP']; ?>" readonly /><br />

        <label for="soluong">So luong:</label>
        <input type="text" id="soluong" name="soluong" value="<?= $product['SoLuong']; ?>" /><br />

        <label for="giaban">Gia ban:</label>
        <input type="number" id="giaban" name="giaban" value="<?= $product['GiaBan']; ?>" /><br />
    <?php
      }
    }

    ?>
    <button type="submit" name="update_sp" class="btn btn-primary">Cap nhat</button>
  </form>
</body>

</html>