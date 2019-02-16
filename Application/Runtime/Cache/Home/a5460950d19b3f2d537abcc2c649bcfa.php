<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>GetHot</title>

    <!-- Bootstrap -->

    <link rel="stylesheet" href="/Public/css/flat-ui.min.css"/>
    <link href="/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/css/admin.css" rel="stylesheet">
	<link rel="stylesheet" href="/Public/builds/merged/bsgrid.all.min.css"/>
    <link rel="stylesheet" href="/Public/builds/css/skins/grid_bootstrap.min.css"/>
    <link rel="stylesheet" href="/Public/css/bootstrap-datetimepicker.min.css"/>
	

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
				    <button type="button" class="btn btn-default btn_title">哥谭热GetHot</button>
				    <button type="button" onclick="window.location.href='sport';" class="btn btn-default">体育</button>
				    <button type="button" onclick="window.location.href='game';"  class="btn btn-default active">游戏</button>
				    <button type="button" onclick="window.location.href='article';"  class="btn btn-default">美文</button>
				    <button type="button" onclick="window.location.href='sex';"  class="btn btn-default">两性</button>
				    <button type="button" onclick="window.location.href='about';"  class="btn btn-default">关于</button>
				    <button type="button" onclick="window.location.href='wechat';"  class="btn btn-default">微信文章</button>
				</div>

							
			</div>
			
			
			<div class="col-md-10 ">
				<div class="admin-top">
					<span class="admin-top-title">游戏详情</span>
				</div>
				
				<div class="admin-edit">
					<form class="form-horizontal" role="form">
					   <div class="form-group">
					      <label for="firstname" class="col-sm-1 control-label">标题：</label>
					      <div class="col-sm-10">
					         <input type="text" class="form-control" id="title"  value="<?php echo ($data["title"]); ?>"
					            placeholder="请输入标题">
					      </div>
						</div>
						<div class="form-group">
						      <label for="lastname" class="col-sm-1 control-label">时间：</label>
						      <div class="col-sm-3">
						         <input type="text" class="form-control" id="datetimepicker" value="<?php echo ($data["time"]); ?>"
					            placeholder="请选择时间">
						      </div>
					   	</div>

					   	<?php if(is_array($urldata)): $i = 0; $__LIST__ = array_slice($urldata,0,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="form-group">
							 <label for="firstname" class="col-sm-1 control-label"> <?php if($i == 1 ): ?>直播：
							  	<?php else: endif; ?>
							</label>

						      <div class="col-sm-3">
						         <input type="text" class="form-control" name="sport_title" value="<?php echo ($vo["title"]); ?>"  placeholder="请输入直播标题">
						      </div>
						      <div class="col-sm-6">
						         <input type="text" class="form-control" name="sport_url" value="<?php echo ($vo["url"]); ?>"  placeholder="请输入URL地址，以http://开头">
						      </div>
						      <?php if($i == 1 ): else: ?> <div class="col-sm-1"><button type="button" class="btn btn-default btn-block" onclick="deleteLive(this);">删除</button></div><?php endif; ?>

						   </div><?php endforeach; endif; else: echo "" ;endif; ?>

						<div id="livevideo">
							
						</div>




					   <div class="form-group">
					      <div class="col-sm-offset-1 col-sm-10">
					         <button type="button" onclick="addLive();" class="btn btn-default add-catalog-btn">增加频道</button>
					      </div>
					   </div>

						<div class="form-group">
					      <label for="firstname" class="col-sm-1 control-label">标签：</label>
					      	<div class="col-sm-10">
						      	
						    	<div class="tagsinput-primary">
					            	<input name="tagsinput-02" id="tags" class="tagsinput tagsinput-typeahead input-lg" placeholder="输入标签并回车" value="<?php echo ($data["tags"]); ?>"/>
					          	</div>
							    
							</div>
					   </div>



					   <div class="form-group btn-submit">
					      <div class="col-sm-offset-2 col-sm-2">
					         <button type="button" class="btn btn-default btn-block" onclick="save();">保存</button>
					      </div>
					      <div class="col-sm-2">
					         <button type="button"  onclick="window.location.href='/index.php/Home/Admin/game';" class="btn btn-default btn-block">取消</button>
					      </div>

					   </div>
					</form>

				</div>
			
			</div>
			
		</div>
		
	</div>
	<!-- 模态框（Modal） -->
	<div class="modal fade modal-alert" id="myModal" tabindex="-1" role="dialog" 
	   aria-labelledby="myModalLabel" aria-hidden="true">
	   <div class="modal-dialog">
	      <div class="modal-content">
	         <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" 
	               aria-hidden="true">×
	            </button>
	            <h4 class="modal-title" id="myModalLabel">
	               提示
	            </h4>
	         </div>
	         <div class="modal-body" id="alertcontent">
	            标题不能为空
	         </div>
	         <div class="modal-footer">
	            <button type="button" class="btn btn-default" 
	               data-dismiss="modal">确定
	            </button>
	         </div>
	      </div><!-- /.modal-content -->
	   </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
		


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/Public/js/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/Public/js/bootstrap.min.js"></script>
	
    <script type="text/javascript" src="/Public/builds/js/lang/grid.zh-CN.min.js"></script>
    <script type="text/javascript" src="/Public/builds/merged/bsgrid.all.min.js"></script>
    <script src="/Public/js/bootstrap-datetimepicker.min.js"></script>
	
    <script src="/Public/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>	
    <script src="/Public/js/flat-ui.min.js"></script>	
	
	<script>

		//弹出框
		function showAlert(title,content){
			$('#myModalLabel').html(title);
			$('#alertcontent').html(content);
			$(function () { $('#myModal').modal({
		    	keyboard: true
		   	})});
		};
		
		//时间控件
		$('#datetimepicker').datetimepicker({
		    format: 'yyyy-mm-dd hh:ii',
		    language: 'zh-CN'
		});



      $('input.tagsinput').tagsinput();


		//增加频道
		function addLive(){
			var div = ' <div class="form-group"><label for="firstname" class="col-sm-1 control-label"></label><div class="col-sm-3"><input type="text" class="form-control"'+' name="sport_title"  placeholder="请输入直播标题"></div><div class="col-sm-6"><input type="text" class="form-control" name="sport_url"  '+'placeholder="请输入URL地址"></div><div class="col-sm-1"><button type="button" class="btn btn-default btn-block" onclick="deleteLive(this);">删除</button></div> </div>';

			$("#livevideo").append(div);
		}

		function deleteLive(live){
			$(live).parent().parent().remove();
		}



		//保存数据
		function save(){
			var id = <?php echo ($data["id"]); ?>;
			//标签
			var tags = $('#tags').val();
			//标题跟时间
			var title = $('#title').val();
			var date = $('#datetimepicker').val();
			if(title==null||title.length==0){
				showAlert("提示","标题不能为空！");
				return;
			}
			if(date==null||date.length==0){
				showAlert("提示","请选择时间！");
				return;
			}

			//直播资源
			var titles = $("input[name='sport_title']");
			var urls = $("input[name='sport_url']");
			var sport_titles = "";
			for(var i=0;i<titles.length;i++){
				var sport_title = titles[i].value;
				if(sport_title==null||sport_title.length==0){
					showAlert("提示","直播标题不完整！");
					return;
				}
				sport_titles+=sport_title;
				if(i!=titles.length-1){
					sport_titles+=","
				}
			}
			var sport_urls = "";
			for(var i=0;i<urls.length;i++){
				var sport_url = urls[i].value;
				if(sport_url==null||sport_url.length==0){
					showAlert("提示","直播URL不完整！");
					return;
				}
				sport_urls+=sport_url;
				if(i!=urls.length-1){
					sport_urls+=","
				}
			}


		      $.ajax({
		        url: '/index.php/Home/Admin/game_update',
		      //  dataType: 'json',
		        method: 'POST',
		        data: {id:id,date:date,title:title,sport_titles:sport_titles,sport_urls:sport_urls,tags:tags},
		        success: function(data , textStatus){
		        	if(data.success){
		        		showAlert("提示","操作成功！");
		        	}else{
		        		if(data.reMsg){
		        			showAlert("提示",data.reMsg);
		        		}else{
		        			showAlert("提示","操作失败！");
		        		}
		        	}
		        },
		        error: function(jqXHR , textStatus , errorThrown){
		        		showAlert("提示","网络连接失败！");
		        },
		       
		      });

		}
		//回到顶部按钮
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
	
	<div class="toTop">
		<img src="/Public/images/u157.png" alt="回到顶部">
	</div>
  </body>
</html>