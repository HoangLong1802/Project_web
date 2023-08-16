<?php
require("ketNoiDatabase.php");
$db = connect_db();
$id = $_GET['id'];
if (isset($_POST['masp']) && isset($_POST['URL'])) {
  $masp = $_POST['masp'];
  $sql = "DELETE FROM sanpham 
  WHERE masp = $masp";
  $link = "./imgaes/$_POST[URL]";
  if (file_exists($link)) {
    unlink($link);
  }
  $db->query($sql);
}
$sql = "SELECT * FROM account WHERE user_id=$id";
$query = $db->query($sql);
$row_acc = $query->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type="number"] {
      -moz-appearance: textfield;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: "Lato", sans-serif;
    }

    .home__page--wrap {
      width: 100%;
      height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .top_navication-lazadi {
      width: 100%;
      background-color: #E8DFCA;
      height: 80px;
      display: flex;
      justify-content: space-between;
    }

    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #E8DFCA;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
    }

    .sidenav a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #000;
      display: block;
      transition: 0.3s;
    }

    .sidenav a.active {
      background-color: #7895B2;
      color: #F5EFE6;
    }

    .sidenav a:hover {
      color: #AEBDCA;
    }

    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
    }

    @media screen and (max-height: 450px) {
      .sidenav {
        padding-top: 15px;
      }

      .sidenav a {
        font-size: 18px;
      }
    }

    .mid_navication-lazadi {
      background-color: #F5EFE6;
      height: 100vh;
      overflow-y: scroll;
    }

    .mid_navication-lazadi h1 {
      text-align: center;
      font-size: 50px;
    }

    #productlist {
      font-family: Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    #productlist td,
    #productlist th {
      border: 1px solid black;
      padding: 8px;
      text-align: center;
    }

    #productlist tr:nth-child(even) {
      background-color: #E8DFCA;
      font-size: 20px
    }

    #productlist tr:hover {
      background-color: #AEBDCA;
    }

    #productlist a {
      border: black solid 1px;
      background-color: #7895B2;
      color: white;
      padding: 10px;
      border-radius: 5px;
      width: 20px;
      height: 10px;
      cursor: pointer;
    }

    #productlist a:hover {
      color: #000;
      background-color: #F5EFE6;
    }

    #productlist th {
      padding-top: 12px;
      padding-bottom: 12px;
      font-size: 24px;
      text-align: left;
      background-color: #AEBDCA;
      color: black;
    }

    button {
      background-color: #E8DFCA;
      padding: 8px 16px;
      border-radius: 5px;
      font-size: 35px;
    }

    button:hover {
      background-color: #7895B2;
    }

    button a {
      color: black;
    }

    a {
      text-decoration: none;
    }

    .btn__add--control {
      text-align: center;
      margin-left: 650px;
      margin-top: 20px;
    }


    .right__top--nav {
      text-align: right;
      padding: 10px;
      font-size: 18px;
    }

    .right__top--nav a {
      color: blue;
      text-decoration: none;
    }

    .right__top--nav a:hover {
      color: black;
      text-decoration: underline;
    }
  </style>
  <link rel="stylesheet" href="css/main.css">
  <!-- <link rel="stylesheet" href="css/show.css"> -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Seller Pages</title>
</head>

<body>
  <div id="mySidenav" class="sidenav">
    <h2 style="margin-top: 20px; margin-left: 20px;font-weight:bold">OBW</h2>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="./home.php?id=<?php echo "$_GET[id]" ?>">Home</a>
    <a class="active" href="./show.php?id=<?php echo "$_GET[id]" ?>">Seller Page</a>
    <a href="./contact.php?id=<?php echo "$_GET[id]" ?>">Contact</a>
  </div>

  <div class="home__page--wrap">
    <div class="top_navication-lazadi">
      <div style="display: flex;">
        <span style="font-size: 40px; cursor: pointer" onclick="openNav()">&#9776;</span>
        <h2 style="margin-top: 20px; margin-left: 20px;font-weight:bold;">OBW</h2>
      </div>
      <div class="right__top--nav">
        <p><?= $row_acc['Ten'] ?></p>
        <a href="login.php">log out</a>
      </div>
    </div>
    <div class="mid_navication-lazadi">
      <h1>Product Management</h1>

      <table id="productlist">
        <tr>
          <th>Tên sản phẩm</th>
          <th>Giá sản phẩm</th>
          <th>Hình ảnh</th>
          <th>Mô tả</th>
          <th colspan="2">Hành động</th>
        </tr>
        <?php
        $sql = "SELECT * FROM sanpham 
        WHERE user_id=$id";
        $query = $db->query($sql);
        while ($row = $query->fetch_assoc()) {
          echo "
      <tr>
      <td>$row[tensp]</td>
      <td>$row[gia]&nbsp;VNĐ</td>
      <td>
      <img
      src='./imgaes/$row[imgURL]'
      alt='Product'
      style='width: 200px; height: 200px oject-fit: cover;' />
      </td>
      <td>$row[mota]</td>
      
      <td>
      <a href='./Suasanpham.php?pid=$row[masp]&id=$row[user_id]'>Sửa</a>
      </td>
      <td>
      <form action='show.php?id=$id' id='deleted$row[masp]' method='POST'>
        <input name='masp' type='hidden' value='$row[masp]'>
        <input name='URL' type='hidden' value='$row[imgURL]'>
      
      </form>
      <a onclick='xoa($row[masp])' >Xóa</a>
      </td>
      </tr>
      ";
        }
        ?>

      </table>
      <button class="btn__add--control">
        <a href="Themsanpham.php?id=<?php echo "$id" ?>">Thêm sản phẩm</a>
      </button>
    </div>
  </div>
</body>

<script>
  function xoa(n) {
    var awr = confirm('Xác nhận xóa')
    if (awr == true) {
      var cls = 'deleted' + n.toString()
      console.log(cls)
      document.getElementById(cls).submit()
      alert('Xóa thành công')
    } else {
      alert('Xóa không thành công');
    }
  }

  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
</script>

</html>

<?php
$db->close()
?>