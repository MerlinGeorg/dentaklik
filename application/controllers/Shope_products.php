<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shope_products extends CI_Controller {

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
    	$this->load->model('Shope_products_model');
    	$this->load->model('Display_modal');
    	$this->load->library('session');
	}
	public function index()
	{
		// $this->load->view('gmaptest');
		// if(isset($_SESSION['locates'])){

		// }

		$subcat_id = base64_decode($this->input->get('scid'));
        
       

        $getsubprod = $this->Shope_products_model->getsubproducts($subcat_id);
        
        $getbrands = $this->Display_modal->getbrand();
		
$getthissubcat = $this->Shope_products_model->getthissub($subcat_id);
        
		$getcatsandsub = $this->Display_modal->get_categories();

		$data = array(
				'getsubprod'=>$getsubprod,
				'getcatsandsub'=>$getcatsandsub,
				'brands'=>$getbrands,
				'getthissub'=>$getthissubcat,
				'content' => 'shope_products_view'
		);
		$this->load->view('dentakliktemplate',$data);

	}

}