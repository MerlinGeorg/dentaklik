<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class Web_service_delivery extends CI_Controller {

public function __construct(){
  parent::__construct();
  // $this->load->library('javascript');
  // $this->load->library('form_validation');
  // $this->load->library('email');
   $this->load->library('encryption');
	$this->load->model('Android_service_delivery');
}
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

public function login_user() {
		
		
	    $user_email = $this->input->post('user_email');
		$user_password = $this->input->post('user_password');
		$firebase_reg_id = $this->input->post('firebase_reg_id');
		

		 $qry = "SELECT * FROM user WHERE user_name='$user_email' AND user_type='agent'";
	     $res = $this->Android_service_delivery->excute_qry_row($qry);

	     if(!empty($res))
	     {
	     	 $password = $this->encryption->decrypt($res->user_pwd);

	     }
	     else
	     {
	     	$password = "";
	     }


	   
         
        $categoryarray = array();
        if($user_password == $password)
        {

       $data1= array('firebase_user_id' =>$res->user_id ,'firebase_reg_id' =>$firebase_reg_id);
		$this->load->model('Android_service_delivery');
	    $res2 = $this->Android_service_delivery->common_insert('firebase_user',$data1);


        	$res_array = array();
            $res_array [] = $res;
        
		 if (!empty($res)) {
		
			 		$categoryarray = array(
			 			"error" => false,
			 			"details" => $res_array
			 		);
			 	echo json_encode($categoryarray);
		}
		
        }

        else {
			$categoryarray = array (
							'error' => true,
						);
					echo json_encode($categoryarray);
		
		    }

  	 
				
	}



public function logout() {
		
		$user_id = $this->input->post('user_id');
		$firebase_reg_id = $this->input->post('firebase_reg_id');

		$categoryarray = array();
	
		 $qry1 = "SELECT * FROM firebase_user WHERE firebase_user_id='$user_id' AND firebase_reg_id='$firebase_reg_id'";

	     $res1 = $this->Android_service_delivery->excute_qry_row($qry1);

	     if(!empty($res1))
	     {
	     	 $id = $res1->id;
	     }
	     else
	     {
	     	$id = "";
	     }

		$this->load->model('Android_service_delivery');
	    $res = $this->Android_service_delivery->firebase_delete($id);

	     if($res == 1)
		   {		
		
			 		$categoryarray = array(
			 			"error" => false,
			 		);
			 	echo json_encode($categoryarray);
		    }
		else {
			$categoryarray = array (
							'error' => true,
						);
					echo json_encode($categoryarray);
		
		      }

		}


public function get_user() {
		
		$user_id = $this->input->post('user_id');

	     $qry = "SELECT * FROM user WHERE user_id ='$user_id'";
	    $res = $this->Android_service_delivery->excute_qry($qry);
		

		 $categoryarray = array();
		if (!empty($res)) {
		
			 		$categoryarray = array(
			 			"error" => false,
			 			"details" => $res
			 		);
			 	echo json_encode($categoryarray);
		}
		else {
			$categoryarray = array (
							'error' => true,
						);
					echo json_encode($categoryarray);
		
		}
		 
				
	} 



public function user_update() {
		
		$user_id = $this->input->post('user_id');
		$user_name = $this->input->post('user_name');
		$user_email = $this->input->post('user_email');
		$mob_numb = $this->input->post('mob_numb');

		$old_password = $this->input->post('old_password');
		$new_password = $this->input->post('new_password');
		$confirm_password = $this->input->post('confirm_password');
        $categoryarray = array();

         $qry2 = "SELECT * FROM user WHERE (user_name='$user_email' OR user_phone ='$mob_numb') AND user_id != '$user_id'";
	     $res2 = $this->Android_service_delivery->excute_qry_row($qry2);

        

         if(!empty($res2))
         {
        
                           $categoryarray = array(
						 			"error" => false,
						 			"details" => "user_exsists"
						 		);
						 	echo json_encode($categoryarray);
         }

         else
         {




		        if($old_password == "")
				{
				$data1= array('user_name' =>$user_email ,'user_displayname' =>$user_name ,
		         	'user_phone'=>$mob_numb);

				$res = $this->Android_service_delivery->user_update($user_id,$data1);
					 if($res == 1)
							   {		
							
								 		$categoryarray = array(
								 			"error" => false,
								 			"details" => "user_updated"
								 		);
								 	echo json_encode($categoryarray);
							    }
							else {
								$categoryarray = array (
												'error' => true,
											);
										echo json_encode($categoryarray);
							
							      }

				}


				else
				{

		       
				 $qry1 = "SELECT * FROM user WHERE user_id='$user_id'";
			     $res1 = $this->Android_service_delivery->excute_qry_row($qry1);
		         $password = $this->encryption->decrypt($res1->user_pwd);
			    
				     if($password == $old_password)
				     {
				     	
		                 if($new_password == $confirm_password)
		                 {
		                 	$save_password = $this->encryption->encrypt($new_password);

							$data1= array('user_name' =>$user_email ,'user_displayname' =>$user_name ,
							         	'user_phone'=>$mob_numb,'user_pwd'=>$save_password);

							$res = $this->Android_service_delivery->user_update($user_id,$data1);
							 if($res == 1)
							   {		
							
								 		$categoryarray = array(
								 			"error" => false,
								 			"details" => "user_password_updated"
								 		);
								 	echo json_encode($categoryarray);
							    }
							else {
								$categoryarray = array (
												'error' => true,
											);
										echo json_encode($categoryarray);
							
							      }

		                 }

		                 else
		                 {

		                   $categoryarray = array(
								 			"error" => false,
								 			"details" => "confirm_password_error"
								 		);
								 	echo json_encode($categoryarray);
		 
		                 }


		             }

				     else
				     {
				     	$categoryarray = array(
								 			"error" => false,
								 			"details" => "old_password_error"
								 		);
								 	echo json_encode($categoryarray);
				     }



				 }



        }
         
     		
	} 



public function order() {
		
		$user_id = $this->input->post('user_id');
		$order_id = $this->input->post('order_id');
		if($order_id == "")
		{
			 $sel_qry = "SELECT * FROM deliverycharge LEFT JOIN cart  ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN user ON deliverycharge.dc_user_id =  user.user_id LEFT JOIN address ON deliverycharge.dc_address_id = address.address_id WHERE dc_agent_id ='$user_id' GROUP BY dc_order_id";
		}
		else
		{
			 $sel_qry = "SELECT * FROM deliverycharge LEFT JOIN cart  ON deliverycharge.dc_cart_id = cart.cart_id LEFT JOIN user ON deliverycharge.dc_user_id =  user.user_id LEFT JOIN address ON deliverycharge.dc_address_id = address.address_id WHERE dc_agent_id ='$user_id' AND dc_order_id = '$order_id' GROUP BY dc_order_id";
		}

      

	     $res = $this->Android_service_delivery->excute_qry($sel_qry);

          $order_cancel = "";
          $order_total = "";
          $delivery_boy_charge = "";
          $delivery_company_charage = "";

          $order_detail = array();

	      foreach ($res as $key => $row) {
          
          $order_id = $row->dc_order_id;
        
        $sel_qry2 = "SELECT * FROM deliverycharge  WHERE dc_order_id ='$order_id' AND dc_cancel_order = '0'";
	    $res2 = $this->Android_service_delivery->excute_qry($sel_qry2);
        
	       if(empty($res2))
	       {

	       	$sel_qry3 = "SELECT * FROM deliverycharge  WHERE dc_order_id ='$order_id'";
	        $res3 = $this->Android_service_delivery->excute_qry_row($sel_qry3);

	       	$order_cancel = "true";
	       	$order_total = "0.00";
	       	$delivery_boy_charge = $res3->dc_deliveryboy_charge;
            $delivery_company_charage = $res3->dc_deliveryowner_charge;

             $order_detail[] = array(
             	        "order_cancel" => $order_cancel,
			 			"order_total" => $order_total,
			 			"delivery_boy_charge" => $delivery_boy_charge,
			 			"delivery_company_charage" => $delivery_company_charage
			 		);  

	       }
	       else
	       {

	       	$sel_qry4 = "SELECT SUM(dc_prod_actualstoreprice) as price,dc_deliveryboy_charge,dc_deliveryowner_charge FROM deliverycharge WHERE dc_order_id ='$order_id' AND dc_cancel_order = '0' GROUP BY dc_order_id";

           $res4 = $this->Android_service_delivery->excute_qry_row($sel_qry4);
	       $order_cancel = "false";
	        $order_total =  $res4->price;
	       	$delivery_boy_charge = $res4->dc_deliveryboy_charge;
            $delivery_company_charage = $res4->dc_deliveryowner_charge;

             $order_detail[] = array(
             	        "order_cancel" => $order_cancel,
			 			"order_total" => $order_total,
			 			"delivery_boy_charge" => $delivery_boy_charge,
			 			"delivery_company_charage" => $delivery_company_charage
			 		);  

	       }

	      }
        
     

		$categoryarray = array();
		if (!empty($res)) {
		
			 		$categoryarray = array(
			 			"error" => false,
			 			"details" => $res,
			 			"order_detail" => $order_detail
			 		);
			 	echo json_encode($categoryarray);
		}
		else {
			$categoryarray = array (
							'error' => true,
						);
					echo json_encode($categoryarray);
		
		}
		 
				
	} 



public function pick_up_update() {
		
		$order_id = $this->input->post('order_id');
		date_default_timezone_set("Asia/Calcutta");
		 $time = date("H:i:s");
		 $date = date("Y-m-d");

		$sel_qry5 = "SELECT * FROM deliverycharge WHERE dc_order_id ='$order_id' AND dc_cancel_order = 0";	
		$res5 = $this->Android_service_delivery->excute_qry_row($sel_qry5);

		if(empty($res5))
		{
			$res = "empty";
		}
		else
		{

	    $data1= array('order_status' =>'1','dc_shipped_date' =>$date,'dc_shipped_time' =>$time);

		$res = $this->Android_service_delivery->order_update($order_id,$data1);
		}

	   $categoryarray = array();
	    if($res == 1)
	    {

	    	$categoryarray = array(
			 			"error" => false,
			 			"details" => $res
			 		);
			 	echo json_encode($categoryarray);

//notification - firebase
	
	 $sel_qry = "SELECT * FROM deliverycharge WHERE dc_order_id ='$order_id'";	

	 $res2 = $this->Android_service_delivery->excute_qry_row($sel_qry);

	 $user_id = $res2->dc_user_id;

	 $sel_qry1 = "SELECT * FROM firebase_user LEFT JOIN user ON user_id = firebase_user_id WHERE firebase_user_id ='$user_id'";

    $res1 = $this->Android_service_delivery->excute_qry($sel_qry1);	

	     foreach ($res1 as $key => $row) {
	          
	      $registration_ids = $row->firebase_reg_id;
	      $user_name = $row->user_displayname;
	        
		    $message  = array();
	        $message['title'] = "Out For Delivery";
	        $message['is_background'] = "";
	        $message['body'] = "Dear ".$user_name.", Your order no ".$order_id." is on its way!";
	        $message['image'] = "";
	        $message['payload'] = "";
	        $message['timestamp'] = date('Y-m-d G:i:s');	

		    	$fields = array(
	            'to' => $registration_ids,
	            'notification' => $message,
	             );

	        $this->sendPushNotification($fields);
			
			}
			 		
		}
		else 
		{
			$categoryarray = array (
							'error' => true,
							"details" => "order_cancelled"
						);
					echo json_encode($categoryarray);
		
		}
		 
				
	} 


public function product_list() {
		
		$order_id = $this->input->post('order_id');

       $sel_qry = "SELECT * FROM deliverycharge  WHERE dc_order_id = '$order_id' AND dc_cancel_order = '0'";

	    $res = $this->Android_service_delivery->excute_qry($sel_qry);

		 $categoryarray = array();
		if (!empty($res)) {
		
			 		$categoryarray = array(
			 			"error" => false,
			 			"details" => $res
			 		);
			 	echo json_encode($categoryarray);
		}
		else {
			$categoryarray = array (
							'error' => true,
						);
					echo json_encode($categoryarray);
		
		}
		 
				
	} 


	public function delivery_update() {
		
		$order_id = $this->input->post('order_id');
		date_default_timezone_set("Asia/Calcutta");
		 $time = date("H:i:s");
		 $date = date("Y-m-d");

	    $data1= array('dc_status' =>'1','dc_delivery_date' =>$date,'dc_delivery_time' =>$time);

		$res = $this->Android_service_delivery->order_update($order_id,$data1);

	   $categoryarray = array();
	    if($res == 1)
	    {		
		
			 		$categoryarray = array(
			 			"error" => false,
			 			"details" => $res
			 		);
			 	echo json_encode($categoryarray);


			 	//notification - firebase
	
	 $sel_qry = "SELECT * FROM deliverycharge WHERE dc_order_id ='$order_id'";	

	 $res2 = $this->Android_service_delivery->excute_qry_row($sel_qry);

	 $user_id = $res2->dc_user_id;

	 $sel_qry1 = "SELECT * FROM firebase_user LEFT JOIN user ON user_id = firebase_user_id WHERE firebase_user_id ='$user_id'";

    $res1 = $this->Android_service_delivery->excute_qry($sel_qry1);	

	     foreach ($res1 as $key => $row) {
	          
	      $registration_ids = $row->firebase_reg_id;
	      $user_name = $row->user_displayname;
	        
		    $message  = array();
	        $message['title'] = "Order Delivered";
	        $message['is_background'] = "";
	        $message['body'] = "Dear ".$user_name.", Thank you for shopping with us, Your order no ".$order_id." has been Delivered!";
	        $message['image'] = "";
	        $message['payload'] = "";
	        $message['timestamp'] = date('Y-m-d G:i:s');	

		    	$fields = array(
	            'to' => $registration_ids,
	            'notification' => $message,
	             );

	        $this->sendPushNotification($fields);
			
			}
		}
		else 
		{
			$categoryarray = array (
							'error' => true,
						);
					echo json_encode($categoryarray);
		
		}
		 
				
	} 


    public function cancel_product() {
		
		$product_id = $this->input->post('product_id');
		$order_id = $this->input->post('order_id');
		date_default_timezone_set("Asia/Calcutta");
		$time = date("H:i:s");
		$date = date("Y-m-d");

		if($product_id == "")
		{
			 $data1= array('dc_cancel_order' =>'1','dc_delivery_date' =>$date,'dc_delivery_time' =>$time);

		$res = $this->Android_service_delivery->order_cancel($order_id,$data1);
		}
		else
		{
			 $data1= array('dc_cancel_order' =>'1');

		     $res = $this->Android_service_delivery->product_cancel($product_id,$data1);
		}

	   

	   $categoryarray = array();
	    if($res == 1)
	    {	
		    $sel_qry1 = "SELECT * FROM deliverycharge WHERE dc_order_id ='$order_id' AND dc_cancel_order = '0'";	

			 $res1 = $this->Android_service_delivery->excute_qry_row($sel_qry1);

			 if(empty($res1->dc_id))
			 {
			 	//order cancelled
		       $order_cancel = "true";

		       	//notification - firebase
	
			 $sel_qry = "SELECT * FROM deliverycharge WHERE dc_order_id ='$order_id'";	

			 $res2 = $this->Android_service_delivery->excute_qry_row($sel_qry);

			 $user_id = $res2->dc_user_id;

			 $sel_qry1 = "SELECT * FROM firebase_user LEFT JOIN user ON user_id = firebase_user_id WHERE firebase_user_id ='$user_id'";

		    $res1 = $this->Android_service_delivery->excute_qry($sel_qry1);	

		        foreach ($res1 as $key => $row) {
		          
		        $registration_ids = $row->firebase_reg_id;
		        $user_name = $row->user_displayname;
		        
			    $message  = array();
		        $message['title'] = "Order Cancelled";
		        $message['is_background'] = "";
		        $message['body'] = "Dear ".$user_name.", Thank you for shopping with us, Your order no ".$order_id." has been Cancelled!";
		        $message['image'] = "";
		        $message['payload'] = "";
		        $message['timestamp'] = date('Y-m-d G:i:s');	

			    	$fields = array(
		            'to' => $registration_ids,
		            'notification' => $message,
		             );

		        $this->sendPushNotification($fields);
				
				}
			 }
			 else
			 {
		        $order_cancel = "false";
			 }
	
		
			 		$categoryarray = array(
			 			"error" => false,
			 			"order_cancel" => $order_cancel,
			 			"details" => $res
			 		);
			 	echo json_encode($categoryarray);

		}
		else 
		{
			$categoryarray = array (
							'error' => true,
						);
					echo json_encode($categoryarray);
		
		}
		 
				
	} 



	  private function sendPushNotification($fields) {
        
   //require_once __DIR__ . 'config.php';
  define('FIREBASE_API_KEY', 'AAAAGJoyKhc:APA91bGpqfh8clmYTRbnDT4Sn2h3FxuhJIHl40BOIr9V8EPmGkauA1nZzF6PQUKGgaXQyEsdbpTnHUNX73_1ybrTFduJZSXisKcjl9wuC1VVCx4UKgSKziPVPcwhmEHbO9QtjwfYOqCC');

        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = array(
            'Authorization: key=' . FIREBASE_API_KEY,
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();

        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);

        return $result;
    }


}