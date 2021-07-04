<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi_detail extends Parent_Model { 
   
      var $nama_tabel = 'transaksi_detail';
      var $daftar_field = array('id','notrans','idbuah','jumlah','lastby','lastupdate');
      var $primary_key = 'id';

	  
  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_transaksi_detail(){
       $sql = "select a.*,b.tanggal,b.totalbuah,c.name as namabuah,d.name as kriteria from transaksi_detail a 
       left join transaksi b on b.notrans = a.notrans
       left join buah c on c.id = a.idbuah
       left join m_kriteria_buah d on d.id = c.id_cat_buah";   
		   $getdata = $this->db->query($sql)->result();
		   $data = array();  
		   $no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->notrans;   
                $sub_array[] = $row->namabuah;   
		    $sub_array[] = $row->jumlah;   
                $sub_array[] = $row->kriteria;   
                $sub_array[] = $row->totalbuah;   
                     
         
			    $sub_array[] = '<a href="javascript:void(0)" class="btn btn-warning btn-xs waves-effect" id="edit" onclick="Ubah_Data('.$row->id.');" > <i class="material-icons">create</i> Ubah </a> 
								&nbsp; <a href="javascript:void(0)" id="delete" class="btn btn-danger btn-xs waves-effect" onclick="Hapus_Data('.$row->id.');" > <i class="material-icons">delete</i> Hapus </a>';  
               
                $data[] = $sub_array;  
                 $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }

    public function fetch_kriteria_transaksi_detail(){   
       $getdata = $this->db->get('m_kriteria_transaksi_detail')->result();
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
