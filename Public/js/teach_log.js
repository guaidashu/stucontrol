;(function($){
	var index_function=function(){
		var self=this;
		this.body=$(document.body);
		this.class_chose=true;
		this.kind_chose=true;
		this.kind_check=true;
		this.report_kind;
		this.arr_li=new Array("#report_navigation_li_1","#report_navigation_li_2","#report_navigation_li_3");//内部导航栏li标签数组
		this.arr_div=new Array(".report_form",".report_delete",".report_control");//主面板数组
		this.arr_label=new Array(".report_navigation_li_label_1",".report_navigation_li_label_2",".report_navigation_li_label_3");//labe标签数组
		//this.ajaxTest();
		//alert(parseInt($(document).width()));
		this.body.delegate(".report_navigation_li","click",function(){
			self.navigation_click($(this));
		});
		this.body.delegate(".report_navigation_li_negative","mouseover",function(){
			var id=$(this).attr("data-id");
			$(self.arr_label[id]).css("display","block");
		});
		this.body.delegate(".popup_change_btn","click",function(){
			self.stu_control_change_save($(this));
		});
		this.body.delegate(".report_kind_div","click",function(){//类型选择
			if(self.kind_chose){
				self.report_kind_slide();
				self.kind_chose=false;
			}
		});
		this.body.delegate(".report_kind_li","click",function(){
			self.report_kind_choice($(this));
		});
		this.body.delegate(".index_content_control","click",function(){
			self.stu_control_change($(this));
		});
		this.body.delegate(".popup_change_close","click",function(){
			self.stu_control_change_remove();
		});
		this.body.delegate(".class_all_class_li","click",function(){
			self.class_count($(this));
		});
		this.body.delegate("#class_li","click",function(){
			self.class_choice();
		});
		this.body.delegate(".stu_exit","click",function(){
			if(confirm("确定退出？")){
				self.exit_log();
			}
		});
		document.getElementById("saytext").focus();
		this.body.delegate(".report_navigation_li_negative","mouseout",function(){
			var id=$(this).attr("data-id");
			$(self.arr_label[id]).css("display","none");
		});
		this.body.delegate(".report_btn","click",function(){//登录触发以及判断
			if(self.report_check()){
				self.report_save();
			}else{
				alert("还有信息未完善哦");
			}
		});
		this.body.delegate("*[data-delete]","click",function(){
			if(confirm("确定删除？")){
				self.report_delete($(this));
			}
		});
		if(parseInt($(document).width())<654){
			$(".report_title_input").css("width",parseInt($(".report_title").css("width"))-8+"px");
		}
		$(".report_textarea_input").css("width",parseInt($(".report_textarea").css("width"))-30+"px");//输入框初始化
		window.onresize=function(){
			var screen_width=parseInt($(document).width());
			if(parseInt($(document).width())<654){
			    $(".report_title_input").css("width",parseInt($(".report_title").css("width"))-8+"px");
		    }else{
				$(".report_title_input").css("width","280px");
			}
			$(".report_textarea_input").css("width",parseInt($(".report_navigation").css("width"))-30+"px");
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
		navigation_click:function(id){//内部导航栏控制
			var self=this;
			var data=id.attr("data-id");
			for(var i=0;i<3;i++){
				if(i==data){
					$(self.arr_li[i]).addClass("report_navigation_li_active");
					$(self.arr_li[i]).removeClass("report_navigation_li_negative");
					$(self.arr_div[i]).css("display","block");
					$(self.arr_label[i]).css({
						"display":"block",
						"border-color":"skyblue transparent"
						});
					continue;
				}
				$(self.arr_li[i]).removeClass("report_navigation_li_active");
				$(self.arr_li[i]).addClass("report_navigation_li_negative");
				$(self.arr_div[i]).css("display","none");
				$(self.arr_label[i]).css({
						"display":"none",
						"border-color":"#d6d9db transparent"
				});
			}
		},
		class_count:function(id){
			var self=this;
			var data_id=id.attr("data-class");
			var object=document.getElementById("class_all_class");
			var class_all=object.getElementsByTagName("li");
			document.getElementById("class_content").innerHTML=class_all[data_id].innerHTML;
			$(".class_img").css({
					"transform":"rotate(-90deg)"
				});
				$(".class_all_class").slideUp(500);
				self.information_student_return();
				self.class_chose=true;
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
		//通知发布
		report_save:function(){
			var self=this;
			var content=document.getElementById("saytext").value;
			var title=document.getElementById("report_title_input").value;
			content=$.trim(content);
			title=$.trim(title);
			$.ajax({
				url:"/stucontrol/Home/Index/report_save.shtml",
				type:"POST",
				dataType:"json",
				data:{"content":content,"title":title,"kind":self.report_kind},
				success:function(data){
					if(data.text=="ok"){
						alert("发布成功");
					}else{
						alert("发布失败");
					}
				},
				error:function(data,status,e){
					console.log(e);
				}
			});
		},
		//通知检查
		report_check:function(){
			var self=this;
			var content=document.getElementById("saytext").value;
			var title=document.getElementById("report_title_input").value;
			content=$.trim(content);
			title=$.trim(title);
			if(!content||!title||!self.report_kind){
				return false;
			}else{
				return true;
			}
		},
		report_delete:function(id){
			var self=this;
			var delete_id=id.attr("data-delete");
			$.ajax({
				url:"/stucontrol/Home/Index/information_delete.shtml",
				type:"GET",
				dataType:"json",
				data:{"delete_id":delete_id},
				success:function(data){
					if(data.text=="ok"){
						alert("删除成功");
						id.parent().remove();
					}
				},
				error:function(data,status,e){
					console.log(e);
				}
			});
		},
		information_student_return:function(){
			var classname=document.getElementById("class_content").innerHTML;
			classname=$.trim(classname);
			$.ajax({
				url:"/stucontrol/Home/Index/information_student_return.shtml",
				type:"GET",
				dataType:"json",
				data:{"classname":classname},
				success:function(data){
					$(".control_content").html(data.text);
				},
				error:function(data,status,e){
					console.log(e);
				}
			});
		},
		exit_log:function(){
			$.ajax({
				url:"/stucontrol/Home/Index/exit_log_stu.shtml",
				type:"GET",
				dataType:"json",
				data:{},
				success:function(data){
					if(data.text=="ok"){
						alert("成功退出");
						location.href="/stucontrol/Home/Index/index.shtml";
					}else{
						alert("系统错误，稍后再试");
					}
				},
				error:function(data,status,e){
					console.log(e);
				}
			});
		},
		stu_control_change:function(id){
			var data=id.attr("data-control");
			var str='<div class="popup_change">'+
                    '<div class="popup_change_head">'+
                    '班委设置'+
                    '<span class="popup_change_close">'+
                    '</span>'+
                    '</div>'+
                    '<div class="popup_change_body">'+
                    '<p>'+
                    '输入1设置为班委'+
                    '</p>'+
                    '<p>'+
                    '输入0设置为普通同学'+
                    '</p>'+
                    '<input type="text" class="popup_change_input" id="popup_change_input" />'+
                    '<div class="popup_change_btn" data-change='+data+'>'+
                    '&nbsp;修改'+
                    '</div>'+
                    '</div>'+
                    '</div>'+
                    '<div class="envelop_change">'+
                    '</div>';
			$("body").append(str);
		},
		stu_control_change_remove:function(){
			$(".popup_change").remove();
			$(".envelop_change").remove();
		},
		stu_control_change_save:function(id){
			var self=this;
			var data_id=id.attr("data-change");
			var content=document.getElementById("popup_change_input").value;
			content=$.trim(content);
			if(!content){
				alert("请输入内容");
				return;
			}
			$.ajax({
				url:"/stucontrol/Home/Index/stu_control_change.shtml",
				type:"GET",
				dataType:"json",
				data:{"content":content,"id":data_id},
				success:function(data){
					if(data.text=="ok"){
						alert("设置成功");
						self.information_student_return();
						self.stu_control_change_remove();
					}else{
						alert("系统错误，稍后再试");
					}
				},
				error:function(data,status,e){
					console.log(e);
				}
			});
		},
		report_kind_choice:function(id){
			var self=this;
			var kind_name=id.html();
			var kind=id.attr("data-id");
			self.report_kind=kind;
			$("#report_kind").html(kind_name);
			$(".report_kind_ul").slideUp(300,function(){
				self.kind_chose=true;
			});
			self.kind_check=true;
		},
		report_kind_slide:function(){
			var self=this;
			if(self.kind_check){
			$(".report_kind_ul").slideDown(300,function(){
				self.kind_chose=true;
			});
			self.kind_check=false;
			}else{
				$(".report_kind_ul").slideUp(300,function(){
				self.kind_chose=true;
			});
			self.kind_check=true;
			}
		}
	}
	window['index_function']=index_function;
})(jQuery);
$(function(){
	var index=new index_function();
});