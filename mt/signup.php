<?
	include_once('./srv_valid.php');
	function createSalt($length = 8) {
	    return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', $length)), 0, $length);
	}
?>

<?
	$is_error = false;
	@session_start();

	if(isset($_SESSION["name"])){
		header("Location: ./user_admin.php");
	}

	if($_POST != null){
		if(myvalid\validation()){
			$name = htmlspecialchars($_POST["userid"]);
			$email = htmlspecialchars($_POST["email"]);
			$passwd = htmlspecialchars($_POST["passwd"]);

			$encrypted_passwd = hash('ripemd160', $passwd);

			try{

				$pdo = new PDO("mysql:host=localhost;dbname=mysampledata;charset=utf8", "root", "");
				$query = "insert into sampletable (name, email, passwd) values ('$name', '$email', '$encrypted_passwd')";
				//$pdo -> exec($query);
				$res = $pdo->query($query);

				$userid = var_dump($pdo->lastInsertId());

				$_SESSION["name"] = $name;
				$_SESSION["userid"] = $userid;

			}catch(PDOException $e){
				echo "error";
				header("Location: ./signuped.php");
			}

			$pdo = null;

			header("Location: ./signuped.php");
		}else{
			$is_error = true;
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


		<title>Sign up | Hello Nature</title>

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

	</head>

	<body>
		<h1 style="margin: 20px;">Welcome!</h1>

		<div class="signup-container">
			<?
				if($is_error){
					echo '<small id="userHelp" class="form-text text-muted alert alert-danger">記入に誤りがあります。</small>';
				}
			?>
			<form id="signup-form" method="post" action="./signup.php">

			  <div class="form-group">
			    <label>ユーザーID</label>
			    <input type="text" name="userid" class="form-control" placeholder="Enter ID" required>
			    <small id="userHelp" class="form-text text-muted">英数字で入力してください。</small>
			    <span></span>
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">メールアドレス</label>
			    <input name="email" type="email" class="form-control" placeholder="Enter email" required>
			    <small id="emailHelp" class="form-text text-muted">ご登録の確認に使用します。</small>
			    <span></span>

			  </div>

			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input name="passwd" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
			    <span></span>
			  </div>
			  <div class="form-group form-check">
			    <input name="agreement" type="checkbox" class="form-check-input" id="exampleCheck1" required>
			    <label class="form-check-label" for="exampleCheck1">ガイドラインに同意する</label>
			    <br><span></span>
			  </div>
			  <input id="submit" type="submit" class="btn btn-primary"></input>
			</form>
		</div>
	<script>
	$().ready(function(){
		$('form').validate({
			//debug:true,
		    rules: {
		        userid: { required: true,
		        		  minlength: 3,
		        		  maxlength: 15 },

		        email: {  required: true,
		        		  email: true },

		        passwd: { required: true,
		        		  minlength: 5,
		        		  maxlength: 20},

		        agreement: { required: true}

		    },
		    messages:{
		    	userid:{
		    		required: "必須項目です。",
		    		minlength: "3~15文字でお願いします",
		    		maxlength: "3~15文字でお願いします"
		    	},

		    	email:{
		    		required: "必須項目です。",
		    		email: "E-mailアドレスを入力してください。"
		    	},

		    	passwd:{
		    		required: "必須項目です。",
		    		minlength: "5~20文字でお願いします",
		    		maxlength: "5~20文字でお願いします"
		    	},

		    	agreement:{
		    		required: "必須項目です。"
		    	}
		    },
		    errorPlacement: function (err, elem) {
 
            	err.appendTo(elem.siblings("span"));
 
        	}
		})

		$("#signup-form").validate();
		
		$("#submit").click(function() {
		    if ($("#signup-form").valid()) {
		        //$('#submit').prop('disabled', false); 
		    } else {
		    	alert("記入漏れがあります");
		        //$('#submit').prop('disabled', 'disabled');
		    }
		});
		/*
		$('input').on('blur', function() {
		    if ($("#signup-form").valid()) {
		        $('#submit').prop('disabled', false);  
		    } else {
		        $('#submit').prop('disabled', 'disabled');
		    }
		});*/


	})


	</script>
	</body>
</html>