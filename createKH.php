<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Them khach hang</title>
</head>

<body>
  <h1>Trang them khach hang</h1>
  <form method="POST" action="code.php">
    <label for="makh">Ma khach hang:</label>
    <input type="text" id="makh" name="makh" /><br />

    <label for="tenkh">Ten khach hang:</label>
    <input type="text" id="tenkh" name="tenkh" /><br />

    <label for="diachi">Dia chi:</label>
    <input type="text" id="diachi" name="diachi" /><br />
    
    <label for="sodt">So dien thoai:</label>
    <input type="number" id="sodt" name="sodt" /><br />

    <button type="submit" name="them_kh" class="btn btn-primary">Them</button>
  </form>
</body>

</html>