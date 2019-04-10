<?
	session_start();

	$error_msg = "";
	if(isset($_GET["error_msg"])){
		$error_msg = $_GET["error_msg"];
	}
	
	if(!isset($_SESSION["userid"], $_SESSION["name"]))
	{
		$data = urlencode("ログインが必要です");
		$fm = "./user_page.php";
		header("Location: ./login.php?data=".$data."&fm=".$fm);

	}else{
		try{

			//USER INFO
			$userid = $_SESSION["userid"];
			$pdo = new PDO("mysql:host=localhost;dbname=app;charset=utf8", "root", "");

			$stmt = $pdo->prepare("SELECT * FROM users WHERE id = '$userid'");

			$stmt->execute();
			$result = $stmt->fetch();
			if($result != null){

				$created_at = $result["created_at"];
				$gender = $result["gender"];
				$email = $result["email"];

			}else{
				$error_message = '<small id="userHelp" class="form-text text-muted alert alert-danger">Error</small>';
			}


			//COUNT
			$stmt = $pdo->prepare("SELECT * FROM diary WHERE userid = '$userid'");

			$stmt->execute();
			$user_all = $stmt->fetchAll();
			$count = count($user_all);

			//USER DIARY
			//SELECT * FROM orderdata LIMIT 3, 10;
			$p = 0;
			$limit = 3;
			if(isset($_GET["p"])){
				$p = $_GET["p"] - 1;
			}

			if($count%$limit == 0){
				$page = floor($count/$limit);
			}else{
				$page = floor($count/$limit) + 1;
			}

			$offset = $p * $limit;
			$stmt = $pdo->prepare("SELECT * FROM diary WHERE userid = '$userid' ORDER BY created_at DESC LIMIT ".$limit." OFFSET ".$offset);

			$stmt->execute();
			$results = $stmt->fetchAll();
			//var_dump($results);

			if($results != null){

				foreach($results as $key => $value){
					$diary_created_at = $value["created_at"];
					$text = $value["text"];
				}

				//$created_at = $result["created_at"];
				//$gender = $result["gender"];
				//$email = $result["email"];

			}else{
				$error_message = '<small id="userHelp" class="form-text text-muted alert alert-danger">Error</small>';
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

		<style type="text/css">
			body{
				margin: 0px;
				padding: 0px;
			}
			nav{
				width: 100%;
				margin: 0px;
				padding: 0px;
				background: gray;
				text-align: right;
			}

			.diary{
				background: gray;
				color: white;
				width: 500px;
				margin: 30px;
				padding: 30px;
				border-radius: 15px;
			}

			.page{
				display: inline-block;
				margin: 5px;
				background: gray;
				color: white;
				margin: 3px;
				padding: 10px;
				border-radius: 15px;
			}

			ul{
				margin: 0px;
			}

			li{
				display: inline;

			}

		</style>
		<title>Diary Site</title>
	</head>
	<body>
		<nav>

			<?

				if(isset($_SESSION["userid"], $_SESSION["name"])){
					echo '<ul><li>こんにちは, '.$_SESSION['name'].'さん</li><li><a href="/app/user_page.php">マイページへ</a></li><li><a href="/app/logout.php">ログアウト</a></li></ul>';

				}else{
					echo '<ul><li><a href="/app/login.php">ログイン</a></li><li><a href="/app/signup.php">登録</a></li></ul>';
				}
			
			?>
		</nav>


		<h1><? echo htmlspecialchars($_SESSION["name"]); ?>さんのページ</h1>
		<? echo $error_msg; ?>

		<ul>
			<li><strong>メールアドレス</strong>：<?echo htmlspecialchars($email);?></li>
			<li><strong>性別</strong>：<?echo htmlspecialchars($gender);?></li>
			<li><strong>参加日</strong>：<?echo htmlspecialchars($created_at);?></li>
		</ul>

		<p>
			<?
				for($i = 0; $i < 5; $i++){
					$day = date("Y/m/d", strtotime('-'.$i.' day')) . "\n";

				}
			?>
		</p>

		<p>
			<a href="write_diary.php">日記を書く</a>
		</p>

		<?
			if($results != null){
				foreach($results as $key => $value){
					echo "<div class='diary'>".$value["created_at"]."<br>".htmlspecialchars($value["text"])."<hr><a href='./diary_modify.php?diary_id=".$value["id"]."'>編集</a> <a href='./diary_delete.php?diary_id=".$value["id"]."'>削除</a>"."</div>";
				}
			}
		?><br>


		<?
			for($i = 0; $i < $page; $i++){
				$num = $i + 1;
				echo "<a href='./user_page.php?p=".$num."' class='page'>".$num."</a>";
			}
		?>

		<br><br>


	</body>
</html>