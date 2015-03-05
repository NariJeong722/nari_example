<html>
<head>
<meta charset="UTF-8">
</head>
<body>
	<script>
	function confirmDB(){
		window.open("dbTest.php");
	}

/* 	function searchID(insertUser){
		if(insertUser.length==0){
			document.getElementById("selecetedId").innerHTML="";
			return;
		}
		if(window.XMLHttpRequest){ //IE7,Chrome,Opera,Safari
			xmlhttp = XMLHttpRequest();
		}
		else{//IE6,IE5
			xmlhttp = new ActiveXObject(Microsoft.XMLHTTP);
		}
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState ==4 && xmlhttp.status==200){
				document.getElementById("selecetedId").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","dbTest_OOP?id="+insertUser,true);
		xmlhttp.send();
	} */
	</script>
	
<?php
// DB연결시작
$mysqli = new mysqli ( "localhost", "scott", "tiger", "mydb" );
$mysqli->autocommit (false);
mysqli_set_charset ( $mysqli, "SET CHARACTER SET 'utf8'" );
if (mysqli_connect_errno ()) {
	echo ("connect fail:::" . mysqli_connect_error ());
} else
	echo "[connection OK]<br>";
// member 테이블의 모든 값 출력 시작
$query = $mysqli->prepare ( "insert into member(id, name, age, email) values(?,?,?,?)" );
$query->bind_Param ( "ssis", $_POST [id], $_POST [name], $_POST [age], $_POST [email] );
$query->execute ();
if ($mysqli->error) {
	echo "에러발생";
	$mysqli->rollback ();
} else {
	echo "성공";
	$mysqli->commit ();
}
echo "<input type='button' name='confirm' value='db확인' OnClick='confirmDB();'><br>";
$query->close ();
$mysqli->close ();
?>
<form id="form" method="post" action="searchId.php">
<input type="text" name="insertUser" ><br>
<input type="submit"><br>
</form>

</body>
</html>

