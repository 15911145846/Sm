<?php
namespace Note\Controller;
use Note\Controller\BaseController;
/**
* @author jzz
* 此类由系统自动生成！
*/
Class IndexController extends BaseController{

	/**
	 * [index 用户笔记列表]
	 * @return [type] [array]
	 * @author jzz
	 */
	public function index(){
		$where = "";
		$UserIdInfo = GetCookie('Member');
		if (empty($UserIdInfo)) {
			EditCookie('MemberInfo','');
			Tourl('/Note/User/UserLogin');
		}
		if (!empty($this->SearchSubstance)) {
			$SearchSubstance = $this->encrypt($this->SearchSubstance,'jzz');
			$where .= " and remark like '%{$SearchSubstance}%'";
		}
		$UserNoteList = M('Note.Model.Notes')->GetUserNotesList($this->decrypt($UserIdInfo,GetCookie('MemberInfo')),$where);
		$this->assign('UserNoteInfo',$UserNoteList);
		$this->assign('SearchSubstance',$this->SearchSubstance);
		$this->display();
	}

	/**
	 * [NoteAdd 添加笔记]
	 * @author jzz
	 */
	public function NoteAdd(){
		$this->display();
	}

	/**
	 * [NoteAdd 添加笔记 及 修改笔记]
	 * @author jzz
	 */
	public function NoteAddDo(){
		if (!empty($this->Noteinfo)) {
			M('Note.Model.Notes')->EditNoteInfo($this->encrypt($this->note,'jzz'),$this->Noteinfo);
		}else{
			if (!empty($this->remark)) {
				$UserId = $this->decrypt(GetCookie('Member'),GetCookie('MemberInfo'));
				M('Note.Model.Notes')->AddNoteData($this->encrypt($this->remark,'jzz'),$this->encrypt($this->note,'jzz'),$UserId);
			}
		}
		Tourl('/Note/Index/index');
	}

	/**
	 * [RecycleBin 回收站列表]
	 * @author jzz
	 */
	public function RecycleBin(){
		$where = "";
		$UserIdInfo = GetCookie('Member');
		if (empty($UserIdInfo)) {
			EditCookie('MemberInfo','');
			Tourl('/Note/User/UserLogin');
		}
		if (!empty($this->SearchSubstance)) {
			$SearchSubstance = $this->encrypt($this->SearchSubstance,'jzz');
			$where .= " and remark like '{$SearchSubstance}%'";
		}
		$UserNoteList = M('Note.Model.Notes')->GetRecycleBinList($this->decrypt($UserIdInfo,GetCookie('MemberInfo')),$where);
		$this->assign('UserNoteInfo',$UserNoteList);
		$this->assign('SearchSubstance',$this->SearchSubstance);
		$this->display();
	}

	/**
	 * [NoteInfo 笔记详情]
	 * @author jzz
	 */
	public function NoteInfo(){
		$UserId = $this->decrypt(GetCookie('Member'),GetCookie('MemberInfo'));
		if (!empty($this->nid) && empty($this->S)) {
			$this->assign('NoteInfo',M('Note.Model.Notes')->GetOneNoteInfo($this->nid,$UserId));
			$this->display("NoteAdd");exit;
		}else{
			$NoteData = M('Note.Model.Notes')->GetOneNoteInfo($this->nid,$UserId);
			if (empty($NoteData['note'])) {
				echo "没有数据！";exit;
			}
			echo html_entity_decode($this->decrypt($NoteData['note'],'jzz'));exit;
		}
		Tourl('/Note/Index/index');
	}

	/**
	 * [RecycleBinDo 放入回收站 及 恢复笔记]
	 * @author jzz
	 */
	public function RecycleBinDo(){
		if (!empty($this->nid)) {
			$State = $this->S;
			if (!empty($State) && $State=='R') {
				M('Note.Model.Notes')->InRecycleBin($this->nid,99);
				Tourl('/Note/Index/index');
			}else{
				M('Note.Model.Notes')->InRecycleBin($this->nid,1);
				Tourl('/Note/Index/index');
			}
			Tourl('/Note/Index/index');
		}
		Tourl('/Note/Index/index');
	}

	/**
	 * [Emport 导出笔记]
	 * @author jzz
	 */
	public function Emport(){
		$UserId = $this->decrypt(GetCookie('Member'),GetCookie('MemberInfo'));
		$n_id = $this->nid;
		$NoteInfo = array();
		if (!empty($this->nid)) {
			$NoteInfo = M("Note.Model.Notes")->GetOneNoteInfo($this->nid,$UserId);
		}
		$pwd = ROOT_PATH;
		$NoteData = $this->decrypt($NoteInfo['note'], 'jzz');
		ob_start();
		$str = html_entity_decode("<html><meta content='text/html; charset=utf-8' http-equiv='Content-Type'/>$NoteData</html>");
		echo $str;
		$EmportData = ob_get_contents();
		ob_end_flush();
		Header("Content-type:   application/octet-stream ");
		Header("Accept-Ranges:   bytes ");
		//Header("Accept-Length: " . filesize($datas));
		header("Content-Disposition:   attachment;   filename=" . trimall($this->decrypt($NoteInfo['remark'], 'jzz')) . ".doc");
	}

	/**
	 * [DeleteDo 删除笔记]
	 * @author jzz
	 */
	public function DeleteDo(){
		$UserId = $this->decrypt(GetCookie('Member'),GetCookie('MemberInfo'));
		if (!empty($this->nid)) {
			M('Note.Model.Notes')->DeleteNote($this->nid,$UserId);
			Tourl('/Note/Index/RecycleBin');exit;
		}
		Tourl('/Note/Index/index');
	}
}
