<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/Example/OOPExample/lib/model/member/Member.php';
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
	
	public function selectMember($option, $column, Member $member){
		try{
			$memberList = $this->memberDao->selectMember($option, $column, $member);
		}catch (Exception $e){
			print_r($e);
		}
		return $memberList;
	}
	
	public function recordNum(){
		$recordNum = $this->memberDao->recordNum();
		return $recordNum;
	}
}


?>