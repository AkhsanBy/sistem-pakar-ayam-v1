<?php
	session_start();

	include_once '../includes/constant.php';
	include '../includes/function_database.php';
	$daftarPenyakit = getAllPenyakit();
	$kodeBenar = false;

	if (isset($_GET['kode'])) {
		$kodePenyakit = $_GET['kode'];

		foreach ($daftarPenyakit as $penyakit) {
			if($penyakit['kode']==$kodePenyakit){
				$kodeBenar = true;
				break;
			}
		}

		if ($kodeBenar) {
			$daftarGejala = getAllGejalaByKodePenyakit($kodePenyakit);
			$daftarPencegahan = getAllPencegahanByKodePenyakit($kodePenyakit);
		}
	}

	include '../templates/header.html.php';
?>
<title>Penyakit pada Ayam</title>
</head>
<body>
	<?php include '../templates/nav.html.php'; ?>
	<div class="container">
		<?php if(isset($_COOKIE['tambahPenyakit'])): ?>
			<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Penambahan Data Penyakit pada Ayam</strong><br>Anda berhasil menambahkan data penyakit baru.</div>
		<?php endif ?>
		<div class="row">
			<?php if($kodeBenar): ?>
			<table>
				<tr>
					<td valign="top"><strong>Kode</strong></td>
					<td valign="top"><strong> : </strong></td>
					<td><?= $penyakit[PENYAKIT_KODE] ?></td>
				</tr>
				<tr>
					<td valign="top"><strong>Nama</strong></td>
					<td valign="top"><strong> : </strong></td>
					<td><?= $penyakit[PENYAKIT_NAMA] ?></td>
				</tr>
				<tr>
					<td valign="top"><strong>Keterangan</strong></td>
					<td valign="top"><strong> : </strong></td>
					<td><?= $penyakit[PENYAKIT_KETERANGAN] ?></td>
				</tr>
			</table><br>
			<strong>Gejala Penyakit:</strong>
			<?php if(isset($daftarGejala)): ?>
				<ul>
				<?php $i=1; foreach($daftarGejala as $gejala): ?>
				<li><?= $gejala[GEJALA_NAMA] ?></li>
				<?php endforeach ?>
				</ul>
			<?php endif ?><br>
			<strong>Pencegahan Penyakit:</strong>
			<?php if(isset($daftarPencegahan)): ?>
			<ul>
			<?php $i=1; foreach($daftarPencegahan as $pencegahan): ?>
			<li><?= $pencegahan[PENCEGAHAN_NAMA] ?></li>
			<?php endforeach ?>
			</ul>
			<?php endif ?>
			<?php else: ?>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Kode Penyakit</th>
						<th class="text-center">Nama Penyakit</th>
					</tr>
				</thead>
				<?php if(isset($daftarPenyakit)): ?>
				<tbody>
					<?php $i=1; foreach($daftarPenyakit as $penyakit): ?>
					<tr>
						<td class="text-center"><?= $i++ ?></td>
						<td class="text-center"><a href="/penyakit.php?kode=<?= $penyakit[PENYAKIT_KODE] ?>"><?= $penyakit[PENYAKIT_KODE] ?></a></td>
						<td><?= $penyakit[PENYAKIT_NAMA] ?></td>
					</tr>
					<?php endforeach ?>
				</tbody>
				<?php endif ?>
			</table>
			<?php endif ?>
		</div>
	</div>
<?php include '../templates/footer.html.php' ?>