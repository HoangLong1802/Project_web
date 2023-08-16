<?php
require_once('ketnoiDatabase.php');
$db =connect_db();
$id = isset($_GET['id']) ? $_GET['id'] : null;
$sql = "SELECT * FROM account WHERE user_id=$id";
$query = $db->query($sql);
if ($query) {
  $row_acc = $query->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style>
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

    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      margin: 20px;
      text-align: center;
      font-family: arial;
      margin-top: 25px;
      background-color: #AEBDCA;
      width: 300px;

    }

    .card img {
      background-color: #AEBDCA;
      width: 300px;
      height: 200px;
      object-fit: cover;
    }

    .price {
      color: grey;
      font-size: 22px;
    }

    .card button {
      border: none;
      outline: 0;
      padding: 12px;
      color: black;
      background-color: #7895B2;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }

    .card button:hover {
      color: white;
    }

    .mid_navication-lazadi {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      overflow: scroll;
      background-color: #F5EFE6;
      height: 100vh;
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
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Online Bussiness Website</title>
</head>

<body>
  <div id="mySidenav" class="sidenav">
    <h2 style="margin-top: 20px; margin-left: 20px;">OBW</h2>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a class="active" href="./home.php?id=<?php echo "$id" ?>">Home</a>
    <a href="./show.php?id=<?php echo "$id" ?>">Seller Page</a>
    <a href="./contact.php?id=<?php echo "$id" ?>">Contact</a>
  </div>

  <div class="home__page--wrap">
    <div class="top_navication-lazadi">
      <div style="display: flex;">
        <span style="font-size: 40px; cursor: pointer" onclick="openNav()">&#9776;</span>
        <h2 style="margin-top: 20px; margin-left: 20px;">OBW</h2>
      </div>
      <div class="right__top--nav">
        <p><?php
        if (isset($row_acc['Ten']))
        {
          echo $row_acc['Ten'];
        }
        ?>
</p>
        <a href="login.php">log out</a>
      </div>
    </div>
    <div class="mid_navication-lazadi">
      <?php
      $sql = "SELECT * FROM sanpham";
      $query = $db->query($sql);
      while ($row = $query->fetch_assoc()) {
        $hinhanh = $row['imgURL'];
        $ten = $row['tensp'];
        $gia = $row['gia'];
        $mota = $row['mota'];
        echo "<div class='card'>
      <img
        src='./imgaes/$row[imgURL]'
        alt='$row[imgURL]'
        style='width: 100%' />
      <h1>$ten</h1>
      <p class='price'>$gia vnd</p>
      <p>
        $mota
      </p>
      <p><button>Buy Now</button></p>
    </div>";
      }
      ?>
    </div>
  </div>
  </div>
  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
  </script>
</body>

</html>
<?php $db->close() ?>