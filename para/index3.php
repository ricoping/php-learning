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

		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

		<!--
		<link href='tabulous.css' rel='stylesheet' type='text/css'>
		-->

		<script src="jquery.fadethis.js"></script>

		<link type="text/css" rel="stylesheet" href="responsive-tabs.css" />
		<link type="text/css" rel="stylesheet" href="style.css" />

		<link rel="stylesheet" href="slicknav.css"/>


		<title>Hello Nature</title>
		<style>
			body{
				padding: 0px;
				margin: 0px;
			}

			img{
				width: 400px;
				height: 400px;
				position: absolute;
			}

			#dog1{

			}

			#dog2{
				left: 200px;
				top: 100px;
			}

			#dog3{
				left: 560px;
				top: -39px;
			}

			.box1{
				width: 100px;
				height: 100px;
				margin: 0px auto !important;
			}

			.default{
				border-radius: 20px;
				margin: 0px !important;
				text-align: center;
				font-size: 3em;
				padding-top: 15px;
			}

			.red{
				background: red;
			}

			.green{
				background: green;
			}



			#gnav{
				list-style: none;
				background: gray;
				padding: 20px;
			}

			#gnav a{
				color:white;
			}

			#gnav li{
				display: inline-block;
			}

			.logo{
				font-size: 2em;
			}

			.slicknav_menu {
			 display:none;/*PC時は非表示*/
			}

			.tab-content{
				height: 200px;
			}

			@media screen and (max-width: 600px) {
				#gnav {
				 display:none;/*モバイル時は非表示*/
				}

				.slicknav_menu {
				 display:block;/*モバイル時は表示*/
				}
			}
/*
			.tab{
				height: 400px;
			}


			#tabs2 li{
				list-style: none;

			}

			.tablous-deactive{
				background: pink !important;
			}

			.tabulous_active{
				background: white !important;
			}*/

		</style>

	</head>

	<body>

	<ul id="gnav">
	　<li class="logo"><a href=""><strong>Ricoping's jQuery Lab!</strong></a></li>
	　<li><a href="" id="guide_nav">Guide</a></li>
	　<li><a href="">Menu 2</a></li>
	　<li><a href="">Menu 3</a></li>
	　<li><a href="">About</a></li>
	　<li><a href="">Contact</a></li>
	</ul>

	<div class="rellax">

		<h1 style="margin: 20px; color: gray;" data-rellax-speed="-7">hello world1</h1>

		</div>

		<?
			for($i = 0; $i < 20; $i++){
				echo "<br/>";
			}
		?>

		<div style="
			margin:35px;
			padding:20px;
			font-size:1.5em;
			border-radius:15px;
			border: 5px solid skyblue;
			display: inline-block;
			background: white;" data-rellax-speed="7">
			My DOGS!
		</div>
		<div style="height: 600px;">
			<div style="position: relative;">
				<div class="rellax" data-rellax-speed="0">
					<img id="dog1" src="dog1.jpg">
				</div>
				<div class="rellax" data-rellax-speed="2">
					<img id="dog2" src="dog2.jpg">
				</div>
				<div class="rellax" data-rellax-speed="1">
					<img id="dog3" src="dog3.jpg">
				</div>

			</div>
		</div>

		<?
			for($i = 0; $i < 20; $i++){
				echo "<br/>";
			}
		?>

		<div id="guide"></div>
		<?
			for($i = 0; $i < 20; $i++){
				echo "<br/>";
			}
		?>

		<div class="spacer s1"></div>
		<div id="trigger" class="spacer s1"></div>
		<div class="spacer s0"></div>

		<div style="
			width:100%;
			background: #dddddd; 
			height: 700px;
			">

			<div id="pin" class="default" style="
				width:350px;
				height:100px;
				border: 3px solid pink;
			">
				<p>Start Guide!</p>
			</div>
		</div>

		<div class="spacer s2"></div>


		<?
			for($i = 0; $i < 20; $i++){
				echo "<br/>";
			}
		?>
