<?php
header('Content-Type: text/html; charset=utf-8');
//echo phpinfo();
echo date("오늘은 Y년 m월 d일 입니다.")."<br>";
echo date("지금시각은 H시 i분 s초 입니다.")."<br>";
echo date("오늘은 올해의 z번째 날입니다.")."<br>";
echo date("오늘은 올해의 W번째 주입니다.")."<br>";

$date = mktime(6,28,31,6,8,2009);
echo date("주어진 날짜는 Y년 m월 d일 입니다.",$date)."<br>";
echo date("주어진 시각은 h시 i분 s초 입니다.",$date)."<br>";

echo date("지금은 A입니다.")."<br>";

$today=getdate();
foreach ($today as $key=>$value){
	echo $key." : ".$value."<br>";
}
print_r($today);
var_dump($today);
echo "오늘은 ".$today[year]."년 ".$today[mon]."월 ".$today[mday]."일 입니다.<br>";

$arr = array("one", "two", "three");
reset($arr);
while (list($key, $value) = each($arr)) {
	echo "Key: $key; Value: $value<br />\n";
}

foreach ($arr as $key => $value) {
	echo "Key: $key; Value: $value<br />\n";
}

$txt='
username="brown",
realm="ezphp.net",
qop="auth",
algorithm="MD5",
uri="/login/digest.php",
nonce="472d4699aba99",
nc=00000001,
cnonce="d973db68233f72060e43e416d29ebe9",
opaque="2376e4fe270a0eaee637100877a779f3",
response="3d65f9e6943c17ba9ff28108c1351bba"
';

$txt=str_replace("=", "=>", $txt);
$txt="\$data = array($txt);";
eval($txt);
$data[nc]=str_pad($data[nc],8,"0",STR_PAD_LEFT);
echo "<PRE>";
print_r($data);
print_r($data['realm']);
echo "</PRE>";

//echo $txt."<br>";

$arr2=array("arr1"=>"jrint_r1","arr2"=>"print_r2","arr3"=>"print_r3");
print_r($arr2);

foreach ($arr2 as $var){
	echo "<br>foreach::".$var;
} 

echo $_SERVER['SERVER_PORT'];

?>