<?php
class Command{	
	private $option;
	private $column;
	private $keword;
	
	
	
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
	
}