<?php
require_once './lib/model/member/Member.php';
require_once './lib/dao/MemberDao2.php';
class MemberService2{
	private  static $templatService;
	
	private $memberDao;
	
	public static function getInstance(){
		if(!isset(MemberService2::$templatService)){
			MemberService2::$templatService = new MemberService2();
		}
		return MemberService2::$templatService;
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
}


?>