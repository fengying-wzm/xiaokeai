<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {


    public function index(){
		 $this->display("admin");
    }
	//	登录
	public function login() {
		$userName = I('userName');
		$passWord = I('passWord');
		
		$user  = M('user');
		$map['username']=$userName;
		$map['password']=$passWord;
		
		$data = $user->where($map)->find();
		//$list=$user->where($map)->select();
		
		if($data==null){
			
			$Result["success"]=false;
			$Result["reMsg"]='请输入正确的账号密码';
			$this->ajaxReturn($Result);
		
		//	$this->error('请输入正确的账号密码');
		}else{
			$_SESSION['id']=$data['id'];
			
			$Result["success"]=true;
			$Result["reMsg"]='登录成功';
			$this->ajaxReturn($Result);
		
			//$this->success('登录成功', '/');
		}
		
	}
	
		
	// 退出
	public function exit_login() {
		session_destroy();
		//$this->success('退出登录', '/');
		
		
			$this->display('./Admin/login');
		
			return;
			
	}
	
    public function saveTags(){

		$tags = I('param.tags');
		$type = I('param.type');
		//先删除旧直播地址
		$Del  = M('label');
		$Del->where('type='.$type)->delete(); 

		$Label  = M('label');
		$data['tags'] = $tags;
		$data['type'] = $type;
		
		$id=$Label->data($data)->add();

		$Result["success"]=true;
		$Result["reMsg"]='';
		$this->ajaxReturn($Result);

    }

    public function sport(){
    	$Sport = M('sport');
		$map['type'] = "0";
		$totalRows=$Sport->where($map)->count();
		$this->assign('totalRows',$totalRows);



		$Label = M('label');
		$map1['type'] = "0";
		$data=$Label->where($map1)->find(); 
		$this->assign('data',$data);

				//标签库
		$Old = M("detail_tags");
		$map2['type']="0";
		$tags=$Old->where($map2)->order('count desc')->limit(100)->select(); 

		$this->assign('tags',$tags);

		$this->display("sport");
    }

    public function game(){
    	$Sport = M('sport');
		$map['type'] = "1";
		$totalRows=$Sport->where($map)->count();
		$this->assign('totalRows',$totalRows);


		$Label = M('label');
		$map1['type'] = "1";
		$data=$Label->where($map1)->find(); 
		$this->assign('data',$data);

				//标签库
		$Old = M("detail_tags");
		$map2['type']="1";
		$tags=$Old->where($map2)->order('count')->limit(100)->select(); 

		$this->assign('tags',$tags);


		 $this->display("game");
    }

    public function article(){
    	$Sport = M('article');
		$map['type'] = "0";
		$totalRows=$Sport->where($map)->count();
		$this->assign('totalRows',$totalRows);

		$Label = M('label');
		$map1['type'] = "2";
		$data=$Label->where($map1)->find(); 
		$this->assign('data',$data);

			//标签库
		$Old = M("detail_tags");
		$map2['type']="2";
		$tags=$Old->where($map2)->order('count')->limit(100)->select(); 

		$this->assign('tags',$tags);

		 $this->display("article");
    }

    public function sex(){
    	$Sport = M('article');
		$map['type'] = "1";
		$totalRows=$Sport->where($map)->count();
		$this->assign('totalRows',$totalRows);

		$Label = M('label');
		$map1['type'] = "3";
		$data=$Label->where($map1)->find(); 
		$this->assign('data',$data);
					//标签库
		$Old = M("detail_tags");
		$map2['type']="3";
		$tags=$Old->where($map2)->order('count')->limit(100)->select(); 

		$this->assign('tags',$tags);
		 $this->display("sex");
    }


    public function wechat(){
    	$Sport = M('article');
		$map['type'] = "3";
		$totalRows=$Sport->where($map)->count();
		$this->assign('totalRows',$totalRows);

		 $this->display("wechat");
    }

    public function about(){
    	$Sport = M('article');
		$map['type'] = "2";
		$totalRows=$Sport->where($map)->count();
		$this->assign('totalRows',$totalRows);

		$Label = M('label');
		$map1['type'] = "4";
		$data=$Label->where($map1)->find(); 
		$this->assign('data',$data);
		 $this->display("about");
    }



    public function sport_edit(){
		 $this->display("sport_edit");
    }

    public function sport_new(){
		 $this->display("sport_add");
    }

    public function game_edit(){
		 $this->display("game_edit");
    }

    public function game_new(){
		 $this->display("game_add");
    }



    public function sex_edit(){
		 $this->display("sex_edit");
    }

    public function sex_new(){
		 $this->display("sex_add");
    }



    public function about_edit(){
		 $this->display("about_edit");
    }

    public function about_new(){
		 $this->display("about_add");
    }


    public function article_edit(){
		 $this->display("article_edit");
    }

    public function article_new(){
		 $this->display("article_add");
    }


    public function wechat_edit(){
				if(!isset($_SESSION['id'])){
			
			$this->display('./Admin/login');
		
			return;
    		//$this->assign('jumpUrl','login');
			//$this->error('没有登录');
    	}
		
		 $this->display("wechat_edit");
    }

    public function wechat_new(){
				if(!isset($_SESSION['id'])){
			
			$this->display('./Admin/login');
		
			return;
    		//$this->assign('jumpUrl','login');
			//$this->error('没有登录');
    	}
		 $this->display("wechat_add");
    }


    public function sport_add(){
		$tags = I('param.tags');
		$title = I('param.title');
		$date = I('param.date');
		$sport_titles = I('param.sport_titles');
		$sport_urls = I('param.sport_urls');
		$titles = split(',', $sport_titles);
		$urls = split(',', $sport_urls);

		$Sport  = M('sport');
		$data['title'] = $title;
		$data['time'] = $date;

		$weekarray=array(星期日,星期一,星期二,星期三,星期四,星期五,星期六);
		$data['date'] = date('m月d日',strtotime($date));
		$data['week'] = $weekarray[date('w',strtotime($date))];
		$data['small_time'] = date('H:i',strtotime($date));

		$data['tags'] = $tags;
		$data['add_time'] = date('Y-m-d H:i:s');
		$data['type'] = '0';
		$data['status'] = '0';
		$id=$Sport->data($data)->add();
		for($i=0;$i<count($titles);$i++){
			$Url  = M('sport_url');
			$urldata['title']=$titles[$i];
			$urldata['url']=$urls[$i];
			$urldata['sport_id']=$id;
			$urlid=$Url->data($urldata)->add();
		}

		//保存标签
		$tags = split(",", $data['tags']);
		 $data['tags'] = "";
		foreach ($tags as $k=>$v) {
			$Old = M("detail_tags"); // 实例化User对象
			$wh['tags']=$v;
			$wh['type']='0';
			$su = $Old->where($wh)->setInc('count');
			if($su==false){

				$Det  = M('detail_tags');
				$data1['type'] = '0';
			    $data1['tags'] = $v;
			    $data1['count'] = 1;
			    $Det->data($data1)->add();
			}


		}


		$Result["success"]=true;
		$Result["reMsg"]='';
		$this->ajaxReturn($Result);
    }


    public function article_add(){
		$tags = I('param.tags');
		$title = I('param.title');
		$author = I('param.author');
		$content = I('param.content');

		$Sport  = M('article');
		$data['title'] = $title;
		$data['author'] = $author;
		$data['tags'] = $tags;
		$data['content'] = $content;
		$data['add_time'] = date('Y-m-d H:i:s');
		$data['type'] = '0';
		$data['status'] = '0';
		$id=$Sport->data($data)->add();
		//保存标签
		$tags = split(",", $data['tags']);
		 $data['tags'] = "";
		foreach ($tags as $k=>$v) {
			$Old = M("detail_tags"); // 实例化User对象
			$wh['tags']=$v;
			$wh['type']='2';
			$su = $Old->where($wh)->setInc('count');
			if($su==false){

				$Det  = M('detail_tags');
				$data1['type'] = '2';
			    $data1['tags'] = $v;
			    $data1['count'] = 1;
			    $Det->data($data1)->add();
			}


		}

		$Result["success"]=true;
		$Result["reMsg"]='';
		$this->ajaxReturn($Result);
    }


    public function wechat_add(){
		$title = I('param.title');
		$author = I('param.author');
		$content = I('param.content');

		$Sport  = M('article');
		$data['title'] = $title;
		$data['author'] = $author;
		$data['content'] = $content;
		$data['add_time'] = date('Y-m-d H:i:s');
		$data['type'] = '3';
		$data['status'] = '0';
		$id=$Sport->data($data)->add();

		$Result["success"]=true;
		$Result["reMsg"]='';
		$this->ajaxReturn($Result);
    }




    public function about_add(){
		$tags = I('param.tags');
		$title = I('param.title');
		$author = I('param.author');
		$content = I('param.content');

		$Sport  = M('article');
		$data['title'] = $title;
		$data['author'] = $author;
		$data['tags'] = $tags;
		$data['content'] = $content;
		$data['add_time'] = date('Y-m-d H:i:s');
		$data['type'] = '2';
		$data['status'] = '0';
		$id=$Sport->data($data)->add();

		$Result["success"]=true;
		$Result["reMsg"]='';
		$this->ajaxReturn($Result);
    }





    public function sex_add(){
		$tags = I('param.tags');
		$title = I('param.title');
		$author = I('param.author');
		$content = I('param.content');

		$Sport  = M('article');
		$data['title'] = $title;
		$data['author'] = $author;
		$data['tags'] = $tags;
		$data['content'] = $content;
		$data['add_time'] = date('Y-m-d H:i:s');
		$data['type'] = '1';
		$data['status'] = '0';
		$id=$Sport->data($data)->add();
				//保存标签
		$tags = split(",", $data['tags']);
		 $data['tags'] = "";
		foreach ($tags as $k=>$v) {
			$Old = M("detail_tags"); // 实例化User对象
			$wh['tags']=$v;
			$wh['type']='3';
			$su = $Old->where($wh)->setInc('count');
			if($su==false){

				$Det  = M('detail_tags');
				$data1['type'] = '3';
			    $data1['tags'] = $v;
			    $data1['count'] = 1;
			    $Det->data($data1)->add();
			}


		}
		$Result["success"]=true;
		$Result["reMsg"]='';
		$this->ajaxReturn($Result);
    }


    public function sport_update(){

		$id = I('param.id');
		$tags = I('param.tags');
		$title = I('param.title');
		$date = I('param.date');
		$sport_titles = I('param.sport_titles');
		$sport_urls = I('param.sport_urls');
		$titles = split(',', $sport_titles);
		$urls = split(',', $sport_urls);

		$Sport  = M('sport');
		$data['title'] = $title;
		$data['time'] = $date;

		$weekarray=array(星期日,星期一,星期二,星期三,星期四,星期五,星期六);
		$data['date'] = date('m月d日',strtotime($date));
		$data['week'] = $weekarray[date('w',strtotime($date))];
		$data['small_time'] = date('H:i',strtotime($date));

		$data['tags'] = $tags;
		//$data['add_time'] = date('Y-m-d H:i:s');
		//$data['type'] = '0';
		//$data['status'] = '0';

		$Sport->where('id='.$id)->data($data)->save();

		//先删除旧直播地址
		$Del  = M('sport_url');
		$Del->where('sport_id='.$id)->delete(); 
		//插入新直播地址
		for($i=0;$i<count($titles);$i++){
			$Url  = M('sport_url');
			$urldata['title']=$titles[$i];
			$urldata['url']=$urls[$i];
			$urldata['sport_id']=$id;
			$urlid=$Url->data($urldata)->add();
		}


				//保存标签
		$tags = split(",", $data['tags']);
		 $data['tags'] = "";
		foreach ($tags as $k=>$v) {
			$Old = M("detail_tags"); // 实例化User对象
			$wh['tags']=$v;
			$wh['type']='0';
			$su = $Old->where($wh)->setInc('count');
			if($su==false){

				$Det  = M('detail_tags');
				$data1['type'] = '0';
			    $data1['tags'] = $v;
			    $data1['count'] = 1;
			    $Det->data($data1)->add();
			}


		}


		$Result["success"]=true;
		$Result["reMsg"]='';
		$this->ajaxReturn($Result);
    }

    public function article_update(){

		$id = I('param.id');
		$tags = I('param.tags');
		$title = I('param.title');
		$author = I('param.author');
		$content = I('param.content');

		$Sport  = M('article');
		$data['title'] = $title;
		$data['author'] = $author;
		$data['tags'] = $tags;
		$data['content'] = $content;
		//$data['add_time'] = date('Y-m-d H:i:s');
		//$data['type'] = '0';
		//$data['status'] = '0';

		$Sport->where('id='.$id)->data($data)->save();

		//保存标签
		$tags = split(",", $data['tags']);
		 $data['tags'] = "";
		foreach ($tags as $k=>$v) {
			$Old = M("detail_tags"); // 实例化User对象
			$wh['tags']=$v;
			$wh['type']='2';
			$su = $Old->where($wh)->setInc('count');
			if($su==false){

				$Det  = M('detail_tags');
				$data1['type'] = '2';
			    $data1['tags'] = $v;
			    $data1['count'] = 1;
			    $Det->data($data1)->add();
			}


		}

		$Result["success"]=true;
		$Result["reMsg"]='';
		$this->ajaxReturn($Result);
    }



    public function wechat_update(){

		$id = I('param.id');
		$title = I('param.title');
		$author = I('param.author');
		$content = I('param.content');

		$Sport  = M('article');
		$data['title'] = $title;
		$data['author'] = $author;
		$data['content'] = $content;
		//$data['add_time'] = date('Y-m-d H:i:s');
		//$data['type'] = '0';
		//$data['status'] = '0';

		$Sport->where('id='.$id)->data($data)->save();

		

		$Result["success"]=true;
		$Result["reMsg"]='';
		$this->ajaxReturn($Result);
    }





    //详情
    public function sport_detail(){
		$id = I('param.id');
		//查找数据
		$Sport  = M('sport');
		$map['id'] = $id;
		$data=$Sport->where($map)->find(); 

		$Url  = M('sport_url');
		$map1['sport_id'] = $id;
		$urldata=$Url->where($map1)->select(); 


		$this->assign('data',$data);
		$this->assign('urldata',$urldata);
		$this->display("sport_edit");
    }



    //详情
    public function article_detail(){
		$id = I('param.id');
		//查找数据
		$Sport  = M('article');
		$map['id'] = $id;
		$data=$Sport->where($map)->find(); 


		$this->assign('data',$data);
		$this->display("article_edit");
    }




    //详情
    public function sex_detail(){
		$id = I('param.id');
		//查找数据
		$Sport  = M('article');
		$map['id'] = $id;
		$data=$Sport->where($map)->find(); 


		$this->assign('data',$data);
		$this->display("sex_edit");
    }



    //详情
    public function wechat_detail(){
				if(!isset($_SESSION['id'])){
			
			$this->display('./Admin/login');
		
			return;
    		//$this->assign('jumpUrl','login');
			//$this->error('没有登录');
    	}
		$id = I('param.id');
		//查找数据
		$Sport  = M('article');
		$map['id'] = $id;
		$data=$Sport->where($map)->find(); 


		$this->assign('data',$data);
		$this->display("wechat_edit");
    }


    //详情
    public function about_detail(){
		$id = I('param.id');
		//查找数据
		$Sport  = M('article');
		$map['id'] = $id;
		$data=$Sport->where($map)->find(); 


		$this->assign('data',$data);
		$this->display("about_edit");
    }


    //运动记录
	public function sport_list(){

		//获取参数
		$curPage = I('param.curPage');
		$pageSize = I('param.pageSize');
		$name = I('param.name','');
		
		//查找数据
		$Sport  = M('sport');
		$map['type'] = "0";
		if($name!=""){
			$map['title'] = array('like', '%'.$name.'%');
		}
		$list=$Sport->where($map)->order('id desc')->page("$curPage,$pageSize")->select(); 
		if($list==null){
			$list = [];
		}else{
			$i = ($curPage-1)*$pageSize + 1;
			foreach($list as $k => &  $v){
			    $v["XH"] = $i;
			    $i++;
			}

		}
		$totalRows=$Sport->where($map)->count();
		$Result["success"]=true;
		$Result["data"]=$list;
		$Result["totalRows"]=$totalRows;
		$Result["curPage"]=$curPage;
		$Result["pageSize"]=$pageSize;
		
		//返回json
		$this->ajaxReturn($Result);
    }



    //运动记录
	public function article_list(){

		//获取参数
		$curPage = I('param.curPage');
		$pageSize = I('param.pageSize');
		$name = I('param.name','');
		
		//查找数据
		$Sport  = M('article');
		$map['type'] = "0";
		if($name!=""){
			$map['title'] = array('like', '%'.$name.'%');
		}
		$list=$Sport->where($map)->order('id desc')->page("$curPage,$pageSize")->select(); 
		if($list==null){
			$list = [];
		}else{
			$i = ($curPage-1)*$pageSize + 1;
			foreach($list as $k => &  $v){
			    $v["XH"] = $i;
			    $i++;
			}

		}
		$totalRows=$Sport->where($map)->count();
		$Result["success"]=true;
		$Result["data"]=$list;
		$Result["totalRows"]=$totalRows;
		$Result["curPage"]=$curPage;
		$Result["pageSize"]=$pageSize;
		
		//返回json
		$this->ajaxReturn($Result);
    }
   

	public function sex_list(){

		//获取参数
		$curPage = I('param.curPage');
		$pageSize = I('param.pageSize');
		$name = I('param.name','');
		
		//查找数据
		$Sport  = M('article');
		$map['type'] = "1";
		if($name!=""){
			$map['title'] = array('like', '%'.$name.'%');
		}
		$list=$Sport->where($map)->order('id desc')->page("$curPage,$pageSize")->select(); 
		if($list==null){
			$list = [];
		}else{
			$i = ($curPage-1)*$pageSize + 1;
			foreach($list as $k => &  $v){
			    $v["XH"] = $i;
			    $i++;
			}

		}
		$totalRows=$Sport->where($map)->count();
		$Result["success"]=true;
		$Result["data"]=$list;
		$Result["totalRows"]=$totalRows;
		$Result["curPage"]=$curPage;
		$Result["pageSize"]=$pageSize;
		
		//返回json
		$this->ajaxReturn($Result);
    }




    //运动记录
	public function wechat_list(){

		//获取参数
		$curPage = I('param.curPage');
		$pageSize = I('param.pageSize');
		$name = I('param.name','');
		
		//查找数据
		$Sport  = M('article');
		$map['type'] = "3";
		if($name!=""){
			$map['title'] = array('like', '%'.$name.'%');
		}
		$list=$Sport->where($map)->order('id desc')->page("$curPage,$pageSize")->select(); 
		if($list==null){
			$list = [];
		}else{
			$i = ($curPage-1)*$pageSize + 1;
			foreach($list as $k => &  $v){
			    $v["XH"] = $i;
			    $i++;
			}

		}
		$totalRows=$Sport->where($map)->count();
		$Result["success"]=true;
		$Result["data"]=$list;
		$Result["totalRows"]=$totalRows;
		$Result["curPage"]=$curPage;
		$Result["pageSize"]=$pageSize;
		
		//返回json
		$this->ajaxReturn($Result);
    }

	public function about_list(){

		//获取参数
		$curPage = I('param.curPage');
		$pageSize = I('param.pageSize');
		$name = I('param.name','');
		
		//查找数据
		$Sport  = M('article');
		$map['type'] = "2";
		if($name!=""){
			$map['title'] = array('like', '%'.$name.'%');
		}
		$list=$Sport->where($map)->order('id desc')->page("$curPage,$pageSize")->select(); 
		if($list==null){
			$list = [];
		}else{
			$i = ($curPage-1)*$pageSize + 1;
			foreach($list as $k => &  $v){
			    $v["XH"] = $i;
			    $i++;
			}

		}
		$totalRows=$Sport->where($map)->count();
		$Result["success"]=true;
		$Result["data"]=$list;
		$Result["totalRows"]=$totalRows;
		$Result["curPage"]=$curPage;
		$Result["pageSize"]=$pageSize;
		
		//返回json
		$this->ajaxReturn($Result);
    }


    public function game_add(){
		$tags = I('param.tags');
		$title = I('param.title');
		$date = I('param.date');
		$sport_titles = I('param.sport_titles');
		$sport_urls = I('param.sport_urls');
		$titles = split(',', $sport_titles);
		$urls = split(',', $sport_urls);

		$Sport  = M('sport');
		$data['title'] = $title;
		$data['time'] = $date;

		$weekarray=array(星期日,星期一,星期二,星期三,星期四,星期五,星期六);
		$data['date'] = date('m月d日',strtotime($date));
		$data['week'] = $weekarray[date('w',strtotime($date))];
		$data['small_time'] = date('H:i',strtotime($date));

		$data['tags'] = $tags;
		$data['add_time'] = date('Y-m-d H:i:s');
		$data['type'] = '1';
		$data['status'] = '0';
		$id=$Sport->data($data)->add();
		for($i=0;$i<count($titles);$i++){
			$Url  = M('sport_url');
			$urldata['title']=$titles[$i];
			$urldata['url']=$urls[$i];
			$urldata['sport_id']=$id;
			$urlid=$Url->data($urldata)->add();
		}

				//保存标签
		$tags = split(",", $data['tags']);
		 $data['tags'] = "";
		foreach ($tags as $k=>$v) {
			$Old = M("detail_tags"); // 实例化User对象
			$wh['tags']=$v;
			$wh['type']='1';
			$su = $Old->where($wh)->setInc('count');
			if($su==false){

				$Det  = M('detail_tags');
				$data1['type'] = '1';
			    $data1['tags'] = $v;
			    $data1['count'] = 1;
			    $Det->data($data1)->add();
			}


		}


		$Result["success"]=true;
		$Result["reMsg"]='';
		$this->ajaxReturn($Result);
    }


    public function game_update(){

		$id = I('param.id');
		$tags = I('param.tags');
		$title = I('param.title');
		$date = I('param.date');
		$sport_titles = I('param.sport_titles');
		$sport_urls = I('param.sport_urls');
		$titles = split(',', $sport_titles);
		$urls = split(',', $sport_urls);

		$Sport  = M('sport');
		$data['title'] = $title;
		$data['time'] = $date;

		$weekarray=array(星期日,星期一,星期二,星期三,星期四,星期五,星期六);
		$data['date'] = date('m月d日',strtotime($date));
		$data['week'] = $weekarray[date('w',strtotime($date))];
		$data['small_time'] = date('H:i',strtotime($date));
		
		$data['tags'] = $tags;
		//$data['add_time'] = date('Y-m-d H:i:s');
		//$data['type'] = '0';
		//$data['status'] = '0';

		$Sport->where('id='.$id)->data($data)->save();

		//先删除旧直播地址
		$Del  = M('sport_url');
		$Del->where('sport_id='.$id)->delete(); 
		//插入新直播地址
		for($i=0;$i<count($titles);$i++){
			$Url  = M('sport_url');
			$urldata['title']=$titles[$i];
			$urldata['url']=$urls[$i];
			$urldata['sport_id']=$id;
			$urlid=$Url->data($urldata)->add();
		}
		//保存标签
		$tags = split(",", $data['tags']);
		 $data['tags'] = "";
		foreach ($tags as $k=>$v) {
			$Old = M("detail_tags"); // 实例化User对象
			$wh['tags']=$v;
			$wh['type']='1';
			$su = $Old->where($wh)->setInc('count');
			if($su==false){

				$Det  = M('detail_tags');
				$data1['type'] = '1';
			    $data1['tags'] = $v;
			    $data1['count'] = 1;
			    $Det->data($data1)->add();
			}


		}
		$Result["success"]=true;
		$Result["reMsg"]='';
		$this->ajaxReturn($Result);
    }


    //详情
    public function game_detail(){
		$id = I('param.id');
		//查找数据
		$Sport  = M('sport');
		$map['id'] = $id;
		$data=$Sport->where($map)->find(); 

		$Url  = M('sport_url');
		$map1['sport_id'] = $id;
		$urldata=$Url->where($map1)->select(); 


		$this->assign('data',$data);
		$this->assign('urldata',$urldata);
		$this->display("game_edit");
    }

    //游戏
    public function game_list(){

	
		//获取参数
		$curPage = I('param.curPage');
		$pageSize = I('param.pageSize');
		$name = I('param.name','');
		
		//查找数据
		$Sport  = M('sport');
		$map['type'] = "1";
		if($name!=""){
			$map['title'] = array('like', '%'.$name.'%');
		}
		$list=$Sport->where($map)->order('id desc')->page("$curPage,$pageSize")->select(); 
		if($list==null){
			$list = [];
		}else{
			$i = ($curPage-1)*$pageSize + 1;
			foreach($list as $k => &  $v){
			    $v["XH"] = $i;
			    $i++;
			}

		}
		$totalRows=$Sport->where($map)->count();
		$Result["success"]=true;
		$Result["data"]=$list;
		$Result["totalRows"]=$totalRows;
		$Result["curPage"]=$curPage;
		$Result["pageSize"]=$pageSize;
		
		//返回json
		$this->ajaxReturn($Result);
    }


    //删除
    public function delete(){

		//获取参数
		$id = I('param.id');

		$Del  = M('sport_url');
		$Del->where('sport_id='.$id)->delete(); 

		$Sport  = M('sport');

		$Sport->where('id='.$id)->delete(); 
		
		
		$Result["success"]=true;
		
		//返回json
		$this->ajaxReturn($Result);
    }


    //发布
    public function publish(){

		//获取参数
		$id = I('param.id');

		$Sport  = M('sport');
		$data['status'] = '1';
		//$data['add_time'] = date('Y-m-d H:i:s');
		//$data['type'] = '0';
		//$data['status'] = '0';

		$Sport->where('id='.$id)->data($data)->save();
		
		
		$Result["success"]=true;
		
		//返回json
		$this->ajaxReturn($Result);
    }


    //撤回
    public function cancel(){

		//获取参数
		$id = I('param.id');

		$Sport  = M('sport');
		$data['status'] = '0';
		//$data['add_time'] = date('Y-m-d H:i:s');
		//$data['type'] = '0';
		//$data['status'] = '0';

		$Sport->where('id='.$id)->data($data)->save();
		
		
		$Result["success"]=true;
		
		//返回json
		$this->ajaxReturn($Result);
    }


    //删除
    public function deleteAll(){

		//获取参数
		$ids = I('param.id');
		//$ids = split(',', $id);
		for($i=0;$i<count($ids);$i++){
			$Del  = M('sport_url');
			$Del->where('sport_id='.$ids[$i])->delete(); 

			$Sport  = M('sport');

			$Sport->where('id='.$ids[$i])->delete(); 
			
		}

		$Result["success"]=true;
		
		//返回json
		$this->ajaxReturn($Result);
    }


    //发布
    public function publishAll(){

		//获取参数
		$ids = I('param.id');

		for($i=0;$i<count($ids);$i++){
			
			$Sport  = M('sport');
			$data['status'] = '1';
			//$data['add_time'] = date('Y-m-d H:i:s');
			//$data['type'] = '0';
			//$data['status'] = '0';

			$Sport->where('id='.$ids[$i])->data($data)->save();
			
		}

		
		$Result["success"]=true;
		
		//返回json
		$this->ajaxReturn($Result);
    }


    //撤回
    public function cancelAll(){

		//获取参数
		$ids = I('param.id');

		for($i=0;$i<count($ids);$i++){
			
			$Sport  = M('sport');
			$data['status'] = '0';
			//$data['add_time'] = date('Y-m-d H:i:s');
			//$data['type'] = '0';
			//$data['status'] = '0';

			$Sport->where('id='.$ids[$i])->data($data)->save();
			
		}

		
		$Result["success"]=true;
		
		//返回json
		$this->ajaxReturn($Result);
    }
 

 //-------------------------article----------------------


    //删除
    public function deletearticle(){

		//获取参数
		$id = I('param.id');

		$Del  = M('sport_url');
		$Del->where('sport_id='.$id)->delete(); 

		$Sport  = M('article');

		$Sport->where('id='.$id)->delete(); 
		
		
		$Result["success"]=true;
		
		//返回json
		$this->ajaxReturn($Result);
    }


    //发布
    public function publisharticle(){

		//获取参数
		$id = I('param.id');

		$Sport  = M('article');
		$data['status'] = '1';
		//$data['add_time'] = date('Y-m-d H:i:s');
		//$data['type'] = '0';
		//$data['status'] = '0';

		$Sport->where('id='.$id)->data($data)->save();
		
		
		$Result["success"]=true;
		
		//返回json
		$this->ajaxReturn($Result);
    }


    //撤回
    public function cancelarticle(){

		//获取参数
		$id = I('param.id');

		$Sport  = M('article');
		$data['status'] = '0';
		//$data['add_time'] = date('Y-m-d H:i:s');
		//$data['type'] = '0';
		//$data['status'] = '0';

		$Sport->where('id='.$id)->data($data)->save();
		
		
		$Result["success"]=true;
		
		//返回json
		$this->ajaxReturn($Result);
    }


    //删除
    public function deleteAllarticle(){

		//获取参数
		$ids = I('param.id');
		//$ids = split(',', $id);
		for($i=0;$i<count($ids);$i++){
			$Del  = M('sport_url');
			$Del->where('sport_id='.$ids[$i])->delete(); 

			$Sport  = M('article');

			$Sport->where('id='.$ids[$i])->delete(); 
			
		}

		$Result["success"]=true;
		
		//返回json
		$this->ajaxReturn($Result);
    }


    //发布
    public function publishAllarticle(){

		//获取参数
		$ids = I('param.id');

		for($i=0;$i<count($ids);$i++){
			
			$Sport  = M('article');
			$data['status'] = '1';
			//$data['add_time'] = date('Y-m-d H:i:s');
			//$data['type'] = '0';
			//$data['status'] = '0';

			$Sport->where('id='.$ids[$i])->data($data)->save();
			
		}

		
		$Result["success"]=true;
		
		//返回json
		$this->ajaxReturn($Result);
    }


    //撤回
    public function cancelAllarticle(){

		//获取参数
		$ids = I('param.id');

		for($i=0;$i<count($ids);$i++){
			
			$Sport  = M('article');
			$data['status'] = '0';
			//$data['add_time'] = date('Y-m-d H:i:s');
			//$data['type'] = '0';
			//$data['status'] = '0';

			$Sport->where('id='.$ids[$i])->data($data)->save();
			
		}

		
		$Result["success"]=true;
		
		//返回json
		$this->ajaxReturn($Result);
    }




    public function upload(){

		$targetDir = 'upload_tmp';
		$uploadDir = 'upload';

		$cleanupTargetDir = true; 


		if (!file_exists($targetDir)) {
		    @mkdir($targetDir);
		}

		if (!file_exists($uploadDir)) {
		    @mkdir($uploadDir);
		}

		if (isset($_REQUEST["name"])) {
		    $fileName = $_REQUEST["name"];
		} elseif (!empty($_FILES)) {
		    $fileName = $_FILES["file"]["name"];
		} else {
		    $fileName = uniqid("file_");
		}
		$fileName = iconv('UTF-8', 'GB2312', $fileName);
		$filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
		$uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;


		$imgUrl="http://www.xka100.com/".$uploadDir."/".$fileName;
		echo $imgUrl;

		$chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
		$chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;


		if ($cleanupTargetDir) {
		    if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
		        die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
		    }

		    while (($file = readdir($dir)) !== false) {
		        $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;

		        if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
		            continue;
		        }

		        if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
		            @unlink($tmpfilePath);
		        }
		    }
		    closedir($dir);
		}



		if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
		    die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
		}

		if (!empty($_FILES)) {
		    if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
		        die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
		    }

		    if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
		        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
		    }
		} else {
		    if (!$in = @fopen("php://input", "rb")) {
		        die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
		    }
		}

		while ($buff = fread($in, 4096)) {
		    fwrite($out, $buff);
		}

		@fclose($out);
		@fclose($in);

		rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");

		$index = 0;
		$done = true;
		for( $index = 0; $index < $chunks; $index++ ) {
		    if ( !file_exists("{$filePath}_{$index}.part") ) {
		        $done = false;
		        break;
		    }
		}
		if ( $done ) {
		    if (!$out = @fopen($uploadPath, "wb")) {
		        die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
		    }

		    if ( flock($out, LOCK_EX) ) {
		        for( $index = 0; $index < $chunks; $index++ ) {
		            if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
		                break;
		            }

		            while ($buff = fread($in, 4096)) {
		                fwrite($out, $buff);
		            }

		            @fclose($in);
		            @unlink("{$filePath}_{$index}.part");
		        }

		        flock($out, LOCK_UN);
		    }
		    @fclose($out);
		}

    }





}