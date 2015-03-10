<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Example/OOPExample/lib/model/member/Member.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Example/OOPExample/lib/model/command/Command.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/Example/OOPExample/lib/dao/MemberDao2.php';
class MemberService2{
	private  static $MemberService2;
	
	private $memberDao;
	
	public static function getInstance(){
		if(!isset(MemberService2::$MemberService2)){
			MemberService2::$MemberService2 = new MemberService2();
		}
		return MemberService2::$MemberService2;
	}
	
	public function setMemberDao2(MemberDao2 $memberDao){	
		$this->memberDao=$memberDao;
	}
	
	public function selectMember(Command $command){
		try{
			$memberList = $this->memberDao->selectMember($command);
		}catch (Exception $e){
			print_r($e);
		}
		return $memberList;
	}
	
	public function recordNum(){ //전체 레코드 수 
		$recordNum = $this->memberDao->recordNum();
		return $recordNum;
	}
}


?>