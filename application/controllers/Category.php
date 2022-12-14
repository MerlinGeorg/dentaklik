<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

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

		$id = base64_decode($this->input->get('category'));
		$lat = base64_decode($this->input->get('place1'));
		$lon = base64_decode($this->input->get('place2'));
		$strid = $this->getdistancebyparamcat($lat,$lon);
		$sid = base64_decode($this->input->get('subcategory'));
		$bid = base64_decode($this->input->get('brand'));
		
			if (isset($_GET['place3'])) {
				$offer = base64_decode($this->input->get('place3'));
				$data['offer'] = $offer;
			}else{
				$data['offer'] = '';
			}
		
		if(!empty($id)){
			
				$data ['getproducts']=  $this->display_modal->getproductsbyidcategory($id,$strid,'16','latest');
			
			
			$data['categorybrand'] = $this->display_modal->getcat_brandsbycatid($id,$strid);
		}else
			if(!empty($sid)){
				$data ['getproducts']=  $this->display_modal->getproductsbyidsubcategory($sid,$strid,'16','latest');
				$data['categorybrand'] = $this->display_modal->getcat_brandsbysubcatid($sid,$strid);
			}else if(!empty($bid)){
				$data['getproducts'] = $this->display_modal->getbrandsbyid($bid,$strid,'16','latest');
				$data['categorybrand'] = $this->display_modal->getcat_brandsbybrandid($bid,$strid);
			}
			else{
				$data = array(
				'content' => 'displayerrorpage_view'
				);
				$this->load->view('grocerytemplate',$data);
			}
			
		if(empty($id))
		{
			if(empty($sid))
			{
				$qry = $this->display_modal->get_categoryid_using_brand($bid);
				$id = $qry->prod_cat_id;
			}

			else
			{
				$qry = $this->display_modal->get_categoryid_using_subcategory($sid);
				$id = $qry->sub_cat_id;
			}


			
		}

		
		$data['mainid'] = $id;
		$data['subids'] = $sid;
		$data['bid'] = $bid;

		
		
		$data['lats'] = $this->input->get('place1');
		$data['lons'] = $this->input->get('place2');
		

		$data['categoriesname'] = $this->display_modal->get_categories();
		$data['singlecategoryname'] = $this->display_modal->getsinglecategoryname($id,$sid,$bid);
		$data['brand_image'] =  $this->display_modal->get_brandimages($id);
		$data['sub_category'] =  $this->display_modal->get_sub_category($id);
		if(!empty($id) || !empty($bid) || !empty($sid)){
			$data ['content'] =  'categoryproduct_view';
			$this->load->view('grocerytemplate',$data);
		}
		

	}
		 	 public function getdistancebyparamcat($lats,$lons){
	 	
	 	// $latitudeTo = '10.4255057';
	 	// $longitudeTo = '76.33044159999997';
	 	// $this->distance($latitudeFrom,$longitudeFrom,$latitudeTo,$longitudeTo,"K");
	 	$earthRadius = 6371000;
	 	$radius = 10000;//km
	 	$results = $this->display_modal->display('store');
	 	$n_rows = count($results);
	 	$placename = '';
	 	$storeid = '' ;
		for($i=0; $i<$n_rows; $i++) {
			if($this->distances($lats,$lons,$results[$i]->store_lat,$results[$i]->store_lon,"K") < $radius){
				$placename = $placename . $results[$i]->store_name . ",";
				$storeid = $storeid . $results[$i]->store_id . ",";
			}
		}

	 	return $storeid;
	 	// return $storeid;
		
// 	 	echo distance(32.9697, -96.80322, 29.46786, -98.53506, "M") . " Miles<br>";
// echo distance(32.9697, -96.80322, 29.46786, -98.53506, "K") . " Kilometers<br>";
// echo distance(32.9697, -96.80322, 29.46786, -98.53506, "N") . " Nautical Miles<br>";
	 }
	 function categsidenameview(){
	 			$id = base64_decode($this->input->post('category'));
		$lat = base64_decode($this->input->post('place1'));
		$lon = base64_decode($this->input->post('place2'));
		$strid = $this->getdistancebyparamcat($lat,$lon);
		$id = $this->input->get('id');
		$sid = base64_decode($this->input->get('subcategory'));
		$bid = base64_decode($this->input->get('brand'));
		
			
		
		if(!empty($id)){
			$data ['getproducts']=  $this->display_modal->getproductsbyidcategory($id,$strid,'16','latest');
			$data['categorybrand'] = $this->display_modal->getcat_brandsbycatid($id,$strid);
		}else{
			if(!empty($sid)){
				$data ['getproducts']=  $this->display_modal->getproductsbyidsubcategory($sid,$strid,'16','latest');
				$data['categorybrand'] = $this->display_modal->getcat_brandsbysubcatid($sid,$strid);
			}else{
				// $a ['getproducts']=  $this->display_modal->getproductsbyidsubcategory($bid,'8','latest');
				$data['getproducts'] = $this->display_modal->getbrandsbyid($bid,$strid,'16','latest');
				$data['categorybrand'] = $this->display_modal->getcat_brandsbybrandid($bid,$strid);
			}
			
		}
		
		// $data['mainid'] = $id;
		// $data['subids'] = $sid;
		// $data['bid'] = $bid;
		
		$data['lats'] = $this->input->post('place1');
		$data['lons'] = $this->input->post('place2');
		
		// $data ['getproducts']=  $this->display_modal->getproductsbyid($id,$sid,'8','latest');

		$data['categoriesname'] = $this->display_modal->get_categories();
		
		$this->load->view('frontendtables/categorynameforside_view',$data);
	 }
	 function distances($lat11, $lon11, $lat22, $lon22, $unit) {
	 	$lat1 = floatval($lat11);
	 	$lon1 = floatval($lon11);
	 	$lat2 = floatval($lat22);
	 	$lon2 = floatval($lon22);
	  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
	    return 0;
	  }
	  else {
	    $theta = $lon1 - $lon2;
	    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	    $dist = acos($dist);
	    $dist = rad2deg($dist);
	    $miles = $dist * 60 * 1.1515;
	    $unit = strtoupper($unit);

	    if ($unit == "K") {
	      return ($miles * 1.609344);
	    } 
	    // else if ($unit == "N") {
	    //   return ($miles * 0.8684);
	    // } else {
	    //   return round($miles,2);
	    // }
	  }
	}
	public function getcategory(){
		$mainid = $this->input->post('mainid');
		$bid = $this->input->post('bid');
		$subid = $this->input->post('subid');
		

		$limits = $this->input->post('limits');
		$sorts = $this->input->post('sorts');
		$latit = $this->input->post('latit');
		$longt = $this->input->post('longt');
		$strid = $this->getdistancebyparamcat($latit,$longt);
		$a['lats'] = base64_encode($this->input->post('latit'));
		$a['lons'] = base64_encode($this->input->post('longt'));
	 	// $a['getfoods'] = $this->display_modal->display('product');
		$offer = $this->input->post('offer');
			
		
	 	if(!empty($mainid)){
	 		if(!empty($offer)){
	 			$a ['getfoods']=  $this->display_modal->getproductsbyidcategoryoffer($mainid,$strid,$offer,$limits,$sorts);
	 		}else{
	 			$a ['getfoods']=  $this->display_modal->getproductsbyidcategory($mainid,$strid,$limits,$sorts);
	 		}
			
		}else{
			if(!empty($subid)){
				if(!empty($offer)){
	 				$a ['getfoods']=  $this->display_modal->getproductsbyidsubcategoryoffer($subid,$strid,$offer,$limits,$sorts);
		 		}else{
		 			$a ['getfoods']=  $this->display_modal->getproductsbyidsubcategory($subid,$strid,$limits,$sorts);
		 		}
				
			}
			if(!empty($bid)){
				if(!empty($offer)){
	 				$a ['getfoods']=  $this->display_modal->getproductsbyidbrandidoffer($bid,$strid,$offer,$limits,$sorts);
		 		}else{
		 			$a ['getfoods']=  $this->display_modal->getproductsbyidbrandid($bid,$strid,$limits,$sorts);
		 		}
				
			}
			
		}
	 	// $a['getfoods'] = $this->display_modal->getproductsbyid($mainid,$subid,$limits,$sorts);
	 	$a['gettype'] = $this->input->post('gettype');

	 	$this->load->view('frontendtables/displaycategoryproduct_view',$a);
	 }
}