<?PHP
	require ('../config/hotel.conn.php');
	require_once ('../library/function.number.php');
	require_once ('../library/function.convert.date.php');
	require_once ('../library/function.cracked.php');
	require_once ('../library/function.date.format.php');
	session_start();
	date_default_timezone_set('Asia/Jakarta');
	if(isset($_POST['actionGuest']) && $_POST['actionGuest'] == 'update'){
	
			 $QryUpdateGuest = "UPDATE guest_book SET 
								gender 		= '".$_POST['gender']."', 
								name 		= '".$_POST['name']."', 
								email 		= '".$_POST['email']."', 
								phone 		= '".$_POST['phone']."', 
								brithdate 	= '".formatTanggaldb($_POST['brithdate'])."', 
								place_name 	= '".$_POST['place_name']."', 
								address 	= '".$_POST['address']."', 
								pos_code 	= '".$_POST['pos_code']."', 
								country 	= '".$_POST['country']."', 
								kota_id 	= '".$_POST['kota_id']."', 
								prov_id 	= '".$_POST['prov_id']."'
								WHERE email = '".$_POST['setMail']."' AND name = '".$_POST['setName']."'"; 
						$stmUpdateGuest = $conn->prepare($QryUpdateGuest); 
						$stmUpdateGuest->execute();
		
		echo "<script>var r = confirm('profil anda berhasil di ubah, halaman akan secara otomatis keluar!!!');if(r == true){window.location = '../checklogout.php';} else {window.location = '../checklogout.php';}</script>";
	}
?>