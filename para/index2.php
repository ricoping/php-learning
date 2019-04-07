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



		<title>Hello Nature</title>
		<style>
			body{
				padding: 0px;
				margin: 0px;
			}

		</style>

	</head>

	<body>
		<h1 style="margin: 20px; color: gray;">hello world1</h1>
		<div class="rellax">

		</div>
		<div class="rellax" data-rellax-speed="-7">
		  I’m extra slow and smooth
		</div>

		<div style="width: 800px;height: 1600px;background: #fcfcfc;position: absolute;">
		<?
			$count = 0;

			while($count < 50){
				$randw = rand(0, 700);
				$randh = rand(0, 1500);
				$rands = rand(5,15);
				$randsp = rand(-3, 3);
				echo "<div data-rellax-speed='".$randsp."' class='rellax'
				style='
				position: absolute;
				left: ".$randw."px;
				top: ".$randh."px;
				font-size: $rands"."em;'>●</div>";
				$count++;
			}
		?>
		</div>

	<script src="rellax.min.js"></script>

	</body>
</html>









