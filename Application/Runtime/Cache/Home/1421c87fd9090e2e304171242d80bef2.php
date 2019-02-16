<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title><?php echo ($data["title"]); ?></title>
     <meta name="description" content="<?php echo ($data["title"]); ?>" />


    <!-- Bootstrap -->
    <link href="/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/Public/css/gethot.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
		.detail-title .title2{
			color:#5a5a5a;
			font-weight:bold;
			font-size:24px;
		}
		.details{

			background-color:#fff;
			padding:10px;
			margin-bottom:0px;
		}
		body{
			background-color: #fff !important;
		}
		.detail-author{
			padding-top:10px;
			padding-bottom:10px;
			height:40px;
		}
		.detail-line{
			background:#d2d2d2;
			height:1px;
			margin-bottom:10px;
		}
		.detail-title img {
			vertical-align: top;
			padding-top:0px;
			width: 30px;
		}
		.main{
			padding-bottom: 10px;
		}
		.container{
			padding:10px;
		}
    </style>
  </head>
  <body>
	   

	<div class="container main">

			
				
				
				<div class="details">
					<!--
					<div class="detail-title">
						<img src="/Public/images/u54.png">
						<span class="title2"><?php echo ($data["title"]); ?></span>
					</div>
					<div class="detail-author">
						<span class="hot">作者：<?php echo ($data["author"]); ?></span>
					</div>
					<div class="detail-line">
					</div>
					-->
					<div class="detail-article"  id="detail-sex">
					<?php echo ($data["content"]); ?>
						<script type="text/javascript">
						   function noEscapeHtml(html) {  
						        return html.replace(/(\&|\&)amp;/g,'&').replace(/(\&|\&)gt;/g, ">")  
						                    .replace(/(\&|\&)lt;/g, "<")  
						                    .replace(/(\&|\&)quot;/g, "\"");  
						     }  
     
							var html = noEscapeHtml(document.getElementById('detail-sex').innerHTML);
							document.getElementById('detail-sex').innerHTML=html;
						</script>
					</div>
					
				</div>
				
			
			
		</div>
		
	</div>

	


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/Public/js/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/Public/js/bootstrap.min.js"></script><script>
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