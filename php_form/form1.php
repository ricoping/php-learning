<?

$sub = "お仕事に関するお問い合わせ";
$subject2 = "その他のお問い合わせ";
$body = "お見積りの件で、連絡をしました。";

session_start();

$errors = array();

if(isset($_POST["submit"])){
	$name = $_POST["name"];
	$email = $_POST["email"];
	$subject = $_POST["subject"];
	$body = $_POST["body"];
	$extra = $_POST["extra"];

	$name = htmlspecialchars($name, ENT_QUOTES);
	$email = htmlspecialchars($email, ENT_QUOTES);
	$subject = htmlspecialchars($subject, ENT_QUOTES);
	$body = htmlspecialchars($body, ENT_QUOTES);

	if($name == ""){
		$errors["name"] = "お名前が入力されていません。";
	}


	if($email == ""){
		$errors["email"] = "メールアドレスが入力されていません。";
	}


	if($body == ""){
		$errors["body"] = "お問い合わせ内容が入力されていません。";
	}

	if(count($errors) === 0){
		$_SESSION["name"] = $name;
		$_SESSION["email"] = $email;
		$_SESSION["subject"] = $subject;
		$_SESSION["body"] = $body;
		$_SESSION["extra"] = $extra;
		

		header('Location: ./form2.php');
		exit();
	}

	echo "<pre>";
	var_dump($_POST);
	echo "</pre>";

}


echo "<pre>";
var_dump($errors);
echo "</pre>";

?>

<html>
<head>
<meta charset="utf-8">
<title>お問い合わせ</title>
</head>
<body>
	<h1><? echo $sub ?></h1>
	<p><? echo $body ?></p>

	<?
		echo "<ul>";
			foreach($errors as $value){
				echo "<li>";
				echo $value;
				echo "</li>";
			}
		echo "</ul>";

	?>

	<form action="form1.php" method="post">
	<table>
	<tr>
		<th>お名前</th><td><input
		type="text"
		name="name"
		value="<? if(isset($name)){
			echo $name;
			}?>"></td>
	</tr>
	<tr>
		<th>メールアドレス</th>
		<td><input type="text" name="email"
		value="<? if(isset($email)){
			echo $email;
			}?>"></td>
	</tr>
	<tr>
		<th>お問い合わせの種類</th>
		<td>
			<select name="subject">
				<option value="<? echo $sub ?>" <? if(isset($subject) && $subject === "お仕事に関するお問い合わせ"){ echo "selected"; } ?>><? echo $sub ?></option>
				<option value="<? echo $subject2 ?>" <? if(isset($subject) && $subject === "その他のお問い合わせ"){ echo "selected"; } ?>><? echo $subject2 ?></option>
			</select>
		</td>
	</tr>
	<tr>
		<th>お問い合わせ内容</th>
		<td>
			<textarea name="body" cols="40" rows="10"><?if(isset($body)){echo $body;}?></textarea>
		</td>
	</tr>
	<tr>
		<th>オプション</th>
		<td>
			<input type="checkbox" name="extra[]" value="interesting" <? if(isset($extra) && in_array("interesting", $extra)){ echo "checked"; } ?>>面白い

			<input type="checkbox" name="extra[]" value="useful" <? if(isset($extra) && in_array("useful", $extra)){ echo "checked"; } ?>>役に立つ

			<input type="checkbox" name="extra[]" value="not_good" <? if(isset($extra) && in_array("not_good", $extra)){ echo "checked"; } ?>>いまいち
		</td>
	</tr>

	<tr>
		<td colspan="2">
			<input type="submit" name="submit" value="確認画面へ">
		</td>
	</tr>
	</table>
	</form>
</body>
</html>





