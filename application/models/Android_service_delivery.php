<?php 
class Android_service_delivery extends CI_Model 
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


function order_update($id,$data1)
				{
					
					$this->db->where('dc_order_id',$id);
					$count = $this->db->update('deliverycharge',$data1);
					if($count>0)
					{
						return 1;
					}
					else
					{
						return 0;
					}
				}

function product_cancel($id,$data1)
				{
					
					$this->db->where('dc_id',$id);
				$count = $this->db->update('deliverycharge',$data1);
					if($count>0)
					{
						return 1;
					}
					else
					{
						return 0;
					}
				}	

function order_cancel($id,$data1)
				{
					
					$this->db->where('dc_order_id',$id);
				$count = $this->db->update('deliverycharge',$data1);
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