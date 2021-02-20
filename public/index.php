<?php
session_start();

include '../includes/function_database.php';
include_once '../includes/constant.php';
include '../templates/header.php';
$daftarGejala = getAllGejala();
$gejalaDiisi = false;
$penyakitTidakAda = false;

if (isset($_POST['submit'])) {
	$boolGejala = $_POST['radio'];
	foreach ($boolGejala as $bool) {
		if($bool == 1){
			$gejalaDiisi = true;
			break;
		}
	}

	$gejalaSekarang = array();

	$i = 0; $j = 0;
	foreach ($boolGejala as $bool) {
		if($bool == 1){
			$gejalaSekarang[$j] = $daftarGejala[$i];
			$j++;
		}

		$i++;
	}
	
	$temp = getPenyakitByGejala($gejalaSekarang);

	if($temp==0){
		$penyakitTidakAda = true;
	}else{
		$penyakit = $temp;
		$pencegahanPenyakit = getAllPencegahanByKodePenyakit($penyakit[PENYAKIT_KODE]);
	}
}
?>
<title>Sistem Pakar</title>
</head>
<body>
	<?php include '../templates/nav.php'; ?>
	<div class="container">
		<div class="container-fluid">
			<?php if($gejalaDiisi): ?>
				<div class="row mt-4">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<strong>Gejala penyakit pada ayam Anda :</strong>
						<?php $i=1; foreach($gejalaSekarang as $gejalaS): ?>
						<li><?= $gejalaS[GEJALA_NAMA] ?></li>
					<?php endforeach ?>
					<hr>
					<strong>Diagnosa penyakit menurut sistem :</strong><br>
					<?php if($penyakitTidakAda==true): ?>
						Penyakit belum terdeteksi oleh sistem kami
						<hr>
						<?php else: ?>
							<strong><?= $penyakit[PENYAKIT_NAMA] ?></strong><br>
							<?= $penyakit[PENYAKIT_KETERANGAN] ?>
							<hr>
							<strong>Pencegahan agar tidak menular :</strong>
							<?php $i=1; foreach($pencegahanPenyakit as $pencegahan): ?>
							<li><?= $pencegahan[PENCEGAHAN_NAMA] ?></li>
						<?php endforeach ?>
						<hr>
					<?php endif ?>
				</div>
			</div>
		<?php endif ?>
		<div class="text-center">
			<button class="btn btn-primary my-4" href="#mulai" data-toggle="collapse">Mulai</button>
		</div>
		<div id="mulai" class="collapse">
			<form action="" method="post">
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Gejala Penyakit</th>
							<th>Jawaban Anda</th>
						</tr>
					</thead>
					<?php if(isset($daftarGejala)): ?>
						<tbody>
							<?php $i=1; foreach($daftarGejala as $gejala): ?>
							<tr>
								<td><?= $i ?></td>
								<td>Apakah ayam Anda mengalami <?= $gejala[GEJALA_NAMA] ?>?</td>
								<td>
									
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="radio[<?=$i?>]" value="0" checked>
										<label class="form-check-label">Tidak</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="radio[<?=$i++?>]" value="1">
										<label class="form-check-label">Ya</label>
									</div>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				<?php endif ?>
			</table>
			<div class="text-center">
				<button class="btn btn-primary my-4" type="submit" name="submit" value="submit">Periksa</button>
			</div>
		</form><br><br>
	</div>
</div>
</div>
<?php include '../templates/footer.php' ?>