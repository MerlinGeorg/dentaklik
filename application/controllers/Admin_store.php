<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_store extends CI_Controller {

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
    
    	$this->load->model('Store_model');
    	$this->load->library('encryption');

    }

    public function index()
    {
        if(isset($_SESSION['adminusertp'])){
           if($_SESSION['adminusertp'] == 'admin'){
             $a['content'] = 'adminstore_view';
            }else{
             $a['content'] = 'adminusermanage_view';
            }
            $this->load->view('admintemplate',$a);
        }else{
            $this->load->view('adminlogin_view');
        }
        // if($_SESSION['adminusertp'] == 'admin'){
            //  $a['content'] = 'adminstore_view';
            // }else{
            //  $a['content'] = 'adminusermanage_view';
            // }
    }

    public function insertstore()
    {
    	$strid = $this->input->post('storeid');

    	$date = date('Y-m-d');

    	$data1 = array
    	(
          'store_name'=>$this->input->post('storename'),
          'store_address'=>$this->input->post('storeaddress'),
          'store_city'=>$this->input->post('storecity'),
          'store_pincode'=>$this->input->post('storepin'),
          'store_lat'=>$this->input->post('storelat'),
          'store_lon'=>$this->input->post('storelong'),
          'store_gst'=>$this->input->post('storegst'),
          'store_date'=>$date

    	);

    	if($strid=='')
    	{
    		$res = $this->Store_model->insert_store($data1);
    	}
    	else
    	{
    		$res = $this->Store_model->update_store($strid,$data1);

    	}
        
        if($res==1)
        {
        	echo "success";
        }
        else
        {
        	echo "failed";
        }	

    }

    public function getstore()
    {
    	$res['stor'] = $this->Store_model->getstore();
    	$this->load->view('admintables/adminstoretable_view',$res);
    }

    public function editstore()
    {
      $id=$this->input->post('id');
		 	$this->load->model('Store_model');
		 	$resrow = $this->Store_model->editstore($id,'store');
		 	$res = array('store_id'=> $resrow->store_id,'store_name' => $resrow->store_name,
		 	      'store_address' => $resrow->store_address,'store_city' => $resrow->store_city,'store_pincode' => $resrow->store_pincode,'store_lat' => $resrow->store_lat,'store_lon' => $resrow->store_lon,'storegst' => $resrow->store_gst,
		 	);
			echo json_encode($res);	
    }

    public function deletestore()
    {
    	$strid = $this->input->post('id');

    	$res = $this->Store_model->delete_store($strid);

    	if($res==1)
    	{
    		echo "success";
    	}
    	else
    	{
    		echo "failed";
    	}
    }
    public function insert_paid()
    {
        
        $pstidandnameexp = explode("-",$this->input->post('storeselectmodal'));
        $pstrid = $pstidandnameexp[0];
        $psrtname = $pstidandnameexp[1];


        $pmnth = $this->input->post('monthsselectmodal');
        // print_r($pmnth);
        $pyr = $this->input->post('yearselectmodal');
        $pamnt = $this->input->post('amountpaid');
        $pbal = "";//$this->input->post('pbal');
        // $pid = $this->input->post('pid');
        $date = date('Y-m-d');
        $rescheck = $this->Store_model->checkpaid_collect($pstrid,$pmnth,$pyr);
        $data1 = array
        (
          'paid_store_id'=>$pstrid,
          'paid_store_name'=>$psrtname,
          'paid_month'=>$pmnth,
          'paid_year'=>$pyr,
          'paid_amount'=>$pamnt,
          'paid_balance'=>$pbal,
          'paid_date'=>$date

        );
         // print_r($data1);
        if($rescheck->num_rows()==0)
        {
            $res = $this->Store_model->insertpaid_collect($data1);
        }
        else
         {
            $rowcheck = $rescheck->row();
            $data1 = array
            (
              'paid_store_id'=>$pstrid,
              'paid_store_name'=>$psrtname,
              'paid_month'=>$pmnth,
              'paid_year'=>$pyr,
              'paid_amount'=>$pamnt + $rowcheck->paid_amount ,
              'paid_balance'=>$pbal,
              'paid_date'=>$date

            );
            $res = $this->Store_model->updatepaid_collect($pstrid,$pmnth,$pyr,$data1);

        }
        
        if($res==1)
        {
            echo "success";
        }
        else
        {
            echo "failed";
        }   

    }



}