<!DOCTYPE html>
<head>
    <title>Sắp xếp mảng</title>
</head>
<body style="font-size:25px">
<?php

function swap(&$k, &$key) {
    $tam=$k;
    $k=$key;
    $key=$tam;
}
function sapxep(&$mangso,$tang)
{
    foreach ($mangso as $key => &$value) {
        foreach ($mangso as $k => &$v) {
            if($v<$value && $tang==true)
            {
                swap($v,$value);
            }
            if($v>$value && $tang==false){
                swap($value,$v);
            }
        }
    }
    #var_dump($mangso);
    return $mangso;
}

if(isset($_POST['submit']))
{
    $dayso=$_POST['dayso'];
    $mangso=explode(",",$dayso);
    $mangtang = sapxep($mangso,true);
    $manggiam=sapxep($mangso,false);
}

?>

    <form action="" method="POST">
        <table align="center" style="background-color: #63cdda;">
            <tr>
                <th colspan="2" align="center" style="background-color: #3dc1d3;">SẮP XẾP MẢNG</th>
            </tr>
            <tr>
                <td>Nhập mảng</td>
                <td>
                    <input type="text" name="dayso" value="<?php if (isset($dayso)) { echo $dayso;}?>">
                </td>
            </tr>
            <tr>
                <td> </td>
                <td>
                    <input type="submit" name="submit" value="Sắp xếp tăng/giảm"><b style="color: red">(*)</b>
                </td>
            </tr>
            <tr style="background-color: #2bcbba;">
                <td style="color: red;">Sau khi sắp xếp</td><td></td>
            </tr>
            <tr style="background-color: #2bcbba;">
                <td>Tăng dần</td>
                <td>
                    <input type="text" value="<?php if(isset($mangtang)) print implode(', ',$mangtang) ?>">
                </td>
            </tr>
            <tr style="background-color: #2bcbba;">
                <td>Giảm dần</td>
                <td>
                    <input type="text" value="<?php if(isset($manggiam)) print implode(', ',$manggiam) ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2"><b>(*)</b> Các số được nhập cách nhau bằng dấu ","</td>
            </tr>
        </table>
    </form>
</body>
</html>