<html>
<head>
<meta charset="utf-8">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<link rel="stylesheet" href="style.css" type="text/CSS"/>
</head>
<body>
<h3>Members of my Group are</h3>
<p></p>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		var members=["a","bb","ccc","dddd","eeeee"];
		$('p').html(members.join('<br/>'));
	});
</script>
</html>
