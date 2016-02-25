<?php
header("Content-type:text/html;charset=utf-8");
//定义一个接口
interface Image {

	 function type($data,$path);

	 function upload_file();
	
}
// 利用 implements 实现一个接口
Class Upload{

	protected $name = '';//文件名称
	protected $type = '';//文件类型
	protected $tmp_name = '';//图片临时路径
	protected $error = '';//错误信息
	protected $size = '';//图片长度
	protected $path = '';//图片路径
	//type 方法是将数据分析后传递给upload_file方法
	public function type($data,$path){

		foreach ($data as $key => $value) {
			//将值赋给指定的属性
			$this -> name = $data[$key]['name'];
			$this -> type = $data[$key]['type'];
			$this -> tmp_name = $data[$key]['tmp_name'];
			$this -> error = $data[$key]['name'];
			$this -> size = $data[$key]['size'];
		}
		$this -> path = $path;
		return $this -> upload_file();
	}
	//upload_file 方法是将文件上传指定目录
	public function upload_file(){

		$name = time().'.'.substr(strrchr($this -> path.$this -> name, '.'), 1);
		$yes = array('original_name' => $this -> name,'present_name' => $name,'type' => $this -> type,'size' => round($this -> size/1024/1024, 2).'MB','status' => '上传成功');
		$no = array('error' => $this -> error,'status' => '上传失败');
		move_uploaded_file($this -> tmp_name,$this -> path.$name);
		if (is_file($this -> path.$name))
		{
			return $yes;
		}else{
			return $no;
		}
	}
}


