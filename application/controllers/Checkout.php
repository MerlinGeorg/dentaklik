<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

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
    	$this->load->model('User_modal');
    	$this->load->model('display_modal');
    	$this->load->library('encryption');
	}
	public function index()
	{ 
		$id = $this->encryption->decrypt($_SESSION['grocuprime']);
		
		 	$reshome = $this->display_modal->getaddressforhome($id);
		 	$resother = $this->display_modal->getaddressforother($id);
		 	$categname = $this->display_modal->get_categories();
        $a = array(
        	'categoriesdesc' => $categname,
        	'reshome' => $reshome,
        	'resother' => $resother,
        	'content' => (!isset($_SESSION['grocuname'])) ? 'login_view' : 'checkout_view');
		$this->load->view('grocerytemplate',$a);
	}

	// public function check_out_old()
	// { 
	// 	$id = $this->encryption->decrypt($_SESSION['grocuprime']);
		
	// 	 	// $resrow = $this->User_modal->edituser($id,'user');
	// 	 	$reshome = $this->display_modal->getaddressforhome($id);
	// 	 	$resother = $this->display_modal->getaddressforother($id);
	// 	 	$categname = $this->display_modal->get_categories();
 //       		 $a = array(
 //        	'categoriesdesc' => $categname,
 //        	'reshome' => $reshome,
 //        	'resother' => $resother,
 //        	'content' => (!isset($_SESSION['grocuname'])) ? 'login_view' : 'checkout_view_old');
	// 	$this->load->view('grocerytemplate',$a);
	// }
	
	public function getcartitemsforcheckout(){
		if (isset($_SESSION['grocuname'])) {
			$latitss = $this->input->post('place1');
			$longtss = $this->input->post('place2');
			$stds = $this->getdistancebyparamcheckount($latitss,$longtss);
			$userid  = $this->encryption->decrypt($_SESSION['grocuprime']);
			$a['cartitems'] = $this->display_modal->cartitemscheckout($userid,$stds);
			$a['kmcharge'] = $this->input->post('kmcharge');
			$this->load->view('frontendtables/checkoutitemfromcart_view',$a);
		}

	 	
	 }
	 public function getcartitemsforlandmark(){
		if (isset($_SESSION['grocuname'])) {
			$latits1 = $this->input->post('latits1');
			$longts1 = $this->input->post('longts1');
			$latit2 = $this->input->post('latit2');
			$longit2 = $this->input->post('longit2');
			// $this->load->library('Getdistancebyparam');
        // $stds = $this->getdistancebyparam->getdistance($latitss,$longtss);

			 $stds1 = $this->getdistancebyparamcheckount($latits1,$longts1);
			$stds2 = $this->getdistancebyparamcheckount($latit2,$longit2);
			$userid  = $this->encryption->decrypt($_SESSION['grocuprime']);
			$landmarks = $this->display_modal->cartitemscheckout($userid,$stds2);
			if(empty($landmarks)){
				echo "falses";
			}
			$storedetails = $this->display_modal->displayonerow('store');
			$kilom = $this->distances($storedetails->store_lat,$storedetails->store_lon,$latit2,$longit2,'K');
			
			foreach($landmarks as $cartitems){
				if (strpos($stds1, $cartitems->prod_store_id) !== false) {
				    echo $kilom;
				    break;
				}else{
					echo 'falses';
				   break;
					
				}
			}

			
		}

	 	
	 }
	 public function getdistancebyparamcheckount($lats,$lons){
	 	
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


	 public function orderconfirm(){
	 	$latits = $this->input->post('latits');
	 	$longts = $this->input->post('longts');
	 	$stid = $this->getdistancebyparam($latits,$longts);
	 	$addr = $this->input->post('addr');
	 	$kms = $this->input->post('kmchoose');
	 	$totalkm = round($kms,0,PHP_ROUND_HALF_UP);
	 	if($totalkm <= 2){
	 		$totalkmcharge = 20;
	 	}elseif($totalkm <= 3){
	 		$totalkmcharge = 40;
	 	}elseif($totalkm <= 5){
	 	   $totalkmcharge = 60;
	 	}elseif($totalkm <= 8){
	 		$totalkmcharge = 80;
	 	}else{
	 		$totalkmcharge = 100;
	 	}
	 	

		if (isset($_SESSION['grocuname'])) {

			
			$userid  = $this->encryption->decrypt($_SESSION['grocuprime']);
			$rescartitems = $this->display_modal->cartitemscheckoutdistinct($userid,$stid);

			$inserdata = array();
			$this->load->library('randomgenerate');
        	$orderno = $this->randomgenerate->random_string(8,"ORD");
			date_default_timezone_set("Asia/Calcutta");
			$useridarray = array();
			$agentidarray = array();
			$user_id ="";
			foreach($rescartitems as $rows){
				$i = 0;
				$ordernogp = $this->randomgenerate->random_string(8,"ORD");
				$restorid =  $this->display_modal->getstoreidincart($userid,$rows->prod_store_id);


				 foreach ($restorid as $keys => $row) {
						
				  $user_id = $row->cart_user_id;
			 	  $inserdata[$i]['dc_cart_id'] = $row->cart_id;
	              $inserdata[$i]['dc_user_id'] = $row->cart_user_id;
	              $inserdata[$i]['dc_order_id'] = $ordernogp;
	              $inserdata[$i]['dc_agent_id'] = $row->prod_agent_id;
	              $inserdata[$i]['dc_address_id'] = $addr;
	              $inserdata[$i]['dc_prod_name'] = $row->prod_name ;
	              $inserdata[$i]['dc_prod_measure'] = $row->prod_uom;
	              $inserdata[$i]['dc_prod_quantity'] = $row->cart_quantity;
	              $inserdata[$i]['dc_prod_image'] = $row->prod_image;
	              $inserdata[$i]['dc_prod_commoffer'] = $row->prod_disc_price * $row->cart_quantity;
	              $inserdata[$i]['dc_prod_tax'] = $row->prod_tax * $row->cart_quantity;
           		  $inserdata[$i]['dc_prod_actualcommission'] = ($row->prod_disc_price - $row->prod_sell_price) * $row->cart_quantity;
          		  $inserdata[$i]['dc_prod_actualstoreprice'] = ($row->prod_sell_price + $row->prod_tax) * $row->cart_quantity;
         		  //$inserdata[$i]['dc_prod_purchaserate'] = $row->prod_purchase_rate;
	         
	              
	              $inserdata[$i]['dc_time'] = date("H:i:s");
	              $inserdata[$i]['dc_date'] = date("Y-m-d");

                  $inserdata[$i]['dc_delivery_distance'] = $totalkm+1;
                  $inserdata[$i]['dc_deliveryboy_charge'] = $totalkmcharge/2;
                  $inserdata[$i]['dc_deliveryowner_charge'] = $totalkmcharge/2;


                  $res1 = $this->display_modal->update_cart($row->cart_id);
               
                  $i++;
                  }

                  $res = $this->display_modal->insertorder($inserdata);





//notification

         $qry_firebase = "SELECT * FROM firebase_user LEFT JOIN user  ON user.user_id = firebase_user.firebase_user_id where user_id ='$user_id'";
           $this->load->model('Android_service');
            $res1 = $this->Android_service->excute_qry($qry_firebase);
         
            $user_id1 = "";
            $user_name = "";
             
           foreach ($res1 as $key => $result) {
          
           $user_id1 = $result->firebase_user_id;
           $user_name = $result->user_displayname;

           }


            $message = "Dear ".$user_name.", Your purchase was success, Thank you for shopping with us!";

            $date = date('Y-m-d');	

           $data1= array('notification_user_id' =>$user_id1 ,'notification_order_id' =>$ordernogp,'notification_title'=>"Order Success",'notification_content'=>$message,'notification_date'=>$date,'notification_status'=>'0' );

           $this->load->model('Android_service');
		   $res2 = $this->Android_service->common_insert('notification',$data1);

				
			}

          

          //firebase_data_passing

			if($res == 'true'){
			$firebase_user = array();
            $firebase_user = array(
			 			"status" => 'success',
			 			"details" => $res1
			 		);
			 	echo json_encode($firebase_user);
			}else{
				echo 'Error';
			}
		}

	 	
	 }

	 	public function getdistancebyparam($lats,$lons){
	 	
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



 public function knet_payment(){ 

 		$addr = $this->input->get('address');
	 	$kms = $this->input->get('km'); 
	 	$total = $this->input->get('total'); 
	 	$userid = $this->input->get('id'); 
	 	$totalkm = round($kms,0,PHP_ROUND_HALF_UP);
	 	if($totalkm <= 2){
	 		$totalkmcharge = 20;
	 	}elseif($totalkm <= 3){
	 		$totalkmcharge = 40;
	 	}elseif($totalkm <= 5){
	 	   $totalkmcharge = 60;
	 	}elseif($totalkm <= 8){
	 		$totalkmcharge = 80;
	 	}else{
	 		$totalkmcharge = 100;
	 	} 
	 	
	 	
	 function getAccessToken() {
	  
		$ClientId = "43768276";
		$ClientSecret = "zLpsUXbh0amzfOMoQVo7uXDhYRN5a0cWLM9Z6HsOmtc1";
		$ENCRP_KEY = "35i6DIDZvdpwXzuNJEYQ8sF9CZY9hOawj7pYnmscki75p6RjEieNQIDnQCJblW3grEm_iV6GWDfA8kjcbbyvY0v0i2B2yONN47HxeY3Rk1s1";
		
		$URL = "https://pgtest.cbk.com";
	 
		$postfield = array("ClientId" => $ClientId,
				"ClientSecret" => $ClientSecret,
				"ENCRP_KEY" => $ENCRP_KEY);
        
        $curl = curl_init();

		 curl_setopt_array($curl, array(
					CURLOPT_URL =>  $URL ."/ePay/api/cbk/online/pg/merchant/Authenticate",
					CURLOPT_ENCODING => "",
					CURLOPT_FOLLOWLOCATION => 1,
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 30,
					CURLOPT_SSL_VERIFYHOST=>0,
					CURLOPT_SSL_VERIFYPEER=>0,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2TLS,
					CURLOPT_CUSTOMREQUEST => "POST",
					CURLOPT_RETURNTRANSFER => 1,
					CURLOPT_FRESH_CONNECT => true,
					CURLOPT_POSTFIELDS => json_encode($postfield),
					CURLOPT_HTTPHEADER => array(
						'Authorization: Basic ' . base64_encode($ClientId. ":" . $ClientSecret),
						"Content-Type: application/json",
						"cache-control: no-cache"
					),
				));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
  

        
        
        $authenticateData = json_decode($response);

            
        if ($authenticateData->Status == "1") {
		//save access token till expiry
            return $authenticateData->AccessToken;
        } else {
            return false;
        }
        
		
		}

	
	  function request($amount, $trackid, $reference, $udf1, $udf2, $udf3, $returl, $udf4, $udf5 = '',  $paymentType = 1, $lang = 'en') {



		$ClientId = "43768276";
		$ClientSecret = "zLpsUXbh0amzfOMoQVo7uXDhYRN5a0cWLM9Z6HsOmtc1";
		$ENCRP_KEY = "35i6DIDZvdpwXzuNJEYQ8sF9CZY9hOawj7pYnmscki75p6RjEieNQIDnQCJblW3grEm_iV6GWDfA8kjcbbyvY0v0i2B2yONN47HxeY3Rk1s1";
		$URL = "https://pgtest.cbk.com";
	 
        //get access token 
        if ($AccessToken = getAccessToken()) {
            //generate pg page 
            $formData = array(
                'tij_MerchantEncryptCode' => $ENCRP_KEY,
                'tij_MerchAuthKeyApi' => $AccessToken,
                'tij_MerchantPaymentLang' => $lang,
                'tij_MerchantPaymentAmount' => $amount,
                'tij_MerchantPaymentTrack' => $trackid,
                'tij_MerchantPaymentRef' => $reference,
                'tij_MerchantUdf1' => $udf1,
                'tij_MerchantUdf2' => $udf2,
				'tij_MerchantUdf3' => $udf3,
				'tij_MerchantUdf4' => $udf4,
				'tij_MerchantUdf5' => $udf5,
                'tij_MerchPayType' => $paymentType,
				'tij_MerchReturnUrl' => $returl
            );
            
            $url = $URL."/ePay/pg/epay?_v=" . $AccessToken;
            $form = "<form id='pgForm' method='post' action='$url' enctype='application/x-www-form-urlencoded'>";
            foreach ($formData as $k => $v) {
                $form .= "<input type='hidden' name='$k' value='$v'>";
            }
            $form .= "</form><div style='position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%;text-align:center'>Redirecting to PG ... <br> <b> DO NOT REFRESH</b></div><script type='text/javascript'>
    document.getElementById('pgForm').submit();
	</script>";

            return $form;
        } else {
            return "Authentication Failed";
        }
    }

    $response_url = base_url().'index.php/checkout/knet_response';
	echo request($total, uniqid(), "abc", $addr, $totalkmcharge, $totalkm, $response_url, $userid);
  }





public function knet_response(){ 
 	
	 function getAccessToken() {
	  
			$ClientId = "43768276";
			$ClientSecret = "zLpsUXbh0amzfOMoQVo7uXDhYRN5a0cWLM9Z6HsOmtc1";
			$ENCRP_KEY = "35i6DIDZvdpwXzuNJEYQ8sF9CZY9hOawj7pYnmscki75p6RjEieNQIDnQCJblW3grEm_iV6GWDfA8kjcbbyvY0v0i2B2yONN47HxeY3Rk1s1";
			$URL = "https://pgtest.cbk.com";
		 
			$postfield = array("ClientId" => $ClientId,
							   "ClientSecret" => $ClientSecret,
							   "ENCRP_KEY" => $ENCRP_KEY);
	        
	        $curl = curl_init();

			 curl_setopt_array($curl, array(
						CURLOPT_URL =>  $URL ."/ePay/api/cbk/online/pg/merchant/Authenticate",
						CURLOPT_ENCODING => "",
						CURLOPT_FOLLOWLOCATION => 1,
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 30,
						CURLOPT_SSL_VERIFYHOST=>0,
						CURLOPT_SSL_VERIFYPEER=>0,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => "POST",
						CURLOPT_RETURNTRANSFER => 1,
						CURLOPT_FRESH_CONNECT => true,
						CURLOPT_POSTFIELDS => json_encode($postfield),
						CURLOPT_HTTPHEADER => array(
							'Authorization: Basic ' . base64_encode($ClientId. ":" . $ClientSecret),
							"Content-Type: application/json",
							"cache-control: no-cache"
						),
					));

	        $response = curl_exec($curl);
	        $err = curl_error($curl);
	        
	        curl_close($curl);
	  

	    
	        
	        $authenticateData = json_decode($response);
	            
	        if ($authenticateData->Status == "1") {
	            return $authenticateData->AccessToken;
	        } else {
	            return false;
	        }
		}
	
 
 
	    function response($encrp) {

			$ClientId = "43768276";
			$ClientSecret = "zLpsUXbh0amzfOMoQVo7uXDhYRN5a0cWLM9Z6HsOmtc1";
			$ENCRP_KEY = "35i6DIDZvdpwXzuNJEYQ8sF9CZY9hOawj7pYnmscki75p6RjEieNQIDnQCJblW3grEm_iV6GWDfA8kjcbbyvY0v0i2B2yONN47HxeY3Rk1s1";
			$URL = "https://pgtest.cbk.com";

	        //returns the unencrypted data
	        //get access token 
	        if ($AccessToken = getAccessToken()) {
	            $url = $URL."/ePay/api/cbk/online/pg/GetTransactions/" . $encrp . "/" . $AccessToken;
	            $curl = curl_init();

	            curl_setopt_array($curl, array(
	                CURLOPT_URL => $url,
	                CURLOPT_ENCODING => "",
	                CURLOPT_FOLLOWLOCATION => 1,
	                CURLOPT_MAXREDIRS => 10,
	                CURLOPT_TIMEOUT => 30,
	                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	                CURLOPT_CUSTOMREQUEST => "GET",
	                CURLOPT_RETURNTRANSFER => 1,
	                CURLOPT_HTTPHEADER => array(
	                    'Authorization: Basic ' .base64_encode($ClientId. ":" . $ClientSecret),
	                    "Content-Type: application/json",
	                    "cache-control: no-cache"
	                ),
	            ));

	            $response = curl_exec($curl);
	            $err = curl_error($curl);
	            curl_close($curl);

	                
	           $paymentDetails = json_decode($response);

                // insert data into payment table

	           $userid = $paymentDetails->MerchUdf4;
	           $data= array('payment_user_id' =>$userid,'payment_status' =>$paymentDetails->Status,'payment_amount' =>$paymentDetails->Amount,'payment_track_id' =>$paymentDetails->TrackId,'payment_pay_type' =>$paymentDetails->PayType,'payment_payment_id' =>$paymentDetails->PaymentId,'payment_receipt_no' =>$paymentDetails->ReceiptNo,'payment_authcode' =>$paymentDetails->AuthCode,'payment_post_date' =>$paymentDetails->PostDate,'payment_reference_id' =>$paymentDetails->ReferenceId,'payment_transaction_id' =>$paymentDetails->TransactionId,'payment_message' =>$paymentDetails->Message,'payment_pay_id' =>$paymentDetails->PayId);


		           $ci =& get_instance();
	    		   $count = $ci->db->insert('payment_records',$data);
				   if($count>0)
					{
						$check = 1;
					}
					else
					{
						$check = 0;
					}
				  // echo $check;

				// insert data into payment table

                $payment_id = $paymentDetails->PaymentId;

				if($paymentDetails->Status == 1 && $check == 1)
				{
					// return $paymentDetails;
					  $addr = $paymentDetails->MerchUdf1;
					  $totalkmcharge = $paymentDetails->MerchUdf2;
					  $totalkm = $paymentDetails->MerchUdf3;


					  $url_success = base_url().'index.php/checkout/payment_success?address='.$addr.'&charge='.$totalkmcharge.'&km='.$totalkm.'&payid='.$payment_id.'';
					  header( "Location: $url_success" );
					 
				}
	            else {
					//return false;
					 $url_failed = base_url().'index.php/checkout/payment_failed?payid='.$payment_id.'';
					  header( "Location: $url_failed" );
				 }

	       
	        } 
	        else {
	            return false;
	        }
	    }

	$encrp = $_REQUEST['encrp'];

	var_dump(response($encrp));



}



public function payment_success()
{
						$latits = "10.530345";
					 	$longts = "76.214729";
					 	$addr = $this->input->get('address');
	 					$totalkmcharge = $this->input->get('charge'); 
	 					$totalkm = $this->input->get('km'); 
	 					$payid = $this->input->get('payid'); 
					 	$stid = $this->getdistancebyparam($latits,$longts);
					 	

						if (isset($_SESSION['grocuname'])) {

							
							$userid  = $this->encryption->decrypt($_SESSION['grocuprime']);
							$rescartitems = $this->display_modal->cartitemscheckoutdistinct($userid,$stid);

							$inserdata = array();
							$this->load->library('randomgenerate');
				        	$orderno = $this->randomgenerate->random_string(8,"ORD");
							date_default_timezone_set("Asia/Calcutta");
							$useridarray = array();
							$agentidarray = array();
							$user_id ="";
							foreach($rescartitems as $rows){
								$i = 0;
								$ordernogp = $this->randomgenerate->random_string(8,"ORD");
								$restorid =  $this->display_modal->getstoreidincart($userid,$rows->prod_store_id);


								 foreach ($restorid as $keys => $row) {
										
								  $user_id = $row->cart_user_id;
							 	  $inserdata[$i]['dc_cart_id'] = $row->cart_id;
					              $inserdata[$i]['dc_user_id'] = $row->cart_user_id;
					              $inserdata[$i]['dc_order_id'] = $ordernogp;
					              $inserdata[$i]['dc_agent_id'] = $row->prod_agent_id;
					              $inserdata[$i]['dc_address_id'] = $addr;
					              $inserdata[$i]['dc_prod_name'] = $row->prod_name ;
					              $inserdata[$i]['dc_prod_measure'] = $row->prod_uom;
					              $inserdata[$i]['dc_prod_quantity'] = $row->cart_quantity;
					              $inserdata[$i]['dc_prod_image'] = $row->prod_image;
					              $inserdata[$i]['dc_prod_commoffer'] = $row->prod_disc_price * $row->cart_quantity;
					              $inserdata[$i]['dc_prod_tax'] = $row->prod_tax * $row->cart_quantity;
				           		  $inserdata[$i]['dc_prod_actualcommission'] = ($row->prod_disc_price - $row->prod_sell_price) * $row->cart_quantity;
				          		  $inserdata[$i]['dc_prod_actualstoreprice'] = ($row->prod_sell_price + $row->prod_tax) * $row->cart_quantity;
				         		  //$inserdata[$i]['dc_prod_purchaserate'] = $row->prod_purchase_rate;
					         
					              
					              $inserdata[$i]['dc_time'] = date("H:i:s");
					              $inserdata[$i]['dc_date'] = date("Y-m-d");

				                  $inserdata[$i]['dc_delivery_distance'] = $totalkm+1;
				                  $inserdata[$i]['dc_deliveryboy_charge'] = $totalkmcharge/2;
				                  $inserdata[$i]['dc_deliveryowner_charge'] = $totalkmcharge/2;


				                  $res1 = $this->display_modal->update_cart($row->cart_id);
				               
				                  $i++;
				                  }

				                  //update orderid into payment table

								  $res11 = $this->display_modal->update_payment($ordernogp,$payid);

								  //update orderid into payment table
								


				                  $res = $this->display_modal->insertorder($inserdata);



							//notification

					            $qry_firebase = "SELECT * FROM firebase_user LEFT JOIN user  ON user.user_id = firebase_user.firebase_user_id where user_id ='$user_id'";
					            $this->load->model('Android_service');
					            $res1 = $this->Android_service->excute_qry($qry_firebase);
					         
					            $user_id1 = "";
					            $user_name = "";
					             
					           foreach ($res1 as $key => $result) {
					          
					           $user_id1 = $result->firebase_user_id;
					           $user_name = $result->user_displayname;

					           }


					            $message = "Dear ".$user_name.", Your purchase was success, Thank you for shopping with us!";

					            $date = date('Y-m-d');	

					           $data1= array('notification_user_id' =>$user_id1 ,'notification_order_id' =>$ordernogp,'notification_title'=>"Order Success",'notification_content'=>$message,'notification_date'=>$date,'notification_status'=>'0' );

					           $this->load->model('Android_service');
							   $res2 = $this->Android_service->common_insert('notification',$data1);

									
								}

					          //firebase_data_passing

								if($res == 'true'){
								$firebase_user = array();
					            $firebase_user = array(
								 			"status" => 'success',
								 			"details" => $res1
								 		);
								 	//echo json_encode($firebase_user);
								}else{
									//echo 'Error';
								}
							}



		$url_invoice = base_url().'index.php/checkout/payment_invoice?payid='.$payid.'';
		header( "Location: $url_invoice" );

    

	if(!empty($res))
	{
	?>
	<!-- <script type="text/javascript">
	alert("Payment was successful");
	window.location.href = '<?php echo base_url();?>index.php/orderhistory';
	</script> -->
	<?php
	}
	else
	{
	?>
<!-- 	<script type="text/javascript">
	alert("Error");
	window.location.href = '<?php echo base_url();?>index.php/cart';
	</script> -->
	<?php
	}


}


public function payment_failed()
{
	$payid = $this->input->get('payid'); 
	$url_invoice = base_url().'index.php/checkout/payment_invoice?payid='.$payid.'';
	header( "Location: $url_invoice" );
	?>
	<!-- <script type="text/javascript">
	alert("Payment failed");
	window.location.href = '<?php echo base_url();?>index.php/cart';
	</script> -->
	<?php
}


public function payment_invoice()
{
	$payid = $this->input->get('payid'); 
	$user_id = $this->encryption->decrypt($_SESSION['grocuprime']);

		 	$payment_details = $this->display_modal->get_invoice_details($payid);
		 	if(!empty($payment_details->payment_order_id))
		 	{
		 		$order_id = $payment_details->payment_order_id;
		 		$product_details = $this->display_modal->get_products($order_id);
		 	}
		 	else
		 	{
		 		$product_details = "";
		 	}
		 	
		 	

        $a = array(
        	'payment_details' => $payment_details,
        	'product_details' => $product_details);

	$this->load->view('payment_invoice',$a);
}


	 
}
