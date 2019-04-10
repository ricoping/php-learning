<?

	session_start();

	$error_message = "";

	if($_POST != null){
		$userid = $_SESSION["userid"];
		$text = htmlspecialchars($_POST["text"]);

		try{
			$pdo = new PDO("mysql:host=localhost;dbname=app;charset=utf8", "root", "");

			//$dbh = null;

			$stmt = $pdo->prepare('INSERT INTO diary (userid, text) VALUES (?, ?)');
			$stmt->bindValue(1, $userid, PDO::PARAM_STR);
			$stmt->bindValue(2, $text, PDO::PARAM_STR);

			$stmt->execute();
			header("Location: ./user_page.php");

		}catch(PDOException $e){
			echo "error";
			header("Location: ./write_diary.php");
		}
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
		<h1>日記を書く</h1>

		<div class="signup-container">
		
			<form id="signup-form" method="post" action="./write_diary.php">

			  <div class="form-group">
			    <label>投稿内容</label>
				<textarea name="text" rows="4" cols="40"></textarea><br>
			  </div>

			  <input id="submit" type="submit" class="btn btn-primary"></input>
			</form>
		</div>
	</body>
</html>