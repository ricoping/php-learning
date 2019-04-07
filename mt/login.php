<?
	$error_message = "";

	if($_POST != null){

		$name = $_POST["userid"];
		$passwd = $_POST["passwd"];

		$name = htmlspecialchars($_POST["userid"]);
		$passwd = htmlspecialchars($_POST["passwd"]);

		$encrypted_passwd = hash('ripemd160', $passwd);


		try{

			$pdo = new PDO("mysql:host=localhost;dbname=mysampledata;charset=utf8", "root", "");

			$stmt = $pdo->prepare("SELECT * FROM sampletable WHERE name = '$name' and passwd = '$encrypted_passwd'");

			$stmt->execute();
			$result = $stmt->fetch();

			if($result != null){
				@session_start();

				$_SESSION["name"] = $result["name"];
				$_SESSION["userid"] = $result["id"];
				header("Location: ./index.php");

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


		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<script src="/mt/js/jquery.validate.min.js"></script>

		<style>
		.signup-container{
			margin: 0px auto;
			width: 70%;
		}

		label.error{
			background: pink;
			color: gray;
			padding: 10px;
			border-radius: 10px;
			font-size: 0.9em;
		}

		.my-error{
			display: none;
		}

		.error-display{
			display: block;
		}

		</style>

		<title>Sample page</title>
	</head>

	<body>
		<h1 style="margin: 20px;">Login</h1>

		<div class="signup-container">
			<?
				echo $error_message;
			?>			
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