<?php 
class Store_model extends CI_Model 
{

function insert_store($data1)
{
	$query = $this->db->insert('store',$data1);

	return $query;
}

function getstore()
{
	$query1 = $this->db->get('store');
	return $query1->result();
}

function editstore($id,$table)
{
	$this->db->where('store_id',$id);
	$query2 = $this->db->get($table);
	return $query2->row();
}


function update_store($strid,$data1)
{
	$this->db->where('store_id',$strid);
	$query3 = $this->db->update('store',$data1);
	return $query3;
}

function delete_store($strid)
{
	$this->db->where('store_id',$strid);
	$query4 = $this->db->delete('store');
	return $query4;
}
function insertpaid_collect($data1){
    $query = $this->db->insert('paid_collect',$data1);
	return $query;
}
function checkpaid_collect($strid,$strmnth,$stryear){
	$selqry = "select * from paid_collect where paid_store_id = '$strid' AND  paid_month = '$strmnth' AND paid_year = '$stryear'";
	$qry = $this->db->query($selqry);
	return $qry;
}
function updatepaid_collect($strid,$strmnth,$stryear,$data1)
{
	$this->db->where('paid_store_id',$strid);
	$this->db->where('paid_month',$strmnth);
	$this->db->where('paid_year',$stryear);
	$query3 = $this->db->update('paid_collect',$data1);
	return $query3;
}

}	