<?php
require_once('ketnoidatabase.php');
$db = connect_db();
if (isset($_POST['submit'])) {
  $ten = "$_POST[last_name] $_POST[first_name]";
  $passwd = $_POST['passwd'];
  $email = $_POST['email'];
  $ngaysinh = $_POST['Ngaysinh'];
  $gioitinh = $_POST['gioitinh'];
  $sql = "SELECT email FROM account where email = '$email'";
  $query = $db->query($sql);
  $row = $query->fetch_assoc();
  if (isset($row['email'])) {
    echo "
    <script>alert('email $row[email] đã có người sử dụng')</script>
    ";
  }else{

    if ($_POST['passwd'] == $_POST['con_passwd']) {
        $sql = "INSERT INTO account(email,password,Ten,Ngaysinh, gioitinh) VALUE('$email','$passwd','$ten','$ngaysinh','$gioitinh')";
        $db->query($sql);
        $db->close();
        echo "
        <script>alert('Đăng ký thành công')
        window.location = 'login.php'; 
        </script>
        ";
      } else {
          echo "
        <script>alert('bạn đã nhập sai cú pháp vui lòng nhập lại')</script>
        ";
      }
  }}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/signup.css">
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign up</title>
</head>

<body>
  <div class="Sign_up__page--wrap">
    <div class="top_navication-lazadi"></div>
    <div class="mid_navication-lazadi">
      <div class="Sign_up__infor">
        <form action="signup.php" id="signup__form--wrap" method="post">
          <table>
            <tr>
              <th colspan="2">
                <h2>Đăng ký</h2>
              </th>
            </tr>
            <tr>
              <td>
                <label for="last_name">Họ: </label>
                <input class="inp__btn--wrap" type="text" required   name="last_name" id="last_name" placeholder="Nhập họ" />
              </td>
              <td>
                <label for="first_name">Tên: </label>
                <input class="inp__btn--wrap" type="text" required name="first_name" id="first_name" placeholder="Nhập tên" />
              </td>
            </tr>
            <tr>
              <td>
                <label for="Ngaysinh">Ngày sinh: </label>
                <input class="inp__btn--wrap" type="date" name="Ngaysinh" id="Ngaysinh" required />
              </td>
              <td>
                <label for="gioitinh" required>Giới tính: </label>
                <select name="gioitinh" id="gioitinh" required>
                  <option value="nam">Nam</option>
                  <option value="nu">Nu</option>
                  <option value="khac">khac</option>
                </select>
              </td>
            </tr>
            <tr>
              <td><label for="email">Email đăng ký: </label></td>
              <td>
                <input class="inp__btn--wrap" type="email" required name="email" id="email" placeholder="Nhập email" />
              </td>
            </tr>
            <tr>
              <td><label for="passwd">Password:</label></td>
              <td>
                <input class="inp__btn--wrap" type="password" required name="passwd" id="passwd" placeholder="Nhập password" />
              </td>
            </tr>
            <tr>
              <td><label for="con_passwd">Confirm password:</label></td>
              <td>
                <input class="inp__btn--wrap" type="password" required name="con_passwd" id="con_passwd" placeholder="Nhập password" />
              </td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: center">
                <button class="btn__wrap" name="submit" type="submit">Đăng ký</button>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
<?php
$db->close();
?>