<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tổng dãy số</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body style="font-size: 25px;">
    <?php
    function lasont($so)
    {
        $bool = true;
        for ($i = 2; $i < $so; $i++) {
            if ($so % $i == 0) {
                $bool = false;
            }
        }
        return $bool;
    }
    function tichsont($mang)
    {
        $tich = 1;
        foreach ($mang as $key => $value) {
            if (lasont($value)) {
                $tich *= $value;
            }
        }
        return $tich;
    }
    if (isset($_POST["submit"])) {
        $dayso = $_POST["dayso"];
        $mangso = explode(",", $dayso);
        $tong = 0;
        foreach ($mangso as $key => $value) {
            $tong += $value;
        }
        $tich = tichsont($mangso);
    }
    ?>
    <table bgcolor="#78e08f" align="center">
        <form action="" method="POST" align="center">
            <th colspan="2" style="text-align: center; background-color: #38ada9;">NHẬP VÀ TÍNH TRÊN DÃY SỐ</th>
            <tr>
                <td>Dãy số: </td>
                <td><input type="text" name="dayso" value="<?php if (isset($_POST["dayso"])) {
                                                                echo $_POST["dayso"];
                                                            } ?>"><b style="color: red">(*)</b></td>
            </tr>
            <tr>
            <tr>
                <td> </td>
                <td><input type="submit" style="font-size:20px; background-color: #fad390;" name="submit" value="Tổng dãy số"></td>
            </tr>
            <td>Tích: </td>
            <td><input type="text" style="background-color: #b8e994;color: red;" name="tongdayso" readonly value="<?php if (isset($tong)) {
                                                                        echo $tong;
                                                                    } ?>"></td>
            </tr>
            <td>Tích số nguyên tố: </td>
            <td><input type="text" style="background-color: #b8e994;color: red;" name="tichsonguyento" readonly value="<?php if (isset($tich)) {
                                                                                echo $tich;
                                                                            } ?>"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><b style="color: red">(*)</b>ác số được nhập cách nhau dấu phẩy ","</td>
            </tr>
        </form>
    </table>
</body>

</html>