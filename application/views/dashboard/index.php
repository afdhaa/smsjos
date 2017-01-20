<?php
  foreach ($total as $ttl) {
      $jmlrumah=$ttl['jmlrumah'];
      $p1ya=$ttl['p1ya'];
      $p1belum=$ttl['p1belum'];
      $p1tidaktahu=$ttl['p1tidaktahu'];

      $p2ya=$ttl['p2ya'];
      $p2tidak=$ttl['p2tidak'];
      $p2tidaktahu=$ttl['p2tidaktahu'];

      $p3melanjutkan=$ttl['p3melanjutkan'];
      $p3cerdas=$ttl['p3cerdas'];
      $p3bukantrah=$ttl['p3bukantrah'];
      $p3rahasia=$ttl['p3rahasia'];

      $p4sudah=$ttl['p4sudah'];
      $p4belum=$ttl['p4belum'];
      $p4abstain=$ttl['p4abstain'];

      $p5srihartini=$ttl['p5srihartini'];
      $p5one=$ttl['p5one'];
      $p5mustafid=$ttl['p5mustafid'];
      $p5rahasia=$ttl['p5rahasia'];
  } 

?>
    <div class="wrap">
      <div class="container-fluid">

        <div class="top-content">
          <div class="row">
            <div class="col-md-3">
              <div class="box-pie-home">

                <div class="pie-chart-jawaban">                  
                  <div class="top-content-chart" id="p1"></div>
                  <h3>Apakah Anda Sudah Terdaftar sebagai DPT?</h3>
                  <div class="clearfix"></div>
                </div>

                <div class="detail-top-chart">
                  <div class="row">
                    <div class="col-xs-6">
                      <div class="chart-color">
                        <span class="nama-jawaban">Ya</span>
                        <span class="prosentase-jawaban"><?php echo number_format(($p1ya/($p1ya+$p1belum+$p1tidaktahu))*100,1,',','.');?>%</span>
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <div class="chart-color">
                        <span class="nama-jawaban">Belum</span>
                        <span class="prosentase-jawaban"><?php echo number_format(($p1belum/($p1ya+$p1belum+$p1tidaktahu))*100,1,',','.');?>%</span>
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <div class="chart-color">
                        <span class="nama-jawaban">Tidak Tahu</span>
                        <span class="prosentase-jawaban"><?php echo number_format(($p1tidaktahu/($p1ya+$p1belum+$p1tidaktahu))*100,1,',','.');?>%</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="box-pie-home">

                <div class="pie-chart-jawaban">                  
                  <div class="top-content-chart" id="p2"></div>
                  <h3>Apakah anda akan pergi memilih bupati dalam Pilkada tanggal 9 desember  2015 nanti ?</h3>
                  <div class="clearfix"></div>
                </div>

                <div class="detail-top-chart">
                  <div class="row">
                    <div class="col-xs-6">
                      <div class="chart-color">
                        <span class="nama-jawaban">Ya</span>
                        <span class="prosentase-jawaban"><?php echo number_format(($p2ya/($p2ya+$p2tidak+$p2tidaktahu))*100,1,',','.');?>%</span>
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <div class="chart-color">
                        <span class="nama-jawaban">Tidak</span>
                        <span class="prosentase-jawaban"><?php echo number_format(($p2tidak/($p2ya+$p2tidak+$p2tidaktahu))*100,1,',','.');?>%</span>
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <div class="chart-color">
                        <span class="nama-jawaban">Tidak Tahu</span>
                        <span class="prosentase-jawaban"><?php echo number_format(($p2tidaktahu/($p2ya+$p2tidak+$p2tidaktahu))*100,1,',','.');?>%</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="box-pie-home">

                <div class="pie-chart-jawaban">                  
                  <div class="top-content-chart" id="p3"></div>
                  <h3>Apakah anda lebih senang memilih bupati yang </h3>
                  <div class="clearfix"></div>
                </div>

                <div class="detail-top-chart">
                  <div class="row">
                    <div class="col-xs-6">
                      <div class="chart-color">
                        <span class="nama-jawaban">Melanjutkan</span>
                        <span class="prosentase-jawaban"><?php echo number_format(($p3melanjutkan/($p3melanjutkan+$p3cerdas+$p3bukantrah+$p3rahasia))*100,1,',','.');?>%</span>
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <div class="chart-color">
                        <span class="nama-jawaban">Cerdas</span>
                        <span class="prosentase-jawaban"><?php echo number_format(($p3cerdas/($p3melanjutkan+$p3cerdas+$p3bukantrah+$p3rahasia))*100,1,',','.');?>%</span>
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <div class="chart-color">
                        <span class="nama-jawaban">Bukan Trah</span>
                        <span class="prosentase-jawaban"><?php echo number_format(($p3bukantrah/($p3melanjutkan+$p3cerdas+$p3bukantrah+$p3rahasia))*100,1,',','.');?>%</span>
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <div class="chart-color">
                        <span class="nama-jawaban">Rahasia</span>
                        <span class="prosentase-jawaban"><?php echo number_format(($p3rahasia/($p3melanjutkan+$p3cerdas+$p3bukantrah+$p3rahasia))*100,1,',','.');?>%</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="box-pie-home">

                <div class="pie-chart-jawaban">                  
                  <div class="top-content-chart" id="p4"></div>
                  <h3>Apakah anda sudah menentukan pilihan</h3>
                  <div class="clearfix"></div>
                </div>

                <div class="detail-top-chart">
                  <div class="row">
                    <div class="col-xs-6">
                      <div class="chart-color">
                        <span class="nama-jawaban">Sudah</span>
                        <span class="prosentase-jawaban"><?php echo number_format(($p4sudah/($p4sudah+$p4belum+$p4abstain))*100,1,',','.');?>%</span>
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <div class="chart-color">
                        <span class="nama-jawaban">Belum</span>
                        <span class="prosentase-jawaban"><?php echo number_format(($p4belum/($p4sudah+$p4belum+$p4abstain))*100,1,',','.');?>%</span>
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <div class="chart-color">
                        <span class="nama-jawaban">Abstain</span>
                        <span class="prosentase-jawaban"><?php echo number_format(($p4abstain/($p4sudah+$p4belum+$p4abstain))*100,1,',','.');?>%</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="box-pie-home">

                <div class="pie-chart-jawaban">                  
                  <div class="top-content-chart" id="p5"></div>
                  <h3>Pasangan mana yang akan anda pilih </h3>
                  <div class="clearfix"></div>
                </div>

                <div class="detail-top-chart">
                  <div class="row">
                    <div class="col-xs-6">
                      <div class="chart-color">
                        <span class="nama-jawaban">Sri Hartini</span>
                        <span class="prosentase-jawaban"><?php echo number_format(($p5srihartini/($p5srihartini+$p5one+$p5mustafid+$p5rahasia))*100,1,',','.');?>%</span>
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <div class="chart-color">
                        <span class="nama-jawaban">One Krisnata</span>
                        <span class="prosentase-jawaban"><?php echo number_format(($p5one/($p5srihartini+$p5one+$p5mustafid+$p5rahasia))*100,1,',','.');?>%</span>
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <div class="chart-color">
                        <span class="nama-jawaban">Mustafid Fauzan</span>
                        <span class="prosentase-jawaban"><?php echo number_format(($p5mustafid/($p5srihartini+$p5one+$p5mustafid+$p5rahasia))*100,1,',','.');?>%</span>
                      </div>
                    </div>
                    <div class="col-xs-6">
                      <div class="chart-color">
                        <span class="nama-jawaban">Rahasia</span>
                        <span class="prosentase-jawaban"><?php echo number_format(($p5rahasia/($p5srihartini+$p5one+$p5mustafid+$p5rahasia))*100,1,',','.');?>%</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
                      <li><a href="<?php echo base_url('dashboard/index')?>">Home</a></li>
                    </ol>
                  </span> 
                </div>
                <div class="tabel-jawaban">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th rowspan="2"></th>
                        <th rowspan="2">Jumlah<br>Rumah</th>
                        <th colspan="3">Sudah Terdaftar Sebagai DPT</th>
                        <th colspan="3">Akan Memilih</th>
                        <th colspan="4">Kriteria</th>
                        <th colspan="3">Sudah Menentukan</th>
                        <th colspan="4">Pasangan Pilihan</th>
                      </tr>
                      <tr>
                        <th>Ya</th>
                        <th>Belum</th>
                        <th>Tidak Tahu</th>
                        <th>Ya</th>
                        <th>Tidak</th>
                        <th>Tidak Tahu</th>
                        <th>Melanjutkan Pembangunan</th>
                        <th>Cerdas</th>
                        <th>Bukan Trah</th>
                        <th>Rahasia</th>
                        <th>Sudah</th>
                        <th>Belum</th>
                        <th>Abstain</th>
                        <th>Sri Hartini - Sri Mulyani</th>
                        <th>One Krisnata - SUnarto</th>
                        <th>Mustafid Fauzan - Sriharmanto</th>
                        <th>Rahasia</th>
                      </tr>
                    </thead>
                      <tbody>             
                      <tr>
                          <td>Total</td>
                          <td><?php echo number_format($jmlrumah,0,',','.');?></td>
                          <td><?php echo number_format($p1ya,0,',','.');?></td>
                          <td><?php echo number_format($p1belum,0,',','.');?></td>
                          <td><?php echo number_format($p1tidaktahu,0,',','.');?></td>
                          <td><?php echo number_format($p2ya,0,',','.');?></td>
                          <td><?php echo number_format($p2tidak,0,',','.');?></td>
                          <td><?php echo number_format($p2tidaktahu,0,',','.');?></td>
                          <td><?php echo number_format($p3melanjutkan,0,',','.');?></td>
                          <td><?php echo number_format($p3cerdas,0,',','.');?></td>
                          <td><?php echo number_format($p3bukantrah,0,',','.');?></td>
                          <td><?php echo number_format($p3rahasia,0,',','.');?></td>
                          <td><?php echo number_format($p4sudah,0,',','.');?></td>
                          <td><?php echo number_format($p4belum,0,',','.');?></td>
                          <td><?php echo number_format($p4abstain,0,',','.');?></td>
                          <td><?php echo number_format($p5srihartini,0,',','.');?></td>
                          <td><?php echo number_format($p5one,0,',','.');?></td>
                          <td><?php echo number_format($p5mustafid,0,',','.');?></td>
                          <td><?php echo number_format($p5rahasia,0,',','.');?></td>
                        </tr>
                        
                  <?php if(isset($status) && $status === "kabupaten"){
                    foreach ($data as $dt) {
                      $kec = $dt['id_kec'];
                       $jmlrumah=$dt['jmlrumah'];
                        $p1ya=$dt['p1ya'];
                        $p1belum=$dt['p1belum'];
                        $p1tidaktahu=$dt['p1tidaktahu'];

                        $p2ya=$dt['p2ya'];
                        $p2tidak=$dt['p2tidak'];
                        $p2tidaktahu=$dt['p2tidaktahu'];

                        $p3melanjutkan=$dt['p3melanjutkan'];
                        $p3cerdas=$dt['p3cerdas'];
                        $p3bukantrah=$dt['p3bukantrah'];
                        $p3rahasia=$dt['p3rahasia'];

                        $p4sudah=$dt['p4sudah'];
                        $p4belum=$dt['p4belum'];
                        $p4abstain=$dt['p4abstain'];

                        $p5srihartini=$dt['p5srihartini'];
                        $p5one=$dt['p5one'];
                        $p5mustafid=$dt['p5mustafid'];
                        $p5rahasia=$dt['p5rahasia'];
                        ?>
                           <tr class="success">
                            <td><a href="<?php echo base_url('dashboard/index?kabkota='.$ttl["id_kab_kota"].'&kec='.$kec.'')?>"><?php echo $dt['kecamatan'];?></a></td>
                            <td><?php echo number_format($jmlrumah,0,',','.');?></td>
                            <td><?php echo number_format($p1ya,0,',','.');?></td>
                            <td><?php echo number_format($p1belum,0,',','.');?></td>
                            <td><?php echo number_format($p1tidaktahu,0,',','.');?></td>
                            <td><?php echo number_format($p2ya,0,',','.');?></td>
                            <td><?php echo number_format($p2tidak,0,',','.');?></td>
                            <td><?php echo number_format($p2tidaktahu,0,',','.');?></td>
                            <td><?php echo number_format($p3melanjutkan,0,',','.');?></td>
                            <td><?php echo number_format($p3cerdas,0,',','.');?></td>
                            <td><?php echo number_format($p3bukantrah,0,',','.');?></td>
                            <td><?php echo number_format($p3rahasia,0,',','.');?></td>
                            <td><?php echo number_format($p4sudah,0,',','.');?></td>
                            <td><?php echo number_format($p4belum,0,',','.');?></td>
                            <td><?php echo number_format($p4abstain,0,',','.');?></td>
                            <td><?php echo number_format($p5srihartini,0,',','.');?></td>
                            <td><?php echo number_format($p5one,0,',','.');?></td>
                            <td><?php echo number_format($p5mustafid,0,',','.');?></td>
                            <td><?php echo number_format($p5rahasia,0,',','.');?></td>
                          </tr>
                        <?php
                    }
                  }
                  if(isset($status) && $status === "kecamatan"){
                    foreach ($data as $dt) {
                      $kec = $dt['id_kec'];
                       $jmlrumah=$dt['jmlrumah'];
                        $p1ya=$dt['p1ya'];
                        $p1belum=$dt['p1belum'];
                        $p1tidaktahu=$dt['p1tidaktahu'];

                        $p2ya=$dt['p2ya'];
                        $p2tidak=$dt['p2tidak'];
                        $p2tidaktahu=$dt['p2tidaktahu'];

                        $p3melanjutkan=$dt['p3melanjutkan'];
                        $p3cerdas=$dt['p3cerdas'];
                        $p3bukantrah=$dt['p3bukantrah'];
                        $p3rahasia=$dt['p3rahasia'];

                        $p4sudah=$dt['p4sudah'];
                        $p4belum=$dt['p4belum'];
                        $p4abstain=$dt['p4abstain'];

                        $p5srihartini=$dt['p5srihartini'];
                        $p5one=$dt['p5one'];
                        $p5mustafid=$dt['p5mustafid'];
                        $p5rahasia=$dt['p5rahasia'];
                        ?>
                           <tr class="success">
                            <td><a href="<?php echo base_url('dashboard/index?kabkota='.$ttl["id_kab_kota"].'&kec='.$kec.'')?>"><?php echo $dt['kel_desa'];?></a></td>
                            <td><?php echo number_format($jmlrumah,0,',','.');?></td>
                            <td><?php echo number_format($p1ya,0,',','.');?></td>
                            <td><?php echo number_format($p1belum,0,',','.');?></td>
                            <td><?php echo number_format($p1tidaktahu,0,',','.');?></td>
                            <td><?php echo number_format($p2ya,0,',','.');?></td>
                            <td><?php echo number_format($p2tidak,0,',','.');?></td>
                            <td><?php echo number_format($p2tidaktahu,0,',','.');?></td>
                            <td><?php echo number_format($p3melanjutkan,0,',','.');?></td>
                            <td><?php echo number_format($p3cerdas,0,',','.');?></td>
                            <td><?php echo number_format($p3bukantrah,0,',','.');?></td>
                            <td><?php echo number_format($p3rahasia,0,',','.');?></td>
                            <td><?php echo number_format($p4sudah,0,',','.');?></td>
                            <td><?php echo number_format($p4belum,0,',','.');?></td>
                            <td><?php echo number_format($p4abstain,0,',','.');?></td>
                            <td><?php echo number_format($p5srihartini,0,',','.');?></td>
                            <td><?php echo number_format($p5one,0,',','.');?></td>
                            <td><?php echo number_format($p5mustafid,0,',','.');?></td>
                            <td><?php echo number_format($p5rahasia,0,',','.');?></td>
                          </tr>
                        <?php
                    }
                  }else{
                    ?>
                     <tr class="success">
                            <td><a href="<?php echo base_url('dashboard/index?kabkota='.$ttl["id_kab_kota"].'')?>"><?php echo $ttl['kabkotaj'];?></a></td>
                            <td><?php echo number_format($jmlrumah,0,',','.');?></td>
                            <td><?php echo number_format($p1ya,0,',','.');?></td>
                            <td><?php echo number_format($p1belum,0,',','.');?></td>
                            <td><?php echo number_format($p1tidaktahu,0,',','.');?></td>
                            <td><?php echo number_format($p2ya,0,',','.');?></td>
                            <td><?php echo number_format($p2tidak,0,',','.');?></td>
                            <td><?php echo number_format($p2tidaktahu,0,',','.');?></td>
                            <td><?php echo number_format($p3melanjutkan,0,',','.');?></td>
                            <td><?php echo number_format($p3cerdas,0,',','.');?></td>
                            <td><?php echo number_format($p3bukantrah,0,',','.');?></td>
                            <td><?php echo number_format($p3rahasia,0,',','.');?></td>
                            <td><?php echo number_format($p4sudah,0,',','.');?></td>
                            <td><?php echo number_format($p4belum,0,',','.');?></td>
                            <td><?php echo number_format($p4abstain,0,',','.');?></td>
                            <td><?php echo number_format($p5srihartini,0,',','.');?></td>
                            <td><?php echo number_format($p5one,0,',','.');?></td>
                            <td><?php echo number_format($p5mustafid,0,',','.');?></td>
                            <td><?php echo number_format($p5rahasia,0,',','.');?></td>
                          </tr>        
                    <?php
                  }
                  ?>
                        
                      </tbody>
                  </table>
                </div>  
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <script src="<?php echo base_url('assets/admin/js')?>/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url('assets/js')?>/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js')?>/highcharts.js"></script>
 <script>
      $(function () {
          $('#p1').highcharts({
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
                      ['Ya', <?php echo "$p1ya";?>],
                      ['Belum', <?php echo "$p1belum";?>],
                      ['Tidak Tahu', <?php echo "$p1tidaktahu";?>]
                  ]
              }]
          });
      });
    </script>

    <script>
    <?php
  foreach ($total as $ttl) {
      $jmlrumah=$ttl['jmlrumah'];
      $p1ya=$ttl['p1ya'];
      $p1belum=$ttl['p1belum'];
      $p1tidaktahu=$ttl['p1tidaktahu'];

      $p2ya=$ttl['p2ya'];
      $p2tidak=$ttl['p2tidak'];
      $p2tidaktahu=$ttl['p2tidaktahu'];

      $p3melanjutkan=$ttl['p3melanjutkan'];
      $p3cerdas=$ttl['p3cerdas'];
      $p3bukantrah=$ttl['p3bukantrah'];
      $p3rahasia=$ttl['p3rahasia'];

      $p4sudah=$ttl['p4sudah'];
      $p4belum=$ttl['p4belum'];
      $p4abstain=$ttl['p4abstain'];

      $p5srihartini=$ttl['p5srihartini'];
      $p5one=$ttl['p5one'];
      $p5mustafid=$ttl['p5mustafid'];
      $p5rahasia=$ttl['p5rahasia'];
  } 
