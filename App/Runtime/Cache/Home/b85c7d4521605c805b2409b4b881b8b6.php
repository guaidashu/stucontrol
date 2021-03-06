<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="/stucontrol/Public/images/ooopic_1460463927.ico" media="screen" />
<title>
注册
</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/body.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/navigation.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/login.css" />
<script src="/stucontrol/Public/js/jquery-1.11.3.min.js"></script>
<script src="/stucontrol/Public/js/navigation.js"></script>
<script src="/stucontrol/Public/js/login.js"></script>
<script>
$(function(){
	var homework_login=new homework_login_function();
});
</script>
</head>
<body>
<div class="navigation"><!-- 导航栏 -->
<a href=<?php echo U('Home/Index/index');;?>>
<div class="navigation_remind cursor_pointer">
管理系统
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
<div class="container body_1">
<div class="homework_login_head">
注册帐户 
</div>
<div class="homework_line">
</div>
<div class="username">
<div class="username_label">
用户名
</div>
<div class="username_input">
<input type="text" name="name" id="username" />
</div>
</div>


<div class="password">
<div class="password_label">
密码
</div>
<div class="password_input">
<input type="password" name="password" id="password" />
</div>
</div>


<div class="password_check">
<div class="password_check_label">
确认密码
</div>
<div class="password_check_input">
<input type="password" name="password" id="password_check" />
</div>
</div>


<div class="number">
<div class="number_label">
学号
</div>
<div class="number_input">
<input type="text" name="number" id="number" />
</div>
</div>

<div class="gender">
<div class="gender_label">
性别
</div>
<div class="gender_input">
男
<input type="radio" name="gender" id="radio_1" />
<label for="radio_1" id="radio_1_label">
</label>
&nbsp;&nbsp;女
<input type="radio" name="gender" id="radio_2" />
<label for="radio_2" id="radio_2_label">
</label>
</div>
</div>

<div class="number"><!-- 验证码 -->
<div class="number_label">
验证码
</div>
<div class="number_input">
<input type="text" name="number" id="validate_check" />
</div>
</div>

<div class="number"><!-- 验证码图片 -->
<div class="number_label">
点击切换
</div>
<div class="number_input">
<img src="/stucontrol/Public/php/validate.php?r=<?php echo rand(); ?>" width="100px" height="30px" id="validate_img" class="cursor_pointer" />
</div>
</div>

<div class="class"><!-- 班级选择 -->
<div class="class_label">
班级
</div>
<div class="class_input">
<ul id="class" class="cursor_pointer">
<li style="border:1px solid #d6d9db;" class="class_li_li">
<div id="class_li">
<span id="class_content">请选择</span>&nbsp;<img src="/stucontrol/Public/images/nl_btn.png" width="8px" height="15px" class="class_img">
</div>
<ul class="class_all_class" id="class_all_class">
<li class="class_all_class_li" data-class="0">
软件一班
</li>
<li class="class_all_class_li" data-class="1">
软件二班
</li>
<li class="class_all_class_li" data-class="2">
软件三班
</li>
<li class="class_all_class_li" data-class="3">
软件四班
</li>
<li class="class_all_class_li" data-class="4">
软件五班
</li>
<li class="class_all_class_li" data-class="5">
软件六班
</li>
<li class="class_all_class_li" data-class="6">
网络一班
</li>
<li class="class_all_class_li" data-class="7">
网络二班
</li>
<li class="class_all_class_li" data-class="8">
网络三班
</li>
<li class="class_all_class_li" data-class="9">
物联一班
</li>
<li class="class_all_class_li" data-class="10">
物联二班
</li>
</ul>
</li>
</ul>
</div>
</div>

<div class="login_btn">
<div id="login_btn" class="cursor_pointer">
&nbsp;注册
</div>
</div>

<div class="content_remind">
有没有完善的信息，请完善，谢谢
</div>
</div>


<div class="envelop cursor_pointer"><!-- 遮罩层  注册声明 -->
</div>
<div class="popup">
<div style="text-align:center;font-size:18px;color:#333;height:40px;line-height:40px;width:100%;margin-top:30px;">
注册声明
</div>
<div style="word-break: break-all; word-wrap:break-word;min-height:30px;line-height:30px;color:#333;letter-spacing:2px;">
&nbsp;&nbsp; 由于本次网站涉及到宿舍查寝，注册时请务必填写自己的真实姓名及学号，否则最后责任人不认昵称，只认学号和姓名，后果自负。谢谢。
</div>
<div class="popup_btn cursor_pointer">
确认
</div>
</div>
</body>
</html>