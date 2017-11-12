;(function($){
	var admin_function=function(kind){
		var self=this;
		this.body=$(document.body);
		this.kind=kind;
		this.body.delegate("#homework_head_form_btn","click",function(){
			if(self.log_check()){
				self.validate_check();
			}else{
				alert("请完善用户名或密码！");
			}
		});
		
		$(document).keydown(function(event){
			if(event.keyCode==13){
			if(self.log_check()){
				self.validate_check();
			}else{
				alert("请完善用户名或密码！");
			}
			}
		});

		
		this.body.delegate("#validate_img","click",function(){
			self.validate_change();
		});
		if(screen.height>500&&screen.height<650){
			$(".body_background").css({
				//"height":screen.height-270+"px"
				"height":"600px"
			});
		}
		
		
		window.onresize=function(){//页面宽度变化时
			var screen_width=parseInt($(document).width());
			if(screen_width>800){//调整导航栏
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
	admin_function.prototype={
		log_check:function(){//登录信息是否完善判断
			var username=document.getElementById("username").value;
			username=$.trim(username);
			var password=document.getElementById("password").value;
			password=$.trim(password);
			if(!username||!password){
				return false;
			}
			else{
				return true;
			}
		},
		validate_check:function(){//登录验证码判断
			var self=this;
			var xmlhttp;
			var result=document.getElementById("validate").value;
			$.ajax({
				url:"/stucontrol/Home/Index/validate_handle.shtml",
				type:"POST",
				dataType:"json",
				data:{"result":result},
				success:function(data){
					if(data.text=="ok"){
						self.homework_log_check();
					}else{
						alert("验证码输入错误！");
						self.validate_change();
					}
				},
				error:function(data,status,e){
					console.log(e);
				}
			});
		},
		homework_log_check:function(){
			var self=this;
			var xmlhttp;
			var username=document.getElementById("username").value;
			username=$.trim(username);
			var password=document.getElementById("password").value;
			password=$.trim(password);
			if(self.kind==1){
			$.ajax({
				url:"/stucontrol/Home/Index/admin_log_student.shtml",
				type:"POST",
				dataType:"json",
				data:{"username":username,"password":password},
				success:function(data){
					if(data.text=="ok"){
						location.href="/stucontrol/Home/Index/index.shtml";
					}else{
						alert("用户名或密码错误");
						self.validate_change();
					}
				},
				error:function(data,status,e){
					console.log(e);
				}
			});
			}else{
				$.ajax({
				url:"/stucontrol/Home/Index/admin_log_teacher.shtml",
				type:"POST",
				dataType:"json",
				data:{"username":username,"password":password},
				success:function(data){
					if(data.text=="ok"){
						location.href="/stucontrol/Home/Index/teach_log.shtml";
					}else if(data.text=="exist"){
						alert("请先注销学生干部登录");
					}else{
						alert("用户名或密码错误");
						self.validate_change();
					}
				},
				error:function(data,status,e){
					console.log(e);
				}
			  });
			}
		},
		validate_change:function(){
			document.getElementById("validate_img").src="/stucontrol/Public/php/validate.php?r="+Math.floor(Math.random()*8000000000);
		}
	}
	window['admin_function']=admin_function;
})(jQuery);
