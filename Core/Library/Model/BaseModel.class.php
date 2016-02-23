<?php
namespace Core\Library\Model;
use Core\Library\Controller\Kernel;

/**
 * 模型基类
 * @author jzz
 */
Class BaseModel extends Kernel{
	private $db;
	private $where;
	public $Resources; //执行SQL后返回的资源
	private $RouteData = array();
	private $OtherData;
	public $GetExecLastSql; // 最后执行的sql

	/**
	 * [__construct 构造方法]
	 * @author jzz
	 */
	public function __construct($db){
		parent::__construct();
		$RouteObj = New \Core\Lib\System\System_Core();
		$this->RouteData['RouteData'] = $RouteObj::$RouteData;
		$this->RouteData['GroupData'] = $RouteObj::$GroupData;
		$this->RouteData['AppNameData'] = $RouteObj::$AppNameData;
		$this->RouteData['ApplicationPath'] = $RouteObj::$ApplicationPath;
		$this->db = $db;
	}

	/**
	 * [CheckPrepareSql SQL语句过滤]
	 * @param [type] $sql [sql语句]
	 * @author jzz
	 */
	public function CheckPrepareSql($sql){
		return $sql;
	}

	/**
	 * [query 执行原生SQL语句]
	 * @param  [type] $db  [string]
	 * @param  string $sql [string]
	 * @return [type]      [array]
	 * @author jzz
	 */
	public function query($sql=''){
		if (!empty($this->db) && !empty($sql)) {
			$sql = $this->CheckPrepareSql($sql);
			$this->Resources = $this->db($this->db)->Execute($sql);
			$this->GetExecLastSql = $sql;
		}
		return $this->Resources;
	}

	/**
	 * [GetTableName 获取表名]
	 * @param [type] $Table [表名]
	 * @author jzz
	 */
	private function GetTableName($Table){
		$ConfInfo = GetConfData($this->RouteData['AppNameData'],$this->RouteData['GroupData'],'DbConfig');
		$TablePrefix = $ConfInfo[$this->db]['Prefix'];
		return $TablePrefix.$Table;
	}

	/**
	 * [where 生成where条件]
	 * @param  array  $WhereData [where条件数组]
	 * @return [type]            [object]
	 * @author jzz
	 */
	public function where($WhereData = array()){
		$where = ' WHERE 1=1 ';
		if (!empty($WhereData)) {
			foreach ($WhereData as $key => $value) {
				if (is_array($value)) {
					$where .= " AND {$key} IN(".implode(',',$value).") ";
				}else{
					$where .= " AND {$key}='{$value}' ";
				}
				
			}
			$this->where = $where;
		}
		return $this;
	}

	/**
	 * [other 其他条件（排序&&limit等等）]
	 * @param  string $OtherData [条件字符串]
	 * @return [type]            [object]
	 * @author jzz
	 */
	public function other($OtherData = ""){
		$this->OtherData = $OtherData;
		return $this;
	}

	/**
	 * [find 查询一条数据]
	 * @param  string $TableName [数据表名]
	 * @param  array  $FieldInfo [要查询的字段]
	 * @return [type]            [array]
	 * @author jzz
	 */
	public function find($TableName='',$FieldInfo = array()){
		if (empty($TableName)) {
			return false;exit;
		}
		$TableName = $this->GetTableName($TableName);
		$Field = !empty($FieldInfo)?implode(',',$FieldInfo):"*";
		$SQL = "SELECT {$Field} FROM `{$TableName}` {$this->where} {$this->OtherData} LIMIT 1";
		$Resources = $this->query($SQL);
		return !empty($Resources['0'])?$Resources['0']:array();
	}

	/**
	 * [findAll 查询多条数据]
	 * @param  string $TableName [数据表名]
	 * @param  array  $FieldInfo [要查询的字段]
	 * @return [type]            [array]
	 * @author jzz
	 */
	public function findAll($TableName='',$FieldInfo = array()){
		if (empty($TableName)) {
			return false;exit;
		}
		$TableName = $this->GetTableName($TableName);
		$Field = !empty($FieldInfo)?implode(',',$FieldInfo):"*";
		$SQL = "SELECT {$Field} FROM `{$TableName}` {$this->where} {$this->OtherData}";
		return $this->query($SQL);
	}

	/**
	 * [edit 修改数据]
	 * @param  [type] $TableName [数据表名]
	 * @param  array  $FieldInfo [要修改的数据表字段和数据]
	 * @return [type]            [布尔]
	 * @author jzz
	 */
	public function edit($TableName,$FieldInfo = array()){
		$Field = " SET ";
		if (empty($TableName)) {
			return false;exit;
		}
		$TableName = $this->GetTableName($TableName);
		if (!empty($FieldInfo)) {
			foreach ($FieldInfo as $key => $value) {
				$Field .= " `{$key}`='{$value}',";
			}
			$Field = substr($Field,0,-1);
		}
		$SQL = "UPDATE `{$TableName}` {$Field} {$this->where}";
		return $this->query($SQL);
	}

	/**
	 * [del 删除数据]
	 * @param  [type] $TableName [数据表名]
	 * @return [type]            [布尔]
	 * @author jzz
	 */
	public function del($TableName){
		if (empty($TableName)) {
			return false;exit;
		}
		$TableName = $this->GetTableName($TableName);
		$SQL = "DELETE FROM `{$TableName}` {$this->where}";
		return $this->query($SQL);
	}

	/**
	 * [insert 添加数据]
	 * @param  [type] $TableName [数据表名]
	 * @param  array  $AddData   [要添加的数据]
	 * @return [type]            [布尔]
	 * @author jzz
	 */
	public function insert($TableName,$AddData=array()){
		$Field = "(";
		$Data = "VALUES(";
		$TableName = $this->GetTableName($TableName);
		if (empty($TableName) && empty($AddData)) {
			return false;exit;
		}
		foreach ($AddData as $key => $value) {
			$Field .= "`{$key}`,";
			$Data .= "'{$value}',";
		}
		$Field = substr($Field,0,-1).")";
		$Data = substr($Data,0,-1).")";
		$SQL = "INSERT INTO `{$TableName}` {$Field} {$Data}";
		return $this->query($SQL);
	}

	/**
	 * [GetLastSql 获取最后一次执行的sql]
	 * @author jzz
	 */
	public function GetLastSql(){
		return $this->GetExecLastSql;
	}
}