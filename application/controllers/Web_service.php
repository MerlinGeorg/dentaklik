<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ob_start();

class Web_service extends CI_Controller {

public function __construct(){
  parent::__construct();
  // $this->load->library('javascript');
  // $this->load->library('form_validation');
  // $this->load->library('email');
   $this->load->library('encryption');
	$this->load->model('Android_service');

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

    public function query_store_create($a)

    {
        
    	  $store_id = explode (",", $a);  
    	  array_pop($store_id);
		  $count = count($store_id);
		 // $categoryarray = array();
		  $append_qry2= "";

		  for($i=0; $i<$count;$i++)
		  {

		  	 $append_qry1 = "prod_store_id = '$store_id[$i]'";

		  	 $append_qry2 = $append_qry2." OR ".$append_qry1;

		  	}

		   	$append_qry1 = substr($append_qry2, 3);
             $append_qry = "(".$append_qry1.")";
		   	return $append_qry;

    }

		public function getCategory() {
		
		$storeid = $this->input->post('store_id');

		$append_qry = $this->query_store_create($storeid);

		$qry = "SELECT * FROM product LEFT JOIN category  ON category.cat_id = product.prod_cat_id";

		 $sel_qry = $qry." WHERE ".$append_qry." GROUP BY prod_cat_id";

	     $res = $this->Android_service->excute_qry($sel_qry);
          

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


	// public function getProduct() {
		
	// 	$category = $this->input->post('category');
	// 	$storeid = $this->input->post('store_id');
		
 //         $append_qry = $this->query_store_create($storeid);

	// 	 $qry = "SELECT * FROM product LEFT JOIN store  ON store.store_id = product.prod_store_id";

	// 	 $cat_qry = "AND prod_cat_id = '$category' ORDER BY prod_id DESC";

	// 	 $sel_qry = $qry." WHERE ".$append_qry.$cat_qry."";
		

	//      $res = $this->Android_service->excute_qry($sel_qry);

	// 	 $categoryarray = array();
	// 	if (!empty($res)) {
		
	// 		 		$categoryarray = array(
	// 		 			"error" => false,
	// 		 			"details" => $res
	// 		 		);
	// 		 	echo json_encode($categoryarray);
	// 	}
	// 	else {
	// 		$categoryarray = array (
	// 						'error' => true,
	// 					);
	// 				echo json_encode($categoryarray);
		
	// 	}
		 
				
	// }



	public function getProduct() {
		
		$category = $this->input->post('category');
		$storeid =  $this->input->post('store_id');
		$append_qry = $this->query_store_create($storeid);
        $search_product = $this->input->post('search_product');
		$sort_check = $this->input->post('sort');
		// $checked_category = "";//$this->input->post('checked_category');
		// $checked_brand = "";//$this->input->post('checked_brand');
		// $checked_discount = "";//$this->input->post('checked_discount');
		// $price_min = "";//$this->input->post('price_min');
		// $price_max = "";//$this->input->post('price_max');
		$checked_category = $this->input->post('checked_category');
		$checked_brand = $this->input->post('checked_brand');
		$checked_discount = $this->input->post('checked_discount');
		$price_min = $this->input->post('price_min');
		$price_max = $this->input->post('price_max');



    if($checked_discount =="" && $checked_brand == "" && $checked_category =="" && $price_min =="" && $price_max =="" && $sort_check == "popularity")
    {
    	 $qry = "SELECT * FROM product LEFT JOIN store  ON store.store_id = product.prod_store_id LEFT JOIN brand  ON brand.brand_id = product.prod_brand_id LEFT JOIN wishlists ON wishlists.wishlists_prod_id = product.prod_id";

		if($search_product == "")
		{
			$cat_qry = "AND prod_cat_id = '$category' GROUP By product.prod_id ORDER BY prod_deactive ASC,prod_priority ASC";
		}
		 
	      else
	      {
	      	$cat_qry = "AND prod_name LIKE '%$search_product%' GROUP By product.prod_id ORDER BY prod_deactive ASC,prod_priority ASC";
	      }
		  

		 $sel_qry = $qry."  WHERE prod_admin_approved ='1' AND".$append_qry.$cat_qry."";
		
		

	     $res = $this->Android_service->excute_qry($sel_qry);

    }


    else
    {
    	if($checked_category == "")
    	{
           $category_qry = "";
    	}
    	else
    	{
           
    		$checked_category1 = trim($checked_category, '[');
    		$checked_category2 = trim($checked_category1, ']');

		    	 $checked_category = explode (",", $checked_category2);  
				 $count = count($checked_category);
				 $append_category2= "";

				       for($i=0; $i<$count;$i++)
				       {

				  	     $append_category1 = "sub_name = '$checked_category[$i]'";

				  	      $append_category2 = $append_category2." OR ".$append_category1;

				  	   }

		     $category_qry1 = substr($append_category2, 3);
		     $category_qry = " AND "."(".$category_qry1.")";

    	}


    	if($checked_brand == "")
    	{
           $brand_qry = "";
    	}
    	else
    	{
           
    		$checked_brand1 = trim($checked_brand, '[');
    		$checked_brand2 = trim($checked_brand1, ']');

		    	 $checked_brand = explode (",", $checked_brand2);  
				 $count = count($checked_brand);
				 $append_brand2= "";

				       for($i=0; $i<$count;$i++)
				       {

				  	     $append_brand1 = "brand_name = '$checked_brand[$i]'";

				  	      $append_brand2 = $append_brand2." OR ".$append_brand1;

				  	   }

		     	 $brand_qry1 = substr($append_brand2, 3);
		     	 $brand_qry = " AND "."(".$brand_qry1.")";

    	}

    	if($checked_discount == "")
    	{
           $discount_qry = "";
    	}
    	else
    	{
           
		   $discount_qry = " AND prod_disc >= '$checked_discount'";

    	}

    	if($price_min == "" && $price_max =="")
    	{
           $price_qry = "";
    	}
    	else
    	{
           
		   $price_qry = " AND prod_disc_price >= '$price_min' AND prod_disc_price <= '$price_max'";

    	}



    	$full_query = $append_qry.$category_qry.$brand_qry.$discount_qry.$price_qry;

	 if($search_product == "")
    {
			if($sort_check == "popularity")
		{
			$res = $this->Android_service->display_product_sort_popularity($category,$full_query);
		}
		if($sort_check == "discount")
		{
			$res = $this->Android_service->display_product_sort_discount($category,$full_query);	
		}
		if($sort_check == "price_desc")
	    {
            $res = $this->Android_service->display_product_sort_price_desc($category,$full_query);
	    }
		if($sort_check == "price_asc") 
		{
           $res = $this->Android_service->display_product_sort_price_asc($category,$full_query);
		}
	}
		 
	 else
	{

		if($sort_check == "popularity")
		{
		$res = $this->Android_service->display_search_product_sort_popularity($search_product,$full_query);
		}
		if($sort_check == "discount")
		{
		$res = $this->Android_service->display_search_product_sort_discount($search_product,$full_query);	
		}
		if($sort_check == "price_desc")
	    {
        $res = $this->Android_service->display_search_product_sort_price_desc($search_product,$full_query);
	    }
		if($sort_check == "price_asc") 
		{
         $res = $this->Android_service->display_search_product_sort_price_asc($search_product,$full_query);
		}
	      
	}


    }



$empty_product = array();
$empty_product [] = array(
			 			'prod_id' => "",
			 			'prod_name' => "",
			 			'prod_image' => ""
			 		);


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
							"error" => true,
							"details" => $empty_product
						);
					echo json_encode($categoryarray);
		
		}
		 
				
	}



	

