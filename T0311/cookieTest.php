<?php
?>
<html>
<head>
<meta charset="utf-8">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="../jquery.cookie.js"></script>
<script>
 		$(document).ready(function(){
			$("#btnSetCookie").click(function(){
				var isCookie = $.cookie("isCookie"); //쿠키 가져오기
				alert("셋팅 전 ,isCookie : " + isCookie);

				//쿠키셋
				 $.cookie("isCookie","Y",{expires:1}); //유효기한 1일

				isCookie = $.cookie("isCookie"); //쿠키 가져오기
				alert("셋팅 후 isCookie : " + isCookie);

				//쿠키삭제
				$.cookie("isCookie",null);
				//$.cookie("isCookie", " ",{expire:-1});				
 			});
		}); 
	</script>
</head>
<body>
	<input type="button" id="btnSetCookie" value="쿠키셋팅하기"/>
</body>
</html>