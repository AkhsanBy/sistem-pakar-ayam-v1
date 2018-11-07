<?php
	session_start();

	include_once '../includes/constant.php';
	include '../includes/function_database.php';
	$daftarPencegahan = getAllPencegahan();

	include '../templates/header.html.php';
?>
<title>Pencegahan Penyakit pada Ayam</title>
</head>
<body>
	<?php include '../templates/nav.html.php'; ?>
	<div class="container">
		<?php if(isset($_COOKIE['tambahPencegahan'])): ?>
			<div class="alert alert-success alert-dismissible fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Penambahan Data Pencegahan Penyakit pada Ayam</strong><br>Anda berhasil menambahkan data pencegahan penyakit baru.</div>
		<?php endif ?>
		<div class="row">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th class="text-center">No</th>
						<th class="text-center">Kode Pencegahan</th>
						<th class="text-center">Nama Pencegahan Penyakit</th>
					</tr>
				</thead>
				<?php if(isset($daftarPencegahan)): ?>
				<tbody>
					<?php $i=1; foreach($daftarPencegahan as $pencegahan): ?>
					<tr>
						<td class="text-center"><?= $i++ ?></td>
						<td class="text-center"><?= $pencegahan[PENCEGAHAN_KODE] ?></td>
						<td><?= $pencegahan[PENCEGAHAN_NAMA] ?></td>
					</tr>
					<?php endforeach ?>
				</tbody>
				<?php endif ?>
			</table>
		</div>
	</div>
<?php include '../templates/footer.html.php' ?>