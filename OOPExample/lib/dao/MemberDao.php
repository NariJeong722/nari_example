<?php
class MemberDao{
	private static $mMemberDao;
	
	private $mDbo;
	
	public static function getInstance(){
		if(!isset(MemberDao::$mMemberDao)){
			MemberDao::$mMemberDao = new MemberDao();
		}
		return MemberDao::$mMemberDao;
	}
	
	public function setDbo($mDbo){
		$this->mDbo = $mDbo;
		
	}
	
	public function selectMember(Member $member){
		$query='
				SELECT
					name, age
				FROM
					member
				WHERE
					id=:id
		';
		
		$stmt = $this->mDbo->prepare($query);
		$stmt->bindValue(':id',$member->getId(),PDO::PARAM_STR);
		if($stmt->execute()===FALSE){
			$error = $stmt->errorInfo();
			throw new PDOException('selectMember['.$error[0].']'.'['.$error[1].']'.$error[2]);
		}
		$memberList = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$memberList[] = $row;
		}
		
		return $memberList;
	}
	
}

?>
