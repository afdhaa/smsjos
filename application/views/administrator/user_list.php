<link href="<?php echo base_url('assets/datatables')?>/jquery.dataTables.min.css" rel="stylesheet">
 <?php if($this->session->flashdata('message') !== null){
 	echo $this->session->flashdata('message');
 }
 ?>
 <div class="box box-info">
	<div class="box-header">
		<h3 class="box-title">Users Data</h3>
	</div><!-- /.box-header -->
	<div class="box-body">
		<div class="panel panel-primary">
			<div class="panel-heading">	
				<button class="btn btn-success btn-flat" data-toggle="modal" data-target="#modal-add-users">Tambah User</button>
			</div>
			<div class="panel-body">
				<table id="table" class="table table-bordered table-hovered table-striped">
					<thead>    
						<tr>
					        <th>No</th>
					        <th>Username</th>
					        <th>Role</th>
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


<div class="modal fade" id="modal-add-users" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?php echo base_url('administrator/addUsers')?>" method="POST">
	      <div class="box-body">
	        <div class="form-group">
	          <label for="usernameInput" class="col-sm-2 control-label">Username</label>
	          <div class="col-sm-10">
	            <input type="text" name="username" class="form-control" id="usernameInput" placeholder="Username">
	          </div>
	        </div>
	        <div class="form-group">
	          <label for="passwordInput" class="col-sm-2 control-label">Password</label>
	          <div class="col-sm-10">
	            <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Password">
	          </div>
	        </div>
	        <div class="form-group">
	          <label for="roleInput" class="col-sm-2 control-label">Role</label>
	          <div class="col-sm-10">
	            <select class="form-control" name="role">
	                <option>Select Role</option>
	                <option value="1">Super Admin</option>
	                <option value="2">Admin Partai</option>
	            </select>
	          </div>
	        </div>
	      </div><!-- /.box-body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-delete-users" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <!-- <h4 class="modal-title" id="myModalLabel">Delete Users</h4> -->
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?php echo base_url('administrator/deleteUsers')?>" method="POST">
	      <div class="box-body">
	        <h3>Yakin menghapus user ini?</h3>
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

<div class="modal fade" id="modal-edit-users" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit Users</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="<?php echo base_url('administrator/editUsers')?>" method="POST">
	      <div class="box-body">
	        <div class="form-group">
	          <label for="usernameInput" class="col-sm-2 control-label">Username</label>
	          <div class="col-sm-10">
	            <input type="text" name="username" class="form-control" id="usernameInput" placeholder="Username">
	          </div>
	        </div>
	        <div class="form-group">
	          <label for="passwordInput" class="col-sm-2 control-label">Password</label>
	          <div class="col-sm-10">
	            <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Password">
	          </div>
	        </div>
	        <div class="form-group">
	          <label for="roleInput" class="col-sm-2 control-label">Role</label>
	          <div class="col-sm-10">
	            <select class="form-control" name="role">
	                <option>Select Role</option>
	                <option value="1">Super Admin</option>
	                <option value="2">Admin Partai</option>
	            </select>
	          </div>
	        </div>
	      </div><!-- /.box-body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
      </div>
    </div>
  </div>
</div>
		
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js')?>"></script>

<script type="text/javascript"> 
function del(id){
	$( '#deleted' ).html('<input type="hidden" value="'+id+'" name="id"/>');
}


var table;
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('administrator/ajax_list')?>",
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