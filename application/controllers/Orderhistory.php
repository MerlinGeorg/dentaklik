<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orderhistory extends CI_Controller {

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
    	$this->load->model('Android_service_delivery');
    	$this->load->library('encryption');
	}
	public function index()
	{

		// $userid = base64_decode($this->input->get('order'));
		// $id = $this->input->get('id');
		

		if(isset($_SESSION['grocuname'])){
			$userid  = $this->encryption->decrypt($_SESSION['grocuprime']);
		}else{
			$userid = '';
		}
		
		// $data['orderid'] = $orderid;
		
		
		// $data ['getproducts']=  $this->display_modal->getproductsbyid($id,$sid,'8','latest');

		// $data['singlebrand'] = $this->display_modal->getsinglebrand($id);
		// $data['brandsproduct'] = $this->display_modal->getbrandsbyid($id,'8','latest');
		
		// $data['brandnames'] = $this->display_modal->display('brand');
		
		
		$data = array(
				'content' => (!isset($_SESSION['grocuname'])) ? 'login_view' : 'orderhistory_view'
		);
		$data['places1'] = base64_decode($this->input->get('place1'));
		$data['places2'] = base64_decode($this->input->get('place2'));
		$data['orderdetails'] = $this->display_modal->get_userdelivery($userid);
		$this->load->view('grocerytemplate',$data);

	}
	public function orderhistorydisplay(){
		if(isset($_SESSION['grocuname'])){
			$userid  = $this->encryption->decrypt($_SESSION['grocuprime']);
		}else{
			$userid = '';
		}
		$data['places1'] = base64_decode($this->input->post('places1'));
		$data['places2'] = base64_decode($this->input->post('places2'));
		$data['orderdetails'] = $this->display_modal->get_userdelivery($userid);
		$this->load->view('frontendtables/displayorderhistory_view',$data);

	}
	public function brands(){
		$brandid = $this->input->post('brand');

		

		$limits = $this->input->post('limits');
		$sorts = $this->input->post('sorts');
	 	// $a['getfoods'] = $this->display_modal->display('product');
	 	if(!empty($brandid)){

			$a ['getbrdproduct']=  $this->display_modal->getbrandsbyid($brandid,$limits,$sorts);
		}
	 	// $a['getfoods'] = $this->display_modal->getproductsbyid($mainid,$subid,$limits,$sorts);
	 	$a['gettype'] = $this->input->post('gettype');

	 	$this->load->view('frontendtables/brandproductdisplay_view',$a);
	 }

	public function cancelorder(){
		$id = $this->input->post('id');
		$order_id = $this->input->post('ordid');
		if(!empty($id)){
			$data = array(
				'dc_cancel_order' => 1);
	   $res =  $this->display_modal->cancelorder($id,$data);

		 $sel_qry5 = "SELECT * FROM deliverycharge WHERE dc_order_id ='$order_id' AND dc_cancel_order = 0";	
		$res5 = $this->Android_service_delivery->excute_qry_row($sel_qry5);

	    if(empty($res5))
	    {
	    	$status = "true";
	    }
	    else
	    {
	    	$status = "false";
	    }
     

			$qry_firebase = "SELECT * FROM firebase_user LEFT JOIN user ON user.user_id = firebase_user.firebase_user_id LEFT JOIN deliverycharge ON deliverycharge.dc_user_id = user.user_id  where deliverycharge.dc_order_id ='$order_id' order By firebase_user_id DESC ";
            $this->load->model('Android_service');
            $res1 = $this->Android_service->excute_qry($qry_firebase);

            $user_id = "";
            $user_name = "";
             
           foreach ($res1 as $key => $result) {
          
           $user_id = $result->firebase_user_id;
           $user_name = $result->user_displayname;

           }

           $message = "Dear ".$user_name.", Thank you for shopping with us, Your order no ".$order_id." has been Cancelled!";

           $date = date('Y-m-d');	

           $data1= array('notification_user_id' =>$user_id ,'notification_order_id' =>$order_id,'notification_title'=>"Out For Delivery",'notification_content'=>$message,'notification_date'=>$date,'notification_status'=>'0' );

           $this->load->model('Android_service');
		   $res2 = $this->Android_service->common_insert('notification',$data1);

			$qry_firebase3 = "SELECT * FROM firebase_user LEFT JOIN user ON user.user_id = firebase_user.firebase_user_id LEFT JOIN deliverycharge ON deliverycharge.dc_agent_id = user.user_id  where deliverycharge.dc_order_id ='$order_id' order By firebase_user_id DESC ";
			$this->load->model('Android_service');
			 $res3 = $this->Android_service->excute_qry($qry_firebase3);

		   if($res == '1'){
			$firebase_user = array();
            $firebase_user = array(
			 			"status" => 'success',
			 			 "details" => $res1,
			 			"agent_notification" => $res3,
			 			 "order_cancel" =>  $status
			 		);
			 	echo json_encode($firebase_user);
			}else{
				echo 'Error';
			}

		}
	}
}