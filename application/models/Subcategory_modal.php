<?php 
class Subcategory_modal extends CI_Model 
{
	function subcategory_insert($data1)
	{
		
		$count = $this->db->insert('subcategory',$data1);
		if($count>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function subcategory_update($id,$data1)
	{
		$this->db->where ('sub_id',$id); 
		if($count = $this->db->update('subcategory',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
	function editsubcategory($id,$table)
	{
		$this->db->where('sub_id',$id);  
		$query = $this->db->get($table);  
		return $query->row(); 	
	}
	
	function categorymaxid()
	{
		$selqry = 'SELECT max(sub_id) as subcategoryid FROM `subcategory` ';
		$query = $this->db->query($selqry);  
		return $query->row(); 	
	}
	function displaysubcategory()
	{
		$selqry = 'SELECT * FROM `subcategory` LEFT JOIN category ON subcategory.sub_cat_id = category.cat_id GROUP BY subcategory.sub_id';
		$query = $this->db->query($selqry);  
		return $query->result(); 	
	}
	
	
    function display($a)
	{

        $this->load->database();
		$query = $this->db->get($a);  
        return $query->result();   
	}
	function displaysubcategorybyid($id)
	{
		$this->db->where('sub_cat_id',$id);  
		$query = $this->db->get('subcategory');  
        return $query->result();   
	}

 //    function display_selected_id($a)
	// 					{

	// 				 $this->db->select('*'); 
	// 				 $this->db->from('add_driver');
	// 				 $this->db->where('driver_id',$a);
	// 				 $query = $this->db->get();
	// 				 return $query->result();  
	// 					}

	// function edit_driver($data1,$id)
	// {
	// $this->db->where('driver_id',$id);	
	// $count = $this->db->update('add_driver',$data1);
	// if($count>0)
	// {
	// 	return 1;
	// }
	// else
	// {
	// 	return 0;
	// }
	// }


 function delete_subcategory($id)
 {	
	$this->db->where('sub_id', $id);
	
	if($count = $this->db->delete('subcategory'))
		{
			return true;

		}

		else
		{
			return false;
		}
 }


}
?>