<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partnerus extends CI_Controller {

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
    	$this->load->model('Partner_modal');
    	$this->load->library('session');
	}

	public function index()
	{ 
       $data = array(
				
				'content' => 'partner_mail_view'
		);
		$this->load->view('grocerytemplate',$data);
	}	


	public function partnermail()
	{
		$shopname = $this->input->post('Shopname');
		$names = $this->input->post('names'); 
		$emails = $this->input->post('emails');
		$phone = $this->input->post('phone');
		$shopaddress = $this->input->post('sadress');
		$tcbox = $this->input->post('tcbox');
         
         // echo $tcbox;
         // die();
		// $totalTraveler=$bookdetails->item_ad_qty+$bookdetails->item_ch_qty+$bookdetails->item_in_qty;
        $subject='Partnership Request by '.$shopname;
        $htmlBody="
        <h3>Partner with us Mail</h3>
        <p>Shope Name: $shopname</p>
        <p>Shope Owner: $names</p>
        <p>Mail Id: $emails</p>
        <p>Phone No: $phone</p>
        <p>Shope Address: $shopaddress</p>
        <p>Terms&Conditions: $tcbox</p>
        ";
        $res = $this->Partner_modal->sendmailpartner($subject,$htmlBody,$emails);
        if($res == 1){
        	echo 'success';
        // 	replaymail($emails);
        }else{
        	echo 'error';
        }
	}
	
// 	public function replaymail($emails)
// 	{
// 	    $subreplay = 'Conformation Mail from Nuevo Bazzar';
// 	    $htmlreplay="
// 	      <p>Thank you for your interest.<br>Our Support Team will contact you shortly.</p><br>
// 	      <p>Regards</p><br>
// 	      <p>Nuevo</p>
// 	    ";
// 	    $res = $this->Partner_modal->sendreplaymail_partner($subreplay,$htmlreplay,$emails);
// 	}


}