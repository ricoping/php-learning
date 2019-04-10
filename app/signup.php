<?
	include("signup_logic.php");
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
		<h1>Signup</h1>

		<?
			echoErrors($errors);
		?>


		<div class="signup-container">
		
			<form id="signup-form" method="post" action="./signup.php">

			  <div class="form-group">
			    <label>ユーザーID</label>
			    <input type="text" name="userid" class="form-control" placeholder="Enter ID" value="<? if(isset($name)){echo $name;}?>" required>
			  </div>

			  <div class="form-group">
			    <label>Eメール</label>
			    <input type="text" name="email" class="form-control" placeholder="Enter your email" value="<? if(isset($name)){echo $email;}?>" required>
			  </div>

			  <div class="form-group">
			    <label>性別</label>
			    <input type="radio" name="gender" value="man" required <? if(isset($gender) && $gender == "man"){echo "checked";}?><? if(!isset($gender)){echo "checked";} ?>>
			    <input type="radio" name="gender" value="woman" required <? if(isset($gender) && $gender == "woman"){echo "checked";}?>>
			  </div>

			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input name="passwd" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
			  </div>

			  <div class="form-group">
			    <label for="exampleInputPassword1">Password（確認）</label>
			    <input name="passwd2" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
			  </div>

			  <input name="submit" id="submit" type="submit" class="btn btn-primary">
			</form>
		</div>
	</body>
</html>