<!--

	<div id="tabs2">
		<ul>
			<li><a href="#tabs-1" title="" class="tablous-deactive">Tab 1</a></li>
			<li><a href="#tabs-2" title="" class="tablous-deactive">Tab 2</a></li>
			<li><a href="#tabs-3" title="" class="tablous-deactive">Tab 3</a></li>
		</ul>

		<div id="tabs_container">
			
		<div class="tab" id="tabs-1">
			    <p>Proin elit arcu, rutrum commodo, vehicula tempus, commodo a, risus. Curabitur nec arcu. Donec sollicitudin mi sit amet mauris. Nam elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus.</p><p>Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscing. Duis orci. Aliquam sodales tortor vitae ipsum. Aliquam nulla. Duis aliquam molestie erat. Ut et mauris vel pede varius sollicitudin. Sed ut dolor nec orci tincidunt interdum. Phasellus ipsum. Nunc tristique tempus lectus.</p>
		</div>

		<div class="tab" id="tabs-2">
			    <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor.</p>
	
		</div>

		<div class="tab" id="tabs-3">
			    <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem.</p><p> Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales.</p>
		</div>

		</div>
		
	</div><
	-->


	<div id="responsiveTabsDemo">
	    <ul>
	        <li><a href="#tab-1"> Title 1 </a></li>
	        <li><a href="#tab-2"> Title 2 </a></li>
	        <li><a href="#tab-3"> Title 3 </a></li>
	    </ul>

	    <div id="tab-1" class="tab-content"> Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem.</p><p> Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conub </div>
	    <div id="tab-2" class="tab-content"> bi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque mole </div>
	    <div id="tab-3" class="tab-content">  elementum quam ullamcorper ante. Etiam aliquet massa et lorem. Mauris dapibus lacus auctor risus.</p><p>Aenean tempor ullamcorper leo. Vivamus sed magna quis ligula eleifend adipiscin </div>
	</div>


		<?
			for($i = 0; $i < 20; $i++){
				echo "<br/>";
			}
		?>

		<script>$(window).fadeThis({speed: 1000});</script>
		<script src="rellax.min.js"></script>
		<!--
		<script type="text/javascript" src="tabulous.js"></script>
		<script type="text/javascript" src="js.js"></script>-->

		<script>var rellax = new Rellax('.rellax');</script>
		<script>
			$(function () { // wait for document ready
				// init controller



				var controller = new ScrollMagic.Controller();

				// show pin state
				function updateBox (e) {

					if (e.type == "enter") {
						$("#pin p").text("Walk!");
					} else {
						$("#pin p").text("Learn to fly...");
					}
				}

				function updateBox2 (e) {

					if (e.type == "enter") {
						$("#pin p").text("Fly!");
					} else {
						$("#pin p").text("Goal!");
					}
				}

				// build scenes
				new ScrollMagic.Scene({triggerElement: "#trigger", duration: 300})
					.setPin("#pin")
					.setClassToggle("#pin", "show")
					.on("enter leave", updateBox)
					//.addIndicators() // add indicators (requires plugin)
					.addTo(controller);

				new ScrollMagic.Scene({triggerElement: "#trigger", duration: 300, offset: 500})
					.setPin("#pin")
					.setClassToggle("#pin", "show")
					.on("enter leave", updateBox2)
					//.addIndicators() // add indicators (requires plugin)
					.addTo(controller);


			$('#responsiveTabsDemo').responsiveTabs({
			    startCollapsed: 'accordion'
			});

			});

		</script>
		<script src="jquery.responsiveTabs.min.js"></script>
		<script src="jquery.slicknav.min.js"></script>
		<script>
	        jQuery(function($){
	            $('#gnav').slicknav();
	        });


	        $('#guide_nav').click(function(e){
	        	e.preventDefault();
	        	$("html,body").animate({scrollTop:$('#guide').offset().top});
	        })
    	</script>
	</body>
</html>









