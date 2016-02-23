<?php 
/**
 * 邮件发送
 * @author jzz
 */
require_once(__DIR__ . DS . 'PHPMailer/class.phpmailer.php');
require_once(__DIR__ . DS . "PHPMailer/class.smtp.php");

Class emailService{
	private $mailObj;
	private $Host = "smtp.migang.com"; // 邮件服务器地址
	private $Port = "587"; // 邮件服务器端口
	private $Username; // 发件人邮箱地址
	private $Password; // 发件人邮箱密码
	private $MailTitle;// 邮件标题
	private $MailConnect;// 邮件内容
	private $AddRessee; //收件人邮箱地址
	private $AddResseeName; // 收件人姓名（可选）

	public function __construct($Host,$Port,$Username,$Password,$AddRessee,$MailTitle,$MailConnect,$AddResseeName){
		$this->Host = $Host;
		$this->Port = $Port;
		$this->Username = $Username;
		$this->Password = $Password;
		$this->MailTitle = $MailTitle;
		$this->MailConnect = $MailConnect;
		$this->AddRessee = $AddRessee;
		$this->AddResseeName = $AddResseeName;
		$this->mailObj  = new PHPMailer();
	}

	/**
	 * [SendEmail 发送邮件]
	 */
	public function SendEmail(){
		$this->mailObj->CharSet    ="UTF-8";                 //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置为 UTF-8
		$this->mailObj->IsSMTP();                            // 设定使用SMTP服务
		$this->mailObj->SMTPAuth   = true;                   // 启用 SMTP 验证功能
		//$this->mailObj->SMTPSecure = "ssl";                  // SMTP 安全协议
		$this->mailObj->Host       = $this->Host;       // SMTP 服务器
		$this->mailObj->Port       = $this->Port;       // SMTP服务器的端口号
		$this->mailObj->Username   = $this->Username;  	// SMTP服务器用户名
		$this->mailObj->Password   = $this->Password;        // SMTP服务器密码
		$this->mailObj->SetFrom($this->Username, $this->Username);    // 设置发件人地址和名称
		$this->mailObj->AddReplyTo($this->Username,$this->Username); // 设置邮件回复人地址和名称
		$this->mailObj->Subject    = $this->MailTitle;                     // 设置邮件标题
		$this->mailObj->AltBody    = "为了查看该邮件，请切换到支持 HTML 的邮件客户端";  // 可选项，向下兼容考虑
		$this->mailObj->MsgHTML($this->MailConnect);                         // 设置邮件内容
		$this->mailObj->AddAddress($this->AddRessee, !empty($this->AddResseeName)?$this->AddResseeName:$this->AddRessee); // 收件人邮箱地址
		//$this->mailObj->AddAttachment("images/phpmailer.gif"); // 附件 
		if(!$this->mailObj->Send()) {
		    return array('status'=>false,'erroe'=>$mail->ErrorInfo);
		} else {
		    return array('status'=>true,'erroe'=>'');
		}
	}
}