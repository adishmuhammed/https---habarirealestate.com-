<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		//$this->load->helper(array('form', 'url'));
		
	}

	function login($name, $password)
 	{
	   $this->db->select('*');
	   $this->db->from('aq_admin');
	   $this->db->where('email = ' . "'" . $name . "'");
	   $this->db->where('password = ' . "'" . $password . "'");
	   $this->db->where('ad_isactive = ' . "'" . 1 . "'");
	   $this->db->limit(1);
	   $query1 = $this->db->get();

	   if($query1 -> num_rows() == 1)
	   {
			 return $query1->result();
	   }
	   else
	   {
		 return FALSE;
	   }
 	}
 	
 	function csearch($uid,$year)

 	{	
        $this->db->select('*');
        $this->db->from('aa_deposit');
        $this->db->where('u_id = ' . "'" . $uid . "'");
	    $this->db->where('year = ' . "'" . $year . "'");
        $this->db->limit(1);
        $query1 = $this->db->get();

        if($query1 -> num_rows() == 1)
        {
			 return $query1->result();
        }
        else
        {
            return FALSE;
        }
    }
    
	function insert($table,$data)
	{
		$this->db->insert($table,$data);
		$reg=$this->db->insert_id();
		return $reg;
    }
    
	function insertId($table,$data)
	{
		//print_r($data);
		$this->db->insert($table,$data);
		$reg=$this->db->insert_id();
		return $reg;
	}

	function select($table)
	{ 
        $reg=$this->db->get($table);
		return $reg;
	}

	function select1($table,$cond)
	{
        $this->db->where($cond);           
        $reg=$this->db->get($table);
		return $reg = $reg->result_array();
	}
	
	function select2($table,$con,$field)
	{
        $this->db->where($con);
        $this->db->order_by($field, "desc"); 
		$this->db->limit(6);               
        $reg=$this->db->get($table);
		return $reg;
	}
	
	function select3($table,$field)
	{
        $this->db->order_by($field, "desc");                
        $reg=$this->db->get($table);
		return $reg;
	}
	
	function select4($table,$con,$field)
	{

        $this->db->where($con);
        $this->db->order_by('logged_user_id');                
        $reg=$this->db->get($table);
		return $reg;
	}
		
	function select5($table,$cond,$field)
	{
		$this->db->select($field);
        $this->db->where($cond);           
        $reg=$this->db->get($table);
		return $reg;
	}
	
	function select6($table,$cond)
	{
        $this->db->where($cond);           
        $reg=$this->db->get($table);
		return $reg;
	}
	
	function select7($table,$cond)
	{
	    //edit
        $this->db->where($cond);           
        $reg=$this->db->get($table)->row_array();
		return $reg;
	}
	
	function select8($table,$con,$field,$by)
	{
        $this->db->where($con);
        $this->db->order_by($field, $by); 		           
        $reg=$this->db->get($table);
		return $reg = $reg->result_array();
	}

	function select9($table,$con,$val1,$val2)
	{
        $this->db->where($con);
        $this->db->where("default_price BETWEEN $val1 AND $val2");		           
        $reg=$this->db->get($table);
		return $reg = $reg->result_array();
	}

	function select10($table,$con,$val1)
	{
        $this->db->where($con);
        $this->db->where('default_price >=', $val1); 		           
        $reg=$this->db->get($table);
		return $reg = $reg->result_array();
	}
	
	function select11($table,$con,$val1)
	{
        $this->db->where($con);
        $this->db->where('default_price <=', $val1); 		           
        $reg=$this->db->get($table);
		return $reg = $reg->result_array();
	}
	
	function selectjoin($table,$table2,$con)
	{
        $this->db->join($tabel2,$con);
        $reg=$this->db->get($table);
		return $reg;
	}
	
	function selectqry($qry)
	{
		$query = $this->db->query($qry);
		//echo $this->db->last_query();
		return $query;
	}
	
	function updatedata($table,$data,$cond)
	{
        $this->db->where($cond);
		$this->db->update($table,$data);
		$reg=$this->db->affected_rows();
		return $reg;
	}
	
	function updatedata1($table,$con,$qty,$sub,$value1,$value2)
    {
    	$this->db->where($con);
        $this->db->set($qty, $qty.'+' . $value1, FALSE);
        $this->db->set($sub, $sub.'+' . $value2, FALSE);
        $this->db->update($table); 
    	$reg=$this->db->affected_rows();
        return $reg;
    }
    
    function updatedata2($table,$con,$field,$points) //decrease
    {
	    $this->db->where($con);
        $this->db->set($field, $field.'-' . $points, FALSE);
        $this->db->update($table); 
    }

    function updatedata3($table,$con,$field,$points)
    {
    	$this->db->where($con);
        $this->db->set($field, $field.'+' . $points, FALSE);
        $this->db->update($table); 
    }
	
	function count($table,$cond)
	{ 		
	    $this->db->where($cond); 	     
        return $this->db->count_all_results($table);
	}
	
	function count1($table,$con)
	{ 		
		$this->db->where($con);    
        return $this->db->count_all_results($table);
	}
	
	function sum($table,$col,$con)
	{
		/*$this->db->select_sum($col);
		$this->db->where($con);
		$query=$this->db->get($table);*/
		$query = $this->db->query('SELECT sum('.$col.') as carttotal FROM '.$table.' WHERE  '.$con.'');
		return $query;
	}
	
	function delete($table,$cond)
	{
		$this->db->where($cond);
        $this->db->delete($table);
        $query=$this->db->affected_rows();
		return $query;
	}
}