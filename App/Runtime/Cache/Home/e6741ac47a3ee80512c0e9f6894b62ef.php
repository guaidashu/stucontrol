<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/index.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/body.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/navigation.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/carousel.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/date.css" />
<script src="/stucontrol/Public/js/jquery-1.11.3.min.js"></script>
<script src="/stucontrol/Public/js/total.js"></script>
<script src="/stucontrol/Public/js/navigation.js"></script>
<!--
<script src="/stucontrol/Public/js/carousel.js"></script>
自行包装的图片轮播器备用
-->
<script src="/stucontrol/Public/js/date.js"></script>
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
<a href=<?php echo U('Home/Index/total');;?>>
<li class="navigation_ul_li navigation_active">
&nbsp;查寝
</li>
</a>
<a href=<?php echo U('Home/Index/dorm');;?>>
<li class="navigation_ul_li">
&nbsp;宿舍报修
</li>
</a>
<li class="navigation_ul_li">
&nbsp;文学
</li>
<li class="navigation_ul_li">
&nbsp;留言
</li>
</ul>
</div>
<div class="spacing">
</div>
<div class="stu_control container">
<div class="stu_welcome"><!-- 欢迎标语及其QQ联系和微信扫一扫 -->
寝室人数到位统计
<div style="float:right;margin-right:15px;"><!-- QQ联系我 -->
<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1023767856&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1023767856:51" alt="点击这里给我发消息" title="点击这里给我发消息"/>
</a>
</div>
<div class="stu_outline">
</div>
</div>
<div class="stu_control_left col-sm-7">

</div>
<div class="stu_control_right col-sm-3">

</div>
</div>
</body>
</html>