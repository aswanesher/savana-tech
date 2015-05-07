<?PHP
	if(!isset($_SESSION))
	{
		session_start();
	} 
	setcookie("usr", "", time());
	setcookie("mail", "", time());
	session_cache_expire(30);
	session_destroy();
	header ("Location: index.php?menu=login");
?>