<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		
		if(!isset($_SESSION['id'])){
			
			$this->display('./Admin/login');
		
			return;
    		//$this->assign('jumpUrl','login');
			//$this->error('没有登录');
    	}
		
		
		    	$Sport = M('article');
		$map['type'] = "3";
		$totalRows=$Sport->where($map)->count();
		$this->assign('totalRows',$totalRows);
		
		$this->display('./Admin/wechat');
	}
	  
	 public function article(){
	 	//获取美文数据
		$curPage = I('param.curPage');
		$pageSize = I('param.pageSize');
		$tags = I('param.tags','');

		$Book  = M('article');
		$map['type'] = '0';
		$map['status'] = '1';
		if($tags!='')
			$map['tags'] = array('like', '%'.$tags.'%');
		$list=$Book->where($map)->limit('0,20')->order('id desc')->select(); 
		$this->assign('articleList',$list);

		//获取标签
		$Label = M('label');
		$map1['type'] = "2";
		$data=$Label->where($map1)->find(); 
		$labels = split(",", $data['tags']);

		$this->assign('label',$labels);
		$this->assign('tags',$tags);

		$this->display('./html/article.html');
	 }


	 public function sex(){
	 	//获取美文数据
		$curPage = I('param.curPage');
		$pageSize = I('param.pageSize');
		$tags = I('param.tags','');

		$Book  = M('article');
		$map['type'] = '1';
		$map['status'] = '1';
		if($tags!='')
			$map['tags'] = array('like', '%'.$tags.'%');
		$list=$Book->where($map)->limit('0,20')->order('id desc')->select(); 
		$this->assign('articleList',$list);

		//获取标签
		$Label = M('label');
		$map1['type'] = "3";
		$data=$Label->where($map1)->find(); 
		$labels = split(",", $data['tags']);

		$this->assign('label',$labels);
		$this->assign('tags',$tags);

		$this->display('./html/sex.html');
	 }

	 public function about(){
	 	//获取美文数据
		$tags = I('param.tags','');

		$Book  = M('article');
		$map1['type'] = '2';
		$map1['status'] = '1';
		if($tags!=''){
			$map1['title'] = $tags;
		}
		$data=$Book->where($map1)->find(); 
		$this->assign('data',$data);

		//获取标签
		$Label = M('label');
		$map['type'] = "4";
		$data=$Label->where($map)->find(); 
		$labels = split(",", $data['tags']);

		$this->assign('label',$labels);
		$this->assign('tags',$tags);

		$this->display('./html/about.html');
	 }


	 public function sport(){

		$curPage = I('param.curPage');
		$pageSize = I('param.pageSize');
		$tags = I('param.tags','');
		$tags = I('param.tags','');

		//获取体育数据
		$Book  = M('sport');
		$today = date('Y-m-d H:i');

		$map2['type'] = '0';
		$map2['status'] = '1';
		if($tags!='')
			$map2['tags'] = array('like', '%'.$tags.'%');
		$map2['time']  = array('gt',$today);

		$list=$Book->where($map2)->limit('0,20')->order('time asc')->select(); 
	//	echo $Book->getLastSql(); 
		$lastDate = '';
		$newList;
		$a = 0;
		foreach($list as $k => &$v){
			$date = $v["date"];
			if($lastDate!=$date){
				$datedata['title']=$date." ".$v["week"];
				$datedata['type']=1;
				$newList[$a]=$datedata;
				$a++;
				$lastDate=$date;
			}
			$v["type"]=0;

			//获取直播地址
			$Url  = M('sport_url');
			$map1['sport_id'] = $v["id"];
			$urldata=$Url->where($map1)->limit(1)->order("id asc")->find(); 
			$v["url"]=$urldata["title"];

			$newList[$a]=$v;
			$a++;
		}
		$this->assign('sportList',$newList);


		//获取标签
		$Label = M('label');
		$map['type'] = "0";
		$data=$Label->where($map)->find(); 
		$labels = split(",", $data['tags']);

		$this->assign('label',$labels);
		$this->assign('tags',$tags);

		$this->display('./html/sport.html');
	 }



	 public function game(){

		$curPage = I('param.curPage');
		$pageSize = I('param.pageSize');
		$tags = I('param.tags','');

		//获取体育数据
		$Book  = M('sport');
		$today = date('Y-m-d H:i');

		$map2['type'] = '1';
		$map2['status'] = '1';
		if($tags!='')
			$map2['tags'] = array('like', '%'.$tags.'%');
		$map2['time']  = array('gt',$today);

		$list=$Book->where($map2)->limit('0,20')->order('time asc')->select(); 
	//	echo $Book->getLastSql(); 
		$lastDate = '';
		$newList;
		$a = 0;
		foreach($list as $k => &$v){
			$date = $v["date"];
			if($lastDate!=$date){
				$datedata['title']=$date." ".$v["week"];
				$datedata['type']=1;
				$newList[$a]=$datedata;
				$a++;
				$lastDate=$date;
			}
			$v["type"]=0;

			//获取直播地址
			$Url  = M('sport_url');
			$map1['sport_id'] = $v["id"];
			$urldata=$Url->where($map1)->limit(1)->order("id asc")->find(); 
			$v["url"]=$urldata["title"];

			$newList[$a]=$v;
			$a++;
		}
		$this->assign('sportList',$newList);


		//获取标签
		$Label = M('label');
		$map['type'] = "1";
		$data=$Label->where($map)->find(); 
		$labels = split(",", $data['tags']);

		$this->assign('label',$labels);
		$this->assign('tags',$tags);

		$this->display('./html/game.html');
	 }



	 public function game_list(){

		$start = I('param.start','0');
		$limit = I('param.limit','0');
		$tags = I('param.tags','');

		//获取体育数据
		$Book  = M('sport');
		$today = date('Y-m-d H:i');

		$map2['type'] = '1';
		$map2['status'] = '1';
		if($tags!='')
			$map2['tags'] = array('like', '%'.$tags.'%');
	//	$map2['time']  = array('gt',$today);

		$list=$Book->where($map2)->limit($start,$limit)->order('time asc')->select(); 
	//	echo $Book->getLastSql(); 

		$lastDate = '';

		if($start>0){
			$last=$Book->where($map2)->limit($start-1,1)->order('time asc')->find(); 
			$lastDate=$last["date"]; 
		}		
		$newList;
		$a = 0;
		foreach($list as $k => &$v){
			$date = $v["date"];
			if($lastDate!=$date){
				$datedata['title']=$date." ".$v["week"];
				$datedata['type']=1;
				$newList[$a]=$datedata;
				$a++;
				$lastDate=$date;
			}
			$v["type"]=0;

			//获取直播地址
			$Url  = M('sport_url');
			$map1['sport_id'] = $v["id"];
			$urldata=$Url->where($map1)->limit(1)->order("id asc")->find(); 
			$v["url"]=$urldata["title"];

			$newList[$a]=$v;
			$a++;
		}
		$data["reCode"] = "0";
		$data["list"] = $newList;
		$this->ajaxReturn($data,'JSON');

	 }



	 public function sex_list(){
	 	//获取美文数据
		$start = I('param.start','0');
		$limit = I('param.limit','0');
		$tags = I('param.tags','');

		$Book  = M('article');
		$map['type'] = '1';
		if($tags!='')
			$map2['tags'] = array('like', '%'.$tags.'%');
		$list=$Book->where($map)->limit($start,$limit)->order('id desc')->select(); 

		$data["reCode"] = "0";
		$data["list"] = $list;
		$this->ajaxReturn($data,'JSON');
	 }


	 public function article_list(){
	 	//获取美文数据
		$start = I('param.start','0');
		$limit = I('param.limit','0');
		$tags = I('param.tags','');

		$Book  = M('article');
		$map['type'] = '0';
		if($tags!='')
			$map2['tags'] = array('like', '%'.$tags.'%');
		$list=$Book->where($map)->limit($start,$limit)->order('id desc')->select(); 
		
		$data["reCode"] = "0";
		$data["list"] = $list;
		$this->ajaxReturn($data,'JSON');
	 }




	 public function sport_list(){

		$start = I('param.start','0');
		$limit = I('param.limit','20');
		$tags = I('param.tags','');

		//获取体育数据
		$Book  = M('sport');
		$today = date('Y-m-d H:i');

		$map2['type'] = '0';
		$map2['status'] = '1';
		if($tags!='')
			$map2['tags'] = array('like', '%'.$tags.'%');
	//	$map2['time']  = array('gt',$today);

		$list=$Book->where($map2)->limit($start,$limit)->order('time asc')->select(); 
	//	echo $Book->getLastSql(); 

		$lastDate = '';

		if($start>0){
			$last=$Book->where($map2)->limit($start-1,1)->order('time asc')->find(); 
			$lastDate=$last["date"]; 
		}		
		$newList;
		$a = 0;
		foreach($list as $k => &$v){
			$date = $v["date"];
			if($lastDate!=$date){
				$datedata['title']=$date." ".$v["week"];
				$datedata['type']=1;
				$newList[$a]=$datedata;
				$a++;
				$lastDate=$date;
			}
			$v["type"]=0;

			//获取直播地址
			$Url  = M('sport_url');
			$map1['sport_id'] = $v["id"];
			$urldata=$Url->where($map1)->limit(1)->order("id asc")->find(); 
			$v["url"]=$urldata["title"];

			$newList[$a]=$v;
			$a++;
		}
		$data["reCode"] = "0";
		$data["list"] = $newList;
		$this->ajaxReturn($data,'JSON');

	 }




	 public function game_detail(){

		$id = I('param.id','');

		$Sport  = M('sport');
		$map['id'] = $id;
		$data=$Sport->where($map)->find(); 
		$data['tags']=str_replace(",", "&nbsp;", $data['tags']);
		
		$tags = split("&nbsp;", $data['tags']);
		 $data['tags'] = "";
		foreach ($tags as $k=>$v) {
		    $data['tags'] = $data['tags']."&nbsp"."<font style='cursor:pointer;'  onclick=\"window.location.href='game?tags=".$v."';\"  >".$v."</font>";
		}
		$this->assign('data',$data);


		//热门直播
		$Url  = M('sport_url');
		$map2['sport_id'] = $id;
		$urldata=$Url->where($map2)->order("id asc")->select(); 


		$this->assign('urls',$urldata);
		$this->assign('url',$urldata[0]);
		
		//获取标签
		$Label = M('label');
		$map1['type'] = "1";
		$data=$Label->where($map1)->find(); 
		$labels = split(",", $data['tags']);

		$this->assign('label',$labels);

		$this->random_sport();
		$this->random_article();
		$this->random_sex();


		$this->display('./html/game_detail.html');
	 }


	 public function sport_detail(){

		$id = I('param.id','');

		$Sport  = M('sport');
		$map['id'] = $id;
		$data=$Sport->where($map)->find(); 
		$data['tags']=str_replace(",", "&nbsp;", $data['tags']);

		$tags = split("&nbsp;", $data['tags']);
		 $data['tags'] = "";
		foreach ($tags as $k=>$v) {
		    $data['tags'] = $data['tags']."&nbsp"."<font style='cursor:pointer;'  onclick=\"window.location.href='sport?tags=".$v."';\"  >".$v."</font>";
		}

		$this->assign('data',$data);


		//热门直播
		$Url  = M('sport_url');
		$map2['sport_id'] = $id;
		$urldata=$Url->where($map2)->order("id asc")->select(); 


		$this->assign('urls',$urldata);
		$this->assign('url',$urldata[0]);
		
		//获取标签
		$Label = M('label');
		$map1['type'] = "0";
		$data=$Label->where($map1)->find(); 
		$labels = split(",", $data['tags']);

		$this->assign('label',$labels);

		$this->random_game();
		$this->random_article();
		$this->random_sex();


		$this->display('./html/sport_detail.html');
	 }



	 public function article_detail(){

		$id = I('param.id','');

		$Sport  = M('article');
		$map['id'] = $id;
		$data=$Sport->where($map)->find(); 
		$data['tags']=str_replace(",", "&nbsp;", $data['tags']);

		$tags = split("&nbsp;", $data['tags']);
		 $data['tags'] = "";
		foreach ($tags as $k=>$v) {
		    $data['tags'] = $data['tags']."&nbsp"."<font style='cursor:pointer;'  onclick=\"window.location.href='article?tags=".$v."';\"  >".$v."</font>";
		}

		$this->assign('data',$data);


	
		
		//获取标签
		$Label = M('label');
		$map1['type'] = "2";
		$data=$Label->where($map1)->find(); 
		$labels = split(",", $data['tags']);

		$this->assign('label',$labels);

		$this->random_game();
		$this->random_sport();
		$this->random_sex();


		$this->display('./html/article_detail.html');
	 }


	 public function wechat_detail(){

		$id = I('param.id','');

		$Sport  = M('article');
		$map['id'] = $id;
		$data=$Sport->where($map)->find(); 

		$this->assign('data',$data);


		$this->display('./html/wechat_detail.html');
	 }




	 public function sex_detail(){

		$id = I('param.id','');

		$Sport  = M('article');
		$map['id'] = $id;
		$data=$Sport->where($map)->find(); 
		$data['tags']=str_replace(",", "&nbsp;", $data['tags']);

		$tags = split("&nbsp;", $data['tags']);
		 $data['tags'] = "";
		foreach ($tags as $k=>$v) {
		    $data['tags'] = $data['tags']."&nbsp"."<font style='cursor:pointer;'  onclick=\"window.location.href='sex?tags=".$v."';\"  >".$v."</font>";
		}
		$this->assign('data',$data);


	
		
		//获取标签
		$Label = M('label');
		$map1['type'] = "3";
		$data=$Label->where($map1)->find(); 
		$labels = split(",", $data['tags']);

		$this->assign('label',$labels);

		$this->random_game();
		$this->random_sport();
		$this->random_article();


		$this->display('./html/sex_detail.html');
	 }




	 public function about_detail(){

		$id = I('param.id','');

		$Sport  = M('article');
		$map['id'] = $id;
		$data=$Sport->where($map)->find(); 
		$data['tags']=str_replace(",", "&nbsp;", $data['tags']);


		$this->assign('data',$data);


	
		
		//获取标签
		$Label = M('label');
		$map1['type'] = "4";
		$data=$Label->where($map1)->find(); 
		$labels = split(",", $data['tags']);

		$this->assign('label',$labels);

		$this->random_game();
		$this->random_sport();
		$this->random_sex();


		$this->display('./html/about_detail.html');
	 }


	 public function random_sport(){
	 			
	 	$Sport  = M('sport');
		$map['type'] = '0';
		$totalRows=$Sport->where($map)->count();
		$rand=mt_rand(0,$totalRows-1); //产生随机数

		$list=$Sport->where($map)->limit($rand.',1')->select(); 
		$data = $list[0];
	//	echo $Sport->getLastSql(); 
		$data['tags']=str_replace(",", "&nbsp;", $data['tags']);

		$tags = split("&nbsp;", $data['tags']);
		 $data['tags'] = "";
		foreach ($tags as $k=>$v) {
		    $data['tags'] = $data['tags']."&nbsp"."<font style='cursor:pointer;'  onclick=\"window.location.href='sport?tags=".$v."';\"  >".$v."</font>";
		}

		$this->assign('random_sport_data',$data);


		//热门直播
		$Url  = M('sport_url');
		$map2['sport_id'] = $data['id'];
		$urldata=$Url->where($map2)->order("id asc")->select(); 
		$this->assign('random_sport_urls',$urldata);
		$this->assign('random_sport_url',$urldata[0]);

	 }

	 public function random_game(){
	 			
	 	$Sport  = M('sport');
		$map['type'] = '1';
		$totalRows=$Sport->where($map)->count();
		$rand=mt_rand(0,$totalRows-1); //产生随机数

		$list=$Sport->where($map)->limit($rand.',1')->select(); 
		$data = $list[0];
	//	echo $Sport->getLastSql(); 
		$data['tags']=str_replace(",", "&nbsp;", $data['tags']);

		$tags = split("&nbsp;", $data['tags']);
		 $data['tags'] = "";
		foreach ($tags as $k=>$v) {
		    $data['tags'] = $data['tags']."&nbsp"."<font style='cursor:pointer;'  onclick=\"window.location.href='game?tags=".$v."';\"  >".$v."</font>";
		}

		$this->assign('random_game_data',$data);


		//热门直播
		$Url  = M('sport_url');
		$map2['sport_id'] = $data['id'];
		$urldata=$Url->where($map2)->order("id asc")->select(); 
		$this->assign('random_game_urls',$urldata);
		$this->assign('random_game_url',$urldata[0]);

	 }

	 public function random_article(){
	 			
	 	$Sport  = M('article');
		$map['type'] = '0';

		$totalRows=$Sport->where($map)->count();
		$rand=mt_rand(0,$totalRows-1); //产生随机数

		$list=$Sport->where($map)->limit($rand.',1')->select(); 
		$data = $list[0];
	//	echo $Sport->getLastSql(); 
		$data['tags']=str_replace(",", "&nbsp;", $data['tags']);
		//$data['content']=htmlspecialchars($data['content']);


		$tags = split("&nbsp;", $data['tags']);
		 $data['tags'] = "";
		foreach ($tags as $k=>$v) {
		    $data['tags'] = $data['tags']."&nbsp"."<font style='cursor:pointer;'  onclick=\"window.location.href='article?tags=".$v."';\"  >".$v."</font>";
		}
		$this->assign('random_article_data',$data);


	 }

	 public function random_sex(){
	 			
	 	$Sport  = M('article');
		$map['type'] = '1';

		$totalRows=$Sport->where($map)->count();

		$rand=mt_rand(0,$totalRows-1); //产生随机数。

		$list=$Sport->where($map)->limit($rand.',1')->select(); 
		$data = $list[0];
	//	echo $Sport->getLastSql(); 
		$data['tags']=str_replace(",", "&nbsp;", $data['tags']);

		$tags = split("&nbsp;", $data['tags']);
		 $data['tags'] = "";
		foreach ($tags as $k=>$v) {
		    $data['tags'] = $data['tags']."&nbsp"."<font style='cursor:pointer;'  onclick=\"window.location.href='sex?tags=".$v."';\"  >".$v."</font>";
		}

		$this->assign('random_sex_data',$data);


	 }





}
