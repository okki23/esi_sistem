<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buah extends Parent_Model { 
   
      var $nama_tabel = 'buah';
      var $daftar_field = array('id','name','id_cat_buah','createby','createdate','lastby','lastupdate');
      var $primary_key = 'id';

	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_buah(){
       $sql = "select a.*,b.name as kriteria from buah a
       left join m_kriteria_buah b on b.id = a.id_cat_buah";   
		   $getdata = $this->db->query($sql)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $no;
                $sub_array[] = $row->kriteria;   
		    $sub_array[] = $row->name;   
                     
         
			    $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a> 
								&nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>';  
               
                $data[] = $sub_array;  
                 $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }

    public function fetch_buahx(){
      $sql = "select a.*,b.name as kriteria from buah a
      left join m_kriteria_buah b on b.id = a.id_cat_buah";   
              $getdata = $this->db->query($sql)->result();
              $data = array();  
              $no = 1;
          foreach($getdata as $row)  
          {  
               $sub_array = array();   
               $sub_array[] = $row->kriteria;   
               $sub_array[] = $row->name;  
               $sub_array[] = $row->id;   
               $data[] = $sub_array;  
                $no++;
          }  
         
              return $output = array("data"=>$data);
               
   }

    public function fetch_kriteria_buah(){   
       $getdata = $this->db->get('m_kriteria_buah')->result();
       $data = array();  
       $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $no;
                $sub_array[] = $row->name;   
                $sub_array[] = $row->id;   
                
                $data[] = $sub_array;  
                 $no++;
           }  
          
       return $output = array("data"=>$data);
        
    }

  
  
	 
 
}
