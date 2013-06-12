<html>
	<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Linux Geekers</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8" />
		 <!--<script type="text/javascript">var _siteRoot = 'index.html', _root = 'index.html';</script>-->
		 <script src="js/jquery-1.7.2.min.js"></script>
		<script src="js/lightbox.js"></script>
		<link href="css/lightbox.css" rel="stylesheet" />
		<script src="js/slides.min.jquery.js"></script>
		<script src="js/slides.jquery.js"></script>
  <!--<script type="text/javascript" src="js/jquery.js"></script>-->
  <!--<script type="text/javascript" src="js/scripts.js"></script>-->
 <!--<script type="text/javascript" src="js/slides.min.jquery.js"></script>-->
		  	</head>

	<body>
		<div id="background">
		<div style = "background:#0a0a0a; min-height:700px;  width:960px; text-align: center;
	margin: 0px auto;">
			<div id="page" style="opacity:1;">
				<?php session_start();
				include ("header.php");
				include ("admin/inc/config.php");
					?>
					
						<!--<script
						type = " text="" javascript="">
						if(!window.slider) var slider={};slider.data=[{"id":"slide-img-1","client":"nature beauty","desc":"nature beauty photography"},{"id":"slide-img-2","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-3","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-4","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-5","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-6","client":"nature beauty","desc":"add your description here"},{"id":"slide-img-7","client":"nature beauty","desc":"add your description here"}];
						</script>-->
						<!-- /#header -->


						<div id="contents">
					<?php
					if (isset($_GET['page'])) {
						$page = $_GET['page'] . ".php";
						require_once $page;
					} else {
						require_once 'home.php';
					}
					?>
			
				
				<!-- /#page -->
			</div>
			<?php
			include ("footer.php");
					?>
			<!-- /#background -->
			</div>
			</div>
			</div>
	</body>
</html>