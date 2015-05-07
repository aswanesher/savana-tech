<?PHP
	function modul($name){
		switch ($name) {
		  case "dash":require ('home.php');break;
		  case "op":require ('operator.php');break;
		  case "cl":require ('closing.php');break;
		  case "rep":require ('report.php');break;
		  case "m_hotel":require ('mod_hotel/m_hotel.php');break;
		  case "m_room":require ('mod_hotel/m_room.php');break;
		  case "author":require ('m_user.php');break;
		  case "m_conf":require ('m_conf.php');break;
		  case "m_voc":require ('m_voc.php');break;
		  case "view":require ('view.php');break;
		  case "pass":require ('password.php');break;
		  case "vall":require ('viewall.php');break;
		  case "opwlnj":require ('operator.php');break;
		  case "opagt":require ('opagent.php');break;
		  default:require ('home.php');
		}
		
	}
?>