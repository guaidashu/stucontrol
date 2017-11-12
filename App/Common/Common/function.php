<?php
//共用函数文件
function sql_select($table,$arr){//查询数据
	$user=M($table);
	/*
	$arr(
	"kind"=>int   调用那个数据库语句
	"condition"=>parse 查找固定条件的内容
	"limit_start"=>  从那条开始
	"limit_end"  查找几条
	"show"=> 只显示或者只不显示那个栏目
	"show_model"=> 对应show显示， 为布尔值
	)
	*/
	switch($arr['kind']){
		case 1: $data=$user->where($arr['condition'])->field($arr['show'],$arr['show_model'])->order("id desc")->limit($arr['limit_start'],$arr['limit_end'])->select();break;
		case 2: $data=$user->where($arr['condition'])->select();break;
		case 3: $data=$user->where($arr['condition'])->limit($arr['limit_start'],$arr['limit_end'])->select();break;
		case 4: $data=$user->where($arr['condition'])->order("id desc")->limit($arr['limit_start'],$arr['limit_end'])->select();break;
		case 5: $data=$user->select();break;//直接基本查询
		case 6: $data=$user->order("id desc")->limit($arr['limit_start'],$arr['limit_end'])->select();break;
		case 7: $data=$user->order("id desc")->select();break;
		case 8: $data=$user->field($arr['show'],$arr['show_model'])->order("id desc")->limit($arr['limit_start'],$arr['limit_end'])->select();break;
		case 9: $data=$user->field($arr['show'],$arr['show_model'])->order("id desc")->select();break;
	}
	return $data;
}

function sql_add($table,$data){//储存数据
	if(empty($data)||empty($table)){
		return false;
	}
	return M($table)->add($data);//M()->addAll()可插入多条数据 ，仅适合mysql数据库
}

function sql_change($table,$which,$update){//修改数据
		return M($table)->where($which)->save($update);
}

function sql_delete($table,$where){//删除数据
	return M($table)->where($where)->delete();
}

function sql_count($table){
	return M($table)->count();
}

function js_arr($content){//转化为json变量
	$arr=array(
	"text"=>$content
	);
	return json_encode($arr);
}

function test(){//测试函数
	echo "ok";
}

?>