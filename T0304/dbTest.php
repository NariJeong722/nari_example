<?php
header('Content-Type: text/html; charset=utf-8');
$mysqli = new mysqli ( "localhost", "scott", "tiger", "mydb" );
$mysqli->autocommit ( false );
mysqli_set_charset($mysqli, "SET CHARACTER SET 'utf8");
if (mysqli_connect_errno ()) {
	echo ("connect fail:::" . mysqli_connect_error ());
} else
	echo "[connection OK]<br>";
$query = "select * from member";

if ($result = $mysqli->query ( $query )) {
	$fieldNum = mysqli_num_fields ( $result );
	$finfo = $result->fetch_fields ();
	foreach ( $finfo as $val ) {
		$arr [] = $val->name;
	}
}

echo ("<table border=1 cellpadding=3 align='left'>");
echo ("<tr bgcolor='#cccccc'>");
//필드명
for($i = 0; $i < $fieldNum; $i ++) {
	$fieldName = $arr [$i];
	echo ("<th>$arr[$i]</th>");
}
echo "</tr>";

while ( $row = mysqli_fetch_array ( $result ) ) {
	echo ("<tr>");
	for($i = 0; $i < $fieldNum; $i ++) {
		$fieldName = $arr [$i];
		$content = $row [$fieldName];
		echo ("<td align='center'>$row[$fieldName]</td>");		
	}
	echo "</tr>";
}
echo "</table>";

$mysqli->close();
?>