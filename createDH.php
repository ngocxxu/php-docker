<?php
require 'index.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Them khach hang</title>
</head>

<body>
  <h1>Trang them don hang</h1>
  <form method="POST" action="code.php">

    <label for="makh">Ten khach hang:</label>
    <select name="makh" id="makh">
      <?php
      $query = "SELECT * FROM KHACHHANG";
      $query_run = mysqli_query($con, $query);

      if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $item) {
      ?>
          <option value="<?= $item['MaKH']; ?>"><?= $item['TenKH']; ?></option>
      <?php
        }
      }
      ?>
    </select><br />

    <label for="madh">Ma don hang:</label>
    <input type="text" id="madh" name="madh" /><br />

    <label for="tendh">Ten don hang:</label>
    <input type="text" id="tendh" name="tendh" /><br />

    <label for="ngaydat">Ngay dat:</label>
    <input type="date" id="ngaydat" name="ngaydat" /><br />

    <label for="tonggia">Tong gia:</label>
    <input type="text" id="tonggia" name="tonggia" /><br />

    <label for="trangthai">Trang thai:</label>
    <input type="checkbox" id="trangthai" name="trangthai" checked value=true /><br />

    <button type="submit" name="them_dh" class="btn btn-primary">Them</button>
  </form>
</body>

</html>