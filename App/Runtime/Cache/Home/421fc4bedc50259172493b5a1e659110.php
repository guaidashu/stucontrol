<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/information.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/body.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/navigation.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/carousel.css" />
<link rel="stylesheet" type="text/css" href="/stucontrol/Public/css/date.css" />
<script src="/stucontrol/Public/js/jquery-1.11.3.min.js"></script>
<script src="/stucontrol/Public/js/jquery.scrollTo.js"></script>
<script src="/stucontrol/Public/js/body.js"></script>
<script src="/stucontrol/Public/js/information.js"></script>
<script src="/stucontrol/Public/js/navigation.js"></script>
<!--
<script src="/stucontrol/Public/js/carousel.js"></script>
-->
<script src="/stucontrol/Public/js/date.js"></script>
<link rel="shortcut icon" type="image/x-icon" href="/stucontrol/Public/images/ooopic_1460463927.ico" media="screen" />
<title>
报修详情
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
<li class="navigation_ul_li">
&nbsp;留言
</li>
</a>
</ul>
</div>
<div class="spacing" id="go_top">
</div>
<div class="container body_start">
<div class="col-sm-7 information_left"><!-- 左侧 -->
<div class="information_navigation"><!-- 通知页面内部导航 -->
<div class="information_navigation_container">
<a class="information_navigation_left" href=<?php echo U('Home/Index/index');;?> target="oo">
首页
</a>
<a class="information_navigation_right" href="/stucontrol/Home/Index/report_all.shtml">
所有
</a>
</div>
</div>
<div class="information_content">
<div class="public_line">
</div>
<p class="p_title">
所有通知
</p>
<div class="report_all">
<?php echo ($content); ?>
</div>
</div>
</div>
<div class="col-sm-3 information_right"><!-- 右侧 -->
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