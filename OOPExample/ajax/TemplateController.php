<html>
<head><meta charset="UTF-8"></head>
<body>

</body>
</html>
<?php
require_once './lib/MemberService2.php';
$memberService2 = MemberService2::getInstance();
$memberDao2 = MemberDao2::getInstance();

$servername = "localhost";
$username="scott";
$password="tiger";

$conn= new PDO("mysql:host=$servername;dbname=mydb", $username,$password);
$memberDao2->seDbo($conn);

$memberService2->setMemberDao2($memberDao);
$member = new Member();
$memberList = $memberService2->setMemberDao2($_POST[search1],$_POST[search2],$_POST[search3]);
print_r($memberList);
		
echo "<tr>";
echo "<td>Nari</td>";
echo "<td>정나리</td>";
echo "<td>26</td>";
echo "<td>nari@email.com</td>";		
echo "</tr>";

?>
