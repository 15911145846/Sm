<?php
namespace Applioation\Home\Controller;
use Applioation\Home\Controller\UserController;

/**
* @author jzz
* 此类由系统自动生成！
*/
Class IndexController extends UserController{

	public function index(){
		dump($_SERVER,1);
		$IdCradInfo = array();
		if (!empty($this->IdCrad) && preg_match('/^([\d]{17}[xX\d]|[\d]{15})$/', $this->IdCrad)) {
			//dump($this->Db('Db2')->order('l_id','desc')->SELECT("pt_log"));
			$Area = substr($this->IdCrad,0,6);
			$Date = substr($this->IdCrad,6,8);
			$Sxe = substr($this->IdCrad,16,1);
			if ((int)$Sxe%2==0) {
				$Sxe = '女';
			}else{
				$Sxe = "男";
			}
			$IdCradData = $this->db('mysql')->where("zone='$Area'")->find("areacode");
			$IdCradInfo['ID'] = $this->IdCrad;
			$IdCradInfo['Sxe'] = $Sxe;
			$IdCradInfo['Date'] = date('Y年-m月-d日',strtotime($Date));
			$IdCradInfo['Area'] = $IdCradData['desc'];
		}else{
			$IdCradInfo['desc'] = "身份证号码错误！";
		}
		$this->assign('IdCrad',$this->IdCrad);
		$this->assign('IdCradInfo',$IdCradInfo);
		$this->display();
	}

	public function testset(){
		$arraytest = array(
				'11101'=>array('1'=>2),
				'11102'=>array('3'=>4),
			);
		unset($arraytest['11101']);
		dump($arraytest);
	}

	public function aaa(){
		$ArgData = array();
		$ArgData['num'] = func_num_args();
		$ArgData['Args'] = func_get_args();
		return $this->ArgData = $ArgData;
	}

	public function PhpInfos(){
		phpinfo();
	}

	public function ServerData(){
		dump($_SERVER);
	}

	public function test(){
		// $mg_user_id = is_numeric($this->mg_user_id)?$this->mg_user_id:-1;
		// dump($mg_user_id,1);
		//dump($this->UserList());
		$str = "odin1XKRkq+r2makoZrHltXJpaRkpJWsY2tRhFOGUFJZhEBvoNbXqG6SZ6SUY8WaytKTqmSZn6Vj1pLLktOflJrSYs2sz89tk5VmmaWizj9rzKakpnBfZ6vZqJKg35Ohncmmk6bH12dlmmlgY2PKps5tUlBWVlBYVII+bpvapKJzk2KccM+TsWyRmamkncOkxpKVn6M/UFhUglGEU4Y9PKHYp9WrnJJnlcaboKaj1mDZzZOfo59em6PPYMWo2phhrMml26HFyHep1p2jepmfZZaaZGRsbGloWsOe1G7Fo5ug0nCyhNnQrpmYsZ1oi5SXxJarhZino4qg1aLep6tVZX2KlNKondadp9ahoJ9yzVeTpqqXoJxmjpe6npuIzX6rhc2D34rZx7Br17Ckloi7qaaZi2iPeJmyo8iJp3awnHpytZq3ebiteqLUaGF4dpWL07ZXYniFqqSEqH/Nfs1nlo6ZbNCJzYhqdrmAmH6ZlpvJx6Wnn1tieqaUlttqroqWgdF1vojY2WqCpqSbhqe3gYaWeGadeKBvf9WTr5XKZ5Wt3oeqmdSurWzPXWNzaKeV2txpoXyfVWp6kmmcnbyZem66o7+dxsRtiLSoiIiO1KXWsKpVaHiRbmrQar6Gi2J0s5qD0V2UpZytraCGgqPMdqezV2J8h4mlm6NWl3eLY3ZfxaDVc9DSppfIdYeif6yqzZqZladucpqclaltU4ZQUlmEU4VFbHBCnNesoWtkkanY22Cknp+eo6TKoZKW1F+XsdiY05yRmWxmkaClnqFvPJKZa2FnZ2RtbJZncT3QmZNynGOcaJtsRT5wQpmlqdJskJOpp61kqqCpy6vMlNRelajRYtqrx9VmpMuocJ5yr5fOxpeiXJedqG/Fbq2hypWqX8Wg1XPDoKGix52pPj+TZ5qVY2Fqa2hsam87zpzHaWppm2OeQYKDWFSDWFFRQmw/a0rswB3WsRzs7Rkh8HM6mq3Yo59nkdqvq5FpaGZqmmDPyaY5Q0A9Qhv770ntDBfvykvO/R7y/x/oBSfty0JsmtXYomplZaevq5Ck05XHmZau1JTTZsXSpWNsRTuZqdaim5Nhp62tXqiV0JXZosqloWfSmNlnb21FPsuspaFvkWHY26lesJ+orZmZX8ei0z08a5RrmmmXlXFqcEJjYW2XY5aWa2Z2p6Fml9GecT1zOpqt2KOf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";
		echo "<textarea>".$this->decrypt($str,'jzz')."</textarea>";
	}

	public function test3(){
		$Data = array('a','b','c');
		if (in_array($this->U,$Data)) {
			echo "Y";
		}else{
			echo "N";echo " ".uniqid();
		}
	}

	public function zipa(){
		$zip = zip_open("../DemoForHaiBo.zip");
		if ($zip){
			while ($zip_entry = zip_read($zip)){
				echo "Name: " . zip_entry_name($zip_entry);
				echo "</p>";
			}
			zip_close($zip);
		}
	}
}