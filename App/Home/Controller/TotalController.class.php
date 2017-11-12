<?php
namespace Home\Controller;
use Think\Controller;
class TotalController extends Controller{
	public function index(){
		
	}
	public function get(){
		$name=htmlspecialchars($_GET['name']);
		$arr=array(
		"text"=>$name
		);
		echo json_encode($arr);
	}
}
?>