<?php
if(!defined('CORE'))exit("error!"); 

//首页	
if($do==""){
	if(!isLogin()){exit($lang_cn['rabc_is_login']);} //判断是否登录
	$smt = new smarty();smarty_cfg($smt);
	$smt->display('index.htm');
	exit;
}


?>
