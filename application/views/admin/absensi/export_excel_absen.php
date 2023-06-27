<?php
// dipake buat biar lgsg mulai download otomatis
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$title.xls");
//  $title buat judul file nginkutin di title yg di controller laporan
header("Pragma: no-cache");
header("Expires: 0");
?>
    <h3><center>Laporan Data Absensi Pegawai Kopti Kabupaten Bogor</center></h3>
        <br/>
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