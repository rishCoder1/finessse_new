<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public $queryshow=true;
	
	public function __construct()
    {
        parent::__construct();  
	   
		$this->load->helper('url');    
		$this->load->model(array('index_model'));
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper('custom_helper');
		$this->load->library('session');
	
	 //define css,js and images path 
	 
        define('public_css',$this->config->base_url().'public/css/');
        define('public_js',$this->config->base_url().'public/js/');	
        define('public_images',$this->config->base_url().'public/images/');	
        define('public_upload',$this->config->base_url().'public/uploads/');			
		define('public_fonts',$this->config->base_url().'public/fonts/');	
		define('public_pdf',$this->config->base_url().'public/pdf/');	
		
		
		 date_default_timezone_set('Asia/Kolkata');
		 define('indian_date_time',date('Y-m-d H:i:s'));
		 
		 
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		 $this->queryshow=false; //it is used to query form show in footer (view) 
		 
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('home',$data);	
		$this->load->view('footer',$data);
	}
	
	
	public function contact()
	{
		 $this->queryshow=false; //it is used to query form show in footer (view) 
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('contact',$data);	
		$this->load->view('footer',$data);
	}

	public function Clients()
	{
		$this->queryshow=false; //it is used to query form show in footer (view) 
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Clients',$data);	
		$this->load->view('footer',$data);
	}

	public function Our_Work()
	{
		$this->queryshow=false; //it is used to query form show in footer (view) 
		
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Our_Work',$data);	
		$this->load->view('footer',$data);
	}

	public function About_Us()
	{   
	    $this->queryshow=false; //it is used to query form show in footer (view) 
		
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('About_Us',$data);	
		$this->load->view('footer',$data);
	}

  public function Career()
	{
		$this->queryshow=false; //it is used to query form show in footer (view) 
		
	
		$this->form_validation->set_rules('job', 'Job', 'trim|required');
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('contactno', 'Contact Number', 'trim|required');
		$this->form_validation->set_rules('qualification', 'Qualification', 'trim|required');
		$this->form_validation->set_rules('experience', 'Experience', 'trim|required');
			
		if ($this->form_validation->run() == FALSE)
		 {
			$meta['title']='Welcome to Finessse Interactive Solutions';		
			$meta['keyword']='Finessse Interactive';		
			$meta['description']='Finessse Interactive';	
			$data['errors'] = validation_errors('<div class="error">', '</div>');	
			$this->load->view('header',$meta);	
			$this->load->view('Career',$data);	
			$this->load->view('footer',$data);

			
		 }
		else
		 {
			 if(!empty($_FILES['resume']['name'])){
				 
				 
				 //RESUME FILE TYPE CHECK
				 
			$allowed =  array('pdf','doc' ,'docx');
			$filename = $_FILES['resume']['name'];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			if(!in_array($ext,$allowed) ) {
		 
		             	$this->session->set_flashdata('message', 'Your file is not valid');
	                 	redirect("thank-you.html");
						die();
			} 
				 
				 
				 
				 
				 
	

					$fileName=$_FILES["resume"]["name"];
					$fileType=$_FILES["resume"]["type"];
					$fileTmpName=$_FILES["resume"]["tmp_name"];  
					$time=time();
					$newFileName=$time.$fileName;

					$uploadPath="./public/career/".$newFileName;

					//function for upload file
					if(move_uploaded_file($fileTmpName,$uploadPath)){
					
						 $this->index_model->career($newFileName);

                        $this->careermail($_POST['job'],$_POST['name'],$_POST['email'],$_POST['contactno'],$_POST['qualification'],$_POST['experience'],$newFileName);
						
						
						
						
					}			 
		     }
		
		
	   }
	
	}
	
  public function careermail($job,$name,$email,$phone,$qualification,$experience,$resume)
	{
		
		
		    include('phpmailer/class.phpmailer.php');
            include('phpmailer/class.smtp.php');
			
			   if($_POST['captcha']!=$_POST['cresult']){
			     $rurl=$_POST['rurl'];
				 $this->session->set_flashdata('captchamsg', 'Invalid Your Captcha');
			     header("Location:$rurl");
				 die();
			   
		   }
		
		
			$to=$from='info@finesseim.com';
			$toname='Info';
			 
			 
		   
			//====== Send Admin 
			
			
			$subject='Apply Online : www.finessse.digital';
            $file = './public/career/'.$resume;
			
			
			
			$mail             = new PHPMailer();
			$mail->SMTPSecure = "ssl";                 
			$mail->Host       = "mail.finesseim.com";      
			$mail->Port       = 25;                 
			$mail->Username   = "info@finesseim.com";  
			$mail->Password   = "kashubhai04";              
			$mail->From       = $from;
			$mail->FromName   = $toname;
			$mail->Subject    = $subject;
			$mail->AddAttachment($file);
			
			$message1=$this->adminmessagecareerhtml($job,$name,$email,$phone,$qualification,$experience,$resume);
			$mail->MsgHTML($message1);
			
			
			$mail->AddAddress($to,$toname); // To Admin
			$mail->addBCC('shweta.tyagi31@gmail.com','Shweta');
			$mail->addBCC('abhishekaayij89@gmail.com','Abhi');
			$mail->addBCC('leena.digital','Leena');
            $mail->IsHTML(true); 
			$mail->Send();

           //============= Send User 
		   
		  
			$subject='Thank you for your Query Submission @ Finessse Interactive';
			
			
		
			$mail             = new PHPMailer();
			$mail->SMTPSecure = "ssl";                 
			$mail->Host       = "mail.finesseim.com";      
			$mail->Port       = 25;                 
			$mail->Username   = "info@finesseim.com";  
			$mail->Password   = "kashubhai04";          
			$mail->From       = $from;
			$mail->FromName   = $toname;
			$mail->Subject    = $subject;
			$file = $this->config->base_url().'FinesseProfile.pdf';
			$mail->AddAttachment($file);
			
			$message2=$this->usermessagehtml($email,$name,$phone,$qualification);
			$mail->MsgHTML($message2);
			
			
			$mail->AddAddress($email,$name); // To User
			$mail->addBCC('shweta.tyagi31@gmail.com','Shweta');
			$mail->addBCC('leena.digital','Leena');
            $mail->IsHTML(true); 
			$mail->Send();
		   
		   
		   
			
		$this->session->set_flashdata('message', 'Thanks for sumbmit query');
		redirect("thank-you.html");
		
    }
	public function adminmessagecareerhtml($job,$name,$email,$phone,$qualification,$experience,$resume){
		
		
		 $msg='';	 
			 
			 $msg.='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Finessse Digital</title>
</head>
<body topmargin="0" bottommargin="0" marginheight="0" marginwidth="0" leftmargin="0" rightmargin="0">
<table width="802" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#1ba6f7" >
<tr>
	<td valign="top">
    	<table width="800" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#ffffff">
<tr><td bgcolor="#fff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
  <tr> <td align="center" valign="middle" colspan="3"><img src="http://finesse.digital/public/images/logo.png" /></td></tr>
 <tr><td bgcolor="#fff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
<tr><td bgcolor="#1ba6f7" height="1" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="1" /></td></tr>
        		<tr><td bgcolor="#ffffff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
                
                
    <tr>
    <td bgcolor="#fff" width="20"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif"  /></td>
    <td>
    
    	<table width="100%" border="0" cellspacing="10" cellpadding="0">
             <tr><td align="left"><font face="Arial" color="#222" size="2">Dear Admin,</font></td></tr>
                <tr><td align="left"><font face="Arial" color="#222" size="2">Please find user details:</font></td></tr>
                <tr><td>
        	        		<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                </td></tr>
                <tr><td bgcolor="#fff"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
                
                <tr><td bgcolor="#fff"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
                <tr><td align="left" style="line-height:1.5em"><font face="Arial" color="#222" size="2">Regards,<br/>Finessse Interactive Solutions Pvt. Ltd.<br/>608, 6th Floor,Vishwasadan Bldg District Centre,  <br/>Janak Puri,New Delhi - 110058 (INDIA)<br/>Pnone: <a href="tel:+91- 9810619956" style="color:#1ba6f7;text-decoration:none">+91- 9810619956</a> <a href="tel:+91-11-45588792" style="color:#1ba6f7;text-decoration:none">+91-11-45588792</a><br/>Email: <a href="mailto:info@finessse.digital" style="color:#1ba6f7;text-decoration:none">info@finessse.digital</a> </font></td></tr>
 </table>

    </td>
    <td bgcolor="#fff" width="20"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif"  /></td>
    </tr>
      <tr><td bgcolor="#fff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>  
 <tr><td bgcolor="#1ba6f7" align="center" height="30" colspan="3"><font face="Arial" color="#fff" size="2"> Copyright '.date('Y').' Finessse Interactive. All Rights Reserved.</font></td></tr>
</table>
   
    </td>
</tr>
</table>

</body></html>
';


			return $msg;
		

		
	}
	public function DigitalMarketing()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('DigitalMarketing',$data);	
		$this->load->view('footer',$data);
	}
		public function Social_Media_Marketing()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Social_Media_Marketing',$data);	
		$this->load->view('footer',$data);
	}
	
		public function SEO()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('SEO',$data);	
		$this->load->view('footer',$data);
	}

			public function Online_Reputation_Management()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Online_Reputation_Management',$data);	
		$this->load->view('footer',$data);
	}

	public function Web_Mobile_Design()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Web_Mobile_Design',$data);	
		$this->load->view('footer',$data);
	}

		public function PPC()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('PPC',$data);	
		$this->load->view('footer',$data);
	}

			public function Email_Marketing()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Email_Marketing',$data);	
		$this->load->view('footer',$data);
	}

  public function Web_Developement()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Web_Developement',$data);	
		$this->load->view('footer',$data);
	}

	public function Web_Application_Developement()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Web_Application_Developement',$data);	
		$this->load->view('footer',$data);
	}


	public function Mobile_App_Developement()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Mobile_App_Developement',$data);	
		$this->load->view('footer',$data);
	}

		public function Ecommerce_Developement()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Ecommerce_Developement',$data);	
		$this->load->view('footer',$data);
	}

			public function Domain_Hosting()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Domain_Hosting',$data);	
		$this->load->view('footer',$data);
	}

				public function Multimedia_Solutions()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Multimedia_Solutions',$data);	
		$this->load->view('footer',$data);
	}
	
	public function Copywriting()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Copywriting',$data);	
		$this->load->view('footer',$data);
	}
	public function Content_Marketing()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Content_Marketing',$data);	
		$this->load->view('footer',$data);
	}
  public function Corporate_Branding_Solutions()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Corporate_Branding_Solutions',$data);	
		$this->load->view('footer',$data);
	}
  public function Psd_to_HTML()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Psd_to_HTML',$data);	
		$this->load->view('footer',$data);
	}
 public function HTML5_and_CSS3()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('HTML5_and_CSS3',$data);	
		$this->load->view('footer',$data);
	}
 public function UX_Design()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('UX_Design',$data);	
		$this->load->view('footer',$data);
	}
 public function ASP()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('ASP',$data);	
		$this->load->view('footer',$data);
	}
  public function B2B_Website_Developement()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('B2B_Website_Developement',$data);	
		$this->load->view('footer',$data);
	}
	public function B2C_Website_Developement()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('B2C_Website_Developement',$data);	
		$this->load->view('footer',$data);
	}
	public function Brochure_Design()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Brochure_Design',$data);	
		$this->load->view('footer',$data);
	}
	public function Chatbots()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Chatbots',$data);	
		$this->load->view('footer',$data);
	}
		public function CMS_Website_Developement()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('CMS_Website_Developement',$data);	
		$this->load->view('footer',$data);
	}
			public function Content_Developement()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Content_Developement',$data);	
		$this->load->view('footer',$data);
	}
				public function Conversion_Rate_Optimization()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Conversion_Rate_Optimization',$data);	
		$this->load->view('footer',$data);
	}
					public function Corporate_Web_Design()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Corporate_Web_Design',$data);	
		$this->load->view('footer',$data);
	}
						public function Graphic_Design()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Graphic_Design',$data);	
		$this->load->view('footer',$data);
	}
