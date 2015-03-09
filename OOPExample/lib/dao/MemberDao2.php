<?php
class MemberDao2{
	private static $memberDao;
	private $dbo;
	public static function getInstance(){
		if($isset (MemberDao2::$memberDao)){
			MemberDao2::$memberDao = new MemberDao2();
		}
		return MemberDao2::$memberDao;
	}
	
	public function setDbo($dbo){
		$this->dbo = $dbo;
		$dbo->beginTransaction();
		$dbo->query("SET NAMES utf8");
	}
	
	public function selectMember($option, $column, Member $member){
		try{
			$query='
				SELECT
					id, name, age, email
				FROM
					member
				WHERE
					1=1					
			';
			
			$aCondition = array();
			$aBindParam = array();
			
			if($option == 'like'){
				if($column == 'name'){
					$aCondition[] = 'AND name LIKE :name';
					$aBindParam[':name'] = array('%'.$member->getName().'%', PDO::PARAM_STR);
				}else if($column == 'id'){
					$aCondition[] = 'AND id LIKE :id';
					$aBindParam[':id'] = array('%'.$member->getId().'%', PDO::PARAM_STR);
				}
			}else if($option == 'equal'){
				if($column == 'name'){
					$aCondition[] = 'AND name = :name';
					$aBindParam[':name'] = array('%'.$member->getName().'%', PDO::PARAM_STR);
				}else if($column == 'id'){
					$aCondition[] = 'AND id = :id';
					$aBindParam[':id'] = array('%'.$member->getId().'%', PDO::PARAM_STR);
				}
			}
			
			if(count($aCondition)>0){
				$query.=implode(' ', $aCondition);
			}
			$stmt = $this->dbo->prepare($query);
			
			foreach ($aBindParam as $sKey=>$aParam){
				$stmt->bindParam($sKey, $aParam[0], $aParam[1]);				
			}
			
			if($stmt->execute() === FALSE){
				$error = $stmt->errorInfo();
				throw new PDOException();
			}
			
			$memberList = array();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				$memberList[] = $row;
			}
			
		} catch (PDOException $e){
			echo 'selectMember['.$error[0].'] ['.$error[1] .'] ['.$error[2],']';
		}
		return $memberList;
	}
	
}

?>