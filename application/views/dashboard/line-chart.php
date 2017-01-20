 <div class="wrap">
      <div class="container-fluid">
        
        <div class="bottom-content">
          <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                  <div id="p1" class="line-chart-per-pertanyaan"></div>
                </div>  
                <div class="col-md-12">
                  <div id="p2" class="line-chart-per-pertanyaan"></div>
                </div>  
                <div class="col-md-12">
                  <div id="p3" class="line-chart-per-pertanyaan"></div>
                </div>  
                <div class="col-md-12">
                  <div id="p4" class="line-chart-per-pertanyaan"></div>
                </div>
                <div class="col-md-12">
                  <div id="p5" class="line-chart-per-pertanyaan"></div>
                </div>                  
            </div>
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

    <script type="text/javascript">
      $(function () {
          $('#p1').highcharts({
              chart: {
                  marginBottom: 80
              },
              credits: {
                  enabled: false
              },
              title: {
                  text: 'Sudah Terdaftar Sebagai DPT'
              },
              xAxis: {
                  categories: [<?php
                    $i=0;
                    foreach ($rKabKota as $rowKabKota) {
                      if($i>0){
                            echo ",";
                        }
                        echo "'".$rowKabKota['kecamatan']."'";
                        $i++;
                    }
                ?>]
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
              },
              series: [{
                name: 'Ya',
                data: [<?php
                $i=0;
                foreach ($rAll as $rowAll) {
                  if($i>0){
                        echo ",";
                    }
                    echo $rowAll['p1ya'];
                    $i++;
                }
                ?>]
            }, {
                name: 'Belum',
                data: [<?php
                $i=0;
                 foreach ($rAll as $rowAll) {
                  if($i>0){
                        echo ",";
                    }
                    echo $rowAll['p1belum'];
                    $i++;
                }
                ?>]
            }, {
                name: 'Tidak Tahu',
                data: [<?php
                $i=0;
                 foreach ($rAll as $rowAll) {
                  if($i>0){
                        echo ",";
                    }
                    echo $rowAll['p1tidaktahu'];
                    $i++;
                }
                ?>]
            }]
          });
      });     
    </script>

    <script type="text/javascript">
      $(function () {
          $('#p2').highcharts({
              chart: {
                  marginBottom: 80
              },
              credits: {
                  enabled: false
              },
              title: {
                  text: 'Akan Memilih'
              },
              xAxis: {
                  categories: [<?php
                   $i=0;
                    foreach ($rKabKota as $rowKabKota) {
                      if($i>0){
                            echo ",";
                        }
                        echo "'".$rowKabKota['kecamatan']."'";
                        $i++;
                    }
                ?>]
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
              },
              series: [{
                name: 'Ya',
                data: [<?php
                    
                $i=0;
                foreach ($rAll as $rowAll) {
                  if($i>0){
                        echo ",";
                    }
                    echo $rowAll['p2ya'];
                    $i++;
                }
                ?>]
            }, {
                name: 'Tidak',
                data: [<?php
                $i=0;
                foreach ($rAll as $rowAll) {
                  if($i>0){
                        echo ",";
                    }
                    echo $rowAll['p2tidak'];
                    $i++;
                }
                ?>]
            },  {
                name: 'Tidak Tahu',
                data: [<?php
                $i=0;
                 foreach ($rAll as $rowAll) {
                  if($i>0){
                        echo ",";
                    }
                    echo $rowAll['p2tidaktahu'];
                    $i++;
                }
                ?>]
            }]
          });
      });     
    </script>

    <script type="text/javascript">
      $(function () {
          $('#p3').highcharts({
              chart: {
                  marginBottom: 80
              },
              credits: {
                  enabled: false
              },
              title: {
                  text: 'Kriteria Pasangan'
              },
              xAxis: {
                  categories: [<?php
                     $i=0;
                    foreach ($rKabKota as $rowKabKota) {
                      if($i>0){
                            echo ",";
                        }
                        echo "'".$rowKabKota['kecamatan']."'";
                        $i++;
                    }
                ?>]
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
              },
              series: [{
                name: 'Melanjutkan pebangunan yang sudah ada',
                data: [<?php
                 $i=0;
                 foreach ($rAll as $rowAll) {
                  if($i>0){
                        echo ",";
                    }
                    echo $rowAll['p3melanjutkan'];
                    $i++;
                }
                ?>]
            }, {
                name: 'Cerdas dan Berbudi luhu',
                data: [<?php
                  $i=0;
                 foreach ($rAll as $rowAll) {
                  if($i>0){
                        echo ",";
                    }
                    echo $rowAll['p3cerdas'];
                    $i++;
                }
                ?>]
            }, {
                name: 'Bukan berasal dari trah bupati',
                data: [<?php
                 $i=0;
                 foreach ($rAll as $rowAll) {
                  if($i>0){
                        echo ",";
                    }
                    echo $rowAll['p3bukantrah'];
                    $i++;
                }
                ?>]
            }, {
                name: 'Rahasia',
                data: [<?php
                  $i=0;
                 foreach ($rAll as $rowAll) {
                  if($i>0){
                        echo ",";
                    }
                    echo $rowAll['p3rahasia'];
                    $i++;
                }
                ?>]
            }]
          });
      });     
    </script>

    <script type="text/javascript">
      $(function () {
          $('#p4').highcharts({
              chart: {
                  marginBottom: 80
              },
              credits: {
                  enabled: false
              },
              title: {
                  text: 'Apakah anda sudah menentukan pilihan:'
              },
              xAxis: {
                  categories: [<?php
                 $i=0;
                    foreach ($rKabKota as $rowKabKota) {
                      if($i>0){
                            echo ",";
                        }
                        echo "'".$rowKabKota['kecamatan']."'";
                        $i++;
                    }
                ?>]
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
              },
              series: [{
                name: 'Sudah',
                data: [<?php
                    
                $i=0;
                foreach ($rAll as $rowAll) {
                  if($i>0){
                        echo ",";
                    }
                    echo $rowAll['p4sudah'];
                    $i++;
                }
                ?>]
            }, {
                name: 'Belum',
                data: [<?php
                $i=0;
                foreach ($rAll as $rowAll) {
                  if($i>0){
                        echo ",";
                    }
                    echo $rowAll['p4belum'];
                    $i++;
                }
                ?>]
            },{
                name: 'Abstain',
                data: [<?php
                $i=0;
                foreach ($rAll as $rowAll) {
                  if($i>0){
                        echo ",";
                    }
                    echo $rowAll['p4abstain'];
                    $i++;
                }
                ?>]
            }]
          });
      });     
    </script>

    <script type="text/javascript">
      $(function () {
          $('#p5').highcharts({
              chart: {
                  marginBottom: 80
              },
              credits: {
                  enabled: false
              },
              title: {
                  text: 'Pasangan mana yang akan anda pilih'
              },
              xAxis: {
                  categories: [<?php
                 $i=0;
                    foreach ($rKabKota as $rowKabKota) {
                      if($i>0){
                            echo ",";
                        }
                        echo "'".$rowKabKota['kecamatan']."'";
                        $i++;
                    }
                ?>]
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
              },
              series: [{
                name: 'Srihartini - Srimulyani',
                data: [<?php
                $i=0;
                foreach ($rAll as $rowAll) {
                  if($i>0){
                        echo ",";
                    }
                    echo $rowAll['p5srihartini'];
                    $i++;
                }
                ?>]
            }, {
                name: 'One Krisnata - Sunarto',
                data: [<?php
                $i=0;
               foreach ($rAll as $rowAll) {
                  if($i>0){
                        echo ",";
                    }
                    echo $rowAll['p5one'];
                    $i++;
                }
                ?>]
            }, {
                name: 'Mustafid Fauzan - Sriharmanto',
                data: [<?php
                $i=0;
                foreach ($rAll as $rowAll) {
                  if($i>0){
                        echo ",";
                    }
                    echo $rowAll['p5mustafid'];
                    $i++;
                }
                ?>]
            }, {
                name: 'Rahasia',
                data: [<?php
                $i=0;
               foreach ($rAll as $rowAll) {
                  if($i>0){
                        echo ",";
                    }
                    echo $rowAll['p5rahasia'];
                    $i++;
                }
                ?>]
            }]
          });
      });     
    </script>
