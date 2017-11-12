;(function($){
	var homework_login_function=function(){
		var self=this;
		this.class_chose_check=true;
		this.class_chose=true;
		this.class_content_check=false;
		this.body=$(document.body);
		this.body.delegate(".class_all_class_li","click",function(){
			self.class_count($(this));
		});
		this.body.delegate("#class_li","click",function(){
			self.class_choice();
		});
		this.body.delegate("#validate_img","click",function(){
			self.validate_change();
		});
		this.body.delegate("#login_btn","click",function(){
			self.login_check();
		});
		//背景及其大小设置区域
		if(screen.height>940){
		$(".body_1").css({
			"height":screen.height-150+"px"
		});
		}
		
		window.onresize=function(){
			var screen_width=parseInt($(document).width());
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
		
	this.body.delegate(".popup_btn","click",function(){
			$(".envelop").css("display","none");
			$(".popup").css("display","none");
		});
	};
	
	homework_login_function.prototype={//继承
        class_count:function(id){
			var self=this;
			var data_id=id.attr("data-class");
			var object=document.getElementById("class_all_class");
			var class_all=object.getElementsByTagName("li");
			document.getElementById("class_content").innerHTML=class_all[data_id].innerHTML;
			self.class_content_check=true;
			$(".class_img").css({
					"transform":"rotate(-90deg)"
				});
				$(".class_all_class").slideUp(500);
				self.class_chose=true;
				self.class_chose_check=false;
		},
		class_choice:function(){
			var self=this;
			if(self.class_chose){
				$(".class_img").css({
					"transform":"rotate(90deg)"
				});
				$(".class_all_class").slideDown(500);
				self.class_chose=false;
			}else{
				$(".class_img").css({
					"transform":"rotate(-90deg)"
				});
				$(".class_all_class").slideUp(500);
				self.class_chose=true;
			}
		},
		login_check:function(){
			var self=this;
			var username=document.getElementById("username").value;
			username=$.trim(username);
			var password=document.getElementById("password").value;
			password=$.trim(password);
			var password_check=document.getElementById("password_check").value;
			password_check=$.trim(password_check);
			var number=document.getElementById("number").value;
			number=$.trim(number);
			var radio_1=document.getElementById("radio_1").checked;
			var radio_2=document.getElementById("radio_2").checked;
			var radio;
			if(radio_1||radio_2){
				radio=true;
			}else{
				radio=false;
			}
			var class_check;
			if(self.class_content_check){
				class_check=true;
			}else{
				class_check=false;
			}
 
 if(!username||!password||!password_check||!number||!radio||!class_check){
	 $(".content_remind").css({
		"display":"block" 
	 });
 }else{
	 $(".content_remind").css({
		"display":"none" 
	 });
		if(username.length>4||password.length>25||number.length>20){
		  alert("用户名或密码超出规定长度");
	  }else{
	 if(password==password_check){
		 self.validate_check();
	 }else{
		 alert("两次输入密码不一致");
	  }
	  }
 }
		},
		login_save:function(){
			var self=this;
			var username=document.getElementById("username").value;
			username=$.trim(username);
			var password=document.getElementById("password").value;
			password=$.trim(password);
			var number=document.getElementById("number").value;
			number=$.trim(number);
			var radio_1=document.getElementById("radio_1").checked;
			var gender;
			if(radio_1){
				gender="男";
			}else{
				gender="女";
			}
			var class_content=document.getElementById("class_content").innerHTML;
			class_content=$.trim(class_content);
			$.ajax({
				url:"/stucontrol/Home/Index/login_save.shtml",
				type:"POST",
				dataType:"json",
				data:{"username":username,"password":password,"classname":class_content,"classnumber":number,"sex":gender},
				success:function(data){
					if(data.text=="ok"){
						alert("注册成功");
						self.validate_change();
						location.href='/stucontrol/Home/Index/admin.shtml';
					}else if(data.text=="exist"){
						alert("此学号已被注册");
					}else{
						alert("注册出错");
					}
				},
				error:function(data,status,e){
					console.log(e);
				}
			});
			
		},
		validate_check:function(){
			var self=this;
			var validate=document.getElementById("validate_check").value;
			validate=$.trim(validate);
			if(!validate){
				alert("验证码不能为空");
				self.validate_change();
				return;
			}
			$.ajax({
				url:"/stucontrol/Home/Index/validate_handle.shtml",
				type:"POST",
				dataType:"json",
				data:{"result":validate},
				success:function(data){
					if(data.text=="ok"){
						self.login_save();
					}else{
						alert("验证码错误");
					}
				},
				error:function(data,status,e){
					console.log(e);
				}
			});
		},
		validate_change:function(){
			document.getElementById("validate_img").src="/stucontrol/Public/php/validate.php?r="+Math.floor(Math.random()*8000000000);
		}
	}
	window['homework_login_function']=homework_login_function;
})(jQuery);