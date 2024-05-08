<?php
require 'index.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liet ke don hang</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
</style>

<body>
  <h1>Trang liet ke don hang</h1>
  <form method="POST" action="code.php">
    <label for="madh">Ma don hang:</label>
    <select name="madh" id="madh">
      <?php

      $sql = "SELECT * FROM DONHANG";
      $query = mysqli_query($con, $sql);

      if (mysqli_num_rows($query) > 0) {
        foreach ($query as $item) {
      ?>
          <option value="<?= $item['MaDH']; ?>"><?= $item['MaDH']; ?></option>
      <?php
        }
      }

      ?>
    </select>
    <button type="button" name="lietke_dh" id='lietke_dh'>Liet ke</button>
  </form></br>

  <table>
    <thead>
      <tr>
        <th>Ma SP</th>
        <th>Ten SP</th>
        <th>Hinh anh</th>
        <th>So luong</th>
        <th>Gia ban</th>
        <th>Chuc nang</th>
      </tr>
    </thead>

    <tbody></tbody>
  </table>

  <script>
    $(document).ready(function() {
      $("#lietke_dh").click(function() {
        const madh = $("#madh").val();
        $.ajax({
          url: "code.php",
          type: "GET",
          data: {
            madh: madh
          },
          success: function(response) {
            const dsSP = JSON.parse(response);
            const tableBody = $("tbody");
            tableBody.empty();
            for (let i = 0; i < dsSP.length; i++) {
              const sp = dsSP[i];

              const row = `
                <tr data-masp="${sp.MaSP}">
                  <td>${sp.MaSP}</td>
                  <td>${sp.TenSP}</td>
                  <td>
                    <img src="${sp.HinhAnh}" alt="${sp.HinhAnh}" width="50">
                  </td>
                  <td>${sp.SoLuong}</td>
                  <td>${sp.GiaBan}</td>
                  <td>
                    <button type="submit" id="delete">Delete</button>
                    <a href="updateSP.php?masp=${sp.MaSP}">View</a>
                  </td>
                </tr>
                `

              tableBody.append(row);
            }
          },
        });
      });


      // Gắn sự kiện click cho các nút "Delete"
      $("tbody").on("click", "#delete", function() {
        const row = $(this).closest('tr');
        const masp = row.data('masp');

        $.ajax({
          url: "code.php",
          type: "POST",
          data: {
            _method: "DELETE",
            masp: masp
          },
          success: function(data, status) {
            row.remove();
            alert("Xóa thành công");
          },
        })
      });

    });
  </script>
</body>

</html>