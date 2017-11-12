;(function($){
	var index_function=function(){
		var self=this;
		document.getElementById("saytext").focus();
		this.guestbook_check=true;//留言发布检查，防止多次点击多次发布
		this.check_comment_show=true;
		this.guestbook_more=true;
		this.validate_count;
		this.username;
		this.getName();
		this.validate_getcount();
		
		this.body=$(document.body);
		//this.ajaxTest();
		this.body.delegate(".go_top","click",function(){
			$.scrollTo("#go_top",600);
		});
		this.body.delegate(".stu_guestbook_btn","click",function(){
			self.guestbookSave();
		});
		this.body.delegate(".popup_btn","click",function(){
			self.validate_handle();
		});
		this.body.delegate("#validate_img","click",function(){
			self.validate_change();
		});
		this.body.delegate(".popup_back_btn,.popup_close","click",function(){
			$(".envelop").remove();
			$(".popup").remove();
			self.guestbook_check=true;
		});
		this.body.delegate(".guestbook_exit","click",function(){
			self.guestbookExit();
		});
		this.body.delegate(".guestbook_bottom","click",function(){//加载更多
			if(self.guestbook_more){
				self.guestbookMore();
				self.guestbook_more=false;
			}
		});
		this.body.delegate(".reply_content_btn","click",function(){//评论发布
			self.guestbookComment($(this));
		});
		this.body.delegate(".reply_content_reply_btn","click",function(){//回复发布
			self.guestbookReply($(this));
		});
		this.body.delegate(".content_delete_btn","click",function(){
			if(confirm("确定删除？")){
			     self.guestbookDelete($(this));
			}
		});
		this.body.delegate(".reply_content_bottom_delete","click",function(){
			if(confirm("确定删除？")){
			     self.guestbookCommentDelete($(this));
			}
		});
		this.body.delegate(".reply_content_bottom_reply","click",function(){//回复
			if(self.check_comment_show){
			   self.commentShowReply($(this));
			   self.check_comment_show=false;
			}else{
				if(confirm("放弃当前评论或回复？")){
					self.commentShowReply($(this));
				}
			}
		});
		this.body.delegate(".content_reply_btn","click",function(){//评论
			if(self.check_comment_show){
			   self.commentShow($(this));
			   self.check_comment_show=false;
			}else{
				if(confirm("放弃当前评论或回复？")){
					self.commentShow($(this));
				}
			}
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
		commentShow:function(id){//评论文本域显示函数
			var data_reply=id.attr("data-comment");
			var str= '<div class="content_reply_textarea">'+
                     '<textarea class="reply_textarea" id="reply_textarea" placeholder="随便评论点什么吧......">'+
                     '</textarea>'+
                     '<div class="content_reply_textarea_bottom">'+
                     '<div class="qq_face_div"><!-- 表情 -->'+
                     '<p>'+
                     '<span class="emotion_reply">'+
                     '</span>'+
                     '</p>'+
                     '</div>'+
                     '<div class="reply_content_btn cursor_pointer" data-comment="'+data_reply+'">'+
                     '确定'+
                     '</div>'+
                     '</div>'+
                     '</div>';
			$(".content_reply_textarea").remove();
			var parent=id.parent().parent();
			parent.append(str);
			document.getElementById("reply_textarea").focus();
		    $('.emotion_reply').qqFace({
		       id : 'facebox', 
		       assign:'reply_textarea', 
		       path:'/stucontrol/Public/arclist/'	//表情存放的路径
	        });
		},
		commentShowReply:function(id){//回复文本域显示函数
			var data_reply=id.attr("data-reply");
			var name=id.attr("data-name");
			var str= '<div class="content_reply_textarea">'+
                     '<textarea class="reply_textarea" id="reply_textarea" placeholder="回复：'+name+'">'+
                     '</textarea>'+
                     '<div class="content_reply_textarea_bottom">'+
                     '<div class="qq_face_div"><!-- 表情 -->'+
                     '<p>'+
                     '<span class="emotion_reply">'+
                     '</span>'+
                     '</p>'+
                     '</div>'+
                     '<div class="reply_content_reply_btn cursor_pointer" data-comment="'+data_reply+'" data-name="'+name+'">'+
                     '确定'+
                     '</div>'+
                     '</div>'+
                     '</div>';
			$(".content_reply_textarea").remove();
			var parent=id.parent().parent().parent();
			parent.append(str);
			document.getElementById("reply_textarea").focus();
		    $('.emotion_reply').qqFace({
		       id : 'facebox', 
		       assign:'reply_textarea', 
		       path:'/stucontrol/Public/arclist/'	//表情存放的路径
	        });
		},
		guestbookSave:function(){//留言发布功能函数
			var self=this;
			var content=document.getElementById("saytext").value;
			content=$.trim(content);
			if(!content){
				alert("请完善内容");
				return;
			}
			if(!self.username){
				alert("请先登录");
				return;
			}
			if(self.validate_count==3){
				self.validate_show();
				return;
			}
			if(!self.guestbook_check){
				return;
			}
			self.guestbook_check=false;
			$.ajax({
				url:"/stucontrol/Home/Index/guestbook_save.shtml",
				type:"POST",
				dataType:"json",
				data:{"content":content},
				success:function(data){
					if(data.text=="ok"){
						alert("发布成功");
						content=self.replace_em(content);
						var str= '<div class="content">'+
                                 '<div class="content_head">'+
                                 '<span class="content_head_author">'+
                                 self.username+
                                 '：</span>'+
                                 '</div>'+
                                 '<div class="content_body">'+
                                 content+
                                 '</div>'+
                                 '<div class="content_bottom">'+
                                 '<span class="content_bottom_time">'+
                                 self.getTime()+
                                 '</span>'+
                                 '<span class="content_delete_btn cursor_pointer" data-comment-delete="'+data.id+'">'+
                                 '删除'+
                                 '</span>'+
                                 '<span class="content_reply_btn cursor_pointer" data-comment="'+data.id+'">'+
                                 '评论'+
                                 '</span>'+
                                 '</div>'+
								 '<div class="content_reply">'+
								 '</div>'+
                                 '</div>';
					    $(".stu_guestbook_content").prepend(str);
						document.getElementById("saytext").value="";
						self.guestbook_check=true;
						self.validate_count=self.validate_getcount();
						self.validate_change();
					}else if(data.text=="log"){
						alert("请先登录");
						self.guestbook_check=true;
						self.validate_change();
					}else{
						alert("系统错误，请稍后再试");
						self.guestbook_check=true;
						self.validate_change();
					}
				},
				error:function(data,status,e){
					console.log(e);
					self.guestbook_check=true;
					self.validate_change();
				}
			});
		},
		getTime:function(){//获取时间
			var nowTime=new Date();
			var nowYear=nowTime.getFullYear();
			var nowMonth=nowTime.getMonth()+1;
			var nowDay=nowTime.getDate();
			var nowHour=nowTime.getHours();
			var nowMinute=nowTime.getMinutes();
			var nowSecond=nowTime.getSeconds();
			if(nowMonth<10){
				nowMonth="0"+nowMonth;
			}
			if(nowDay<10){
				nowDay="0"+nowDay;
			}
			if(nowHour<10){
				nowHour="0"+nowHour;
			}
			if(nowMinute<10){
				nowMinute="0"+nowMinute;
			}
			if(nowSecond<10){
				nowSecond="0"+nowSecond;
			}
			var str= nowYear+"-"+nowMonth+"-"+nowDay+" "+nowHour+":"+nowMinute+":"+nowSecond;
			return str;
		},
		replace_em:function(str){//js处理表情
			str = str.replace(/ /g,'&nbsp;');
			str = str.replace(/\</g,'&lt;');
	        str = str.replace(/\>/g,'&gt;');
			str = str.replace(/\n/g,'<br/>');
	        str = str.replace(/\[em_([0-9]*)\_face_qq]/g,'<img src="/stucontrol/Public/arclist/$1.gif" border="0" />');
	        return str;
        },
		guestbookDelete:function(id){//留言删除函数
			var self=this;
			var delete_id=id.attr("data-comment-delete");
			$.ajax({
				url:"/stucontrol/Home/Index/guestbook_delete.shtml",
				type:"GET",
				dataType:"json",
				data:{"id":delete_id},
				success:function(data){
					if(data.text=="ok"){
						alert("删除成功");
						id.parent().parent().remove();
					}else{
						alert(data.text);
					}
				},
				error:function(data,status,e){
					console.log(e);
				}
			});
		},
		guestbookComment:function(id){//留言评论函数
			var self=this;
			var comment_id=id.attr("data-comment");
			var content=document.getElementById("reply_textarea").value;
			content=$.trim(content);
			if(!content){
				alert("内容不能为空哦");
				return;
			}
			if(!self.username){
				alert("请先登录");
				return;
			}
			if(self.validate_count==3){
				self.validate_show();
				return;
			}
			if(!self.guestbook_check){
				return;
			}
			self.guestbook_check=false;
			$.ajax({
				url:"/stucontrol/Home/Index/guestbook_comment.shtml",
				type:"POST",
				dataType:"json",
				data:{"content":content,"id":comment_id,"object":""},
				success:function(data){
					if(data.text=="ok"){
						alert("发布成功");
						content=self.replace_em(content);
						var str='<div class="reply_content">'+
                                '<div class="reply_content_head">'+
                                '<span class="reply_content_author">'+
                                self.username+
                                '：</span>'+
                                content+
                                '</div>'+
                                '<div class="reply_content_bottom">'+
                                '<span class="reply_content_bottom_time">'+
                                self.getTime()+
                                '</span>'+
                                '<span class="reply_content_bottom_reply cursor_pointer" data-reply="'+data.id+'" data-name="'+self.username+'">'+
                                '回复'+
                                '</span>'+
                                '<span class="reply_content_bottom_delete cursor_pointer" data-reply-delete="'+data.id+'">'+
                                '删除'+
                                '</span>'+
                                '</div>'+
                                '</div>';
								id.parent().parent().prev().append(str);
								$(".content_reply_textarea").remove();
								self.check_comment_show=true;
								self.validate_count=self.validate_getcount();
								self.guestbook_check=true;
								self.validate_change();
					}else{
						alert("发布失败，请稍后再试");
						self.validate_change();
						self.guestbook_check=true;
					}
				},
				error:function(data,status,e){
					console.log(e);
					self.guestbook_check=true;
					self.validate_change();
				}
			});
		},
		getName:function(){//获取用户名函数
			var self=this;
			$.ajax({
				url:"/stucontrol/Home/Index/get_username.shtml",
				type:"GET",
				dataType:"json",
				data:{},
				success:function(data){
					self.username=data.text;
				},
				error:function(data,status,e){
					console.log(e);
				}
			});
		},
		guestbookCommentDelete:function(id){//留言评论删除函数
			var delete_id=id.attr("data-reply-delete");
			$.ajax({
				url:"/stucontrol/Home/Index/guestbook_comment_delete.shtml",
				type:"GET",
				dataType:"json",
				data:{"id":delete_id},
				success:function(data){
					if(data.text=="ok"){
						alert("删除成功");
						id.parent().parent().remove();
					}else{
						alert(data.text);
					}
				},
				error:function(data,status,e){
					console.log(e);
				}
			});
		},
		guestbookReply:function(id){//评论回复保存函数
			var self=this;
			var comment_id=id.attr("data-comment");
			var name=id.attr("data-name");
			var content=document.getElementById("reply_textarea").value;
			content=$.trim(content);
			if(!content){
				alert("内容不能为空哦");
				return;
			}
			if(!self.username){
				alert("请先登录");
				return;
			}
			if(self.validate_count==3){
				self.validate_show();
				return;
			}
			if(!self.guestbook_check){
				return;
			}
			self.guestbook_check=false;
			$.ajax({
				url:"/stucontrol/Home/Index/guestbook_comment.shtml",
				type:"POST",
				dataType:"json",
				data:{"content":content,"id":comment_id,"object":name},
				success:function(data){
					if(data.text=="ok"){
						alert("发布成功");
						content=self.replace_em(content);
						var str='<div class="reply_content">'+
                                '<div class="reply_content_head">'+
                                '<span class="reply_content_author">'+
                                self.username+
                                '&nbsp;回复&nbsp;'+name+'</span>：'+
                                content+
                                '</div>'+
                                '<div class="reply_content_bottom">'+
                                '<span class="reply_content_bottom_time">'+
                                self.getTime()+
                                '</span>'+
                                '<span class="reply_content_bottom_reply cursor_pointer" data-reply="'+data.id+'" data-name="'+self.username+'">'+
                                '回复'+
                                '</span>'+
                                '<span class="reply_content_bottom_delete cursor_pointer" data-reply-delete="'+data.id+'">'+
                                '删除'+
                                '</span>'+
                                '</div>'+
                                '</div>';
								id.parent().parent().parent().append(str);
								$(".content_reply_textarea").remove();
								self.check_comment_show=true;
								self.guestbook_check=true;
								self.validate_count=self.validate_getcount();
								self.validate_change();
					}else{
						alert("发布失败，请稍后再试");
						self.guestbook_check=true;
						self.validate_change();
					}
				},
				error:function(data,status,e){
					console.log(e);
					self.guestbook_check=true;
					self.validate_change();
				}
			});
		},
		validate_show:function(){//验证码遮罩层显示函数
			var self=this;
			var str='<div class="envelop">'+
                    '</div>'+
                    '<div class="popup">'+
                    '<div class="popup_head">'+
                    '验证码：'+
                    '<span class="popup_close cursor_pointer">'+
                    '</span>'+
                    '</div>'+
                    '<div class="popup_remind">'+
                    '点击图片换一张'+
                    '</div>'+
                    '<div class="popup_validate_img">'+
                    '<img src="/stucontrol/Public/php/validate.php?r='+Math.floor(Math.random()*8000000000)+'" width="100px" height="30px" id="validate_img" class="cursor_pointer" />'+
                    '</div>'+
                    '<div class="popup_input">'+
                    '<input type="text" name="validate" id="popup_input" />'+
                    '</div>'+
                    '<div id="popup_btn">'+
                    '<div class="popup_btn">'+
                    '&nbsp;确定'+
                    '</div>'+
                    '<div class="popup_back_btn">'+
                    '&nbsp;取消'+
                    '</div>'+
                    '</div>'+
                    '</div>';
	         $("body").append(str);
		},
		validate_change:function(){//验证码切换
			document.getElementById("validate_img").src="/stucontrol/Public/php/validate.php?r="+Math.floor(Math.random()*8000000000);
		},
		validate_handle:function(){//验证码处理
			var self=this;
			var content=document.getElementById("popup_input").value;
			content=$.trim(content);
			if(!content){
				alert("输入为空");
				return;
			}
			$.ajax({
				url:"/stucontrol/Home/Index/validate_handle_guestbook.shtml",
				type:"POST",
				dataType:"json",
				data:{"result":content},
				success:function(data){
					if(data.text=="ok"){
						alert("请再次点击发布");
						$(".envelop").remove();
			            $(".popup").remove();
						self.validate_count=self.validate_getcount();
						self.validate_change();
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
		validate_getcount:function(){//发布次数获取，每次返回给全局变量validate_count
			var self=this;
			$.ajax({
				url:"/stucontrol/Home/Index/validate_returncount.shtml",
				type:"GET",
				dataType:"json",
				data:{},
				success:function(data){
					self.validate_count=data.text;
				},
				error:function(data,status,e){
					console.log(e);
				}
			});
		},
		guestbookMore:function(){//加载更多
			var self=this;
			$.ajax({
				url:"/stucontrol/Home/Index/guestbook_show_more.shtml",
				type:"POST",
				dataType:"json",
				data:{},
				success:function(data){
					if(!$.trim(data.text)){
						$(".guestbook_bottom").html("已经是全部");
						self.guestbook_more=false;
					}else{
						$(".stu_guestbook_content").append(data.text);
						self.guestbook_more=true;
					}
				},
				error:function(data,status,e){
					console.log(e);
					self.guestbook_more=true;
				}
			});
		},
		guestbookExit:function(){
			var self=this;
			$.ajax({
				url:"/stucontrol/Home/Index/exit_log_stu.shtml",
				type:"GET",
				dataType:"json",
				data:{},
				success:function(data){
					if(data.text=="ok"){
						location.href="/stucontrol/Home/Index/guestbook.shtml";
					}else{
						alert("退出失败请稍后再试");
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