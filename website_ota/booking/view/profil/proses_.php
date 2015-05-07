<?php
session_Start();
include "../../conf/config.php";
include "../library.php";
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$aksi = $_POST['aksi']==''?$_GET['act']:$_POST['aksi'];


if($aksi=='ubah'){
	$query = "UPDATE mst_karyawan SET
					kar_nama				='".$_POST['kar_nama']."',
					kar_identitas			='".$_POST['kar_identitas']."',
					kar_alamat				='".$_POST['kar_alamat']."',
					kar_telepon1			='".$_POST['kar_telepon1']."',
					kar_telepon2			='".$_POST['kar_telepon2']."',
					status_kar				='".$_POST['status_kar']."',
					kar_email				='".$_POST['kar_email']."',
					kar_email_username		='".$_POST['kar_email_username']."',
					kar_email_pass			='".$_POST['kar_email_pass']."'
				
					where kar_id			= '" . $_SESSION['kar_id'] . "'
							";
	
}
	
	if (!mysqli_query($conn,$query))
	{
		die('File: ' . __FILE__ . '<br />Line: ' . __LINE__ . '<br />Error: ' . mysqli_error());
		header ("Location: ../../index.php?class=profil&status=gagal");
	}else{
	header ("Location: ../../index.php?class=profil&status=sukses");
	}

	
		
	
	
?>