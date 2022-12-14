<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmulti extends CI_Controller {

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
	 * @see https://codeigniter.com/dc_guide/general/urls.html
	 */
	function __construct() {
    	parent::__construct();
   $this->load->model('category_modal');
   $this->load->helper(array('form', 'url'));

	}
	public function index()
	{ 
        $a = array('content' => 'Adminmultipleuploadtest_view');
		$this->load->view('admintemplate',$a);
	}
	public function insert_category(){
		$config['upload_path'] = 'muliltleupload/'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $this->load->library('upload',$config); 
          $this->upload->initialize2($config);
           $data = array('upload_data' => $this->upload->data());
           $this->load->library('image_lib');
            if (!$this->upload->do_upload('files'))
            {	
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
         // imageresize start
				$config['image_library'] = 'gd2';
    $config['source_image'] = 'muliltleupload/'.$data['upload_data']['file_name'];

    $trialimage = preg_replace('/[^A-Za-z0-9.]/', '', $data['upload_data']['file_name']);
    $imgname =  date('Ymd_his').$trialimage;
    $config['new_image'] = 'muliltleupload/'.date('Ymd_his').$trialimage;
    
    $config['create_thumb'] = FALSE;
    $config['maintain_ratio'] = FALSE;
    $config['width']     = 1903;
    $config['height']   = 748;
	$this->image_lib->clear();
    $this->image_lib->initialize($config);
    $this->image_lib->resize();
     // image resize end
                $data = array('upload_data' => $this->upload->data());
                // unlink('muliltleupload/'.$data['upload_data']['file_name']);
                // echo 'success';
               			
if ( ! $this->image_lib->resize())
{
        echo $this->image_lib->display_errors();
        // $errors = array('error' => $this->image_lib->display_errors('', ''));
} else{
	echo 'uploaded';	
}              
		// echo $filename;		// }

            }
                        // $data['upload_data']['file_name']
 // runnning code end
          if ( $_FILES['files']['size'] == 0)
			{
			    $filename = "";

			}else{
         		
				
				$filename = $data['upload_data']['file_name'];
			}
	}

	//second one

































		 public function insert_category2()
		{

                  
                 $this->load->library('upload');
                

           $this->upload->initialize(array(
                "upload_path"       =>  "muliltleupload/",
                "allowed_types"     =>  "gif|jpg|png|jpeg",
                "max_size"          =>  0,
                "max_width"         =>  0,
                "max_height"        =>  0
            ));
	
$filename = '' ;
$this->load->library('image_lib');
	if($this->upload->do_multi_upload("files")) {


		$data['upload_data'] = $this->upload->get_multi_upload_data();
		// foreach($data['upload_data'] as $upld){
			for($i=0;$i<count($data['upload_data']);$i++){
				// imageresize start
				$config['image_library'] = 'gd2';
    $config['source_image'] = 'muliltleupload/'.$data['upload_data'][$i]['file_name'];

    $trialimage = preg_replace('/[^A-Za-z0-9.]/', '', $data['upload_data'][$i]['file_name']);
    $imgname =  date('Ymd_his').$trialimage;
    $config['new_image'] = 'muliltleupload/'.date('Ymd_his').$trialimage;
    
    $config['create_thumb'] = FALSE;
    $config['maintain_ratio'] = FALSE;
    $config['width']     = 600;
    $config['height']   = 800;
	$this->image_lib->clear();
    $this->image_lib->initialize($config);
    $this->image_lib->resize();
     // image resize end
   			if($i == (count($data['upload_data']) - 1)){
					// imagelibstart
					
					//imagelib end
					$filename = $filename.$imgname;
					
				}else{
					
					$filename = $filename.$imgname.',';
				}
				unlink('muliltleupload/'.$data['upload_data'][$i]['file_name']);
				
			}
			echo $filename;
			
// if ( ! $this->image_lib->resize())
// {
//         echo $this->image_lib->display_errors();
//         // $errors = array('error' => $this->image_lib->display_errors('', ''));
// } else{
// 	echo 'uploaded';	
// }              
		// echo $filename;		// }

	}  else {    
                // Output the errors
                // $errors = array('error' => $this->upload->display_errors('<p class = "bg-danger">', '</p>'));
                
            $errors = array('error' => $this->upload->display_errors('', ''));
                foreach($errors as $k => $error){
                    echo $error;
                }
            }
                


	 				

		}
}