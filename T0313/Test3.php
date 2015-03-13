<html>
<head>
	<meta charset="utf-8"> 

	<link rel="stylesheet" href="style.css" type="text/CSS"/>
</head>

<body oncontextmenu = "return false">
	<p class="a">
		Books are the world of information.
	</p>
	<ul id="contextmenu">
		<li><a href="http://example.com">books</a>
			<ul>
				<li><a href="http://example.com">Web Development1</a></li>
				<li><a href="http://example.com">Web Development2</a></li>
				<li><a href="http://example.com">Web Development3</a></li>
			</ul>
		</li>
	</ul>
</body>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#contextmenu').hide();
		$('.a').mousedown(function(event){
			if(event.button==2){
				$('#contextmenu').show();
				$('#contextmenu').css({'position':'absolute','left':event.screenX,'top':event.screenY-70});
			}
		});

		$('a').hover(function(event){
			$(this).addClass('hover');
		});

		$('body').keypress(function(event){
			if(event.keyCode==27){				
				$('#contextmenu').hide();
			}
		});
	});
</script>
<?php


?>