<!DOCTYPE html PUBLIC "-//W3c//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1.0">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
			.parallaxParent {
				height: 100vh;
				overflow: hidden;
			}
			.parallaxParent > * {
				height: 300%;
				position: relative;
				top: -100%;
			}


		</style>



	</head>

	<body>
		<div class="spacer s0"></div>
		<div id="parallax1" class="parallaxParent">
			<div style="background-image: url(image.jpg);"></div>
		</div>
		<div class="spacer s1">
			<div class="box2 blue">
				<p>Content 1</p>
			</div>
		</div>

		<div class="spacer s2"></div>

		<?
			for($i = 0; $i < 100; $i++){
				echo "<hr>";
			}

		?>

		<script>
			// init controller
			var controller = new ScrollMagic.Controller({globalSceneOptions: {triggerHook: "onEnter", duration: "200%"}});

			// build scenes
			new ScrollMagic.Scene({triggerElement: "#parallax1"})
							.setTween("#parallax1 > div", {y: "80%", ease: Linear.easeNone})
							.addIndicators()
							.addTo(controller);

			new ScrollMagic.Scene({triggerElement: "#parallax2"})
							.setTween("#parallax2 > div", {y: "80%", ease: Linear.easeNone})
							.addIndicators()
							.addTo(controller);

			new ScrollMagic.Scene({triggerElement: "#parallax3"})
							.setTween("#parallax3 > div", {y: "80%", ease: Linear.easeNone})
							.addIndicators()
							.addTo(controller);
		</script>

	</body>
</html>




