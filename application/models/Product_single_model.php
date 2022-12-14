<?php 
class Product_single_model extends CI_Model 
{
   function getsproductdetails($product_id)
   {
     $squery ="SELECT * FROM product LEFT JOIN category ON product.prod_cat_id=category.cat_id LEFT JOIN subcategory ON product.prod_sub_cat_id = subcategory.sub_id LEFT JOIN brand ON product.prod_brand_id = brand.brand_id WHERE prod_id ='$product_id' AND prod_priority = 0 AND prod_admin_approved = 1";

     $query = $this->db->query($squery);
     return $query->row();
   }

   function getreltprodcts($prod_cat,$prod_id)
   {
   	  $squery ="SELECT * FROM product LEFT JOIN category ON product.prod_cat_id=category.cat_id LEFT JOIN subcategory ON product.prod_sub_cat_id = subcategory.sub_id LEFT JOIN brand ON product.prod_brand_id = brand.brand_id WHERE prod_cat_id ='$prod_cat' AND prod_id != '$prod_id' AND prod_priority = 0 AND prod_admin_approved = 1 limit 20";

     $query = $this->db->query($squery);
     return $query->result();
   }
}	