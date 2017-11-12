;(function($){
	var index_function=function(){
		var self=this;
		this.body=$(document.body);
		//this.ajaxTest();
		this.body.delegate("#validate_img","click",function(){
			self.validate_change();
		});
		this.body.delegate(".report_btn","click",function(){
			self.validate_check();
		});
		document.getElementById("saytext").focus();
		window.onresize=function(){
			var screen_width=parseInt($(document).width());
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
	};
	index_function.prototype={
		validate_change:function(){
			document.getElementById("validate_img").src="/stucontrol/Public/php/validate.php?r="+Math.floor(Math.random()*8000000000);
		},
		validate_check:function(){
			var self=this;
			var validate=document.getElementById("report_validate").value;
			validate=$.trim(validate);
			if(!validate){
				alert("验证码不能为空");
				return;
			}
			$.ajax({
				url:"/stucontrol/Home/Index/validate_handle.shtml",
				type:"POST",
				dataType:"json",
				data:{"result":validate},
				success:function(data){
					if(data.text=="ok"){
						self.dorm_save();
					}else{
						alert("验证码错误");
						self.validate_change();
					}
				},
				error:function(data,status,e){
					console.log(e);
				}
			});
		},
		dorm_save:function(){
			var self=this;
			var content=document.getElementById("saytext").value;
			var dorm=document.getElementById("report_title_input").value;
			var phone=document.getElementById("report_author_input").value;
			content=$.trim(content);
			dorm=$.trim(dorm);
			phone=$.trim(phone);
			if(!content||!dorm||!phone){
				alert("请完善内容");
				return;
			}
			$.ajax({
				url:"/stucontrol/Home/Index/dorm_save.shtml",
				type:"POST",
				dataType:"json",
				data:{"content":content,"dorm":dorm,"phone":phone},
				success:function(data){
					if(data.text=="ok"){
						alert("报修成功");
						self.validate_change();
					}else{
						alert("系统错误");
						self.validate_change();
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