<?php if($this->session->flashdata('message') !== null){
  echo $this->session->flashdata('message');
 }
 ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
<div class="box box-info">
    <div class="box-header ">
  <div class="col-md-12">
    <div class="panel panel-primary">
      <div class="panel-heading">         
        <h4>input sms manual</h4>
      </div>
      <div class="panel-body">
        <div>
        <form class="form-horizontal" action="<?php echo base_url('input/add')?>" method="POST">
            <div class="form-group">
              <label for="usernameInput" class="col-sm-2 control-label">Nomer telepon</label>
              <div class="col-sm-4">
                <input type="text" name="nomor" class="form-control" placeholder="Nomor menggunakan +62, contoh +628312332123">
              </div>
            </div>
            <div class="form-group">
              <label for="usernameInput" class="col-sm-2 control-label">USB</label>
              <div class="col-sm-4">
                <input type="text" name="usb" class="form-control" placeholder="Nomor USB yang digunakan, contoh USB1">
              </div>
            </div>
            <div class="form-group">
              <label for="usernameInput" class="col-sm-2 control-label">Tanggal</label>
              <div class="col-sm-4">
                <input type="text" name="tanggal" id="datepicker" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="usernameInput" class="col-sm-2 control-label">Isi SMS</label>
              <div class="col-sm-10">
                <textarea name="sms" class="form-control" placeholder="Untuk input multiple sms pisah kan dengan tanda (, ) koma spasi. Contoh 13#10#3#1#1#1:A#B, 13#10#3#1#1#1:A#B, 13#10#3#1#1#1:A#B"></textarea>
              </div>
            </div>
            <input type="submit" name="submit" value="input" class="btn btn-sm btn-primary btn-flat pull-right"> 
          </div>                    
        </div>
        </form>
      </div>      
    </div>
  </div>
  </div>
</div>