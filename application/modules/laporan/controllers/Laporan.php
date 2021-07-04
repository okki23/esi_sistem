<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Laporan extends Parent_Controller {

	var $nama_tabel = 'transaksi';
	var $daftar_field =  array('id','notrans','tanggal','divisi','totalbuah','createby','createdate','lastby','lastupdate');
	var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_laporan'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

   
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'laporan/laporan_view';
		$this->load->view('template_view',$data);		
   
	}

   
  	public function fetch_laporan(){  
       $getdata = $this->m_laporan->fetch_laporan();
       echo json_encode($getdata);   
  	}  

	public function fetch_laporan_divisi(){  
		$getdata = $this->m_laporan->fetch_laporan_divisi();
		echo json_encode($getdata);   
	}  
	
   
	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$get = $this->db->where($this->primary_key,$id)->get($this->nama_tabel)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);  
    
    	$sqlhapus = $this->m_laporan->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	
   
	public function simpan_data(){
      
   	$data_form = $this->m_laporan->array_from_post($this->daftar_field);
    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
	$simpan_data = $this->m_laporan->simpan_data_master($data_form,$this->nama_tabel,$this->primary_key,$id);
	 
  
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
	 
  function upload_foto(){  
    if(isset($_FILES["user_image"])){  
        $extension = explode('.', $_FILES['user_image']['name']);   
        $destination = './upload/' . $_FILES['user_image']['name'];  
        return move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
         
    }  
  }  
       


}
