<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>Linux Geekers Dashboard</title>

		<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
		<!--[if lt IE 9]>
		<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
		<script src="js/hideshow.js" type="text/javascript"></script>
		<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$(".tablesorter").tablesorter();
			});
			$(document).ready(function() {

				//When page loads...
				$(".tab_content").hide();
				//Hide all content
				$("ul.tabs li:first").addClass("active").show();
				//Activate first tab
				$(".tab_content:first").show();
				//Show first tab content

				//On Click Event
				$("ul.tabs li").click(function() {

					$("ul.tabs li").removeClass("active");
					//Remove any "active" class
					$(this).addClass("active");
					//Add "active" class to selected tab
					$(".tab_content").hide();
					//Hide all tab content

					var activeTab = $(this).find("a").attr("href");
					//Find the href attribute value to identify the active tab + content
					$(activeTab).fadeIn();
					//Fade in the active ID content
					return false;
				});

			});
		</script>
		<script type="text/javascript">
			$(function() {
				$('.column').equalHeight();
			});

		</script>
		<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript">
			tinyMCE.init({
				// General options
				mode : "textareas",
				theme : "advanced",
				plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

				// Theme options
				theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
				theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
				theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
				theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left",
				theme_advanced_statusbar_location : "bottom",
				theme_advanced_resizing : true,

				// Skin options
				skin : "o2k7",
				skin_variant : "silver",

				// Example content CSS (should be your site CSS)
				//content_css : "css/example.css",

				// Drop lists for link/image/media/template dialogs
				template_external_list_url : "tinymce/examples/lists/template_list.js",
				external_link_list_url : "tinymce/examples/lists/link_list.js",
				external_image_list_url : "tinymce/examples/lists/image_list.js",
				media_external_list_url : "tinymce/examples/lists/media_list.js",

				// Replace values for the template plugin
				template_replace_values : {
					username : "Some User",
					staffid : "991234"
				}
			});
		</script>
	</head>
	<body>
<?php
session_start();
require_once '../inc/function.php';
if (!isset($_SESSION['username'])) {
	//die("Anda belum login");
	header("location:login.php");
}
include 'inc/config.php';
include 'header.php';
if (isset($_GET['page'])) {
	$page = $_GET['page'] . ".php";
	include ($page);
} else {
	include ('home.php');
}
?>
	</body>
</html>