<?php 

//删除空格
function trimall($str) {
	$qian = array(" ", "　", "\t", "\n", "\r");
	$hou = array("", "", "", "", "");
	return str_replace($qian, $hou, $str);
}