<?php
require_once './lib/ExampleService.php';
require_once './lib/MemberService.php';

$oExampleService = ExampleService::getInstance();

$oExampleDao = ExampleDao::getInstance();

$oExampleService->setExampleDao($oExampleDao);

$oCommand = new Command();
$oCommand->setId('id');

$aExampleList = $oExampleService->findExample($oCommand);

print_r($aExampleList);

//-----------------------------------------------------------------------------------
$mMemberService = MemberService::getInstance();
$mMemberDao = MemberDao::getInstance();
$mMemberService->setMemberDao($mMemberDao);

$mMember = new Member();
$mMember->setId('id');
$servername = "localhost";
$username = "scott";
$password = "tiger";
$conn = new PDO ( "mysql:host=$servername;dbname=mydb", $username, $password );
$mMemberDao->setDbo($conn);


