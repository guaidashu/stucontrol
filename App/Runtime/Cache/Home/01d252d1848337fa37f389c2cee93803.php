<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/teach_log.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/body.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/navigation.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/carousel.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/date.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/login.css" />
<script src="/stucontrol/Public/js/jquery-1.11.3.min.js"></script>
<script src="/stucontrol/Public/js/teach_log.js"></script>
<script src="/stucontrol/Public/js/navigation.js"></script>
<script src="/stucontrol/Public/js/jquery-browser.js"></script>
<script src="/stucontrol/Public/js/jquery.qqFace.js"></script>
<script type="text/javascript">
$(function(){
	$('.emotion').qqFace({
		id : 'facebox', 
		assign:'saytext', 
		path:'/stucontrol/Public/arclist/'	//表情存放的路径
	});
});
//查看结果
</script>
<!--
<script src="/stucontrol/Public/js/carousel.js"></script>
自行包装的图片轮播器备用
-->
<script src="/stucontrol/Public/js/date.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="/stucontrol/Public/images/ooopic_1460463927.ico" media="screen" />
<title>
通知发布
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
<li class="navigation_ul_li">
&nbsp;宿舍报修
</li>
</a>
<a href=<?php echo U('Home/Index/teach_log');;?>>
<li class="navigation_ul_li navigation_active">
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
<div class="report container">
<div class="stu_welcome"><!-- 欢迎标语及其QQ联系和微信扫一扫 -->
通知管理
<div style="float:right;"><!-- QQ联系我 -->
<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1023767856&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1023767856:51" alt="点击这里给我发消息" title="点击这里给我发消息"/>
</a>
</div>
<div class="stu_outline">
</div>
</div>
<div class="report_navigation"><!-- 内置导航栏 -->
<ul class="report_navigation_ul">
<li class="report_navigation_li report_navigation_li_active" id="report_navigation_li_1" data-id="0">
&nbsp;发布
<label for="report_navigation_li_1" class="report_navigation_li_label_1">
</label>
</li>
<li class="report_navigation_li report_navigation_li_negative" id="report_navigation_li_2" data-id="1">
&nbsp;删除
<label for="report_navigation_li_2" class="report_navigation_li_label_2">
</label>
</li>
<li class="report_navigation_li report_navigation_li_negative" id="report_navigation_li_3" data-id="2">
&nbsp;班委设置
<label for="report_navigation_li_3" class="report_navigation_li_label_3">
</label>
</li>
</ul>
</div>
<div class="report_form">
<div class="report_textarea"><!-- 文本输入 -->
<div class="report_textarea_remind">
内容输入：
</div>
<textarea class="report_textarea_input input" id="saytext" placeholder="随便发点什么把...">
</textarea>
</div>

<div class="report_other_first">
<div class="report_title"><!-- 标题输入 -->
<div class="report_title_remind">
标题：
</div>
<input type="text" name="title" class="report_title_input" id="report_title_input" />
</div>

<div class="report_title"><!-- 类型选择 -->
<div class="report_title_remind">
类型
</div>
<ul class="report_kind">
<li class="report_kind_container">
<div class="report_kind_div">
<span id="report_kind">
请选择
</span>
<img src="/stucontrol/Public/images/nl_btn.png" width="8px" height="15px" class="kind_img">
</div>
<ul class="report_kind_ul">
<li class="report_kind_li" data-id="1">
活动
</li>
<li class="report_kind_li" data-id="2">
讲座
</li>
</ul>
</li>
</ul>
</div>
</div>

<div class="qq_face_div"><!-- 表情 -->
<p>
<span class="emotion"></span>
</p>
</div>

<div class="report_btn cursor_pointer">
&nbsp;发布
</div>


</div>

<div class="report_delete"><!-- 删除 -->
<div class="delete_content">
<div class="index_form">
<?php echo ($content_1); ?>
</div>
</div>
</div>

<div class="report_control"><!-- 管理员设置 -->

<div class="class">
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


<div class="delete_content control_content">

</div>
</div>

</div>
<div class="stu_exit"><!-- 退出登录 -->
退出登录
</div>
<div class="total_bottom">
<span>技术支持</span>
<a href="http://www.wyysdsa.com/">奕弈</a>
</div>
</body>
</html>