<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>GetHot</title>

    <!-- Bootstrap -->
    <link href="/GetHot/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/GetHot/Public/css/gethot.css" rel="stylesheet">

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
			  <button type="button" class="navbar-toggle" data-toggle="collapse" 
				 data-target="#example-navbar-collapse">
				 <span class="sr-only">切换导航</span>
				 <span class="icon-bar"></span>
				 <span class="icon-bar"></span>
				 <span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="index">GetHot</a>
		   </div>
		   <div class="container">
			   <div class="collapse navbar-collapse" id="example-navbar-collapse">
				  <ul class="nav navbar-nav">
					 <li ><a href="index">首页</a></li>
					 <li ><a href="sport">体育</a></li>
					 <li ><a href="game">游戏</a></li>
					 <li ><a href="article">美文</a></li>
					 <li ><a href="sex">两性</a></li>
					 <li ><a class="current"  href="about">关于</a></li>
				  </ul>
			   </div>
		   </div>
		</div>
	</nav>
	<div class="container main">
		<div class="row index-row">
		
			<div class="col-md-4 catalog_left  visible-lg">
				<div class="catalog_main_title">
					<div class="catalog_big_title">
						<p>有关我们</p>
					</div>
					<div class="catalog_small_title">
						<p>摩肩接踵以利天下</p>
					</div>
					<div class="catalog_title">
						<img src="/GetHot/Public/images/u36.png" >
					</div>
				</div>
				<div class="btn-group-vertical btn-groups btn-group-lg">
				    <button type="button" class="btn btn-default btn_title">常用标签</button>
					<?php if(is_array($label)): $i = 0; $__LIST__ = array_slice($label,0,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo == $_GET['tags']): ?><button type="button" onclick="window.location.href='about?tags=<?php echo ($vo); ?>';" class="btn btn-default active"><?php echo ($vo); ?></button>
						<?php else: ?> 
				    		<button type="button" onclick="window.location.href='about?tags=<?php echo ($vo); ?>';"  class="btn btn-default"><?php echo ($vo); ?></button><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</div>

							
			</div>
			
			
			<div class="col-md-7 ">
				
				
				<div class="detail">
					<div class="detail-title2">
						<img src="/GetHot/Public/images/u54.png">
						<span class="title2"><?php echo ($data["title"]); ?></span>
					</div>
					
					<div class="detail-line">
					</div>
					<div class="detail-article" id="detail-article">
						<?php echo ($data["content"]); ?>
						<script type="text/javascript">
						   function noEscapeHtml(html) {  
						        return html.replace(/(\&|\&)amp;/g,'&').replace(/(\&|\&)gt;/g, ">")  
						                    .replace(/(\&|\&)lt;/g, "<")  
						                    .replace(/(\&|\&)quot;/g, "\"");  
						     }  
     							
							var html = noEscapeHtml(document.getElementById('detail-article').innerHTML);
							document.getElementById('detail-article').innerHTML=html;
						</script>
						
					</div>
					
					
				</div>
				
				
			</div>
			
			
		</div>
		
	</div>

	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/GetHot/Public/js/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/GetHot/Public/js/bootstrap.min.js"></script>
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
	
	<div class="toTop">
		<img src="/GetHot/Public/images/u157.png" alt="回到顶部">
	</div>
  </body>
</html>