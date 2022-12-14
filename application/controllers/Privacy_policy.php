<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy_policy extends CI_Controller {

function __construct() {
    	parent::__construct();
    	// $this->load->model('display_modal');
    	$this->load->library('session');
	}

public function index()
	{
	   $data = array(
				
				'content' => 'privacy_policy_view'
		);
		$this->load->view('grocerytemplate',$data);
	}

public function p_p_app()
{
	$this->load->view('privacy_policy_app_view');
}		

}