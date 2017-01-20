<link href="<?php echo base_url('assets/datatables')?>/jquery.dataTables.min.css" rel="stylesheet">
 <?php if($this->session->flashdata('message') !== null){
 	echo $this->session->flashdata('message');
 }
 ?>
 <div class="box">
	<div class="box-body">
		<div class="panel panel-primary">
			<div class="panel-heading">	
				<h4>inbox</h4>
			</div>
			<div class="panel-body">
					<table id="table" class="table table-bordered table-hover">
						<thead>    
							<tr>
						        <th>ID</th>
						        <th>SenderNumber</th>
						        <th>TextDecoded</th>
						        <th>ReceivingDateTime</th>
						        <th>RecipientID</th>
						        <th>Processed</th>
						        <th></th>
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


<div class="modal fade" id="modal-inbox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <!-- <h4 class="modal-title" id="myModalLabel">Delete Users</h4> -->
      </div>
      <div class="modal-body">
	        <form class="form-horizontal" action="<?php echo base_url('administrator/addUsers')?>" method="POST">
		      <div class="box-body">
		        <div class="form-group">
					<div class="col-sm-2">
			        	<strong><p>Pengirim </p></strong>
			        </div>
			        <div class="col-sm-10" id="sender">
			        </div>
			    </div>
		        <div class="form-group">
					<div class="col-sm-2">
			        	<strong><p>Pesan </p></strong>
			        </div>
			        <div class="col-sm-10" id="isi">
			        </div>
			    </div>
			    <div class="form-group">
					<div class="col-sm-2">
			        	<strong><p>Status </p></strong>
			        </div>
			        <div class="col-sm-10" id="status">
			        </div>
			    </div>
		      </div><!-- /.box-body -->
		    </form>
        </table>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
		
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js')?>"></script>

<script type="text/javascript">
	function view(id){
		 $.get("<?php echo base_url('inbox/isi')?>/"+id,{},function(res){
		 	if (res[0].SenderNumber !== null) {
	            $("#sender").html('<strong><p>'+res[0].SenderNumber+'</p></strong>');
	            $("#isi").html('<p>'+res[0].TextDecoded+'</p>');
	            $("#status").html('<p>'+res[0].Processed+'</p>');
	        }
	    },'json').done(function(){
	         $('#modal-inbox').modal('show'); return false;}).fail(function(){ alert( "error" ); });}
</script>

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
            "url": "<?php echo site_url('inbox/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": true, //set not orderable
        },
        ],
 
    });
 
});
</script>