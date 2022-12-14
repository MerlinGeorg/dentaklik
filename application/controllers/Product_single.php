<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_single extends CI_Controller {

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
    	$this->load->model('Product_single_model');
    	$this->load->library('session');
	}
	public function index()
	{
		// $this->load->view('gmaptest');
		// if(isset($_SESSION['locates'])){

		// }

		$product_id = base64_decode($this->input->get('product'));


        $getsingleprod = $this->Product_single_model->getsproductdetails($product_id);

		$prod_cat=$getsingleprod->prod_cat_id;
		$prod_id =$getsingleprod->prod_id; 

		$relatprod = $this->Product_single_model->getreltprodcts($prod_cat,$prod_id);

		$data = array(
				'proddetails'=>$getsingleprod,
				'relatprod'=>$relatprod,
				'content' => 'product_single_view'
		);
		$this->load->view('dentakliktemplate',$data);

	}

}
