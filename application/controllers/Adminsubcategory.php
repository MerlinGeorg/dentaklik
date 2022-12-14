<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminsubcategory extends CI_Controller {

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
    
    	$this->load->model('subcategory_modal');
    	$this->load->model('category_modal');
    	
	}
	public function index()
	{ 
		// $categoriesdpdwn = $this->category_modal->display('category');
  //       $a = array(
  //       	'categoriesdpdwn' => $categoriesdpdwn,
  //       	'content' => 'adminsubcategorymanage_view');
		// $this->load->view('admintemplate',$a);
				if(isset($_SESSION['adminusertp'])){
			if($_SESSION['adminusertp'] == 'admin'){
				$a['categoriesdpdwn'] = $this->category_modal->display('category');
				$a['content'] = 'adminsubcategorymanage_view';
			}else{
				$a['content'] = 'adminhome_view';
			}
			// $a['content'] = 'adminusermanage_view';
			$this->load->view('admintemplate',$a);
		}else{
			$this->load->view('adminlogin_view');
		}

	}
	 public function insertsubcategory()
		{

                   
                         $subcatid=$this->input->post('subcategoryid');
						$catname=$this->input->post('subcategoryname');
						// $catimage=$this->input->post('image_file');
                        $date = date('Y-m-d');
                        $imagehid = $this->input->post('imagehid');
                    
                        $categoryid = $this->input->post('categoryselect');
                        

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

				if(!empty($subcatid)){
					$unlink_path = 'imageupload/'.$imagehid;
					if(!empty($imagehid)){
						unlink($unlink_path);
					}					
				}
				$filename = $data['upload_data']['file_name'];
			}


	 				$data1= array('sub_cat_id'=>$categoryid,'sub_name' =>$catname ,'sub_image'=>$filename,'sub_modified' =>$date );

	 			// $resmaxsubcategory = $this->subcategory_modal->categorymaxid();
	 				if(!empty($subcatid)){
					 	$res = $this->subcategory_modal->subcategory_update($subcatid,$data1);
					 	// $rescategory = $this->category_modal->category_sub_update($categoryid,$subcatid);
	 				}else{
	 					$res = $this->subcategory_modal->subcategory_insert($data1);
	 					// $rescategory = $this->category_modal->category_sub_update($categoryid,$resmaxsubcategory->subcategoryid + 1);
	 				}
					 
					if($res == 1)
					{		
						echo "success";
					}else{
					
						echo "failed";
					}

				// }
					// else{
					
					// 	echo "failed";
					// }
		}
		// public function getcategories(){
		 	

		//  	$categoriesdpdwn = $this->category_modal->display('category');

		//  	$html = '';
		//  	foreach($rescategories as $categories){
  //                   $html .= sprintf("<option value='%s'>%s</option>",$categories->cat_id,$categories->cat_name);   
		//  	}
		//  	echo $html;
		//  }
		 public function getsubcategory(){
		 	

		 	$a['tabledata'] = $this->subcategory_modal->displaysubcategory();

		 	$this->load->view('admintables/adminsubcategorytable_view',$a);
		 }
		 
		
		 public function editsubcategory(){
		 	$id=$this->input->post('id');
		 	$this->load->model('subcategory_modal');
		 	$resrow = $this->subcategory_modal->editsubcategory($id,'subcategory');
		 	// $rescatrow = $this->category_modal->displaysubcategory($resrow->cat_sub_id,'category');
		 	// if($rescatrow->num_rows() > 0){
		 	// 	$catrow = $rescatrow->row();
		 	// 	$catsubid = $catrow->cat_id;
		 	// 	$categorysubid = $catsubid;
		 	// }else{
		 	// 	$categorysubid = '';
		 	// }
		 	$res = array('categoryid'=> $resrow->sub_cat_id,'subcategoryid'=> $resrow->sub_id,'subcategoryname' => $resrow->sub_name,
		 		'subcategoryimage' => $resrow->sub_image
		 	);
			echo json_encode($res);
		 }
		 	 public function deletesubcategory()
		{
				$subcatid = $this->input->post('id');

				$imagename = $this->input->post('imagename');
				$unlink_path = 'imageupload/'.$imagename;
				if(!empty($imagename)){
					unlink($unlink_path);
				}
				
				$res = $this->subcategory_modal->delete_subcategory($subcatid);
	 			// $rescategory = $this->category_modal->category_sub_updatedelete($subcatid);
					 
				if($res == 1)
				{		
					echo "success";
				}else{
				
					echo "failed";
				}

				
		}
		
		 
		 
	



}
