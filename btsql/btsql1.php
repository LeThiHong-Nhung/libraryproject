<?php include('config.php'); ?>
<!DOCTYPE html>

<head>
    <title>Quản lí bán sữa</title>
</head>
<body>
    <h3 align="center" style="color: blue; font-family: Verdana, Geneva, Tahoma, sans-serif;">THÔNG TIN HÃNG SỮA</h3>
    <table align="center" border="1">
        <tr>
            <th>Mã hãng sữa</th>
            <th>Tên hãng sữa</th>
            <th>Địa chỉ</th>
            <th>SĐT</th>
            <th>Email</th>
        </tr>
        <?php
        $sql = "SELECT * FROM hang_sua";
        $res = mysqli_query($conn, $sql);
        if($res == true)
        {
            $count = mysqli_num_rows($res);
            if($count >=1)
            {

                while ($rows=mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>".$rows['Ma_hang_sua']."</td>";
                    echo "<td>".$rows['Ten_hang_sua']."</td>";
                    echo "<td>".$rows['Dia_chi']."</td>";
                    echo "<td>".$rows['Dien_thoai']."</td>";
                    echo "<td>".$rows['Email']."</td>";
                    echo "</tr>";
                }
            }
        }
        
        ?>
    </table>
</body>

</html>