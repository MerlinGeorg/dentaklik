<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

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
    	$this->load->library('encryption');
	}
	public function index()
	{

		$id = base64_decode($this->input->get('brand'));
		// $id = $this->input->get('id');
		
		
		$data['brandid'] = $id;
		
		
		// $data ['getproducts']=  $this->display_modal->getproductsbyid($id,$sid,'8','latest');

		$data['singlebrand'] = $this->display_modal->getsinglebrand($id);
		$data['brandsproduct'] = $this->display_modal->getbrandsbyid($id,'8','latest');
		
		$data['brandnames'] = $this->display_modal->display('brand');
		$data ['content'] =  'brand_view';
		$this->load->view('grocerytemplate',$data);

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
}