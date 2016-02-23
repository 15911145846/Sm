<?php
namespace Applioation\Crm\Controller;
use Core\Library\Controller\Kernel;
/**
* @author jzz
* 此类由系统自动生成！
*/
Class BaseController extends Kernel{
	private $actionUrl = "https://apicrm-develop.migang.com";
	private $secretkey = 'cGEQKNFeXSGM1z46RxgsfAq57wpZCd0HPyVgDvb9tiUIarouh2lWkTO5vMCoSUNweG43sDfTaOVAZzrgd9EArray';

	/**
	 * [GetCrmData 请求远程crm数据接口]
	 * @param array $Parameter [请求的参数]
	 * @author jzz
	 */
	public function GetCrmData($Parameter=array()){
		if (empty($Parameter)) {
			return array();
		}
		$sign = $this->getSign($Parameter, array('sign', 'phonetype'));
		$Parameter['sign'] = $sign;
		$Parameter['web_test'] = 'true';
		$type = !empty($Parameter['type'])?$Parameter['type']:"POST";
		$data = $this->http("$this->actionUrl","$type",$Parameter);
		return $data['1'];
	}

	/**
	 *@author JZZ
	 *@desc 获得签名
	 *@param $inputArr Array  传入的字段数组
	 *@param $filterFields Array 需要过滤掉的不参与运算的字段
	 *@param $secretkey string 秘钥
	 */
	private function getSign($inputArr, $filterFields = array(), $secretkey = '', $debug = false) {
		if (!empty($filterFields)) {
			foreach ($filterFields as $value) {
				if (isset($inputArr[$value])) {
					unset($inputArr[$value]);
				}

			}
		}
		$inputArr['secretkey'] = !empty($secretkey) ? $secretkey : $this->secretkey;
		ksort($inputArr, SORT_STRING);
		$str = '';
		if (!empty($inputArr)) {
			foreach ($inputArr as $key => $value) {
				$str .= $key . '=' . $value;
			}
		}

		$str = trim($str); //这个必须
		$sign = md5($str);
		if ($debug) {
			return array('string' => $str, 'sign' => $sign);
		}
		return $sign;
	}
}