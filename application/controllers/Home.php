<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
    	$this->load->model('Display_modal');
    	$this->load->library('session');
	}
	public function index()
	{
		// $this->load->view('gmaptest');
		// if(isset($_SESSION['locates'])){

		// }

		$rescategoryimages = $this->Display_modal->display('category');
		// $stlcid = $this->getdistance();
		// print_r($stlcid);
		// echo $stlcid.'cc';
		$ressubcat = $this->Display_modal->getsubcats();
		$displayweeklyproduct = $this->Display_modal->displayproduct('product');
		$resbrands = $this->Display_modal->getbrand();

		$getnewprod = $this->Display_modal->getnewprods();

		$data = array(
				'categoryimages' => $rescategoryimages,
				'displayweeklyproduct' => $displayweeklyproduct,
				'topsellsub'=>$ressubcat,
				'brands'=>$resbrands,
				'newprods'=>$getnewprod,
				'content' => 'home_view'

		);
		$this->load->view('dentakliktemplate',$data);

	}


	public function Aboutus(){
		$data = array(
				'content' => 'aboutus_view'
		);
		$this->load->view('grocerytemplate',$data);
	}
	public function Contactus(){
		$data = array(
				'content' => 'contactus_view'
		);
		$this->load->view('grocerytemplate',$data);
	}
	public function help(){
		$data = array(
				'content' => 'help_view'
		);
		$this->load->view('grocerytemplate',$data);
	}
	public function terms(){
		$data = array(
				'content' => 'terms_condition_view'
		);
		$this->load->view('grocerytemplate',$data);
	}

	public function contactusmail(){
		$names = $this->input->post('names');
		$emails = $this->input->post('emails');
		$enquirys = $this->input->post('enquirys');
		// $totalTraveler=$bookdetails->item_ad_qty+$bookdetails->item_ch_qty+$bookdetails->item_in_qty;
        $subject='Enquiry by '.$names;
        $htmlBody="
        <p>$enquirys</p>
        ";
        $res = $this->display_modal->sendmailcontact($subject,$htmlBody,$emails);
        if($res == 1){
        	echo 'success';
        }else{
        	echo 'error';
        }
	}
	public function notfound(){
		$data = array(
				'content' => 'displayerrorpage_view'
		);
		$this->load->view('grocerytemplate',$data);
	}
	public function search_product(){
		$latits = $this->input->post('place1');
	 	$longts = $this->input->post('place2');
	 	$stid = $this->getdistancebyparam($latits,$longts);
		 if (isset($_POST['term'])) {
         $term = $this->input->post('term');
          
     	  $result= $this->display_modal->search_product($term,$stid);
    		if(!empty($result)){
    			foreach ($result as $row)
             {
                 $arr_result[] = $row->prod_name;
             }
         }else{
         	 $arr_result[] = "";
         }
             
            echo json_encode($arr_result);
             // echo "sample";
   
	}
		
	}
	// public function getusers(){
	//  	$this->load->model('User_modal');

	//  	$a['displayproduct'] = $this->User_modal->display('product');

	//  	$this->load->view('home_view',$a);
	//  }
	public function getproducts(){
		$latits = $this->input->post('latits');
	 	$longts = $this->input->post('longts');
	 	$a['places1'] = base64_encode($this->input->post('latits'));
	 	$a['places2'] = base64_encode($this->input->post('longts'));
	 	$stid = $this->getdistancebyparam($latits,$longts);
	 	 $a['displayweeklyproduct'] = $this->display_modal->displayproductbyloc('product',$stid,'tab-weekly');



	 	$this->load->view('frontendtables/displayweeklyproduct_view',$a);
	 }


	 public function productsdetails(){
	 	$id = base64_decode($this->input->get('product'));
	 	$resrow = $this->display_modal->displaybyrow('product','prod_id',$id);
	 	if(!empty($resrow)){
	 		$data['places1']= $this->input->get('place1');
	 	$data['places2'] = $this->input->get('place2');
	 	$data['categoriesdesc'] = $this->display_modal->get_categories();
	 	$data['row'] = $this->display_modal->displayrowprodid($id);
	 	$data['singleprodcategoryname'] = $this->display_modal->getsingleprodcatname($id);
	 	$data['related_products'] = $this->display_modal->get_related_products($id);
	 	$data['content'] = 'frontendtables/productdescription_view';
	 }
	 else
	 {
	 	$data = array(
				'content' => 'displayerrorpage_view'
		);
	 }
		$this->load->view('grocerytemplate',$data);
	 	
	 }


	 public function tabsortproducts(){
	 	$mode = $this->input->post('mode');
	
	 	// $latits = $this->input->post('latits');
	 	// $longts = $this->input->post('longts');
	 	
	 	$a['places_a'] = $this->input->post('latits');
	 	$a['places_b'] = $this->input->post('longts');
	 	// $stid = $this->getdistancebyparam($latits,$longts);
	 	 // $a['tabproducts'] = $this->display_modal->displayproductbyloc('product',$stid,$mode);

	 	$a['tabproducts'] = $this->Display_modal->get_categories();
	 	 
	 	// $this->load->view('frontendtables/displaytabedproducts_view',$a);  

	 	$this->load->view('frontendtables/displaytabcat',$a);
	 }


	 public function getcategories(){
	 	// $latits = $this->input->post('latitsec');
	 	// $longts = 
	 // $ss = $this->input->post('latitsec');
	 	// $stid = $this->getdistancebyparam($latits,$longts);
	 	$a['categorynames'] = $this->display_modal->getcategorynames('category');
	 	$a['categorynamestest'] = $this->display_modal->getcategorynamestest('category');
	 	$a['categories'] = $this->display_modal->get_categories();
	 	$a['brands'] = $this->display_modal->getbrands();
	 	$a['latitsec'] = $this->input->post('latitsec');
	 	$a['longitsec'] = $this->input->post('longtsec');
	 	// echo $ss;
	 	// print_r($a['cccckc']);
	 	$this->load->view('frontendtables/categoryname_view',$a);
	 }

	 public function my_market(){
	    $a['categorynames'] = $this->display_modal->getcategorynames_priority('category');
	 	$this->load->view('frontendtables/my_market',$a);
	 }
	 
	 public function getdistance(){
	 	$latitudeFrom = $this->input->post('lt');
	 	$longitudeFrom =  $this->input->post('lg');
	 	// $latitudeTo = '10.4255057';
	 	// $longitudeTo = '76.33044159999997';
	 	// $this->distance($latitudeFrom,$longitudeFrom,$latitudeTo,$longitudeTo,"K");
	 	$earthRadius = 6371000;
	 	$radius = 100000;//km
	 	$results = $this->display_modal->display('store');
	 	$n_rows = count($results);
	 	$placename = '';
	 	$storeid = '' ;
		for($i=0; $i<$n_rows; $i++) {
			if($this->distance($latitudeFrom,$longitudeFrom,$results[$i]->store_lat,$results[$i]->store_lon,"K") < $radius){
				$placename = $placename . $results[$i]->store_name . ",";
				$storeid = $storeid . $results[$i]->store_id . ",";
			}
		}

	 	echo $storeid;
	 	// return $storeid;
		
// 	 	echo distance(32.9697, -96.80322, 29.46786, -98.53506, "M") . " Miles<br>";
// echo distance(32.9697, -96.80322, 29.46786, -98.53506, "K") . " Kilometers<br>";
// echo distance(32.9697, -96.80322, 29.46786, -98.53506, "N") . " Nautical Miles<br>";
	 }
	 	 public function getdistancebyparam($lats,$lons){
	 	
	 	// $latitudeTo = '10.4255057';
	 	// $longitudeTo = '76.33044159999997';
	 	// $this->distance($latitudeFrom,$longitudeFrom,$latitudeTo,$longitudeTo,"K");
	 	$earthRadius = 6371000;
	 	$radius = 1000000;//km
	 	$results = $this->display_modal->display('store');
	 	$n_rows = count($results);
	 	$placename = '';
	 	$storeid = '' ;
		for($i=0; $i<$n_rows; $i++) {
			if($this->distance($lats,$lons,$results[$i]->store_lat,$results[$i]->store_lon,"K") < $radius){
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
	 function distance($lat11, $lon11, $lat22, $lon22, $unit) {
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
	 public function getcategoriesside(){
	 	$a['categorynames'] = $this->display_modal->getcategorynames('category');

	 	$this->load->view('frontendtables/categorynameforside_view',$a);
	 }
	 public function getcategoryautoproducts(){
	 	$latits = $this->input->post('latits');
	 	$longts = $this->input->post('longts');
	 	$a['places1'] = base64_encode($this->input->post('latits'));
	 	$a['places2'] = base64_encode($this->input->post('longts'));
	 	$stid = $this->getdistancebyparam($latits,$longts);
	 	$a['categoryproductsauto'] = $this->display_modal->getautoproductsbycategory($stid);
	 	$a['categories'] = $this->display_modal->display('category');
	 	$this->load->view('frontendtables/categoryautoproduct_view',$a);
	 }
	 
	  public function getbanners(){
	 	// $latits = $this->input->post('latits');
	 	// $longts = $this->input->post('longts');
	 	$a['places1'] = base64_encode($this->input->post('latits'));
	 	$a['places2'] = base64_encode($this->input->post('longts'));
	 	// $stid = $this->getdistancebyparam($latits,$longts);
	 	$a['banners'] = $this->display_modal->displaybanner('banner_slider');
	 	
	 	$this->load->view('frontendtables/bannerdisplay_view',$a);
	 }
	 public function getsliders(){
	 	$a['places1'] = base64_encode($this->input->post('latits'));
	 	$a['places2'] = base64_encode($this->input->post('longts'));
	 	$a['sliders'] = $this->display_modal->displayslider('banner_slider');
	 	
	 	$this->load->view('frontendtables/sliderdisplay_view',$a);
	 }

	public function recent_product(){
	 	$a['recent_product'] = $this->display_modal->display_recent_product();
	 	$this->load->view('frontendtables/home_recent_products',$a);
	 }


}
