<?php
header('Content-Type: text/html; charset=utf-8');
echo "-----단방향 암호화-----------------------------------<br>";
$original_string="happybrown";
$salt = "$1$brownsalt";
$user_input="happyblack";

if(CRYPT_MD5==1){
	$crypt_string=crypt($original_string,$salt);
	if($crypt_string==crypt($user_input,$salt)){
		echo "비밀번호가 일치합니다.<br>";
	}else{
		echo "비밀번호가 일치하지 않습니다.<br>";
	}
}
else{
	echo "MD5 암호화 알고리즘을 지원하지 않습니다.<br>";
}
echo "<br>-----여러줄 사용, 따옴표 사용-----------------------------<br>";
echo "여러줄로 사용\n하는 방법과 따옴표 출력 \"따옴표\"<br>";

echo "<br>-----변수테스트---------------------------------------<br>";
$var ="오렌지";
echo "변수의 값은 $var입니다.<br>";
echo "변수의 값은 $var 입니다.<br>";
echo "변수의 값은 {$var}입니다.<br>";

echo "<br>-----특정문자열을 기준으로 잘라 배열에 담기---------------------<br>";
$nickname="조명진|브라운|다우니|brown|행복한 브라운|happybrown";
$nickname_Array = explode("|", $nickname);

echo "<pre>";
print_r($nickname_Array);
echo $nickname_Array[0];
echo "</pre>";

echo "<br>-----해당하는 모든 문자를 html 엔티티로 변환---------------------<br>";
$string = "Hello. My name is <B>brown</B>.<br>";
echo htmlentities($string)."<br>";
$string2 ="안녕하세요. 제 이름은 <B>정나리</B>입니다.<br>";
echo htmlspecialchars($string2)."<br>";

echo "<br>-----배열이나 원소를 하나의 문자열로 변환한다.---------------------<br>";
$nickname_Array2 = array('조명진','브라운','다우니','brown','행복브라운','happybrown');
$nickname2 = implode("|", $nickname_Array2);
echo $nickname2;

echo "<br><br>-----문자열 시작부분의 공백을 제거한다.---------------------<br>";
$string3=" \t 안녕하세요. \t 정나리입니다.";
echo ltrim($string3,"\t정나리");

echo "<br><br>-----문자열의 해시값 반환---------------------<br>";
$string4="brown";
echo md5($string4);

echo "<br><br>-----문자열의 개행문자 앞에 <비알/>태그를 추가한다.---------------------<br>";
$string5 ="안녕하세요.\n정나리입니다.\nㅋㅋㅋㅋ";
echo nl2br($string5);

echo "<br><br>-----문자열 출력------------------------------------------------<br>";
$var = TRUE;
$var ? print('TRUE'): print('FALSE');

echo "<br><br>-----문자열을 형식화하여 출력--------------------------------------------<br>";
$float = 12.345;
printf("정수 : %d<BR>",$float);
printf("정수 : %03d<BR>",$float);

printf("실수 : %f<BR>",$float);
printf("실수 : %.2f<BR>",$float);

printf("2진수 : %b<BR>",$float);
printf("8진수 : %o<BR>",$float);
printf("16진수 : %x<BR>",$float);

printf("%d+%d=%d",1,2,1+2);

echo "<br><br>-----문자열을 형식화하여 문자열로 출력--------------------------------------------<br>";
$float2=12.345;
$result = sprintf("소수 : %.3f",$float2);
echo $result;


echo "<br><br>-----sscanf:문자열을 형식에 따라 처리한다.--------------------------------------------<br>";
$christmas="2007-12-25";
$date = sscanf($christmas,"%d-%d-%d");
echo "{$date[0]}년 {$date[1]}월 {$date[2]}일은 크리스마스입니다.";

echo "<br><br>-----str_replace:문자열을 형식에 따라 처리한다.--------------------------------------------<br>";
$html ="<font color='%font_color%'>정나리</font>";
$html = str_replace("%font_color%", "blue", $html);
echo $html."<br><br>";

$text="브라운님아. 사시미 조낸 많이 먹어서 배가 만땅이에요.";
$bad_words=array("님아","만땅","조낸","사시미");
$good_words=array("님","가득","매우","회");
$text = str_replace($bad_words, $good_words, $text);
echo $text;
		
echo "<br><br>-----strlen:문자열 길이 반환--------------------------------------------<br>";
$str ='abcdef';
echo "'{$str}'의 길이 : ".strlen($str)."<br>";

$str ='가나다 라마'; //한글을 문자1당 길이3
echo "'{$str}'의 길이 : ".strlen($str)."<br>";

echo "<br><br>-----배열의 중복 제거(대소문자 구분)--------------------------------------------<br>";
$arr = array("배열","array","PHP","array");
echo 'array_unique($arr) : ';
print_r(array_unique($arr));
echo '배열길이count($arr) : '.count($arr);
echo "<br>";
		
$arr = array("배열","array","PHP","ARRAY");
echo 'array_unique($arr) : ';
print_r(array_unique($arr));
echo '배열길이count($arr) : '.count($arr); 
echo "<br>";
?>


