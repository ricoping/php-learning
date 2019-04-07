<!DOCTYPE html PUBLIC "-//W3c//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="/mt/js/parallax.min.js"></script>
		<script src="/mt/js/jquery.fadethis.js"></script>

		<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.3/ScrollMagic.js"></script>
		<script src="/mt/js/plugins/animation.gsap.js"></script>

		<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/debug.addIndicators.min.js"></script>
	
		<script src="//cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>

		<title>Hello Nature</title>
		<style>
			body{
				padding: 0px;
				margin: 0px;
			}

			.profile-title{
			  border-bottom: solid 3px skyblue;
			  position: relative;
			}

			.profile-title:after {
			  position: absolute;
			  content: " ";
			  display: block;
			  border-bottom: solid 3px #ffc778;
			  bottom: -3px;
			  width: 30%;
			}

			.profile-description {
			  position: relative;
			  color: #158b2b;
			  font-size: 20px;
			  padding: 10px 0;
			  text-align: center;
			  margin: 1.5em 0;
			}


			.parallax-window {
				 min-height: 100vh;
				 height: 100vh;
				 background: transparent;
			}

			.parallax-window-2 {
				 min-height: 300px;
				 height: 300px;
				 background: transparent;
			}

			.area01{
				padding-top:40vh;
				height: 60vh;
				color: #fff;
				text-align: center;
			}

			.area02{
				height: 300px;
				color: #fff;
				display: -webkit-flex;
			    display: -moz-flex;
			    display: -ms-flex;
			    display: -o-flex;
			    display: flex;
			}

			.area03{
				padding-top:100px;
				height: 200px;
				color: #fff;
				text-align: center;
			}

			.content{
				margin: 120px;
			}

			.content-1{
				text-align: center;
			}

			.cntr{
				display: inline-block;
				margin: 0px auto;
			}

			.lft{
				margin-left: 120px;
			}

			.map-description{
				margin-top: 80px;
				width:50%;
			}

			.map-image{
				width:100%;
				height:100%;
			}

			.map-image-container{
				width:50%;
			}

			.step-container{
				margin-top: 80px;

			}
			
			.box2{
				text-align: center;
			}

			.steps {
			  color: #505050;
			  padding: 0.5em 1.8em;
			  display: inline-block;
			  line-height: 1.3;
			  background: #dbebf8;
			  vertical-align: middle;
			  border-radius: 25px 25px 25px 25px;
			}

			.active {
				background: orange;
			}

			.cb-header {
			  position: fixed; 
			  top: 0; 
			  left: 0;
			  width: 100%;
			  height: 30px;
			  padding:8px;
			}

			.cb-header ul{
				display: inline;
			}

			.cb-header ul li{
				display: inline;
			}

			.nav-ul{
				display:-webkit-flex;
				display:flex;
				width:100%;
				justify-content: space-between;
				list-style-type:none;
			}

			.nav-title{
				float: left;
			}

			.nav-user{
				float: right;
			}

			.box {
				border-radius: 8px;
				border: 0px solid white;
				text-align: center;
				vertical-align: middle;
				padding: 5px;
				background-color: #3883d8;
				color: white;
				min-width: 50px;
				height: 50px;
				margin: 120px auto;
				width: 250px;
			}

			a{
				text-decoration: none;
			}

			.fish {
				width: 350px;
			}

		</style>



	</head>

	<body>

	<!--NAV-->
	<nav class="cb-header" style="background-color: #e3f2fd;">
		<span class="nav-title">
			Ricoping's Mountain
		</span>

		<?
			@session_start();

			if(!isset($_SESSION["name"])){
				echo '<span class="nav-user"><a href="login.php">ログイン</a>　<a href="signup.php">登録</a>　　</span>';
			}else{
				echo '<span class="nav-user">こんにちは'.$_SESSION['name'].'さん　<a href="user_admin.php">管理ページ</a><a href="/mt/logout.php">　ログアウト</a>　　</span>';
			}
		?>
		<div style="clear:both;"></div>
	</nav>
	<!--/NAV-->


	<div class="parallax-window" data-parallax="scroll" data-image-src="/mt/img/image.jpg">
	<div class="area01">

		<h1>Ricoping's Mountain</h1>
		<p>Whispering...</p>
	</div>

	<div class="content-1 content">

		<div class="slide-bottom cntr">
			
			<h2 class="profile-title">ようこそ、Ricoping's mountainへ</h2>
			<p class="profile-description">
				ここは福岡のとある山奥・・・<br>
				都会の喧騒から離れて、静かなひと時を過ごしてみませんか？
			</p>

		</div>

	</div>

	<!-- MAP -->
	<div class="parallax-window-2" data-parallax="scroll" data-image-src="/mt/img/image2.jpg">

	<div class="area02">
		<div class="slide-left lft map-description">
			
			<h2>天神から車で◯◯分の良アクセス</h2>
			<p>
				楽しく遊んだあとは、静かに語り合いたい。<br>
				
			</p>

		</div>

		<div class="map-image-container" id="imagesequence">
		<div class="spacer s2"></div>
		<div class="spacer s0" id="trigger"></div>

		<img id="myimg" src="/mt/img/map01.jpg" class="map-image">
			
		<!--<img src="/mt/img/map.png" class="map-image">-->

		</div>

	</div>

	<!-- /MAP -->

	<!-- STEP -->
	<div class="step-container">

		<div class="spacer s1" id="sec1">
			<div class="box2">
				<h2 class="steps" id="high1">お好きな日にちを決めます</h2>
				<h3>↓</h3>
			</div>
		</div>
		<div class="spacer s1" id="sec2">
			<div class="box2">
				<h2 class="steps" id="high2">Webで簡単予約！</h2>
				<h3>↓</h3>
			</div>
		</div>
		<div class="spacer s1" id="sec3">
			<div class="box2">
				<h2 class="steps" id="high3">良識を持ってご利用</h2>
				<h3>↓</h3>
			</div>
		</div>
		<div class="spacer s1" id="sec4">
			<div class="box2">
				<h2 class="steps" id="high4">帰るときはご連絡を！</h2>
			</div>
		</div>
		<div class="spacer s2"></div>

	</div>
	<!-- /STEP -->

	<br /><br />

	<!-- MAP -->
	<div class="parallax-window-2" data-parallax="scroll" data-image-src="/mt/img/image.jpg">
	<div class="area03">
		<h3>Enjoy!</h3>
	</div>

	<!-- /MAP -->

	<div class="spacer s2"></div>
	<div id="trigger3" class="spacer s0"></div>
	<a href="./signup.php">
		<div id="animate3" class="box">
			<p>さっそく登録してみる！</p>
		</div>
	</a>
	<div class="spacer s2"></div>


	<?
		for($i=0;$i<5;$i++){
			echo "<br>";
		}
	?>

	<script>$(window).fadeThis({speed: 1000});</script>


	<script>
		// MAP
		// define images
		var images = [
			"/mt/img/map02.jpg",
			"/mt/img/map03.jpg",
			"/mt/img/map04.jpg",
			"/mt/img/map05.jpg",
			"/mt/img/map07.jpg",
			"/mt/img/map08.jpg",

		];

		var obj = {curImg: 0};

		var tween = TweenMax.to(obj, 0.5,
			{
				curImg: images.length - 1,
				roundProps: "curImg",
				repeat: 0,
				immediateRender: true,
				ease: Linear.easeNone,
				onUpdate: function () {
				  $("#myimg").attr("src", images[obj.curImg]);
				}
			}
		);

		var controller = new ScrollMagic.Controller();

		var scene = new ScrollMagic.Scene({triggerElement: "#trigger", duration: 300})
				.setTween(tween)
				//.addIndicators() 
				.addTo(controller);

	</script>

	<script>
		// STEP
		// init controller
		var controller = new ScrollMagic.Controller({globalSceneOptions: {duration: 100}});

		// build scenes
		new ScrollMagic.Scene({triggerElement: "#sec1"})
						.setClassToggle("#high1", "active") // add class toggle
						//.addIndicators() // add indicators (requires plugin)
						.addTo(controller);
		new ScrollMagic.Scene({triggerElement: "#sec2"})
						.setClassToggle("#high2", "active") // add class toggle
						//.addIndicators() // add indicators (requires plugin)
						.addTo(controller);
		new ScrollMagic.Scene({triggerElement: "#sec3"})
						.setClassToggle("#high3", "active") // add class toggle
						//.addIndicators() // add indicators (requires plugin)
						.addTo(controller);
		new ScrollMagic.Scene({triggerElement: "#sec4"})
						.setClassToggle("#high4", "active") // add class toggle
						//.addIndicators() // add indicators (requires plugin)
						.addTo(controller);
	</script>
	<script>
		$(function () {

		  // scrollイベントを取得した際の処理を定義
		  $(window).on("scroll", function () {
		    // scrollTop()が0より大きい場合
		    if ($(this).scrollTop() > 150) {
		      // ヘッダーバーをslideDownして表示
		      $(".cb-header").slideDown();
		    // scrollTop()が0の場合
		    } else {
		      // ヘッダーバーをslideUpして非表示
		      $(".cb-header").slideUp();
		    }
		  });

		});
	</script>

	<script>
		var controller = new ScrollMagic.Controller();

		var tween = TweenMax.to("#animate3", 1, {className: "fish box"});

		var scene = new ScrollMagic.Scene({triggerElement: "#trigger3", duration: 200, offset: -50})
						.setTween(tween)
						//.addIndicators({name: "tween css class"}) 
						.addTo(controller);

	</script>
	</body>
</html>




