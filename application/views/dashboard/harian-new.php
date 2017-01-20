<div class="wrap">
      <div class="container-fluid">
      <?php foreach($kab as $key => $value):?>
      <div class="box">
        <h2 class="sub-header">Statistik Perolehan Suara di <?php echo $value['kabupaten']?></h2>
        <div id="G<?php echo $value['id_kab'];?>" class="linep" style="min-width: 310px; height: 450px; margin: 0 auto"></div>
      </div>
    <?php endforeach?>

      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/admin/js')?>/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url('assets/js')?>/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js')?>/highcharts.js"></script>
    <?php foreach($kab as $key => $value):?>
    <script type="text/javascript">
      $(function () {
        $('#G<?php $value['id_kab'];?>').highcharts({
            chart: {
                type: 'area'
            },
            title: {
                text: ''
            },
            xAxis: {
                    type: 'datetime',
                    dateTimeLabelFormats: { // don't display the dummy year
                        month: '%e. %b',
                        year: '%b'
                    },
                    title: {
                        text: 'Date'
                    },
                    labels: {
                        rotation: -25,
                        style: {
                            fontSize: '13px',
                            fontFamily: 'Verdana, sans-serif'
                        }
                    },
                },
            yAxis: {
                    title: {
                        text: 'Jumlah Suara'
                    },
                    min: 0
                },
            tooltip: {
                headerFormat: '<b>{series.name}</b><br>',
                    pointFormat: '{point.x:%e %b}: {point.y:.0f}'
            },
            plotOptions: {
                area: {
                    marker: {
                        enabled: false,
                        symbol: 'circle',
                        radius: 2,
                        states: {
                            hover: {
                                enabled: true
                            }
                        }
                    }
                }
            },
            series: [{
                    name: 'Sri Hartini',
                    // Define the data points. All series have a dummy year
                    // of 1970/71 in order to be compared on the same x axis. Note
                    // that in JavaScript, months start at 0 for January, 1 for February etc.
                    data: [<?php
                        $i=0;
                        foreach ($data as $dt) {
                            if($i>0){
                                echo ",";
                            }
                             $tglnya=explode(', ',$dt['tgl']);
                            echo "[Date.UTC(".$tglnya[0].", ".($tglnya[1]-1).", ".$tglnya[2]."),".$dt['srihartini']."]";
                            
                            $i++;
                        }
                    ?>
                        
                    ]
                }, {
                    name: 'One',
                    data: [
                        <?php
                        $i=0;
                       foreach ($data as $dt) {
                            if($i>0){
                                echo ",";
                            }
                             $tglnya=explode(', ',$dt['tgl']);
                            echo "[Date.UTC(".$tglnya[0].", ".($tglnya[1]-1).", ".$tglnya[2]."),".$dt['one']."]";
                            
                            $i++;
                        }
                    ?>
                    ]
                }, {
                    name: 'Mustafid',
                    data: [
                        <?php
                        $i=0;
                        foreach ($data as $dt) {
                            if($i>0){
                                echo ",";
                            }
                             $tglnya=explode(', ',$dt['tgl']);
                            echo "[Date.UTC(".$tglnya[0].", ".($tglnya[1]-1).", ".$tglnya[2]."),".$dt['mustafid']."]";
                            
                            $i++;
                        }
                    ?>
                    ]
                }, {
                    name: 'Rahasia',
                    data: [
                        <?php
                        $i=0;
                       foreach ($data as $dt) {
                            if($i>0){
                                echo ",";
                            }
                             $tglnya=explode(', ',$dt['tgl']);
                            echo "[Date.UTC(".$tglnya[0].", ".($tglnya[1]-1).", ".$tglnya[2]."),".$dt['rahasia']."]";
                            
                            $i++;
                        }
                    ?>
                    ]
                }]
        });
    });
    </script>
<?php endforeach ?>