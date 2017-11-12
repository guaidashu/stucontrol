<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/x-icon" href="/stucontrol/Public/images/ooopic_1460463927.ico" media="screen" />
<title>
QQ帐号绑定
</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/body.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/navigation.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/login.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/binding.css">
<script src="/stucontrol/Public/js/jquery-1.11.3.min.js"></script>
<script src="/stucontrol/Public/js/navigation.js"></script>
<script src="/stucontrol/Public/js/binding.js"></script>
<script>
$(function(){
	var binding=new binding_function();
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
<div class="username" style="margin-top:100px;">
<div class="username_label">
学号
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

<div class="login_btn">
<div id="login_btn" class="cursor_pointer">
&nbsp;确定
</div>
</div>
<a href="/stucontrol/Home/Index/login.shtml">
<div class="login_bottom cursor_pointer">
注册
</div>
</a>
<div class="content_remind">
有没有完善的信息，请完善，谢谢
</div>
</div>
</div>




</body>
</html>