?>
      $(function () {
          $('#p2').highcharts({
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
                      ['Ya', <?php echo "$p2ya";?>],
                      ['Tidak', <?php echo "$p2tidak";?>],
                      ['Tidak Tahu', <?php echo "$p2tidaktahu";?>]
                  ]
              }]
          });
      });
    </script>

    <script>
      $(function () {
          $('#p3').highcharts({
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
                      ['Melanjutkan', <?php echo "$p3melanjutkan";?>],
                      ['Cerdas', <?php echo "$p3cerdas";?>],
                      ['Bukan Trah', <?php echo "$p3bukantrah";?>],
                      ['Rahasia', <?php echo "$p3rahasia";?>]
                  ]
              }]
          });
      });
    </script>

    <script>
      $(function () {
          $('#p4').highcharts({
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
              plotOptions: {
                  pie: {
                      innerSize: 100,
                      depth: 45
                  }
              },
              tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
                      ['Sudah', <?php echo "$p4sudah";?>],
                      ['Belum', <?php echo "$p4belum";?>],
                      ['Abstain', <?php echo "$p4abstain";?>]
                  ]
              }]
          });
      });
    </script>

    <script>
      $(function () {
          $('#p5').highcharts({
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
                      ['Sri Hartini', <?php echo "$p5srihartini";?>],
                      ['One Krisnata', <?php echo "$p5one";?>],
                      ['Mustafid Fauzan', <?php echo "$p5mustafid";?>],
                      ['Rahasia', <?php echo "$p5rahasia";?>]
                  ]
              }]
          });
      });
    </script>
  </body>
</html>
