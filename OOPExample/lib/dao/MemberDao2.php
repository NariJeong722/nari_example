<?php
class MemberDao2{
	private static $memberDao;
	private $dbo;
	public static function getInstance(){
		if(!isset (MemberDao2::$memberDao)){
			MemberDao2::$memberDao = new MemberDao2();
		}
		return MemberDao2::$memberDao;
	}
	
	public function setDbo($dbo){
		$this->dbo = $dbo;
		$dbo->beginTransaction();
		$dbo->query("SET NAMES utf8");
	}
	
	public function selectMember(Command $command){	

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
			if($command->getOption() == 'like'){
				if($command->getColumn() == 'name'){
					$aCondition[] = 'AND name LIKE :name';
					$aBindParam[':name'] = array('%'.$command->getMember()->getName().'%', PDO::PARAM_STR);
				}else if($command->getColumn() == 'id'){
					$aCondition[] = 'AND id LIKE :id';
					$aBindParam[':id'] = array('%'.$command->getMember()->getId().'%', PDO::PARAM_STR);
				}
			}else if($command->getOption() == 'equal'){
				if($command->getColumn() == 'name'){
					$aCondition[] = 'AND name = :name';
					$aBindParam[':name'] = array($command->getMember()->getName(), PDO::PARAM_STR);
				}else if($command->getColumn() == 'id'){
					$aCondition[] = 'AND id = :id';
					$aBindParam[':id'] = array($command->getMember()->getId(), PDO::PARAM_STR);
				}
			}
			
			if(count($aCondition)>0){
				$query.=implode(' ', $aCondition);
			}
						
			$query.=(' limit '.$command->getOffset().','.$command->getLimit());
	
			
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
				$oMember = new Member();
				$oMember->setAge($row['age']);
				$oMember->setId($row['id']);
				$oMember->setName($row['name']);
				$oMember->setEmail($row['email']);
				$memberList[] = $oMember;
			}
			
		} catch (PDOException $e){
			echo 'selectMember['.$error[0].'] ['.$error[1] .'] ['.$error[2],']';
		}
		return $memberList;
	}
	
	
	public function recordNum(){ //전체 레코드 수
		$query = '
				SELECT
					count(*)
				FROM
					member	
				WHERE 1=1	
				';
				
		$stmt = $this->dbo->prepare($query);
		$stmt->execute();	
		$recordNum= $stmt->fetchColumn();

		if($stmt->execute()===FALSE){
			$error=$stmt->errorInfo();
			throw new PDOException();
		}
		return $recordNum;	
	}

}

?>