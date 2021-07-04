<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class Transaksi_detail extends Parent_Controller {
  

  var $nama_tabel = 'transaksi_detail';
  var $daftar_field = array('id','notrans','idbuah','jumlah','lastby','lastupdate');
  var $primary_key = 'id';
 
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_transaksi_detail'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

  
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'transaksi_detail/transaksi_detail_view';
		$this->load->view('template_view',$data);		
   
	}
 
  	public function fetch_transaksi_detail(){  
       $getdata = $this->m_transaksi_detail->fetch_transaksi_detail();
       echo json_encode($getdata);   
  	}  

  	public function fetch_cat_transaksi_detail(){  
       $getdata = $this->m_transaksi_detail->fetch_kriteria_transaksi_detail();
       echo json_encode($getdata);   
  	} 
	
   
	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$sql = "select a.*,b.tanggal,b.totalbuah,c.name as namabuah,d.name as kriteria from transaksi_detail a 
		left join transaksi b on b.notrans = a.notrans
		left join buah c on c.id = a.idbuah
		left join m_kriteria_buah d on d.id = c.id_cat_buah where a.id = '".$id."' "; 
		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);   
		 
    	$sqlhapus = $this->m_transaksi_detail->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
    
    $data_form = $this->m_transaksi_detail->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
 

    $simpan_data = $this->m_transaksi_detail->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
    $simpan_transaksi_detail = $this->upload_transaksi_detail();
  
 
	
		if($simpan_data && $simpan_transaksi_detail){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
 
  function upload_transaksi_detail(){  
    if(isset($_FILES["user_image"])){  
        $extension = explode('.', $_FILES['user_image']['name']);   
        $destination = './upload/' . $_FILES['user_image']['name'];  
        return move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
         
    }  
  }  
       


}
