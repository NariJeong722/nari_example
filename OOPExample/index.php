<?php
require_once './lib/ExampleService.php';

$oExampleService = ExampleService::getInstance();
$oExampleDao = ExampleDao::getInstance();

$oExampleService->setExampleDao($oExampleDao);

$oCommand = new Command();
$oCommand->setId('id');

$aExampleList = $oExampleService->findExample($oCommand);

print_r($aExampleList);