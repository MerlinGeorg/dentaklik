<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminhome extends CI_Controller {

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
    	// $this->load->library('pdf');
    	$this->load->library('encryption');
   
	}
	public function index()
	{
		// $this->load->view('welcome_message');
		if(isset($_SESSION['adminusertp'])){

        	$data = array('content' => 'adminhome_view');
        	$data['allusers'] = $this->display_modal->countusers();
        	
        	$data['countorders'] = $this->display_modal->countordersforadmin();
        	$data['countdelivered'] = $this->display_modal->countdeliveredforadmin();
        	$data['countmonthlydelivered'] = $this->display_modal->countmonthlydeliveredforadmin();
        	$data['countmonthlyordered'] = $this->display_modal->countmonthlyorderedforadmin();
        	$data['countproducts'] = $this->display_modal->countprodforadmin();
        	$data['countproductsapprove'] = $this->display_modal->countprodforadminapproved();
        	$data['subtotalofsales'] = $this->display_modal->sumofsalesforadmin();
        	$data['monthlytotalsales'] = $this->display_modal->sumofmonthlysalesforadmin();
        	$data['countstores'] = $this->display_modal->countdisplay('store');
        	$data['countbanslide'] = $this->display_modal->countbanslide('banner_slider');
        	$data['countbrands'] = $this->display_modal->countdisplay('brand');
        	$data['totalcommiss'] = $this->display_modal->admincalcommission();
        	$data['allstores'] = $this->display_modal->display('store');
        	
        	$data['totalcommission'] = $this->display_modal->counttotalcommission();
        	if($_SESSION['adminusertp'] == 'agent' ){
        		$agentid = $this->encryption->decrypt($_SESSION['adminuserid']);
        		$data['allusers'] = '';
        		$data['countstores'] = '';
        		$data['countbanslide'] = '';
        		$data['countbrands'] = '';
        		$data['totalcommission'] = '';
        		$data['countorders'] = $this->display_modal->countordersbyagent($agentid);
        		$data['countdelivered'] = $this->display_modal->countdeliveredbyagent($agentid);
        		$data['countmonthlydelivered'] = $this->display_modal->countmonthlydeliveredbyagent($agentid);
        		$data['countmonthlyordered'] = $this->display_modal->countmonthlyorderedbyagent($agentid);
        		$data['countproducts'] = $this->display_modal->countprodagentid($agentid);
        		$data['countproductsapprove'] = $this->display_modal->countprodapproved($agentid);
        		$data['subtotalofsales'] = $this->display_modal->sumofsalesforagent($agentid);
        		$data['monthlytotalsales'] = $this->display_modal->sumofmonthlysalesforagent($agentid);
        		$data['monthlytotalsales'] = $this->display_modal->sumofmonthlysalesforagent($agentid);
        		$data['totalcommiss'] = $this->display_modal->agentcalcommission($agentid);
        		$data['allstores'] = $this->display_modal->display('store');
        	}
			$this->load->view('admintemplate',$data);
		}else{
			$this->load->view('adminlogin_view');
		}
	}
	public function cuntbadge(){
		if($_SESSION['adminusertp'] == 'agent' ){
			$agentid = $this->encryption->decrypt($_SESSION['adminuserid']);
			$cntbadge = $this->display_modal->countordersbyagent($agentid);
			echo $cntbadge;
		}else{
			$cntbadge = $this->display_modal->countordersforadmin();
			echo $cntbadge;
		}
	}
	public function getstorescal(){
		$stid = $this->input->post('stid');
		$startdates = $this->input->post('startdates');
		$enddates = $this->input->post('enddates');
		$filt = "";
		$joincondition = "";
		if(!empty($startdates)){
			$filt .= "AND month(deliverycharge.dc_date) = '".$startdates."' ";
			$joincondition .= "AND paid_collect.paid_month = '".$startdates."' ";

		}
		if(!empty($enddates)){
			$filt .= "AND year(deliverycharge.dc_date) = '".$enddates."' ";
			$joincondition .= "AND paid_collect.paid_year = '".$enddates."' ";
		}
		
			
			// $myDateTime = DateTime::createFromFormat('d/m/Y', $soriginalDate);
// $snewDate = $myDateTime->format('Y-m-d');
			// $eoriginalDate = $enddates;
			
// 			$myDateTimes = DateTime::createFromFormat('d/m/Y', $eoriginalDate);
// $enewDate = $myDateTimes->format('Y-m-d');
			

		
	 	
	 	// if($_SESSION['adminusertp'] == 'admin'){
		$a['paymonth'] = $startdates;
	 		$a['payyear'] = $enddates;
		if($_SESSION['adminusertp'] == 'admin'){
	 		$a['commdata'] = $this->display_modal->getcommcalforadmin($filt,$joincondition);
	 		
	 		$this->load->view('admintables/admincommissionforadmin_view',$a);
	 	}else{
	 		$usrid = $this->encryption->decrypt($_SESSION['adminuserid']);
	 		$strid =   $this->display_modal->getstorebyuser($usrid);
	 		$filt .= "AND store.store_id = '".$strid."' ";
	 		$a['commdata'] = $this->display_modal->getcommcalforadmin($filt,$joincondition);
	 		$this->load->view('admintables/admin_commisssion_view',$a);
	 	}
	 	
	 	// }else{
	 		 // $usrid = $this->encryption->decrypt($_SESSION['adminuserid']);
	 		 // $a['tabledata'] = $this->delivery_modal->get_usersbyuseridforhome($usrid);

	 	// }
 		// $this->load->view('admintables/admindeliverytable_view',$a);
 	}
	public function getdeliveryall(){
	 	$this->load->model('delivery_modal');
	 	// if($_SESSION['adminusertp'] == 'admin'){
	 	$data = array();
	 		$deliverydetails = $this->display_modal->display('deliverycharge');
	 	foreach ($deliverydetails as $row) {
			$data[] = $row;
		}
	 	// }
	 	// else{
	 	// 	 $usrid = $this->encryption->decrypt($_SESSION['adminuserid']);
	 	// 	 $a['tabledata'] = $this->display_modal->get_usersbyuserid($usrid);

	 	// }
	 		echo json_encode($data);
	 		// $this->load->view('admintables/admindeliverytable_view',$a);
	}
	
	public function getdeliveryforhome(){
		 	$this->load->model('delivery_modal');
		 	if($_SESSION['adminusertp'] == 'admin'){
		 		$a['tabledata'] = $this->delivery_modal->get_usersforadmin();
		 	}else{
		 		 $usrid = $this->encryption->decrypt($_SESSION['adminuserid']);
		 		 $a['tabledata'] = $this->delivery_modal->get_usersbyuseridforhome($usrid);

		 	}
		 		$this->load->view('admintables/admindeliverytable_view',$a);
		 	}

	
}
