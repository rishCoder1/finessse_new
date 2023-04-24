<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Query extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');    
    $this->load->model(array('index_model'));
    $this->load->library('form_validation');
    $this->load->library('email');
    $this->load->helper('custom_helper');
    $this->load->library('session');
  }

	public function adminmessagecontacthtml($email,$name,$company,$contactno,$service,$other_services)
	{

					 $msg ='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Finessse Digital</title>
</head>
<body topmargin="0" bottommargin="0" marginheight="0" marginwidth="0" leftmargin="0" rightmargin="0">
<table width="802" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#1ba6f7" >
  <tr>
    <td valign="top"><table width="800" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#ffffff">
        <tr>
          <td bgcolor="#fff" colspan="3" height="12"></td>
        </tr>
        <tr>
          <td align="center" valign="middle" colspan="3"><img src="http://finessse.digital/public/images/logo.png" /></td>
        </tr>
        <tr>
          <td bgcolor="#fff" colspan="3" height="12"></td>
        </tr>
        <tr>
          <td bgcolor="#1ba6f7" height="11" colspan="3"></td>
        </tr>
        <tr>
          <td bgcolor="#fff" colspan="3" height="12"></td>
        </tr>
        <tr>
          <td bgcolor="#fff" width="20" height="12"></td>
          <td><table width="100%" border="0" cellspacing="10" cellpadding="0">
              <tr>
                <td align="left"><font face="Arial" color="#222" size="2">Dear Admin,</font></td>
              </tr>
              <tr>
                <td align="left"><font face="Arial" color="#222" size="2">Please find user details:</font></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="100"><font face="Arial" color="#222" size="2">Name </font></td>
                      <td width="50">:</td>
                      <td><font face="Arial" color="#222" size="2">'.ucwords($name).'</font></td>
                    </tr>
                    <tr>
                      <td width="100"><font face="Arial" color="#222" size="2">Company </font></td>
                      <td width="50">:</td>
                      <td><font face="Arial" color="#222" size="2">'.ucwords($company).'</font></td>
                    </tr>
                    <tr>
                      <td><font face="Arial" color="#222" size="2"> Email</font></td>
                      <td>:</td>
                      <td><font face="Arial" color="#222" size="2"> <a href="mailto:'.$email.'" style="color:#1ba6f7;text-decoration:none">'.$email.'</a></font></td>
                    </tr>
                    <tr>
                      <td><font face="Arial" color="#222" size="2"> Contact</font></td>
                      <td>:</td>
                      <td><font face="Arial" color="#222" size="2">'.$contactno.'</font></td>
                    </tr>
                    <tr>
                      <td><font face="Arial" color="#222" size="2"> Service</font></td>
                      <td>:</td>
                      <td><font face="Arial" color="#222" size="2">'.$service.'</font></td>
                    </tr>
                    ';
                    
                    if(!empty($other_services)){	
                    $msg.='
                    <tr>
                      <td><font face="Arial" color="#222" size="2">Other Service Query</font></td>
                      <td>:</td>
                      <td><font face="Arial" color="#222" size="2">'.$other_services.'</font></td>
                    </tr>
                    ';
                    
                    }
                    
                    $msg.=       '
                  </table>
                </td>
              </tr>
              <tr>
                <td bgcolor="#fff"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td>
              </tr>
              <tr>
                <td bgcolor="#fff"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td>
              </tr>
              <tr>
                <td align="left" style="line-height:1.5em"><font face="Arial" color="#222" size="2">Regards,<br/>
                  Finessse Interactive Solutions Pvt. Ltd.<br/>
                  B1/639 A, Janakpuri, West Delhi  <br/>
                  New Delhi - 110058 (INDIA)<br/>
                  Pnone: <a href="tel:+91- 9810619956" style="color:#1ba6f7;text-decoration:none">+91- 9810619956</a> <a href="tel:+91-11-45588792" style="color:#1ba6f7;text-decoration:none">+91-11-45588792</a><br/>
                  Email: <a href="mailto:info@finessse.digital" style="color:#1ba6f7;text-decoration:none">info@finessse.digital</a> </font></td>
              </tr>
            </table>
          </td>
          <td bgcolor="#fff" width="20"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif"  /></td>
        </tr>
        <tr>
          <td bgcolor="#fff" colspan="3" height="12"></td>
        </tr>
        <tr>
          <td bgcolor="#1ba6f7" align="center" height="30" colspan="3"><font face="Arial" color="#fff" size="2"> Copyright '.date('Y').' Finessse Interactive. All Rights Reserved.</font></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>';
					return $msg;

	}
	
	public function quoteadminmsghtml($data)
	{

					 $msg ='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Finessse Digital</title>
</head>
<body topmargin="0" bottommargin="0" marginheight="0" marginwidth="0" leftmargin="0" rightmargin="0">
<table width="802" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#1ba6f7" >
  <tr>
    <td valign="top"><table width="800" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#ffffff">
        <tr>
          <td bgcolor="#fff" colspan="3" height="12"></td>
        </tr>
        <tr>
          <td align="center" valign="middle" colspan="3"><img src="http://finessse.digital/public/images/logo.png" /></td>
        </tr>
        <tr>
          <td bgcolor="#fff" colspan="3" height="12"></td>
        </tr>
        <tr>
          <td bgcolor="#1ba6f7" height="1" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="1" /></td>
        </tr>
        <tr>
          <td bgcolor="#fff" colspan="3" height="12"></td>
        </tr>
        <tr>
          <td bgcolor="#fff" width="20"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif"  /></td>
          <td><table width="100%" border="0" cellspacing="10" cellpadding="0">
              <tr>
                <td align="left"><font face="Arial" color="#222" size="2">Dear Admin,</font></td>
              </tr>
              <tr>
                <td align="left"><font face="Arial" color="#222" size="2">Please find user details:</font></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="100"><font face="Arial" color="#222" size="2">Name </font></td>
                      <td width="50">:</td>
                      <td><font face="Arial" color="#222" size="2">'.ucwords($data->name).'</font></td>
                    </tr>
                    <tr>
                      <td width="100"><font face="Arial" color="#222" size="2">Company </font></td>
                      <td width="50">:</td>
                      <td><font face="Arial" color="#222" size="2">'.ucwords($data->company).'</font></td>
                    </tr>
                    <tr>
                      <td><font face="Arial" color="#222" size="2"> Email</font></td>
                      <td>:</td>
                      <td><font face="Arial" color="#222" size="2"> <a href="mailto:'.$data->email.'" style="color:#1ba6f7;text-decoration:none">'.$data->email.'</a></font></td>
                    </tr>
                    <tr>
                      <td><font face="Arial" color="#222" size="2"> Contact</font></td>
                      <td>:</td>
                      <td><font face="Arial" color="#222" size="2">'.$data->contactno.'</font></td>
                    </tr>
                    <tr>
                      <td><font face="Arial" color="#222" size="2"> Industry</font></td>
                      <td>:</td>
                      <td><font face="Arial" color="#222" size="2">'.$data->industry.'</font></td>
                    </tr>
                    <tr>
                      <td><font face="Arial" color="#222" size="2"> Website</font></td>
                      <td>:</td>
                      <td><font face="Arial" color="#222" size="2"><a target="_blank" href="'.$data->website.'">'.$data->website.'</a></font></td>
                    </tr>
                    <tr>
                      <td><font face="Arial" color="#222" size="2"> Service</font></td>
                      <td>:</td>
                      <td><font face="Arial" color="#222" size="2">'.$data->service.'</font></td>
                    </tr>
                    ';
                    
                    
                    $msg.=       '
                  </table>
                </td>
              </tr>
              <tr>
                <td bgcolor="#fff"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td>
              </tr>
              <tr>
                <td bgcolor="#fff"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td>
              </tr>
              <tr>
                <td align="left" style="line-height:1.5em"><font face="Arial" color="#222" size="2">Regards,<br/>
                  Finessse Interactive Solutions Pvt. Ltd.<br/>
                  B1/639 A, Janakpuri, West Delhi  <br/>
                  New Delhi - 110058 (INDIA)<br/>
                  Pnone: <a href="tel:+91- 9810619956" style="color:#1ba6f7;text-decoration:none">+91- 9810619956</a> <a href="tel:+91-11-45588792" style="color:#1ba6f7;text-decoration:none">+91-11-45588792</a><br/>
                  Email: <a href="mailto:info@finessse.digital" style="color:#1ba6f7;text-decoration:none">info@finessse.digital</a> </font></td>
              </tr>
            </table>
          </td>
          <td bgcolor="#fff" width="20"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif"  /></td>
        </tr>
        <tr>
          <td bgcolor="#fff" colspan="3" height="12"></td>
        </tr>
        <tr>
          <td bgcolor="#1ba6f7" align="center" height="30" colspan="3"><font face="Arial" color="#fff" size="2"> Copyright '.date('Y').' Finessse Interactive. All Rights Reserved.</font></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>';
					return $msg;

	}

	function usermessagehtml($email,$name,$contactno,$message)
    {
			 $msg ='
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title>Finessse Digital</title>
        </head>
<body topmargin="0" bottommargin="0" marginheight="0" marginwidth="0" leftmargin="0" rightmargin="0">
        <table width="802" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#1ba6f7" >
  <tr>
            <td valign="top"><table width="800" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#ffffff">
                <tr>
                <td bgcolor="#fff" colspan="3" style="height:12px;"></td>
              </tr>
                <tr>
                <td align="center" valign="middle" colspan="3" ><img src="http://finessse.digital/public/images/logo.png" /></td>
              </tr>
                <tr>
                <td bgcolor="#fff" colspan="3" style="height:12px;"></td>
              </tr>
                <tr>
                <td bgcolor="#1ba6f7" height="1" colspan="3" style="height:15px;"></td>
              </tr>
                <tr>
                <td bgcolor="#fff" colspan="3" style="height:12px;"></td>
              </tr>
                <tr>
                <td bgcolor="#fff" width="20" style="height:12px;"></td>
                <td><table width="100%" border="0" cellspacing="10" cellpadding="0">
                    <tr>
                    <td align="left"><font face="Arial" color="#222" size="2"><strong>Dear <span style="color:#1ba6f7">'.ucwords($name).'</span>,</strong></font></td>
                  </tr>
                    <tr>
                    <td align="left"><font face="Arial" color="#222" size="2">Finessse Interactive thanks you for your query submission; we shall call you back within 8 working hours. If you wish to call us, pls use the nos. listed below to get in touch with us. Meanwhile if you wish to see our company presentation, please <a style="color:#1ba6f7" href="http://www.finessse.digital/FinessseProfile.pdf" target="_blank">click here</a> or copy paste this URL in your browser: <a style="color:#1ba6f7" href="http://www.finessse.digital/FinessseProfile.pdf" target="_blank">http://www.finessse.digital/FinessseProfile.pdf</a>. </font></td>
                  </tr>
                    <tr>
                    <td bgcolor="#fff" style="height:8px;"></td>
                  </tr>
                    <tr>
                    <td align="left"><font face="Arial" color="#222" size="2">Further we have also attached our company profile for your kind perusal with this email.</td>
                  </tr>
                    <tr>
                    <td bgcolor="#fff" style="height:12px;"></td>
                  </tr>
                    <tr>
                    <td bgcolor="#fff" style="height:12px;"></td>
                  </tr>
                    <tr>
                    <td align="left" style="line-height:1.5em"><font face="Arial" color="#222" size="2"> Regards,<br/>
                        Deepak Thakkar<br/>
                        Chief Executive Officer<br/>
                        +91-9810619956/ +91-11-45588792 (D)/ 45579559</td>
                  </tr>
                    <tr>
                    <td bgcolor="#fff" style="height:12px;"></td>
                  </tr>
                    <tr>
                    <td align="left" style="line-height:1.5em"><font face="Arial" color="#222" size="2">Finessse Interactive Solutions Pvt Ltd.<br/>
                     B1/639 A, <br/>
                     Janakpuri, West Delhi
Delhi 110058<br/>
                      <br/>
                      Website: <a href="https://www.finessse.digital/" style="color:#1ba6f7" target="



_blank">https://www.finessse.digital/</a><br/>
                      Google Talk | Alternate Mail ID: <a style="color:#1ba6f7" href="mailto:deepak.thakkar@gmail.com">deepak.thakkar@gmail.com</a></font></td>
                  </tr>
                  </table>
                  </td>
                <td bgcolor="#fff" width="20" style="height:12px;"></td>
              </tr>
                <tr>
                <td bgcolor="#fff" colspan="3" style="height:12px;"></td>
              </tr>
                <tr >
                <td colspan="4" align="center" ><font face="Arial" color="#222" size="4">STAY <span style="color:#1ba6f7" > CONNECTED</span></font></td>
              </tr>
                <tr >
                <td colspan="4" align="center" ><font face="Arial" color="#222" size="4"><a href="https://www.facebook.com/FinessseInteractiveSolution" target="_blank"><img src="'.$this->config->base_url().'public/images/fb-mail-icon.jpg" alt="Facebook" /></a> <a href="https://www.linkedin.com/company/1568398/" target="_blank"> <img src="'.$this->config->base_url().'public/images/linkedin-mail-icon.jpg" alt="LinkedIn" /></a> <a href="https://twitter.com/finessseim" target="_blank"><img src="'.$this->config->base_url().'public/images/twitter-mail-icon.jpg" alt="Twitter" /></a> <a href="https://www.instagram.com/finessseinteractive/" target="_blank"><img src="'.$this->config->base_url().'public/images/instagram-mail-icon.jpg" alt="Instagram" /></a> </font></td>
              </tr>
                <td bgcolor="#fff" width="20" style="height:12px;"></td>
              <tr>
                <td bgcolor="#1ba6f7" align="center" height="30" colspan="3"><font face="Arial" color="#fff" size="2"> Copyright '.date('Y').' Finessse Interactive. All Rights Reserved.</font></td>
              </tr>
              </table>
    </td>
          </tr>
</table>
        </body>
</html>
		';

			return $msg;
}


