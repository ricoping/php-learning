<?
	session_start();

	$name = $_SESSION["name"];
	$email = $_SESSION["email"];
	$gender = $_SESSION["gender"];
	$passwd = $_SESSION["passwd"];

	$_SESSION["token"] = base64_encode(openssl_random_pseudo_bytes(48));
	$token = htmlspecialchars($_SESSION['token'], ENT_QUOTES);

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
		<h1>確認画面</h1>


		<div class="signup-container">
		
			<form id="signup-form" method="post" action="./signup_complete.php">

			  <div class="form-group">
			    <label>ユーザーID</label>
			    <? echo $name; ?>
			  </div>

			  <div class="form-group">
			    <label>Eメール</label>
			    <? echo $email; ?>
			  </div>

			  <div class="form-group">
			    <label>性別</label>
			    <? echo $gender; ?>
			  </div>

			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    ****
			  </div>

			  <input type="hidden" name="token" value="<? echo $token; ?>">
			  <input name="submit" id="submit" type="submit" value="登録" class="btn btn-primary">

			</form>
		</div>
	</body>
</html>