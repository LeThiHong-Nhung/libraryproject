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
    $ketqua = 0.0;
    $back = "javascript:history.go(-1)";
    if(is_numeric($sothunhat) and is_numeric($sothuhai))
    {
        switch($pheptinh)
    {
        case "Cộng":
            {
                $ketqua = $sothunhat + $sothuhai;
                break;
            }
        case "Trừ":
            {
                $ketqua = $sothunhat - $sothuhai;
                break;
            }
        case "Nhân":
            {
                $ketqua = $sothunhat * $sothuhai;
                break;
            }
        case "Lấy dư":
            {

                if($sothuhai == 0)
                {
                    echo '<script>alert("Không chia cho 0!")</script>';
                    echo header("refresh: 2; url = pheptinh.php");
                    break;
                }
                else{
                $ketqua = $sothunhat % $sothuhai;
                break;}
            }
        case "Chia":
            {
                if($sothuhai == 0)
                {
                    echo '<script>alert("Không chia cho 0!")</script>';
                    echo header("refresh: 2; url = pheptinh.php");
                    break;
                }
                else{
                $ketqua = $sothunhat / $sothuhai;
                break;}
            }
    }
    }
    else{
        echo '<script>alert("Chỉ nhập số!")</script>';
        echo header("refresh: 2; url = pheptinh.php");
    }
    
}


?>
    <form action="" method="POST" name="formnhaplieu" style="border: 1px solid #84817a;">
        <table align="center">
            <tr>
                <td colspan="2" class="bluen"  style="text-align: center;">PHÉP TÍNH TRÊN HAI SỐ</td>
            </tr>
            <tr>
                <td class="brownb">Chọn phép tính: </td>
                <td class="brown">
                <?php if(isset($pheptinh)) {echo $pheptinh;} ?>
                </td>
            </tr>
            <tr>
                <td class="blue">Số 1: </td>
                <td>
                    <input type="text" name="sothunhat" value="<?php if(isset($sothunhat)) {echo $sothunhat;} ?>">
                </td>
            </tr>
            <tr>
                <td class="blue">Số 2: </td>
                <td>
                    <input type="text" name="sothuhai" value="<?php if(isset($sothuhai)) {echo $sothuhai;} ?>">
                </td>
            </tr>
            <tr>
            <td class="blue">Kết quả: </td>
                <td>
                    <input type="text" name="ketqua" value="<?php if(isset($ketqua)) {echo $ketqua;} ?>">
                </td>
            </tr>
            <tr>
                <td colspan=2  style="text-align: center;">
                <a class="back" href="javascript:window.history.back(-1);">Quay lại trang trước</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>