public function Magento_Website_Developement()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('Magento_Website_Developement',$data);	
		$this->load->view('footer',$data);
	}
  public function PHP_Website_Developemnent()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('PHP_Website_Developemnent',$data);	
		$this->load->view('footer',$data);
	}
		public function CaseStudyAraanz()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('CaseStudyAraanz',$data);	
		$this->load->view('footer',$data);
	}
			public function CaseStudyArchies()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('CaseStudyArchies',$data);	
		$this->load->view('footer',$data);
	}
			public function CaseStudyAppfest()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('CaseStudyAppfest',$data);	
		$this->load->view('footer',$data);
	}
   public function CaseStudyBajajCapital()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('CaseStudyBajajCapital',$data);	
		$this->load->view('footer',$data);
	}
  
  public function CaseStudySaha()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('CaseStudySaha',$data);	
		$this->load->view('footer',$data);
	}
  public function sitemap()
	{
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('sitemap',$data);	
		$this->load->view('footer',$data);
	}
	
	
	public function servicelisting()
	{
		
		$meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('servicelisting',$data);	
		$this->load->view('footer',$data);
	}
	 
	 
	 
	public function thankyou()
	{	$this->queryshow=false; //it is used to query form show in footer (view) 
			$meta['title']='Welcome to Finessse Interactive Solutions';		
			$meta['keyword']='Finessse Interactive';		
			$meta['description']='Finessse Interactive';	
			$data=[];		
			$this->load->view('header',$meta);	
			$this->load->view('thankyou',$data);	
			$this->load->view('footer',$data);
    }
	


	
	public function contactform()
	{
		
			 include('phpmailer/class.phpmailer.php');
			 include('phpmailer/class.smtp.php');
			
			$this->index_model->contactform();
       
			$name=$_POST['name'];
			$company =$_POST['company'];
			$email=$_POST['email'];
			$phone=$_POST['contactno'];
			$service=$_POST['service'];
			$message=$other_services=$_POST['other_services'];
		  
		  
		   if($_POST['captcha']!=$_POST['cresult']){
			     $rurl=$_POST['rurl'];
				 $this->session->set_flashdata('captchamsg', 'Invalid Your Captcha');
			     header("Location:$rurl");
				 die();
			   
		   }
			 
		
			$to=$from='info@finesseim.com';
			$toname='Info';
			 
			 
		   
			//====== Send Admin 
			
			
			$subject='Tell Us About Your Project';
             
			
			$mail             = new PHPMailer();
			$mail->SMTPSecure = "ssl";                 
			$mail->Host       = "mail.finesseim.com";      
			$mail->Port       = 25;                 
			$mail->Username   = "info@finesseim.com";  
			$mail->Password   = "kashubhai04";               
			$mail->From       = $from;
			$mail->FromName   = $toname;
			$mail->Subject    = $subject;
			
			$message1=$this->adminmessagecontacthtml($email,$name,$company,$phone,$service,$other_services);
			$mail->MsgHTML($message1);
			
			
			$mail->AddAddress($to,$toname); // To Admin
			$mail->addBCC('shweta.tyagi31@gmail.com','Shweta');
			$mail->addBCC('abhishekaayij89@gmail.com','Abhi');
			$mail->addBCC('leena.digital','Leena');
            $mail->IsHTML(true); 
			$mail->Send();

           //============= Send User 
		   
		  
			$subject='Thank you for your Query Submission @ Finessse Interactive';
			
		
			$mail             = new PHPMailer();
			$mail->SMTPSecure = "ssl";                 
			$mail->Host       = "mail.finesseim.com";      
			$mail->Port       = 25;                 
			$mail->Username   = "info@finesseim.com";  
			$mail->Password   = "kashubhai04";               
			$mail->From       = $from;
			$mail->FromName   = $toname;
			$mail->Subject    = $subject;
			$file = $this->config->base_url().'FinesseProfile.pdf';
			$mail->AddAttachment($file);
			
			$message2=$this->usermessagehtml($email,$name,$phone,$message);
			$mail->MsgHTML($message2);
			
			
			$mail->AddAddress($email,$name); // To User
			$mail->addBCC('shweta.tyagi31@gmail.com','Shweta');
			$mail->addBCC('leena.digital','Leena');
            $mail->IsHTML(true); 
			$mail->Send();
		   
		   
		   
			
		$this->session->set_flashdata('message', 'Thanks for sumbmit query');
		redirect("thank-you.html");
		
		
	}
	
	public function adminmessagecontacthtml($email,$name,$company,$phone,$service,$other_services)
	{
		//===================== Html 
		
		
		
					 $msg='';	 
					 
					 $msg.='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Finessse Digital</title>
			</head>
			<body topmargin="0" bottommargin="0" marginheight="0" marginwidth="0" leftmargin="0" rightmargin="0">
			<table width="802" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#1ba6f7" >
			<tr>
			<td valign="top">
				<table width="800" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#ffffff">
			<tr><td bgcolor="#fff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
			<tr> <td align="center" valign="middle" colspan="3"><img src="http://finesse.digital/public/images/logo.png" /></td></tr>
			<tr><td bgcolor="#fff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
			<tr><td bgcolor="#1ba6f7" height="1" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="1" /></td></tr>
						<tr><td bgcolor="#fff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
						
						
			<tr>
			<td bgcolor="#fff" width="20"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif"  /></td>
			<td>

				<table width="100%" border="0" cellspacing="10" cellpadding="0">
					 <tr><td align="left"><font face="Arial" color="#222" size="2">Dear Admin,</font></td></tr>
						<tr><td align="left"><font face="Arial" color="#222" size="2">Please find user details:</font></td></tr>
						<tr><td>
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
			<td><font face="Arial" color="#222" size="2">'.$phone.'</font></td>
			</tr>

			<tr>
			<td><font face="Arial" color="#222" size="2"> Service</font></td>
			<td>:</td>
			<td><font face="Arial" color="#222" size="2">'.$service.'</font></td>
			</tr>';
			
		if(!empty($other_services)){	

				$msg.='<tr>
				<td><font face="Arial" color="#222" size="2">Other Service Query</font></td>
				<td>:</td>
				<td><font face="Arial" color="#222" size="2">'.$other_services.'</font></td>
				</tr>';
	     	}
			
			
		$msg.=       '</table>                	
						</td></tr>
						<tr><td bgcolor="#fff"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
						
						<tr><td bgcolor="#fff"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
						<tr><td align="left" style="line-height:1.5em"><font face="Arial" color="#222" size="2">Regards,<br/>Finessse Interactive Solutions Pvt. Ltd.<br/>608, 6th Floor,Vishwasadan Bldg District Centre,  <br/>Janak Puri,New Delhi - 110058 (INDIA)<br/>Pnone: <a href="tel:+91- 9810619956" style="color:#1ba6f7;text-decoration:none">+91- 9810619956</a> <a href="tel:+91-11-45588792" style="color:#1ba6f7;text-decoration:none">+91-11-45588792</a><br/>Email: <a href="mailto:info@finessse.digital" style="color:#1ba6f7;text-decoration:none">info@finessse.digital</a> </font></td></tr>
			</table>

			</td>
			<td bgcolor="#fff" width="20"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif"  /></td>
			</tr>
			  <tr><td bgcolor="#fff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>  
			<tr><td bgcolor="#1ba6f7" align="center" height="30" colspan="3"><font face="Arial" color="#fff" size="2"> Copyright '.date('Y').' Finessse Interactive. All Rights Reserved.</font></td></tr>
			</table>

			</td>
			</tr>
			</table>

			</body></html>
			';


					return $msg;

		
		
		//=================== Html 
		
	}
	 
	
	
	public function aboutproject(){
		
		
		
		    include('phpmailer/class.phpmailer.php');
            include('phpmailer/class.smtp.php');
			
			$this->index_model->aboutproject();
       
	       $name=$_POST['name'];
	       $email=$_POST['email'];
		   $phone=$_POST['contactno'];
		   $service=$_POST['service'];
		   $message =$_POST['message'];
		   
		      if($_POST['captcha']!=$_POST['cresult']){
			     $rurl=$_POST['rurl'];
				 $this->session->set_flashdata('captchamsg', 'Invalid Your Captcha');
			     header("Location:$rurl");
				 die();
			   
		   }
			 
		
			$to=$from='info@finesseim.com';
			$toname='Info';
			 
			 
		   
			//====== Send Admin 
			
			
			$subject='Tell Us About Your Project';
             
			
			
			
			$mail             = new PHPMailer();
			$mail->SMTPSecure = "ssl";                 
			$mail->Host       = "mail.finesseim.com";      
			$mail->Port       = 25;                 
			$mail->Username   = "info@finesseim.com";  
			$mail->Password   = "kashubhai04";           
			$mail->From       = $from;
			$mail->FromName   = $toname;
			$mail->Subject    = $subject;
			
			$message1=$this->adminmessageaboutprojecthtml($email,$name,$phone,$service,$message);
			$mail->MsgHTML($message1);
			
			
			$mail->AddAddress($to,$toname); // To Admin
			$mail->addBCC('shweta.tyagi31@gmail.com','Shweta');
			$mail->addBCC('abhishekaayij89@gmail.com','Abhi');
			$mail->addBCC('abhishek.kumar@finessse.digital','Abhi');
			//$mail->addBCC('leena.digital','Leena');
            $mail->IsHTML(true); 
		 	$mail->Send();

           //============= Send User 
		   
		  
			$subject='Thank you for your Query Submission @ Finessse Interactive';
			
			
		
			$mail             = new PHPMailer();
			$mail->SMTPSecure = "ssl";                 
			$mail->Host       = "mail.finesseim.com";      
			$mail->Port       = 25;                 
			$mail->Username   = "info@finesseim.com";  
			$mail->Password   = "kashubhai04";           
			$mail->From       = $from;
			$mail->FromName   = $toname;
			$mail->Subject    = $subject;
			$file = $this->config->base_url().'FinesseProfile.pdf';
			$mail->AddAttachment($file);
			
			$message2=$this->usermessagehtml($email,$name,$phone,$message);
			$mail->MsgHTML($message2);
			
			
			$mail->AddAddress($email,$name); // To User
			$mail->addBCC('shweta.tyagi31@gmail.com','Shweta');
			$mail->addBCC('abhishekaayij89@gmail.com','Abhi');
			//$mail->addBCC('leena.digital','Leena');
			$mail->addBCC('abhishek.kumar@finessse.digital','Abhi');
             $mail->IsHTML(true); 
			 $mail->Send();
		  
		$this->session->set_flashdata('message', 'Thanks for sumbmit query');
		redirect("thank-you.html");
	}
	
  function adminmessageaboutprojecthtml($email,$name,$phone,$service,$message)
   {
	 
			 $msg='';	 
			 
			 $msg.='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Finessse Digital</title>
</head>
<body topmargin="0" bottommargin="0" marginheight="0" marginwidth="0" leftmargin="0" rightmargin="0">
<table width="802" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#1ba6f7" >
<tr>
	<td valign="top">
    	<table width="800" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#ffffff">
<tr><td bgcolor="#fff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
  <tr> <td align="center" valign="middle" colspan="3"><img src="http://finesse.digital/public/images/logo.png" /></td></tr>
 <tr><td bgcolor="#fff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
<tr><td bgcolor="#1ba6f7" height="1" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="1" /></td></tr>
        		<tr><td bgcolor="#fff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
                
                
    <tr>
    <td bgcolor="#fff" width="20"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif"  /></td>
    <td>
    
    	<table width="100%" border="0" cellspacing="10" cellpadding="0">
             <tr><td align="left"><font face="Arial" color="#222" size="2">Dear Admin,</font></td></tr>
                <tr><td align="left"><font face="Arial" color="#222" size="2">Please find user details:</font></td></tr>
                <tr><td>
        	        		<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
    <td><font face="Arial" color="#222" size="2"> Service</font></td>
    <td>:</td>
    <td><font face="Arial" color="#222" size="2">'.$service.'</font></td>
  </tr>
  <tr>
    <td><font face="Arial" color="#222" size="2"> Query</font></td>
    <td>:</td>
    <td><font face="Arial" color="#222" size="2">'.$message.'</font></td>
  </tr>
</table>                	
                </td></tr>
                <tr><td bgcolor="#fff"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
                
                <tr><td bgcolor="#fff"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
                <tr><td align="left" style="line-height:1.5em"><font face="Arial" color="#222" size="2">Regards,<br/>Finessse Interactive Solutions Pvt. Ltd.<br/>608, 6th Floor,Vishwasadan Bldg District Centre,  <br/>Janak Puri,New Delhi - 110058 (INDIA)<br/>Pnone: <a href="tel:+91- 9810619956" style="color:#1ba6f7;text-decoration:none">+91- 9810619956</a> <a href="tel:+91-11-45588792" style="color:#1ba6f7;text-decoration:none">+91-11-45588792</a><br/>Email: <a href="mailto:info@finessse.digital" style="color:#1ba6f7;text-decoration:none">info@finessse.digital</a> </font></td></tr>
</table>

    </td>
    <td bgcolor="#fff" width="20"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif"  /></td>
    </tr>
      <tr><td bgcolor="#fff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>  
 <tr><td bgcolor="#1ba6f7" align="center" height="30" colspan="3"><font face="Arial" color="#fff" size="2"> Copyright '.date('Y').' Finessse Interactive. All Rights Reserved.</font></td></tr>
</table>
   
    </td>
</tr>
</table>

</body></html>
';


			return $msg;

  }
  
		
	

	
	
	
	public function quote()
	{
		    include('phpmailer/class.phpmailer.php');
            include('phpmailer/class.smtp.php');
			
			$this->index_model->quote();
       
	       $name=$_POST['name'];
	       $email=$_POST['email'];
		   $phone=$_POST['contactno'];
		   $message =$_POST['message'];
		   
		   if($_POST['captcha']!=$_POST['cresult']){
			     $rurl=$_POST['rurl'];
				 $this->session->set_flashdata('captchamsg', 'Invalid Your Captcha');
			     header("Location:$rurl");
				 die();
			   
		   }
			 
		
			$to=$from='info@finesseim.com';
			$toname='Info';
			 
			 
		   
			//====== Send Admin 
			
			
			$subject='Request Quote Form – www.finessse.digital';
             
			
			
			
			$mail             = new PHPMailer();
			$mail->SMTPSecure = "ssl";                 
			$mail->Host       = "mail.finesseim.com";      
			$mail->Port       = 25;                 
			$mail->Username   = "info@finesseim.com";  
			$mail->Password   = "kashubhai04";                
			$mail->From       = $from;
			$mail->FromName   = $toname;
			$mail->Subject    = $subject;
			
			$message1=$this->adminmessagehtml($email,$name,$phone,$message);
			$mail->MsgHTML($message1);
			
			
			$mail->AddAddress($to,$toname); // To Admin
			$mail->addBCC('shweta.tyagi31@gmail.com','Shweta');
			$mail->addBCC('abhishekaayij89@gmail.com','Abhi');
			$mail->addBCC('leena.digital','Leena');
            $mail->IsHTML(true); 
			$mail->Send();

           //============= Send User 
		   
		  
			$subject='Thank you for your Query Submission @ Finessse Interactive';
			
			
		
			$mail             = new PHPMailer();
			$mail->SMTPSecure = "ssl";                 
			$mail->Host       = "mail.finesseim.com";      
			$mail->Port       = 25;                 
			$mail->Username   = "info@finesseim.com";  
			$mail->Password   = "kashubhai04";               
			$mail->From       = $from;
			$mail->FromName   = $toname;
			$mail->Subject    = $subject;
			$file = $this->config->base_url().'FinesseProfile.pdf';
			$mail->AddAttachment($file);
			
			$message2=$this->usermessagehtml($email,$name,$phone,$message);
			$mail->MsgHTML($message2);
			
			
			$mail->AddAddress($email,$name); // To User
			$mail->addBCC('shweta.tyagi31@gmail.com','Shweta');
			$mail->addBCC('leena.digital','Leena');
            $mail->IsHTML(true); 
			$mail->Send();
		   
		   
		   
			
		$this->session->set_flashdata('message', 'Thanks for sumbmit query');
		redirect("thank-you.html");
		
	}
	
	
 function adminmessagehtml($email,$name,$phone,$message)
   {
	 
			 $msg='';	 
			 
			 $msg.='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Finessse Digital</title>
</head>
<body topmargin="0" bottommargin="0" marginheight="0" marginwidth="0" leftmargin="0" rightmargin="0">
<table width="802" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#1ba6f7" >
<tr>
	<td valign="top">
    	<table width="800" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#ffffff">
<tr><td bgcolor="#fff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
  <tr> <td align="center" valign="middle" colspan="3"><img src="http://finesse.digital/public/images/logo.png" /></td></tr>
 <tr><td bgcolor="#fff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
<tr><td bgcolor="#1ba6f7" height="1" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="1" /></td></tr>
        		<tr><td bgcolor="#ffffff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
                
                
    <tr>
    <td bgcolor="#fff" width="20"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif"  /></td>
    <td>
    
    	<table width="100%" border="0" cellspacing="10" cellpadding="0">
             <tr><td align="left"><font face="Arial" color="#222" size="2">Dear Admin,</font></td></tr>
                <tr><td align="left"><font face="Arial" color="#222" size="2">Please find user details:</font></td></tr>
                <tr><td>
        	        		<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
    <td><font face="Arial" color="#222" size="2"> Query</font></td>
    <td>:</td>
    <td><font face="Arial" color="#222" size="2">'.$message.'</font></td>
  </tr>
</table>                	
                </td></tr>
                <tr><td bgcolor="#fff"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
                
                <tr><td bgcolor="#fff"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
                <tr><td align="left" style="line-height:1.5em"><font face="Arial" color="#222" size="2">Regards,<br/>Finessse Interactive Solutions Pvt. Ltd.<br/>608, 6th Floor,Vishwasadan Bldg District Centre,  <br/>Janak Puri,New Delhi - 110058 (INDIA)<br/>Pnone: <a href="tel:+91- 9810619956" style="color:#1ba6f7;text-decoration:none">+91- 9810619956</a> <a href="tel:+91-11-45588792" style="color:#1ba6f7;text-decoration:none">+91-11-45588792</a><br/>Email: <a href="mailto:info@finessse.digital" style="color:#1ba6f7;text-decoration:none">info@finessse.digital</a> </font></td></tr>
 </table>

    </td>
    <td bgcolor="#fff" width="20"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif"  /></td>
    </tr>
      <tr><td bgcolor="#fff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>  
 <tr><td bgcolor="#1ba6f7" align="center" height="30" colspan="3"><font face="Arial" color="#fff" size="2"> Copyright '.date('Y').' Finessse Interactive. All Rights Reserved.</font></td></tr>
</table>
   
    </td>
</tr>
</table>

</body></html>
';


			return $msg;

  }
  
		
	

	
 function usermessagehtml($email,$name,$phone,$message)
   {
	 
			  $msg='';	 
			 
			 $msg.='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Finessse Digital</title>
</head>
<body topmargin="0" bottommargin="0" marginheight="0" marginwidth="0" leftmargin="0" rightmargin="0">
<table width="802" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#1ba6f7" >
<tr>
	<td valign="top">
    	<table width="800" border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#ffffff">
<tr><td bgcolor="#fff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
  <tr> <td align="center" valign="middle" colspan="3"><img src="http://finesse.digital/public/images/logo.png" /></td></tr>
 <tr><td bgcolor="#fff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
<tr><td bgcolor="#1ba6f7" height="1" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="1" /></td></tr>
<tr><td bgcolor="#fff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr> 
     <tr>
    <td bgcolor="#fff" width="20"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif"  /></td>
     <td>
    
		<table width="100%" border="0" cellspacing="10" cellpadding="0">
		<tr><td align="left"><font face="Arial" color="#222" size="2"><strong>Dear <span style="color:#1ba6f7">'.ucwords($name).'</span>,</strong></font></td></tr>
		<tr><td align="left"><font face="Arial" color="#222" size="2">Finesse Interactive thanks you for your query submission; we shall call you back within 8 working hours. If you wish to call us, pls use the nos. listed below to get in touch with us. Meanwhile if you wish to see our company presentation, please <a style="color:#1ba6f7" href="http://www.finessse.digital/FinessseProfile.pdf" target="_blank">click here</a> or copy paste this URL in your browser: <a style="color:#1ba6f7" href="http://www.finessse.digital/FinessseProfile.pdf" target="_blank">http://www.finessse.digital/FinessseProfile.pdf</a>. </font></td></tr>
		<tr><td bgcolor="#fff"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="8" /></td></tr>
		<tr><td align="left"><font face="Arial" color="#222" size="2">Further we have also attached our company profile for your kind perusal with this email.</td></tr>
		<tr><td bgcolor="#fff"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
                
                <tr><td bgcolor="#fff"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
				 <tr><td align="left" style="line-height:1.5em"><font face="Arial" color="#222" size="2">
				 Regards,<br/>Deepak Thakkar<br/>Chief Executive Officer<br/>+91-9810619956/ +91-11-45588792 (D)/ 45579559</td></tr>
				 
				 <tr><td bgcolor="#fff"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
                <tr><td align="left" style="line-height:1.5em"><font face="Arial" color="#222" size="2">Finessse Interactive Solution Pvt Ltd<br/>
608, 6th Floor, Vishwa Sadan Bldg<br/>
District Centre, Janak Puri<br/>
New Delhi - 110058<br/>
Website: <a href="http://www.finesseim.com" style="color:#1ba6f7" target="
_blank">http://www.finesseim.com</a><br/>
Google Talk | Alternate Mail ID: <a style="color:#1ba6f7" href="mailto:deepak.thakkar@gmail.com">deepak.thakkar@gmail.com</a></font></td></tr>
 <tr><td bgcolor="#fff"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr>
                <tr><td align="left" style="line-height:1.5em"><font face="Arial" color="#222" size="1">The information contained in this electronic message and any attachments to this message are intended for the exclusive use of the addressee(s) and may contain confidential or privileged information. If you are not the intended recipient, please notify the sender immediately and destroy all copies of this message and any attachments.<br/>
Further Finesse Interactive Solution Pvt Ltd under no circumstance would be responsible for any action taken on the basis of the information provided above.<br/>
WARNING: Computer viruses can be transmitted via email. The recipient should check this email and any attachments for the presence of viruses. The company accepts no liability for any damage caused by any virus transmitted by this email. </font></td></tr>
		</table>                	
                </td>
    <td bgcolor="#fff" width="20"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif"  /></td>
    </tr>
      <tr><td bgcolor="#fff" colspan="3"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif" height="12" /></td></tr> 
      <tr ><td colspan="4" align="center" ><font face="Arial" color="#222" size="4">STAY <span style="color:#1ba6f7" > CONNECTED</span></font></td></tr>
     <tr ><td colspan="4" align="center" ><font face="Arial" color="#222" size="4"><a href="https://www.facebook.com/FinessseInteractiveSolution" target="_blank"><img src="'.$this->config->base_url().'public/images/fb-mail-icon.jpg" alt="Facebook" /></a>
	 <a href="https://www.linkedin.com/company/1568398/" target="_blank">
	 <img src="'.$this->config->base_url().'public/images/linkedin-mail-icon.jpg" alt="LinkedIn" /></a>
	 <a href="https://twitter.com/finessseim" target="_blank"><img src="'.$this->config->base_url().'public/images/twitter-mail-icon.jpg" alt="Twitter" /></a>
	 <a href="https://www.instagram.com/finessseinteractive/" target="_blank"><img src="'.$this->config->base_url().'public/images/instagram-mail-icon.jpg" alt="Instagram" /></a>
	 </font></td></tr>
      <td bgcolor="#fff" width="20"><img src="http://www.finesseim.com/emailer/24dec/images/1px.gif"  /></td>
 <tr><td bgcolor="#1ba6f7" align="center" height="30" colspan="3"><font face="Arial" color="#fff" size="2"> Copyright '.date('Y').' Finessse Interactive. All Rights Reserved.</font></td></tr>

</table>
   
    </td>
</tr>
</table>

</body></html>';


			return $msg;

  }
  
  public function error404()
  {
	  $meta['title']='Welcome to Finessse Interactive Solutions';		
		$meta['keyword']='Finessse Interactive';		
		$meta['description']='Finessse Interactive';	
		$data=[];		
		$this->load->view('header',$meta);	
		$this->load->view('error404',$data);	
		$this->load->view('footer',$data);
	  
  }
  
 
  	
	
	
//=========================  Don't Touch ===========
	
}