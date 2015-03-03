<?php
/* 	$a = array(1,2);
	$b = array(1=>2,0=>1);
	
	if($a===$b) echo '$a와 $b는 동일한 배열이다.';
	else echo '$a와 $b는 동일하지 않은 배열이다.'; */
	
	$fruits=array("img12.1","img11.1","img11.2","img1.1");
	natsort($fruits);
	echo "<pre>";
	print_r($fruits);
	echo "</pre>";
	
	
?>