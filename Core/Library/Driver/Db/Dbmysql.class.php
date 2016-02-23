<?php
namespace Core\Library\Driver\Db;
use PDO;
use PDOException;

Class Dbmysql{
	//pdo对象
	private $Charset;
	private $MysqlDbObj = NULL;
	private $ErrorData;

	/**
	 * [__construct 构造方法 初始化数据库连接]
	 * @param string $Config [数据库配置信息]
	 * @author jzz
	 */
	public function __construct($Config='') {
		$this->Charset = !empty($Config['Charset'])?$Config['Charset']:"UTF8";
		$ATTR_PERSISTENTS = !empty($Config['ATTR_PERSISTENTS']) ? $Config['ATTR_PERSISTENTS'] : false;
		$this->MysqlDbObj = New PDO("{$Config['DbType']}:host={$Config['Host']};port={$Config['Port']};dbname={$Config['Dbname']}", "{$Config['Username']}", "{$Config['Password']}", array(PDO::ATTR_PERSISTENT => $ATTR_PERSISTENTS));
		$this->Query("SET NAMES {$this->Charset}");
	}

	/**
     * [query SQL语句执行函数]
     * @param  [type] $sql [string $sql SQL语句内容]
     * @return [type]      [mixed]
     * @author jzz
     */
    public function Query($sql = "SELECT 1") {
		$sth    = $this->MysqlDbObj->Query($sql);
		$sth   -> execute();
		$result = $sth -> fetchAll(PDO::FETCH_ASSOC);//PDO::FETCH_UNIQUE
        $ErrorData = $this->GetPDOError($sth);
		if (defined("MysqlDebug") &&  MysqlDebug==true && $ErrorData!="") {
	 		\Core\Lib\System\Prompt::ViewError("$ErrorData");exit;
		}
		$ResuleData = array();
		foreach ($result as $value) {
				$ResuleData[] = (array) $value;
		}
		return $ResuleData;
    }

    /**
     * [PrepareQuery 执行update、dalete、insert 操作]
     * @param string $sql [SQL语句]
     * @author jzz
     */
    public function PrepareQuery($sql=''){
        $LastId = 0;
    	$stmt = $this->MysqlDbObj->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    	$Res = $stmt->execute();
    	$ErrorData = $this->GetPDOError($stmt);
 		if (defined("MysqlDebug") && MysqlDebug==true && $ErrorData!="") {
 			\Core\Lib\System\Prompt::ViewError("$ErrorData");exit;
 		}
    	if($Res==TRUE && strstr($sql,"INSERT")){
    		return $this->GteLastId();
    	}else{
    		return $Res;
    	}
    }

    /**
     * [GteLastId 获取最后一次添加的id]
     * @author jzz
     */
    public function GteLastId(){
        return $this->MysqlDbObj->lastInsertId();
    }

    /**
     * [GetErrorData 捕获PDO错误信息]
     * @author jzz
     */
    public function GetPDOError($sth){
        if ($sth->errorCode() != '00000'){
            $error = $sth->errorInfo();
            return !empty($error[2])?$error[2]:"";
        }
    }
}
