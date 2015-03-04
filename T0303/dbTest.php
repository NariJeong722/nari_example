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

$query = "select * from member";
mysql_query("SET NAMES utf8"); // 한글셋팅;
$result = mysql_query ( $query );
if (! $result)
	die ( "[SQL error]" . mysql_error () );

$onOfField = mysql_num_fields ( $result ) . "<br>";
echo ("<table border=1 cellpadding=3 align='left'>");

echo ("<tr bgcolor='#cccccc'>");
for($i = 0; $i < $onOfField; $i ++) {
	$field_name = mysql_field_name ( $result, $i );
	echo ("<th align='center'>$field_name</th>");
}
echo ("</tr>");

while ( $row = mysql_fetch_array ( $result ) ) {
	echo ("<tr>");
	for($i = 0; $i < $onOfField; $i++) {
		$field_name = mysql_field_name ( $result, $i ); //id,name,age,email
		echo ("<td align='center'>$row[$field_name]</td>");
	}
	echo ("</tr>");
}
echo ("</table>");

mysql_close ( $dbconnect );
?>