<?php
require("ketnoiDatabase.php");
$db = connect_db();
$masp_v = (int)$_GET['pid'];
$id = (int)$_GET['id'];
$sql = "SELECT * FROM sanpham WHERE masp = $masp_v";
$query = $db->query($sql);
$row = $query->fetch_array();
$img = $row['imgURL'];
if (isset($_POST['submit'])) {
    echo 1;
    $gia = $_POST['gia'];
    $tensp = $_POST['ten'];
    $mota = $_POST['mota'];
    $masp = $_POST['masp'];
    $target_dir = "./imgaes/";
    $hinhanh = $_FILES['hinhanh']['name'];
    $target_file = $target_dir . $hinhanh;
    if ($hinhanh) {
        if (file_exists("./imgaes/" . $img)) {
            unlink("./imgaes/" . $img);
        }
        $target_file = $target_dir . $hinhanh;
    } else {
        $target_file = $target_dir . $img;
        $hinhanh = $img;
    }
    move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file);
    $sql = "UPDATE sanpham
        SET tensp = '$tensp', gia = $gia, mota='$mota', imgURL='$hinhanh'
        WHERE  masp = $masp";
    $db->query($sql);
    header("location:show.php?id=$id");
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

        .fix__form--wrap {
            display: flex;
            flex-direction: column;
            text-align: center;
            margin: 0px 40vh;
            justify-content: space-between;
            font-size: 20px;
            width: 900px;
        }

        .fix__form--wrap label {
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
        }

        .fix__content--wrap button:hover {
            background-color: #7895B2;
            color: white;
        }

        .fix__img--wrap {
            display: flex;
            width: 100%;
            justify-content: center;
            margin-left: 50px;
        }
    </style>
    <link rel="stylesheet" href="css/main.css">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sửa sản phẩm</title>
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
            <a href="show.php?id=<?= $id ?>">Quay về</a>
            <form class="fix__form--wrap" action="Suasanpham.php?pid=<?php echo "$masp_v&id=$id"; ?>" method="POST" enctype="multipart/form-data">
                <h1>Cập nhật sản phẩm</h1>
                <input name="masp" type="hidden" value="<?= $masp_v ?>">
                <div class="fix__content--wrap">
                    <label for="ten">Tên sản phẩm: </label>
                    <input type="text" class="ipn__sett--wrap" name="ten" id="ten" required value="<?= $row['tensp'] ?>" />
                </div>
                <div class="fix__content--wrap">
                    <label for="gia">Giá sản phẩm: </label>
                    <input type="number" class="ipn__sett--wrap" min=0 name="gia" id="gia" required value="<?= $row['gia'] ?>" />
                </div>
                <div class="fix__content--wrap fix__img--wrap">
                    <label for="img__wrap">Hình ảnh hiện tại:</label>
                    <img id="img__wrap" src="./imgaes/<?= $row['imgURL'] ?>" style="width: 400px;height: 400px;object-fit: contain;margin:0px 100px ;">
                </div>
                <div class="fix__content--wrap">
                    <label for="file">Hình ảnh</label>
                    <input type="file" name='hinhanh' class="ipn__sett--wrap" id="file" value="Chose File">
                </div>
                <div>

                    <label for="mota">Mô tả</label>
                    <textarea class="ipn__sett--wrap" name="mota" id="mota" cols="30" rows="10"><?= $row['mota'] ?></textarea>
                </div>
                <div class="fix__content--wrap">
                    <button name='submit' id='submit' type="submit">Cập nhật sản phẩm</button>
                </div>
            </form>
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