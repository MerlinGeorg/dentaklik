<?php 
class Bannerslider_model extends CI_Model 
{


 function take_brand()
 {
 	$query = $this->db->get('brand');
 	return $query->result();
 }	

 function take_cat()
 {
 	$query1 = $this->db->get('category');
 	return $query1->result();
 }

function take_sub()
 {
 	$query2 = $this->db->get('subcategory');
 	return $query2->result();
 }

 function banslide_insert($data1)
 {
 	$query3 = $this->db->insert('banner_slider',$data1);
 	return $query3;

 }
function banslide_update($baslideid,$data1)
{
  $this->db->where('banner_slider_id',$baslideid);
  $query3 = $this->db->update('banner_slider',$data1);
  return $query3;
}
 function getbanslide()
 {
  $selqry = "SELECT * FROM `banner_slider` LEFT JOIN category ON banner_slider_category = category.cat_id LEFT JOIN subcategory ON banner_slider.banner_slider_subcategory = subcategory.sub_id LEFT JOIN brand ON banner_slider.banner_slider_brand = brand.brand_id GROUP BY banner_slider.banner_slider_id";
 	$query4 = $this->db->query($selqry);
 	return $query4->result();
 }

 function editbanslider($id,$table)
 {
 	$this->db->where('banner_slider_id',$id);
 	$query5 = $this->db->get($table);
 	return $query5->row();
 }
 function getaccording($id){
  $selqry = "SELECT subcategory.sub_id as scat,subcategory.sub_name as sname FROM category INNER JOIN subcategory ON category.cat_id = subcategory.sub_cat_id AND category.cat_id = '$id' AND subcategory.sub_cat_id IS NOT NULL GROUP BY subcategory.sub_id";
  $query = $this->db->query($selqry);
  return $query->result();
 }
 function getaccording2($id){
  $selqry = "SELECT brand.brand_id as brd,brand.brand_name as bname FROM `brand` INNER JOIN product ON brand.brand_id = product.prod_brand_id WHERE product.prod_cat_id = '$id' GROUP BY brand.brand_id";
  $query = $this->db->query($selqry);
  return $query->result();
 }

 function delete_banslider($bsid)
 {
 	$this->db->where('banner_slider_id',$bsid);
 	$query6 = $this->db->delete('banner_slider');
 	return $query6;
 }

  // function set_pro($sts,$id)
  //  {
  //  	if($sts==0)
  //  	{
  //       $prayo = array(

  //       	'priority'=>1
  //       );

  //  		$this->db->where('id',$id);
  //  		$query12 = $this->db->update('banner_slider',$prayo);
  //  		return $query12;
  //  	}
  //  	else
  //  	{
  //      $prayo = array(

  //       	'priority'=>0
  //       );

  //  		$this->db->where('id',$id);
  //  		$query13 = $this->db->update('banner_slider',$prayo);
  //  		return $query13;
  //  	}
  //  }

   function set_pro1($status,$id)
   {
    if($status==0)
    {
        $prayo1 = array(

          'banner_slider_status'=>1
        );

      $this->db->where('banner_slider_id',$id);
      $query14 = $this->db->update('banner_slider',$prayo1);
      return $query14;
    }
    else
    {
       $prayo1 = array(

          'banner_slider_status'=>0
        );

      $this->db->where('banner_slider_id',$id);
      $query14 = $this->db->update('banner_slider',$prayo1);
      return $query14;
   }
 }


}	