<?php 
class Shope_products_model extends CI_Model 
{
  function getsubproducts($subcat_id)
  {
  	$squery ="SELECT * FROM product LEFT JOIN category ON product.prod_cat_id=category.cat_id LEFT JOIN subcategory ON product.prod_sub_cat_id = subcategory.sub_id LEFT JOIN brand ON product.prod_brand_id = brand.brand_id WHERE prod_sub_cat_id ='$subcat_id' AND prod_priority = 0 AND prod_admin_approved = 1";

     $query = $this->db->query($squery);
     return $query->result();
  }

  function getthissub($subcat_id)
  {
  	// $this->db->where('sub_id',$subcat_id);
  	// $query = $this->db->get('subcategory');
  	// return $query->row();
    $squery ="SELECT * FROM subcategory LEFT JOIN category ON subcategory.sub_cat_id=category.cat_id WHERE subcategory.sub_id ='$subcat_id'";

     $query = $this->db->query($squery);
     return $query->row();

  }
}	