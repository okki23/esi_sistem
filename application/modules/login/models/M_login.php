<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_login extends Parent_Model { 
   

  var $tablename = 'm_user';
  var $fieldname = array('id','username','password','createby','createdate','lastby','lastupdate'); 
  var $primary_key = 'id'; 
	  
	public function __construct(){
                parent::__construct();
                $this->load->database();
	}
 
	public function auth($username,$password){
        $sql = $this->db->get_where($this->tablename,array('username'=>$username,'password'=>$password));
	        return $sql;
	}
 
 
}
