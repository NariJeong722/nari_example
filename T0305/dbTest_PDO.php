<html>
<head><meta charset="UTF-8"></head>
<body>


<?php
$servername = "localhost";
$username = "scott";
$password = "tiger";
try {
	$conn = new PDO ( "mysql:host=$servername;dbname=mydb", $username, $password );
	$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	echo "Connected successfully<br>";
	$sql="select * from member where id like ?";
	$userId='%'.$_POST[insertId].'%';	//미리 변수에 받은 후 %를  붙여줘야 함.
	$stmt=$conn->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_FWDONLY));
	$stmt->bindParam(1,$userId,PDO::PARAM_STR);
	$stmt->execute();
	

	while($rows =  $stmt->fetch(PDO::FETCH_ASSOC)) {
		echo count($rows);	
		
		//print_r($rows);
		//echo "<br>";	
		//$aTest ['id'] = $rows['id'];
		//echo "aTest::".$aTest['id']."<br>";
		echo "id=".$rows['id']." | ";
		echo "name=".$rows['name']." | ";
		echo "age=".$rows['age']." | ";
		echo "email=".$rows['email']." <br>";
		
	}
	//print_r($aTest); //마지막 값만 찍힘.
}catch(PDOException $e){
	echo "Connection failed: ".$e->getMessage();
}

$conn=null;
?>


</body>
</html>