<?php include('../admin/baitap-form.php'); ?>
    <?php
    if(isset($_POST['submit']))
    {       
        $bankinh = $_POST['bankinh'];
        $bankinh = $bankinh+0;
        $dientich = $bankinh*$bankinh* (float) 3.14;
        $chuvi = $bankinh*2* (float)3.14;
    }
    ?>
    <form action="" method="post" style="font-size: 25px;">
        <table bgcolor="#fad390" align="center" class="nav-form">
                <tr>
                    <td  colspan=2 bgcolor="#f6b93b" style="color: white;" align="center">DIỆN TÍCH VÀ CHU VI HÌNH TRÒN</td>
                </tr>
                <tr>
                    <td>Bán kính: </td>
                    <td>
                        <input type="text" name="bankinh" value="<?php if(isset($bankinh)) {echo $bankinh;} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Diện tích: </td>
                    <td>
                        <input type="text" name="dientich" style="background-color: #82ccdd;" readonly value="<?php if(isset($dientich)){ echo $dientich;} ?>">
                    </td>
                </tr>
                <tr>
                    <td>Chu vi: </td>
                    <td>
                        <input type="text" name="chuvi" style="background-color: #82ccdd;" readonly value="<?php if(isset($chuvi)){ echo $chuvi;} ?>">
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2">
                        <input type="submit" style="background-color: #b71540; font-size: 20px;" name="submit" value="Tính">
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><a href="javascript:window.history.go(-1)">Quay lại</a></td>
                </tr>
        </table>
    </form>
    <?php include('../admin/partials/footer.php') ?>