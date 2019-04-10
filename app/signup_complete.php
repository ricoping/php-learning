<?
date_default_timezone_set('Asia/Tokyo');

session_start();
if(isset($_SESSION, $_POST) && ($_POST["token"] === $_SESSION["token"])){
	$name = $_SESSION["name"];
	$email = $_SESSION["email"];
	$gender = $_SESSION["gender"];
	$passwd = $_SESSION["passwd"];

	$date = date('Y-m-d G:i:s');
	

	//unset($_SESSION['token']);

	$dsn = 'mysql:dbname=app;host=localhost;charset=utf8';
	$user = 'root';
	$password = "";
	$dbh = new PDO($dsn, $user, $password);

	$dbh->query("SET NAMES utf8");
	#$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$sql = 'INSERT INTO users (name, email, passwd, created_at, gender) VALUES (?, ?, ?, ?, ?)';

	$stmt = $dbh->prepare($sql);
	$stmt->bindValue(1, $name, PDO::PARAM_STR);
	$stmt->bindValue(2, $email, PDO::PARAM_STR);
	$stmt->bindValue(3, $passwd, PDO::PARAM_STR);
	$stmt->bindValue(4, $date, PDO::PARAM_STR);
	$stmt->bindValue(5, $gender, PDO::PARAM_STR);
	$stmt->execute();

	$dbh = null;

	
	$_SESSION = array();

	if(ini_get("session.use_cookies")){
		$params = session_get_cookie_params();
		echo var_dump($params);
		setcookie(session_name(), "", time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
	}

	session_destroy();
	

	//echo "きちんとしたアクセスです";
}else{
	//echo "不正なアクセスです";
}
?>

<!DOCTYPE html PUBLIC "-//W3c//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />

		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<script src="/mt/js/jquery.validate.min.js"></script>


		<title>Signup</title>
	</head>

	<body>
		<h1>登録しました</h1>
		<a href="/app/index.php">戻る</a>

	</body>
</html>