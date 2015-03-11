<?php 
	ob_start(); //쿠키와 html의 충돌 해결(Warning: Cannot modify header information...)setcookie는 html태그 전에 나타나야함.
?>
<!DOCTYPE html>
<?php
	$cookie_name="user";
	$cookie_value="nari";
	setcookie($cookie_name,$cookie_value, time()+(86400*30),"/");
	echo time()."<br>";
?>
<html>
	<body>
		<?php 
			if(!isset($_COOKIE[$cookie_name])){
				echo "Cookie named ' ".$cookie_name."'is not set!";
			}else{
				echo "Cookie'".$cookie_name."'is set!<br>";
				echo "Value is: ".$_COOKIE[$cookie_name];
			}
		?>	
		
		<p><strong>Note : cookie Test</strong>
	</body>
</html>
