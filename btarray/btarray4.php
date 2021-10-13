<!DOCTYPE html>
<head>
    <title>Tìm kiếm</title>
</head>

<body style="font-size: 30px;">
<?php
function timkiem($mangso,$so)
{
    $ketqua="Không tìm thấy ".$so;
    foreach ($mangso as $key => $value) {
        if($so==$value) {
            $ketqua="Tìm thấy ".$so." tại vị trí thứ ".++$key." của mảng";
        }
    }
    return $ketqua;
}

function xuatmang($mang)
{
    if(isset($mang)) {print implode(", ", $mang);}
}

if(isset($_POST["submit"]))
{
    $dayso = $_POST["dayso"];
    $so = $_POST["so"];
    $mangso = explode(",", $dayso);
    $ketqua = timkiem($mangso,$so);
}

?>

    <form method="POST" action="" name="formtimkiem">
        <table bgcolor="#f1f2f6" align="center">
            <tr bgcolor="#2ed573">
                <th colspan="2">TÌM KIẾM</th>
            </tr>
            <tr>
                <td>Nhập mảng</td>
                <td><input type="text" name="dayso" value="<?php if (isset($_POST["dayso"])) {
                                                                echo $_POST["dayso"];} ?> " >
                </td>
            </tr>
            <tr>
                <td>Nhập số cần tìm</td>
                <td>
                    <input type="text" width="30px" name="so" value="<?php if (isset($_POST["so"])) echo $_POST["so"]?>">
                </td>
            </tr>
            <tr>
                <td>  </td>
                <td>
                    <input type="submit" style="background-color: aquamarine; font-size: 20px;" name="submit" width="30px" value="Tìm kiếm">
                </td>
            </tr>
            <tr>
                <td>Mảng</td>
                <td>
                    <input type=text readonly value="<?php if(isset($mangso)) xuatmang($mangso); ?>">
                </td>
            </tr>
            <tr>
                <td>Kết quả tìm kiếm</td>
                <td>
                    <input type=text style="background-color: bisque; color: red" value="<?php if(isset($so) && isset($mangso)) echo timkiem($mangso,$so); ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" readonly bgcolor="#7bed9f">(Các phần tử trong mảng sẽ cách nhau dấu ",")</td>
            </tr>
        </table>
    </form>
</body>

</html>