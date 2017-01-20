    <div class="wrap">
      <div class="container-fluid">
        <h2 class="sub-header-home">Grafik Perolehan Suara <?php echo $title?></h2>
        <div class="top-content">
          <div class="row">
          <?php $i = 1; foreach($pertanyaan as $p):  
            ?>
            <div class="col-md-3">
              <div class="box-pie-home">
                <div class="pie-chart-jawaban">                  
                  <div class="top-content-chart" id="p<?php echo $i;?>"></div>
                  <h3><?php echo $p['pertanyaan']?></h3>
                  <div class="clearfix"></div>
                </div>
                <div class="detail-top-chart">
                  <div class="row">
                  <?php foreach($p['jawaban'] as $jwb):?>
                    <div class="col-xs-6">
                      <div class="chart-color">
                        <span class="nama-jawaban"><?php echo $jwb['value']?></span>
                        <span class="prosentase-jawaban">
                        
                          <?php
                            if ($jwb['jml']->jml < 1) {
                              echo 0;
                            } else {
                              echo number_format(($jwb['jml']->jml/($jwb['allcount']->jml))*100,1,',','.');
                            }                            
                          ?>
                        %</span>
                      </div>
                    </div>
                  <?php endforeach ?>
                  </div>
                </div>
              </div>
            </div>
            <?php $i++;endforeach ?>
          </div>
        </div>
        
        <div class="bottom-content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="top-tabel-jawaban">
                  <h1>Hasil Survey</h1>
                  <span class="tabel-breadcrumb">
                    <ol class="breadcrumb">
                    <a href="javascript:history.back()" class="btn btn-default btn-flat btn-xs"><span class="glyphicon glyphicon-arrow-left" onclick="history.back()"></span> Back</a>
                      <button type="button" id="refresh" class="btn btn-default btn-flat btn-xs"><span class="glyphicon glyphicon-refresh"></span> Perbarui data</button>
                    </ol>
                  </span> 
                </div>
                <div class="tabel-jawaban">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                      <th rowspan="2"></th>
                      <?php foreach($pertanyaan as $p):
                          $row = count($p['jawaban']);
                      ?>
                        <th colspan="<?php echo $row; ?>"><?php echo $p['pertanyaan']?></th>
                      <?php endforeach ?>
                      <th rowspan="2">Jml Rumah</th>
                      </tr>
                      <tr>
                        <?php foreach($pertanyaan as $p):
                           foreach ($p['jawaban'] as $jwb): ?>
                        <th><?php echo $jwb['value']?></th>
                        <?php endforeach; ?>
                      <?php endforeach; ?>
                      </tr>
                      
                    </thead>
                      <tbody>             
                        <tr>
                          <td>Total</td>
                          <?php foreach($total['ttl'] as $t):?>
                              <td><?php echo number_format($t->jml,0,',','.');?></td>
                            <?php endforeach ?>
                            <td><?php echo number_format($total['jml_rumah'][0]->jml,0,',','.');?></td>
                        </tr>
                        
                        
                        <?php foreach($detail as $dt):?>
                      <tr class="success">
                        <?php if($status == "provinsi"){
                          ?>
                          <td><a href="<?php echo base_url('dashboard?prov='.$dt['id_provinsi'].'&kab='.$dt['id_kabkota'])?>"><?php echo $dt['kabkota'];?></a></td>

                        <?php }elseif($status == "kabupaten"){?>
                          
                          <td><a href="<?php echo base_url('dashboard?prov='.$dt['id_provinsi'].'&kab='.$dt['id_kabkota'].'&kec='.$dt['id_kecamatan'])?>"><?php echo $dt['kabkota'];?></a></td>

                        <?php }elseif($status == "kecamatan"){?>
                          <td><?php echo $dt['kabkota'];?></td>

                        <?php }else {?>
                            <td><a href="<?php echo base_url('dashboard?prov='.$dt['id_kabkota'])?>"><?php echo $dt['kabkota'];?></a></td>

                        <?php } $count = 0; ?>
                          <?php foreach($dt['data'] as $d): ?>
                              <td><?php echo number_format($d->jml,0,',','.'); $count = $count+$d->jml?></td>
                          <?php endforeach ?>

                          <?php foreach($dt['jml_rumah'] as $jml): ?>
                              <td><?php echo number_format($jml->jml,0,',','.');?></td>
                          <?php endforeach ?>
                        </tr> 
                        <?php endforeach ?>
                      </tbody>
                  </table>
                </div>  
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    
    <script src="<?php echo base_url('assets/admin/js')?>/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url('assets/js')?>/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js')?>/highcharts.js"></script>

<script type="text/javascript">
  
</script>

<?php $i = 1; foreach($pertanyaan as $p):?>
  <script>
      $(function () {
          $('#p<?php echo $i?>').highcharts({
              chart: {
              plotBackgroundColor: null,
              plotBorderWittlh: null,
              plotShadow: false,
              type: 'pie',
              backgroundColor:'transparent',
              spacingBottom: 0,
              spacingTop: 0,
              spacingLeft: 0,
              spacingRight: 0,
              },
              title: {
                  text: ''
              },
              subtitle: {
                  text: ''
              },
              tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                  },
              plotOptions: {
                  pie: {
                      innerSize: 100,
                      depth: 45
                  }
              },
              plotOptions: {
                  pie: {
                      allowPointSelect: true,
                      cursor: 'pointer',
                      dataLabels: {
                          enabled: false
                      },
                      showInLegend: false
                  }
              },  
              credits: {
                  enabled: false
              },
              series: [{
                  name: ' ',
                  data: [
                  <?php foreach($p['jawaban'] as $j):?>
                    ['<?php echo $j['value']?>', <?php echo $j['jml']->jml;?>],
                  <?php endforeach ?>
                  ]
              }]
          });
      });
    </script>
<?php $i++; endforeach ?>
<script type="text/javascript">
  $("#refresh").click(function(){
    $.get("<?php echo base_url('core')?>", function(data, status){
        if (status === "success") {
          location.reload();
        }else{
          alert('Error!  Status = ' + status); 
        }
    });
  });
</script>

  </body>
</html>
