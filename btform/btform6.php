<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Phép tính trên hai số</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body style="margin: 0 auto;">
    
    <form action="" method="POST" name="formnhaplieu">
        <table>
            <tr>
                <td colspan="2">PHÉP TÍNH TRÊN HAI SỐ</td>
            </tr>
            <tr>
                <td>Chọn phép tính: </td>
                <td>
                    <input type="radio" name="cong" value="Cộng">
                    <input type="radio" name="tru" value="Trừ">
                    <input type="radio" name="nhan" value="Nhân" checked>
                    <input type="radio" name="chia" value="Chia">
                    <input type="radio" name="phantram" value="Lấy dư">
                </td>
            </tr>
            <tr>
                <td>Số thứ nhất: </td>
                <td>
                    <input type="text" name="sothunhat">
                </td>
            </tr>
            <tr>
                <td>Số thứ hai: </td>
                <td>
                    <input type="text" name="sothuhai">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Tính" name="submit">
                </td>
            </tr>
            <tr>
                    <td colspan="2"><a href="javascript:window.history.go(-1)">Quay lại</a></td>
                </tr>
        </table>
    </form>
</body>
</html>