;(function($){
	var binding_function=function(){
		var self=this;
		this.body=$(document.body);
		this.body.delegate("#validate_img","click",function(){
			self.validate_change();
		});
		this.body.delegate("#login_btn","click",function(){
			self.validate_handle();
		});
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
	binding_function.prototype={
		binding_save:function(){
			var self=this;
			var username=document.getElementById("username").value;
			var password=document.getElementById("password").value;
			username=$.trim(username);
			password=$.trim(password);
			if(!username||!password){
				alert("有信息未完成");
				return;
			}
			$.ajax({
			    url:"/stucontrol/Home/Index/binding_handle.shtml",
				type:"POST",
				dataType:"json",
				data:{"username":username,"password":password},
				success:function(data){
					if(data.text=="ok"){
						alert("绑定成功，请重新用QQ登录");
						location.href="/stucontrol/Public/php/qq_login.php";
					}else if(data.text=="exist"){
						alert("没有此帐号，请先注册");
					}else if(data.text=="no"){
						alert("此帐号已被绑定");
					}else{
						alert("密码错误");
					}
					self.validate_change();
				},
				error:function(data,status,e){
					console.log(e);
					self.validate_change();
				}
			});
		},
		validate_change:function(){
			document.getElementById("validate_img").src="/stucontrol/Public/php/validate.php?r="+Math.floor(Math.random()*8000000000);
		},
		validate_handle:function(){
			var self=this;
			var validate=document.getElementById("validate_check").value;
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
						self.binding_save();
					}else{
						alert("验证码错误");
					}
					self.validate_change();
				},
				error:function(data,status,e){
					console.log(e);
					self.validate_change();
				}
			});
		}
	}
	window['binding_function']=binding_function;
})(jQuery);