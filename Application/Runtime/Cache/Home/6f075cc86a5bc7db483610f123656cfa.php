<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>GetHot</title>

    <!-- Bootstrap -->
    <link href="/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/css/admin.css" rel="stylesheet">
	<link rel="stylesheet" href="/Public/builds/merged/bsgrid.all.min.css"/>
    <link rel="stylesheet" href="/Public/builds/css/skins/grid_bootstrap.min.css"/>
	

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	   
	<nav class="navbar navbar-inverse" style="border-radius:0;" role="navigation">
		<div class="container header">
		   <div class="navbar-header ">
			  <a class="navbar-brand" href="index.html">GetHot</a>
		   </div>
		  <div class="user">
			<span>您好admin，</span><span>[退出]</span>
		  </div>
		</div>
	</nav>
	<div class="container main">
		<div class="row">
			
			<div class="col-md-2 catalog_left">
				
				<div class="btn-group-vertical btn-groups btn-group-lg">
				    <button type="button" onclick="window.location.href='admin';"  class="btn btn-default btn_title">哥谭热GetHot</button>
				    <button type="button" onclick="window.location.href='sport';" class="btn btn-default">体育</button>
				    <button type="button" onclick="window.location.href='game';"  class="btn btn-default">游戏</button>
				    <button type="button" onclick="window.location.href='article';"  class="btn btn-default ">美文</button>
				    <button type="button" onclick="window.location.href='sex';"  class="btn btn-default ">两性</button>
				    <button type="button" onclick="window.location.href='about';"  class="btn btn-default  ">关于</button>
				</div>

							
			</div>
			
			
			<div class="col-md-10 ">
				<div class="admin-top">
					<span class="admin-top-title">哥谭热GetHot</span>
				</div>
				
				<div class="admin-grid">
					<!-- <div class="admin-toolbar">
						 <div class="col-md-3">
								<input type="text" class="form-control" id="name" placeholder="输入标题进行搜索">
						</div>
						 <div class="col-md-2"> <button type="button" class="btn btn-primary">搜索</button></div>
						  
						<button type="button" class="btn btn-primary">撤回</button>
						 
						 <button type="button" class="btn btn-primary">发布</button>
						 <button type="button" class="btn btn-primary">删除</button>
						 
					</div>
					<div class="admin-grid-content">
						<table id="searchTable">
							<tr>
								<th w_check="true" w_index="ID" width="3%;"></th>
								<th w_index="no" width="5%;">序号</th>
								<th w_index="title" width="30%;">标题</th>
								<th w_index="date" width="5%;">比赛时间</th>
								<th w_index="add_time" w_align="left" width="5%;">发布时间</th>
								<th w_render="operate" width="10%;">操作</th>
							</tr>
						</table
					
					</div>
									</div> -->
			
			</div>
			
		</div>
		
	</div>

	


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/Public/js/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/Public/js/bootstrap.min.js"></script>
	
    <script type="text/javascript" src="/Public/builds/js/lang/grid.zh-CN.min.js"></script>
    <script type="text/javascript" src="/Public/builds/merged/bsgrid.all.min.js"></script>
	
	<script>
		$(function(){
			$(".toTop").click(function(){
				$("html").animate({"scrollTop": "0px"},100); //IE,FF
				$("body").animate({"scrollTop": "0px"},100); //Webkit
			});
			$(window).scroll(function(){  //只要窗口滚动,就触发下面代码 

				var scrollt = document.documentElement.scrollTop + document.body.scrollTop; //获取滚动后的高度 

				if( scrollt >200 ){  //判断滚动后高度超过200px,就显示  

					$(".toTop").fadeIn(400); //淡出     

				}else{      

					$(".toTop").stop().fadeOut(400); //如果返回或者没有超过,就淡入.必须加上stop()停止之前动画,否则会出现闪动   

				}
			});
		})
	</script>
	
<!-- 	<script type="text/javascript">
	var gridObj;
	$(function () {
		gridObj = $.fn.bsgrid.init('searchTable', {
			url: '/index.php/Home/Admin/index/sport',
			// autoLoad: false,
			pageSizeSelect: true,
			pageSize: 5,
			displayBlankRows: false, // single grid setting,
			rowHoverColor: true,
			displayPagingToolbarOnlyMultiPages: true,// single grid setting,
            stripeRows: true
		});
	});

	function getCheckedIds() {
		// values are array
		alert(gridObj.getCheckedValues('ID'));
	}
	
	function operate(record, rowIndex, colIndex, options) {
		return '<a class="grid-btn" href="#" onclick="alert(\'ID=' + gridObj.getRecordIndexValue(record, 'ID') + '\');">查看</a>&nbsp;&nbsp;<a  class="grid-btn" href="#" onclick="alert(\'ID=' + gridObj.getRecordIndexValue(record, 'ID') + '\');">撤回</a>&nbsp;&nbsp;<a  class="grid-btn" href="#" onclick="alert(\'ID=' + gridObj.getRecordIndexValue(record, 'ID') + '\');">删除</a>';
	}
</script> -->

	
	<div class="toTop">
		<img src="/Public/images/u157.png" alt="回到顶部">
	</div>
  </body>
</html>