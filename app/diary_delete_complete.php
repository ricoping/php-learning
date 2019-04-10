<?

	session_start();

	if(isset($_GET["diary_id"])){
		try{
			$pdo = new PDO("mysql:host=localhost;dbname=app;charset=utf8", "root", "");

			//$dbh = null;
			$diary_id = $_GET["diary_id"];
			$userid = $_SESSION["userid"];

			$stmt = $pdo->prepare("DELETE FROM diary WHERE id = '$diary_id' AND userid = '$userid'");

			$stmt->execute();
			$result = $stmt->fetch();

			//header("Location: ./diary_delete_complete.php");

		}catch(PDOException $e){
			echo "error";
			header("Location: ./user_page.php");
		}
	}else{
		header("Location: ./user_page.php");
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


		<title>Login</title>
	</head>

	<body>
		<h1>削除しました！</h1>
		<a href="./user_page.php">戻る</a>
	</body>
</html>


