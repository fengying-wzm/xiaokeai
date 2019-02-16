<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>GetHot</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="/GetHot/Public/css/flat-ui.min.css"/>
    <link href="/GetHot/Public/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/GetHot/Public/builds/merged/bsgrid.all.min.css"/>
    <link rel="stylesheet" href="/GetHot/Public/builds/css/skins/grid_bootstrap.min.css"/>
    <link href="/GetHot/Public/css/admin.css" rel="stylesheet">
	

	<!-- Include the plugin's CSS and JS: -->
	<!-- <link rel="stylesheet" href="/GetHot/Public/js/multiselect/bootstrap-multiselect.css" type="text/css"/> -->
<link href="//cdn.bootcss.com/bootstrap-multiselect/0.9.10/css/bootstrap-multiselect.css" rel="stylesheet">

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
				</div>

							
			</div>
			
			
			<div class="col-md-10 ">
				<div class="admin-top">
					<span class="admin-top-title">游戏（共<?php echo ($totalRows); ?>条记录）</span><button onclick="window.location.href='/GetHot/index.php/Home/Admin/game_new';" type="button" class="btn btn-primary">发布新的</button><button type="button" onclick="showLabel();"  class="btn btn-primary">设置标签</button>
					

				</div>
				
				<div class="admin-grid">
					<div class="admin-toolbar">
						 <div class="col-md-3">
								<input type="text" class="form-control" id="search" placeholder="输入标题进行搜索">
						</div>
						 <div class="col-md-2"> <button type="button" onclick="refresh();" class="btn btn-primary">搜索</button></div>
						  
						<button type="button" class="btn btn-primary" onclick="cancelAll();">撤回</button>
						 
						 <button type="button" class="btn btn-primary" onclick="publishAll();">发布</button>
						 <button type="button" class="btn btn-primary" onclick="delAll();">删除</button>
						 
					</div>
					<div class="admin-grid-content">
						<table id="searchTable">
							<tr>
								<th w_check="true" w_index="id" width="5%;"></th>
								<th w_index="XH" width="5%;">序号</th>
								<th w_index="title" width="40%;">标题</th>
								<th w_index="time" width="15%;">比赛时间</th>
								<th w_index="add_time" w_align="left" width="15%;">发布时间</th>
								<th w_render="operate" width="20%;">操作</th>
							</tr>
						</table
					
					</div>
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
		


			<!-- 模态框（Modal） -->
	<div class="modal fade modal-alert" id="setLabel" tabindex="-1" role="dialog" 
	   aria-labelledby="myModalLabel" aria-hidden="true">
	   <div class="modal-dialog">
	      <div class="modal-content">
	         <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" 
	               aria-hidden="true">×
	            </button>
	            <h4 class="modal-title" id="myModalLabel">
	               设置热门标签
	            </h4>
	         </div>
	         <div class="modal-body" id="alertcontent">
	            						      	
						    	<div class="tagsinput-primary">
			                            <select id="example-order" multiple="multiple" style="width:500px;">
			                            <?php if(is_array($tags)): $i = 0; $__LIST__ = array_slice($tags,0,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["tags"]); ?>"><?php echo ($vo["tags"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

			                              
			                            </select>
					          	<div id="remarks" style="padding-top:5px;padding-bottom: 5px;"><?php echo ($data["tags"]); ?></span>
	         					</div>
	         <div class="modal-footer">
	            <button type="button" class="btn btn-default" onclick="saveTags();">保存
	            </button>
	            <button type="button" class="btn btn-default" 
	               data-dismiss="modal">取消
	            </button>
	         </div>
	      </div><!-- /.modal-content -->
	   </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/GetHot/Public/js/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/GetHot/Public/js/bootstrap.min.js"></script>
	
    <script type="text/javascript" src="/GetHot/Public/builds/js/lang/grid.zh-CN.min.js"></script>
    <script type="text/javascript" src="/GetHot/Public/builds/merged/bsgrid.all.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap-multiselect/0.9.10/js/bootstrap-multiselect.min.js"></script>
	<!-- <script type="text/javascript" src="/GetHot/Public/js/multiselect/bootstrap-multiselect.min.js"></script> -->

	<script type="text/javascript">
	    $(document).ready(function() {
	         var orderCount = 0;
		        $('#example-order').multiselect({
		        	maxHeight: 200,
		        	buttonWidth: '570px',
		            numberDisplayed: 5,
		            delimiterText:',',
		            buttonText: function(options) {
				        if (options.length == 0) {
				          return 'None selected ';
				        }
				        else {
				          var selected = [];
				          options.each(function() {
				            selected.push([$(this).text(), $(this).data('order')]);
				          });
				          
				 
				          var text = '';
				          for (var i = 0; i < selected.length; i++) {
				            text += selected[i][0] + ',';
				          }
				 		 var value =  text.substr(0, text.length -1) + '';
				 		 $('#remarks').html(value);
				 		  if (options.length > 5) {
				          return options.length + ' 已选择  ';
				        }else{
				          return text.substr(0, text.length -1) + '';
				        }
				        }
				    }


		        });
 
	    });
	</script>

	
	<script>

	 

		function showLabel(){
			 $('#setLabel').modal({
		    	keyboard: true
		   	});
		}

		function saveTags(){
			var tags = $('#remarks').val();
			//if(tags==null||tags.length==0){
			//	showAlert("提示","标签不能为空");
			//	return;
			//}
		      $.ajax({
		        url: '/GetHot/index.php/Home/Admin/saveTags',
		      //  dataType: 'json',
		        type: 'POST',
		        data: {tags:tags,type:'1'},
		        success: function(data , textStatus){
		        	if(data.success){
		        		$('#setLabel').modal('hide');
		        	//	showAlert("提示","操作成功！");
		        	}else{
		        		if(data.reMsg){
		        			$('#setLabel').modal('hide');
		        			showAlert("提示",data.reMsg);
		        		}else{
		        			$('#setLabel').modal('hide');
		        			showAlert("提示","操作失败！");
		        		}
		        	}
		        },
		        error: function(jqXHR , textStatus , errorThrown){
		        		showAlert("提示","网络连接失败！");
		        },
		       
		      });

		}

		//弹出框
		function showAlert(title,content){
			$('#myModalLabel').html(title);
			$('#alertcontent').html(content);
			$(function () { $('#myModal').modal({
		    	keyboard: true
		   	})});
		};

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
	
	<script type="text/javascript">
		var gridObj;
		$(function () {
			gridObj = $.fn.bsgrid.init('searchTable', {
				url: '/GetHot/index.php/Home/Admin/game_list',
				// autoLoad: false,
				pageSizeSelect: true,
				pageSize: 10,
				displayBlankRows: false, // single grid setting,
				rowHoverColor: true,
				otherParames:{name:''},
				displayPagingToolbarOnlyMultiPages: true,// single grid setting,
            stripeRows: true
			});
		});

		function refresh(){
			var name = $('#search').val();
			gridObj.options.otherParames = {name:name};
			gridObj.page(1);
		}

		function del(id){
			$.ajax({
		        url: '/GetHot/index.php/Home/Admin/delete',
		      //  dataType: 'json',
		        method: 'POST',
		        data: {id:id},
		        success: function(data , textStatus){
		        	if(data.success){
		        		showAlert("提示","操作成功！");
		        		gridObj.page(1);
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
		        }
		       
		      });
			

		}

		function publish(id){
			$.ajax({
		        url: '/GetHot/index.php/Home/Admin/publish',
		      //  dataType: 'json',
		        method: 'POST',
		        data: {id:id},
		        success: function(data , textStatus){
		        	if(data.success){
		        		showAlert("提示","操作成功！");
		        		gridObj.page(1);
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
		        }
		       
		      });
			

		}

		function cancel(id){
			$.ajax({
		        url: '/GetHot/index.php/Home/Admin/cancel',
		      //  dataType: 'json',
		        method: 'POST',
		        data: {id:id},
		        success: function(data , textStatus){
		        	if(data.success){
		        		showAlert("提示","操作成功！");
		        		gridObj.page(1);
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
		        }
		       
		      });
			

		}


		function delAll(id){
			var id = gridObj.getCheckedValues('id');
			$.ajax({
		        url: '/GetHot/index.php/Home/Admin/deleteAll',
		      //  dataType: 'json',
		        method: 'POST',
		        data: {id:id},
		        success: function(data , textStatus){
		        	if(data.success){
		        		showAlert("提示","操作成功！");
		        		gridObj.page(1);
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
		        }
		       
		      });
			

		}

		function publishAll(id){
			var id = gridObj.getCheckedValues('id');
			$.ajax({
		        url: '/GetHot/index.php/Home/Admin/publishAll',
		      //  dataType: 'json',
		        method: 'POST',
		        data: {id:id},
		        success: function(data , textStatus){
		        	if(data.success){
		        		showAlert("提示","操作成功！");
		        		gridObj.page(1);
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
		        }
		       
		      });
			

		}

		function cancelAll(){
			var id = gridObj.getCheckedValues('id');
			$.ajax({
		        url: '/GetHot/index.php/Home/Admin/cancelAll',
		      //  dataType: 'json',
		        method: 'POST',
		        data: {id:id},
		        success: function(data , textStatus){
		        	if(data.success){
		        		showAlert("提示","操作成功！");
		        		gridObj.page(1);
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
		        }
		       
		      });
			

		}



		function getCheckedIds() {
			// values are array
			alert(gridObj.getCheckedValues('id'));
		}
		
		function operate(record, rowIndex, colIndex, options) {
			var status = record['status'];
			var id = record['id'];
			if(status=='1'){
				return '<a class="grid-btn" href="game_detail?id='+id+'" >查看</a>&nbsp;&nbsp;<a  class="grid-btn" href="#" onclick="cancel('+gridObj.getRecordIndexValue(record, 'id')+');" >撤回</a>&nbsp;&nbsp;<a  class="grid-btn" href="#" onclick="del('+gridObj.getRecordIndexValue(record, 'id')+');">删除</a>';
			}else{

				return '<a class="grid-btn"  href="game_detail?id='+id+'" >查看</a>&nbsp;&nbsp;<a  class="grid-btn" href="#" onclick="publish('+gridObj.getRecordIndexValue(record, 'id')+');" >发布</a>&nbsp;&nbsp;<a  class="grid-btn" href="#" onclick="del('+gridObj.getRecordIndexValue(record, 'id')+');">删除</a>';
			}
			
		}
	</script>


	
	<div class="toTop">
		<img src="/GetHot/Public/images/u157.png" alt="回到顶部">
	</div>
  </body>
</html>