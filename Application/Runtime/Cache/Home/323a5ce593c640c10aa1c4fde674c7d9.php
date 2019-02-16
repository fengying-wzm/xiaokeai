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
    <link href="/GetHot/Public/css/admin.css" rel="stylesheet">
	<link rel="stylesheet" href="/GetHot/Public/builds/merged/bsgrid.all.min.css"/>
    <link rel="stylesheet" href="/GetHot/Public/builds/css/skins/grid_bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="/GetHot/Public/wangEditor/wangEditor-1.3.13.css">

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
				    <button type="button" onclick="window.location.href='sport';" class="btn btn-default ">体育</button>
				    <button type="button" onclick="window.location.href='game';"  class="btn btn-default">游戏</button>
				    <button type="button" onclick="window.location.href='article';"  class="btn btn-default">美文</button>
				    <button type="button" onclick="window.location.href='sex';"  class="btn btn-default active">两性</button>
				    <button type="button" onclick="window.location.href='about';"  class="btn btn-default">关于</button>
				</div>

							
			</div>
			
			
			<div class="col-md-10 ">
				<div class="admin-top">
					<span class="admin-top-title">两性详情</span>
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
						      <label for="lastname" class="col-sm-1 control-label">作者：</label>
						      <div class="col-sm-10">
						         <input type="text" class="form-control" id="author" value="<?php echo ($data["author"]); ?>"
					            placeholder="请输入作者">
						      </div>
					   	</div>

					   		<div id="uploadContainer">
							    <input type="button" value="选择文件" id="btnBrowse"/>
							    <input type="button" value="上传文件" id="btnUpload">
							    <ul id="fileList"></ul>
							</div>


						<div class="form-group">
						      <label for="lastname" class="col-sm-1 control-label">正文：</label>
						       <div class="col-sm-10">
								<textarea id='textarea1' style='height:800px; max-height:1000px; width:100%;'>
								<?php echo ($data["content"]); ?>
								</textarea>
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
					         <button type="button"  onclick="window.location.href='/GetHot/index.php/Home/Admin/sex';" class="btn btn-default btn-block">取消</button>
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
    <script src="/GetHot/Public/js/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/GetHot/Public/js/bootstrap.min.js"></script>
	
    <script type="text/javascript" src="/GetHot/Public/builds/js/lang/grid.zh-CN.min.js"></script>
    <script type="text/javascript" src="/GetHot/Public/builds/merged/bsgrid.all.min.js"></script>
	
    <script src="/GetHot/Public/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>	
    <script src="/GetHot/Public/js/flat-ui.min.js"></script>	
	
	<script type="text/javascript" src='/GetHot/Public/wangEditor/wangEditor-1.3.13.js'></script>

	<script type="text/javascript" src="/GetHot/Public/plupload/plupload.full.min.js"></script>
	<script>

		//弹出框
		function showAlert(title,content){
			$('#myModalLabel').html(title);
			$('#alertcontent').html(content);
			$(function () { $('#myModal').modal({
		    	keyboard: true
		   	})});
		};
		


      $('input.tagsinput').tagsinput();




		//保存数据
		function save(){
			var id = <?php echo ($data["id"]); ?>;
		//标签
			var tags = $('#tags').val();
			//标题跟时间
			var title = $('#title').val();
			var author = $('#author').val();
			 var content = $('#textarea1').val();
			if(title==null||title.length==0){
				showAlert("提示","标题不能为空！");
				return;
			}
		//	if(author==null||author.length==0){
		//		showAlert("提示","作者不能为空");
		//		return;
		//	}

			if(content==null||content.length==0){
				showAlert("提示","内容不能为空");
				return;
			}


		      $.ajax({
		        url: '/GetHot/index.php/Home/Admin/article_update',
		      //  dataType: 'json',
		        method: 'POST',
		        data: {author:author,title:title,tags:tags,content:content,id:id},
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
	//上传图片
		<script type="text/javascript">
		$(function(){
			//获取dom节点
		    var $uploadContainer = $('#uploadContainer'),
		        $fileList = $('#fileList'),
		        $btnUpload = $('#btnUpload');



   /*[
				        ['viewSourceCode'],
    ['bold', 'underline', 'italic', 'foreColor', 'backgroundColor', 'strikethrough'],
    ['blockquote', 'fontFamily', 'fontSize', 'setHead', 'list', 'justify'],
    ['createLink', 'unLink', 'insertTable', 'insertExpression'],
    ['insertImage', 'insertVideo', 'insertLocation','insertCode'],
    ['undo', 'redo', 'fullScreen']
				    	]*/

      $('input.tagsinput').tagsinput();
		var editor = $('#textarea1').wangEditor({
			   'menuConfig': [
				        ['viewSourceCode'],
    ['bold', 'underline', 'italic', 'foreColor', 'backgroundColor', 'strikethrough'],
    ['fontFamily', 'fontSize', 'setHead', 'list', 'justify'],
    ['createLink', 'unLink', 'insertImage'],
    ['undo', 'redo', 'fullScreen']
				    	],
		    	uploadImgComponent: $uploadContainer
		});



		    //实例化一个上传对象
		    var uploader = new plupload.Uploader({
		        browse_button: 'btnBrowse',
		        url: '/GetHot/index.php/Home/Admin/upload', 
		        flash_swf_url: '/GetHot/Public/plupload/Moxie.swf',
		        sliverlight_xap_url: '/GetHot/Public/plupload/Moxie.xap',
		        filters: {
	                    mime_types: [
	                      //只允许上传图片文件 （注意，extensions中，逗号后面不要加空格）
	                      { title: "图片文件", extensions: "jpg,gif,png,bmp" }
	                    ]
	            }
		    });

		    //存储所有图片的url地址
		    var urls = [];

		    var event;

		    //初始化
		    uploader.init();

		    //绑定文件添加到队列的事件
		    uploader.bind('FilesAdded', function (uploader, files) {
		            //显示添加进来的文件名
		        $.each(files, function(key, value){
		            var fileName = value.name,
		                html = '<li>' + fileName + '</li>';
		            $fileList.append(html);
		        });
		    });

		    //单个文件上传之后
		    uploader.bind('FileUploaded', function (uploader, file, responseObject) {
		        //注意，要从服务器返回图片的url地址，否则上传的图片无法显示在编辑器中
		        var url = responseObject.response;
		        //先将url地址存储来，待所有图片都上传完了，再统一处理
		        urls.push(url);
		    });

		    //全部文件上传时候
		    uploader.bind('UploadComplete', function (uploader, files) {
		    	// 用 try catch 兼容IE低版本的异常情况
		    	try {
		    		//打印出所有图片的url地址
		    		$.each(urls, function (key, value) {
		    		    editor.command(event, 'insertHTML', '<img src="' + value + '"/>');
		    		});
		    	} catch (ex) {
		    		// 此处可不写
		    	} finally {
		    		//清空url数组
		    		urls = [];

		    		//清空显示列表
		    		$fileList.html('');
		    	}
		    });

		    //上传事件
		    $btnUpload.click(function(e){
		    	event = e;
		        uploader.start();
		    });
		});
	</script>

	<div class="toTop">
		<img src="/GetHot/Public/images/u157.png" alt="回到顶部">
	</div>
  </body>
</html>