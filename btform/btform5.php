<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tính tiền karaoke</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body style="font-size: 25px;">
    <?php
    if(isset($_POST['submit']))
    {       
        $batdau=0.0;
        $ketthuc=0.0;
        $batdau = $_POST['batdau'];
        $ketthuc = $_POST['ketthuc'];
        //$tienthanhtoan=0;
        if($ketthuc>$batdau)
        {
            if($batdau>=10 and $ketthuc>=10 and $batdau<24 and $ketthuc<=24)
            {
                if($ketthuc<17)
                {
                    $tienthanhtoan = ($ketthuc - $batdau)*20000;
                }
                elseif($batdau>=17)
                {
                    $tienthanhtoan = ($ketthuc - $batdau)*45000;
                }
                else {
                    $tienthanhtoan = (17-$batdau)*20000 + ($ketthuc-17)*45000;
                }
            }
            else{
                echo "Đây là giờ nghỉ!";
            }
        }
    }
    ?>
    <form action="" method="post">
        <table bgcolor="#33d9b2" align="center">
                <tr>
                    <td  colspan=2 bgcolor="#218c74" style="color:white" align="center">TÍNH TIỀN KARAOKE</td>
                </tr>
                <tr>
                    <td>Giờ bắt đầu: </td>
                    <td>
                        <input type="text" name="batdau" value="<?php if(isset($batdau)) {echo $batdau;} ?>">(h)
                    </td>
                </tr>
                <tr>
                    <td>Giờ kết thúc: </td>
                    <td>
                        <input type="text" name="ketthuc" value="<?php if(isset($ketthuc)){ echo $ketthuc;} ?>">(h)
                    </td>
                </tr>
                <tr>
                    <td>Tiền thanh toán: </td>
                    <td>
                        <input type="text" name="tienthanhtoan" style="background-color: #ffda79;" readonly value="<?php if(isset($tienthanhtoan)){ echo $tienthanhtoan;} ?>">(VNĐ)
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <input type="submit" style="background-color: #218c74; font-size: 20px;" name="submit" value="Tính tiền">
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><a href="javascript:window.history.go(-1)">Quay lại</a></td>
                </tr>
        </table>
    </form>
</body>
</html>