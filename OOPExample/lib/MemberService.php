<?php
require_once './model/member/Member.php';
require_once './dao/MemberDao.php';

class MemberService{
	private static $mMemberService;
	
	private $mMemberDao;
	
	public static function getInstance(){
		if(!isset(MemberService::$mMemberService)){
			MemberService::$mMemberService = new MemberService();
		}
		return MemberService::$mMemberService;
	}
	
	public function setMemberDao(MemberDao $mMemberDao){
		$this->mMemberDao=$mMemberDao;		
	}
	
	public function findMember(Member $mMember){
		$memberList = $this->mMemberDao->selectMember($member);
		return $memberList;
	}
	
}

?>