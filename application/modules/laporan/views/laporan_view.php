 
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
                                Laporan
                            </h2>
                            <br>
                       
                        </div>
                        <div class="body">
                            
                            <div class="table-responsive">
                                <label for="label"> Laporan By Date</label>
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="example" >
									<thead>
										<tr> 
											<th style="width:5%;">Tanggal Panen</th>
                                            <th style="width:15%;">Kriteria</th>   
											<th style="width:10%;">Jumlah</th> 
										</tr>
									</thead> 
								</table> 
                            </div>

                            <div class="table-responsive">
                            <label for="label"> Laporan By Divisi</label>
							   <table class="table table-bordered table-striped table-hover js-basic-example" id="examples" >
									<thead>
										<tr> 
										    <th style="width:5%;">Divisi</th>	
                                            <th style="width:5%;">Tanggal Panen</th>
                                            <th style="width:15%;">Kriteria</th>   
											<th style="width:10%;">Jumlah</th> 
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

    
 
   <script type="text/javascript">
	 
        

	 
       $(document).ready(function() {
		  
		
		$('#example').DataTable( {
			"ajax": "<?php echo base_url(); ?>laporan/fetch_laporan" 
		});
	 
        $('#examples').DataTable( {
			"ajax": "<?php echo base_url(); ?>laporan/fetch_laporan_divisi" 
		});
	 
		 
	  });
  
		
		 
    </script>