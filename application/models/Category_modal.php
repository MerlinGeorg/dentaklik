<?php 
class Category_modal extends CI_Model 
{
	function category_insert($data1)
	{
		
		$count = $this->db->insert('category',$data1);
		if($count>0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	function category_update($id,$data1)
	{
		$this->db->where ('cat_id',$id); 
		if($count = $this->db->update('category',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
	function category_sub_update($id,$subid)
	{
		$this->db->where ('cat_id',$id); 
		$data1 = array('cat_sub_id' =>$subid);
		if($count = $this->db->update('category',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
	function category_sub_updatedelete($subid)
	{
		$this->db->where ('cat_sub_id',$subid); 
		$data1 = array('cat_sub_id' =>'');
		if($count = $this->db->update('category',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}
	function editcategory($id,$table)
	{
		$this->db->where('cat_id',$id);  
		$query = $this->db->get($table);  
		return $query->row(); 	
	}
	function displaysubcategory($id,$table)
	{
		$this->db->where('cat_sub_id',$id);  
		$query = $this->db->get($table);  
		return $query; 	
	}
	
	function subcategorydisplay($id)
	{
		$this->db->where('sub_cat_id');  
		$query = $this->db->get('subcategory');  
		return $query; 	
	}
    function display($a)
	{

        $this->load->database();
		$query = $this->db->get($a);  
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


 function delete_category($id)
 {	
	$this->db->where('cat_id', $id);
	
	if($count = $this->db->delete('category'))
		{
			return true;

		}

		else
		{
			return false;
		}
 }

 function priority($id,$status)
	{
		
		$this->db->where ('cat_id',$id); 
		if($status == '1'){
			$data1 = array('cat_priority' => 0);
		}else{
			$data1 = array('cat_priority' => 1);
		}
		
		if($count = $this->db->update('category',$data1))
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