<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="refresh" content="180">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Generate PDF</title>	
    <!-- CSS -->
    <link href="<?php echo base_url('assets/css')?>/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    	
	 <style type="text/css" style="display: none !important;">
	*					{ margin: 0; padding: 0; }
	body				{ font: 14px Georgia, serif; }

	#page-wrap		    { width: 780px; margin: 0 auto; padding-top: 80px; padding-bottom: 50px}

	h1                  { margin: 25px 0; font: 20px Georgia, Serif; text-transform: uppercase; letter-spacing: 3px; }
	
	#quiz input {
	    vertical-align: middle;
	}

	#quiz ol {
	   margin: 0 0 10px 20px;
	}

	#quiz ol li {
	   margin: 0 0 20px 0;
	}

	#quiz ol li div {
	   padding: 4px 0;
	}

	#quiz h3 {
	   font-size: 16px; margin: 0 0 1px 0; color: #666;
	}

	 h2 {
	   font-size: 17px; margin: 0 0 1px 0;
	}
	h3 {
	   font-size: 15px; margin: 0 0 1px 0; 
	}

	#results {
	    font: 44px Georgia, Serif;
	}
</style>
</head>
<body onload="window.print()">
<div class="container">
	<div id="page-wrap">
		<h1>Pertanyaan untuk Kabupaten Klaten</h1>
		
		<form id="quiz">
		
            <ol>
            <?php foreach ($pertanyaan as $key => $tanya):?>
                <li>
                
                    <h3><?php echo $tanya['pertanyaan']?></h3>
                    <?php foreach($tanya['jwb'] as $key => $jawab):?>
                    <div>
                        <label><?php echo $jawab['huruf'].". "?><?php echo $jawab['jawaban']?> </label>
                    </div>
              		<?php endforeach ?>                  
                </li>
              <?php endforeach ?>            
            </ol>
		</form>
	<h2>Format Penulisan : </h2><h3><strong>
	id_kabupaten#id_kecamatan#id_kelurahan:
	<?php $string = ""; foreach($pertanyaan as $key => $tanya):?>
		<?php $string .= "P".$tanya['id']."#"?>
	<?php endforeach; echo rtrim($string,"#")?></strong></h3>
	<hr>
	</div>
</div>
</body>
</html>