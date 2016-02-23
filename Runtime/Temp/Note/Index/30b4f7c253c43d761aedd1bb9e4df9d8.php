<?php
//000000000120s:3062:"<!DOCTYPE html>
<html>
	<head>
		<link rel="shortcut icon" href="favicon.ico" />
		<title>个人记事本</title>
		<meta name="viewport" content="initial-scale=1, user-scalable=0, minimal-ui">
		<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
		<link rel="stylesheet" href="/Public/css/jquery-confirm.css">
		<script src="/Public/js/jquery.min.js"></script>
		<script src="/Public/js/bootstrap.min.js"></script>
		<script src="/Public/js/jquery-confirm.js"></script>
		<style type="text/css">
			html{ overflow-y: scroll; }
		</style>
	</head>
	<body>
	<table class="table table-hover">
	<tr><td><a class="btn btn-primary" href="http://test.com/Note/Index/index">笔记列表</a></td>
	<td><a class="btn btn-danger" href="http://test.com/Note/Index/RecycleBin">回收站</a></td>
	<td><a class="btn btn-warning" href="http://test.com/Note/User/OutLogin">退出登录</a></td></tr>
					<tr>
					<td>账本</td>&nbsp;
					<td>2015-12-28 19:53:02</td>
					<td><a class="btn" onclick="return huifuup('http://test.com/Note/Index/RecycleBinDo?nid=3')">恢复</a>&nbsp;&nbsp;<a class="btn" onclick="return checkup('http://test.com/Note/Index/dels&nid=3')">删除</a></td>
				</tr>
						<tr>
					<td>学校</td>&nbsp;
					<td>2015-09-22 12:43:18</td>
					<td><a class="btn" onclick="return huifuup('http://test.com/Note/Index/RecycleBinDo?nid=5')">恢复</a>&nbsp;&nbsp;<a class="btn" onclick="return checkup('http://test.com/Note/Index/dels&nid=5')">删除</a></td>
				</tr>
						<tr>
					<td>星座xing♈️</td>&nbsp;
					<td>2015-11-13 10:42:21</td>
					<td><a class="btn" onclick="return huifuup('http://test.com/Note/Index/RecycleBinDo?nid=141')">恢复</a>&nbsp;&nbsp;<a class="btn" onclick="return checkup('http://test.com/Note/Index/dels&nid=141')">删除</a></td>
				</tr>
						<tr>
					<td>恶棍天使</td>&nbsp;
					<td>2015-12-31 14:01:28</td>
					<td><a class="btn" onclick="return huifuup('http://test.com/Note/Index/RecycleBinDo?nid=177')">恢复</a>&nbsp;&nbsp;<a class="btn" onclick="return checkup('http://test.com/Note/Index/dels&nid=177')">删除</a></td>
				</tr>
						<tr>
					<td>唐人街探案</td>&nbsp;
					<td>2016-01-16 23:34:22</td>
					<td><a class="btn" onclick="return huifuup('http://test.com/Note/Index/RecycleBinDo?nid=197')">恢复</a>&nbsp;&nbsp;<a class="btn" onclick="return checkup('http://test.com/Note/Index/dels&nid=197')">删除</a></td>
				</tr>
			</table>
</body>
</html>
<script>
	function checkup(url){
    	$.confirm({
	        title: '删除',
	        content: '是否删除本条数据？',
		    confirmButton: '是 ?',
	    	cancelButton: '否 ?',
	    	confirm: function(){
	            window.location.href=""+url+"";
				return true;
	        }
	    });
    }

    function huifuup(url){
    	$.confirm({
	        title: '删除',
	        content: '是否要恢复本条数据吗？',
		    confirmButton: '是 ?',
	    	cancelButton: '否 ?',
	    	confirm: function(){
	            window.location.href=""+url+"";
				return true;
	        }
	    });
    }
</script>";
?>