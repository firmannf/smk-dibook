<?php
	require "php/conn.php";
?>
<html>
	<head>
	<link rel="shortcut icon" href="image/logo.png"></link>
    <link href="css/styleu2.css" type="text/css" rel="stylesheet" />
	<link rel="stylesheet" href="css/menu2.css" type="text/css"/>
	<title>Grafik Pengajuan/Bulan</title>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/highcharts.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart1;
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column',
			width: 270, // Tah mi ini panjang si grafik dari jsnya berapa
			height:310 // Tah mi ini lebar si grafik dari jsnya berapa
         },   
         title: {
            text: 'Your Expression Graph'
         },
		 subtitle: {
                text: 'Diary'
         },
         xAxis: {
            categories: ['Expression']
			
         },

         yAxis: {
            title: {
               text: 'Total'
            }
         },
              series:             
            [
            <?php
        	require "php/conn.php";
			$sqlsad   = "select * from diary where Emoticon='sad' && Id_User='" . $_SESSION['id'] . "'" ;
            $querysad = mysql_query( $sqlsad )  or die(mysql_error());
			$jmlsad = mysql_num_rows($querysad);
			
			$sqlsmile   = "select * from diary where Emoticon='smile' && Id_User='" . $_SESSION['id'] . "'" ;
            $querysmile = mysql_query( $sqlsmile )  or die(mysql_error());
			$jmlsmile = mysql_num_rows($querysmile);
			
			$sqlgrinning   = "select * from diary where Emoticon='grinning' && Id_User='" . $_SESSION['id'] . "'" ;
            $querygrinning = mysql_query( $sqlgrinning )  or die(mysql_error());
			$jmlgrinning = mysql_num_rows($querygrinning);
			
			$sqlconfused   = "select * from diary where Emoticon='confused' && Id_User='" . $_SESSION['id'] . "'" ;
            $queryconfused = mysql_query( $sqlconfused )  or die(mysql_error());
			$jmlconfused = mysql_num_rows($queryconfused);
			
			$sqlcrying   = "select * from diary where Emoticon='crying' && Id_User='" . $_SESSION['id'] . "'" ;
            $querycrying = mysql_query( $sqlcrying )  or die(mysql_error());
			$jmlcrying = mysql_num_rows($querycrying);
			
			$sqlneutral   = "select * from diary where Emoticon='neutral' && Id_User='" . $_SESSION['id'] . "'" ;
            $queryneutral = mysql_query( $sqlneutral )  or die(mysql_error());
			$jmlneutral = mysql_num_rows($queryneutral);
			
					$status1= "Sad";
					$jumlah1 = $jmlsad;
					
					$status2= "Smile";
					$jumlah2 = $jmlsmile;
					
					$status3= "Grinning";
					$jumlah3 = $jmlgrinning;
					
					$status4= "Confused";
					$jumlah4 = $jmlconfused;
					
					$status5= "Crying";
					$jumlah5 = $jmlcrying;
					
					$status6= "Neutral";
					$jumlah6 = $jmlneutral;
					
						?>
						<?php if ($jmlsad != 0){ ?>
                  {
                      name: '<?php echo $status1; ?>',
                      data: [<?php echo $jumlah1; ?>],
					  dataLabels: {
							enabled: true,
							rotation: 0,
							color: 'black',
							align: 'center',
							style: {
								fontSize: '12px',
								fontFamily: 'Verdana, sans-serif',
								textShadow: '0 0 3px black'
							}
					  }
                  }  , 	<?php } ?>
				  <?php if ($jmlsmile != 0){ ?>
				  {
                      name: '<?php echo $status2; ?>',
                      data: [<?php echo $jumlah2; ?>],
					  dataLabels: {
							enabled: true,
							rotation: 0,
							color: 'black',
							align: 'center',
							style: {
								fontSize: '12px',
								fontFamily: 'Verdana, sans-serif',
								textShadow: '0 0 3px black'
							}
					  }
                  }, <?php } ?>
				  <?php if ($jmlgrinning!= 0){ ?>
				  {
                      name: '<?php echo $status3; ?>',
                      data: [<?php echo $jumlah3; ?>],
					  dataLabels: {
							enabled: true,
							rotation: 0,
							color: 'black',
							align: 'center',
							style: {
								fontSize: '12px',
								fontFamily: 'Verdana, sans-serif',
								textShadow: '0 0 3px black'
							}
					  }
                  }, <?php } ?>
				  <?php if ($jmlconfused!= 0){ ?>
				  {
                      name: '<?php echo $status4; ?>',
                      data: [<?php echo $jumlah4; ?>],
					  dataLabels: {
							enabled: true,
							rotation: 0,
							color: 'black',
							align: 'center',
							style: {
								fontSize: '12px',
								fontFamily: 'Verdana, sans-serif',
								textShadow: '0 0 3px black'
							}
					  }
                  }, <?php } ?>
				   <?php if ($jmlcrying!= 0){ ?>
				  {
                      name: '<?php echo $status5; ?>',
                      data: [<?php echo $jumlah5; ?>],
					  dataLabels: {
							enabled: true,
							rotation: 0,
							color: 'black',
							align: 'center',
							style: {
								fontSize: '12px',
								fontFamily: 'Verdana, sans-serif',
								textShadow: '0 0 3px black'
							}
					  }
                  }, <?php } ?>
				  <?php if ($jmlneutral!= 0){ ?>
				  {
                      name: '<?php echo $status6; ?>',
                      data: [<?php echo $jumlah6; ?>],
					  dataLabels: {
							enabled: true,
							rotation: 0,
							color: 'black',
							align: 'center',
							style: {
								fontSize: '12px',
								fontFamily: 'Verdana, sans-serif',
								textShadow: '0 0 3px black'
							}
					  }
                  }, <?php } ?>
			
            ]
      });
   });	
</script>
</head>
<body>
<!-- Tah mi containerbox ini gantinya di file css/styleu.css. bisi mau ganti panjangnya -->
<div id="containerbox">
<div id='container' style='margin: auto 5px;'></div>	
</br>
</br>
</br>
</div>
</body>
</html>