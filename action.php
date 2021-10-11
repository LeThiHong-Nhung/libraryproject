<?php
	session_start();
	include 'config.php';
	mysqli_set_charset($conn,'utf8mb4');
	$update=false;
	$id="";
	$ten="";
	$cmnd="";
	$sdt="";
	$anh="";
	$gioitinh="";
	$diachi="";
	$email="";

	if(isset($_POST['add'])){
		$id=$_POST['ma_nv'];
		$ten=$_POST['hoten_nv'];
		$email=$_POST['email_nv'];
		$sdt=$_POST['sdt_nv'];
		$cmnd=$_POST['cmnd_nv'];
		$gioitinh=$_POST['gioitinh_nv'];
		$diachi=$_POST['diachi_nv'];

		$anh=$_FILES['image']['name'];
		$upload="uploads/".$anh;

		$query="INSERT INTO nhan_vien(ma_nv,hoten_nv,diachi_nv,sdt_nv,cmnd_nv,gioitinh_nv,anh_nv,email_nv)VALUES(?,?,?,?,?,?,?,?)";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("sssssiss",$id,$ten,$diachi,$sdt,$cmnd,$gioitinh,$anh,$email);
		#echo $stmt->error_list;
		$stmt->execute();
		move_uploaded_file($_FILES['image']['tmp_name'], $anh);
		header('location:index.php');
		$_SESSION['response']="Successfully Inserted to the database!";
		$_SESSION['res_type']="success";

	}
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];

		$sql="SELECT anh_nv FROM nhan_vien WHERE ma_nv=?";
		$stmt2=$conn->prepare($sql);
		$stmt2->bind_param("i",$id);
		$stmt2->execute();
		$result2=$stmt2->get_result();
		$row=$result2->fetch_assoc();

		$imagepath=$row['anh'];
		unlink($imagepath);

		$query="DELETE FROM nhan_vien WHERE ma_nv=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		header('location:index.php');
		$_SESSION['response']="Successfully Deleted!";
		$_SESSION['res_type']="danger";
	}
	if(isset($_GET['edit'])){
		$id=$_GET['edit'];

		$query="SELECT * FROM nhan_vien WHERE ma_nv=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$id=$row['ma_nv'];
		$ten=$row['hoten_nv'];
		$diachi=$row['diachi_nv'];
		$sdt=$row['sdt_nv'];
		$cmnd=$row['cmnd_nv'];
		$gioitinh=$row['gioitinh_nv'];
		$anh=$row['anh_nv'];
		$email=$row['email_nv'];

		$update=true;
	}
	if(isset($_POST['update'])){
		$id=$_POST['ma_nv'];
		$ten=$_POST['hoten_nv'];
		$email=$_POST['email_nv'];
		$sdt=$_POST['sdt_nv'];
		$cmnd=$_POST['cmnd_nv'];
		$gioitinh=$_POST['gioitinh_nv'];
		$diachi=$_POST['diachi_nv'];
		$oldimage=$_POST['oldimage'];

		if(isset($_FILES['image']['name'])&&($_FILES['image']['name']!="")){
			$newimage="uploads/".$_FILES['image']['name'];
			unlink($oldimage);
			move_uploaded_file($_FILES['image']['tmp_name'], $newimage);
		}
		else{
			$newimage=$oldimage;
		}
		$query="UPDATE nhan_vien SET hoten_nv=?,diachi_nv=?,sdt_nv=?,cmnd_nv=?,gioitinh_nv=?,anh_nv=?,email_nv=? WHERE ma_nv=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("ssssi",$ten,$diachi,$sdt,$cmnd,$gioitinh,$email,$newimage,$id);
		$stmt->execute();

		$_SESSION['response']="Updated Successfully!";
		$_SESSION['res_type']="primary";
		header('location:index.php');
	}

	if(isset($_GET['details'])){
		$id=$_GET['details'];
		$query="SELECT * FROM nhan_vien WHERE ma_nv=?";
		$stmt=$conn->prepare($query);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$result=$stmt->get_result();
		$row=$result->fetch_assoc();

		$vid=$row['ma_nv'];
		$vten=$row['hoten_nv'];
		$vdiachi=$row['diachi_nv'];
		$vsdt=$row['sdt_nv'];
		$vcmnd=$row['cmnd_nv'];
		$vgioitinh=$row['gioitinh_nv'];
		$vanh=$row['anh_nv'];
		$vemail=$row['email_nv'];
	}
?>
