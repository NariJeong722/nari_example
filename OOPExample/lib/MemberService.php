<?php
require_once './lib/model/member/Member.php';
require_once './lib/dao/MemberDao.php';
class MemberService{
	private static $memberService;
	
	private $memberDao;
	
	public static function getInstance(){
		if(!isset(MemberService::$memberService)){
			MemberService::$memberService = new MemberService();
		}
		return MemberService::$memberService;
	}
	
	public function setMemberDao(MemberDao $memberDao){
		$this->memberDao=$memberDao;		
	}
	
	public function findMember(Member $member, $whereOption = 'EQUAL'){
		try{
			$memberList = $this->memberDao->selectMember($member, $whereOption);
		}catch(Exception $e){
			print_r($e);
		}		
		return $memberList;
	}
	
	public function deleteMember(member $member){
		try{
			$checkDelete = $this->memberDao->deleteMember($member);
		}catch(Exception $e){
			echo "memberService-deleteMember 에러 : ";
			print_r($e);
		}
		return $checkDelete;		
	}
	
	public function insertMember(member $member){
		try {
			$checkInsert = $this->memberDao->insertMember($member);
		}catch(Exception $e){
			echo "memberService-insertMember 에러 : ";
			print_r($e);
		}
	}

	
}

?>