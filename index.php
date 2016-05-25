﻿<?php
//====================================================
//		FileName: index.php
//		Summary:  程序入口文件
//====================================================
header("Content-type: text/html; charset=utf-8");
session_start();
error_reporting(0);

//配置数据库
$cfg["dbhost"]="localhost";  				//数据库主机名
$cfg["dbuser"]="root";		  				//数据库用户名
$cfg["dbpass"]="123456"; 					//数据库密码
$cfg["dbname"]="ss";  				//数据库名称
$cfg["website"]="http://192.168.0.222";		//网站域名
$cfg["webtitle"]="SS加速器管理系统";      //系统名称
$cfg["version"]="V1.0";                   //版本

//引入类库及公共方法
@define("CORE",dirname(__FILE__)."/"); 	    //根目录
require_once("lib/mysql.class.php");        //数据类
require_once("lib/smarty.class.php");       //模版类
require_once('lib/json.class.php');		    //JSON类
require_once("lib/func.class.php");         //核心类
require_once("lib/rabc.class.php");         //查询类
require_once("lib/image.class.php");        //图片类
require_once("lib/page.class.php");         //分页类
require_once("lib/cfg.class.php");          //分页类


//操作值
$action=empty($_GET['action'])?'':trim($_GET['action']); 	 //get action值
$do=empty($_GET['do'])?'':trim($_GET['do']);			 	 //get do值
$id=empty($_GET['id'])?'':intval($_GET['id']);				 //get id值
$cuserid=empty($_GET['userid'])?'':intval($_GET['userid']);  //get userid值


//读取用户数组
$sql_user="SELECT id,user_name FROM `user`";
$db->query($sql_user);
$user_arr=$db->fetchAll();
foreach($user_arr as $key=>$val){
	$user_list[$user_arr[$key][id]]=$user_arr[$key][username];	 //用户数组
}

//执行页面
switch ($action){
	case "":
		
	  include('action/action.index.php');     //首页`
	  break;
	  
	case "address":
	  include('action/action.address.php');     //链接
	  break;
	  
	case "user":
	  include('action/action.user.php');      //用户
	  break;
	default:
	  echo "404!";
	  
}

?>