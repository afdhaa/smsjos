 <div class="wrap">
      <div class="container-fluid">
        <div class="bottom-content">
        <div class="row">
          <div class="col-md-10">
            <h2 class="sub-header-line">Hasil perolehan di <?php echo $title?></h2>
          </div>
          <div class="col-md-2" style="padding-right: 15px; margin-top: -11px;">
            <div class="form-group">
              <label></label>
              <select class="form-control" onchange="location = this.value;"">
                <option value="<?php echo base_url('dashboard/line');?>">Pilih wilayah</option>
                <?php foreach($provinsi as $p):?>
                  <option value="<?php echo base_url('dashboard/line?prov=').$p->id_provinsi?>"><?php echo $p->provinsi?></option>
                <?php endforeach?>
              </select>
            </div>
          </div>
        
        </div>
          <?php $i=1; foreach($tanya as $dt):?>
            <div class="col-md-12">
                <div class="col-md-12">
                  <div id="p<?php echo $i;?>" class="line-chart-per-pertanyaan"></div>
                </div>      
            </div>
          <?php $i++; endforeach ?>
          </div>
        </div>

      </div>
    </div>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/admin/js')?>/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url('assets/js')?>/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js')?>/highcharts.js"></script>
<?php $i = 1; foreach($tanya as $ty):?>
    
    <script type="text/javascript">
      $(function () {
          $('#p<?php echo $i?>').highcharts({
              chart: {
                  marginBottom: 80
              },
              credits: {
                  enabled: false
              },
              title: {
                  text: '<?php echo $ty['pertanyaan']?>'
              },
              
              series: [
              <?php foreach ($ty['jawab'] as $key => $jwb):?>
              {
                name: '<?php echo $jwb['jancuk']['jawaban']?>',
                data: [
                  <?php $k=1; 
                    foreach ($jwb['jancuk']['jml'] as $key => $j): 
                      echo $j->jml.",";
                      $k++;
                  ?>
                <?php endforeach;?>]
              },<?php endforeach;?>],
              

              xAxis: {
                  categories: [<?php $str = "'"; foreach ($kecamatan as $key => $kec) {
                    if ($status == "provinsi") {
                      $str .= $kec->kabkota."','";
                    }else{
                      $str .= $kec->provinsi."','";
                    }
                    
                  }echo rtrim($str,"',")."'";
              ;?>]
              },
              
              yAxis: {
                  title: {
                      text: ''
                  },
                  plotLines: [{
                      value: 0,
                      width: 1,
                      color: '#808080'
                  }]
              },
              tooltip: {
                  valueSuffix: ''
              },
              legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom',
                  borderWidth: 0
              }              
          });
      });     
    </script>

<?php $i++; endforeach?>