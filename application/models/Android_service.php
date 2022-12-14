<?php 
class Android_service extends CI_Model 
{


function display($a)
					{

				        $this->load->database();
						$query = $this->db->get($a);  
				        return $query->result();   
					}

function excute_qry($selqry)
					{

				        $query = $this->db->query ($selqry);
				        return $query->result();   
					}


function excute_qry_row($selqry)
					{

				        $query = $this->db->query ($selqry);
				        return $query->row();   
					}


function common_insert($table,$data1)

				{
					
					$count = $this->db->insert($table,$data1);
					if($count>0)
					{
						return 1;
					}
					else
					{
						return 0;
					}
				}	

	// function display_product($a)
	// 				{

	// 			        $this->load->database();
	// 					$selqry =  "SELECT * FROM `product` WHERE prod_cat_id = '$a' ORDER BY prod_id DESC"; 
	// 			        $query = $this->db->query ( $selqry );
	// 			        return $query->result();  
	// 				}
				


function display_product_sort_discount($a,$b)
					{

				        $this->load->database();
						$selqry =  "SELECT * FROM product LEFT JOIN store  ON store.store_id = product.prod_store_id LEFT JOIN subcategory  ON subcategory.sub_id = product.prod_sub_cat_id LEFT JOIN wishlists ON wishlists.wishlists_prod_id = product.prod_id LEFT JOIN brand  ON brand.brand_id = product.prod_brand_id WHERE prod_cat_id = '$a' AND prod_admin_approved ='1' AND $b GROUP By product.prod_id ORDER BY prod_deactive ASC,prod_disc DESC "; 
				        $query = $this->db->query ( $selqry );
				        return $query->result();  
					}

function display_product_sort_popularity($a,$b)
					{

				        $this->load->database();
						 $selqry =  "SELECT * FROM product LEFT JOIN store  ON store.store_id = product.prod_store_id LEFT JOIN subcategory  ON subcategory.sub_id = product.prod_sub_cat_id LEFT JOIN wishlists ON wishlists.wishlists_prod_id = product.prod_id LEFT JOIN brand  ON brand.brand_id = product.prod_brand_id WHERE prod_cat_id = '$a' AND prod_admin_approved ='1' AND $b GROUP By product.prod_id ORDER BY prod_deactive ASC,prod_priority ASC"; 
						
				        $query = $this->db->query ( $selqry );
				        return $query->result();  

				    }

function display_product_sort_price_desc($a,$b)
					{

				        $this->load->database();
						$selqry =  "SELECT * FROM product LEFT JOIN store  ON store.store_id = product.prod_store_id LEFT JOIN subcategory  ON subcategory.sub_id = product.prod_sub_cat_id LEFT JOIN wishlists ON wishlists.wishlists_prod_id = product.prod_id LEFT JOIN brand  ON brand.brand_id = product.prod_brand_id WHERE prod_cat_id = '$a' AND prod_admin_approved ='1' AND $b GROUP By product.prod_id ORDER BY prod_deactive ASC,prod_disc_price DESC "; 
				        $query = $this->db->query ( $selqry );
				        return $query->result();  
					}	

function display_product_sort_price_asc($a,$b)
					{

				        $this->load->database();
						$selqry =  "SELECT * FROM product LEFT JOIN store  ON store.store_id = product.prod_store_id LEFT JOIN subcategory  ON subcategory.sub_id = product.prod_sub_cat_id LEFT JOIN wishlists ON wishlists.wishlists_prod_id = product.prod_id LEFT JOIN brand  ON brand.brand_id = product.prod_brand_id  WHERE prod_cat_id = '$a' AND prod_admin_approved ='1' AND $b GROUP By product.prod_id ORDER BY prod_deactive ASC,prod_disc_price ASC "; 
				        $query = $this->db->query ( $selqry );
				        return $query->result();  
					}


//search product



function display_search_product_sort_discount($a,$b)
					{

				        $this->load->database();
						$selqry =  "SELECT * FROM product LEFT JOIN store  ON store.store_id = product.prod_store_id LEFT JOIN subcategory  ON subcategory.sub_id = product.prod_sub_cat_id LEFT JOIN wishlists ON wishlists.wishlists_prod_id = product.prod_id LEFT JOIN brand  ON brand.brand_id = product.prod_brand_id WHERE  prod_name LIKE '%$a%' AND prod_admin_approved ='1' AND $b GROUP By product.prod_id ORDER BY prod_deactive ASC,prod_disc DESC "; 
				        $query = $this->db->query ( $selqry );
				        return $query->result();  
					}

function display_search_product_sort_popularity($a,$b)
					{

				        $this->load->database();
						 $selqry =  "SELECT * FROM product LEFT JOIN store  ON store.store_id = product.prod_store_id LEFT JOIN subcategory  ON subcategory.sub_id = product.prod_sub_cat_id LEFT JOIN wishlists ON wishlists.wishlists_prod_id = product.prod_id LEFT JOIN brand  ON brand.brand_id = product.prod_brand_id WHERE  prod_name LIKE '%$a%' AND prod_admin_approved ='1' AND $b GROUP By product.prod_id ORDER BY prod_deactive ASC,prod_priority ASC"; 
						
				        $query = $this->db->query ( $selqry );
				        return $query->result();  

				    }

function display_search_product_sort_price_desc($a,$b)
					{

				        $this->load->database();
						$selqry =  "SELECT * FROM product LEFT JOIN store  ON store.store_id = product.prod_store_id LEFT JOIN subcategory  ON subcategory.sub_id = product.prod_sub_cat_id LEFT JOIN wishlists ON wishlists.wishlists_prod_id = product.prod_id LEFT JOIN brand  ON brand.brand_id = product.prod_brand_id WHERE  prod_name LIKE '%$a%' AND prod_admin_approved ='1' AND $b GROUP By product.prod_id ORDER BY prod_deactive ASC,prod_disc_price DESC "; 
				        $query = $this->db->query ( $selqry );
				        return $query->result();  
					}	

function display_search_product_sort_price_asc($a,$b)
					{

				        $this->load->database();
						$selqry =  "SELECT * FROM product LEFT JOIN store  ON store.store_id = product.prod_store_id LEFT JOIN subcategory  ON subcategory.sub_id = product.prod_sub_cat_id LEFT JOIN wishlists ON wishlists.wishlists_prod_id = product.prod_id LEFT JOIN brand  ON brand.brand_id = product.prod_brand_id  WHERE  prod_name LIKE '%$a%' AND prod_admin_approved ='1' AND $b GROUP By product.prod_id ORDER BY prod_deactive ASC,prod_disc_price ASC "; 
				        $query = $this->db->query ( $selqry );
				        return $query->result();  
					}













function display_subcategory($a,$b)
					{

				        $this->load->database();
						$selqry =  "SELECT * FROM product LEFT JOIN subcategory  ON subcategory.sub_id = product.prod_sub_cat_id WHERE prod_cat_id = '$a' AND $b GROUP BY prod_sub_cat_id "; 
				        $query = $this->db->query ( $selqry );
				        return $query->result();  
					}

function display_brand($a,$b)
					{

				        $this->load->database();
						$selqry =  "SELECT * FROM product LEFT JOIN brand  ON brand.brand_id = product.prod_brand_id WHERE prod_cat_id = '$a' AND $b GROUP BY prod_brand_id "; 
				        $query = $this->db->query ( $selqry );
				        return $query->result();  
					}	

function display_single_product($a)
					{

				        $this->load->database();
						 $selqry =  "SELECT * FROM product LEFT JOIN store  ON store.store_id = product.prod_store_id LEFT JOIN brand  ON brand.brand_id = product.prod_brand_id LEFT JOIN wishlists ON wishlists.wishlists_prod_id = product.prod_id WHERE prod_id = '$a'";
				        $query = $this->db->query ( $selqry );
				        return $query->result();  
                    }	



