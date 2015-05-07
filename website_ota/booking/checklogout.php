<?PHP
	if(!isset($_SESSION))
	{
		session_start();
	} 
	//setcookie("user", "", time());
	session_cache_expire(30);
	session_destroy();
	header ("Location: login.php");
?>