<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>内容管理系统</title>

        <!-- CSS -->
		<link href="/Public/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/Public/css/font-awesome.min.css" />
		<link rel="stylesheet" href="/Public/css/form-elements.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
		
		<style type="text/css">
			.*{
				font-family:"Microsoft YaHei",微软雅黑;
			}
			body {
			    font-family:"Microsoft YaHei",微软雅黑;
			    font-size: 16px;
			    font-weight: 300;
			    color: #888;
			    line-height: 30px;
			    text-align: center;
			}
			
			strong { font-weight: 500; }
			
			a, a:hover, a:focus {
				color: #4aaf51;
				text-decoration: none;
			    -o-transition: all .3s; -moz-transition: all .3s; -webkit-transition: all .3s; -ms-transition: all .3s; transition: all .3s;
			}
			
			h1, h2 {
				margin-top: 10px;
				font-size: 38px;
			    font-weight: 100;
			    color: #555;
			    line-height: 50px;
			}
			
			h3 {
				font-size: 22px;
			    font-weight: 300;
			    color: #555;
			    line-height: 30px;
			}
			
			img { max-width: 100%; }
			
			::-moz-selection { background: #4aaf51; color: #fff; text-shadow: none; }
			::selection { background: #4aaf51; color: #fff; text-shadow: none; }
			
			
			.btn-link-1 {
				display: inline-block;
				height: 50px;
				margin: 5px;
				padding: 16px 20px 0 20px;
				background: #4aaf51;
				font-size: 16px;
			    font-weight: 300;
			    line-height: 16px;
			    color: #fff;
			    -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;
			}
			.btn-link-1:hover, .btn-link-1:focus, .btn-link-1:active { outline: 0; opacity: 0.6; color: #fff; }
			
			.btn-link-1.btn-link-1-facebook { background: #4862a3; }
			.btn-link-1.btn-link-1-twitter { background: #55acee; }
			.btn-link-1.btn-link-1-google-plus { background: #dd4b39; }
			
			.btn-link-1 i {
				padding-right: 5px;
				vertical-align: middle;
				font-size: 20px;
				line-height: 20px;
			}
			
			.btn-link-2 {
				display: inline-block;
				height: 50px;
				margin: 5px;
				padding: 15px 20px 0 20px;
				background: rgba(0, 0, 0, 0.3);
				border: 1px solid #fff;
				font-size: 16px;
			    font-weight: 300;
			    line-height: 16px;
			    color: #fff;
			    -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px;
			}
			.btn-link-2:hover, .btn-link-2:focus, 
			.btn-link-2:active, .btn-link-2:active:focus { outline: 0; opacity: 0.6; background: rgba(0, 0, 0, 0.3); color: #fff; }
			
			
			/***** Top content *****/
			
			.inner-bg {
			    padding: 100px 0 170px 0;
			}
			
			.top-content .text {
				color: #fff;
			}
			
			.top-content .text h1 { color: #fff; }
			
			.top-content .description {
				margin: 20px 0 10px 0;
			}
			
			.top-content .description p { opacity: 0.8; }
			
			.top-content .description a {
				color: #fff;
			}
			.top-content .description a:hover, 
			.top-content .description a:focus { border-bottom: 1px dotted #fff; }
			
			.form-box {
				margin-top: 35px;
			}
			
			.form-top {
				overflow: hidden;
				padding: 0 25px 15px 25px;
				background: #fff;
				-moz-border-radius: 4px 4px 0 0; -webkit-border-radius: 4px 4px 0 0; border-radius: 4px 4px 0 0;
				text-align: left;
			}
			
			.form-top-left {
				float: left;
				width: 75%;
				padding-top: 25px;
			}
			
			.form-top-left h3 { margin-top: 0; }
			
			.form-top-right {
				float: left;
				width: 25%;
				padding-top: 5px;
				font-size: 66px;
				color: #ddd;
				line-height: 100px;
				text-align: right;
			}
			
			.form-bottom {
				padding: 25px 25px 30px 25px;
				background: #eee;
				-moz-border-radius: 0 0 4px 4px; -webkit-border-radius: 0 0 4px 4px; border-radius: 0 0 4px 4px;
				text-align: left;
			}
			
			.form-bottom form textarea {
				height: 100px;
			}
			
			.form-bottom form button.btn {
				width: 100%;
			}
			
			.form-bottom form .input-error {
				border-color: #4aaf51;
			}
			
			.social-login {
				margin-top: 35px;
			}
			
			.social-login h3 {
				color: #fff;
			}
			
			.social-login-buttons {
				margin-top: 25px;
			}
			
			
			/***** Media queries *****/
			
			@media (min-width: 992px) and (max-width: 1199px) {}
			
			@media (min-width: 768px) and (max-width: 991px) {}
			
			@media (max-width: 767px) {
				
				.inner-bg { padding: 60px 0 110px 0; }
			
			}
			
			@media (max-width: 415px) {
				
				h1, h2 { font-size: 32px; }
			
			}
		
		</style>

		<script>
			if (navigator.userAgent.toLowerCase().indexOf("chrome") >= 0)
		{
		  var _interval = window.setInterval(function () {
		    var autofills = $('input:-webkit-autofill');
		    if (autofills.length > 0) {
		      window.clearInterval(_interval); // 停止轮询
		      autofills.each(function() {
		        var clone = $(this).clone(true, true);
		        $(this).after(clone).remove();
		      });
		    }
		  }, 20);
		}
		
		  if (window.frames.length != parent.frames.length) {
			alert("登陆超时");
			var contentUrl = window.location+"";
			window.parent.location.href=contentUrl;
		  }
		  
		  
		</script>


    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>后台管理平台</strong> </h1>
                            <div class="description">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>登录系统</h3>
                            		<p id="msg">请输入系统分配的用户名与密码</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <div   class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">用户名</label>
			                        	<input type="text" id="userCode" placeholder="输入用户名" name="userName" class="form-username form-control"  >
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">密码</label>
			                        	<input type="password" id="loginPwd" placeholder="输入登录密码" name="password" class="form-password form-control"  >
			                        </div>
			                        <button id="login" data-loading-text="正在登录..." class="btn btn-block">登录系统</button>
			                    </div>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <div style="position:fixed;bottom:10px;width:100%;TEXT-ALIGN: center;margin:0 auto;">
        	<span>一只萌萌的程序员</span>
        </div>
     

		
		<script src="/Public/js/jquery-1.11.3.min.js"></script>
		<script src="/Public/js/jquery.mobile.custom.min.js"></script>
		
		<script src="/Public/js/bootstrap.min.js"></script>
		
		
        <script src="/Public/js/jquery.backstretch.min.js"></script>
        <script src="/Public/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

		
		<script type="text/javascript">
		
					 //回车事件绑定
			   $('#userCode').bind('keyup', function(event) {
			       if (event.keyCode == "13") {
			           //回车执行查询
			           $('#login').click();
			       }
			   });
			   $('#loginPwd').bind('keyup', function(event) {
			       if (event.keyCode == "13") {
			           //回车执行查询
			           $('#login').click();
			       }
			   });
			   
		
		   $(function() { 
			      $("#login").click(function(){
			    	  var userCode = $("#userCode").val();
						var loginPwd = $("#loginPwd").val();
						$("#login").button('loading');
						$.ajax({
				             type: "POST",
				             url: "/Home/Admin/login",
				             data: {userName:userCode , passWord:loginPwd},
				             dataType: "json",
				             success: function(obj){
				            	//console.log(data);
								//alert(data.success);
				            	//var obj = eval('(' + data + ')');
				            	//console.log(obj);
				            	if (obj.success) {
//		 		            		alert(data.msg);
				            		$("#msg").css("color","green")
				            		$("#msg").html("登录成功，正在跳转...");
				            		window.location.href="/";
				            	} else {
				            		$("#msg").css("color","red");
				            		$("#msg").html(obj.reMsg);
					            	$("#login").button('reset');
				            	}
				             }
				         });
						
			      });
			}); 
		   
		
		</script>
    </body>

</html>