public function send_mail($user_data, $subject, $to, $send_to, $file=null)
{

	$this->load->library('email');
	$this->email->clear();
	$config['protocol']    = 'smtp';
	$config['smtp_host']    = 'ssl://smtp.gmail.com';
	$config['smtp_port']    = '465';
	$config['smtp_timeout'] = '7';
	$config['smtp_user']    = 'info@finessse.digital';
	$config['smtp_pass']    = 'News@123';
	$config['charset']    = 'utf-8';
	$config['mailtype'] = 'html'; // or html
	$config['validation'] = TRUE; // bool whether to validate email or not   
	$config['newline'] = "\r\n";   

	$this->email->initialize($config);

	$this->email->from('info@finessse.digital', 'Finessse');
	$this->email->to($to); 
	$this->email->subject($subject);
	$this->email->set_newline("\r\n");

	$name=$user_data->name;
	$email=$user_data->email;
	$contactno=$user_data->contactno;
	$message=null;

	if($send_to=='user')
	{
	  $company =$user_data->company;
	  $service=$user_data->service;
		$html = $this->usermessagehtml($email,$name,$company,$contactno,$service,null);
	}
	else if($send_to=='admin')
	{
    $company =$user_data->company;
    $service=$user_data->service;
		//send to admin
		$html = $this->adminmessagecontacthtml($email,$name,$company,$contactno,$service,null);
	}
  else if($send_to=='career_user')
  {
    $html = $this->careerusermsghtml($email,$name,$contactno,$message);
  }
  else if($send_to=='career_admin')
  {
    $html = $this->adminmessagecareerhtml($user_data->job,$name,$email,$contactno,$user_data->qualification,$user_data->experience,$user_data->resume);
  }
  else if($send_to=='quote_user')
  {
    $html = $this->quoteusermsghtml($$user_data);
  }
  else if($send_to=='quote_admin')
  {
    $html = $this->quoteadminmsghtml($user_data);
  }
	if($file!=null)
	{
		$this->email->attach($file);
	}
	$this->email->message($html);
	//$this->email->MsgHTML($post);  
	//$this->email->MsgHTML('MsgHTML: md asiffffff');  

	$this->email->send();


	//echo $this->email->print_debugger();
	$this->email->clear();
}
public function hasError()
	{

		if(!isset($_POST['name']))
		{
			$this->session->set_flashdata('error', 'Name is required field');
			return true;
		}

		$captcha = null;
		$error = false;
        if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
		 $this->session->set_flashdata('error', 'Invalid Your Captcha');
		 $error = true;
        }
        $secretKey = "6LfXZNMUAAAAAOGwof1bjEniiTSiyVh5QSCRau1l";
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        // should return JSON with success as true
        if(!$responseKeys["success"]) {
			$this->session->set_flashdata('error', 'Invalid Your Captcha989898');
		    $error = true;
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        	$this->session->set_flashdata('error', 'Email not valid');
		    $error = true;
        }

        if(!preg_match('/^[0-9\+_\-]{5,15}+$/', $_POST['contactno'])){
        	$this->session->set_flashdata('error', 'Phone number error');
        	$error = true;
        }

       	return $error;
	}
  public function contact_user_cron()
  {
    $dc = $this->db
    ->select('*')
    ->from('contactform')
    ->where('user_cron', NULL)
    ->order_by('id', 'desc')
    ->limit(1)
    ->get();

    //$this->db->where('other_services', 'to_admin')->update('contactform', ['other_services'=>'to_asif']);

    echo "<pre>";
    //echo $dc->num_rows();
    if($dc->num_rows()==0)
    {
      die('No data');
    }

    //send mail
    foreach ($dc->result() as $key => $value) {
      $subject = "Thank you for your Query Submission @ Finessse Interactive";
      $file = './public/FinesseProfile.pdf';
      $to = $value->email;
      $this->db->where('id', $value->id)->update('contactform', ['user_cron'=>date('Y-m-d H:i:s')]);
      $this->send_mail($value, $subject, $to, 'user', $file);
      //print_r($value);
      die;
    }
  }
  public function contact_admin_cron()
  {
    $dc = $this->db
    ->select('*')
    ->from('contactform')
    ->where('admin_cron', NULL)
    ->order_by('id', 'desc')
    ->limit(1)
    ->get();

    //$this->db->update('contactform', ['other_services'=>'to_admin']);
    //die;
    //echo "<pre>";
    //print_r($dc->result());
    //die;
    if($dc->num_rows()==0)
    {
      die('No data');
    }

    //send mail
    foreach ($dc->result() as $key => $value) {
      $subject = "Thank you for your Query Submission @ Finessse Interactive";
      $file = './public/FinesseProfile.pdf';
      $to = ["deepak.thakkar@gmail.com"];
      $this->db->where('id', $value->id)->update('contactform', ['admin_cron'=>date('Y-m-d H:i:s')]);
      $this->send_mail($value, $subject, $to, 'admin', $file);
      ////print_r($value);
      die;
    }
  }
  public function query_user_cron()
  {
    $dc = $this->db
    ->select('*')
    ->from('quote')
    ->where('user_cron', NULL)
    ->order_by('id', 'desc')
    ->limit(1)
    ->get();
    

    //$this->db->where('other_services', 'to_admin')->update('contactform', ['other_services'=>'to_asif']);

    echo "<pre>";
    //echo $dc->num_rows();
    if($dc->num_rows()==0)
    {
      die('No data');
    }

    //send mail
    foreach ($dc->result() as $key => $value) {
      $subject = "Thank you for your Query Submission @ Finessse Interactive";
      $file = './public/FinesseProfile.pdf';
      $to = $value->email;
      $this->db->where('id', $value->id)->update('quote', ['user_cron'=>date('Y-m-d H:i:s')]);
      $this->send_mail($value, $subject, $to, 'quote_user', $file);
      //print_r($value);
      die;
    }
  }
  public function query_admin_cron()
  {
    $dc = $this->db
    ->select('*')
    ->from('quote')
    ->where('admin_cron', NULL)
    ->order_by('id', 'desc')
    ->limit(1)
    ->get();

    //$this->db->update('contactform', ['other_services'=>'to_admin']);
    //die;
    //echo "<pre>";
    //print_r($dc->result());
    //die;
    if($dc->num_rows()==0)
    {
      die('No data');
    }

    //send mail
    foreach ($dc->result() as $key => $value) {
      $subject = "Thank you for your Query Submission @ Finessse Interactive";
      $file = './public/FinesseProfile.pdf';
      $to = ["deepak.thakkar@gmail.com"];
      $this->db->where('id', $value->id)->update('quote', ['admin_cron'=>date('Y-m-d H:i:s')]);
      $this->send_mail($value, $subject, $to, 'quote_admin', $file);
      ////print_r($value);
      die;
    }
  }
  public function contactform_save_to_db()
  {
    if($this->hasError()==1){
      $rurl='https://www.finessse.digital/query';
      header("Location:$rurl");
      die;
    }
    //form validated

    $this->db->insert('contactform', [
      'name'=>$_POST['name'],
      'company'=>$_POST['company'],
      'email'=>$_POST['email'],
      'contactno'=>$_POST['contactno'],
      'service'=>$_POST['service'],
      'datetime'=>date('Y-m-d H:i:s')
    ]);

    header('HTTP/1.1 301 Moved Permanently');
    header('Location: https://www.finessse.digital/thank-you');
    die('donn');

  }
  
  public function query_save_to_db()
  {
    if($this->hasError()==1){
      $rurl='https://www.finessse.digital/seo-s';
      header("Location:$rurl");
      die;
    }
    //form validated

     $this->db->insert('quote', [
        'name'=>$_POST['name'],
        'company'=>$_POST['company'],
        'email'=>$_POST['email'],
        'contactno'=>$_POST['contactno'],
        'service'=>implode(',',$_POST['service']),
        'industry'=>$_POST['industry'],
        'website'=>$_POST['website'],
        'message'=>$_POST['message'],
        'datetime'=>date('Y-m-d H:i:s')
    ]);
    
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: https://www.finessse.digital/thank-you');
    die('donn');

  }
  
  
  
  function careerusermsghtml($email,$name,$phone,$message)
  {
        $msg='';   
       $msg.='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title>Finessse Digital</title>
        </head>
<body topmargin="0" bottommargin="0" marginheight="0" marginwidth="0" leftmargin="0" rightmargin="0">
        <table width="802" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#1ba6f7" >
  <tr>
            <td valign="top"><table width="800" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#ffffff">
                <tr>
                <td bgcolor="#fff" colspan="3" style="height:12px;"></td>
              </tr>
                <tr>
                <td align="center" valign="middle" colspan="3" ><img src="http://finessse.digital/public/images/logo.png" /></td>
              </tr>
                <tr>
                <td bgcolor="#fff" colspan="3" style="height:12px;"></td>
              </tr>
                <tr>
                <td bgcolor="#1ba6f7" height="1" colspan="3" style="height:15px;"></td>
              </tr>
                <tr>
                <td bgcolor="#fff" colspan="3" style="height:12px;"></td>
              </tr>
                <tr>
                <td bgcolor="#fff" width="20" style="height:12px;"></td>
                <td><table width="100%" border="0" cellspacing="10" cellpadding="0">
                    <tr>
                    <td align="left"><font face="Arial" color="#222" size="2"><strong>Dear <span style="color:#1ba6f7">'.ucwords($name).'</span>,</strong></font></td>
                  </tr>
                    <tr>
                    <td align="left"><font face="Arial" color="#222" size="2">Finessse Interactive thanks you for your query submission; we shall call you back within 8 working hours. If you wish to call us, pls use the nos. listed below to get in touch with us. Meanwhile if you wish to see our company presentation, please <a style="color:#1ba6f7" href="http://www.finessse.digital/FinessseProfile.pdf" target="_blank">click here</a> or copy paste this URL in your browser: <a style="color:#1ba6f7" href="http://www.finessse.digital/FinessseProfile.pdf" target="_blank">http://www.finessse.digital/FinessseProfile.pdf</a>. </font></td>
                  </tr>
                    <tr>
                    <td bgcolor="#fff" style="height:8px;"></td>
                  </tr>
                    <tr>
                    <td align="left"><font face="Arial" color="#222" size="2">Further we have also attached our company profile for your kind perusal with this email.</td>
                  </tr>
                    <tr>
                    <td bgcolor="#fff" style="height:12px;"></td>
                  </tr>
                    <tr>
                    <td bgcolor="#fff" style="height:12px;"></td>
                  </tr>
                    <tr>
                    <td align="left" style="line-height:1.5em"><font face="Arial" color="#222" size="2"> Regards,<br/>
                        Deepak Thakkar<br/>
                        Chief Executive Officer<br/>
                        +91-9810619956/ +91-11-45588792 (D)/ 45579559</td>
                  </tr>
                    <tr>
                    <td bgcolor="#fff" style="height:12px;"></td>
                  </tr>
                    <tr>
                    <td align="left" style="line-height:1.5em"><font face="Arial" color="#222" size="2">Finessse Interactive Solutions Pvt Ltd.<br/>
                     B1/639 A, <br/>
                     Janakpuri, West Delhi
Delhi 110058<br/>
                      <br/>
                      Website: <a href="https://www.finessse.digital/" style="color:#1ba6f7" target="



_blank">https://www.finessse.digital/</a><br/>
                      Google Talk | Alternate Mail ID: <a style="color:#1ba6f7" href="mailto:deepak.thakkar@gmail.com">deepak.thakkar@gmail.com</a></font></td>
                  </tr>
                  </table>
                  </td>
                <td bgcolor="#fff" width="20" style="height:12px;"></td>
              </tr>
                <tr>
                <td bgcolor="#fff" colspan="3" style="height:12px;"></td>
              </tr>
                <tr >
                <td colspan="4" align="center" ><font face="Arial" color="#222" size="4">STAY <span style="color:#1ba6f7" > CONNECTED</span></font></td>
              </tr>
                <tr >
                <td colspan="4" align="center" ><font face="Arial" color="#222" size="4"><a href="https://www.facebook.com/FinessseInteractiveSolution" target="_blank"><img src="'.$this->config->base_url().'public/images/fb-mail-icon.jpg" alt="Facebook" /></a> <a href="https://www.linkedin.com/company/1568398/" target="_blank"> <img src="'.$this->config->base_url().'public/images/linkedin-mail-icon.jpg" alt="LinkedIn" /></a> <a href="https://twitter.com/finessseim" target="_blank"><img src="'.$this->config->base_url().'public/images/twitter-mail-icon.jpg" alt="Twitter" /></a> <a href="https://www.instagram.com/finessseinteractive/" target="_blank"><img src="'.$this->config->base_url().'public/images/instagram-mail-icon.jpg" alt="Instagram" /></a> </font></td>
              </tr>
                <td bgcolor="#fff" width="20" style="height:12px;"></td>
              <tr>
                <td bgcolor="#1ba6f7" align="center" height="30" colspan="3"><font face="Arial" color="#fff" size="2"> Copyright '.date('Y').' Finessse Interactive. All Rights Reserved.</font></td>
              </tr>
              </table>
    </td>
          </tr>
</table>
        </body>
</html>';

      return $msg;
  }	
  
    function quoteusermsghtml($data)
  {
        $msg='';   
       $msg.='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title>Finessse Digital</title>
        </head>
<body topmargin="0" bottommargin="0" marginheight="0" marginwidth="0" leftmargin="0" rightmargin="0">
        <table width="802" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#1ba6f7" >
  <tr>
            <td valign="top"><table width="800" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#ffffff">
                <tr>
                <td bgcolor="#fff" colspan="3" style="height:12px;"></td>
              </tr>
                <tr>
                <td align="center" valign="middle" colspan="3" ><img src="http://finessse.digital/public/images/logo.png" /></td>
              </tr>
                <tr>
                <td bgcolor="#fff" colspan="3" style="height:12px;"></td>
              </tr>
                <tr>
                <td bgcolor="#1ba6f7" height="1" colspan="3" style="height:15px;"></td>
              </tr>
                <tr>
                <td bgcolor="#fff" colspan="3" style="height:12px;"></td>
              </tr>
                <tr>
                <td bgcolor="#fff" width="20" style="height:12px;"></td>
                <td><table width="100%" border="0" cellspacing="10" cellpadding="0">
                    <tr>
                    <td align="left"><font face="Arial" color="#222" size="2"><strong>Dear <span style="color:#1ba6f7">'.ucwords($data->name).'</span>,</strong></font></td>
                  </tr>
                    <tr>
                    <td align="left"><font face="Arial" color="#222" size="2">Finessse Interactive thanks you for your query submission; we shall call you back within 8 working hours. If you wish to call us, pls use the nos. listed below to get in touch with us. Meanwhile if you wish to see our company presentation, please <a style="color:#1ba6f7" href="http://www.finessse.digital/FinessseProfile.pdf" target="_blank">click here</a> or copy paste this URL in your browser: <a style="color:#1ba6f7" href="http://www.finessse.digital/FinessseProfile.pdf" target="_blank">http://www.finessse.digital/FinessseProfile.pdf</a>. </font></td>
                  </tr>
                    <tr>
                    <td bgcolor="#fff" style="height:8px;"></td>
                  </tr>
                    <tr>
                    <td align="left"><font face="Arial" color="#222" size="2">Further we have also attached our company profile for your kind perusal with this email.</td>
                  </tr>
                    <tr>
                    <td bgcolor="#fff" style="height:12px;"></td>
                  </tr>
                    <tr>
                    <td bgcolor="#fff" style="height:12px;"></td>
                  </tr>
                    <tr>
                    <td align="left" style="line-height:1.5em"><font face="Arial" color="#222" size="2"> Regards,<br/>
                        Deepak Thakkar<br/>
                        Chief Executive Officer<br/>
                        +91-9810619956/ +91-11-45588792 (D)/ 45579559</td>
                  </tr>
                    <tr>
                    <td bgcolor="#fff" style="height:12px;"></td>
                  </tr>
                    <tr>
                    <td align="left" style="line-height:1.5em"><font face="Arial" color="#222" size="2">Finessse Interactive Solutions Pvt Ltd.<br/>
                     B1/639 A, <br/>
                     Janakpuri, West Delhi
Delhi 110058<br/>
                      <br/>
                      Website: <a href="https://www.finessse.digital/" style="color:#1ba6f7" target="



_blank">https://www.finessse.digital/</a><br/>
                      Google Talk | Alternate Mail ID: <a style="color:#1ba6f7" href="mailto:deepak.thakkar@gmail.com">deepak.thakkar@gmail.com</a></font></td>
                  </tr>
                  </table>
                  </td>
                <td bgcolor="#fff" width="20" style="height:12px;"></td>
              </tr>
                <tr>
                <td bgcolor="#fff" colspan="3" style="height:12px;"></td>
              </tr>
                <tr >
                <td colspan="4" align="center" ><font face="Arial" color="#222" size="4">STAY <span style="color:#1ba6f7" > CONNECTED</span></font></td>
              </tr>
                <tr >
                <td colspan="4" align="center" ><font face="Arial" color="#222" size="4"><a href="https://www.facebook.com/FinessseInteractiveSolution" target="_blank"><img src="'.$this->config->base_url().'public/images/fb-mail-icon.jpg" alt="Facebook" /></a> <a href="https://www.linkedin.com/company/1568398/" target="_blank"> <img src="'.$this->config->base_url().'public/images/linkedin-mail-icon.jpg" alt="LinkedIn" /></a> <a href="https://twitter.com/finessseim" target="_blank"><img src="'.$this->config->base_url().'public/images/twitter-mail-icon.jpg" alt="Twitter" /></a> <a href="https://www.instagram.com/finessseinteractive/" target="_blank"><img src="'.$this->config->base_url().'public/images/instagram-mail-icon.jpg" alt="Instagram" /></a> </font></td>
              </tr>
                <td bgcolor="#fff" width="20" style="height:12px;"></td>
              <tr>
                <td bgcolor="#1ba6f7" align="center" height="30" colspan="3"><font face="Arial" color="#fff" size="2"> Copyright '.date('Y').' Finessse Interactive. All Rights Reserved.</font></td>
              </tr>
              </table>
    </td>
          </tr>
</table>
        </body>
</html>';

      return $msg;
  }	

  public function career_user_cron()
  {
    $dc = $this->db
    ->select('*')
    ->from('career')
    ->where('user_cron', NULL)
    ->order_by('id', 'desc')
    ->limit(1)
    ->get();

    //$this->db->where('other_services', 'to_admin')->update('contactform', ['other_services'=>'to_asif']);

    echo "<pre>";
    //echo $dc->num_rows();
    if($dc->num_rows()==0)
    {
      die('No data');
    }

    //send mail
    foreach ($dc->result() as $key => $value) {
      $subject=' Your Job Application @ Finessse Interactive';
      $to = $value->email;
      $this->db->where('id', $value->id)->update('career', ['user_cron'=>date('Y-m-d H:i:s')]);
      $this->send_mail($value, $subject, $to, 'career_user');
      //print_r($value);
      die;
    }
  }  
  public function career_admin_cron()
  {
    $dc = $this->db
    ->select('*')
    ->from('career')
    ->where('admin_cron', NULL)
    ->order_by('id', 'desc')
    ->limit(1)
    ->get();

    //$this->db->update('career', ['other_services'=>'to_admin']);
    //die;
    //echo "<pre>";
    //print_r($dc->result());
    //die;
    if($dc->num_rows()==0)
    {
      die('No data');
    }

    //send mail
    foreach ($dc->result() as $key => $value) {
      $subject='Apply Online : www.finessse.digital';
      $file = './public/career/'.$value->resume;
      $to = ["deepak.thakkar@gmail.com"];
      $this->db->where('id', $value->id)->update('career', ['admin_cron'=>date('Y-m-d H:i:s')]);
      $this->send_mail($value, $subject, $to, 'career_admin', $file);
      ////print_r($value);
      die;
    }
  }
  public function adminmessagecareerhtml($job,$name,$email,$phone,$qualification,$experience,$resume){
     $msg='';  
       $msg.='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Finessse Digital</title>
</head>
<body topmargin="0" bottommargin="0" marginheight="0" marginwidth="0" leftmargin="0" rightmargin="0">
<table width="802" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#1ba6f7" >
  <tr>
    <td valign="top"><table width="800" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#ffffff">
        <tr>
         <td bgcolor="#fff" colspan="3" style="height:12px"></td>
        </tr>
        <tr>
          <td align="center" valign="middle" colspan="3"><img src="http://finessse.digital/public/images/logo.png" /></td>
        </tr>
        <tr>
          <td bgcolor="#fff" colspan="3"  style="height:12px"></td>
        </tr>
        <tr>
          <td bgcolor="#1ba6f7" height="1" colspan="3"  style="height:14px"></td>
        </tr>
        <tr>
          <td bgcolor="#ffffff" colspan="3"  style="height:12px"></td>
        </tr>
        <tr>
          <td bgcolor="#fff" width="20"  style="width:20px"></td>
          <td><table width="100%" border="0" cellspacing="10" cellpadding="0">
              <tr>
                <td align="left"><font face="Arial" color="#222" size="2">Dear Admin,</font></td>
              </tr>
              <tr>
                <td align="left"><font face="Arial" color="#222" size="2">Please find user details:</font></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="100"><font face="Arial" color="#222" size="2">Job </font></td>
                      <td width="50">:</td>
                      <td><font face="Arial" color="#222" size="2">'.ucwords($job).'</font></td>
                    </tr>
                    <tr>
                      <td width="100"><font face="Arial" color="#222" size="2">Name </font></td>
                      <td width="50">:</td>
                      <td><font face="Arial" color="#222" size="2">'.ucwords($name).'</font></td>
                    </tr>
                    <tr>
                      <td><font face="Arial" color="#222" size="2"> Email</font></td>
                      <td>:</td>
                      <td><font face="Arial" color="#222" size="2"> <a href="mailto:'.$email.'" style="color:#1ba6f7;text-decoration:none">'.$email.'</a></font></td>
                    </tr>
                    <tr>
                      <td><font face="Arial" color="#222" size="2"> Contact</font></td>
                      <td>:</td>
                      <td><font face="Arial" color="#222" size="2">'.$phone.'</font></td>
                    </tr>
                    <tr>
                      <td><font face="Arial" color="#222" size="2">Qualification</font></td>
                      <td>:</td>
                      <td><font face="Arial" color="#222" size="2">'.$qualification.'</font></td>
                    </tr>
                    <tr>
                      <td><font face="Arial" color="#222" size="2">Experience</font></td>
                      <td>:</td>
                      <td><font face="Arial" color="#222" size="2">'.$experience.'</font></td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td bgcolor="#fff" style="height:12px"></td>
              </tr>
              <tr>
               <td bgcolor="#fff" style="height:12px"></td>
              </tr>
              <tr>
                <td align="left" style="line-height:1.5em"><font face="Arial" color="#222" size="2">Regards,<br/>
                  Finessse Interactive Solutions Pvt. Ltd.<br/>
                  B1/639 A, Janakpuri, West Delhi  <br/>
                  New Delhi - 110058 (INDIA)<br/>
                  Pnone: <a href="tel:+91- 9810619956" style="color:#1ba6f7;text-decoration:none">+91- 9810619956</a> <br/>
                  Email: <a href="mailto:info@finessse.digital" style="color:#1ba6f7;text-decoration:none">info@finessse.digital</a> </font></td>
              </tr>
            </table>
          </td>
          <td bgcolor="#fff" width="20" style="width: 20px;"></td>
        </tr>
        <tr>
         <td bgcolor="#fff" style="height:12px"></td>
        </tr>
        <tr>
          <td bgcolor="#1ba6f7" align="center" height="30" colspan="3"><font face="Arial" color="#fff" size="2"> Copyright '.date('Y').' Finessse Interactive. All Rights Reserved.</font></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
';

      return $msg;
  }
}
?>
