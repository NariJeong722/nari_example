<?php
class ExampleDao{

	private static $oExampleDao;

	private $oDbo;

	public static function getInstance() {
		if(!isset(ExampleDao::$oExampleDao)) {
			ExampleDao::$oExampleDao = new ExampleDao();
		}
		return ExampleDao::$oExampleDao;
	}

	//
	public function setDbo($oDbo){
		$this->oDbo = $oDbo;
	}

	public function selectExample(Command $oCommand){
		$sQuery = '
			SELECT
				id
			FROM
				tExample
			WHERE
				id = :id
		';

		$stmt = $this->oDbo->prepare($sQuery);

		$stmt->bindValue(':id',$oCommand->getId(),PDO::PARAM_STR);

		if($stmt->execute() === FALSE){//rk
			$error = $stmt->errorInfo();
			throw new PDOException('selectExample ['.$error[0].']'.'['.$error[1].'] '.$error[2]);
		}

		$aExampleList = array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
			$aExampleList[] = $row;
		}

		return $aExampleList;

	}
}