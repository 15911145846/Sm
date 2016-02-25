<?PHP
/* *
 * @file            mg_excel_import.php
 * @description     Excel 导出
 * @author          jzz
 * @date            2015/04/29 19:05:22 PM
 */
require_once CORE_PATH.DS . 'Lib' . DS . 'Expansion'. DS . 'Util' . DS .'PHPExcel.php';
require_once CORE_PATH.DS . 'Lib' . DS . 'Expansion'. DS . 'Util' . DS .'PHPExcel/IOFactory.php';
require_once CORE_PATH.DS . 'Lib' . DS . 'Expansion'. DS . 'Util' . DS .'PHPExcel/Reader/Excel5.php';
require_once CORE_PATH.DS . 'Lib' . DS . 'Expansion'. DS . 'Util' . DS .'PHPExcel/Reader/Excel2007.php';
Class ExcelImport{
	/**
	*读取excel文件并把内容转换成数组
	*/
	public function Read($filename,$encode='utf-8'){
		$objReader = PHPExcel_IOFactory::createReader('Excel5');
		$objReader->setReadDataOnly(true);
		$objPHPExcel = $objReader->load($filename);
		$objWorksheet = $objPHPExcel->getActiveSheet();
		$highestRow = $objWorksheet->getHighestRow();
		$highestColumn = $objWorksheet->getHighestColumn();
		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
		$excelData=array();
	          	for($row =1;$row<=$highestRow;$row++){
			// for ($col = 0; $col < $highestColumnIndex; $col++) {
			for($col=0;$col<$highestColumnIndex;$col++){
				$excelData[$row][] =(string)$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
			}
		}
		return $excelData;
	}    
	/**
	 * [GetExcel Excel 导出]
	 * @param [type] $fileName [文件名称]
	 * @param [type] $headArr  [Excel头信息]
	 * @param [type] $data     [Excel 数据]
	 * @param string $title    [Excel 标题]
	 * @author jzz
	 */
	public function GetExcel($fileName,$headArr,$data,$title=''){
		if(empty($data) || !is_array($data)){
			die("data must be a array");
		}
		if(empty($fileName)){
			exit;
		}
		$time = date('YmdHis');
		$fileName .= '_'.$time.".xls";
		$objPHPExcel = new \PHPExcel(); //创建新的PHPExcel对象
		$objProps = $objPHPExcel->getProperties();

		//设置表头
		$key = ord("A");
		if (empty($headArr)) {
			exit;
		}
		foreach($headArr as $v){
			$colum = chr($key);
			$objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
			$key += 1;
		}
		$column = 2;
		$objActSheet = $objPHPExcel->getActiveSheet();
		foreach($data as $key => $rows){ //行写入
			$span = ord("A");
			foreach($rows as $keyName=>$value){// 列写入
			$j = chr($span);
			$objActSheet->setCellValue($j.$column, $value);
			$span++;
			}
			$column++;
		}
		//重命名表
		$fileName = iconv("utf-8", "GBK", $fileName);
		//设置活动单指数到第一个表,所以Excel打开这是第一个表
		if (!empty($title)) {
			$objPHPExcel->getActiveSheet()->setTitle($title);
		}else{
			$objPHPExcel->getActiveSheet()->setTitle('Simple');
		}
		$objPHPExcel->setActiveSheetIndex(0);
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$fileName.'"');
		header('Cache-Control: max-age=0');
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');//文件通过浏览器下载
	}
}

/**
 * 使用说明
	$data = array(array('1','182.92.150.116','2016-01-20 21:22:20'));
	$ReadExcelObj = New \ExcelImport();
	$ReadExcelObj->GetExcel('aaa',array('uid','ip','时间'),$data,'行为日志');
 */