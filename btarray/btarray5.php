<!DOCTYPE html>
<head>
    <title>Thay thế mảng</title>
</head>
<body style="font-size:25px">
<?php
function thaythe($mangso,$canthaythe,$thaythe)
{
    foreach ($mangso as $key => &$value) {
        if($canthaythe==$value) {
            $value=$thaythe;
            #var_dump($value);
            #var_dump($thaythe);
        }
    }
    #var_dump($mangso);
    return $mangso;
}
if(isset($_POST['submit']))
{
    $dayso=$_POST['dayso'];
    $mangso=explode(",",$dayso);
    $canthaythe=$_POST['canthaythe'];
    $thaythe=$_POST['thaythe'];
    $mangmoi=thaythe($mangso,$canthaythe,$thaythe);
}


?>

    <form method="post" action="" name="formthaythe">
        <table bgcolor="" align="center">
            <tr bgcolor="#c44569">
                <th colspan="2">THAY THẾ</th>
            </tr>
            <tr style="background-color:#f8a5c2">
                <td>Nhập các phần tử</td>
                <td>
                    <input type="text" name="dayso" value="<?php if (isset($dayso)) { echo $dayso; } ?>">
                </td>
            </tr>
            <tr style="background-color:#f8a5c2">
                <td>Giá trị cần thay thế</td>
                <td>
                    <input type="text" name="canthaythe" value="<?php if (isset($canthaythe)) { echo $canthaythe;} ?>">
                </td>
            </tr>
            <tr style="background-color:#f8a5c2">
                <td>Giá trị thay thế</td>
                <td>
                    <input type="text" name="thaythe" value="<?php if (isset($thaythe)) { echo $thaythe; } ?>">
                </td>
            </tr>
            <tr style="background-color:#f8a5c2">
                <td> </td>
                <td>
                    <input type="submit" name="submit" style="background-color: #c44569; font-size:25px" value="Thay thế">
                </td>
            </tr>
            <tr>
                <td>Mảng cũ</td>
                <td>
                    <input type="text" readonly style="background-color:#ea8685; color:white" value="<?php if(isset($mangso)) print implode('  ',$mangso); ?>">
                </td>
            </tr>
            <tr>
                <td>Mảng sau khi thay thế</td>
                <td>
                    <input type="text" readonly style="background-color:#ea8685; color:white" value="<?php if(isset($_POST['submit'])) print implode('  ',$mangmoi); ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">(<strong style="color: red;">Ghi chú:</strong> Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</td>
            </tr>
        </table>
    </form>
</body>
</html>