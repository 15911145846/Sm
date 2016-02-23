<?php 
use Core\Library\Model\BaseModel;
/**
 * 用户model
 */
Class Notes extends BaseModel{
	/**
	 * [GetUserNotesList 获取用户笔记数据]
	 * @param [type] $UserId [用户ID]
	 * @author jzz
	 */
	public function GetUserNotesList($UserId,$where){
		$ReturnData = $this->where(array('u_id'=>"$UserId",'state'=>"1"))->other($where)->findAll('note');
		return $ReturnData;
	}

	/**
	 * [GetRecycleBinList 获取回收站内数据]
	 * @param [type] $UserId [用户ID]
	 * @author jzz
	 */
	public function GetRecycleBinList($UserId,$where){
		$ReturnData = $this->where(array('u_id'=>"$UserId",'state'=>"99"))->other($where)->findAll('note');
		return $ReturnData;
	}

	/**
	 * [GetOneNoteInfo 获取笔记详情]
	 * @param integer $NoteId [笔记ID]
	 * @author jzz
	 */
	public function GetOneNoteInfo($NoteId=0,$UserId=0){
		$UserId = !empty($UserId)?$UserId:"-1";
		$ReturnData = $this->where(array('id'=>"$NoteId",'u_id'=>"$UserId"))->find('note');
		return $ReturnData;
	}

	/**
	 * [EditNoteInfo 修改笔记]
	 * @param [type] $NoteData [笔记数据]
	 * @param [type] $NoteId   [笔记ID]
	 * @author jzz
	 */
	public function EditNoteInfo($NoteData,$NoteId){
		$time = time();
		$data = array(
				'note'=>"$NoteData",
				'edittime'=>"$time"
			);
		$ReturnData = $this->where(array('id'=>"$NoteId",'state'=>1))->edit('note',$data);
		return $ReturnData;
	}

	/**
	 * [InRecycleBin 放入回收站 及 恢复笔记]
	 * @param [type] $NoteId    [笔记ID]
	 * @param [type] $NoteSatae [笔记状态]
	 * @author jzz
	 */
	public function InRecycleBin($NoteId,$NoteSatae=1){
		$time = time();
		$data = array(
				'state'=>"$NoteSatae",
				'edittime'=>"$time"
			);
		$ReturnData = $this->where(array('id'=>"$NoteId"))->edit('note',$data);
		return $ReturnData;
	}

	/**
	 * [AddNoteData 添加笔记]
	 * @param [type] $Remark   [笔记标题]
	 * @param [type] $NoteData [笔记数据]
	 * @param [type] $UserId   [用户ID]
	 * @author jzz
	 */
	public function AddNoteData($Remark,$NoteData,$UserId){
		$time = time();
		$data = array(
				'ctime'=>"$time",
				'note'=>"$NoteData",
				'remark'=>"$Remark",
				'u_id'=>"$UserId",
				'state'=>"1"
			);
		$ReturnData = $this->insert('note',$data);
		return $ReturnData;
	}

	/**
	 * [DeleteNote 彻底删除笔记]
	 * @param [type] $NoteId [笔记ID]
	 * @author jzz
	 */
	public function DeleteNote($NoteId,$UserId){
		$UserId = !empty($UserId)?$UserId:"-1";
		$ReturnData = $this->where(array('id'=>"$NoteId",'u_id'=>"$UserId"))->del('note');
		return $ReturnData;
	}
}