<?php
	session_start();

	include_once '../includes/constant.php';
	include '../includes/function_database.php';
	$daftarGejala = getAllGejala();

	include '../templates/header.html.php';
?>
<title>Gejala Penyakit pada Ayam</title>
</head>
<body>
	<?php include '../templates/nav.html.php'; ?>
	<div class="container">
		<?php if(isset($_COOKIE['tambahGejala'])): ?>
			<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Penambahan Data Gejala Penyakit pada Ayam</strong><br>Anda berhasil menambahkan data gejala penyakit baru.</div>
		<?php endif ?>
		<div class="row">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Kode Gejala</th>
						<th class="text-center">Nama Gejala Penyakit</th>
					</tr>
				</thead>
				<?php if(isset($daftarGejala)): ?>
				<tbody>
					<?php $i=1; foreach($daftarGejala as $gejala): ?>
					<tr>
						<td class="text-center"><?= $i++ ?></td>
						<td class="text-center"><?= $gejala[GEJALA_KODE] ?></td>
						<td><?= $gejala[GEJALA_NAMA] ?></td>
					</tr>
					<?php endforeach ?>
				</tbody>
				<?php endif ?>
			</table>
		</div>
	</div>
<?php include '../templates/footer.html.php' ?>