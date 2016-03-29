<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>我的课表</title>
	<meta charset="utf-8" name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height" />

</head>
<body >
	<link rel="stylesheet" href="/ClassroomManage/ClassroomManage/Common/js/
	jquery.mobile-1.3.2.css">
	<script src="/ClassroomManage/ClassroomManage/Common/js/jquery-2.1.4.min.js"></script>
	<script src="/ClassroomManage/ClassroomManage/Common/js/jquery.mobile-1.3.2.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			sessionStorage.clear();
  			loadMySchedule();
		});

		function loadMySchedule(){
			var userName = localStorage.getItem("userName");

			var parms={
			    "userName":userName,
			    // 'mySchedule':mySchedule,
			};

			$.ajax({
			    type:"post",
			    url:"/classroomManage/mySchedule.php/searchMySchedule",
			    data:parms,
			    dataType:"json",

			    success:function(responseData){
			    	// alert("123"+responseData[0]['mySchedule']);
			    	if (responseData == 1) {
			    		alert("读取失败！");
			    	}
			    	else if (responseData == 3) {
			    		alert("读取异常！");
			    	}
			    	else{
						// alert("读取成功！");
						$("#precontent").append(responseData[0]['mySchedule']);
			    	}
			  	}
			 });
		}

		function returnMain(){
        	sessionStorage.clear();
        	window.location.href="/classroomManage/index.php/main";
        }

		function toModifyMySchedule(){
			sessionStorage.clear();
        	window.location.href="/classroomManage/mySchedule.php/modifyMySchedule";
		}
	</script>

	<style type="text/css">
		pre{
			white-space: pre-wrap;
			white-space: -moz-pre-wrap;
			white-space: -pre-wrap;
			white-space: -o-pre-wrap;
			word-wrap: break-word;
		}
		.headcss{
			height:10%;
			font-size:20px;
			text-align: center;
		}
		.foot
		{
			bottom: 0;
			height: 10%;
		}
		.loginoutlink
		{
			width: 100%;
			margin-top: 0px;
			height: 100%;
		}
		.loginoutbtn
		{
			color: #fff;
			margin-top: 9px;
			font-size: 20px;
		}
	</style>

	<div data-role="page">
		<div class="headcss" data-role="header" data-position="fixed">
			<div style="margin-top: 18px;">我的行程</div>
			<a href="javascript:toModifyMySchedule()" data-role="button"
			style="margin-top: 2.5%;width: 27%;height: 55%;">
				<div style="font-size: 16px;">修改行程</div>
			</a>
		</div>

		<div id="content" data-role="content" style="overflow:visible">
			<pre id="precontent" style="overflow:visible"></pre>
		</div>

		<div class="foot" data-role="footer"
			data-position="fixed"  ><!-- data-fullscreen="true" -->
			<a href="javascript:returnMain()" class="loginoutlink" data-transition="flow"
				data-role="button" data-inline="true" data-corners="false">
				<div class="loginoutbtn">返回主菜单</div>
			</a>
		</div>
	</div>

</body>
</html>