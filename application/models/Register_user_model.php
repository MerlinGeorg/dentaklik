<?php 
class Register_user_model extends CI_Model 
{
   
   function getmobcont($mobno)
   {
   	$squery = "SELECT count(*) AS mobsame FROM user WHERE user_phone = '$mobno'";
   	$query = $this->db->query($squery);
   	return $query->row();
   }

   function getmailcount($mailid)
   {
   	$squery = "SELECT count(*) AS mailsame FROM user WHERE user_name = '$mailid'";
   	$query = $this->db->query($squery);
   	return $query->row();
   }

   function insertuser($data1)
   {
      $query = $this->db->insert('user',$data1);
      return $query;
   }

}	