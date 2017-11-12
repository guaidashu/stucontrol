<meta charset="urf-8">
<?php
include 'include/mysql_connect_set.php';
require_once 'function.php';
require_once 'Connect2.1/qqConnectAPI.php';
$oauth=new Oauth();
$accesstoken=$oauth->qq_callback();
$openid=$oauth->get_openid();
$_SESSION['qq_accesstoken']=$accesstoken;
$_SESSION['qq_openid']=$openid;
$db->dbconnect();
$db->dbresult("select*from stu_user");
$flag=false;
while($db->dbrow($db->result)){
	if($db->row['qq_id']==$_SESSION['qq_openid']){
		$_SESSION['user_student']=$db->row['username'];
		$_SESSION['user_student_control']=$db->row['control'];
		$_SESSION['user_student_classnumber']=$db->row['classnumber'];
		$_SESSION['user_student_classname']=$db->row['classname'];
		$flag=true;
		echo '<meta charset="utf-8" /><script>location.href="/stucontrol/Home/Index/index.shtml";</script>';
		break;
		exit;
	}
}
if(!$flag){
	echo '<meta charset="utf-8" /><script>alert("您是第一次登录，请先进行QQ号绑定");location.href="/stucontrol/Home/Index/binding.shtml";</script>';
	exit;
}
/*
$qc=new QC($_SESSION['qq_accesstoken'],$_SESSION['qq_openid']);
$userinfo=$qc->get_user_info();
header("Content-type:text/html;character=utf-8");
debug($userinfo);
*/
?>