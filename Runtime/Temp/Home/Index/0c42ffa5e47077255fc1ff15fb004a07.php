<?php
//000000000120s:6111:"<html>
<meta charset="utf8" />
<body></br>
https://apicrm-develop.migang.com
<form id="form1" action="http://test.com/index.php/index.php/Home/Index/crm" method="post">
<p>测试表单                             当前提交地址：<span id="currentActionUrl" style ="color:red">https://apicrm-develop.migang.com</span></p> 
<input type="submit" value="提交" />
提交地址：
 <input type="text" name='actionUrl' id="actionUrl" value="https://apicrm-develop.migang.com" size=50 x-webkit-speech/>
 <input type="button" onclick="changeAction()" value="更改提交地址" />
<hr/>
<input type="hidden" name="sign" value = '471fd68f847eaccd77e0de61bf5d4b10' />
web_test:
<input type="text" name="web_test" value ='true' />
crmtype:
<input type="text" name="crmtype" value="0501" />
memberid:
<input type="text" name="memberid" value="600127"/>
phonenum:
<input type="text" name="phonenum" value=""/>
name:
<input type="text" name="name" value=""/>
status:
<input type="text" name="status" value="1"/></br>
S:
<input type="text" name="S" value ='Sale' />
Page:
<input type="text" name="page" value="1"/></br>
<!-- SubordinateId:
<input type="text" name="SubordinateId" value ='' /> -->
</br>
token
<input type="text" name="token" value="test" />


<br/>
</form>
<hr/>
中文标示（可留空）:<input type="text" name="xxxx" id="paramName"  value="" />
name:<input type="text" name="xxxx" id="paramKey"  value="" />
value:<input type="text" name="xxxx" id="paramValue"  value="" />
<hr/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" id="addParam" onclick="addParam()" value="新增参数"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" onclick="document.getElementById('form1').submit()" value="提交" />
<div>状态：200</br>响应：<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html dir="ltr" xml:lang="zh" xmlns="http://www.w3.org/1999/xhtml" lang="zh"><head><style type="text/css"><!--html {font-size: 82%;}body {padding:0;margin:0.5em;color:#000000;background:#F5F5F5;}body,td,th{font-family:Microsoft YaHei,Arial,Helvetica,sans-serif,Simsun;}div#floatTips ::-webkit-scrollbar {width: 7px;height: 7px}div#floatTips ::-webkit-scrollbar-track-piece {background-color:#000;-webkit-border-radius: 6px;border: 1px solid #111;border-bottom-color: #555;border-right-color: #555}div#floatTips ::-webkit-scrollbar-thumb:vertical {background-color: #eee;-webkit-border-radius: 6px}div#floatTips ::-webkit-scrollbar-thumb:vertical:hover,div#floatTips ::-webkit-scrollbar-thumb:horizontal:hover {background-color: #fff}div#floatTips ::-webkit-scrollbar-thumb:vertical:active,,div#floatTips ::-webkit-scrollbar-thumb:horizontal:active {background-color: #aaa}div#floatTips ::-webkit-scrollbar-thumb:horizontal {background-color: #eee;-webkit-border-radius: 6px}div#floatTips ::-webkit-scrollbar-button:start:decrement,div#floatTips ::-webkit-scrollbar-button:end:increment  {display: block;background-color: transparent}div#floatTips ::-webkit-scrollbar-corner {background-color: transparent}h2 {font-size:120%;font-weight:bold;}table td {padding:3px}table tr.odd th,.odd {background: #E5E5E5;}table tr.even th,.even {background: #D5D5D5;}table tr.odd th,table tr.odd,table tr.even th,table tr.even {text-align:left;}.odd:hover,.even:hover,.hover {background: #CCFFCC;color: #000000;}table tr.odd:hover th,table tr.even:hover th,table tr.hover th {background:#CCFFCC;color:#000000;}div#floatTips{ position:absolute;border:solid 1px #777;padding:3px;top:50px;right:15px;width:200px;background:#666;color:white;opacity: 0.8;filter:alpha(opacity=80);color:#fff;-webkit-box-shadow:0 0 20px rgba(0,0,0,0.5);-webkit-border-radius: 5px;text-shadow: 0 1px 0 #111;-moz-box-shadow:0 0 20px rgba(0,0,0,0.5);-moz-border-radius: 10px;border-radius: 5px;box-shadow:0 0 20px rgba(0,0,0,0.5);}div#floatTips ul{padding:0px;margin:3px;height:400px; overflow-y:auto}div#floatTips ul li{ list-style:none; height:20px; width:100%; line-height:20px; text-overflow:ellipsis;overflow:hidden; white-space:nowrap;}div#floatTips a:link,div#floatTips a:hover,div#floatTips a:visited,div#floatTips a:active{color:#fff; text-decoration:none}pre{white-space:pre-wrap;white-space:-moz-pre-wrap;white-space:-pre-wrap;white-space:-o-pre-wrap;word-wrap:break-word;}--></style><pre><pre>Array
(
    [status] => 0
    [error] => 没有数据！
)
<pre></html></div>
<script>
var  colorArr = ['red','green','blue','orange','black','purple','#ABCABC','#ADD000','#999999'];
function addParam() {
	var Pname = document.getElementById('paramName').value;
	var Pkey = document.getElementById('paramKey').value;
	var Pvalue = document.getElementById('paramValue').value;

	//检测重复
	var checkingNode = document.getElementsByName(Pkey);
	
	if(checkingNode.length >=1 ) {
		alert('已存在');
		return false;
	}

	//检测空值
	if(Pkey == '') {
		alert('请输入post参数的name');
		return false;
	}
	if(Pvalue == '') {
		alert('请输入post参数的value');
		return false;
	}

	var form = document.getElementsByTagName('form')[0];

	var inputNode = document.createElement('input');
	inputNode.type = 'text';
	inputNode.name = Pkey;
	inputNode.value = Pvalue;
	inputNode.id = 'param_' + Pkey;
	var nameNode = document.createElement('span');

	
	var colorIndex = Math.floor(Math.random()*10);
	nameNode.style.color = colorArr[colorIndex];
	nameNode.innerText = Pname || Pkey + ':';
	form.appendChild(nameNode);
	form.appendChild(inputNode);

}

var urlArrIndex = 0;
var urlArr = ['https://apicrm-develop.migang.com'];
var urlArrLengh = urlArr.length;
function changeAction() {
	urlArrIndex++;
	if(urlArrIndex  == urlArrLengh) {
		urlArrIndex = 0;
	}
	UrlForm = urlArr[urlArrIndex];
	var current = document.getElementById('currentActionUrl');
	var colorIndex = Math.floor(Math.random()*10);
	current.style.color = colorArr[colorIndex];
	current.innerHTML = UrlForm;
	Url = document.getElementById("actionUrl");
	Url.value=UrlForm;
}
</script>
</body></html>";
?>