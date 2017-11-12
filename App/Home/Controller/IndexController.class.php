<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		if(empty($_SESSION['user_student'])&&empty($_SESSION['user_teacher'])){
			$log='
			<span class="log_stu">
            登录
            </span>
			';
		}else{
			$log='
			<span class="exit_stu">
            退出
            </span>
			';
		}
	   $this->assign("content",$this->newreport())->assign("suggest_content",$this->suggest_get())->assign("log",$log);
	   $this->assign("jiangzuo",$this->jiangzuo_get())->assign("dorm",$this->dorm_get());
       $this->show();
	   /*   数据库操作范例
	   $arr_sql=array(
	   "kind"=>2,
	   "condition"=>"id=0"
	   );
	   $content=sql_select("stu_information",$arr_sql);
	   dump($content);
	   */
	   //echo U('Index','shtml',true,"www.wyysdsa.com");
	   //输出url当前模式echo C('URL_MODEL');
	   //test();
    }
	
    public function total_log(){//寝室人数统计
	if(empty($_SESSION['user_student'])&&empty($_SESSION['user_teacher'])){
		echo "<script>location.href='/stucontrol/Home/Index/admin.shtml';</script>";
	}else{
		if(!$_SESSION['user_student_control']){
			echo "<meta charset='utf-8' /><script>alert('你没有权限操作此页呦');location.href='/stucontrol/Home/Index/index.shtml';</script>";
			exit;
		}
	}   
	    if(empty($_SESSION['user_student'])){
			$content='
			<div class="stu_teacher_body">
			<div class="stu_teacher_content">
            <div class="stu_teacher_class"><!-- 班级 -->
            班级
            </div>
            <div class="stu_teacher_date"><!-- 时间 -->
            时间
            </div>
            <div class="stu_teacher_here"><!-- 到齐 -->
            到齐情况
            </div>
            <div class="stu_teacher_details"><!-- 详情 -->
            详情
            </div>
            </div>
			';
			$arr=array(
			"kind"=>6,
			"limit_start"=>0,
			"limit_end"=>11
			);
		    $data=sql_select("stu_total",$arr);	
			$i=0;
			$arr_classname=array(
			"软件一班","软件二班","软件三班","软件四班","软件五班","软件六班","物联一班","物联二班","物联三班","网络一班","网络二班"
			);
			//获取当前时间
			$date_nowday=strtotime(date("Y-m-d H:i:s"));
            $date=getdate($date_nowday);
			$arr_details=array(
			null,null,null,null,null,null,null,null,null,null,null
			);
			$arr_data=array(
			null,null,null,null,null,null,null,null,null,null,null
			);
			while($i<11){
				$flag=false;
				for($j=0;$j<11;$j++){
					$row=$data[$j];
					if($row==null){
						break;
					}
					if($arr_classname[$i]==$row['classname']){
			           $date_now_tp=strtotime($row['date']);
                       $date_now=getdate($date_now_tp);
			           if(($date['mon']==$date_now['mon'])&&($date['mday']==$date_now['mday'])&&($date['year']==$date_now['year'])){
				           if($row['control']==1){
							   $flag=true;
							   break;
						   }else{
							   $flag=false;
							   break;
						   }
			           }
					}
				}
				if($flag){
					$arr_details[$i]="到齐";
					$arr_data[$i]='
					<div class="stu_teacher_details">
					无
					</div>';
				}else{
					$arr_details[$i]="未齐";
					$arr_data[$i]='
					<a href="/stucontrol/Home/Index/details.shtml?id='.$row['id'].'&class='.$i.'" target="'.md5(rand()*15).'">
					<div class="stu_teacher_details stu_teacher_details_look">
					查看
					</div>
					</a>';
				}
				$i++;
			}
			$date_str=$date['year']."-".$date['mon']."-".$date['mday'];
			$content=$content.'
			<div class="stu_teacher_content">
            <div class="stu_teacher_class"><!-- 班级 -->
            软件一班
            </div>
            <div class="stu_teacher_date"><!-- 时间 -->
            '.$date_str.'
            </div>
            <div class="stu_teacher_here"><!-- 到齐 -->
            '.$arr_details[0].'
            </div>
            '.$arr_data[0].'
            </div>
			
			<div class="stu_teacher_content">
            <div class="stu_teacher_class"><!-- 班级 -->
            软件二班
            </div>
            <div class="stu_teacher_date"><!-- 时间 -->
            '.$date_str.'
            </div>
            <div class="stu_teacher_here"><!-- 到齐 -->
            '.$arr_details[1].'
            </div>
            '.$arr_data[1].'
            </div>
			
			<div class="stu_teacher_content">
            <div class="stu_teacher_class"><!-- 班级 -->
            软件三班
            </div>
            <div class="stu_teacher_date"><!-- 时间 -->
            '.$date_str.'
            </div>
            <div class="stu_teacher_here"><!-- 到齐 -->
            '.$arr_details[2].'
            </div>
            '.$arr_data[2].'
            </div>
			
			<div class="stu_teacher_content">
            <div class="stu_teacher_class"><!-- 班级 -->
            软件四班
            </div>
            <div class="stu_teacher_date"><!-- 时间 -->
            '.$date_str.'
            </div>
            <div class="stu_teacher_here"><!-- 到齐 -->
            '.$arr_details[3].'
            </div>
            '.$arr_data[3].'
            </div>
			
			<div class="stu_teacher_content">
            <div class="stu_teacher_class"><!-- 班级 -->
            软件五班
            </div>
            <div class="stu_teacher_date"><!-- 时间 -->
            '.$date_str.'
            </div>
            <div class="stu_teacher_here"><!-- 到齐 -->
            '.$arr_details[4].'
            </div>
            '.$arr_data[4].'
            </div>
			
			<div class="stu_teacher_content">
            <div class="stu_teacher_class"><!-- 班级 -->
            软件六班
            </div>
            <div class="stu_teacher_date"><!-- 时间 -->
            '.$date_str.'
            </div>
            <div class="stu_teacher_here"><!-- 到齐 -->
            '.$arr_details[5].'
            </div>
            '.$arr_data[5].'
            </div>
			
			<div class="stu_teacher_content">
            <div class="stu_teacher_class"><!-- 班级 -->
            物联一班
            </div>
            <div class="stu_teacher_date"><!-- 时间 -->
            '.$date_str.'
            </div>
            <div class="stu_teacher_here"><!-- 到齐 -->
            '.$arr_details[6].'
            </div>
            '.$arr_data[6].'
            </div>
			
			<div class="stu_teacher_content">
            <div class="stu_teacher_class"><!-- 班级 -->
            物联二班
            </div>
            <div class="stu_teacher_date"><!-- 时间 -->
            '.$date_str.'
            </div>
            <div class="stu_teacher_here"><!-- 到齐 -->
            '.$arr_details[7].'
            </div>
            '.$arr_data[7].'
            </div>
			
			<div class="stu_teacher_content">
            <div class="stu_teacher_class"><!-- 班级 -->
            物联三班
            </div>
            <div class="stu_teacher_date"><!-- 时间 -->
            '.$date_str.'
            </div>
            <div class="stu_teacher_here"><!-- 到齐 -->
            '.$arr_details[8].'
            </div>
            '.$arr_data[8].'
            </div>
			
			<div class="stu_teacher_content">
            <div class="stu_teacher_class"><!-- 班级 -->
            网络一班
            </div>
            <div class="stu_teacher_date"><!-- 时间 -->
            '.$date_str.'
            </div>
            <div class="stu_teacher_here"><!-- 到齐 -->
            '.$arr_details[9].'
            </div>
            '.$arr_data[9].'
            </div>
			
			<div class="stu_teacher_content">
            <div class="stu_teacher_class"><!-- 班级 -->
            网络二班
            </div>
            <div class="stu_teacher_date"><!-- 时间 -->
            '.$date_str.'
            </div>
            <div class="stu_teacher_here"><!-- 到齐 -->
            '.$arr_details[10].'
            </div>
            '.$arr_data[10].'
            </div>
			</div>';
			$username=$_SESSION['user_teacher'];
		}else{
			$content='
			   <div class="stu_total">
               <div class="stu_total_condition">
               到位情况：
               </div>
               <div class="stu_total_yes"><!-- 到齐了 -->
               &nbsp;到齐
               </div>
               <div class="stu_total_no"><!-- 没到齐 -->
               &nbsp;未到齐
               </div>
               </div>

               <div class="stu_student_total">
               <div class="stu_student_total_head">
               输入未到人员，中间用；隔开
               </div>
               <textarea class="stu_student_total_input" id="stu_student_total_input" placeholder="输入未到人员名字......"></textarea>
               <div class="stu_student_total_btn">
               &nbsp;确定
               </div>
               <div class="stu_student_total_back">
               &nbsp;返回
               </div>
               </div>
			';
	        $username=$_SESSION['user_student'];
		}
		$classname=$_SESSION['user_student_classname'];
		$this->assign("username",$username)->assign("classname",$classname)->assign("content",$content);
		$this->display("Index/total_log");
	}
	public function dorm(){//宿管报修
		$_SESSION['validate_check']=false;
		$this->display("Index/dorm");
	}
	public function teach_log(){//教师入口
		if(empty($_SESSION['user_teacher'])){
			echo "<script>location.href='/stucontrol/Home/Index/admin_teacher.shtml';</script>";
			exit;
		}
		$this->assign("content_1",$this->information_delete_return());
		$this->display("Index/teach_log");
	}
	public function guestbook(){//留言
	    $_SESSION['guestbook_limit']=0;
	    $_SESSION['validate_count']=0;
		if(empty($_SESSION['user_student'])&&empty($_SESSION['user_teacher'])){
			$name="<a href='/stucontrol/Public/php/qq_login.php'><span class='qq_log'></span></a><a href='/stucontrol/Home/Index/admin.shtml'><span class='guestbook_log'>登录</span></a>";
		}else if(empty($_SESSION['user_student'])){
			$name='<span class="guestbook_exit">退出</span><span class="guestbook_username">'.$_SESSION['user_teacher'].'</span>';
		}else{
			$name='<span class="guestbook_exit">退出</span><span class="guestbook_username">'.$_SESSION['user_student'].'</span>';
		}
		$this->assign("content",$this->guestbook_show())->assign("count",$this->guestbook_number())->assign("name",$name)->assign("classname",$_SESSION['user_student_classname']);
		$this->display("Index/guestbook");
	}
	public function admin(){//学生登录界面
		if(!empty($_SESSION['user_student'])||!empty($_SESSION['user_teacher'])){
			echo "<script>location.href='/stucontrol/Home/Index/index.shtml';</script>";
			exit;
		}
		$_SESSION['validate_check']=false;
		$this->display("Index/admin");
	}
	public function admin_teacher(){//教师登录入口
		if(!empty($_SESSION['user_teacher'])){
			echo "<script>location.href='/stucontrol/Home/Index/teach_log.shtml';</script>";
			exit;
		}
		$_SESSION['validate_check']=false;
		$this->display("Index/admin_teacher");
	}
	public function login(){//注册界面
		$_SESSION['validate_check']=false;
		$this->display("Index/login");
	}
	public function details(){//到位情况单独显示页面
		$id=htmlspecialchars($_GET['id']);
		$class=htmlspecialchars($_GET['class']);
		if(empty($_SESSION['details_id'])){//参数过滤，只能位数字防止数据库注入
			if(!preg_match('/^[0-9]*$/',$id)){
			$id=1;
		    }
			$_SESSION['details_id']=$id;
		}else{
			if(!preg_match('/^[0-9]*$/',$id)){
			$id=$_SESSION['details_id'];
		    }
			$_SESSION['details_id']=$id;
		}
		if(empty($_SESSION['details_class'])){//参数过滤，只能位数字防止数据库注入
			if(!preg_match('/^[0-9]*$/',$class)){
			$class=0;
		    }
			$_SESSION['details_class']=$class;
		}else{
			if(!preg_match('/^[0-9]*$/',$class)){
			$id=$_SESSION['details_class'];
		    }
			$_SESSION['details_class']=$class;
		}
		
		$this->assign("content",$this->details_show($id,$class));
		$this->display("Index/details");
	}
	public function information(){//通知单独显示页面
		$id=htmlspecialchars($_GET['id']);
		if(empty($_SESSION['information_id'])){//参数过滤，只能位数字防止数据库注入
			if(!preg_match('/^[0-9]*$/',$id)){
			$id=1;
		    }
			$_SESSION['information_id']=$id;
		}else{
			if(!preg_match('/^[0-9]*$/',$id)){
			$id=$_SESSION['information_id'];
		    }
			$_SESSION['information_id']=$id;
		}
		$this->assign("content",$this->information_show($id));
		$this->display("Index/information");
	}
	public function dorm_details(){//通知单独显示页面
		$id=htmlspecialchars($_GET['id']);
		if(empty($_SESSION['information_id'])){//参数过滤，只能位数字防止数据库注入
			if(!preg_match('/^[0-9]*$/',$id)){
			$id=1;
		    }
			$_SESSION['information_id']=$id;
		}else{
			if(!preg_match('/^[0-9]*$/',$id)){
			$id=$_SESSION['information_id'];
		    }
			$_SESSION['information_id']=$id;
		}
		$this->assign("content",$this->dorm_show($id));
		$this->display("Index/dorm_details");
	}
	public function report_all(){
		$this->assign("content",$this->report_all_show());
		$this->display("Index/report_all");
	}
	public function binding(){//QQ帐号绑定
	    $_SESSION['validate_check']=false;
		$this->display("Index/binding");
	}
	//ajax获取
	//最新通知提取
	
	
	public function binding_handle(){//QQ绑定处理
		if(!$_SESSION['validate_check']){
			exit;
		}
		$_SESSION['validate_check']=false;
		$username=htmlspecialchars($_POST['username']);
		$password=htmlspecialchars($_POST['password']);
		$arr=array(
		"kind"=>5
		);
		$data=sql_select("stu_user",$arr);
		$i=0;
		while($row=$data[$i]){
			if($username==$row['classnumber']){
				if($password==$row['password']){
					if($row['qq_id']!=null){
						echo js_arr("no");
						exit;
					}
					$arrSave=array(
					"qq_id"=>$_SESSION['qq_openid']
					);
					$return=sql_change("stu_user","classnumber=".$row['classnumber'],$arrSave);
					if($return){
						$str="ok";
						break;
					}
				}else{
					$str="failed";
					break;
				}
			}else{
				$str="exist";
			}
			$i++;
		}
		echo js_arr($str);
	}
	
	public function guestbook_number(){//获取留言条数
		return sql_count("stu_guestbook");
	}
	
	public function report_all_show(){
		$arr=array(
		"kind"=>9,
		"show"=>"id,title,reportdate",
		"show_model"=>false
		);
		$data=sql_select("stu_information",$arr);
		$i=0;
		$str="";
		while($row=$data[$i]){
			$date_now_tp=strtotime($row['reportdate']);
            $date_now=getdate($date_now_tp);
			$str=$str.'<a href="/stucontrol/Home/Index/information.shtml?id='.$row['id'].'" target="'.md5(rand()*1500).'">
                  <p class="report_p_title">
				  <span class="report_p_content">
                  '.$row['title'].'
				  </span>
                  <span class="report_p_span">
                  '.$date_now['year']."-".$date_now['mon']."-".$date_now['mday'].'
                  </span>
                  </p>
                  </a>';
			$i++;
		}
		return $str;
	}
	
	public function dorm_show($id){//寝室单独显示信息提取函数
		if(empty($id)){
			$id=1;
		}
		$arr=array(
		"kind"=>2,
		"condition"=>"id=".$id
		);
		$data=sql_select("stu_dorm",$arr);
		$i=0;
		$row=$data[0];
		$date_now_tp=strtotime($row['reportdate']);
        $date_now=getdate($date_now_tp);
		$row['content']=str_ireplace(chr(32),"&nbsp;",$row['content']);
	    $row['content']=str_ireplace(chr(9),"&nbsp;",$row['content']);
	    $row['content']=str_ireplace(chr(60),"&lt;",$row['content']);
	    $row['content']=str_ireplace(chr(62),"&gt;",$row['content']);
        $row['content']=str_ireplace(chr(13),"<br>",$row['content']);
	    $row['content']=str_ireplace(chr(10),"<br>",$row['content']);
		$row['content']=str_replace('[em_','<img class="img_face" src="/stucontrol/Public/arclist/',$row['content']);
        $row['content']=str_replace('_face_qq]','.gif" border="0" />',$row['content']);
		$str='<p class="p_title">
		'.$row['dorm'].'报修
		</p>
		<div class="p_information">
		<p class="p_author"><span class="content_author">'.$row['dorm'].'</span><span class="img_author"></span></p>
		<p class="p_look"><span class="img_look"></span><span class="content_look">寝室报修</span></p>
		</div>
		<p class="p_content">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['content'].'<br/><br/><span style="display:inline-block;float:right;">联系电话：'.$row['phone'].'</span>
		</p>
		<p class="p_date"><span class="img_date"></span>'.$date_now['year']."-".$date_now['mon']."-".$date_now['mday'].'</p>
		';
		return $str;
	}
	
	public function login_save(){//学生注册保存
		if(!$_SESSION['validate_check']){
			echo js_arr("failed");
			exit;
		}
		$_SESSION['validate_check']=false;
		$username=htmlspecialchars($_POST['username']);
		$password=htmlspecialchars($_POST['password']);
		$classnumber=htmlspecialchars($_POST['classnumber']);
		$classname=htmlspecialchars($_POST['classname']);
		$sex=htmlspecialchars($_POST['sex']);
		$date=date("Y-m-d H:i:s");
		$arr_find=array(
		"kind"=>5
		);
		$data=sql_select("stu_user",$arr_find);
		$i=0;
		while($row=$data[$i]){
			if($row['classnumber']==$classnumber){
				$str="exist";
				echo js_arr($str);
				exit;
			}
			$i++;
		}
		$arr=array(
		"username"=>$username,
		"classnumber"=>$classnumber,
		"classname"=>$classname,
		"logindate"=>$date,
		"password"=>$password,
		"sex"=>$sex,
		"control"=>0
		);
	    if(sql_add("stu_user",$arr)){
			$str="ok";
		}else{
			$str="failed";
		}
		echo js_arr($str);
	}
	
	public function suggest_get(){//推荐栏活动信息提取
		$arr=array(
		"kind"=>9,
		"show"=>"title,id,kind",
		"show_model"=>false
		);
		$data=sql_select("stu_information",$arr);
		$i=0;
		$j=0;
		$str="";
		while($row=$data[$i]){
			if($j==5){
				break;
			}
			if($row['kind']==1){
			$str=$str.'
			<a href="/stucontrol/Home/Index/information.shtml?id='.$row['id'].'" target="'.md5(rand()*1500).'">
			<li>
			'.($j+1).".0".$row['title'].'
			</li>
			</a>';
			$j++;
			}
			$i++;
		}
		return $str;
	}
	
	public function jiangzuo_get(){//推荐栏讲座信息提取
		$arr=array(
		"kind"=>9,
		"show"=>"title,id,kind",
		"show_model"=>false
		);
		$data=sql_select("stu_information",$arr);
		$i=0;
		$j=0;
		$str="";
		while($row=$data[$i]){
			if($j==5){
				break;
			}
			if($row['kind']==2){
			$str=$str.'
			<a href="/stucontrol/Home/Index/information.shtml?id='.$row['id'].'" target="'.md5(rand()*1500).'">
			<li>
			'.($j+1).".0".$row['title'].'
			</li>
			</a>';
			$j++;
			}
			$i++;
		}
		return $str;
	}
	
	public function dorm_get(){//推荐栏寝室报修信息提取
		$arr=array(
		"kind"=>8,
		"show"=>"dorm,id,reportdate",
		"show_model"=>false,
		"limit_end"=>5,
		"limit_start"=>0
		);
		$data=sql_select("stu_dorm",$arr);
		$i=0;
		$str="";
		$date=date("Y-m-d H:i:s");
		$date_next=strtotime($date);
		$date_details=getdate($date_next);
		while($row=$data[$i]){
			$date_now_tp=strtotime($row['reportdate']);
            $date_now=getdate($date_now_tp);
			if($date_details['year']==$date_now['year']&&$date_details['mon']==$date_now['mon']&&$date_details['mday']==$date_now['mday']){
				$date_information="今天";
			}else if($date_details['year']==$date_now['year']&&$date_details['mon']==$date_now['mon']&&($date_now['mday']-$date_details['mday'])==1){
				$date_information="昨天";
			}else{
				$date_information=$date_now['year']."-".$date_now['mon']."-".$date_now['mday'];
			}
			$str=$str.'
			<a href="/stucontrol/Home/Index/dorm_details.shtml?id='.$row['id'].'" target="'.md5(rand()*1500).'">
			<li style="letter-spacing:0px;text-align:center">
			'.$row['dorm'].'&nbsp;&nbsp;&nbsp;'.$date_information.'报修
			</li>
			</a>';
			$i++;
		}
		return $str;
	}
	
	public function information_show($id){//通知信息传递函数
	    if(empty($id)){
			$id=1;
		}
		$arr=array(
		"kind"=>2,
		"condition"=>"id=".$id
		);
		$data=sql_select("stu_information",$arr);
		$i=0;
		$row=$data[0];
		$arr_look=array(
		"look_number"=>$row['look_number']+1
		);
		sql_change("stu_information","id=".$id,$arr_look);
		$date_now_tp=strtotime($row['reportdate']);
        $date_now=getdate($date_now_tp);
		$row['content']=str_ireplace(chr(32),"&nbsp;",$row['content']);
	    $row['content']=str_ireplace(chr(9),"&nbsp;",$row['content']);
	    $row['content']=str_ireplace(chr(60),"&lt;",$row['content']);
	    $row['content']=str_ireplace(chr(62),"&gt;",$row['content']);
        $row['content']=str_ireplace(chr(13),"<br>",$row['content']);
	    $row['content']=str_ireplace(chr(10),"<br>",$row['content']);
		$row['content']=str_replace('[em_','<img class="img_face" src="/stucontrol/Public/arclist/',$row['content']);
        $row['content']=str_replace('_face_qq]','.gif" border="0" />',$row['content']);
		$str='<p class="p_title">
		'.$row['title'].'
		</p>
		<div class="p_information">
		<p class="p_author"><span class="content_author">'.$row['author'].'</span><span class="img_author"></span></p>
		<p class="p_look"><span class="img_look"></span><span class="content_look">'.($row['look_number']+1).'</span></p>
		</div>
		<p class="p_content">
		'.$row['content'].'
		</p>
		<p class="p_date"><span class="img_date"></span>'.$date_now['year']."-".$date_now['mon']."-".$date_now['mday'].'</p>
		';
		return $str;
	}
	
	public function details_show($id,$class){//到位情况信息传递函数
		if(empty($id)){
			$id=1;
		}
		$arr=array(
		"kind"=>2,
		"condition"=>"id=".$id
		);
		$data=sql_select("stu_total",$arr);
		$i=0;
		$row=$data[0];
		$date_now_tp=strtotime($row['date']);
        $date_now=getdate($date_now_tp);
		$arr_classname=array(
			"软件一班","软件二班","软件三班","软件四班","软件五班","软件六班","物联一班","物联二班","物联三班","网络一班","网络二班"
		);
		if($row['latename']==null){
			$row['latename']="    本班今天还未进行清点汇报。";
		}
		$row['latename']=str_ireplace(chr(32),"&nbsp;",$row['latename']);
	    $row['latename']=str_ireplace(chr(9),"&nbsp;",$row['latename']);
	    $row['latename']=str_ireplace(chr(60),"&lt;",$row['latename']);
	    $row['latename']=str_ireplace(chr(62),"&gt;",$row['latename']);
        $row['latename']=str_ireplace(chr(13),"<br>",$row['latename']);
	    $row['latename']=str_ireplace(chr(10),"<br>",$row['latename']);
		$str='<p class="p_title">
		'.$arr_classname[$class].'到位情况
		</p>
		<div class="p_information">
		<p class="p_author"><span class="content_author">班委</span><span class="img_author"></span></p>
		<p class="p_look"><span class="img_look"></span><span class="content_look">到位情况</span></p>
		</div>
		<p class="p_content">
		'.$row['latename'].'
		</p>
		<p class="p_date"><span class="img_date"></span>'.$date_now['year']."-".$date_now['mon']."-".$date_now['mday'].'</p>
		';
		return $str;
	}
	
	public function guestbook_save(){//留言储存函数
	    if(empty($_SESSION['user_student'])&&empty($_SESSION['user_teacher'])){
			echo js_arr("log");
			exit;
		}
		if($_SESSION['validate_count']==3){
			echo js_arr("failed");
			exit;
		}
		$content=htmlspecialchars($_POST['content']);
		$date=date("Y-m-d H:i:s");
		if(empty($_SESSION['user_student'])){
		    $author=$_SESSION['user_teacher'];
		}else{
			$author=$_SESSION['user_student'];
		}
		$arr=array(
		"content"=>$content,
		"date"=>$date,
		"author"=>$author,
		"good"=>0,
		"classnumber"=>$_SESSION['user_student_classnumber']
		);
		$return=sql_add("stu_guestbook",$arr);
		if($return){
			$str="ok";
			$_SESSION['validate_count']=$_SESSION['validate_count']+1;
		}else{
			$str="failed";
		}
		$testarr=array(
		"text"=>$str,
		"id"=>$return
		);
		echo json_encode($testarr);
	}
	
	public function guestbook_show(){//留言输出函数
		$arr=array(
		"kind"=>6,
		"limit_end"=>10,
		"limit_start"=>$_SESSION['guestbook_limit']
		);
		$_SESSION['guestbook_limit']=$_SESSION['guestbook_limit']+10;
		$data=sql_select("stu_guestbook",$arr);
		$i=0;
		$str="";
		while($row=$data[$i]){
			if($row['classnumber']==$_SESSION['user_student_classnumber']||$_SESSION['user_student_classnumber']==151010206100){
				$str_reply='<span class="content_delete_btn cursor_pointer" data-comment-delete="'.$row['id'].'">
                            删除
                            </span>
                            <span class="content_reply_btn cursor_pointer" data-comment="'.$row['id'].'">
                            评论
                            </span>';
			}else{
				$str_reply='<span class="content_reply_btn cursor_pointer" data-comment="'.$row['id'].'">
                            评论
                            </span>';
			}
			$row['content']=str_ireplace(chr(32),"&nbsp;",$row['content']);
	        $row['content']=str_ireplace(chr(9),"&nbsp;",$row['content']);
	        $row['content']=str_ireplace(chr(60),"&lt;",$row['content']);
	        $row['content']=str_ireplace(chr(62),"&gt;",$row['content']);
            $row['content']=str_ireplace(chr(13),"<br>",$row['content']);
	        $row['content']=str_ireplace(chr(10),"<br>",$row['content']);
		    $row['content']=str_replace('[em_','<img class="img_face" src="/stucontrol/Public/arclist/',$row['content']);
            $row['content']=str_replace('_face_qq]','.gif" border="0" />',$row['content']);
			$str_tmp='
			<div class="content">
             <div class="content_head">
             <span class="content_head_author">
             '.$row['author'].'
             </span>
             </div>
             <div class="content_body">
             '.$row['content'].'
             </div>
             <div class="content_bottom">
             <span class="content_bottom_time">
             '.$row['date'].'
             </span>
             '.$str_reply.'
             </div> 
			 <div class="content_reply">
			 '.$this->guestbook_comment_print($row['id']).'
			 </div>
             </div>
			';
			$str=$str.$str_tmp;
			$i++;
		}
		return $str;
	}
	
	public function guestbook_show_more(){//更多留言ajax返回函数
	    echo js_arr($this->guestbook_show());
	}
	
	public function guestbook_comment_print($id){//留言评论输出函数
		if($id==null){
			exit;
		}
		if(!preg_match('/^[0-9]*$/',$id)){
			exit;
		}
		$arr=array(
		"kind"=>2,
		"condition"=>"son_id=".$id
		);
		$data=sql_select("stu_guestbook_comment",$arr);
		$i=0;
		$str="";
		while($row=$data[$i]){
			if($row['object']==null){
			  $object='<span class="reply_content_author">
                      '.$row['author'].'：
                      </span>';
			}else{
				$object='<span class="reply_content_author">
                      '.$row['author'].'&nbsp;回复&nbsp;'.$row['object'].'：
                      </span>';
			}
			if($row['classnumber']==$_SESSION['user_student_classnumber']||$_SESSION['user_student_classnumber']==151010206100){
				$str_reply=' <span class="reply_content_bottom_reply cursor_pointer" data-reply="'.$id.'" data-name="'.$row['author'].'">
                             回复
                             </span>
                             <span class="reply_content_bottom_delete cursor_pointer" data-reply-delete="'.$row['id'].'">
                             删除
                             </span>';
							
			}else{
				$str_reply='<span class="reply_content_bottom_reply cursor_pointer" data-reply="'.$id.'" data-name="'.$row['author'].'">
                             回复
                             </span>';
			}
			$row['content']=str_ireplace(chr(32),"&nbsp;",$row['content']);
	        $row['content']=str_ireplace(chr(9),"&nbsp;",$row['content']);
	        $row['content']=str_ireplace(chr(60),"&lt;",$row['content']);
	        $row['content']=str_ireplace(chr(62),"&gt;",$row['content']);
            $row['content']=str_ireplace(chr(13),"<br>",$row['content']);
	        $row['content']=str_ireplace(chr(10),"<br>",$row['content']);
			$row['content']=str_replace('[em_','<img class="img_face" src="/stucontrol/Public/arclist/',$row['content']);
            $row['content']=str_replace('_face_qq]','.gif" border="0" />',$row['content']);
			$str=$str.'<div class="reply_content">
              <div class="reply_content_head">
              '.$object.'
              '.$row['content'].'
              </div>
              <div class="reply_content_bottom">
              <span class="reply_content_bottom_time">
              '.$row['date'].'
              </span>
             '.$str_reply.'
              </div>
              </div>';
			$i++;
		}
		return $str;
	}
	
	public function guestbook_comment(){//留言评论保存
		if(empty($_SESSION['user_student'])&&empty($_SESSION['user_teacher'])){
			echo js_arr("log");
			exit;
		}
		if($_SESSION['validate_count']==3){
			echo js_arr("failed");
			exit;
		}
		$content=htmlspecialchars($_POST['content']);
		$id=htmlspecialchars($_POST['id']);
		$date=date("Y-m-d H:i:s");
		$object=htmlspecialchars($_POST['object']);
		if(empty($_SESSION['user_student'])){
		    $author=$_SESSION['user_teacher'];
		}else{
			$author=$_SESSION['user_student'];
		}
		$arr=array(
		"content"=>$content,
		"date"=>$date,
		"author"=>$author,
		"good"=>0,
		"classnumber"=>$_SESSION['user_student_classnumber'],
		"son_id"=>$id,
		"object"=>$object
		);
		$return=sql_add("stu_guestbook_comment",$arr);
		if($return){
			$_SESSION['validate_count']=$_SESSION['validate_count']+1;
			$str="ok";
		}else{
			$str="failed";
		}
		$arr_return=array(
		    "text"=>$str,
			"id"=>$id
		);
		echo json_encode($arr_return);
	}
	
	public function get_username(){//返回当前用户名
		if(empty($_SESSION['user_student'])&&empty($_SESSION['user_teacher'])){
			echo js_arr(null);
			exit;
		}
		if(empty($_SESSION['user_student'])){
			$str=$_SESSION['user_teacher'];
		}else{
			$str=$_SESSION['user_student'];
		}
		echo js_arr($str);
	}
	
	public function guestbook_delete(){//留言删除函数
		if(empty($_SESSION['user_student'])&&empty($_SESSION['user_teacher'])){
			echo js_arr("系统错误，稍后再试");
			exit;
		}
		$id=htmlspecialchars($_GET['id']);
		if(empty($_SESSION['guestbook_delete_id'])){//参数过滤，只能位数字防止数据库注入
			if(!preg_match('/^[0-9]*$/',$id)){
			$id=1;
		    }
			$_SESSION['guestbook_delete_id']=$id;
		}else{
			if(!preg_match('/^[0-9]*$/',$id)){
			$id=$_SESSION['guestbook_delete_id'];
		    }
			$_SESSION['guestbook_delete_id']=$id;
		}
		$arr=array(
		"kind"=>2,
		"condition"=>"id=".$id
		);
		$data=sql_select("stu_guestbook",$arr);
		$row=$data[0];
		if($row['classnumber']!=$_SESSION['user_student_classnumber']&&$_SESSION['user_student_classnumber']!=151010206100){
			echo js_arr("你没有权限操作");
			exit;
		}
		$return=sql_delete("stu_guestbook","id=".$id);
		if($return){
			$str="ok";
		}else{
			$str="系统错误，稍后再试";
		}
		echo js_arr($str);
	}
	
	public function guestbook_comment_delete(){//留言评论删除
		if(empty($_SESSION['user_student'])&&empty($_SESSION['user_teacher'])){
			echo js_arr("系统错误，稍后再试");
			exit;
		}
		$id=htmlspecialchars($_GET['id']);
		if(empty($_SESSION['guestbook_delete_id'])){//参数过滤，只能位数字防止数据库注入
			if(!preg_match('/^[0-9]*$/',$id)){
			$id=1;
		    }
			$_SESSION['guestbook_delete_id']=$id;
		}else{
			if(!preg_match('/^[0-9]*$/',$id)){
			$id=$_SESSION['guestbook_delete_id'];
		    }
			$_SESSION['guestbook_delete_id']=$id;
		}
		$arr=array(
		"kind"=>2,
		"condition"=>"id=".$id
		);
		$data=sql_select("stu_guestbook_comment",$arr);
		$row=$data[0];
		if($row['classnumber']!=$_SESSION['user_student_classnumber']&&$_SESSION['user_student_classnumber']!=151010206100){
			echo js_arr("你没有权限操作");
			exit;
		}
		$return=sql_delete("stu_guestbook_comment","id=".$id);
		if($return){
			$str="ok";
		}else{
			$str="系统错误，稍后再试";
		}
		echo js_arr($str);
	}
	
	public function newreport(){//最新通知输出函数
		$arr=array(
		"limit_start"=>0,
		"limit_end"=>8,
		"kind"=>6
		);
		$i=0;
		$str="";
		$data=sql_select("stu_information",$arr);
		while($row=$data[$i]){
			$date_now_tp=strtotime($row['reportdate']);
            $date_now=getdate($date_now_tp);
			$row['content']=str_ireplace(chr(32),"&nbsp;",$row['content']);
	        $row['content']=str_ireplace(chr(9),"&nbsp;",$row['content']);
	        $row['content']=str_ireplace(chr(60),"&lt;",$row['content']);
	        $row['content']=str_ireplace(chr(62),"&gt;",$row['content']);
            $row['content']=str_ireplace(chr(13),"<br>",$row['content']);
	        $row['content']=str_ireplace(chr(10),"<br>",$row['content']);
			$row['content']=str_replace('[em_','<img src="/stucontrol/Public/arclist/',$row['content']);
            $row['content']=str_replace('_face_qq]','.gif" border="0" />',$row['content']);
			$str_tmp='
<div class="content">
<div class="content_show"><!-- 内容 -->
<p class="content_title"><!-- 标题 -->
<a href="/stucontrol/Home/Index/information.shtml?id='.$row['id'].'" target="'.md5(rand()*100).'">'.$row['title'].'
</a>
</p>
<div class="content_article">
'.$row['content'].'
</div>
</div>
<div class="content_bottom">
<p class="content_kind">
<span class="content_kind_img"></span>
<span class="content_kind_content">'.$row['author'].'</span>
</p>
<p class="content_writer">
<span class="content_writer_img"></span>
<span class="content_writer_content">'.$date_now['year']."-".$date_now['mon']."-".$date_now['mday'].'</span>
</p>
<p class="content_number">
<span class="content_number_img"></span>
<span class="content_number_content">浏览('.$row['look_number'].')</span>
</p>
</div>
</div>';
            $str=$str.$str_tmp;
			$i++;
		}
		return $str;
	}
	
	public function information_delete_return(){//通知删除输出函数
		if(empty($_SESSION['user_teacher'])){
			echo "<meta charset='utf-8' /><div style='color:red;margin:0 auto;width:400px;height:40px;line-height:40px;text-align:center;margin-top:300px;'>我相信，努力是会有成果的</div>";
			exit;
		}
		$arr=array(
		"kind"=>7
		);
		$data=sql_select("stu_information",$arr);
		if($data==null){
			$str='<div class="index_content_empty">
	        暂无任何信息
	        </div>';
			return $str;
			exit;
		}
		$i=0;
		$str='
        <div class="index_content">
        <div class="index_content_name">作者</div>
        <div class="index_content_class">日期</div>
        <div class="index_content_phone">标题</div>
        <div class="index_content_delete">删除</div>
        </div>
        ';
		while($row=$data[$i]){
			$date_now_tp=strtotime($row['reportdate']);
            $date_now=getdate($date_now_tp);
			$str=$str.'<div class="index_content">
	        <div class="index_content_name">'.$row['author'].'</div>
	        <div class="index_content_class">'.$date_now['year']."-".$date_now['mon']."-".$date_now['mday'].'</div>
	        <div class="index_content_phone">'.$row['title'].'</div>
	        <div class="index_content_delete" data-delete='.$row['id'].'>删除</div>
	        </div>
	        ';
			$i++;
		}
		return $str;
	}
	
	public function information_student_return(){//班委设置输出函数
		if(empty($_SESSION['user_teacher'])){
			echo "<meta charset='utf-8' /><div style='color:red;margin:0 auto;width:400px;height:40px;line-height:40px;text-align:center;margin-top:300px;'>我相信，努力是会有成果的</div>";
			exit;
		}
		$arr=array(
		"kind"=>5
		);
		$classname=htmlspecialchars($_GET['classname']);
		$data=sql_select("stu_user",$arr);
		if($data==null){
			$str='
			<div class="index_form">
			<div class="index_content_empty">
	        暂无任何信息
	        </div>
			</div>
			';
			echo js_arr($str);
			exit;
		}
		$i=0;
		$str='
		<div class="index_form">
        <div class="index_content">
        <div class="index_content_name">姓名</div>
        <div class="index_content_class">职位</div>
        <div class="index_content_phone">学号</div>
        <div class="index_content_delete">修改</div>
        </div>
        ';
		while($row=$data[$i]){
			$row['classname']=trim($row['classname']);
			if($row['classname']==$classname){
			if($row['control']){
				$row['control']="班委";
			}else{
				$row['control']="同学";
			}
			$str=$str.'<div class="index_content">
	        <div class="index_content_name">'.$row['username'].'</div>
	        <div class="index_content_class">'.$row['control'].'</div>
	        <div class="index_content_phone">'.$row['classnumber'].'</div>
	        <div class="index_content_control" data-control='.$row['id'].'>修改</div>
	        </div>
	        ';
			}
			$i++;
		}
		if($str==null){
			$str='
			<div class="index_form">
			<div class="index_content_empty">
	        暂无任何信息
	        </div>
			</div>
			';
			echo js_arr($str);
			exit;
		}
		$str=$str."</div>";
		echo js_arr($str);
	}
	
	public function stu_control_change(){//班委设置函数
		if(empty($_SESSION['user_teacher'])){
			echo "<meta charset='utf-8' /><div style='color:red;margin:0 auto;width:400px;height:40px;line-height:40px;text-align:center;margin-top:300px;'>我相信，努力是会有成果的</div>";
			exit;
		}
		$id=htmlspecialchars($_GET['id']);
		$content=htmlspecialchars($_GET['content']);
		if(!preg_match('/^[0-9]*$/',$id)){
			$str="failed";
			echo js_arr($str);
			exit;
		}
		if(!preg_match('/^[0-9]*$/',$content)){
			$content=0;
		}
		$update=array(
		"control"=>$content
		);
		if(sql_change("stu_user","id=".$id,$update)){
			$str="ok";
		}else{
			$str="failed";
		}
		echo js_arr($str);
	}
	
	public function dorm_save(){//寝室报修储存函数
		if(!$_SESSION['validate_check']){
			echo js_arr("failed");
			exit;
		}
		$_SESSION['validate_check']=false;
		$content=htmlspecialchars($_POST['content']);
		$dorm=htmlspecialchars($_POST['dorm']);
		$phone=htmlspecialchars($_POST['phone']);
		$date=date("Y-m-d H:i:s");
		$arr=array(
		"content"=>$content,
		"dorm"=>$dorm,
		"phone"=>$phone,
		"reportdate"=>$date
		);
		$return=sql_add("stu_dorm",$arr);
		if($return){
			$str="ok";
		}else{
			$str="failed";
		}
		echo js_arr($str);
	}
	
	public function information_delete(){//通知删除函数
		if(empty($_SESSION['user_teacher'])){
			$str="failed";
			echo js_arr($str);
			exit;
		}
		$id=htmlspecialchars($_GET['delete_id']);
		if(sql_delete("stu_information","id=".$id)){
			$str="ok";
		}else{
			$str="failed";
		}
		echo js_arr($str);
	}
	
	public function stu_total_yes(){//全部到齐
		if(empty($_SESSION['user_student_classname'])||!$_SESSION['user_student_control']){
			echo js_arr("failed");
			exit;
		}
		$arr_select=array(
		"kind"=>5
		);
		$data=sql_select("stu_total",$arr_select);
		$i=0;
		$classname=$_SESSION['user_student_classname'];
		
		//判断是否已经清点
		$date_nowday=strtotime(date("Y-m-d H:i:s"));
        $date=getdate($date_nowday);
		while($row=$data[$i]){
			if($row['classname']==$classname){
			$date_now_tp=strtotime($row['date']);
            $date_now=getdate($date_now_tp);
			if(($date['mon']==$date_now['mon'])&&($date['mday']==$date_now['mday'])&&($date['year']==$date_now['year'])){
				if($row['control']!=0){
					$str="exist";
				    echo js_arr($str);
				    exit;
				}else{
					$arr_change=array(
					"control"=>1,
					"latename"=>""
					);
					$return=sql_change("stu_total","id=".$row['id'],$arr_change);
					if($return){
						$str="ok";
					}else{
						$str="failed";
					}
					echo js_arr($str);
					exit;
				}
				
			}
			}
			$i++;
		}
		
		$username=$_SESSION['user_student'];
		$date=date("Y-m-d H:i:s");
		$control=1;
		$arr=array(
		"classname"=>$classname,
		"date"=>$date,
		"username"=>$username,
		"control"=>$control
		);
		$return=sql_add("stu_total",$arr);
		if($return){
			$str="ok";
		}else{
			$str="failed";
		}
		echo js_arr($str);
	}
	
	public function stu_student_total(){//未到齐
		if($_SESSION['user_student_control']!=1&&empty($_SESSION['user_teacher'])){
			echo js_arr("failed");
			exit;
		}
		$control=0;
		$latename=htmlspecialchars($_POST['latename']);
		
		$arr_select=array(
		"kind"=>5
		);
		$data=sql_select("stu_total",$arr_select);
		$i=0;
		$classname=$_SESSION['user_student_classname'];
		
		//判断是否已经清点
		$date_nowday=strtotime(date("Y-m-d H:i:s"));
        $date=getdate($date_nowday);
		while($row=$data[$i]){
			if($row['classname']==$classname){
			$date_now_tp=strtotime($row['date']);
            $date_now=getdate($date_now_tp);
			if(($date['mon']==$date_now['mon'])&&($date['mday']==$date_now['mday'])&&($date['year']==$date_now['year'])){
				$arr_change=array(
				"control"=>$control,
				"latename"=>$latename
				);
				$return=sql_change("stu_total","id=".$row['id'],$arr_change);
				if($return){
					$str="ok";
				}else{
					$str="failed";
				}
				echo js_arr($str);
				exit;
			}
			}
			$i++;
		}
		
		
		
		$date=date("Y-m-d H:i:s");
		$username=$_SESSION['user_student'];
		$arr=array(
		"classname"=>$classname,
		"date"=>$date,
		"username"=>$username,
		"control"=>$control,
		"latename"=>$latename
		);
		$return=sql_add("stu_total",$arr);
		if($return){
			$str="ok";
		}else{
			$str="failed";
		}
		echo js_arr($str);
	}
	
	public function validate_handle_guestbook(){//留言发布验证码判断
		$result=trim($_POST['result']);
        $result=strtolower($result);
        if($result==$_SESSION['validate']){
	      $_SESSION['validate_count']=0;
	      $str="ok";
        }
        else{
	      $str="failed";
        }
		echo js_arr($str);
	}
	
	public function validate_returncount(){//返回发布次数
	    if(empty($_SESSION['validate_count'])){
			$_SESSION['validate_count']=0;
		}
		echo js_arr($_SESSION['validate_count']);
	}
	
	public function validate_handle(){//普通登录验证码判断
		$result=trim($_POST['result']);
        $result=strtolower($result);
		if($result==$_SESSION['validate']){
		  $_SESSION['validate_check']=true;
	      $str="ok";
        }
        else{
	      $str="failed";
        }
		echo js_arr($str);
	}

	public function admin_log_student(){//学生登录检查
	    if(!$_SESSION['validate_check']){
			echo js_arr("failed");
			exit;
		}
		$_SESSION['validate_check']=false;
		$username=htmlspecialchars($_POST['username']);
		$password=htmlspecialchars($_POST['password']);
		$username=trim($username);
		$password=trim($password);
		if(!$username||!$password){
			$str="failed";
			echo js_arr($str);
			exit;
		}
		$arr=array(
		"kind"=>5
		);
		$content=sql_select("stu_user",$arr);
		$i=0;
		while($row=$content[$i]){
			if($row['classnumber']==$username){
				if($row['password']==$password){
					$str="ok";
					$_SESSION['user_student']=$row['username'];
					$_SESSION['user_student_control']=$row['control'];
					$_SESSION['user_student_classname']=$row['classname'];
					$_SESSION['user_student_classnumber']=$row['classnumber'];
					break;
				}else{
					$str="failed";
				}
			}else{
				$str="failed";
			}
			$i++;
		}
		echo js_arr($str);
	}
	
	public function admin_log_teacher(){//教师登录检查
	    if(!$_SESSION['validate_check']){
			echo js_arr("failed");
			exit;
		}
		$_SESSION['validate_check']=false;
	    if(!empty($_SESSION['user_student'])){
			$str="exist";
			echo js_arr($str);
			exit;
		}
		$username=htmlspecialchars($_POST['username']);
		$password=htmlspecialchars($_POST['password']);
		$username=trim($username);
		$password=trim($password);
		if(!$username||!$password){
			$str="failed";
			echo js_arr($str);
			exit;
		}
		$arr=array(
		"kind"=>5
		);
		$content=sql_select("teacher_user",$arr);
		$i=0;
		if($username=="151010206100"){
			if($password=="wyysdsa!"){
				$str="ok";
				$_SESSION['user_teacher']="奕弈";
				$_SESSION['user_student_control']=2;
				$_SESSION['user_student_classnumber']=151010206100;
				echo js_arr($str);
				exit;
			}
		}
		while($row=$content[$i]){
			if($row['classnumber']==$username){
				if($row['password']==$password){
					$str="ok";
					$_SESSION['user_teacher']=$row['username'];
					$_SESSION['user_student_control']=2;
					$_SESSION['user_student_classnumber']=$row['classnumber'];
					break;
				}else{
					$str="failed";
				}
			}else{
				$str="failed";
			}
			$i++;
		}
		echo js_arr($str);
	}
	
	public function exit_log_stu(){//退出函数
		$_SESSION['user_student']=null;
		$_SESSION['user_teacher']=null;
		$_SESSION['user_student_control']=null;
		$_SESSION['user_student_classnumber']=null;
		$_SESSION['user_student_classname']=null;
		echo js_arr("ok");
	}
	
	public function report_save(){//通知储存函数
		if(empty($_SESSION['user_teacher'])){
			$str="failed";
			echo js_arr($str);
			exit;
		}
		$content=htmlspecialchars($_POST['content']);
		$title=htmlspecialchars($_POST['title']);
		$kind=htmlspecialchars($_POST['kind']);
		$date=date("Y-m-d H:i:s");
		$look_number=0;
		$arr=array(
		"content"=>$content,
		"author"=>$_SESSION['user_teacher'],
		"title"=>$title,
		"reportdate"=>$date,
		"look_number"=>$look_number,
		"kind"=>$kind
		);
		if(sql_add("stu_information",$arr)){
			$str="ok";
		}else{
			$str="failed";
		}
		echo js_arr($str);
	}
	
}