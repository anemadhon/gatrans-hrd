<?php  
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Daftar_Training_Program.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Excel</title>
</head>
<body>
	<h1>HRD</h1>
    <h3>DAFTAR TRAINING PROGRAM PT GHITA AVIA TRANS</h3>
    <table border="1">
    	<thead>
            <tr>
                <th>No.</th>
                <th>Nama Peserta</th>
                <th>NIK</th>
                <th>KTP</th>
                <th>Divisi</th>
                <th>Jabatan</th>
                <th>Training</th>
                <th>Tempat Training</th>
                <th>Tanggal Ikut</th>
                <th>Tanggal Berakhir</th>
            </tr>
        </thead>
    	<tbody>
    		<?php 
    		$no=1;
    		foreach ($dataadmin['excel']->result() as $excel) {
    		?>
    		<tr>
    			<td><?php echo $no; ?></td>
                <td><?php echo $excel->nama; ?></td>
    			<td><?php echo $excel->nik; ?></td>
    			<td><?php echo $excel->ktp; ?></td>
    			<td><?php echo $excel->divisi; ?></td>
    			<td><?php echo $excel->jbtn; ?></td>
    			<td><?php echo $excel->training; ?></td>
    			<td><?php echo $excel->tmpttraining; ?></td>
    			<td><?php echo date_format(date_create($excel->tglikut), "d-m-Y"); ?></td>
    			<td><?php echo date_format(date_create($excel->tglexp), "d-m-Y"); ?></td>
    		</tr>
    		<?php 
    		$no++;
    		}
    		?>
    	</tbody>
    </table>
    <?php echo 'Printed By : '.$dataadmin['username'].' / '.date("d-m-Y"). ' / '.date("H:i:s") ?>
</body>
</html>