			 function user_insert($data1)
				{
					
					$count = $this->db->insert('user',$data1);
					if($count>0)
					{
						return 1;
					}
					else
					{
						return 0;
					}
				}	

				 function wish_list_insert($data1)
				{
					
					$count = $this->db->insert('wishlists',$data1);
					if($count>0)
					{
						return 1;
					}
					else
					{
						return 0;
					}
				}	



			    function wish_list_delete($id)
				{
					
					$this->db->where('wishlists_id',$id);
					$count = $this->db->delete('wishlists');
					if($count>0)
					{
						return 1;
					}
					else
					{
						return 0;
					}
				}	



				 function cart_insert($data1)
				{
					
					$count = $this->db->insert('cart',$data1);
					if($count>0)
					{
						return 1;
					}
					else
					{
						return 0;
					}
				}

				 function cart_delete($id)
				{
					
					$this->db->where('cart_id',$id);
					$count = $this->db->delete('cart');
					if($count>0)
					{
						return 1;
					}
					else
					{
						return 0;
					}
				}	


					function excute_qry_update($selqry)
					{

				       $count = $query = $this->db->query ($selqry);
				       if($count>0)
					{
						return 1;
					}
					else
					{
						return 0;
					}
				          
					}


				function address_delete($id)
				{
					
					$this->db->where('address_id',$id);
					$count = $this->db->delete('address');
					if($count>0)
					{
						return 1;
					}
					else
					{
						return 0;
					}
				}	


				 function address_insert($data1)
				{
					
					$count = $this->db->insert('address',$data1);
					if($count>0)
					{
						return 1;
					}
					else
					{
						return 0;
					}
				}


				function address_update($id,$data1)
				{
					
					$this->db->where('address_id',$id);
					$count = $this->db->update('address',$data1);
					if($count>0)
					{
						return 1;
					}
					else
					{
						return 0;
					}
				}	


				function get_agents($a,$b)
					{

				        $this->load->database();
					$selqry =  "SELECT DISTINCT(prod_agent_id) FROM cart LEFT JOIN product  ON cart.cart_product_id = product.prod_id where cart_user_id = '$a' AND prod_deactive = '0' AND $b";
				        $query = $this->db->query ( $selqry );
				        return $query->result();  
                    }	

                    function checkout_cart($a,$store_agent,$b)
					{

				        $this->load->database();
						$selqry =  "SELECT * FROM cart LEFT JOIN product  ON cart.cart_product_id = product.prod_id  where cart_user_id = '$a' AND prod_deactive = '0' AND prod_agent_id = '$store_agent' AND $b";
				        $query = $this->db->query ( $selqry );
				        return $query->result();  
                    }	


                    function submit_order($data1)
				{
					
					$count = $this->db->insert('deliverycharge',$data1);
					if($count>0)
					{
						return 1;
					}
					else
					{
						return 0;
					}
				}


				function user_update($id,$data1)
				{
					
					$this->db->where('user_id',$id);
					$count = $this->db->update('user',$data1);
					if($count>0)
					{
						return 1;
					}
					else
					{
						return 0;
					}
				}	


 function firebase_delete($id)
				{
					
					$this->db->where('id',$id);
					$count = $this->db->delete('firebase_user');
					if($count>0)
					{
						return 1;
					}
					else
					{
						return 0;
					}
				}	

}
	