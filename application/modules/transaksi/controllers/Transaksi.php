<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Transaksi extends Parent_Controller {

 
  var $nama_tabel = 'transaksi';
  var $daftar_field =  array('id','notrans','tanggal','divisi','totalbuah','createby','createdate','lastby','lastupdate');
  var $primary_key = 'id';
  
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('m_transaksi'); 
		if(!$this->session->userdata('username')){
		   echo "<script language=javascript>
				 alert('Anda tidak berhak mengakses halaman ini!');
				 window.location='" . base_url('login') . "';
				 </script>";
		}
 	}
 
	public function index(){
		$data['judul'] = $this->data['judul']; 
		$data['konten'] = 'transaksi/transaksi_view';
		$this->load->view('template_view',$data);		
   
	}

 
  	public function fetch_transaksi(){  
       $getdata = $this->m_transaksi->fetch_transaksi();
       echo json_encode($getdata);   
  	}  
	
	  public function fetch_transaksix(){  
		$getdata = $this->m_transaksi->fetch_transaksix();
		echo json_encode($getdata);   
	   }  
	
  	 
	public function get_data_edit(){
		$id = $this->uri->segment(3); 
		$get = $this->db->where($this->primary_key,$id)->get($this->nama_tabel)->row();
		echo json_encode($get,TRUE);
	}
	 
	public function hapus_data(){
		$id = $this->uri->segment(3);   

    	$sqlhapus = $this->m_transaksi->hapus_data($id);
		
		if($sqlhapus){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);
	}
	 
	public function simpan_data(){ 
     
   	$data_form = $this->m_transaksi->array_from_post($this->daftar_field);
    $id = isset($data_form['id']) ? $data_form['id'] : NULL; 
	$simpan_data = $this->m_transaksi->simpan_data_master($data_form,$this->nama_tabel,$this->primary_key,$id);
	  
		if($simpan_data){
			$result = array("response"=>array('message'=>'success'));
		}else{
			$result = array("response"=>array('message'=>'failed'));
		}
		
		echo json_encode($result,TRUE);

	} 
   
	public function get_last_id(){
		$params = date('Ymd');
		echo $this->transaksi_id($params); 
	 
	}
	
	public function transaksi_id($param = '') {
        $data = $this->m_transaksi->get_no();
        $lastid = $data->row();
        $idnya = $lastid->id;


        if($idnya == '') { // bila data kosong
            $ID = $param . "0000001";
            //00000001
        }else {
            $MaksID = $idnya;
            $MaksID++;
            if ($MaksID < 10)
                $ID = $param . "000000" . $MaksID;
            else if ($MaksID < 100)
                $ID = $param . "00000" . $MaksID;
            else if ($MaksID < 1000)
                $ID = $param . "0000" . $MaksID;
            else if ($MaksID < 10000)
                $ID = $param . "000" . $MaksID;
            else if ($MaksID < 100000)
                $ID = $param . "00" . $MaksID;
            else if ($MaksID < 1000000)
                $ID = $param . "0" . $MaksID;
            else
                $ID = $MaksID;
        }

        return $ID;
    }  	
   
}
