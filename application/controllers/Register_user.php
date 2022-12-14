<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_user extends CI_Controller {

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
	function __construct() {
    	parent::__construct();
    	$this->load->model('Register_user_model');
    	$this->load->model('Display_modal');
    	$this->load->library('session');
    	$this->load->library('encryption');
	}
	public function index()
	{
		$data = array(
				
				
				'content' => 'register_user_view'
		);
		$this->load->view('dentakliktemplate',$data);

	}

	public function insertonlyuser()
	{
      $enteringvcode = $this->input->post('vcode');

      if(isset($_SESSION['regmaild']))
      {
      	$created_code = $this->session->userdata('vcode');

      	if($created_code==$enteringvcode)
      	{
           
           unset(
	        $_SESSION['regmaild'],
	        $_SESSION['vcode']
	       );

           $ins_date=date('Y-m-d');

      		$data1=array(             
             'user_agent_id'=>'1',
             'user_type'=>'user',
             'user_name'=>$this->input->post('umail'),
             'user_pwd'=>$this->encryption->encrypt($this->input->post('pswd')),
             'user_displayname'=>$this->input->post('fullname'),
             'user_contry'=>$this->input->post('ucountry'),
             'user_address'=>'n/a',
             'user_state'=>'n/a',
             'user_city'=>'n/a',
             'user_pincode'=>'n/a',
             'user_phone'=>$this->input->post('mobno'),
             'user_status'=>'1',
             'user_img'=>'n/a',
             'user_modified'=>$ins_date
      		);

      	$res123 = $this->Register_user_model->insertuser($data1);

      		if($res123==1)
      		{
      			echo "success";
      		} 
      		else
      		{
      			echo "failed";
      		}	
      	}
      }
      else
      {
      	echo "verification code invalid";
      }
	}

	public function checkphon()
	{
		$mobno = $this->input->post('mobno');

		$mobnocount = $this->Register_user_model->getmobcont($mobno);
		$existmobcont = $mobnocount->mobsame;

		if($existmobcont=='0')
		{
			echo "success";
		}
		else
		{
			echo "faile";
		}	
	}

	public function checkmailsendcod()
	{
		$mailid = $this->input->post('mailid');

		$mailcount = $this->Register_user_model->getmailcount($mailid);
		$mailcount = $mailcount->mailsame;

		if($mailcount=='0')
		{
			

			// $verycode = rand(1000,9999);
			
			$verycode=1234;
            
            $data2=array(
            	'regmaild'=>$mailid,
            	'vcode'=>$verycode 
            );
			$this->session->set_userdata($data2);



			// $frommail ="ansib@e4technosolutions.com";

			        


			// $pageaddress = $_SERVER['HTTP_REFERER'];


			        

			//         $message = '<html>
			// <head>
			//   <title>Registraion Mail</title>
			// </head>
			// <body>

			// <h2>Dentaklik</h2>

			// <h3>Your Verification Code is '.$verycode.'</h3>

			// </body>
			// ';

			//     $subject='Registraion code';

			//     $headers  = 'MIME-Version: 1.0' . "\r\n";
			// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			// $headers .= "From: ". $frommail."\r\n";
			// $headers .= "";
			// $a=mail($mailid,$subject,$message,$headers,"-f$frommail");


			// if($a)
			// {
			// 		echo "success";
			// 	// redirect('Student_register/otp_view');
			// }
			// else
			// {
			// 	    echo "faild";
			// }
			echo "success";
		}
		else
		{
			echo "exist";
		}	
	}

	public function loginpage()
	{
		$data = array(
			
				'content' => 'login_user_view'
		);
		$this->load->view('dentakliktemplate',$data);
	}


	public function checklogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$res123 = $this->Register_user_model->getuser($username);
	}

}	