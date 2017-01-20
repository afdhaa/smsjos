<link href="<?php echo base_url('assets/datatables')?>/jquery.dataTables.min.css" rel="stylesheet">
<?php if($this->session->flashdata('message') !== null){
 	echo $this->session->flashdata('message');
 }
 ?>
<div class="box box-info">
    <div class="box-header ">
		<h4>DATA NOMER TELEPON</h4>
	<div class="col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Tambah Data
			</div>
			<div class="panel-body">
				<div>
					<form action="<?php echo base_url('administrator/whitelistadd')?>" method="POST">
					<label class="col-md-12">Nama</label>
					<div class="col-md-12"> 	
						<input type="text" name="nama" class="form-control" placeholder="Nama pemilik">
					</div>
					<label class="col-md-12">No. Telepon</label>
					<div class="col-md-12"> 	
						<!-- <input type="text" name="pertanyaan" class="form-control" placeholder="Isikan pertanyaan"> -->
						
						<input type="text" name="phone" class="form-control" placeholder="Nomor harus menggunakan +62 ">
						<br/>
						<input type="submit" name="submit" value="Simpan" class="btn btn-sm btn-primary btn-flat pull-right">
						</form>
					</div>										
				</div>
				</form>
			</div>			
		</div>
	</div>

	<div class="col-md-8">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Nomer Telepon Terdaftar
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-hovered table-striped" id="table">
					<thead>    
						<tr>
					        <th>No</th>
					        <th>Phone</th>
					        <th>Nama</th>
					        <th>Action</th>
					    </tr>
					</thead>
					<tbody>
					
					</tbody>
				</table>
			</div>			
		</div>
		</div>	
	</div>
</div>



<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <!-- <h4 class="modal-title" id="myModalLabel">Delete Users</h4> -->
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?php echo base_url('administrator/whitelist_delete')?>" method="POST">
	      <div class="box-body">
	        <h3>Yakin ingin menghapus nomor ini?</h3>
	        <div id="deleted"></div>
	      </div><!-- /.box-body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Hapus</button>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-whitelist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <!-- <h4 class="modal-title" id="myModalLabel">Delete Users</h4> -->
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?php echo base_url('administrator/whitelist_update')?>" method="POST">
	      <div class="box-body">
	        <div class="form-group">
				<div class="col-sm-2">
		        	Nomer Telp.
		        </div>
		        <div class="col-sm-10" id="nomor">
		        </div>
		        <div id="id"></div>
		    </div>
	      </div><!-- /.box-body -->
        </table>
      </div>
      <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Simpan</button>
      	</form>
      </div>
    </div>
  </div>
</div>


<script>
	function del(id){
		$( '#deleted' ).html('<input type="hidden" value="'+id+'" name="id"/>');
	}

	function edit(id){
		 $.get("<?php echo base_url('administrator/whitelist')?>/"+id,{},function(res){
		 	if (res[0].id !== null) {
	            $("#nomor").html('<input type="text" name="phone" class="form-control" value="'+res[0].phone+'"></input>');
	            $("#id").html('<input type="hidden" value="'+id+'" name="id"/>');
	        }
	    },'json').done(function(){
	         $('#modal-whitelist').modal('show'); return false;}).fail(function(){ alert( "error" ); });}
</script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js')?>"></script>
<script type="text/javascript">
	
var table;
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('administrator/ajax_whitelist')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
 
});
</script>