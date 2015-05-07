<?PHP
	function menu($name){
		switch ($name) {
		  case "list":require ('hotel_list.php');break;
		  case "details":require ('details.php');break;
		  case "login":require ('userlog.php');break;
		  case "reg":require ('usereg.php');break;
		  case "forgot":require ('userforgot.php');break;
		  case "rest":require ('usereset.php');break;
		  case "veri":require ('pay/verifikasi.php');break;
		  case "allhotel":require ('allhot.php');break;
		  case "tutor":require ('cara_pesan.php');break;
		  case "faq":require ('faq.php');break;
		  case "plane_list":require ('plane/plane_list.php');break;
		  case "rent_list":require ('rent/rent_list.php');break;
		  case "obj_list":require ('wisata/obj_list.php');break;
		  case "kul_list":require ('wiskul/wiskul_list.php');break;
		  default:require ('default.php');
		}
		
	}
?>