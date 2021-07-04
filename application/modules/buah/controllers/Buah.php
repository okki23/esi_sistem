<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 

class buah extends Parent_Controller {
  

  var $nama_tabel = 'buah';
  var $daftar_field = array('id','name','id_cat_buah','createby','createdate','lastby','lastupdate');
  var $primary_key = 'id';
 
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_buah');
 		$this->load->model('kriteria_buah/m_kriteria_buah'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}

  
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'buah/buah_view';
		$this->load->view('template_view',$data);		
   
	}
 
  	public function fetch_buah(){  
       $getdata = $this->m_buah->fetch_buah();
       echo json_encode($getdata);   
  	}  

	public function fetch_buahx(){  
		$getdata = $this->m_buah->fetch_buahx();
		echo json_encode($getdata);   
	}  

  	public function fetch_cat_buah(){  
       $getdata = $this->m_buah->fetch_kriteria_buah();
       echo json_encode($getdata);   
  	} 
	
   
	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$sql = "select a.*,b.name as kriteria, b.id as id_cat_buah from buah a
		left join m_kriteria_buah b on b.id = a.id_cat_buah where a.id = '".$id."' "; 
		$get = $this->db->query($sql)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);   
		 
    	$sqlhapus = $this->m_buah->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){
    
    
    $data_form = $this->m_buah->array_from_post($this->daftar_field);

    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
 

    $simpan_data = $this->m_buah->simpan_data($data_form,$this->nama_tabel,$this->primary_key,$id);
    $simpan_buah = $this->upload_buah();
  
 
	
		if($simpan_data && $simpan_buah){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	}
 
  function upload_buah(){  
    if(isset($_FILES["user_image"])){  
        $extension = explode('.', $_FILES['user_image']['name']);   
        $destination = './upload/' . $_FILES['user_image']['name'];  
        return move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
         
    }  
  }  
       


}
