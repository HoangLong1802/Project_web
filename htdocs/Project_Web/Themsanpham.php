<?php
require("ketnoiDatabase.php");
$db = connect_db();
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $tensp = $_POST['ten'];
    $gia = $_POST['gia'];
    $mota = $_POST['mota'];
    $hinhanh = $_FILES['hinhanh']['name'];

    $target_dir = "./imgaes/";

    $n = 0;
    if (isset($tensp) && isset($gia) && isset($mota) && isset($hinhanh)) {
        while ($temp = true) {
            if (!file_exists($target_dir . "h" . $n . $hinhanh)) {
                $hinhanh = "h" . $n . $hinhanh;
                $target_file = $target_dir . $hinhanh;
                move_uploaded_file($_FILES['hinhanh']['tmp_name'], $target_file);
                break;
            } else {
                $n = $n + 1;
                $temp = true;
            }
        }
        $sql = "INSERT INTO sanpham(tensp,gia,mota,imgURL,user_id) VALUE('$tensp','$gia','$mota','$hinhanh','$id')";
        $db->query($sql);
        echo "<script>alert('Bạn đã thêm thành công')
        window.location='show.php?id=$id'</script>";
    }
}
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
            overflow: unset;
        }

        body {
            font-family: "Lato", sans-serif;
        }

        .home__page--wrap {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 0;
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
            display: flex;
            flex-direction: column;
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
            height: 100%;
            overflow-y: scroll;
            margin: 0;
        }

        .mid_navication-lazadi h1 {
            text-align: center;
            font-size: 50px;
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

        form {
            width: 600px;
        }

        div {
            display: flex;
            margin-bottom: 20px;
        }

        label {
            width: 100px;
        }

        input,
        textarea {
            flex: 1;
        }

        /* button {
            margin-left: 100px;
            padding: 6px 12px;
            color: #2f1c25;
            background-color: transparent;
            border: 3px solid #d7b0df;
            border-radius: 8px;
            cursor: pointer;
        } */

        #form__wrap {
            display: flex;
            flex-direction: column;
            text-align: center;
            margin: 0px 40vh;
            font-size: 20px;
            width: 900px;
        }

        #form__wrap label {
            margin-right: 20px;
            width: 100px;
            height: 40px;
        }

        a {
            font-size: 20px;
            color: blue;
            text-decoration: none;
        }

        a:hover {
            color: #000;
            text-decoration: underline;
        }

        .ipn__sett--wrap {
            border: 1px #7895B2 solid;
            padding: 10px;
            font-size: 17px;
            border-radius: 10px;
            background-color: #AEBDCA;
            color: black;
            width: 60%;
        }

        .ipn__sett--wrap:focus {
            background-color: #7895B2;
        }

        .fix__content--wrap {
            margin: 10px 0px;
            width: 100%;
        }

        .fix__content--wrap button {
            width: 60vh;
            height: 50px;
            font-size: 24px;
            border: black 1px solid;
            border-radius: 10px;
            cursor: pointer;
            background-color: #AEBDCA;
            margin-left: 30vh;
        }

        .fix__content--wrap button:hover {
            background-color: #7895B2;
            color: white;
        }
    </style>
    <link rel="stylesheet" href="css/main.css">
    <!-- <link rel="stylesheet" href="css/add.css"> -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Thêm sản phẩm</title>
</head>


<body>
    <div id="mySidenav" class="sidenav">
        <h2 style="margin-top: 20px; margin-left: 20px;">OBW</h2>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="./home.php?id=<?php echo "$_GET[id]" ?>">Home</a>
        <a href="./show.php?id=<?php echo "$_GET[id]" ?>">Seller Page</a>
        <a href="./contact.php?id=<?php echo "$_GET[id]" ?>">Contact</a>
    </div>
    <div class="home__page--wrap">
        <div class="top_navication-lazadi">
            <div style="display: flex;">
                <span style="font-size: 40px; cursor: pointer" onclick="openNav()">&#9776;</span>
                <h2 style="margin-top: 20px; margin-left: 20px;">OBW</h2>
            </div>
        </div>
        <div class="mid_navication-lazadi">
            <a href="show.php?id=<?php echo "$id"; ?>">Quay về</a>
            <form action="Themsanpham.php?id=<?php echo "$id"; ?>" id="form__wrap" method="post" enctype="multipart/form-data">
                <h1>Thêm sản phẩm</h1>
                <div class="fix__content--wrap">
                    <label for="ten">Tên sản phẩm</label>
                    <input type="text" name="ten" class="ipn__sett--wrap" id="ten" required />
                </div>
                <div class="fix__content--wrap">
                    <label for="gia">Giá sản phẩm</label>
                    <input type="number" min=0 name="gia" class="ipn__sett--wrap" id="gia" required />
                </div>
                <div class="fix__content--wrap">
                    <label for="file">Hình ảnh</label>
                    <input type="file" id="file" value="Chose File" class="ipn__sett--wrap" name="hinhanh" required />
                </div>
                <div class="fix__content--wrap">
                    <label for="mota">Mô tả sản phẩm</label>
                    <textarea type="" name="mota" id="mota" cols="30" class="ipn__sett--wrap" rows="10" required></textarea>
                </div>
                <div class="fix__content--wrap">
                    <button type="submit" name="submit">Thêm sản phẩm</button>
                </div>
            </form>

            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="./home.php?id=<?php echo "$_GET[id]" ?>">Home</a>
                <a href="./show.php?id=<?php echo "$_GET[id]" ?>">Seller Page</a>
                <a href="./contact.html">Contact</a>
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

<?php

$db->close()

?>