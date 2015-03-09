<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Example/OOPExample/lib/MemberService2.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Example/OOPExample/util/template.php';
$memberService2 = MemberService2::getInstance();
$memberDao2 = MemberDao2::getInstance();

$servername = "localhost";
$username="scott";
$password="tiger";

$conn= new PDO("mysql:host=$servername;dbname=mydb", $username, $password);
$memberDao2->setDbo($conn);

$memberService2->setMemberDao2($memberDao2);
$member = new Member();

if($_GET['column'] == 'name'){
	$member->setName($_GET['keyword']);
}else{
	$member->setId($_GET['keyword']);
}

$recordNum = $memberService2->recordNum();



$memberList = $memberService2->selectMember($_GET['option'],$_GET['column'],$member);

$oTpl = new Template($_SERVER['DOCUMENT_ROOT'].'/Example/OOPExample/tpl/');

$oTpl->set('memberList',$memberList);

echo $oTpl->fetch('templateExample.tpl.php');
?>
