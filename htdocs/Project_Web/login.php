<?php
require_once('ketnoiDatabase.php');
$db = connect_db();
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $passwd = $_POST['passwd'];
  $sql = "SELECT email,password, user_id FROM account 
  WHERE email='$email'";
  $query = $db->query($sql);
  $row = $query->fetch_assoc();
  if (isset($row['email']) && $passwd == $row['password']) {
    $id = $row['user_id'];
    header("location:home.php?id=$id");
  } else {
    echo '
          <script>
            alert("Bạn đã nhập sai email hoặc số điện thoại! vui lòng nhập lại");
          </script>';
  }
}
?>
<script>
  document.location
</script>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/login.css">
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
</head>

<body>
  <div class="login__page--wrap">
    <div class="top_navication-lazadi">
      <h2 style="padding-top: 30px;">OBW</h2>
    </div>
    <div class="mid_navication-lazadi">
      <div class="login__infor">
        <h2>Đăng nhập</h2>
        <form action="login.php" method="post" id="login" class="mid__form--wrap">
          <label for="email_login">Số điện thoại hoặc email*</label>
          <input type="text" id="email_login" class="form__inp--wrap" name="email" required placeholder="Vui lòng nhập số điện thoại hoặc email của bạn" />
          <p class="err_email"></p>
          <label for="mat_khau">Mật khẩu*</label>
          <input type="password" name="passwd" class="form__inp--wrap" id="mat_khau" required placeholder="Vui lòng nhập mật khẩu của bạn" />
          <p class="err_pass"></p>
          <a href="" class="btn">Quên mật khẩu</a>
        </form>
        <div class="login__submit">
          <button type="submit" name="submit" form="login" class="login__btn--wrap login__format--btn">
            ĐĂNG NHẬP
          </button>
          <div style="
                background-color: black;
                width: 80%;
                height: 1px;
                border-radius: 20px;
              "></div>
          <p style="font-size: 20px">Hoặc, đăng nhập bằng</p>
          <a href="https://www.facebook.com" class="login__btn--wrap link__fb--wrap link__wrap"><img src="https://seeklogo.com/images/F/facebook-icon-circle-logo-09F32F61FF-seeklogo.com.png" alt="facebook_login" style="width: 30px; object-fit: contain" />Facebook</a>
          <a href="" class="login__btn--wrap link__gg--wrap link__wrap"><img src="https://www.pngkey.com/png/full/203-2034318_google-plus-logo-transparent-png-google-png-white.png" alt="Google_login" style="width: 30px; object-fit: contain" />Google</a>
          <a href="signup.php" class="btn">Đăng ký</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<?php $db->close() ?>