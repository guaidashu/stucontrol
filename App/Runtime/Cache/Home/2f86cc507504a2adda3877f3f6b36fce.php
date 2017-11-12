<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/guestbook.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/body.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/navigation.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/carousel.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/date.css" />
<script src="/stucontrol/Public/js/jquery-1.11.3.min.js"></script>
<script src="/stucontrol/Public/js/jquery.scrollTo.js"></script>
<script src="/stucontrol/Public/js/guestbook.js"></script>
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
留言
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
<li class="navigation_ul_li">
&nbsp;通知发布
</li>
</a>
<a href=<?php echo U('Home/Index/guestbook');;?>>
<li class="navigation_ul_li navigation_active">
&nbsp;留言
</li>
</a>
</ul>
</div>
<div class="spacing" id="go_top">
</div>
<div class="stu_control container">
<div class="stu_welcome"><!-- 欢迎标语及其QQ联系和微信扫一扫 -->
留言(<?php echo ($count); ?>)
<div style="float:right;"><!-- QQ联系我 -->
<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1023767856&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1023767856:51" alt="点击这里给我发消息" title="点击这里给我发消息"/>
</a>
</div>
<div class="stu_outline">
</div>
</div>
<div class="stu_guestbook"><!-- 留言板处 -->
<div class="stu_guestbook_body">
<div class="stu_guestbook_log">
<span class="stu_guestbook_log_classname">
<?php echo ($classname); ?>
</span>
<?php echo ($name); ?>
</div>
<div class="stu_guestbook_textarea">
<textarea id="saytext" class="stu_guestbook_textarea_input" placeholder="随便说点什么把......">
</textarea>
<div class="stu_guestbook_body_bottom">
<div class="qq_face_div"><!-- 表情 -->
<p>
<span class="emotion"></span>
</p>
</div>
<div class="stu_guestbook_btn cursor_pointer">
发布
</div>
</div>
</div>
<div class="stu_guestbook_content"><!-- 留言显示区 -->
<?php echo ($content); ?>
</div>
</div>
</div>
</div>
<div class="guestbook_bottom" data-id="0">
点击加载更多
</div>
<div class="go_top cursor_pointer" title="返回顶部"><!-- 快速到顶部 -->
</div>
<div class="total_bottom">
<span>技术支持</span>
<a href="http://www.wyysdsa.com/">奕弈</a>
</div>
</body>
</html>