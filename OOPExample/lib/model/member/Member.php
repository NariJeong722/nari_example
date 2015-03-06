<?php
class Member{
	private $mId;
	private $mName;
	private $mAge;
	private $mEmail;
	
	public function setId($mId){
		$this->mId = $mId;		
	}
	
	public function getId(){
		return $this->mId;
	}
	
	public function setName($mName){
		$this->mName = $mName;
	}
	
	public function getName(){
		return $this->mName;
	}
	
	public function setAge($mAge){
		$this->mAge = $mAge;
	}
	
	public function getAge(){
		$this->mAge;
	}
	
	public function setEmail($mEmail){
		$this->mEmail = $mEmail;
	}
	
	public function getEmail(){
		return $this->mEmail;
	}
}
?>
