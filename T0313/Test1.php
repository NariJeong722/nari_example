<html>
<head>
<meta charset="utf-8">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<link rel="stylesheet" href="style.css" type="text/CSS"/>
</head>
<body>
<p>jQuery Test</p>
<p class="features">styles make the formatting job much easier and more efficient.</p>
To given attractive look to web sites, style.........................
<h1 class="feature">Using jQuery</h1>

</body>

<script type="text/javascript">
	$(document).ready(function(){
		/* $('p').text('helloooooo');
		alert($('p').html()); */

		$('p').prepend('<h2>1.안녕하세요</h2>');
		$('<h2>2.Power of selectors </h2>').prependTo('p');
		$('h2').clone().prependTo('p');
		$('p').addClass('highlight');
	});
</script>
</html>
<?php

?>