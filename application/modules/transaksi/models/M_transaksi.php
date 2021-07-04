<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_transaksi extends Parent_Model {  

      var $nama_tabel = 'transaksi';
      var $daftar_field =  array('id','notrans','tanggal','divisi','totalbuah','createby','createdate','lastby','lastupdate');
      var $primary_key = 'id';

	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }

  public function get_no(){
      $query = $this->db->query("SELECT SUBSTR(MAX(notrans),-7) AS id  FROM ".$this->nama_tabel." ");
      return $query;
  }
  
  public function fetch_transaksi(){   
		   $getdata = $this->db->get($this->nama_tabel)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->notrans;
                $sub_array[] = $row->tanggal;
                $sub_array[] = $row->divisi;
                $sub_array[] = $row->totalbuah; 
			$sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a> 
                  &nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>';  
               
                $data[] = $sub_array;  
                 $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }

    public function fetch_transaksix(){   
      $getdata = $this->db->get($this->nama_tabel)->result();
      $data = array();  
      $no = 1;
            foreach($getdata as $row){  
                  $sub_array = array();  
                  $sub_array[] = $row->notrans;
                  $sub_array[] = $row->tanggal;
                  $sub_array[] = $row->divisi;
                  $sub_array[] = $row->totalbuah; 
            
                  $data[] = $sub_array;  
                  $no++;
            }  
      
            return $output = array("data"=>$data);
 
      }

  
  
	 
 
}
