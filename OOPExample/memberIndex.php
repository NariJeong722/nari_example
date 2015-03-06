<html>
<head><meta charset="UTF-8"></head>
<body>

</body>
</html>
<?php
require_once './lib/MemberService.php';
$memberService = MemberService::getInstance();
$memberDao = MemberDao::getInstance();

//------------DB연결-----------------------
$servername = "localhost";
$username = "scott";
$password = "tiger";
$conn = new PDO ( "mysql:host=$servername;dbname=mydb", $username, $password );
$memberDao->setDbo($conn);

$memberService->setMemberDao($memberDao);

$member = new Member();

//--------------<select>-------------------
echo "SELECT<br>";
$member->setId ( 'ㅋㅋ' );
$memberList = $memberService->findMember ( $member, 'LIKE' );
foreach ( $memberList as $k => $v ) {
	echo "age : " . $v [age] . "  |  name : " . $v [name] . "<br>";
}

//--------------<delete>-------------------
/* $member->setId ( 'id' );
$checkMember = $memberService->deleteMember ( $member );
print_r ( $checkMember );
 */

/* 
//-------------<insert>--------------------
echo "INSERT 하기<br>";
$member->setId($_POST[id]);
$member->setName($_POST[name]);
$member->setAge($_POST[age]);
$member->setEmail($_POST[email]);

$checkInsert = $memberService->insertMember($member);
echo "member [ ";
print_r($member);
echo "]";		
print_r($checkInsert); */
//<update>

?>