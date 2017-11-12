//通用导航栏js
;(function($){
	var navigation_function=function(){
		//document.oncontextmenu = function(){return false;}  不让别人点右键
		var self=this;
		this.check=true;
		this.body=$(document.body);
		this.body.delegate(".navbar-toggle","click",function(){
			self.navigation_ul_show();
		});
	};
	navigation_function.prototype={
		navigation_ul_show:function(){
			var self=this;
			if($(".navigation_ul").css("display")=="none"){
				self.check=true;
			}
			if(self.check){
				self.check=false;
				$(".navigation_ul").slideDown();
			}else{
				self.check=true;
				$(".navigation_ul").slideUp();
			}
		}
	}
	window['navigation_function']=navigation_function;
})(jQuery);
$(function(){
	var navigation=new navigation_function();
});