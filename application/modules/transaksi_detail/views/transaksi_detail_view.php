    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                 
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Transaksi Detail
                            </h2>
                            <br>
                            <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="material-icons">add_circle</i>  Tambah Data </a>
                        </div>
                        <div class="body">
                                
                            <div class="table-responsive">
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
									<thead> 
										<tr>
											<th style="width:5%;">No Trans</th>
                                            <th style="width:10%;">Nama Buah</th>  
											<th style="width:10%;">Jumlah</th>  
                                            <th style="width:10%;">Kriteria</th>  
                                            <th style="width:10%;">Total Buah</th>  
											<th style="width:10%;">Opsi</th> 
										</tr>
									</thead> 
								</table> 
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>

   
	<!-- form tambah dan ubah data -->
	<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Data</h4>
                        </div>
                        <div class="modal-body">
                              <form method="post" id="user_form" enctype="multipart/form-data">   
                                 <input type="hidden" name="id" id="id"> 
                                <div class="input-group">
                                                <div class="form-line">
                                                    <label for="jumlah">No Transaksi</label>
                                                    <input type="text" name="notrans" id="notrans" class="form-control" required readonly="readonly" >
                                                    <input type="hidden" name="notransx" id="notransx" required>
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="PilihNoTrans();" class="btn btn-primary"> Pilih No Trans.. </button>
                                                </span>
                                </div>
                                <div class="input-group">
                                                <div class="form-line">
                                                    <label for="jumlah">Buah</label>
                                                    <input type="text" name="buah" id="buah" class="form-control" required readonly="readonly" >
                                                    <input type="hidden" name="idbuah" id="idbuah" required>
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="PilihBuah();" class="btn btn-primary"> Pilih Buah </button>
                                                </span>
                                </div>
                                   
								 
									<div class="form-group">
                                        <div class="form-line">
                                            <label for="jumlah">Jumlah</label>
                                            <input type="number" name="jumlah" id="jumlah" class="form-control"/>
                                        </div>
                                    </div>
									 

								   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
							 </form>
					   </div>
                     
                    </div>
                </div>
    </div>


    <!-- modal cari trans -->
    <div class="modal fade" id="PilihTransModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" > Pilih No Transaksi </h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_kategori" >
  
                                    <thead>
                                        <tr> 
                                            <th style="width:5%;">No Trans</th>
                                            <th style="width:95%;">Tanggal</th>
                                            <th style="width:95%;">Divisi</th>
                                            <th style="width:95%;">Total transaksi_detail</th>
                                             
                                        </tr>
                                    </thead> 
                                    <tbody id="daftar_kategorix">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>
    
    <!-- modal cari buah -->
    <div class="modal fade" id="PilihBuahModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" > Pilih Buah </h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_buah" >
  
                                    <thead>
                                        <tr> 
                                        <th style="width:5%;">Kriteria</th>     
                                        <th style="width:5%;">Nama Buah</th>  
                                        </tr>
                                    </thead> 
                                    <tbody id="daftar_buahx">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>
	 
 
   <script type="text/javascript">
	function PilihNoTrans(){
        $("#PilihTransModal").modal({backdrop: 'static', keyboard: false,show:true});
    }
    function PilihBuah(){
        $("#PilihBuahModal").modal({backdrop: 'static', keyboard: false,show:true});
    }
 
    $('#daftar_kategori').DataTable( {
        "ajax": "<?php echo base_url(); ?>transaksi/fetch_transaksi" 
    });
    $('#daftar_buah').DataTable( {
        "ajax": "<?php echo base_url(); ?>buah/fetch_buahx" 
    });

        var daftar_kategori = $('#daftar_kategori').DataTable(); 
        $('#daftar_kategori tbody').on('click', 'tr', function () { 
            var content = daftar_kategori.row(this).data()
            console.log(content);
            $("#notrans").val(content[0]); 
            $("#notransx").val(content[0]); 
            $("#PilihTransModal").modal('hide');
        } );
 
        var daftar_buah = $('#daftar_buah').DataTable(); 
        $('#daftar_buah tbody').on('click', 'tr', function () { 
            var content = daftar_buah.row(this).data()
            console.log(content);
            $("#buah").val(content[1]); 
            $("#idbuah").val(content[2]); 
            $("#PilihBuahModal").modal('hide');
        } );

  
	 function Ubah_Data(id){
		$("#defaultModalLabel").html("Form Ubah Data");
		$("#defaultModal").modal('show');
 
		$.ajax({
			 url:"<?php echo base_url(); ?>transaksi_detail/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
				 $("#defaultModal").modal('show'); 
				 $("#id").val(result.id);
                 $("#notrans").val(result.notrans);
                 $("#jumlah").val(result.jumlah);
                 $("#notransx").val(result.notrans);
                 $("#buah").val(result.namabuah);
                 $("#idbuah").val(result.idbuah);  
			 }
		 });
	 }
 
	 function Bersihkan_Form(){
        $(':input').val('');  
     }

	 function Hapus_Data(id){
		if(confirm('Anda yakin ingin menghapus data ini?'))
        {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo base_url('transaksi_detail/hapus_data')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
			   
               $('#example').DataTable().ajax.reload(); 
			   
			    $.notify("Data berhasil dihapus!", {
					animate: {
						enter: 'animated fadeInRight',
						exit: 'animated fadeOutRight'
					}  
				 },{
					type: 'success'
					});
				 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });
   
    }
	}
     
	function Simpan_Data(){
	 
		 var formData = new FormData($('#user_form')[0]);  
         var kategori = $('#kategori').val(); 
         var id_cat_transaksi_detail = $("#id_cat_transaksi_detail").val();
         var name = $("#name").val();
              
            $.ajax({
             url:"<?php echo base_url(); ?>transaksi_detail/simpan_data",
             type:"POST",
             data:formData,
             contentType:false,  
             processData:false,   
             success:function(result){ 
                
                 $("#defaultModal").modal('hide');
                 $('#example').DataTable().ajax.reload(); 
                 $('#user_form')[0].reset(); 
                 $.notify("Data berhasil disimpan!", {
                    animate: {
                        enter: 'animated fadeInRight',
                        exit: 'animated fadeOutRight'
                 } 
                 } );
             }
            });  

	}
     

	 $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false
     });
      
      
       $(document).ready(function() {
		   
		$("#addmodal").on("click",function(){
			$("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
            $("#method").val('Add');
            $("#defaultModalLabel").html("Form Tambah Data");
		});
		
		$("#addmodalx").on("click",function(){
			$("#defaultModalx").modal({backdrop: 'static', keyboard: false,show:true});
            $("#defaultModalLabel").html("Form Tambah Datax");
		});
		
		$('#example').DataTable( {
			"ajax": "<?php echo base_url(); ?>transaksi_detail/fetch_transaksi_detail", 
		});
	  

		 
	  });
  
		
		 
    </script>