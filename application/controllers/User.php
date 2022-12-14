<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
    	$this->load->model('User_modal');
    	$this->load->library('encryption');
	}
	public function index()
	{ 
		if(isset($_SESSION['adminusertp'])){
			// if($_SESSION['adminusertp'] == 'admin'){
			// 	$a['content'] = 'adminusermanage_view';
			// }else{
			// 	$a['content'] = 'adminhome_view';
			// }
			$a['content'] = 'adminusermanage_view';
			$a['stores'] = $this->User_modal->display('store');
			$this->load->view('admintemplate',$a);
		}else{
			$this->load->view('adminlogin_view');
		}
        
		
	}
	public function insertonlyuser()
		{
                           
						$userfullname=$this->input->post('userfullname');
						$username=$this->input->post('username');
						$userstore=$this->input->post('userstore');
						
						$useraddress=$this->input->post('useraddress');
						$userphone=$this->input->post('userphone');
						// $user_agent_id
						$userlevel=$this->input->post('userlevel');
						if($userlevel == 'agent')
						{
							$userstatus = 1;
						}
						else
						{
							$userstatus = 1;
						}
						$mode = $this->input->post('mode');
						$userid = $this->input->post('userid');
						$usercity = $this->input->post('usercity');
						$userpincode = $this->input->post('userpincode');
						

                        $date = date('Y-m-d');
                        
      				
      					$userpassword=$this->encryption->encrypt($this->input->post('userpassword'));
      					$data1= array('user_agent_id' =>"1",'user_type' =>$userlevel ,'user_name'=>$username,'user_pwd'=>$userpassword,'user_displayname' =>$userfullname ,'user_address' =>"NA" ,'user_city' =>"NA",'user_pincode' =>"NA",'user_phone'=>$userphone,'user_status'=>$userstatus,'user_modified' =>$date );
      				
	 				

	 					$this->load->model('User_modal');
	 					$userconfirmpassword=$this->input->post('userconfirmpassword');
	 				if(!empty($userid)){
	 					
	 				
	 					 $respassword = $this->User_modal->user_checkpassword($userid);
	 					
	 					 if($this->encryption->decrypt($respassword->user_pwd) == $userconfirmpassword){


					 	$res = $this->User_modal->user_update($userid,$data1);
					 	}else{
					 		$res = "password";
					 	}
	 				}else{
	 					$userpassword2 = $this->input->post('userpassword');
		 				if($userpassword2 == $userconfirmpassword){
						 	$res = $this->User_modal->user_insert($data1);
						 }else{
						 		$res = "password";
						 	}
	 					
	 				}
					 
					if($res == 1)
					{		
						echo "success";
					}else if($res == "password"){
					
						echo "password";
					}else{
						echo "failed";
					}

			
		}
	 public function insertuser()
		{

		// $action = $this->input->post('save');

		// 		if($action == 'save') 
		// 		{
					   

                   
                           
						$userfullname=$this->input->post('userfullname');
						$username=$this->input->post('username');
						// $userstatus=$this->input->post('userstatus');
						$userstore=$this->input->post('userstore');
						
						$useraddress=$this->input->post('useraddress');
						$userphone=$this->input->post('userphone');
						$userlevel='agent';
						$mode = $this->input->post('mode');
						$userid = $this->input->post('userid');
						$usercity = $this->input->post('usercity');
						$userpincode = $this->input->post('userpincode');
						

                        $date = date('Y-m-d');
                        
      				
      					$userpassword=$this->encryption->encrypt($this->input->post('userpassword'));
      					$data1= array('user_agent_id' =>$userstore ,'user_type' =>$userlevel ,'user_name'=>$username,'user_pwd'=>$userpassword,'user_displayname' =>$userfullname ,'user_address' =>$useraddress ,'user_city' =>$usercity,'user_pincode' =>$userpincode,'user_phone'=>$userphone,'user_modified' =>$date );
      				
	 				

	 					$this->load->model('User_modal');
	 				if(!empty($userid)){

					 	$res = $this->User_modal->user_update($userid,$data1);
					 	
	 				}else{
	 					$res = $this->User_modal->user_insert($data1);
	 				}
					 
					if($res == 1)
					{		
						echo "success";
					}else{
					
						echo "failed";
					}

			
		}
			 public function inserthomeaddress()
		{

		// $action = $this->input->post('save');

		// 		if($action == 'save') 
		// 		{
					   

                   
                         $landmark2 = $this->input->post('landmark2');
                         $addrlat2 = $this->input->post('addrlat2');
                         $addrlong2 = $this->input->post('addrlong2');
						$homename=$this->input->post('homename');
						$homeaddress=$this->input->post('homeaddress');
						
						// $useraddress=$this->input->post('useraddress');
						$homecity=$this->input->post('homecity');
						$homepincode=$this->input->post('homepincode');
						$mode = $this->input->post('mode');
						// $homeuserid = $this->input->post('homeuserid');
						$rescheckhome = $this->User_modal->checkexistaddr($this->encryption->decrypt($_SESSION['grocuprime']),'home');
						// $usercity = $this->input->post('usercity');
						// $userpincode = $this->input->post('userpincode');
						

                        $date = date('Y-m-d');
                        
      				
      						$data1= array('address_user_id' =>$this->encryption->decrypt($_SESSION['grocuprime']),'address_name' =>$homename ,'address_addr'=>$homeaddress,'address_city' =>$homecity ,'address_pincode'=>$homepincode,'address_nearest_location'=>$landmark2,'address_lat'=>$addrlat2,'address_long'=>$addrlong2,'address_type'=>'home','address_date' =>$date );
      				
	 				

	 					$this->load->model('User_modal');
	 				if($rescheckhome > 0){
					 	$res = $this->User_modal->homeaddressupdate($this->encryption->decrypt($_SESSION['grocuprime']),$data1,'home');
					 	
	 				}else{
	 					$res = $this->User_modal->homeaddressinsert($data1);
	 				}
					 
					if($res == 1)
					{		
						echo "success";
					}else{
					
						echo "failed";
					}

			
		}
		
		public function checkstoreexist(){
			$storeid = $this->input->post('userstore');
			$mode = $this->input->post('mode');
			if(empty($mode)){
				$res = $this->User_modal->checkstore($storeid);
			}else{
				$existusrid = $this->User_modal->displaybyrow('user',$mode);
				$res = $this->User_modal->checkstoreupd($storeid,$existusrid->user_agent_id);
			}
			
			if($res->num_rows()>0){
				echo "failed";
			}else{
				echo "success";
			}
		}
		public function checkstoreupd(){
			$storeid = $this->input->post('userstore');
			$storeid2 = $this->input->post('userstore2');
			$res = $this->User_modal->checkstoreupd($storeid,$storeid2);
			if($res->num_rows()>0){
				echo "failed";
			}else{
				echo "success";
			}
		}
		public function insertotheraddress()
		{

		// $action = $this->input->post('save');

		// 		if($action == 'save') 
		// 		{
					   

                   		$landmark3 = $this->input->post('landmark3');
                         $addrlat3 = $this->input->post('addrlat3');
                         $addrlong3 = $this->input->post('addrlong3');
                           
						$othername=$this->input->post('othername');
						$otheraddress=$this->input->post('otheraddress');
						
						// $useraddress=$this->input->post('useraddress');
						$othercity=$this->input->post('othercity');
						$otherpincode=$this->input->post('otherpincode');
						// $mode = $this->input->post('mode');
						// $otheruserid = $this->input->post('otheruserid');
						$rescheckother = $this->User_modal->checkexistaddr($this->encryption->decrypt($_SESSION['grocuprime']),'other');
						// $usercity = $this->input->post('usercity');
						// $userpincode = $this->input->post('userpincode');
						

                        $date = date('Y-m-d');
                        
      				
      						$data1= array('address_user_id' =>$this->encryption->decrypt($_SESSION['grocuprime']),'address_name' =>$othername ,'address_addr'=>$otheraddress,'address_city' =>$othercity ,'address_pincode'=>$otherpincode,'address_nearest_location'=>$landmark3,'address_lat'=>$addrlat3,'address_long'=>$addrlong3,'address_type'=>'other','address_date' =>$date );
      				
	 				

	 					$this->load->model('User_modal');
	 				if($rescheckother > 0){
					 	$res = $this->User_modal->homeaddressupdate($this->encryption->decrypt($_SESSION['grocuprime']),$data1,'other');
					 	
	 				}else{
	 					$res = $this->User_modal->homeaddressinsert($data1);
	 				}
					 
					if($res == 1)
					{		
						echo "success";
					}else{
					
						echo "failed";
					}

			
		}
		 public function getusers(){
		 	$this->load->model('User_modal');
		 	$usertype = $this->input->post('usertype');
		 	
		 	$userid = $this->encryption->decrypt($_SESSION['adminuserid']);
		 	if($userid == 'admin001'){
		 		$a['tabledata'] = $this->User_modal->displaybyagents($usertype);
		 	}else{
		 		$a['tabledata'] = $this->User_modal->displaybyuserid($userid);
		 	} 
		 	

		 	$this->load->view('admintables/adminusertable_view',$a);
		 }
		 public function edituser(){
		 	$id=$this->input->post('id');
		 	$this->load->model('User_modal');
		 	$resrow = $this->User_modal->edituser($id,'user');
		 	$res = array(
		 		'userstore' => $resrow->user_agent_id,
		 		'userdisplayname' => $resrow->user_displayname,
		 		'username' => $resrow->user_name,
		 		'user_displayname' => $resrow->user_displayname,
		 		'userpwd' => $this->encryption->decrypt($resrow->user_pwd),
		 		'useraddress' => $resrow->user_address,
		 		'userphone' => $resrow->user_phone,
		 		'usertype' => $resrow->user_type,
		 		'userid' => $resrow->user_id,
		 		'usercity' => $resrow->user_city,
		 		'userpincode' => $resrow->user_pincode
		 );
			echo json_encode($res);
		 }
		 	 public function deleteuser()
		{
				$userid = $this->input->post('id');


				$this->load->model('User_modal');
				
				$res = $this->User_modal->delete_user($userid);
	 				
					 
				if($res == 1)
				{		
					echo "success";
				}else{
				
					echo "failed";
				}

				
		}
		
		public function verifyuser()
		{
				$userid = $this->input->post('id');

				$status = $this->input->post('st');
				$this->load->model('User_modal');
				
				$res = $this->User_modal->verify_user($userid,$status);
	 				
					 
				if($res == 1)
				{		
					echo "success";
				}else{
				
					echo "failed";
				}

				
		}
		 public function emailcheckexist()
			{
				$userid = $this->input->post('emailvalue');


				$this->load->model('User_modal');
				
				$res = $this->User_modal->checkemail($userid);
	 				
					 
				if($res->num_rows() > 0)
				{		
					echo "success";
				}else{
				
					echo "failed";
				}
			}
			public function emailcheckexistupd()
			{
				$emailid = $this->input->post('emailvalue');

				$userid = $this->input->post('userid');
				$this->load->model('User_modal');
				
				$rescheckalready = $this->User_modal->edituser($userid,'user');
				$res = $this->User_modal->checkemailupd($rescheckalready->user_name,$emailid);
	 				
					 
				if($res->num_rows() > 0)
				{		
					echo "success";
				}else{
				
					echo "failed";
				}
			}
		 
	



}
