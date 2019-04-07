<!DOCTYPE html PUBLIC "-//W3c//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<title>Sample page</title>
	</head>

	<body>
	<h1>登録しました!</h1>
	<?
		@session_start();

		if(isset($_SESSION['name'])){
			echo "ようこそ、".$_SESSION['name']."さん!<br/ >";
		}

	?>
	<a href="/mt/index.php">トップページへ</a>　<a href="#">管理ページへ</a>
	</body>
</html>