<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Kết quả thi đại học</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body style="font-size:25px;">
    <?php
    if(isset($_POST['submit']))
    {       
        /*$toan = (float)$toan;
        $ly = (float)$ly;
        $hoa = (float)$hoa;
        $diemchuan = (float)$diemchuan;*/
        $toan = $_POST['toan'];
        $ly = $_POST['ly'];
        $hoa = $_POST['hoa'];
        $diemchuan = $_POST['diemchuan'];
        $toan=$toan+0;
        $ly=$ly+0;
        $hoa=$hoa+0;
        $diemchuan=$diemchuan+0;
        $tongdiem = $toan + $ly + $hoa;
        $ketqua = "Rớt";
        if($toan!= 0 && $ly!=0 and $hoa!=0 and $tongdiem >= $diemchuan)
        {
            $ketqua = "Đậu";
        }
        
    }
    ?>
    <form action="" method="post">
        <table bgcolor="#f8a5c2" align="center">
                <tr>
                    <td  colspan=2 bgcolor="#cf6a87" align="center">KẾT QUẢ THI ĐẠI HỌC</td>
                </tr>
                <tr>
                    <td>Toán: </td>
                    <td>
                        <input type="text" name="toan" value="<?php if(isset($toan)) {echo $toan;} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Lý: </td>
                    <td>
                        <input type="text" name="ly" value="<?php if(isset($ly)) {echo $ly;} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Hóa: </td>
                    <td>
                        <input type="text" name="hoa" value="<?php if(isset($hoa)) {echo $hoa;} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Điểm chuẩn: </td>
                    <td>
                        <input type="text" style="color: red;" name="diemchuan" value="<?php if(isset($diemchuan)) {echo $diemchuan;} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Tổng điểm: </td>
                    <td>
                        <input type="text" style="background-color:#f7d794" name="tongdiem" readonly value="<?php if(isset($tongdiem)){ echo $tongdiem;} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Kết quả thi: </td>
                    <td>
                        <input type="text" style="background-color:#f7d794" name="ketqua" readonly value="<?php if(isset($ketqua)){ echo $ketqua;} ?>">
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <input type="submit" style="background-color: #c44569; font-size: 20px;" name="submit" value="Xem kết quả">
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><a href="javascript:window.history.go(-1)">Quay lại</a></td>
                </tr>
        </table>
    </form>
</body>
</html>