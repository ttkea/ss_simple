<?php
if(!defined('CORE'))exit("error!"); 







//角色页面权限
function checkbox_area_action($areaid,$row_action){
	$action=explode(',',$row_action);
	$i=1;
	foreach($areaid as $key=>$val){
		if($key!="0"){
		if(in_array($key,$action)){
		$cbox .="<span style=\"float:left;width:150px\"><input name=\"areaid[]\" type=\"checkbox\" value=\"$key\" checked=\"checked\" />$val</span>\n";
		}else{
		$cbox .= "<span style=\"float:left;width:150px\"><input name=\"areaid[]\" type=\"checkbox\" value=\"$key\" />$val</span>\n";
		}
		}
		if($i==8){$cbox .="";}
		$i++;
	}
	return $cbox;
}


//验证登录
if($do=="loginok"){
	$name=$_POST[user_name];
	$pwd=md5($_POST[pass]);
	
	$validate_arr=array($name,$pwd);
	Ifvalidate($validate_arr);
	
	$sql = "SELECT id,user_name,invite_num from user WHERE user_name = '$name' AND pass = '$pwd' limit 1 ";
	//echo $sql;
	$db->query($sql);
	if ($record = $db->fetchRow()){	//登录成功
		$_SESSION['isLogin'] 	= true;
		$_SESSION['userid']		= $record['id'];
		$_SESSION['user_name']	= $record['user_name'];
		$_SESSION['invite_num']	    = $record['invite_num'];
		exit($lang_cn['rabc_login_ok']);
	}
	else
		exit($lang_cn['rabc_login_error']);
	exit;
}


//登录	
if($do=="login"){
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('web_name',$web_name);
	$smt->assign('title',"登录");
	$smt->display('user_login.htm');
	exit;
}

//注册
if($do=="reg"){
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('web_name',$web_name);
	$smt->assign('title',"登录");
	$smt->display('user_reg.htm');
	exit;
}


//退出	
if($do=="logout"){
	$_SESSION = array();
	session_destroy();
	exit($lang_cn['rabc_logout']);
}

//列表	
if($do==""){
	If_rabc($action,$do); //检测权限
	is_admin($action,$do); 
	if($_POST['kewords']){$search .= " and user_name like '%".strip_tags($_POST[kewords])."%'";}			
	if($_POST['time_start']!="" && $_POST['time_over']!=""){
		$search .= " and `reg_date` >  '".strtotime($_POST[time_start]." 00:00:00")."' AND  `reg_date` <  '".strtotime($_POST[time_over] ." 23:59:59")."'";
	}
	
	//设置分页
	if($_POST[numPerPage]==""){$numPerPage="10";}else{$numPerPage=$_POST[numPerPage];}
	if($_GET[pageNum]==""||$_GET[pageNum]=="0" ){$pageNum="0";}else{$pageNum=($_GET[pageNum]-1)*$numPerPage;}
	$num=mysql_query("SELECT * FROM user where 1=1 $search");//当前频道条数
	$total=mysql_num_rows($num);//总条数	
	$page=new page(array('total'=>$total,'perpage'=>$numPerPage));

	//查询
	$sql="SELECT * FROM user  where 1=1 $search order by id desc LIMIT $pageNum,$numPerPage";
	$db->query($sql);
	$list=$db->fetchAll();	


	//模版
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('list',$list);
	$smt->assign('numPerPage',$_POST[numPerPage]); //显示条数
	$smt->assign('pageNum',$_GET[pageNum]); //当前页数
	$smt->assign('total',$total);  //总条数
	$smt->assign ('page',$page->show());
	$smt->assign('title',"用户管理");
	$smt->display('user_list.htm');
	exit;
	
}


//新建	
if($do=="new"){	
	If_rabc($action,$do); //检测权限
	
	//角色数组
	$sql="SELECT id FROM `user`";
	$db->query($sql);
	$list=$db->fetchAll();
	
	//格式化角色数据
	foreach($list as $key=>$val){
		$role_cn[$list[$key][id]]=$list[$key][title];		
	}
	$smt = new smarty();smarty_cfg($smt);
	$smt->assign('select_role_cn',select($role_cn,"invite_num","","选择角色","required"));
	$smt->assign('checkbox_area_action',checkbox_area_action($areaid));
	$smt->assign('title',"新建用户");
	$smt->display('user_new.htm');
	exit;
}


