<?php 
class Brand_modal extends CI_Model 
{

function brand_insert($data1)
{
	$query = $this->db->insert('brand',$data1);

	return $query;
}

function getbrand()
{
	// $query1 = $this->db->get('brand');
		$selqry = "SELECT * FROM brand ORDER BY brand_status DESC";
		$qry = $this->db->query($selqry);
		return $qry->result();

	return $query1->result();
}

function editbrand($id,$table)
{
  $this->db->where('brand_id',$id);
  $query2 = $this->db->get($table);
  return $query2->row(); 
}

function brand_update($id,$data1)
{
	$this->db->where ('brand_id',$id); 
		if($count = $this->db->update('brand',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
}

function deletebrand($brid)
{

	$this->db->where('brand_id',$brid);
	$query3 = $this->db->delete('brand');
	return $query3;
}

 function priority($id,$status)
	{
		
		$this->db->where ('brand_id',$id); 
		if($status == '1'){
			$data1 = array('brand_status' => 0);
		}else{
			$data1 = array('brand_status' => 1);
		}
		
		if($count = $this->db->update('brand',$data1))
		{
			return true;

		}

		else
		{
			return false;
		}
	}

}
