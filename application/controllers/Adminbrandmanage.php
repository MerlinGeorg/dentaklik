<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminbrandmanage extends CI_Controller {

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
    
    	$this->load->model('Brand_modal');
    	$this->load->library('encryption');

    }


    public function index()
    {
    	if(isset($_SESSION['adminusertp'])){
        	$a = array('content' => 'adminbrand_view');
			$this->load->view('admintemplate',$a);
		}else{
			$this->load->view('adminlogin_view');
		}
  //        $a = array('content' => 'adminbrand_view');
		// $this->load->view('admintemplate',$a);
    }


    public function insertbrand()
    {
    	                $brdid=$this->input->post('brandid');
						$brdname=$this->input->post('brandname');
						// $catimage=$this->input->post('image_file');
						if($_SESSION['adminusertp'] == 'agent'){
						 $staus = 1;
						 $user_id = $this->encryption->decrypt($_SESSION['adminuserid']);
					    }
					    else
					    {
					    	$staus = 0;
							$user_id = 0;
					    }

                        $date = date('Y-m-d');
                        $imagehid = $this->input->post('imagehid');

			    // runnning code start
			          $config['upload_path'] = 'imageupload/'; 
			          $config['allowed_types'] = 'jpg|jpeg|png|gif';
			          $this->load->library('upload',$config); 
			          $this->upload->initialize($config);
			           $data = array('upload_data' => $this->upload->data());
			            if (!$this->upload->do_upload('image_file'))
			            {	
			                $error = array('error' => $this->upload->display_errors());
			            } else {
			                $data = array('upload_data' => $this->upload->data());
			               
			            }
			         // $data['upload_data']['file_name']
			 		 // runnning code end
			          if ( $_FILES['image_file']['size'] == 0)
						{
						    $filename = $imagehid;

						}else{
			         		if(!empty($brdid)){
								$unlink_path = 'imageupload/'.$imagehid;
								if(!empty($imagehid)){
									unlink($unlink_path);
								}					
							}
							$filename = $data['upload_data']['file_name'];
						}


				 				$data1= array('brand_name' =>$brdname ,'brand_image'=>$filename,'brand_date' =>$date,'brand_agent_id' =>$user_id,'brand_status' =>$staus );

				 			
				 				if(!empty($brdid)){
								 	$res = $this->Brand_modal->brand_update($brdid,$data1);
								 	
				 				}else{
				 					$res = $this->Brand_modal->brand_insert($data1);
				 				}
								 
								if($res == 1)
								{		
									echo "success";
								}else{
								
									echo "failed";
								}

    }

      public function getbrand()
      {
      	$this->load->model('Brand_modal');
      	$res['br']= $this->Brand_modal->getbrand();
      	$this->load->view('admintables/adminbrandtable_view',$res);
      }

      public function editbrand()
      {

		 	$id=$this->input->post('id');
		 	$this->load->model('Brand_modal');
		 	$resrow = $this->Brand_modal->editbrand($id,'brand');
		 	$res = array('brand_id'=> $resrow->brand_id,'brand_name' => $resrow->brand_name,
		 		'brand_image' => $resrow->brand_image
		 	);
			echo json_encode($res);
		 
      }

      public function deletebrand()
      {
      	$brid = $this->input->post('id');
      	$imagename = $this->input->post('imagename');
				$unlink_path = 'imageupload/'.$imagename;
					if(!empty($imagename)){
						unlink($unlink_path);
					}


      	$res = $this->Brand_modal->deletebrand($brid);

      	if($res==1)
      	{
      		echo "success";

      	}
      	else
      	{
      		echo "failed";
      	}	

      }


public function changepriority(){
		 	$id = $this->input->post('id');
		 	$status = $this->input->post('status');
		 	$res = $this->Brand_modal->priority($id,$status);
		 	if($res == 1){
		 		echo "success";
		 	}else{
		 		echo "failed";
		 	}
		 	
		 }		
      


}
    	