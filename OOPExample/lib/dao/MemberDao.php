<?php
class MemberDao {
	private static $memberDao;
	private $mDbo;
	public static function getInstance() {
		if (! isset ( MemberDao::$memberDao )) {
			MemberDao::$memberDao = new MemberDao ();
		}
		return MemberDao::$memberDao;
	}
	public function setDbo($mDbo) {
		$this->mDbo = $mDbo;
		$mDbo->query ( "SET NAMES utf8" );
	}
	public function selectMember(Member $member, $whereOption = 'EQUAL') {
		try {
			$query = '
				SELECT
					name, age
				FROM
					member
				WHERE
					1=1
			';
			
			$aCondition = array ();
			$aBindParam = array ();
			
			/* if ($whereOption == 'LIKE') {
				$aCondition [] = 'AND id LIKE :id';
				$aBindParam [':id'] = array ('%' . $member->getId () . '%',PDO::PARAM_STR);
			} else if ($whereOption == 'EQUAL') {
				$aCondition [] = 'AND id = :id';
				$aBindParam [':id'] = array ($member->getId (),	PDO::PARAM_STR );
			} */
			
			if (count ( $aCondition ) > 0) {
				$query .= implode ( ' ', $aCondition );
			}
			$stmt = $this->mDbo->prepare ( $query );
			
			foreach ( $aBindParam as $sKey => $aParam ) {
				$stmt->bindParam ( $sKey, $aParam [0], $aParam [1] );
			}
			
			if ($stmt->execute () === FALSE) {
				$error = $stmt->errorInfo ();
				throw new PDOException ();
			}
			
			$memberList = array ();
			while ( $row = $stmt->fetch ( PDO::FETCH_ASSOC ) ) {
				$memberList [] = $row;
			}
		} catch (Exception $e ) {
			echo 'selectMember [' . $error [0] . '] ' . ' [' . $error [1] . '] ' . ' [' . $error [2] . ']';
		}
		
		return $memberList;
	}
	
	public function deleteMember(Member $member) {
		try {
			$query = '
			DELETE
			FROM
				member
			WHERE
				id=:id	
			';
			
			$stmt = $this->mDbo->prepare ( $query );
			$stmt->bindParam ( ':id', $member->getId (), PDO::PARAM_STR );
			
			$checkDelete = $stmt->execute ();
			if ($checkDelete === TRUE) {
				echo "MemberDao : {$member->getId()} : 삭제성공<br>";
			} else {
				$error = $stmt->errorInfo ();
				throw new PDOException ();
			}
		} catch (Exception $e) {
			echo 'deleteMember [' . $error [0] . '] ' . ' [' . $error [1] . '] ' . ' [' . $error [2] . ']';
		}
		
		return $checkDelete;
	}
	
	public function insertMember(Member $member) {
		try {			
			$query = '
			INSERT INTO 
				member
			VALUES(:id,:name,:age,:email)		
			';
						
			$stmt = $this->mDbo->prepare ( $query );
			$stmt->bindParam ( ':id', $member->getId (), PDO::PARAM_STR );
			$stmt->bindParam ( ':name', $member->getName (), PDO::PARAM_STR );
			$stmt->bindParam ( ':age',$member->getAge (), PDO::PARAM_INT);
			$stmt->bindParam ( ':email', $member->getEmail (), PDO::PARAM_STR );
			
			$checkInsert = $stmt->execute ();
			
			if ($checkInsert === TRUE) {
				echo "insertMember 성공<br>";
			} else {
				$error = $stmt->errorInfo ();
				throw new PDOException ();
			}
		} catch (Exception $e ) {
			echo 'insertMember [' . $error [0] . '] ' . ' [' . $error [1] . '] ' . ' [' . $error [2] . ']';
		}
	}
}

?>
