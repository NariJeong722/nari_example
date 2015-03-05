<?php
class Command{
	private $sId;

	public function setId($sId){
		$this->sId = $sId;
	}

	public function getId(){
		return $this->sId;
	}
}