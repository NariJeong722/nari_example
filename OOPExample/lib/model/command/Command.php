<?php

class Command{	
	private $option;
	private $column;
	private $keword;
	private $offset;
	private $limit;	
	private $member;
	
	public function setOption($option){
		$this->option = $option;
	}
	
	public function getOption(){
		return $this->option;
	}
	
	public function setColumn($column){
		$this->column = $column;
	}
	
	public function getColumn(){
		return $this->column;
	}
	
	public function setKeyword($keyword){
		$this->keword = $keyword;
	}
	
	public function getKeyword(){
		return $this->keword;
	}
	
	public function setOffset($offset){
		$this->offset = $offset;
	}
	
	public function  getOffset(){
		return $this->offset;
	}
	
	public function setLimit($limit){
		$this->limit=$limit;
	}
	
	public function getLimit(){
		return $this->limit;
	}
	
	public function setMember($member){
		$this->member=$member;
	}
	
	public function getMember(){
		return $this->member;
	}
	
}