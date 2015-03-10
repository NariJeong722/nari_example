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

$command = new Command();
$command->setOPtion($_GET['option']);
$command->setColumn($_GET['column']);
$command->setKeyword($_GET['keyword']);

if($command->getColumn() == 'name'){
	$member->setName($command->getKeyword());
}else{
	$member->setId($command->getKeyword());
}
$command->setMember($member);

//---------------------------page 계산-------------------
$recordNum= $memberService2->recordNum(); //전체 레코드 수 
$curPage=$_GET['page'];

if(!$curPage || $curPage<=0)$curPage=1; //현재 페이지
$aPage=5; //한 페이지당 컬럼 수
$aBlock=5; //한 블록당 페이지 수
$curBlock=($curPage/$aPage)+1; //현재 블럭
$totalPage = ceil($recordNum/$aPage); //전체 페이지 수
$totalblock = ceil($recordNum/$aPage/$aBlock); //전체 블록 수
$lastPage=ceil($totalRecord/$aPage)+1; // 전체의 마지막 페이지 수
$b_startPage=(($curBlock-1)*$aBlock)+1; //블록의 시작페이지
$b_endPage=($totalPage>$b_startPage+$aPage-1)?$totalPage:$b_startPage+$aPage-1; //블록의 마지막 페이지
$offset=($curPage-1)*$aPage;

$command->setOffset($offset);
$command->setLimit($aPage);





//---------------------------page 계산 끝-----------------



$memberList = $memberService2->selectMember($command);

$oTpl = new Template($_SERVER['DOCUMENT_ROOT'].'/Example/OOPExample/tpl/');

$oTpl->set('memberList',$memberList);
$oTpl->set('totalPage',$totalPage);
$oTpl->set('curPage',$curPage);
echo $oTpl->fetch('templateExample.tpl.php');
?>