		public function getSubcategory() {
		
		 $category = $this->input->post('category');
		 $storeid = $this->input->post('store_id');
		
         $append_qry = $this->query_store_create($storeid);
		 $res = $this->Android_service->display_subcategory($category,$append_qry);


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

	public function getBrandlist() {
		
		 $category = $this->input->post('category');
		 $storeid = $this->input->post('store_id');
		
         $append_qry = $this->query_store_create($storeid);
		 $res = $this->Android_service->display_brand($category,$append_qry );

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


	  public function getdistancebyparam(){

        $lats =   $this->input->post('lat');//"10.4335892";
        $lons = $this->input->post('long'); //"76.26384269999994";
	 	$earthRadius = 6371000;
	 	$radius = 10000;//km
	 	$results = $this->Android_service->display('store');
	 	$n_rows = count($results);
	 	$placename = '';
	 	$storeid = '' ;
		for($i=0; $i<$n_rows; $i++) {
			if($this->distance($lats,$lons,$results[$i]->store_lat,$results[$i]->store_lon,"K") < $radius){
				$placename = $placename . $results[$i]->store_name . ",";
				$storeid = $storeid . $results[$i]->store_id . ",";


			}
		}

			 $categoryarray = array();
		if (!empty($storeid)) {
		
			 		$categoryarray = array(
			 			"error" => false,
			 			"details" => $storeid
			 		);
			 	echo json_encode($categoryarray);
		}
		else {
			$categoryarray = array (
							'error' => true,
						);
					echo json_encode($categoryarray);
		
		}

	 	//return $storeid;
	
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
	  }
	}


	public function getsingleproduct() {
		
		 $product_id = $this->input->post('product_id');
	     $res = $this->Android_service->display_single_product($product_id);
          
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

		public function getrelatedproduct() {
		
		$category = $this->input->post('category');
		$storeid = $this->input->post('store_id');
		$product_id = $this->input->post('product_id');
		
       if($category == "")
       {

          $qry1 = "SELECT * FROM product WHERE prod_id='$product_id'";
	       $res1 = $this->Android_service->excute_qry_row($qry1);

	     if(!empty($res1))
	     {
	     	 $category = $res1->prod_cat_id;
	     	 $cat_qry = "AND prod_cat_id = '$category' ORDER BY RAND() DESC LIMIT 10";
	     }
	     else
	     {
	     	 $cat_qry = "ORDER BY RAND() DESC LIMIT 10";
	     }

       }
       else
       {

         $cat_qry = "AND prod_cat_id = '$category' ORDER BY RAND() DESC LIMIT 10";
		  
       }
         $append_qry = $this->query_store_create($storeid);

			$qry = "SELECT * FROM product LEFT JOIN store  ON store.store_id = product.prod_store_id LEFT JOIN brand  ON brand.brand_id = product.prod_brand_id";

		    $sel_qry = $qry." WHERE prod_admin_approved ='1' AND prod_deactive='0' AND".$append_qry.$cat_qry."";


			     $res = $this->Android_service->excute_qry($sel_qry);

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

		public function register_user() {
		
		$user_name = $this->input->post('user_name');
		$user_email = $this->input->post('user_email');
		$user_password = $this->input->post('user_password');
		$confirm_password = $this->input->post('confirm_password');
		$user_mobile = $this->input->post('user_mobile');

		 $qry = "SELECT * FROM user WHERE user_name='$user_email' OR user_phone = '$user_mobile'";
	     $res1 = $this->Android_service->excute_qry($qry);
         $categoryarray = array();

         //check wether user_exsists
	     if (!empty($res1)) {
		
			 		$categoryarray = array(
			 			"error" => false,
			 			"details" => "user"
			 		);
			 	echo json_encode($categoryarray);
		}
		else {


			if($user_password == $confirm_password)
			{
	               date_default_timezone_set("Asia/Calcutta");
		           $date = date('Y-m-d');			
			        $userpassword=$this->encryption->encrypt($user_password);

			      			$data1= array('user_agent_id' =>'0' ,'user_type' =>'user' ,'user_name'=>$user_email,'user_pwd'=>$userpassword,'user_displayname' =>$user_name ,'user_phone'=>$user_mobile,'user_modified' =>$date );
					$this->load->model('Android_service');
				    $res = $this->Android_service->user_insert($data1);

					if($res == 1)
					{		
					
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

			else
			{
				 $categoryarray = array (
									"error" => false,
						 			"details" => "password"
									);
								echo json_encode($categoryarray);
			}


		
		
		}

		 
		
		 
				
	}



	public function login_user() {
		
		
	$user_email = $this->input->post('user_email');
	$user_password = $this->input->post('user_password');
	$firebase_reg_id = $this->input->post('firebase_reg_id');
		

	$qry = "SELECT * FROM user WHERE user_name='$user_email' AND user_type = 'user'";
	$res = $this->Android_service->excute_qry_row($qry);

	     if(!empty($res))
	     {
	     	 $password = $this->encryption->decrypt($res->user_pwd);
	     	$data1= array('firebase_user_id' =>$res->user_id ,'firebase_reg_id' =>$firebase_reg_id);
	        $this->load->model('Android_service');
	        $res2 = $this->Android_service->common_insert('firebase_user',$data1);
	     }
	     else
	     {
	     	$password = "";
	     }


         
        $categoryarray = array();
        if($user_password == $password)
        {

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


	

		public function wishlist_update() {
		
		$user_id = $this->input->post('user_id');
		$product_id = $this->input->post('product_id');
	    $status = $this->input->post('status');

		$categoryarray = array();
		if($status == "remove")
		{

		 $qry1 = "SELECT * FROM wishlists WHERE wishlists_user_id='$user_id' AND wishlists_prod_id='$product_id'";
	     $res1 = $this->Android_service->excute_qry_row($qry1);

	     if(!empty($res1))
	     {
	     	 $id = $res1->wishlists_id;
	     }
	     else
	     {
	     	$id = "";
	     }

		$this->load->model('Android_service');
	    $res = $this->Android_service->wish_list_delete($id);

	     if($res == 1)
		   {		
		
			 		$categoryarray = array(
			 			"error" => false,
			 			"details" => "remove"
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
		//add to wishlist
		else
		{
			date_default_timezone_set("Asia/Calcutta");
			$date = date('Y-m-d');	
			 $qry1 = "SELECT * FROM wishlists WHERE wishlists_user_id='$user_id' AND wishlists_prod_id='$product_id'";
	        $res1 = $this->Android_service->excute_qry_row($qry1);

						       if(!empty($res1))
						     {
						     	$res = 1;
						     }
						     else
						     {
						    
						    $data1= array('wishlists_user_id' =>$user_id ,'wishlists_prod_id' =>$product_id ,'wishlists_date'=>$date );
							$this->load->model('Android_service');
						    $res = $this->Android_service->wish_list_insert($data1);
						     }


			
	    if($res == 1)
		   {		
		
			 		$categoryarray = array(
			 			"error" => false,
			 			"details" => "add"
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

		
		
	}

		 
		
			public function get_wishlist() {
		
		$user_id = $this->input->post('user_id');
		$storeid = $this->input->post('store_id');
		
       //  $append_qry = $this->query_store_create($storeid);

		 $qry = "SELECT * FROM wishlists LEFT JOIN product  ON wishlists.wishlists_prod_id = product.prod_id LEFT JOIN store  ON store.store_id = product.prod_store_id LEFT JOIN brand  ON brand.brand_id = product.prod_brand_id ";

		 //$cat_qry = "AND prod_cat_id = '$category' ORDER BY RAND() DESC LIMIT 10";

   // $sel_qry = $qry." WHERE wishlists_user_id ='$user_id' AND ".$append_qry."";
      $sel_qry = $qry." WHERE wishlists_user_id ='$user_id'";


	     $res = $this->Android_service->excute_qry($sel_qry);

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
				





public function add_cart() {
		
		$user_id = $this->input->post('user_id');
		$product_id = $this->input->post('product_id');
		$store_id = $this->input->post('store_id');
	   // $status = $this->input->post('status');
        $append_qry = $this->query_store_create($store_id);
		$categoryarray = array();
		
	    $qry = "SELECT * FROM  product LEFT JOIN store  ON store.store_id = product.prod_store_id LEFT JOIN brand  ON brand.brand_id = product.prod_brand_id ";

        $sel_qry = $qry." WHERE prod_id ='$product_id' AND prod_deactive = '0' AND prod_admin_approved ='1' AND ".$append_qry."";
	     $res = $this->Android_service->excute_qry($sel_qry);

		 $categoryarray = array();
		if (!empty($res)) {
	   date_default_timezone_set("Asia/Calcutta");
	   $date = date('Y-m-d');	
		$qry1 = "SELECT * FROM cart WHERE cart_user_id='$user_id' AND cart_product_id='$product_id' and cart_ordr_status = '0'";
	        $res1 = $this->Android_service->excute_qry_row($qry1);

						       if(!empty($res1))
						     {
						     	$res = 1;
						     }
						     else
						     {
						    
						    $data1= array('cart_user_id' =>$user_id ,'cart_product_id' =>$product_id ,'cart_date'=>$date,'cart_quantity'=>'1' );
							$this->load->model('Android_service');
						    $res = $this->Android_service->cart_insert($data1);
						     }


			
	    if($res == 1)
		   {		
		
			 		$categoryarray = array(
			 			"error" => false,
			 			"details" => "add"
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
			 			"details" => "far"
			 		);
			 	echo json_encode($categoryarray);
		  }

	}



		public function get_cart() {
		
		$user_id = $this->input->post('user_id');
		$storeid = $this->input->post('store_id');
		
         $append_qry = $this->query_store_create($storeid);

		 $qry = "SELECT * FROM cart LEFT JOIN product  ON cart.cart_product_id = product.prod_id LEFT JOIN store  ON store.store_id = product.prod_store_id LEFT JOIN brand  ON brand.brand_id = product.prod_brand_id ";

    $sel_qry = $qry." WHERE cart_user_id ='$user_id' AND prod_deactive = '0' AND cart_ordr_status = '0' AND ".$append_qry."";


	     $res = $this->Android_service->excute_qry($sel_qry);

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




	public function update_cart() {
		
		$user_id = $this->input->post('user_id');
		$product_id = $this->input->post('product_id');
	    $status = $this->input->post('status');

		$categoryarray = array();

		$qry1 = "SELECT * FROM cart WHERE cart_user_id='$user_id' AND cart_product_id='$product_id'";
	    $res1 = $this->Android_service->excute_qry_row($qry1);

	     if(!empty($res1))
	     {
	     	 $id = $res1->cart_id;
	     	 $current_qty = $res1->cart_quantity;
	     }
	     else
	     {
	     	$id = "";
	     }




		if($status == "remove")
		{

		$this->load->model('Android_service');
	    $res = $this->Android_service->cart_delete($id);

	     if($res == 1)
		   {		
		
			 		$categoryarray = array(
			 			"error" => false,
			 			"details" => "remove"
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
	


		else if($status == "increment")
		
		{

				
				$qty = $current_qty + 1;

			
		        $qry = "UPDATE cart SET cart_quantity = '$qty' WHERE cart_id='$id'";
                $res = $this->Android_service->excute_qry_update($qry);


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

		else
		{
			    $qty = $current_qty - 1;

				$qry = "UPDATE cart SET cart_quantity = '$qty' WHERE cart_id='$id'";
			    $res = $this->Android_service->excute_qry_update($qry);

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

		
		
	}




public function get_address() {
		
		$user_id = $this->input->post('user_id');
		$edit_status = $this->input->post('edit_status');

		if($edit_status == "")
		{
	     $qry = "SELECT * FROM address WHERE address_user_id ='$user_id' ORDER BY address_type ASC";
	     $res = $this->Android_service->excute_qry($qry);
		}

		else
		{
		 $qry = "SELECT * FROM address WHERE address_user_id ='$user_id' AND address_type = '$edit_status'";
	     $res = $this->Android_service->excute_qry($qry);
		}

		

		 $categoryarray = array();
		if (!empty($res)) {
		
			 		$categoryarray = array(
			 			"error" => false,
			 			"count" => count($res),
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


	public function delete_address() {
		
		$id = $this->input->post('address_id');

		$res = $this->Android_service->address_delete($id);

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


	public function add_address() {
		
		$user_id = $this->input->post('user_id');
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$city = $this->input->post('city');
		$pincode = $this->input->post('pincode');

		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');
		$location_name = $this->input->post('location_name');

		date_default_timezone_set("Asia/Calcutta");
	   $date = date('Y-m-d');	

		$qry1 = "SELECT * FROM address WHERE address_user_id='$user_id'";
	    $res1 = $this->Android_service->excute_qry_row($qry1);

	     if(!empty($res1))
	     {
	     	if ($res1->address_type == "other") {
	     	 $data1= array('address_user_id' =>$user_id ,'address_name' =>$name ,
         	'address_addr'=>$address,'address_city'=>$city,'address_pincode' =>$pincode ,
         	'address_type'=>'home','address_nearest_location'=>$location_name,'address_lat'=>$latitude,'address_long'=>$longitude);
	     	}
	     	else
	     	{
	     		$data1= array('address_user_id' =>$user_id ,'address_name' =>$name ,
         	'address_addr'=>$address,'address_city'=>$city,'address_pincode' =>$pincode ,
         	'address_type'=>'other','address_nearest_location'=>$location_name,'address_lat'=>$latitude,'address_long'=>$longitude);
	     	}
	     	
	     }
	     else
	     {
	     	 $data1= array('address_user_id' =>$user_id ,'address_name' =>$name ,
         	'address_addr'=>$address,'address_city'=>$city,'address_pincode' =>$pincode ,
         	'address_type'=>'home','address_nearest_location'=>$location_name,'address_lat'=>$latitude,'address_long'=>$longitude);
	     }
 
       
										
		$res = $this->Android_service->address_insert($data1);

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


	public function update_address() {
		
		$id = $this->input->post('address_id');
		$user_id = $this->input->post('user_id');
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$city = $this->input->post('city');
		$pincode = $this->input->post('pincode');

		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');
		$location_name = $this->input->post('location_name');



             $data1= array('address_user_id' =>$user_id ,'address_name' =>$name ,
         	'address_addr'=>$address,'address_city'=>$city,'address_pincode' =>$pincode ,
         	'address_nearest_location'=>$location_name,'address_lat'=>$latitude,'address_long'=>$longitude);
		$res = $this->Android_service->address_update($id,$data1);

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




	public function submit_order() {
		
		$user_id = $this->input->post('user_id');
		$address_id = $this->input->post('address_id');
		$storeid = $this->input->post('store_id');

		$append_qry = $this->query_store_create($storeid);
	

		date_default_timezone_set("Asia/Calcutta");
	    $date = date('Y-m-d');	
		$time = date("H:i:s");
	
	    $res1 = $this->Android_service->get_agents($user_id,$append_qry);

	     $qry11 = "SELECT * FROM address WHERE address_id ='$address_id'";
	     $res11 = $this->Android_service->excute_qry_row($qry11);
	                
	                $lats =  $res11->address_lat; 
		            $lons =  $res11->address_long;
				   	$earthRadius = 6371000;
				   	$radius = 10000;//km

	    foreach ($res1 as $key => $result1) {

       $this->load->library('randomgenerate');
       $orderno = $this->randomgenerate->random_string(8,"ORD");

       $store_agent = $result1->prod_agent_id;

       $res2 = $this->Android_service->checkout_cart($user_id,$store_agent,$append_qry);
         

          foreach ($res2 as $key => $result) {

          
              $commission =   $result->cart_quantity * ($result->prod_disc_price - $result->prod_sell_price);

             $store_price =  $result->cart_quantity * ($result->prod_sell_price + $result->prod_tax);

 //delivery_charge

     $qry12 = "SELECT * FROM store WHERE store_id = '$result->prod_store_id'";
	  $res12 = $this->Android_service->excute_qry_row($qry12);
     $distance = $this->distance($lats,$lons,$res12->store_lat,$res12->store_lon,"K");
    $totalkm = round($distance,0,PHP_ROUND_HALF_UP);
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
		$totalkmcharge = $totalkmcharge/2;

	 	
		   

	      $data1= array('dc_user_id' =>$user_id ,'dc_cart_id' =>$result->cart_id ,
         	'dc_agent_id'=>$result->prod_agent_id,'dc_address_id'=>$address_id,'dc_time' =>$time,
         	'dc_date'=>$date,'dc_status'=>'0','order_status'=>'0','dc_order_id'=>$orderno,
         	'dc_prod_commoffer'=>$result->prod_disc_price,'dc_prod_tax'=>$result->prod_tax,'dc_prod_actualcommission'=>$commission,'dc_prod_actualstoreprice'=>$store_price,'dc_prod_name'=>$result->prod_name,'dc_prod_measure'=>$result->prod_uom,'dc_prod_quantity'=>$result->cart_quantity,'dc_prod_image'=>$result->prod_image,'dc_delivery_distance'=>$totalkm,'dc_deliveryboy_charge'=>$totalkmcharge,'dc_deliveryowner_charge'=>$totalkmcharge);
	    
	        $res = $this->Android_service->submit_order($data1);

	      }

	    }

	     if($res == 1)
		   {		

          $qry = "UPDATE cart LEFT JOIN product  ON cart.cart_product_id = product.prod_id SET cart_ordr_status = '1' WHERE cart_user_id='$user_id' AND $append_qry";

			$res = $this->Android_service->excute_qry_update($qry);
		
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


	     

//firebase
	$qry_firebase = "SELECT * FROM firebase_user LEFT JOIN user  ON user.user_id = firebase_user.firebase_user_id where user_id ='$user_id'";
           $this->load->model('Android_service');
            $res1 = $this->Android_service->excute_qry($qry_firebase);
         
            $user_id = "";
            $user_name = "";
             
           foreach ($res1 as $key => $result) {
          
           $user_id = $result->firebase_user_id;
           $user_name = $result->user_displayname;

           }

            $message = "Dear ".$user_name.", Your purchase was success, Thank you for shopping with us!";

       date_default_timezone_set("Asia/Calcutta");
	   $date = date('Y-m-d');

           $data1= array('notification_user_id' =>$user_id ,'notification_order_id' =>"null",'notification_title'=>"Order Success",'notification_content'=>$message,'notification_date'=>$date,'notification_status'=>'0' );

           $this->load->model('Android_service');
		   $res2 = $this->Android_service->common_insert('notification',$data1);	
		 
				
	} 


		public function address_check() {
		
		$id = $this->input->post('address_id');
		$store_id = $this->input->post('store_id');
		$user_id = $this->input->post('user_id');

		$qry1 = "SELECT * FROM address WHERE address_id ='$id'";
	    $res1 = $this->Android_service->excute_qry_row($qry1);


					$lats =  $res1->address_lat; 
			        $lons =  $res1->address_long;
				 	$earthRadius = 6371000;
				 	$radius = 10000;//km
				 	$results = $this->Android_service->display('store');
				 	$n_rows = count($results);
				 	$placename = '';
				 	$storeid = '' ;
					for($i=0; $i<$n_rows; $i++) {
						if($this->distance($lats,$lons,$results[$i]->store_lat,$results[$i]->store_lon,"K") < $radius){
							$placename = $placename . $results[$i]->store_name . ",";
							$storeid = $storeid . $results[$i]->store_id . ",";


						}
					}

	//echo $storeid;

   // die();

	$append_qry = $this->query_store_create($store_id);

	
	$qry = "SELECT * FROM cart LEFT JOIN product  ON cart.cart_product_id = product.prod_id LEFT JOIN store  ON store.store_id = product.prod_store_id LEFT JOIN brand  ON brand.brand_id = product.prod_brand_id ";

    $sel_qry = $qry." WHERE cart_user_id ='$user_id' AND prod_deactive = '0' AND cart_ordr_status = '0' AND ".$append_qry."";


	$res = $this->Android_service->excute_qry($sel_qry);

    $check = "";

    foreach ($res as $key => $result) {
       

		if (strpos($storeid, $result->prod_store_id) !== false) {
		    $check = "true";
		}
		else
		{
			$check = "false";
			break;
		}
 

    }

	     if(!empty($res))
		   {		
		
			 		$categoryarray = array(
			 			"error" => false,
			 			"check" => $check
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
	     $res = $this->Android_service->excute_qry($qry);
		

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
	     $res2 = $this->Android_service->excute_qry_row($qry2);

        

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

				$res = $this->Android_service->user_update($user_id,$data1);
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
			     $res1 = $this->Android_service->excute_qry_row($qry1);
		         $password = $this->encryption->decrypt($res1->user_pwd);
			    
				     if($password == $old_password)
				     {
				     	
		                 if($new_password == $confirm_password)
		                 {
		                 	$save_password = $this->encryption->encrypt($new_password);

							$data1= array('user_name' =>$user_email ,'user_displayname' =>$user_name ,
							         	'user_phone'=>$mob_numb,'user_pwd'=>$save_password);

							$res = $this->Android_service->user_update($user_id,$data1);
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



	public function order_history() {
		
		$user_id = $this->input->post('user_id');

      $sel_qry = "SELECT * FROM deliverycharge LEFT JOIN cart  ON deliverycharge.dc_cart_id = cart.cart_id WHERE dc_user_id ='$user_id'";


	     $res = $this->Android_service->excute_qry($sel_qry);

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


public function search_list() {
		
		
		$storeid =  $this->input->post('store_id');
		$append_qry = $this->query_store_create($storeid);


        $qry = "SELECT DISTINCT prod_name FROM product LEFT JOIN store  ON store.store_id = product.prod_store_id";

		 $cat_qry = "GROUP By product.prod_id ORDER BY prod_deactive ASC,prod_priority ASC";

		$sel_qry = $qry."  WHERE prod_admin_approved ='1' AND".$append_qry.$cat_qry."";
		
	     $res = $this->Android_service->excute_qry($sel_qry);

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


        public function get_slider() {
		

		$qry = "SELECT * FROM banner_slider LEFT JOIN subcategory ON banner_slider.banner_slider_subcategory = subcategory.sub_id LEFT JOIN brand ON banner_slider.banner_slider_brand = brand.brand_id WHERE banner_slider_status ='1' AND banner_slider_choose = '1'";

	     $res = $this->Android_service->excute_qry($qry);
          

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


	  public function get_banner() {
		

		$qry = "SELECT * FROM banner_slider LEFT JOIN subcategory ON banner_slider.banner_slider_subcategory = subcategory.sub_id LEFT JOIN brand ON banner_slider.banner_slider_brand = brand.brand_id WHERE banner_slider_status ='1' AND banner_slider_choose = '0'";

	     $res = $this->Android_service->excute_qry($qry);
          

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



	public function logout() {
		
		$user_id = $this->input->post('user_id');
		$firebase_reg_id = $this->input->post('firebase_reg_id');

		$categoryarray = array();
	
		 $qry1 = "SELECT * FROM firebase_user WHERE firebase_user_id='$user_id' AND firebase_reg_id='$firebase_reg_id'";

	     $res1 = $this->Android_service->excute_qry_row($qry1);

	     if(!empty($res1))
	     {
	     	 $id = $res1->id;
	     }
	     else
	     {
	     	$id = "";
	     }

		$this->load->model('Android_service');
	    $res = $this->Android_service->firebase_delete($id);

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
	





	public function get_notification() {
		
		$user_id = $this->input->post('user_id');

      $sel_qry = "SELECT * FROM notification WHERE notification_user_id ='$user_id'";


	  $res = $this->Android_service->excute_qry($sel_qry);

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






}

?>

