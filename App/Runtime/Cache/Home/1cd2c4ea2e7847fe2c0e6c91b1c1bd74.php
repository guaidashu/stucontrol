<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/admin.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/body.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/navigation.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/carousel.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/date.css" />
<script src="/stucontrol/Public/js/jquery-1.11.3.min.js"></script>
<script src="/stucontrol/Public/js/jquery.scrollTo.js"></script>
<script src="/stucontrol/Public/js/body.js"></script>
<script src="/stucontrol/Public/js/admin.js"></script>
<script src="/stucontrol/Public/js/navigation.js"></script>
<!--
<script src="/stucontrol/Public/js/carousel.js"></script>
-->
<script src="/stucontrol/Public/js/date.js"></script>
<script>
$(function(){
	var admin=new admin_function(2);
});
</script>
<link rel="shortcut icon" type="image/x-icon" href="/stucontrol/Public/images/ooopic_1460463927.ico" media="screen" />
<title>
教师登录
</title>
</head>
<body>
<div class="navigation"><!-- 导航栏 -->
<a href=<?php echo U('Home/Index/admin');;?>>
<div class="navigation_remind cursor_pointer">
教师入口
</div>
</a>
<div class="navbar-toggle cursor_pointer">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</div>
<ul class="navigation_ul">
<a href=<?php echo U('Home/Index/index');;?>>
<li class="navigation_ul_li">
&nbsp;首页
</li>
</a>
<a href=<?php echo U('Home/Index/total_log');;?>>
<li class="navigation_ul_li">
&nbsp;查寝
</li>
</a>
<a href=<?php echo U('Home/Index/dorm');;?>>
<li class="navigation_ul_li">
&nbsp;宿舍报修
</li>
</a>
<a href=<?php echo U('Home/Index/teach_log');;?>>
<li class="navigation_ul_li">
&nbsp;通知发布
</li>
</a>
<a href=<?php echo U('Home/Index/guestbook');;?>>
<li class="navigation_ul_li">
&nbsp;留言
</li>
</a>
</ul>
</div>
<div class="spacing">
</div>
<div class="container body_1"><!-- 头部导航登录 -->
<div class="container body_background">
<div class="homework_head">
<div class="homework_head_form">
<!--
后期加上教师绑定
<a href="/stucontrol/Public/php/qq_login.php">
<span class="qq_log" style="margin-top:7px;float:right;margin-right:15px;">
</span>
</a>-->
<div class="homework_head_form_user">
<div id="username_remind">
帐号：
</div>
<input type="text" id="username" name="name" />
</div>

<div class="homework_head_form_password">
<div id="password_remind">
密码：
</div>
<input type="password" id="password" name="password" />
</div>

<div class="validate">
<div class="validate_remind">
验证码：
</div>
<div class="validate_input">
<input type="text" name="validate" id="validate" />
</div>
<div style="width:35%;height:35px;float:left;text-align:center;">
</div>
<div class="validate_img">
<img src="/stucontrol/Public/php/validate.php?r=<?php echo rand(); ?>" width="100px" height="30px" id="validate_img" class="cursor_pointer">
</div>
</div>

<div class="homework_head_form_btn">
<div class="homework_head_form_btn_position">
<input type="button" id="homework_head_form_btn" class="cursor_pointer" value=" 登录" />
</div>
</div>

<div class="find_login">
<div class="homework_head_form_find cursor_pointer">
<a href=<?php echo U('Home/Index/admin_teacher');;?>>
忘记密码
</a>
</div>
<div class="homework_head_form_login cursor_pointer">
<a href=<?php echo U('Home/Index/admin');;?>>
学生入口
</a>
</div>
</div>
</div>
</div>
</div>
</div>

</body>
</html>