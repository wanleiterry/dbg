<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>项目管理系统后台登录界面模板</title>
<link rel="stylesheet" type="text/css" href="/admin/css/login.css">
<style>
*{
	padding:0px;
	margin:0px;
	}

body{
	font-family:Arial, Helvetica, sans-serif;
	background:url(/admin/images/grass.jpg);
	font-size:13px;
    
	}
img{
	border:0;
	}
.lg{width:468px; height:468px; margin:100px auto; background:url(/admin/images/login_bg.png) no-repeat;}
.lg_top{ height:200px; width:468px;}
.lg_main{width:400px; height:180px; margin:0 25px;}
.lg_m_1{
	width:290px;
	height:100px;
	padding:60px 55px 20px 55px;
}
.ur{
	height:37px;
	border:0;
	color:#666;
	width:236px;
	margin:4px 28px;
	background:url(/admin/images/user.png) no-repeat;
	padding-left:10px;
	font-size:16pt;
	font-family:Arial, Helvetica, sans-serif;
}
.pw{
	height:37px;
	border:0;
	color:#666;
	width:236px;
	margin:4px 28px;
	background:url(/admin/images/password.png) no-repeat;
	padding-left:10px;
	font-size:16pt;
	font-family:Arial, Helvetica, sans-serif;
}
.bn{width:330px; height:72px; background:url(/admin/images/enter.png) no-repeat; border:0; display:block; font-size:18px; color:#FFF; font-family:Arial, Helvetica, sans-serif; font-weight:bolder;}
.lg_foot{
	height:80px;
	width:330px;
	padding: 6px 68px 0 68px;
}
</style>
</head>

<body class="b">
<div class="lg">
<form>
    <div class="lg_top"></div>
    <div class="lg_main">
        <div class="lg_m_1">
        
        <input name="username" class="ur username" placeholder="username" />
        <input name="password" type="password" class="pw pwd" placeholder="password" />
        
        </div>
    </div>
    <div class="lg_foot">
    	<input type='button' value="Login In" class="bn" id="login" />
    </div>
</form>
</div>
</body>
<script src="../js/jquery.min.js"></script>
<script>
	$(function(){
		$('.username').focus(function(){
			$(this).val('');
		});
		$('.pwd').focus(function(){
			$(this).val('');
		});
		$("#login").click(function(){
			var param={
				'username':$('.username').val(),
				'password':$('.pwd').val()
			}
			console.log(param)
			$.ajax({
				url:'/auth/login.json',
		        type: "post",
		        dataType: "json",
		        data: param,
		        success:function(data){
//		        	console.log(data);
		        	if(data.success==true){
		        		window.location.href='/admin/';
		        	}
		        	else{

		        	}
		        }
			})
		})
	})
</script>
</html>
