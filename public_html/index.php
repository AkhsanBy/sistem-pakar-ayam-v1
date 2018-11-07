<?php
	session_start();

	include '../includes/function_database.php';
	include_once '../includes/constant.php';
	include '../templates/header.html.php';
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
	<?php include '../templates/nav.html.php'; ?>
	<div class="container">
		<div class="container-fluid">    
		<?php if(isset($_COOKIE['registrasi'])): ?>
			<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Registrasi Berhasil</strong><br>Anda sudah terdaftar di Portal Event.</div>
		<?php elseif(isset($_COOKIE['login'])): ?>
			<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Selamat datang <strong><?= $_SESSION['nama'] ?? '' ?></strong>.</div>
		<?php elseif(isset($_COOKIE['logout'])): ?>
			<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Logout berhasil</strong><br>Anda berhasil keluar.</div>
		<?php endif ?>
		<?php if($gejalaDiisi): ?>
			<div class="row">
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
				<button class="btn btn-primary" href="#mulai" data-toggle="collapse">Mulai</button><br><br>
			</div>
			<div id="mulai" class="collapse">
				<form action="" method="post">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Nama Gejala Penyakit</th>
							<th class="text-center">Jawaban Anda</th>
						</tr>
					</thead>
					<?php if(isset($daftarGejala)): ?>
					<tbody>
						<?php $i=1; foreach($daftarGejala as $gejala): ?>
						<tr>
							<td class="text-center"><?= $i ?></td>
							<td>Apakah ayam Anda mengalami <?= $gejala[GEJALA_NAMA] ?>?</td>
							<td class="text-center">
								  <input class="form-check-input" type="radio" name="radio[<?=$i?>]" value="0" checked>Tidak
								  <input class="form-check-input" type="radio" name="radio[<?=$i++?>]" value="1">Ya
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
					<?php endif ?>
				</table>
				<div class="text-center">
					<button class="btn btn-primary" type="submit" name="submit" value="submit">Periksa</button>
				</div>
				</form><br><br>
			</div>
		</div>
	</div>
<?php include '../templates/footer.html.php' ?>