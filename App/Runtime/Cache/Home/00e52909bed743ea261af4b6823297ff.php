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
<link rel="shortcut icon" type="image/x-icon" href="/stucontrol/Public/images/ooopic_1460463927.ico" media="screen" />
<script src="/stucontrol/Public/js/jquery-1.11.3.min.js"></script>
<script src="/stucontrol/Public/js/jquery.scrollTo.js"></script>
<script src="/stucontrol/Public/js/body.js"></script>
<script src="/stucontrol/Public/js/index.js"></script>
<script src="/stucontrol/Public/js/navigation.js"></script>
<script src="/stucontrol/Public/js/carousel.js"></script>
<script src="/stucontrol/Public/js/date.js"></script>
<title>
管理系统
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
<li class="navigation_ul_li navigation_active">
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
<!-- 导航栏结束 -->
<div class="spacing" id="go_top">
</div>
<div class="stu_control container">
<div class="stu_welcome"><!-- 欢迎标语及其QQ联系和微信扫一扫 -->
欢迎
<div style="float:right;"><!-- QQ联系我 -->
<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1023767856&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1023767856:51" alt="点击这里给我发消息" title="点击这里给我发消息"/>
</a>
</div>
<div class="stu_outline">
</div>
</div>
<div class="stu_control_left col-sm-7"><!-- 左侧 -->
<div class="stu_head"><!-- 头部总索引栏 -->
<div class="carousel"><!-- 轮播器 -->
<div class="carousel_img">
<img src="/stucontrol/Public/images/5.png" class="carousel_img_auto" />
<img src="/stucontrol/Public/images/1.jpg" class="carousel_img_auto" />
<img src="/stucontrol/Public/images/2.jpg" class="carousel_img_auto" />
<img src="/stucontrol/Public/images/3.jpg" class="carousel_img_auto" />
<img src="/stucontrol/Public/images/4.jpg" class="carousel_img_auto" />
<img src="/stucontrol/Public/images/5.png" class="carousel_img_auto" />
<img src="/stucontrol/Public/images/1.jpg" class="carousel_img_auto" />
</div>
<!--  
<div class="btn_pre"> 向上切换按钮
<img src="images/prev.png" width="40px" height="40px" />
</div>
<div class="btn_next">向下切换按钮
<img src="images/next.png" width="40px" height="40px" />
</div>
-->
<ul class="carousel_ul" id="carousel_radius">
<li class="carousel_active" id="data-click" data-radius="1" >
1
</li>
<li id="data-click" data-radius="2">
2
</li>
<li id="data-click" data-radius="3">
3
</li>
<li id="data-click" data-radius="4">
4
</li>
<li id="data-click" data-radius="5">
5
</li>
</ul>
<div class="carousel_bottom">
</div>
<p class="carousel_p">
我喜欢的地方
</p>
</div>
<div class="stu_content"><!-- 文章及其内容部分 -->
<div class="stu_content_head"><!-- 提示 -->
<div class="stu_content_head_remind">
最新通知
</div>
<?php echo ($log); ?>
</div>
<?php echo ($content); ?>
</div>
</div>
</div>
<div class="stu_control_right col-sm-3"><!-- 右侧 -->
<div id="Demo"><!-- 日历 -->
<div id="CalendarMain">
  <div id="title"> 
  <a class="selectBtn month" href="javascript:" onClick="CalendarHandler.CalculateLastMonthDays();"><!-- 可分割处 -->
  &lt;
  </a>
  <a class="selectBtn selectYear" href="javascript:" onClick="CalendarHandler.CreateSelectYear(CalendarHandler.showYearStart);">
  2014年
  </a>
  <a class="selectBtn selectMonth" onClick="CalendarHandler.CreateSelectMonth()">
  6月
  </a> 
  <a class="selectBtn nextMonth" href="javascript:" onClick="CalendarHandler.CalculateNextMonthDays();">
  &gt;
  </a>
  <a class="selectBtn currentDay" href="javascript:" onClick="CalendarHandler.CreateCurrentCalendar(0,0,0);">
  今天
  </a>
  </div>
  <div id="context">
    <div class="week">
      <h3> 一 </h3>
      <h3> 二 </h3>
      <h3> 三 </h3>
      <h3> 四 </h3>
      <h3> 五 </h3>
      <h3> 六 </h3>
      <h3> 日 </h3>
    </div>
    <div id="center">
      <div id="centerMain">
        <div id="selectYearDiv">
		</div>
        <div id="centerCalendarMain">
          <div id="Container">
		  </div>
        </div>
        <div id="selectMonthDiv">
		</div>
      </div>
    </div>
    <div id="foots">
	<a id="footNow">19:14:34
	</a>
	</div>
  </div>
</div>
</div>
<div class="stu_suggest"><!-- 右侧推荐 -->
<div class="stu_suggest_head">
<div class="stu_suggest_navigation stu_suggest_navigation_active stu_suggest_navigation_1" data-suggest="0">
活动
</div>
<div class="stu_suggest_navigation stu_suggest_navigation_2" data-suggest="1">
讲座
</div>
<div class="stu_suggest_navigation stu_suggest_navigation_3" data-suggest="2">
报修
</div>
</div>
<div class="stu_suggest_body_action">
<ul class="stu_suggest_ul">
<?php echo ($suggest_content); ?>
</ul>
</div>
<div class="stu_suggest_body_lecture">
<ul class="stu_suggest_ul">
<?php echo ($jiangzuo); ?>
</ul>
</div>
<div class="stu_suggest_body_question">
<ul class="stu_suggest_ul">
<?php echo ($dorm); ?>
</ul>
</div>
</div>
<div class="stu_friendsrc"><!-- 友情链接 -->
<div class="stu_friendsrc_head">
<span></span>
<span>友情链接</span>
</div>
<div class="stu_friendsrc_body">
<a href="http://www.erzone.cn/" style="background-color:#F08080;margin-left:20px;" target="<?php echo md5(rand()*1500); ?>">
My Blog
</a>
<a href="http://www.w3school.com.cn/index.html" target="<?php echo md5(rand()*1500); ?>" style="background-color:#FF4500;">
W3school
</a>
<a href="http://www.imooc.com/" target="<?php echo md5(rand()*1500); ?>" style="background-color:#D2691E;">
慕课网
</a>
<a href="https://suse.xsdhy.com/jwxt" target="<?php echo md5(rand()*1500); ?>" style="background-color:#FF1493;margin-left:20px;">
绩点查询
</a>
<a href="https://suse.xsdhy.com/tsg" target="<?php echo md5(rand()*1500); ?>" style="background-color:#FF69B4;">
图书借阅
</a>
<a href="https://www.xsdhy.com" target="<?php echo md5(rand()*1500); ?>" style="background-color:#D02090;">
消逝的红叶
</a>
</div>
</div>
<div class="stu_weixin"><!-- 微信扫一扫 -->
<div class="stu_weixin_head">
<span>
</span>
<span>
黄岭春晓
</span>
</div>
<div class="stu_weixin_body">
</div>
</div>
</div>
</div>
<div class="go_top cursor_pointer" title="返回顶部"><!-- 快速到顶部 -->
</div>
<div class="total_bottom">
<span>技术支持</span>
<a href="http://www.wyysdsa.com/">奕弈</a>
</div>
</body>
</html>