<?

session_start();

if(isset($_SESSION)){
	echo "<pre>";
	echo var_dump($_SESSION);
	echo "</pre>";

	$name = $_SESSION["name"];
	$email = $_SESSION["email"];
	$body = $_SESSION["body"];
	$subject = $_SESSION["subject"];
	$extra = $_SESSION["extra"];
}

$_SESSION["token"] = base64_encode(openssl_random_pseudo_bytes(48));
$token = htmlspecialchars($_SESSION['token'], ENT_QUOTES);

?>

<html>
<head>
<meta charset="utf-8">
<title>確認画面 - お問い合わせ</title>
</head>
<body>
<h1>form2</h1>


<form action="form3.php" method="post">
	<table>
	<tr>
		<th>お名前</th><td><? if(isset($name)){
			echo $name;
			} ?></td>
	</tr>
	<tr>
		<th>メールアドレス</th>
		<td><? if(isset($email)){
			echo $email;
			}?></td>
	</tr>
	<tr>
		<th>お問い合わせの種類</th>
		<td><? if(isset($subject)){ echo "selected"; } ?></td>
	</tr>
	<tr>
		<th>お問い合わせ内容</th>
		<td>
			<?if(isset($body)){echo $body;}?>
		</td>
	</tr>
	<tr>
		<th>オプション</th>
		<td>
			<? foreach($extra as $value){echo $value.", ";} ?>
		</td>
	</tr>

	<tr>
		<td colspan="2">
			<input type="hidden" name="token" value="<? echo $token; ?>">
			<input type="submit" name="submit" value="確認画面へ">
		</td>
	</tr>
	</table>
</form>

</body>
</html>

