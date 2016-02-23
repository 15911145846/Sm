<?php
namespace Home\Controller\Lib\ORG;
/**
 * File name ExcelHandle.class.php
 * excel 处理
 * @author jzz
 */
require_once './PHPExcel.php';
require_once './PHPExcel/IOFactory.php';
require_once './PHPExcel/Reader/Excel5.php';
Class ExcelHandle{
	private $FilePath = NULL; // excel 文件路径
	private $HighestRow;
	private $ObjPHPExcel;
	/**
	 * [__construct 构造方法]
	 * @param [type] $FilePath [文件路径信息]
	 * @author jzz
	 */
	public function __construct($FilePath){
		$this->FilePath = $FilePath;
	}

	/**
	 * [ReadFileData 处理Excel]
	 * @author jzz
	 */
	public function ReadFileData(){
		if (empty($this->FilePath)) {
			exit("文件路径不能为空！");
		}
		// 判断文件类型
		$FileData = explode('.', $this->FilePath);
		$FileType = $FileData['1'] == 'xls' ? 'Excel5' : 'Excel2007';
		$objReader = PHPExcel_IOFactory::createReader($FileType); //use excel2007 for 2007 format
		$this->objPHPExcel = $objReader->load($this->FilePath); //即Excel文件的路径
		$sheet = $this->objPHPExcel->getSheet(0); //获取第一个工作表
		$this->HighestRow = $sheet->getHighestRow(); //取得总行数
		//$highestColumn = $sheet->getHighestColumn(); //取得总列数
		$highestColumn = $sheet->getHighestColumn();
		$HighestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);  
		return $this->GetExcelData($HighestColumnIndex);
	}

	/**
	 * [GetExcelData 读取Excel文件内容]
	 * @param [type] $highestColumnIndex [description]
	 * @author jzz
	 */
	private function GetExcelData($highestColumnIndex){
		$GetData = array();
		//循环读取excel文件,读取一条,插入一条
		for ($i = 0; $i <= $this->HighestRow; $i++) {
		    $Str = '';
		    for ($j=1; $j<=$highestColumnIndex; $j++) {
		        $Str .= $this->objPHPExcel->getActiveSheet()->getCellByColumnAndRow($j, $i)->getValue() . '\\';
		    }
		    $Strs = explode("\\", $Str);
		    $GetData[] = array_filter($Strs);
		}
		return array_filter($GetData);
	}
}

