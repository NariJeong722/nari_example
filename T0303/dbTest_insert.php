<html>
<head></head>
<body>
	<script>
	function confirmDB(){
	window.open("dbTest.php");
		}

	</script>
</body>
</html>

<?php
$dbconnect = mysql_connect ( "localhost", "scott", "tiger" );

if (! $dbconnect) {
	die ( "[connection error]" . mysql_error () );
}

echo "[connection OK]<br>";
$flag = mysql_select_db ( "mydb" );
if (! $flag)
	die ( "[DB selection error]" . mysql_error () );
else
	echo "데이터베이스 mydb가 선택됨<br>";
$insertQuery="insert into member(id, name, age, email) 
		values('".$_POST[id]."','".$_POST[name]."',".$_POST[age].",'".$_POST[email]."')";
mysql_query ( "SET NAMES euckr" );
$insertResult=mysql_query($insertQuery);
if(!$insertResult){
	die("[insert error]".mysql_error());
}else{
	echo("[insert OK]");
	echo "<input type='button' name='confirm' value='db확인' OnClick='confirmDB();'>";
}
mysql_close ( $dbconnect );
?>