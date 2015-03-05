<?php
require_once './lib/ExampleService.php';

$oExampleService = ExampleService::getInstance();

$oCommand = new Command();
$oCommand->setId('id');

$aExampleList = $oExampleService->findExample($oCommand);

print_r($aExampleList);