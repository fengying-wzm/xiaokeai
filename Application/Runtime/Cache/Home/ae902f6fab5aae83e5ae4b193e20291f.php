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
    <link href="/Public/css/gethot.css" rel="stylesheet">

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
					 <li ><a class="current"  href="index">首页</a></li>
					 <li ><a href="sport">体育</a></li>
					 <li ><a href="game">游戏</a></li>
					 <li ><a href="article">美文</a></li>
					 <li ><a href="sex">两性</a></li>
					 <li ><a href="about">关于</a></li>
				  </ul>
			   </div>
		   </div>
		</div>
	</nav>
	<div class="container main">
		<div class="row">
			<div class="col-md-6 ">
				<div class="sport">
					<div class="main_title_sport">
						<div class="title">
							<img src="/Public/images/u27.png" >
						</div>
						<div class="big_title">
							<p>体育频道</p>
						</div>
						<div class="small_title">
							<p>最新鲜的体育直播</p>
						</div>
					</div>
				
					<?php if(is_array($sportList)): $i = 0; $__LIST__ = array_slice($sportList,0,15,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["type"] == '1' ): ?><div class="date"><span><?php echo ($vo["title"]); ?></span></div>
						<?php else: ?> 
							<div class="catalog" onclick="window.location.href='sport_detail?id=<?php echo ($vo["id"]); ?>';"><span><?php echo ($vo["title"]); ?> </span><span class="all"><?php echo ($vo["url"]); ?></span></div><?php endif; endforeach; endif; else: echo "" ;endif; ?>


					<div class="more" onclick="window.location.href='sport';">查看更多></div>
			
				</div>
			
			</div>
			
			<div class="col-md-6 ">
				<div class="sport">
					<div class="main_title_sport">
						<div class="title">
							<img src="/Public/images/u33.png" >
						</div>
						<div class="big_title">
							<p>游戏频道</p>
						</div>
						<div class="small_title">
							<p>最劲爆的游戏预告</p>
						</div>
					</div>
				
					<?php if(is_array($gameList)): $i = 0; $__LIST__ = array_slice($gameList,0,15,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["type"] == '1' ): ?><div class="date"><span><?php echo ($vo["title"]); ?></span></div>
						<?php else: ?> 
							<div class="catalog" onclick="window.location.href='game_detail?id=<?php echo ($vo["id"]); ?>';"><span><?php echo ($vo["title"]); ?> </span><span class="all"><?php echo ($vo["url"]); ?></span></div><?php endif; endforeach; endif; else: echo "" ;endif; ?>

					<div class="more" onclick="window.location.href='game';">查看更多></div>
			
				</div>
			
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 ">
				<div class="sport">
					<div class="main_title">
						<div class="title">
							<img src="/Public/images/u41.png" >
						</div>
						<div class="big_title">
							<p>美文欣赏</p>
						</div>
						<div class="small_title">
							<p>最抒情的美文精选</p>
						</div>
					</div>
					
					<?php if(is_array($articleList)): $i = 0; $__LIST__ = array_slice($articleList,0,15,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="catalog" onclick="window.location.href='article_detail?id=<?php echo ($vo["id"]); ?>';"><span><?php echo ($vo["title"]); ?> </span></div><?php endforeach; endif; else: echo "" ;endif; ?>

					<div class="more" onclick="window.location.href='article';">查看更多></div>
			
				</div>
			</div>
			
			<div class="col-md-6 ">
				<div class="sport">
					<div class="main_title">
						<div class="title">
							<img src="/Public/images/u49.png" >
						</div>
						<div class="big_title">
							<p>两性频道</p>
						</div>
						<div class="small_title">
							<p>最健康的两性资讯</p>
						</div>
					</div>
									
					<?php if(is_array($sexList)): $i = 0; $__LIST__ = array_slice($sexList,0,15,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="catalog" onclick="window.location.href='sex_detail?id=<?php echo ($vo["id"]); ?>';"><span><?php echo ($vo["title"]); ?> </span></div><?php endforeach; endif; else: echo "" ;endif; ?>

					<div class="more" onclick="window.location.href='sex';">查看更多></div>
				</div>
			</div>
			
		</div>
		
	</div>

	


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/Public/js/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/Public/js/bootstrap.min.js"></script>
	
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
		<img src="/Public/images/u157.png" alt="回到顶部">
	</div>
  </body>
</html>