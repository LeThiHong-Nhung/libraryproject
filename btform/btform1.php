<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Hình chữ nhật</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body style="font-size: 25px;">
    <?php
    if(isset($_POST['submit']))
    {       
        $rong = $_POST['rong'];
        $dai = $_POST['dai'];
        $rong=$rong+0;
        $dai=$dai+0;
        $dientich = $rong * $dai;
        $chuvi = ($dai + $rong)*2;
    }
    ?>
    <form action="" method="post">
        <table bgcolor="#fad390" align="center">
                <tr>
                    <td  colspan=2 bgcolor="#f6b93b" align="center">TÍNH TOÁN TRÊN HÌNH CHỮ NHẬT</td>
                </tr>
                <tr>
                    <td>Chiều dài: </td>
                    <td>
                        <input type="text" name="dai" value="<?php if(isset($dai)) {echo $dai;} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Chiều rộng: </td>
                    <td>
                        <input type="text" name="rong" value="<?php if(isset($rong)) {echo $rong;} ?>">
                    </td>
                </tr>

                <tr>
                    <td>Diện tích: </td>
                    <td>
                        <input type="text" name="dientich" style="background-color: #82ccdd;" readonly value="<?php if(isset($dientich)){ echo $dientich;} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Chu vi: </td>
                    <td>
                        <input type="text" name="chuvi" style="background-color: #82ccdd;" readonly value="<?php if(isset($chuvi)){ echo $chuvi;} ?>">
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <input type="submit" style="background-color: #38ada9; color: white; font-size:20px" name="submit"  value="Tính">
                    </td>
                </tr>
        </table>
    </form>
</body>
</html>