<?php
require_once('ketnoiDatabase.php');
$db = connect_db();
$id = $_GET['id'];
$sql = "SELECT * FROM account WHERE user_id=$id";
$query = $db->query($sql);
$row_acc = $query->fetch_assoc();
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
      background-color: #e8dfca;
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
      background-color: #e8dfca;
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
      background-color: #7895b2;
      color: #f5efe6;
    }

    .sidenav a:hover {
      color: #aebdca;
      text-decoration: unset;
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
      display: flex;
      flex-wrap: wrap;
      overflow: scroll;
      background-color: #F5EFE6;
      height: 100vh;
    }

    a {
      color: #000;
      text-decoration: none;
    }

    a:hover {
      color: blue;
      text-decoration: underline;
    }

    .contact__fixcon--wrap {
      padding: 100px;
      margin: 0 0 0 40vh;
      width: 450px;
      height: 500px;
      background-color: #AEBDCA;
      display: flex;
      flex-direction: column;
      font-size: 20px;
    }

    .contact__fix {
      font-weight: bold;
      margin-left: -25px;
      padding: 5px 0;
    }

    .contact__fix:hover {
      text-decoration: none;

    }

    .img__me--wrap {
      width: 400px;
      height: 500px;
      margin: 0px;
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

    .content__fix--wrap {
      display: flex;
      justify-content: space-between;
      flex-direction: column;
      width: 100%;
      height: 150px;
      margin-top: 50px;
      position: relative;
    }

    .add__infor--wrap {
      position: absolute;
      top: 200px;
      background-color: #7895B2;
      border: #7895B2 1px solid;
      border-radius: 5px;
      width: 320px;
      height: 50px;
      padding: 10px;
      text-align: center;
    }
  </style>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact</title>
</head>

<body>
  <div id="mySidenav" class="sidenav">
    <h2 style="margin-top: 20px; margin-left: 20px;">OBW</h2>
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="./home.php?id=<?php echo "$_GET[id]" ?>">Home</a>
    <a href="./show.php?id=<?php echo "$_GET[id]" ?>">Seller Page</a>
    <a class="active" href="./contact.php?id=<?php echo "$_GET[id]" ?>">Contact</a>
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
      <div class="contact__fixcon--wrap">

        <h1>My Contact</h1>
        <div class="content__fix--wrap">

          <div class="contact__content--wrap">
            <a onmouseover="outlook()" onmouseout="outlook_out()" href="mailto:long.207ct68647@vanlanguni.vn" class="contact__fix">
              <img src="https://cdn.icon-icons.com/icons2/2397/PNG/512/microsoft_office_outlook_logo_icon_145721.png" alt="outlook_icon" style="width: 30px;object-fit:contain;"> Outlook Mail
            </a>
            <p class="outlook add__infor--wrap" style="display: none;">Long.207ct68647@vanlanguni.vn</p>
          </div>
          <div class="contact__content--wrap">
            <a onmouseover="facebook()" onmouseout="facebook_out()" href="https://www.facebook.com/people/Long-Ho%C3%A0ng/100035875174510/" class="contact__fix" target="_blank"><img src="https://tuvaco.com.vn/wp-content/uploads/2018/01/facebook-icon-1024x1024.png" alt="facebook_icon" style="width: 30px;object-fit:contain;"> Facebook</a>
          </div>
          <p class="facebook add__infor--wrap" style="display: none;">Long Hoàng</p>

          <div class="contact__content--wrap">
            <a onmouseover="instagram()" onmouseout="instagram_out()" href="https://www.instagram.com/long_18_2/" class="contact__fix"><img src="https://cdn-icons-png.flaticon.com/512/174/174855.png" alt="instagram_icon" style="width: 30px;object-fit:contain;"> Instagram</a>
          </div>
          <p class="instagram add__infor--wrap" style="display: none;">Long_18_2</p>
        </div>
      </div>
      <div class="img__me--wrap">
        <img src="https://scontent.fsgn13-4.fna.fbcdn.net/v/t39.30808-6/309690946_801908904348275_7478871586932346044_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=g-_1GURvQY4AX9upMYp&tn=6IviUWtBqi4U3njB&_nc_ht=scontent.fsgn13-4.fna&oh=00_AfDbFTGUp0KLEmaSkHrxWv_8RTE_J84LIPvIejKzHp_HCA&oe=637F4890" style="width: 100%; height:100%;object-fit:cover;" alt="Long_hoang">
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

    function outlook() {
      document.getElementsByClassName('outlook')[0].style = "display:block;";
    }

    function outlook_out() {
      document.getElementsByClassName('outlook')[0].style = "display:none;";
    }

    function facebook() {
      document.getElementsByClassName('facebook')[0].style = "display:block;";
    }

    function facebook_out() {
      document.getElementsByClassName('facebook')[0].style = "display:none;";
    }

    function instagram() {
      document.getElementsByClassName('instagram')[0].style = "display:block;";
    }

    function instagram_out() {
      document.getElementsByClassName('instagram')[0].style = "display:none;";
    }
  </script>
</body>

</html>
<?php $db->close() ?>