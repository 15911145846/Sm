<?php
//000000000120s:16027:"<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="favicon.ico" />
	<title>个人记事本</title>
	<meta name="viewport" content="initial-scale=1, user-scalable=0, minimal-ui">
	<meta property="og:url" content="https://craftpip.github.io/jquery-confirm" />
	<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/Public/css/jquery-confirm.css">
	<script src="/Public/js/jquery.min.js"></script>
	<script src="/Public/js/jquery-confirm.js"></script>
	<script src="/Public/js/bootstrap.menu.min.js"></script>
	<style type="text/css">
		html{ overflow-y: scroll; }
	</style>
</head>
<body>
	<table class="table table-hover">
	<tr><td><a class="btn btn-primary" href="http://test.com/Note/Index/NoteAdd">添加记录</a></td>
	<td><a class="btn btn-danger" href="http://test.com/Note/Index/RecycleBin">回收站</a></td>
	<td><a class="btn btn-warning" href="http://test.com/Note/User/OutLogin">退出登录</a></td></tr>
						<tr>
					<td><a class="btn" name="3" href="http://test.com/Note/Index/NoteInfo?nid=3"> 
						账本					</a></td>&nbsp;
					<td>2015-12-28 19:53:02</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=3&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=3">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="4" href="http://test.com/Note/Index/NoteInfo?nid=4"> 
						3.0 计算公式					</a></td>&nbsp;
					<td>2015-06-24 12:02:12</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=4&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=4">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="13" href="http://test.com/Note/Index/NoteInfo?nid=13"> 
						账号					</a></td>&nbsp;
					<td>2015-12-23 12:57:31</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=13&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=13">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="14" href="http://test.com/Note/Index/NoteInfo?nid=14"> 
						数据统计表					</a></td>&nbsp;
					<td>2015-12-25 14:36:08</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=14&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=14">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="15" href="http://test.com/Note/Index/NoteInfo?nid=15"> 
						sql					</a></td>&nbsp;
					<td>2015-07-03 23:51:09</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=15&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=15">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="16" href="http://test.com/Note/Index/NoteInfo?nid=16"> 
						测试服务器密码账户					</a></td>&nbsp;
					<td>2015-08-03 16:57:55</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=16&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=16">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="18" href="http://test.com/Note/Index/NoteInfo?nid=18"> 
						网站					</a></td>&nbsp;
					<td>2015-12-24 14:48:03</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=18&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=18">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="20" href="http://test.com/Note/Index/NoteInfo?nid=20"> 
						备案					</a></td>&nbsp;
					<td>2015-07-09 09:47:12</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=20&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=20">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="22" href="http://test.com/Note/Index/NoteInfo?nid=22"> 
						php抽象类					</a></td>&nbsp;
					<td>2015-10-14 22:46:06</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=22&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=22">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="23" href="http://test.com/Note/Index/NoteInfo?nid=23"> 
						php错误处理					</a></td>&nbsp;
					<td>2015-07-09 18:48:45</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=23&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=23">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="24" href="http://test.com/Note/Index/NoteInfo?nid=24"> 
						cz_需求					</a></td>&nbsp;
					<td>2015-07-10 15:32:31</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=24&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=24">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="25" href="http://test.com/Note/Index/NoteInfo?nid=25"> 
						小菜鸟ｂｕｇ					</a></td>&nbsp;
					<td>2015-10-18 14:06:03</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=25&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=25">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="26" href="http://test.com/Note/Index/NoteInfo?nid=26"> 
						path_info					</a></td>&nbsp;
					<td>2015-08-03 18:47:34</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=26&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=26">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="27" href="http://test.com/Note/Index/NoteInfo?nid=27"> 
						php_nginx 日志分割					</a></td>&nbsp;
					<td>2015-07-15 11:19:45</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=27&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=27">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="32" href="http://test.com/Note/Index/NoteInfo?nid=32"> 
						公司					</a></td>&nbsp;
					<td>2015-11-30 14:20:34</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=32&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=32">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="33" href="http://test.com/Note/Index/NoteInfo?nid=33"> 
						后台借款记录					</a></td>&nbsp;
					<td>2015-08-02 19:52:33</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=33&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=33">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="34" href="http://test.com/Note/Index/NoteInfo?nid=34"> 
						8.03工作计划					</a></td>&nbsp;
					<td>2015-08-03 18:52:18</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=34&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=34">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="35" href="http://test.com/Note/Index/NoteInfo?nid=35"> 
						sql新加					</a></td>&nbsp;
					<td>2015-08-05 20:45:58</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=35&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=35">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="38" href="http://test.com/Note/Index/NoteInfo?nid=38"> 
						运营数据 新增文件路径					</a></td>&nbsp;
					<td>2015-08-09 17:05:46</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=38&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=38">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="45" href="http://test.com/Note/Index/NoteInfo?nid=45"> 
						php设计模式					</a></td>&nbsp;
					<td>2015-08-15 18:14:11</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=45&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=45">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="46" href="http://test.com/Note/Index/NoteInfo?nid=46"> 
						计息方式					</a></td>&nbsp;
					<td>2015-08-24 19:59:21</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=46&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=46">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="51" href="http://test.com/Note/Index/NoteInfo?nid=51"> 
						ubuntu shell编程					</a></td>&nbsp;
					<td>2015-08-20 13:14:39</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=51&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=51">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="63" href="http://test.com/Note/Index/NoteInfo?nid=63"> 
						黑苹果安装					</a></td>&nbsp;
					<td>2015-08-28 23:54:00</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=63&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=63">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="90" href="http://test.com/Note/Index/NoteInfo?nid=90"> 
						各种api接口					</a></td>&nbsp;
					<td>2015-09-28 23:36:24</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=90&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=90">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="99" href="http://test.com/Note/Index/NoteInfo?nid=99"> 
						centos 安装php环境					</a></td>&nbsp;
					<td>2015-10-13 11:41:24</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=99&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=99">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="101" href="http://test.com/Note/Index/NoteInfo?nid=101"> 
						腾讯课堂					</a></td>&nbsp;
					<td>2015-10-14 22:35:17</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=101&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=101">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="102" href="http://test.com/Note/Index/NoteInfo?nid=102"> 
						阿里云服务器终端密码					</a></td>&nbsp;
					<td>2015-10-16 21:13:44</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=102&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=102">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="118" href="http://test.com/Note/Index/NoteInfo?nid=118"> 
						苹果升级					</a></td>&nbsp;
					<td>2015-12-24 09:41:42</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=118&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=118">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="119" href="http://test.com/Note/Index/NoteInfo?nid=119"> 
						ssh 下载文件					</a></td>&nbsp;
					<td>2015-10-30 02:03:28</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=119&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=119">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="125" href="http://test.com/Note/Index/NoteInfo?nid=125"> 
						php 开源产品					</a></td>&nbsp;
					<td>2015-10-30 02:30:32</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=125&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=125">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="126" href="http://test.com/Note/Index/NoteInfo?nid=126"> 
						Ubuntu配置虚拟主机					</a></td>&nbsp;
					<td>2015-10-30 16:28:15</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=126&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=126">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="133" href="http://test.com/Note/Index/NoteInfo?nid=133"> 
						佛主					</a></td>&nbsp;
					<td>2015-11-11 09:36:19</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=133&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=133">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="154" href="http://test.com/Note/Index/NoteInfo?nid=154"> 
						养生之道					</a></td>&nbsp;
					<td>2015-11-24 13:19:23</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=154&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=154">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="167" href="http://test.com/Note/Index/NoteInfo?nid=167"> 
						格言					</a></td>&nbsp;
					<td>2015-12-23 09:38:06</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=167&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=167">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="186" href="http://test.com/Note/Index/NoteInfo?nid=186"> 
						感冒偏方					</a></td>&nbsp;
					<td>2016-01-08 19:17:59</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=186&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=186">导出</a></td>
				</tr>
						<tr>
					<td><a class="btn" name="200" href="http://test.com/Note/Index/NoteInfo?nid=200"> 
						sdadasd					</a></td>&nbsp;
					<td>2016-01-22 21:20:47</td>
					<td>&nbsp;&nbsp;<a class="btn" onclick="return AlertM('http://test.com/Note/Index/RecycleBinDo?nid=200&S=R')">删除</a>&nbsp;&nbsp;<a class="btn" href="http://test.com/Note/Index/Emport?nid=200">导出</a></td>
				</tr>
			</table>
</body>
</html>

<script type="text/javascript">

	var menu = new BootstrapMenu('#demo1Box', {
		actions: [{
			name: 'Action',
			onClick: function() {
				toastr.info("'Action' clicked!");
			}
		}, {
			name: 'Another action',
			onClick: function() {
				toastr.info("'Another action' clicked!");
			}
		}, {
			name: 'A third action',
			onClick: function() {
				toastr.info("'A third action' clicked!");
			}
		}]
	});

	function AlertM(url){
    	$.confirm({
	        title: '删除',
	        content: '是否放入回收站？',
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