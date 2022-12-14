<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
    	$this->load->model('display_modal');
    	$this->load->model('User_modal');
    	$this->load->library('encryption');
	}
	public function index()
	{
		// $this->load->view('welcome_message');
		$categname = $this->display_modal->get_categories();
		$data = array(
				'categoriesdesc' => $categname,
				'content' => (!isset($_SESSION['grocuname'])) ? 'login_view' : 'cart_view'
		);
		$this->load->view('grocerytemplate',$data);

	}
	public function checklogin()
	{
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');//
		$this->load->model('User_modal');   
		$reslog = $this->User_modal->logincheck($username);
		if($reslog->num_rows() == 1){
			$res = $reslog->row();

     		if(($username == $res->user_name) && ($password == $this->encryption->decrypt($res->user_pwd)))
     		{

     			if($res->user_type == 'user')
     			{
     				    $logindata = array(
				        'grocuname'  => $username,
				        'grocuprime' => $this->encryption->encrypt($res->user_id),
				        'logged_in' => TRUE
					    );
					    $this->session->set_userdata($logindata);
					    echo "user";

     			}
     			else
     			{
	     				$adminlogindata = array(
		     			'admindisplay' => $res->user_displayname,
				        'adminuser'  => $username,
				        'adminuserid' => $this->encryption->encrypt($res->user_id),
				        'adminusertp' => $res->user_type,
				        'adminlogged_in' => TRUE,
				        'vendor_id' => $res->user_id
					     );
	     				$this->session->set_userdata($adminlogindata);
	     				echo "agent";
     			}

				
			}
			else
			{
				echo "failed";
			}
		}
		else
		{
			echo "failed";
		}		
	}
	public function checkadminlogin()
	{
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');//
		$this->load->model('User_modal');   
		$reslog = $this->User_modal->logincheck($username);
		if($reslog->num_rows() == 1){
			$res = $reslog->row();
			
     		if( ($username == $res->user_name) 
     			&& ($password == $this->encryption->decrypt($res->user_pwd)) 
     			&& ($res->user_type !== 'user')
     		){
     		
     		$adminlogindata = array(
		        'adminuser'  => $username,
		        'adminuserid' => $this->encryption->encrypt($res->user_id),
		        'adminlogged_in' => TRUE
			);
			$this->session->set_userdata($adminlogindata);
				echo "success";
			}else{
				echo "failed";
			}
		}else{
			echo "failed";
		}		
	}
	public function sendm(){
			$to = $this->input->post('emailsend');
			$pwd = $this->User_modal->passretrieve($to);
			if(!empty($pwd)){
				//echo "test";
			$pd = $this->encryption->decrypt($pwd->user_pwd);
	//		$this->load->library ( 'email' );
   //          $config ['protocol'] = 'smtp';
   //          $config ['smtp_host'] = 'mail.b2peak.com';
   //          $config ['smtp_port'] = '587';
   //          $config ['smtp_user'] = 'no-replay@b2peak.com';
   //          $config ['smtp_pass'] = '8,zalZHlNRzf';
   //          $config ['mailtype'] = 'html';
   //          $config ['charset'] = 'utf-8';
   //          $config ['wordwrap'] = TRUE;
   //          $config ['newline'] = "\r\n";
            
   //          $this->email->initialize ( $config );
           
           
   //          $this->email->from ('no-replay@b2peak.com', 'B2PeaK' );
            
   //          $this->email->to ( $to );
   //          $this->email->reply_to('info@b2peak.com', 'B2Peak');
   //          $subject = 'Your password';
   //          $htmlbody = 'Your password is';

   //          $this->email->subject ( $subject );
   //          $this->email->message('Your password is' .$pd.'.');
            
        
   //      	if($this->email->send()){   
	  //           echo "success";
	  //       } else {
	  //           echo "wrongmail";
	  //       }

		 $email = "info@b2peak.com";
         $subject = "Password Recovery";
         
         $message = "<p><b>Your password is : ".$pd."</b></p>";
         
         $header = "From:no-replay@b2peak.com \r\n";
         $header .= "Reply-To: ".$email."\r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
		         if( $retval == true ) {
		            echo "send";
		         }else {
		            echo "error";
		         }
				
			}else{
				echo 'wrongmail';
			}

		            
		}


		
		public function logout()
		{
			if($_SESSION['adminusertp'] == "agent")
			{
				unset(
		        $_SESSION['adminuser'],
		        $_SESSION['admindisplay'],
		        $_SESSION['adminusertp'],
		        $_SESSION['adminuserid'],
		        $_SESSION['access'],
		        $_SESSION['vendor_id'],
		        $_SESSION['adminlogged_in']);
		        redirect('index.php/home');

			}
			else
			{
				unset(
		        $_SESSION['grocuname'],
		        $_SESSION['password'],
		        $_SESSION['access'],
		        $_SESSION['logged_in']);
				redirect('index.php/home');

			}
			
		}

		public function adminlogout()
		{
			unset(
	        $_SESSION['adminuser'],
	        $_SESSION['adminuserid'],
	        $_SESSION['access'],
	        $_SESSION['adminlogged_in']);
			redirect('index.php/login/adminlogin');
		}
	public function myaccount(){
		if(isset($_SESSION['grocuname'])){
		 	$id = $this->encryption->decrypt($_SESSION['grocuprime']);
		 	$this->load->model('User_modal');
		 	$resrow = $this->User_modal->edituser($id,'user');
		 $this->load->model('Display_modal');
		 	
		 	$reshomes = $this->Display_modal->getaddressforhome($id);
		 	$resothers = $this->Display_modal->getaddressforother($id);
		 	$data['reshomes'] = $reshomes;
		 	$data['resothers'] = $resothers;
		 	$data['resrow'] = $resrow;
			$data['content'] = 'frontendtables/userupdatedetails_view';
			
		$this->load->view('grocerytemplate',$data);

		}else{
			redirect('index.php/login');
		}
	 }
	 public function myaccountcheckout(){
		if(isset($_SESSION['grocuname'])){
		 	$id = $this->encryption->decrypt($_SESSION['grocuprime']);
		 	$this->load->model('User_modal');
		 	$resrow = $this->User_modal->edituser($id,'user');
		 	$data['resrow'] = $resrow;
			// $data['content'] = 'frontendtables/userupdatedetails_view';
			
		$this->load->view('frontendtables/userupdatedetails_view',$data);

		}
		// else{
		// 	redirect('login');
		// }
	 }

}