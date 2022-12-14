<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

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
				'content' => (!isset($_SESSION['grocuname'])) ? 'login_view' : 'cart_view'
		);
		$this->load->view('grocerytemplate',$data);

	}
	 public function insertcart()
		{
			if (isset($_SESSION['grocuname'])) {
			
				$userid  = $this->encryption->decrypt($_SESSION['grocuprime']);
				$pid=$this->input->post('pid');
				$quant=$this->input->post('quant');
				$price=$this->input->post('price');
				$prodcomm=$this->input->post('prodcomm');
				$prodtax=$this->input->post('prodtax');
				$punid = $this->input->post('punid');
				$totalprice = $price; 
                $date = date('Y-m-d');	
				$data1= array('cart_prod_unique_id'=>$punid,'cart_user_id' =>$userid ,'cart_product_id'=>$pid,'cart_quantity'=>$quant,'cart_price' =>$price ,'cart_addedcomm'=>$prodcomm,'cart_tax'=>'0','cart_amount'=>$totalprice,'cart_date' =>$date );
			
				$cartexist = $this->display_modal->cart_exist($userid,$punid);
				if(empty($cartexist)){
					$res = $this->display_modal->cart_insert($data1);
				}else{
					$data2 = array('cart_quantity' => $cartexist->cart_quantity + 1);
					$res = $this->display_modal->cart_update($cartexist->cart_id,$data2);
				}
		 		
				if($res == 1)
				{		
					echo "success";
				}else{
				
					echo "failed";
				}
			}else{
				redirect('login');
			}

		}
			 public function insertwishlist()
		{
			if (isset($_SESSION['grocuname'])) {
			
				$userid  = $this->encryption->decrypt($_SESSION['grocuprime']);
				$pid=$this->input->post('pid');
                $date = date('Y-m-d');	
				$data1= array('wishlists_user_id' =>$userid ,'wishlists_prod_id'=>$pid,'wishlists_date' =>$date );
		 		$res = $this->display_modal->wishlist_insert($data1);
				if($res == 1)
				{		
					echo "success";
				}else{
				
					echo "failed";
				}
			}else{
				redirect('login');
			}

		}
	function countcart(){
		if (isset($_SESSION['grocuname'])) {
			$place1 = $this->input->post('place1');
			$place2 = $this->input->post('place2');
			$stroes = $this->getdistancebyparamcart($place1,$place2);
			$userid  = $this->encryption->decrypt($_SESSION['grocuprime']);
			$res = $this->display_modal->countcart($userid,$stroes);
			echo $res;
			// echo $res->cartcount;
		}else{
			echo "0";
		}
			
	}
	
	function countwishlist(){
		if (isset($_SESSION['grocuname'])) {
			
			$userid  = $this->encryption->decrypt($_SESSION['grocuprime']);
			$res = $this->display_modal->countwishlist($userid);
			echo $res->wishlistcount;
		}else{
			echo "0";
		}
			
	}
	function getshoppingcartitems(){
		if (isset($_SESSION['grocuname'])) {
			$a['places1'] = base64_encode($this->input->post('place1'));
			$a['places2'] = base64_encode($this->input->post('place2'));
			$latitss = $this->input->post('place1');
			$longtss = $this->input->post('place2');
			$a['stids'] = $this->getdistancebyparamcart($latitss,$longtss);
			$stidss = $this->getdistancebyparamcart($latitss,$longtss);
			$userid  = $this->encryption->decrypt($_SESSION['grocuprime']);
			$a['shopitems'] = $this->display_modal->cartitemscheckout($userid,$stidss);
			$this->load->view('frontendtables/displayshoppingdetails_view',$a);
		}
		// else{
		// 	$a['shopitems'] =  array('' => ''  );
		// 	$this->load->view('frontendtables/displayshoppingdetails_view',$a);
			
		// 	}
	}
 public function getdistancebyparamcart($lats,$lons){
	 	
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
	function deletcartitem(){
		if (isset($_SESSION['grocuname'])) {
			$cartid = $this->input->post('cartid');
			$userid  = $this->encryption->decrypt($_SESSION['grocuprime']);
			$count = $this->display_modal->deletcartitem($userid,$cartid);
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
	function deletecartitemcheckout(){
		if (isset($_SESSION['grocuname'])) {
			$userid  = $this->encryption->decrypt($_SESSION['grocuprime']);
			$count = $this->display_modal->deletcartitemcheckout($userid);
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
	
	function updatecartitem(){
		if (isset($_SESSION['grocuname'])) {
			$cartid = $this->input->post('cartid');
			$userid  = $this->encryption->decrypt($_SESSION['grocuprime']);
			$quant = $this->input->post('quant');
			$totamnt = $this->input->post('totamnt');
			$taxs = $this->input->post('taxs');
			$subtot = ($totamnt + $taxs) * $quant;
			$dataquant = array('cart_quantity' => $quant,'cart_amount' => $subtot);
			$count = $this->display_modal->updatecartitem($cartid,$userid,$dataquant);
			 if($count>0)
				{
					echo "success";
				}
				else
				{
					echo "failed";
				} 
		}
	}
	
}