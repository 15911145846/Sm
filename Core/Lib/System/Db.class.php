<?php
namespace Core\Lib\System;
/**
 * Sm 数据库中间层实现类
 * @author  jzz
 */
Class Db {
    protected $DbObj;
    protected $SQL;
    protected $Field = '*';
    protected $limit;
    protected $order;
    protected $SqlWhereInfo;
    protected $Prefix;

    /**
     * 取得数据库类实例
     * @static
     * @access public
     * @return mixed 返回数据库驱动 对象
     */
    public function GetInstance() {
        $args = func_get_args();
        $MysqlType = "Db".$args['0'];
        $this->dbType = $MysqlType;
        $MysqlInfo = $args['1'];
        $this->Prefix = $args['2'];
        $NewObj = "\Core\Library\Driver\Db\\".$MysqlType;
        $this->DbObj = New $NewObj($MysqlInfo);
        return $this;
    }

    /**
     * [execute 执行原生SQL]
     * @param  string $sql [description]
     * @return [type]      [description]
     */
    public function Execute($sql=''){
        if (empty($sql)) {
            return false;
        }
        $OperationType = "Query";
        $StrFilter = array('DELETE','UPDATE','INSERT');
        foreach ($StrFilter as $value) {
            if(strstr($sql,"$value")){
                $OperationType = "PrepareQuery";
            }
        }
        return $this->DbObj->$OperationType($sql);
    }
}