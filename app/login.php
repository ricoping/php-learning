<?

	session_start();

	$error_message = "";

	if(isset($_GET["data"], $_GET["fm"])){
		$data = $_GET["data"];
		$fm = $_GET["fm"];

		$_SESSION["data"] = $data;
		$_SESSION["fm"] = $fm;
	}

	if($_POST != null){
		$name = htmlspecialchars($_POST["userid"]);
		$passwd = htmlspecialchars($_POST["passwd"]);

		$encrypted_passwd = hash('ripemd160', $passwd);

		try{
			$pdo = new PDO("mysql:host=localhost;dbname=app;charset=utf8", "root", "");
			$stmt = $pdo->prepare("SELECT * FROM users WHERE name = '$name' and passwd = '$encrypted_passwd'");

			$stmt->execute();
			$result = $stmt->fetch();
			if($result != null){
				$_SESSION["name"] = $result["name"];
				$_SESSION["userid"] = $result["id"];


				if(isset($_SESSION["userid"], $_SESSION["fm"])){
					header("Location: ".$_SESSION["fm"]);

				}else{
					header("Location: ./index.php");
				}

			}else{
				$error_message = '<small id="userHelp" class="form-text text-muted alert alert-danger">ログインに失敗しました。</small>';
			}
		}catch(PDOException $e){
			echo "error";
			header("Location: ./login.php");
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
		<h1>Login</h1>
		<? echo $error_message; ?>
		<? echo $data ?? ""; ?>
		<? echo $fm ?? ""; ?>

		<div class="signup-container">
		
			<form id="signup-form" method="post" action="./login.php">

			  <div class="form-group">
			    <label>ユーザーID</label>
			    <input type="text" name="userid" class="form-control" placeholder="Enter ID" required>
			    <span></span>
			  </div>


			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input name="passwd" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
			    <span></span>
			  </div>

			  <input id="submit" type="submit" class="btn btn-primary"></input>
			</form>
		</div>
	</body>
</html>