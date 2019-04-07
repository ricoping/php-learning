<?
	@session_start();

	unset($_SESSION["userid"]);
	unset($_SESSION["name"]);

?>


<!DOCTYPE html PUBLIC "-//W3c//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<title>Sample page</title>
	</head>

	<body>
		<h1>ログアウトしました</h1>
		<a href="/mt">トップページ</a>

	</body>
</html>




