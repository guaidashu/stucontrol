;(function($){
	var information_function=function(){
		var self=this;
		this.body=$(document.body);
		//$(".body_start").css("min-height",parseInt($(".information_left").css("height"))+100+"px");
		
		//alert($(document).width());
		//点击事件区域
		this.body.delegate(".go_top","click",function(){
			$.scrollTo("#go_top",600);
		});
		$(".report_p_content").css({
				"width":parseInt($(".report_p_title").css("width"))-88+"px"
		});
		
		window.onresize=function(){
			//$(".body_start").css("min-height",parseInt($(".information_left").css("height"))+100+"px");
			screen_width=parseInt($(document).width());
			$(".report_p_content").css({
				"width":parseInt($(".report_p_title").css("width"))-88+"px"
			});
			if(screen_width>800){
				$(".navigation_ul").css({
					"display":"block"
				});
			}else{
				$(".navigation_ul").css({
					"display":"none"
				});
			}
		}
		
		window.onscroll=function(){//滚动滚动条时
			var scrollTop=parseInt($(window).scrollTop());
			if(scrollTop>100){
				$(".go_top").fadeIn();
			}else{
				$(".go_top").fadeOut();
			}
		}
	};
	information_function.prototype={//继承
		
	}
	window['information_function']=information_function;
})(jQuery);
$(function(){
	var information=new information_function();
});