//写入
if($do=="add"){

	//If_rabc($action,$do); //检测权限
	$reg_date=date("Y-m-d H:i:s", time());
	$pass=md5($_POST[pass]);
	//$id=md5($_POST[id]);
	$areaid=implode(',',$_POST[areaid]);
	//echo $pass;
	//查询
	$sql="SELECT * FROM `user` where user_name ='$_POST[user_name]' LIMIT 1";
	$db->query($sql);
	if($db->fetchRow()){echo  "<script>alert(\"用户名已存在!\");window.location=\"index.php?action=user&do=reg\";</script>";exit();}
	$sql="INSERT INTO  user  (user_name,email,pass,passwd,reg_date)VALUES('$_POST[user_name]','$_POST[email]','$pass','$_POST[passwd]','reg_date')";	
	if($db->query($sql)){echo success($msg,"?action=user");}else{echo error($msg);}
	exit;
}


//编辑	
if($do=="edit"){	
	If_rabc($action,$do); //检测权限
	$smt = new smarty();smarty_cfg($smt);
    
	//查询
	$sql=" SELECT * FROM user where id='{$id}' LIMIT 1";
	
	$db->query($sql);
	$row=$db->fetchRow();
	//模版
	$smt->assign('row',$row);
	$smt->assign('title',"编辑用户");
	$smt->display('user_edit.htm');
	exit;
}

//普通用户更新
if($do=="updatapt"){
	If_rabc($action,$do); //检测权限	(name,email,pass,passwd,t,u,d,transfer_enable,port,enable,invite_num)
	is_admin($action,$do); 
	if(!$_POST[id]){echo error($msg);exit;}
	$pass=md5($_POST[pass]);
	$reg_date= time();
	$sql="UPDATE user SET 
	`passwd` = '$_POST[passwd]' WHERE `id` ='$_POST[id]' LIMIT 1 ;";
	if($db->query($sql)){echo success($msg,"?index.htm");}else{echo error($msg);}	
	exit;
}

//管理员更新
if($do=="updata"){
	If_rabc($action,$do); //检测权限	(name,email,pass,passwd,t,u,d,transfer_enable,port,enable,invite_num)
	is_admin($action,$do); 
	if(!$_POST[id]){echo error($msg);exit;}
	 $pass=md5($_POST[pass]);  
	$reg_date= time();
	$sql="UPDATE user SET 
	`user_name` = '$_POST[user_name]',
	`email` = '$_POST[email]',
	`passwd` = '$_POST[passwd]',
	`u` = '$_POST[u]',
	`d` = '$_POST[d]',
	`transfer_enable` = '$_POST[transfer_enable]',
	`port` = '$_POST[port]',
	`enable` = '$_POST[enable]',
	`invite_num` = '$_POST[invite_num]',
	`reg_date` = '$reg_date' WHERE `id` ='$_POST[id]' LIMIT 1 ;";
	
	if($db->query($sql)){echo success($msg,"?action=user");}else{echo error($msg);}	
	exit;
}


//删除
if($do=="del"){
	If_rabc($action,$do); //检测权限
	is_admin($action,$do); 
	$sql="delete from `user` where `id`=$id limit 1";
	if($db->query($sql)){echo success($msg,"?action=user");}else{echo error($msg);}	
	exit;
}


//修改密码	
if($do=="editpass"){	
	If_rabc($action,$do); //检测权限
	$smt = new smarty();smarty_cfg($smt);
	//查询
	$sql=" SELECT * FROM user where id='{$id}' LIMIT 1";
	
	$db->query($sql);
	$row=$db->fetchRow();
	//模版
	$smt->assign('row',$row);
	$smt->assign('title',"修改密码");
	$smt->display('user_edit_pass.htm');
	exit;
}


//更新密码
if($do=="updatapass"){
	If_rabc($action,$do); //检测权限
	$reg_date=time();
	$id=$_SESSION['userid'];
    if($_POST[pass]){
		$pass=md5($_POST[pass]);
	}
	$sql="UPDATE `user_name` SET `pass`='{$pass}',`reg_date` = '$reg_date' WHERE `user_name`.`id` ={$id} LIMIT 1 ;";	
	if($db->query($sql)){echo success($msg,"index.php");}else{echo error($msg);}
	exit;
}




?>

