<?

session_start();

if(isset($_SESSION, $_POST) && ($_POST["token"] === $_SESSION["token"])){

	$name = $_SESSION["name"];
	$email = $_SESSION["email"];
	$subject = $_SESSION["subject"];
	$body = $_SESSION["body"];

	unset($_SESSION['token']);

	$dsn = 'mysql:dbname=contact_form;host=localhost;charset=utf8';
	$user = 'root';
	$password = "";
	$dbh = new PDO($dsn, $user, $password);

	$dbh->query("SET NAMES utf8");

	$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	$sql = 'INSERT INTO inquiries (name, email, subject, body) VALUES (?, ?, ?, ?)';

	$stmt = $dbh->prepare($sql);

	$stmt->bindValue(1, $name, PDO::PARAM_STR);
	$stmt->bindValue(2, $email, PDO::PARAM_STR);
	$stmt->bindValue(3, $subject, PDO::PARAM_STR);
	$stmt->bindValue(4, $body, PDO::PARAM_STR);

	$stmt->execute();

	var_dump($dbh);
	$dbh = null;


	$_SESSION = array();

	if(ini_get("session.use_cookies")){
		$params = session_get_cookie_params();
		echo var_dump($params);
		setcookie(session_name(), "", time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
	}

	session_destroy();

	echo "きちんとしたアクセスです";
}else{
	echo "不正なアクセスです";
}



?>

<html>
<head>
<meta charset="utf-8">
<title>完了画面 - お問い合わせ</title>
</head>
<body>
<h1>form3</h1>


</body>
</html>



