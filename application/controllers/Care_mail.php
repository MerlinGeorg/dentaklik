<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Care_mail extends CI_Controller {

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
    	// $this->load->model('Partner_modal');
    	$this->load->library('session');
	}

	public function index()
	{ 
       $data = array(
				
				'content' => 'care_mail_view'
		);
		$this->load->view('grocerytemplate',$data);
	}	
	
	
// 	public function upload_file()
//         {
//             $config['upload_path'] = 'uploads/';
//             $config['allowed_types'] = 'doc|pdf|docx|jpg';
//             $this->load->library('upload',$config);
//             if($this->upload->do_upload('care_file'))
//             {
//                 return $this->upload->data();
//             }
//             else
//              {
//                 return $this->upload->display_errors();
//              }   
//         }


	public function caremail()
	{
		// $shopname = $this->input->post('Shopname');
		$names = $this->input->post('name'); 
		$emails = $this->input->post('emails');
		$phone = $this->input->post('phone');
		$issue = $this->input->post('issue');
		$descrip = $this->input->post('description');
		// $tcbox = $this->input->post('tcbox');
		
		$config['upload_path'] = 'uploads/';
            $config['allowed_types'] = 'doc|pdf|docx|jpg|png|jpeg';
            $this->load->library('upload',$config);
            
            $file_data =  $this->upload->data();
           $this->upload->initialize($config);
            
            if($this->upload->do_upload('care_file'))
            {
                $file_data = $this->upload->data();
            }
            else
             {
                $file_data = $this->upload->display_errors();
             }  
         
         // echo $tcbox;
         // die();
		// $totalTraveler=$bookdetails->item_ad_qty+$bookdetails->item_ch_qty+$bookdetails->item_in_qty;
        $subject='Complaint By'.$names;
        $htmlBody="
        <h3>Complaint Mail</h3>
        <p>Name: $names</p>
        <p>Mail Id: $emails</p>
        <p>Phone No: $phone</p>
        <p>Issue: $issue</p>
        <p>Description: $descrip</p>
        ";


        // $file_data = $this->upload_file();

    if(is_array($file_data))
         {
            $this->load->library ( 'email' );
            $config ['protocol'] = 'smtp';
            $config ['smtp_host'] = 'mail.nuevoinformatica.com';
            $config ['smtp_port'] = '587';
            $config ['smtp_user'] = 'abinjose@nuevoinformatica.com';
            $config ['smtp_pass'] = 'abin15';
            $config ['mailtype'] = 'html';
            $config ['charset'] = 'utf-8';
            $config ['wordwrap'] = TRUE;
            $config ['newline'] = "\r\n";
            
           
            $this->email->initialize ( $config );
           
           
            $this->email->from ( 'abinjose@nuevoinformatica.com', 'nuevo' );
            
            $this->email->to ( 'pm@nuevoinformatica.com','nuevo' );
            $this->email->reply_to('abinjose@nuevoinformatica.com', 'nuevo');
            $this->email->subject ( $subject );
//          $this->email->message ( $htmlBody);
            $this->email->message($htmlBody);
//          $this->email->send ();
            $this->email->attach($file_data['full_path']);
            
        
        if($this->email->send()){
          if(delete_files($file_data['file_path']))
          {   
          echo 'success';
          } 
        } else {
           echo 'error';
            // echo  $this->email->print_debugger();
        }

      }

      else
      {
          echo 'upload failed';
      }


        // $res = $this->Caremail_model->sendmailcare($subject,$htmlBody,$emails);
        // if($res == 1){
        // 	echo 'success';
        // }else{
        // 	echo 'error';
        // }
	}

	


}