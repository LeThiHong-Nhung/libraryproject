<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Phép tính trên hai số</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style1.css'>
    <script src='main.js'></script>
</head>
<body style="font-size: 25px;">
<?php
if(isset($_POST['submit']))
{
    $sothunhat = 0.0;
    $sothuhai = 0.0;
    $sothunhat = $_POST['sothunhat'];
    $sothuhai = $_POST['sothuhai'];
    $pheptinh = $_POST['pheptinh'];
    
}


?>
    <form action="ketquapheptinh.php" method="POST" name="formnhaplieu" style="border: 1px solid #84817a;">
        <table align="center">
            <tr>
                <td colspan="2" class="bluen"  style="text-align: center;">PHÉP TÍNH TRÊN HAI SỐ</td>
            </tr>
            <tr>
                <td class="brownb">Chọn phép tính: </td>
                <td class="brown">
                    <input type="radio" name="pheptinh" value="Cộng"> Cộng 
                    <input type="radio" name="pheptinh" value="Trừ"> Trừ 
                    <input type="radio" name="pheptinh" value="Nhân"> Nhân 
                    <input type="radio" name="pheptinh" value="Chia"> Chia
                    <input type="radio" name="pheptinh" value="Lấy dư"> Lấy dư
                </td>
            </tr>
            <tr>
                <td class="blue">Số thứ nhất: </td>
                <td>
                    <input type="text" name="sothunhat" value="<?php if(isset($sothunhat)) {echo $sothunhat;} ?>">
                </td>
            </tr>
            <tr>
                <td class="blue">Số thứ hai: </td>
                <td>
                    <input type="text" name="sothuhai" value="<?php if(isset($sothuhai)) {echo $sothuhai;} ?>">
                </td>
            </tr>
            <tr>
                <td colspan=2  style="text-align: center;">
                    <input type="submit" style="background-color: #aaa69d; font-size: 20px;" value="Tính" name="submit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>