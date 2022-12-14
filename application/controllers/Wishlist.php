<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {

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
    	$this->load->model('user_modal');
    	$this->load->library('encryption');
    	
	}
	public function index()
	{
		$categname = $this->display_modal->get_categories();
		$data = array(
				'place1' => $this->input->get('place1'),
				'place2' => $this->input->get('place2'),
				'categoriesdesc' => $categname,
				'content' => (!isset($_SESSION['grocuname'])) ? 'login_view' : 'wishlist_view'
		);
		$this->load->view('grocerytemplate',$data);

	}
	function getwishlistitems(){
		if (isset($_SESSION['grocuprime'])) {
			$a['places1'] = base64_encode($this->input->post('place1'));

				$a['places2'] = base64_encode($this->input->post('place2'));
			$userid  = $this->encryption->decrypt($_SESSION['grocuprime']);
			$a['wishlistitems'] = $this->display_modal->wishlistitems($userid);
			$this->load->view('frontendtables/displaywishlist_view',$a);
		}
		// else{
		// 	$a['shopitems'] =  array('' => ''  );
		// 	$this->load->view('frontendtables/displayshoppingdetails_view',$a);
			
		// 	}
	}
		function deletewishlist(){
		if (isset($_SESSION['grocuprime'])) {
			$wishid = $this->input->post('wishid');
			$userid  = $this->encryption->decrypt($_SESSION['grocuprime']);
			$count = $this->display_modal->deletewishlist($userid,$wishid);
			 if($count>0)
				{
					echo "success";
				}
				else
				{
					echo "failed";
				} 
		}
		// else{
		// 	$a['shopitems'] =  array('' => ''  );
		// 	$this->load->view('frontendtables/displayshoppingdetails_view',$a);
			
		// 	}
	}
}