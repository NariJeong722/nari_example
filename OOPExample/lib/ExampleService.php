<?php
require_once './model/command/Command.php';
require_once './model/Example.php';
require_once './dao/ExampleDao.php';

class ExampleService{

	private static $oExampleService;

	private $oExampleDao;

	public static function getInstance() {
		if(!isset(ExampleService::$oExampleService)) {
			ExampleService::$oExampleService = new ExampleService();
		}
		return ExampleService::$oExampleService;
	}

	public function setExampleDao(ExampleDao $oExampleDao){
		$this->oExampleDao = $oExampleDao;
	}

	public function findExample(Command $oCommand){
		$aExampleList = $this->oExampleDao->selectExample($oCommand);

		return $aExampleList;
	}

}