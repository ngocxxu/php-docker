<?php
require 'index.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liet ke don hang</title>
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
      $query = "SELECT * FROM DONHANG";
      $query_run = mysqli_query($con, $query);

      if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $item) {
      ?>
          <option value="<?= $item['MaDH']; ?>"><?= $item['MaDH']; ?></option>
      <?php
        }
      }
      ?>
    </select>
    <button type="button" name="lietke_dh" id='lietke_dh' class="btn btn-primary">Liet ke</button>
  </form></br>

  <table">
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

    <tbody>
    </tbody>
    </table>

    <script>
      $(document).ready(function() {
        $("#lietke_dh").click(function() {
          const madh = $("#madh").val();

          $.ajax({
            url: "get_products.php",
            type: "GET",
            data: {
              madh: madh
            },
            success: function(response) {
              var products = JSON.parse(response);
              var tableBody = $("tbody");
              tableBody.empty();

              for (var i = 0; i < products.length; i++) {
                var product = products[i];
                var row = '<tr>' +
                  '<td>' + product.MaDH + '</td>' +
                  '<td>' + product.name + '</td>' +
                  '<td><img src="' + product.image + '" alt="' + product.name + '" width="50"></td>' +
                  '<td>' + product.quantity + '</td>' +
                  '<td>' + product.price + '</td>' +
                  '<td><button class="delete">Delete</button> <button class="view">View</button></td>' +
                  '</tr>';
                tableBody.append(row);
              }
            },
            error: function() {
              alert("Đã xảy ra lỗi khi lấy danh sách sản phẩm.");
            }
          });
        });
      });
    </script>
</body>

</html>