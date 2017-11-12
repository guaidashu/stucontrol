<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/dorm.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/body.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/navigation.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/carousel.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/date.css" />
<script src="/stucontrol/Public/js/jquery-1.11.3.min.js"></script>
<script src="/stucontrol/Public/js/dorm.js"></script>
<script src="/stucontrol/Public/js/navigation.js"></script>
<!--
<script src="/stucontrol/Public/js/carousel.js"></script>
自行包装的图片轮播器备用
-->
<script src="/stucontrol/Public/js/date.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="/stucontrol/Public/images/ooopic_1460463927.ico" media="screen" />
<title>
宿管报修
</title>
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
<li class="navigation_ul_li navigation_active">
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
<div class="stu_control container">
<div class="stu_welcome"><!-- 欢迎标语及其QQ联系和微信扫一扫 -->
宿舍报修
<div style="float:right;"><!-- QQ联系我 -->
<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1023767856&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1023767856:51" alt="点击这里给我发消息" title="点击这里给我发消息"/>
</a>
</div>
<div class="stu_outline">
</div>
</div>
<div class="stu_dorm">
<div class="report_form">
<div class="report_textarea"><!-- 文本输入 -->
<div class="report_textarea_remind">
内容输入：
</div>
<textarea class="report_textarea_input input" id="saytext" placeholder="请填写报修详情...">
</textarea>
</div>

<div class="report_other_first">
<div class="report_title"><!-- 标题输入 -->
<div class="report_title_remind">
寝室：
</div>
<input type="text" name="title" class="report_title_input" id="report_title_input" />
</div>

<div class="report_title"><!-- 作者输入 -->
<div class="report_title_remind">
联系电话：
</div>
<input type="text" name="author" class="report_title_input" id="report_author_input" />
</div>
</div>

<div class="report_other_first" style="margin-top:0px;">
<div class="report_title"><!-- 标题输入 -->
<div class="report_title_remind">
验证码：
</div>
<input type="text" name="title" class="report_title_input" id="report_validate" />
</div>

<div class="report_title"><!-- 作者输入 -->
<div class="report_title_remind">
点击换一张：
</div>
<img src="/stucontrol/Public/php/validate.php?r=<?php echo rand(); ?>" width="100px" height="30px" id="validate_img" class="cursor_pointer" />
</div>
</div>

<div class="report_btn cursor_pointer">
&nbsp;发布
</div>


</div>
</div>
<div style="width:100%;height:50px;">
</div>
</div>
<div class="total_bottom">
<span>技术支持</span>
<a href="http://www.wyysdsa.com/">奕弈</a>
</div>
</body>
</html>