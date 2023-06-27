<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title?></title>
	<style type="text/css">
		/* body{
			font-family: Arial;
			color: black;
		} */
        .table-data {
        width: 100%;
        border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px 10px 10px 10px;
        }

        h3 {
            font-family: Verdana;
        }
	</style>
</head>
<body>
	<center>
		<h1>KOPTI Kabupaten Bogor</h1>
		<h2>Laporan Kehadiran Pegawai</h2>
	</center>

	<?php
	if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
			$bulan = $_GET['bulan'];
			$tahun = $_GET['tahun'];
			$bulantahun = $bulan.$tahun;
		}else{
			$bulan = date('m');
			$tahun = date('Y');
			$bulantahun = $bulan.$tahun;
		}
	?>
	<table class="table-data">
        <thead>
            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?php echo $bulan?></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?php echo $tahun?></td>
            </tr>
        </thead>		
	</table>

	    <table class="table-data">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">NIK</th>
                    <th class="text-center">Nama Pegawai</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center">Hadir</th>
                    <th class="text-center">Sakit</th>
                    <th class="text-center">Alpha</th>
                </tr>
                <?php $no=1; foreach($lap_kehadiran as $l) : ?>
                <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-center"><?php echo $l->nik ?></td>
                    <td class="text-center"><?php echo $l->nama_pegawai ?></td>
                    <td class="text-center"><?php echo $l->nama_jabatan ?></td>
                    <td class="text-center"><?php echo $l->hadir ?></td>
                    <td class="text-center"><?php echo $l->sakit ?></td>
                    <td class="text-center"><?php echo $l->alpha ?></td>
                </tr>
                <?php endforeach ;?>
            </thead>
			
		</table>

</body>
</html>