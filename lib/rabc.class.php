<?php

//����û�ҳ��Ȩ��
function If_rabc($action,$do){
	global $lang_cn;
	global $db;
	//����û���¼
	if(!isLogin()){exit($lang_cn['rabc_is_login']);}
	//�������
	$c_action=$action.$do;
}


//����û�ҳ��Ȩ��
function is_admin($action,$do){
	global $lang_cn;
	global $db;
	//����û���¼
	if(!isLogin()){exit($lang_cn['rabc_is_login']);}
	//�������
	$c_action=$action.$do;
	//��ȡ��ǰ�û�
	$uid=$_SESSION['uid'];
	$invite_num=$_SESSION['invite_num'];
	//echo $invite_num;
	
	//�жϵ�ǰҳ���Ƿ���Ȩ��
	if($invite_num==2){
		exit($lang_cn['rabc_error']);
	}
	
	
}

//����û��Ƿ��¼
function isLogin(){
	if(!empty($_SESSION['isLogin']))
		return 1;	
	else
		return 0;  
}

?>