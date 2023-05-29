<?php

class UserModel extends CI_Model
 {

	 
	public function loginuser($data)
	{
		$this->db->select('*');
		$this->db->where('re_email',$data['re_email']);
		$this->db->where('re_pswd',$data['re_pswd']);
		
		$this->db->from('re_user');
		$this->db->limit(1);
		
		$query=$this->db->get();
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	public function insert($table,$data)
	{
		$this->db->insert($table,$data);
		//last inserted id
		$insert_id = $this->db->insert_id();

   		return  $insert_id;
   		

	}
	function select($table)
    {
    	$this->db->select('*');
    	$this->db->from($table);
        $query = $this->db->get();
        return $query;
    }

    function select1($table,$con)
    {
        $this->db->where($con);
        $query = $this->db->get($table);
        return $query;
    }
     function select2($table,$con)
    {
        $this->db->where($con);
        $query = $this->db->get($table)->row_array();
        return $query;
    }
    
     function select3($table,$con)
    {
        $this->db->where($con);
        $query = $this->db->get($table);
        return $query->result();
    }
    
      function select4($table,$field,$con)
    {
        $this->db->order_by($field, "desc"); 
         $this->db->where($con);
        $reg=$this->db->get($table);
        $this->db->limit(10);
        return $reg->result();
    }
    
     function selectjoin3($table,$table2,$field,$con,$con2)
    {
        $this->db->order_by($field, "desc"); 
        $this->db->join($table2,$con2);
        $this->db->where($con);
         $this->db->limit(10);
        $reg=$this->db->get($table);
        
        return $reg->result();
    }

    function selectjoin2($table,$table2,$con,$con2)
    {   
        $this->db->order_by('pro_id', "desc"); 
        $this->db->join($table2,$con2);
        $this->db->where($con);
        $reg=$this->db->get($table);
        
        return $reg->result();
    }
    
    function updatedata($table,$data,$cond){	  
   
	    $this->db->where($cond);
		$this->db->update($table,$data);
		//affected row
		$afftectedRows=$this->db->affected_rows();
		return $afftectedRows;
		//echo $this->db->last_query(); exit;	
		
	}
	function selectCity($country='')
    {
    	$this->db->select('*');
    	$this->db->from('re_city');
    	$this->db->where('country_id', $country);
        $query = $this->db->get();
        return $query;
    }
    
    function count($table,$cond)
	{ 		
	    $this->db->where($cond); 	     
        return $this->db->count_all_results($table);
	}
	
}
?>