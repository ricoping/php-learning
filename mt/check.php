<?
	@session_start();
	$ok_account = "admin";
	$ok_pass = "kanri";

	$flg = false;
	$account = "";
	$pass = "";
	if(isset($_SESSION["account"]) and isset($_SESSION["pass"])){
		$account = $_SESSION["account"];
		$pass = $_SESSION["pass"];	
	}

	if($account == $ok_account and $pass == $ok_pass){
		$flg = true;
	}

	if(!$flg){
		echo "<html><body><h1>NOT LOGIN</h1><a href='./index2.php'>back</a></body></html>";
		exit;
	}

?>