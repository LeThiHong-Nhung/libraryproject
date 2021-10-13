<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Thanh toán tiền điện</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body style="font-size:25px">
    <?php
    if(isset($_POST['submit']))
    {       
        $chuho = $_POST['chuho'];
        $chisocu = $_POST['chisocu'];
        $chisomoi = $_POST['chisomoi'];
        $dongia = $_POST['dongia'];
        $chisocu=$chisocu+0;
        $chisomoi=$chisomoi+0;
        $dongia=$dongia+0;
        $tien = ($chisomoi - $chisocu) * $dongia;
    }
    ?>
    <form action="" method="post">
        <table bgcolor="#fad390" align="center">
                <tr>
                    <td  colspan=2 bgcolor="#f6b93b" align="center">THANH TOÁN TIỀN ĐIỆN</td>
                </tr>
                <tr>
                    <td>Tên chủ hộ: </td>
                    <td>
                        <input type="text" name="chuho" value="<?php if(isset($chuho)) {echo $chuho;} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Chỉ số cũ: </td>
                    <td>
                        <input type="text" name="chisocu" value="<?php if(isset($chisocu)) {echo $chisocu;} ?>"> (KW)
                    </td>
                </tr>
                <tr>
                    <td>Chỉ số mới: </td>
                    <td>
                        <input type="text" name="chisomoi" value="<?php if(isset($chisomoi)) {echo $chisomoi;} ?>"> (KW)
                    </td>
                </tr>
                <tr>
                    <td>Đơn giá: </td>
                    <td>
                        <input type="text" name="dongia" value="<?php if(isset($dongia)) {echo $dongia;} else $dongia=20000; ?>"> (VNĐ)
                    </td>
                </tr>
                <tr>
                    <td>Số tiền thanh toán: </td>
                    <td>
                        <input type="text" name="tien" style="background-color: #82ccdd;" readonly value="<?php if(isset($tien)){ echo $tien;} ?>"> (VNĐ)
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <input type="submit" style="background-color: #38ada9; font-size: 20px;" name="submit" value="Tính">
                    </td>
                </tr>
        </table>
    </form>
</body>
</html>