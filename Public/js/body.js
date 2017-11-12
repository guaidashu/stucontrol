;(function($){
	var body_function=function(){
		var self=this;
		this.body=$(document.body);
		
	};
	body_function.prototype={
		
	}
	window['body_function']=body_function;
})(jQuery);
$(function(){
	var body=new body_function();
});