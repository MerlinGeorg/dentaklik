<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admincategory extends CI_Controller {

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
    
    	$this->load->model('Category_modal');
    	$this->load->library('encryption');
    	
	}
	public function index()
	{ 
		if(isset($_SESSION['adminusertp'])){
			if($_SESSION['adminusertp'] == 'admin'){
				$a['content'] = 'admincategorymanage_view';
			}
			else{
				$a['content'] = 'adminhome_view';
			}
			$this->load->view('admintemplate',$a);
		}
		else{
			$this->load->view('adminlogin_view');
		}
      
	}
	 public function insertcategory()
		{

                   
                        $catid=$this->input->post('categoryid');
						$catname=$this->input->post('categoryname');
						$catpriority=$this->input->post('category_priority');
						$catimage=$this->input->post('image_file');
						$caticon=$this->input->post('category_icon');
                        $date = date('Y-m-d');

                        $imagehid = $this->input->post('imagehid');
                        $icon_hidden = $this->input->post('icon_hidden');


    // runnning code start
		  $config['upload_path'] = 'imageupload/'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $this->load->library('upload',$config); 
            
            //upload image

            $data = array('upload_data' => $this->upload->data());
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image_file'))
            {	
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
               
            }


            if ( $_FILES['image_file']['size'] == 0)
			{

			    $filename = $imagehid;

			}else{
         		if(!empty($catid)){
					$unlink_path = 'imageupload/'.$imagehid;
					if(!empty($imagehid)){
						unlink($unlink_path);
					}					
				}
				$filename = $data['upload_data']['file_name'];
			}


			//upload icon

			$data1 = array('upload_data' => $this->upload->data());
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('category_icon'))
            {	
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data1 = array('upload_data' => $this->upload->data());
               
            }

            if ( $_FILES['category_icon']['size'] == 0)
			{

			    $filename1 = $icon_hidden;

			}else{
         		if(!empty($catid)){
					$unlink_path = 'imageupload/'.$icon_hidden;
					if(!empty($icon_hidden)){
						unlink($unlink_path);
					}					
				}
				$filename1 = $data1['upload_data']['file_name'];
			}



	 				$data1= array('cat_name' =>$catname ,'cat_image'=>$filename,'cat_modified' => $date,
	 					'cat_priority' => $catpriority,'cat_icon'=>$filename1 );

	 			
	 				if(!empty($catid)){
					 	$res = $this->Category_modal->category_update($catid,$data1);
					 	
	 				}else{
	 					$res = $this->Category_modal->category_insert($data1);
	 				}
					 
					if($res == 1)
					{		
						echo "success";
					}else{
					
						echo "failed";
					}
			
		}
		 public function getcategory(){
		 	$a['tabledata'] = $this->Category_modal->display('category');
		 	$this->load->view('admintables/admincategorytable_view',$a);
		 }
		 public function editcategory(){
		 	$id=$this->input->post('id');
		 	$this->load->model('Category_modal');
		 	$resrow = $this->Category_modal->editcategory($id,'category');
		 	$res = array('categoryid'=> $resrow->cat_id,'categoryname' => $resrow->cat_name,
		 		'categoryimage' => $resrow->cat_image,'category_priority' => $resrow->cat_priority,'category_icon' => $resrow->cat_icon
		 	);
			echo json_encode($res);
		 }
		 	 public function deletecategory()
			{
				$catid = $this->input->post('id');
				$imagename = $this->input->post('imagename');
				$imagename1 = $this->input->post('imagename1');
				$unlink_path = 'imageupload/'.$imagename;
					if(!empty($imagename)){
						unlink($unlink_path);
					}
				$unlink_path1 = 'imageupload/'.$imagename1;
					if(!empty($imagename1)){
						unlink($unlink_path1);
					}	
				$res = $this->Category_modal->delete_category($catid);				 
				if($res == 1)
				{		
					echo "success";
				}else{
				
					echo "failed";
				}	
			}

 public function changepriority(){
		 	$id = $this->input->post('id');
		 	$status = $this->input->post('status');
		 	$res = $this->Category_modal->priority($id,$status);
		 	if($res == 1){
		 		echo "success";
		 	}else{
		 		echo "failed";
		 	}
		 	
		 }			

}
