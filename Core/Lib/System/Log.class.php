<?php
namespace Core\Lib\System;
/**
 * 日志记录
 * @author jzz
 */
Class Log{
	/**
	 * [RecordLogs 获取访问信息]
	 * @param string $RouteData [URL数据]
	 * @author jzz
	 */
	private function RecordLogs($RouteData=""){
		$Str = "";
		$Ip = GetIp();
		$time = date('Y-m-d H:i:s',time());
		if (!empty($RouteData['3'])) {
			$RouteDataMethod = explode('?',$RouteData['3']);
			$Str = PHP_EOL."[ {$time} => {$Ip} ] : {$RouteData['1']}/{$RouteData['2']}/{$RouteDataMethod['0']} ".PHP_EOL." 	InputData：".$RouteData['InputData'];
		}
		return $Str;
	}

	/**
	 * [WriteLogs 将日志写入文件爱你]
	 * @param [type] $RouteData [description]
	 * @param [type] $log_path  [description]
	 */
	public function WriteLogs($RouteData,$LogPath){
		if (!empty($RouteData) && !empty($LogPath)) {
			$Text = $this->RecordLogs($RouteData).PHP_EOL;
			$Text .="{$RouteData['ImplementData']}";
			// $handle = fopen($LogPath, "a+");
			// if(!fwrite($handle, $Text)){
			// 	\Core\Lib\System\Prompt::ViewError("日志写入失败，请查看Log文件夹是否有可写权限 ！");exit;
			// }
			if (!file_put_contents($LogPath,$Text,FILE_APPEND)) {
				\Core\Lib\System\Prompt::ViewError("日志写入失败，请查看Log文件夹是否有可写权限 ！");exit;
			}
		}
	}
}