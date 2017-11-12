;(function($){
	var index_function=function(){
		var self=this;
		this.suggest_click_now=0;
		this.arr_suggest_click=new Array(".stu_suggest_navigation_1",".stu_suggest_navigation_2",".stu_suggest_navigation_3");
		this.arr_suggest_body=new Array(".stu_suggest_body_action",".stu_suggest_body_lecture",".stu_suggest_body_question");
		this.body=$(document.body);
		//this.ajaxTest();测试语句
		//alert($(document).width());
		this.body.delegate(".exit_stu","click",function(){
			if(confirm("确定退出？")){
				self.exit_stu();
			}
		});
		this.body.delegate(".log_stu","click",function(){
			location.href="/stucontrol/Home/Index/admin.shtml";
		});
		if(parseInt($(document).width())<500){
				$(".carousel").css({//轮播器高度自适应
				    "height":parseInt($(".carousel").css("width"))*4/6+"px"
			    });
				$(".carousel_img").css({
					"height":parseInt($(".carousel").css("width"))*4/6+"px"
				});
				$(".carousel_img_auto").css({
					"height":parseInt($(".carousel").css("width"))*4/6+"px"
				});
		}
		
		$(".stu_control").css({
			"min-height":parseInt($(".stu_control_left").css("height"))+90+"px"
		});
		
		//点击事件区域
		this.body.delegate(".go_top","click",function(){
			$.scrollTo("#go_top",600);
		});
		this.body.delegate(".stu_suggest_navigation","click",function(){
			self.suggest_navigation_click($(this));
		});
		
		window.onresize=function(){//页面宽度变化时
			var screen_width=parseInt($(document).width());
			var position=parseInt($(".carousel_img").css("left"))/parseInt($(".carousel_img").css("width"));
			$(".carousel_img_auto").css("width",$(".carousel").css("width"));
			if(screen_width<=500){
				$(".carousel").css({//高度自适应
				    "height":parseInt($(".carousel").css("width"))*4/6+"px"
			    });
				$(".carousel_img").css({
					"height":parseInt($(".carousel").css("width"))*4/6+"px"
				});
				$(".carousel_img_auto").css({
					"height":parseInt($(".carousel").css("width"))*4/6+"px"
				});
			}else{
				$(".carousel").css({//高度自适应
				    "height":"300px"
			    });
				$(".carousel_img").css({
					"height":"300px"
				});
				$(".carousel_img_auto").css({
					"height":"300px"
				});
			}
			$(".carousel_img").css({
				"width":parseInt($(".carousel").css("width"))*7+"px",
				"left":position*parseInt($(".carousel").css("width"))*7+"px"
			});
			
			$(".stu_control").css({
			   "min-height":parseInt($(".stu_control_left").css("height"))+90+"px"
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
	index_function.prototype={
		ajaxTest:function(){
			$.ajax({
				url:"/stucontrol/Home/Index/ajaxprint.shtml",
				type:"GET",
				dataType:"json",
				data:{"name":"我试试"},
				success:function(data){
					alert(data.text);
				},
				error:function(data,status,e){
					console.log(e);
				}
			});
		},
		suggest_navigation_click:function(id){
		var self=this;
		var click_id=id.attr("data-suggest");
		if(self.suggest_click_now==click_id){
			return;
		}
		id.addClass("stu_suggest_navigation_active");
		$(self.arr_suggest_body[click_id]).css("display","block");
		$(self.arr_suggest_body[self.suggest_click_now]).css("display","none");
		$(self.arr_suggest_click[self.suggest_click_now]).removeClass("stu_suggest_navigation_active");
		self.suggest_click_now=click_id;
	    },
		exit_stu:function(){
			$.ajax({
				url:"/stucontrol/Home/Index/exit_log_stu.shtml",
				type:"GET",
				dataType:"json",
				data:{},
				success:function(data){
					if(data.text=="ok"){
						alert("退出成功");
						location.href="/stucontrol/Home/Index/index.shtml";
					}else{
						alert("系统错误，请稍后再试");
					}
				},
				error:function(data,status,e){
					console.log(e);
				}
			});
		}
		
	}
	window['index_function']=index_function;
})(jQuery);
$(function(){
	var index=new index_function();
});