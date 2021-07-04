<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_laporan extends Parent_Model { 
   
      var $nama_tabel = 'transaksi';
      var $daftar_field =  array('id','notrans','tanggal','divisi','totalbuah','createby','createdate','lastby','lastupdate');
      var $primary_key = 'id';

  public function __construct(){
        parent::__construct();
        $this->load->database();
  }
  public function fetch_laporan(){   
		$getdata = $this->db->query("select a.*,b.tanggal,c.name as namabuah,d.name as kriteria from transaksi_detail a
            LEFT JOIN transaksi b on b.notrans = a.notrans
            LEFT JOIN buah c on c.id = a.idbuah
            LEFT JOIN m_kriteria_buah d on d.id = c.id_cat_buah GROUP BY id")->result();
		$data = array();  
		$no = 1;
           foreach($getdata as $row)  
           {  
                $sub_array = array();   
                $sub_array[] = $row->tanggal; 
                $sub_array[] = $row->kriteria; 
                $sub_array[] = $row->jumlah;  
                $data[] = $sub_array;  
                 $no++;
           }  
          
		   return $output = array("data"=>$data);
		    
    }
    
    public function fetch_laporan_divisi(){   
      $getdata = $this->db->query("select a.*,b.tanggal,b.divisi,c.name as namabuah,d.name as kriteria from transaksi_detail a
      LEFT JOIN transaksi b on b.notrans = a.notrans
      LEFT JOIN buah c on c.id = a.idbuah
      LEFT JOIN m_kriteria_buah d on d.id = c.id_cat_buah GROUP BY id")->result();
      $data = array();  
      $no = 1;
     foreach($getdata as $row)  
     {  
          $sub_array = array();   
          $sub_array[] = $row->divisi; 
          $sub_array[] = $row->tanggal; 
          $sub_array[] = $row->kriteria; 
          $sub_array[] = $row->jumlah;  
          $data[] = $sub_array;  
           $no++;
     }  
    
         return $output = array("data"=>$data);
          
}
	 
 
}
