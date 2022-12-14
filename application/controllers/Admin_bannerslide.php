<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_bannerslide extends CI_Controller {

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
    
    	$this->load->model('Bannerslider_model');
    	$this->load->library('encryption');

    }

    public function index()
    {
    	if(isset($_SESSION['adminusertp'])){
        	$a = array('content'=>'adminbanner&slide_view');
    		$a['brnd'] = $this->Bannerslider_model->take_brand();
    		$a['cat'] = $this->Bannerslider_model->take_cat();
    		$a['sub'] = $this->Bannerslider_model->take_sub();
    		$this->load->view('admintemplate',$a);
		
		}else{
			$this->load->view('adminlogin_view');
		}
    	

    }

    public function insert_bannerslider()
    {

    	$banslide = $this->input->post('ban_or_slide');
    	$name = $this->input->post('banslide_name');
    	$offer = $this->input->post('banerslide_offer');
    	$brand = $this->input->post('ban_or_slide_brad');
    	$cat = $this->input->post('ban_or_slide_cat');
    	$sub = $this->input->post('ban_or_slide_sub');
    	$id = $this->input->post('banslide_id');
    	$imagehid = $this->input->post('imagehid');
    	$date = date('Y-m-d');



    	$config['upload_path'] = 'imageupload/'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $this->load->library('upload',$config); 
          if($banslide == 1){
            $this->upload->initialize2($config);
          }else{
            $this->upload->initialize($config);
          }
          
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
         		if(!empty($id)){
					$unlink_path = 'imageupload/'.$imagehid;
					if(!empty($imagehid)){
						unlink($unlink_path);
					}					
				}
				$filename = $data['upload_data']['file_name'];
			}
			if(isset($_SESSION['adminusertp'])){
				if($_SESSION['adminusertp'] == 'admin'){
					$approvals = 1;
				}else{
					$approvals = 0;
				}
			}else{
				$approvals = 0;
			}
           
           $data1= array('banner_slider_name' =>$name ,'banner_slider_image'=>$filename,'banner_slider_offer' =>$offer, 'banner_slider_choose'=>$banslide, 'banner_slider_category' =>$cat, 'banner_slider_subcategory' =>$sub, 'banner_slider_brand' =>$brand,'banner_slider_status' =>$approvals, 'banner_slider_date' =>$date );

	 			
	 				if(!empty($id)){
					 	$res = $this->Bannerslider_model->banslide_update($id,$data1);
					 	
	 				}else{
	 					$res = $this->Bannerslider_model->banslide_insert($data1);
	 				}
					 
					if($res == 1)
					{		
						echo "success";
					}else{
					
						echo "failed";
					}
       }
       	public function according1(){
       		$id=$this->input->post('id');
       		$res = $this->Bannerslider_model->getaccording($id);
       		
       		echo json_encode($res);
       	}
       		public function according2(){
       		$id=$this->input->post('id');
       		$res2 = $this->Bannerslider_model->getaccording2($id);
       		
       		echo json_encode($res2);
       	}
       	public function according23(){
       		$id=$this->input->post('id');
       		$res = $this->Bannerslider_model->getaccording($id);
       		$res2 = $this->Bannerslider_model->getaccording2($id);
       		$resc = array();
       		foreach($res as $key=>$scategory){
       			$resc[$key.'~'.'name'] = $scategory->sub_name;
       			$resc[$key.'~'.'id'] = $scategory->sub_id;
       		}
       		$resb = array();
       		foreach($res2 as $key2=>$sbrand){
       			$resb[$key2.'~'.'name'] = $sbrand->brand_name;
       			$resb[$key2.'~'.'id'] = $sbrand->brand_id;
       		}
       		$resall = array(
       			'cat' =>$resc,'brd' =>$resb);
       		$reslast [] = $resall;
       		echo json_encode($reslast);
       	}
		public function get_bannerslider()
		{
			$res['bs'] = $this->Bannerslider_model->getbanslide();
			$this->load->view('admintables/admin_banslidtable_view',$res);
		}	

		 public function editbanslider(){
		 	$id=$this->input->post('id');
		 	$this->load->model('Bannerslider_model');
		 	$resrow = $this->Bannerslider_model->editbanslider($id,'banner_slider');
		 	$res = array('banner_slider_id'=> $resrow->banner_slider_id,'banner_slider_name' => $resrow->banner_slider_name,'banner_slider_image' => $resrow->banner_slider_image,'banner_slider_offer' => $resrow->banner_slider_offer,'banner_slider_choose'=>$resrow->banner_slider_choose,
		 		'banner_slider_category' => $resrow->banner_slider_category,'banner_slider_subcategory' => $resrow->banner_slider_subcategory,'banner_slider_brand' => $resrow->banner_slider_brand,'banner_slider_status' => $resrow->banner_slider_status
		 	);
			echo json_encode($res);
		 }	

		 public function delete_banslider()
		 {
		 	$bsid = $this->input->post('id');
				$imagename = $this->input->post('img');
				$unlink_path = 'imageupload/'.$imagename;
					if(!empty($imagename)){
						unlink($unlink_path);
					}	
				$res = $this->Bannerslider_model->delete_banslider($bsid);				 
				if($res == 1)
				{		
					echo "success";
				}else{
				
					echo "failed";
				}	
		 }

		 public function pro_check_banslider()
  {
    // $this->load->model('Bannerslider_model');
           $id=$this->input->post('id');
           $status=$this->input->post('status');

           // print_r($id);
           // print_r($status);
           // die();

           if($status=='high')
           {
            $res2 = $this->Bannerslider_model->set_pro1(0,$id);
            echo $res2;

           }
           else
           {
            $res2 = $this->Bannerslider_model->set_pro1(1,$id);
            echo $res2;
           }
  }

   




    

 }   