
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>DEMOサイドバー固定のサブメニュー[アコーディオン]</title>
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link href='style_side.css' rel='stylesheet' type='text/css'>
<style>
/* メニューここから */
#sidebar {
	font-size: 15px;
	padding: 30px 0;
	width: 260px;
	height: 100%;
	position: fixed;
	color: #033560;
	background: #fff;
	text-align: center;
}

#global-nav ul {
	list-style: none;
	margin-left: 0;
}
#global-nav > ul > li {
	position: relative;
}

#global-nav a {
	color: #033560;
	text-decoration: none;
	display: block;
	padding: 15px 0;
	-moz-transition: background-color .3s linear;
	-webkit-transition: background-color .3s linear;
	transition: background-color .3s linear;
}
#global-nav a:hover {
	font-weight: bold;
}

/* sub-menu icon */
#global-nav .sub-menu > a {
	position: relative;
}
#global-nav .sub-menu > a:after {
	content: "";
	position: absolute;
	top: 0;
	bottom: 0;
	right: 18px;
	margin: auto;
	vertical-align: middle;
	width: 8px;
	height: 8px;
	border-top: 1px solid #033560;
	border-right: 1px solid #033560;
	-moz-transition: all .2s ease-out;
	-webkit-transition: all .2s ease-out;
	transition: all .2s ease-out;
	-moz-transform: rotate(135deg);
	-webkit-transform: rotate(135deg);
	transform: rotate(135deg);
}
#global-nav .sub-menu.is-active > a:after {
	-moz-transform: rotate(-45deg);
	-webkit-transform: rotate(-45deg);
	transform: rotate(-45deg);
}

/* sub-menu */
#global-nav .sub-menu-nav {
	background: #e7eaec;
	color: #fff;
	display: none;
}

</style>
</head>
<body>


<aside id="sidebar">
	<h1 id="brand-logo">Logo</h1>
	<nav id="global-nav">
		<ul>
			<li><a href="#">Home</a></li>
			<li class="sub-menu">
				<a href="#">About</a>
				<ul class="sub-menu-nav">
					<li><a href="#">About 1</a></li>
					<li><a href="#">About 2</a></li>
					<li><a href="#">About 3</a></li>
				</ul>
			</li>
			<li class="sub-menu">
				<a href="#">Products</a>
				<ul class="sub-menu-nav">
					<li><a href="#">Product 1</a></li>
					<li><a href="#">Product 2</a></li>
					<li><a href="#">Product 3</a></li>
					<li><a href="#">Product 4</a></li>
				</ul>
			</li>
			<li>
				<a href="#">Link</a>
				<ul class="sub-menu-nav">
					<li><a href="#">Link 1</a></li>
					<li><a href="#">Link 2</a></li>
					<li><a href="#">Link 3</a></li>
				</ul>
			</li>
			<li><a href="#">Contact</a></li>
		</ul>
	</nav>
</aside>

<main id="main">
	<div id="main-in">
		<div id="main-visual">
			<h2>Sub Navigation 01</h2>
		</div>

		<section class="inner">
			<h3>サイドバー固定のサブメニュー[アコーディオン]</h3>
			<p>
				クリックするとサブメニューがアコーディオンが開く、一番オーソドックスなタイプです。
			</p>
			<p>
				このページの解説は下記をご覧ください。<br>
				<a href="http://www.webopixel.net/javascript/1368.html">サイドバー固定のサブメニュー実装パターン</a>
			</p>
			<p id="copyright"><a href="http://www.webopixel.net">&copy; webopixel</a></p>
		</section>
	</div><!-- /#main-in -->
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.0.0/velocity.min.js"></script>
<script type="text/javascript">
(function($) {
    $(function () {
        $('.sub-menu').on('click', function (e) {
            e.preventDefault();

            var $subNav = $('.sub-menu-nav', this);
            if ($subNav.css("display") === "none") {
                $(this).addClass('is-active');
                $subNav.velocity('slideDown', {duration: 400});
            } else {
                $(this).removeClass('is-active');
                $subNav.velocity('slideUp', {duration: 400});
            }
        });
    });
})(jQuery);
</script>
</body>
</html>