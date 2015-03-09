<?php
require_once './util/template.php';

$oTpl = new Template('./tpl/');

$oTpl->set('test','가나다라');

echo $oTpl->fetch('templateExample.tpl.php');