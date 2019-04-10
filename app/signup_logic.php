<?

session_start();
$errors = array();

if(isset($_POST["submit"])){
	//var_dump($_POST);
	$name = htmlspecialchars($_POST["userid"], ENT_QUOTES);
	$email = htmlspecialchars($_POST["email"], ENT_QUOTES);
	$gender = htmlspecialchars($_POST["gender"], ENT_QUOTES);
	$passwd = htmlspecialchars($_POST["passwd"], ENT_QUOTES);
	$passwd2 = htmlspecialchars($_POST["passwd2"], ENT_QUOTES);


	if($name == ""){
		$errors["name"] = "お名前が入力されていません。";
	}

	if(strlen($name) < 2 || strlen($name) > 10){
		$errors["name2"] = "文字の長さが不正です(2~10文字)";
	}

	if($email == ""){
		$errors["email"] = "メールアドレスが入力されていません。";
	}

	if(!strpos($email, "@")){
		$errors["email"] = "メールアドレスを入力してください。";
	}

	if($passwd == ""){
		$errors["passwd"] = "パスワードが入力されていません。";
	}

	if($passwd2 == ""){
		$errors["passwd2"] = "パスワード(確認)が入力されていません。";
	}

	if(strlen($passwd) < 5 || strlen($passwd) > 15){
		$errors["passwd_2"] = "文字の長さが不正です(5~15文字)";
	}

	if($passwd !== $passwd2){
		$errors["passwd_3"] = "パスワードが一致しません";
	}


	if(count($errors) === 0){
		$_SESSION["name"] = $name;
		$_SESSION["email"] = $email;
		$_SESSION["gender"] = $gender;
		$_SESSION["passwd"] = hash('ripemd160', $passwd);
		header('Location: ./signup_success.php');
		exit();
	}

}

function echoErrors($errors){
	echo "<ul>";
	foreach($errors as $value){
		echo "<li>";
		echo $value;
		echo "</li>";
	}
	echo "</ul>";
}

?>