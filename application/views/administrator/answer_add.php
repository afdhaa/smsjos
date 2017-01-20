<div class="box box-info">
    <div class="box-header ">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
			<i><h4>"<?php echo $question['pertanyaan']?>"</h4></i>			
			</div>
			<div class="panel-body">
				<div>
					<div class="col-md-12">
					<form class="form-horizontal" action="<?php echo base_url('administrator/answersave')?>" method="POST">
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-flat pull-right"  name="add"><i class="fa fa-check-square" aria-hidden="true"></i> Save</button>
						<button class="btn btn-success btn-flat pull-right add_field_button"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
					</div>
					<input type="hidden" name="id_pertanyaan" value="<?php echo $question['id']?>">
						<i><h4>jawaban :</h4></i>
						<?php
						if (isset($answer[0])) {
						 	foreach($answer as $a){ ?>
							<div class="form-group">
							<label class="col-sm-1 control-label"></label>
							    <div class="col-sm-10">
							      <input type="text" class="form-control" id="jawaban" value="<?php echo $a['jawaban']?>" disabled>
							    </div>
							</div>
						<?php
							}
						}else{
							?>
							<div class="form-group">
								<label class="col-sm-1 control-label"></label>
						    	<div class="col-sm-10">
						      		<input type="text" class="form-control" name="jawaban[]" id="jawaban">
							    </div>
						  	</div>	
						<?php
						} ?>
			
					</form>
					</div>										
				</div>
			</div>			
		</div>
	</div>
	</div>
</div>


<script>
	$(document).ready(function() {
	    var max_fields      = 10; //maximum input boxes allowed
	    var wrapper         = $(".form-horizontal"); //Fields wrapper
	    var add_button      = $(".add_field_button"); //Add button ID
	    
	    var x = 1; //initlal text box count
	    $(add_button).click(function(e){ //on add input button click
	        e.preventDefault();
	        if(x < max_fields){ //max input box allowed
	            x++; //text box increment
	            $(wrapper).append('<div class="form-group"><label class="col-sm-1 control-label"></label><div class="col-sm-10"><input type="text" class="form-control" name="jawaban[]" id="jawaban"></div><a href="#" class="remove_field">x</a></div>'); //add input box
	        }
	    });
	    
	    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	        e.preventDefault(); $(this).parent('div').remove(); x--;
	    })
	});
</script>