<?php
require_once './util/template.php';

$oTpl = new Template('./tpl/');

$oTpl->set('test','�����ٶ�');

echo $oTpl->fetch('templateExample.tpl.php');