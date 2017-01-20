<?php if($this->session->flashdata('message') !== null){
 	echo $this->session->flashdata('message');
 }
 ?>
<div class="box box-info">
    <div class="box-header ">
		<h4>DATA PERTANYAAN</h4>
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Tambah pertanyaan					
			</div>
			<div class="panel-body">
				<div>
					<label class="col-md-12">Pertanyaan</label>
					<div class="col-md-12">
						<!-- <input type="text" name="pertanyaan" class="form-control" placeholder="Isikan pertanyaan"> -->
						<form action="<?php echo base_url('administrator/questionsave')?>" method="POST">
							<textarea name="pertanyaan" class="form-control" placeholder="Isikan pertanyaan"></textarea>
							<br/>
							<input type="submit" name="submit" value="Simpan" class="btn btn-sm btn-primary btn-flat pull-right">	
						</form>
					</div>										
				</div>
				</form>
			</div>			
		</div>
	</div>

	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Pertanyaan 
			</div>
			<div class="panel-body">
				<table class="table table-bordered table-hovered table-striped">
					<tr>
						<td>No</td>
						<td>Isi Pertanyaan</td>
						<td>Jawaban</td>
						<td>Opsi</td>
					</tr>
					<?php foreach ($data as $dt){?>
					<tr>
						<td><?php echo $dt['id']?></td>	
						<td><?php echo $dt['pertanyaan']?></td>	
						<td><?php echo str_replace(',', '<br>', $dt['jawaban'])?></td>	
						<td>
							<div class="btn-group">
                        	<a href="<?php echo base_url('administrator/editanswer/'.$dt["id"])?>"><button class="btn btn-block btn-primary btn-flat btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</button></a>
                        	</div>
                        	<div class="btn-group">
                        	<a href="<?php echo base_url('administrator/addanswer/'.$dt["id"])?>"><button class="btn btn-block btn-primary btn-flat btn-sm"><span class="fa fa-plus"></span> Jawaban</button></a>
                        	</div>
                        	<div class="btn-group">
							<a><button onclick="check(<?php echo $dt['id']?>)" class="btn btn-block btn-primary btn-flat btn-sm"><span class="glyphicon glyphicon-trash"></span> Hapus</button></a>
							</div>
						</td>
					</tr>
					<?php }?>
				</table>
				<div class="btn-group pull-right">
            		<a href="<?php echo base_url('administrator/genpdf')?>"><button class="btn btn-block btn-success btn-flat btn-sm"><span class="glyphicon glyphicon-print	"></span>  Cetak pertanyaan</button></a>
            	</div>
			</div>			
		</div>
		</div>	
	</div>
</div>

<script>
	function check(id){
		var txt;
	    var r = confirm("Apakah yakin menghapus pertanyaan ini ? ");
	    if (r == true) {
	    	var url = '<?php echo base_url("administrator/deleteQuestion/'+id+'")?>';
	    	$.post( url, function( data ) {
			  if (data.status == "success") {
			  	var link = '<?php echo base_url('administrator/delalert')?>';
			  	window.location.href = link;
			  }
			}, "json" );
	    } else {
	        return false;
	    }
	}
</script>