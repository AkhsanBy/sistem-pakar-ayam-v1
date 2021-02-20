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

include '../templates/header.php';
?>
<title>Penyakit pada Ayam</title>
</head>
<body>
	<?php include '../templates/nav.php'; ?>
	<div class="container">
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
							<th>No</th>
							<th>Kode Penyakit</th>
							<th>Nama Penyakit</th>
						</tr>
					</thead>
					<?php if(isset($daftarPenyakit)): ?>
						<tbody>
							<?php $i=1; foreach($daftarPenyakit as $penyakit) : ?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?= $penyakit[PENYAKIT_KODE] ?></td>
								<td><?= $penyakit[PENYAKIT_NAMA] ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				<?php endif ?>
			</table>
		<?php endif ?>
	</div>
</div>
<?php include '../templates/footer.php' ?>