<!DOCTYPE html PUBLIC "-//W3c//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />

		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/1.1.1/typed.min.js"></script>

		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


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

			ul{
				margin: 0px;
				padding: 8px;
			}

			ul li{
				display: inline;
				margin: 9px;

			}
		</style>
		<title>Diary Site</title>
	</head>
	<body>
		<nav>

			<?
				session_start();

				if(isset($_SESSION["userid"], $_SESSION["name"])){
					echo '<ul><li>こんにちは, '.$_SESSION['name'].'さん</li><li><a href="/app/user_page.php">マイページへ</a></li><li><a href="/app/logout.php">ログアウト</a></li></ul>';

				}else{
					echo '<ul><li><a href="/app/login.php">ログイン</a></li><li><a href="/app/signup.php">登録</a></li></ul>';
				}
			
			?>
		</nav>
		<h1>Welcome To Portfolio Site</h1>

		<div class="type-wrap">
			<span id="typed" style="white-space:pre;"></span>
		</div>


		<script>
		$(function() {
			$("#typed").typed({
				strings: ["", "ご覧いただきありがとうございます!<br>機能の学習のためのシンプルなデザインとなっています。<br><br><strong>主な機能:</strong><br><ol><li>概要：簡単な日記サイト</li><li>一度投稿した日記の編集・削除機能</li><li>使用言語など：PHP, MySQL, XAMPP</li><li>登録・ログイン機能</li><li>CSRF対策のためのトークンを利用した認証</li><li>入力フォームのバリデーション</li><li>ページネーションの実装</li></ul>"],
				typeSpeed: 2,
				startDelay: 0,
				backSpeed: 2,
				backDelay: 0,
				loop: false,
				cursorChar: "",
				contentType: 'html'
			});
		});
		</script>
	</body>
</html>