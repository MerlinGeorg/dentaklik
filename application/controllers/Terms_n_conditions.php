<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms_n_conditions extends CI_Controller {

function __construct() {
    	parent::__construct();
    	// $this->load->model('display_modal');
    	$this->load->library('session');
	}

public function index()
	{
	   $data = array(
				
				'content' => 'terms_condition_view'
		);
		$this->load->view('grocerytemplate',$data);
	}
	
public function app_tc()
{
	$this->load->view('t_c_app_view');
}	

}