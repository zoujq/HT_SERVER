<?php
  ini_set("display_errors", "On");//打开错误提示
  ini_set("error_reporting",E_ALL);//显示所有错误
  require_once './send_email_fun.php';

  $to_addr=$_REQUEST["to"];
  $title='火天物联(HuotianIOT)验证码';
  $code=mt_rand(1000,9999);
  $body=get_email_body($code);
 
  // 创建连接 $servername ,$username,$password,$dbname
  $conn = new mysqli("localhost", "serveruser", "kskdfjdf", "serversql");
 
  creat_verification_code($conn, $to_addr,$code);

  echo json_encode(send_email($to_addr,$title,$body));



  function creat_verification_code($conn, $to_addr,$code)
  {
    // 检测连接 
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO `serversql`.`var_code_tb` (`v_type`, `v_data`, `v_code`) VALUES ( 'email', '".$to_addr."', '".$code."')";

    $result =$conn->query($sql);
  }

  

  function get_email_body($code)
  {
    $body='<head>
          <base target="_blank" />
          <style type="text/css">::-webkit-scrollbar{ display: none; }</style>
          <style id="cloudAttachStyle" type="text/css">#divNeteaseBigAttach, #divNeteaseBigAttach_bak{display:none;}</style>
          <style id="blockquoteStyle" type="text/css">blockquote{display:none;}</style>
          <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
          <style type="text/css">
              body{font-size:14px;font-family:arial,verdana,sans-serif;line-height:1.666;padding:0;margin:0;overflow:auto;white-space:normal;word-wrap:break-word;min-height:100px}
              td, input, button, select, body{font-family:Helvetica, "Microsoft Yahei", verdana}
              pre {white-space:pre-wrap;white-space:-moz-pre-wrap;white-space:-pre-wrap;white-space:-o-pre-wrap;word-wrap:break-word;width:95%}
              th,td{font-family:arial,verdana,sans-serif;line-height:1.666}
              img{ border:0}
              header,footer,section,aside,article,nav,hgroup,figure,figcaption{display:block}
              blockquote{margin-right:0px}
          </style>
      </head>
      <body tabindex="0" role="listitem">
      <table width="700" border="0" align="center" cellspacing="0" style="width:700px;">
          <tbody>
          <tr>
              <td>
                  <div style="width:700px;margin:0 auto;border-bottom:1px solid #ccc;margin-bottom:30px;">
                      <table border="0" cellpadding="0" cellspacing="0" width="700" height="39" style="font:12px Tahoma, Arial, 宋体;">
                          <tbody><tr><td width="210"></td></tr></tbody>
                      </table>
                  </div>
                  <div style="width:680px;padding:0 10px;margin:0 auto;">
                      <div style="line-height:1.5;font-size:14px;margin-bottom:25px;color:#4d4d4d;">
                          <strong style="display:block;margin-bottom:15px;">尊敬的用户：<span style="color:#f60;font-size: 16px;"></span>您好！</strong>
                          <strong style="display:block;margin-bottom:15px;">
                              您正在进行<span style="color: red">验证登录</span>操作，请在验证码输入框中输入：<span style="color:#f60;font-size: 24px">'.$code.'</span>，以完成操作。
                          </strong>
                      </div>
                      <div style="margin-bottom:30px;">
                          <small style="display:block;margin-bottom:20px;font-size:12px;">
                              <p style="color:#747474;">
                                  注意：此操作可能会绑定登录邮箱，如非本人操作，请忽略此邮件！
                                  <br>（工作人员不会向你索取此验证码，请勿泄漏！)
                              </p>
                          </small>
                      </div>
                  </div>
                  <div style="width:700px;margin:0 auto;">
                      <div style="padding:10px 10px 0;border-top:1px solid #ccc;color:#747474;margin-bottom:20px;line-height:1.3em;font-size:12px;">
                          <p>此为系统邮件，请勿回复！   <br/>
                          <a href="http://www.huotiantech.com">火天官网</a>
                          </p>
                          <p>火天物联团队 </p>
                          
                      </div>
                  </div>
              </td>
          </tr>
          </tbody>
      </table>
      </body>';

      return $body;
  }

?>

        