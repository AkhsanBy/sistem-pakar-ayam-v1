<?php
session_start();

include_once '../includes/constant.php';
include '../includes/function_database.php';
$daftarGejala = getAllGejala();

include '../templates/header.php';
?>
<title>Gejala Penyakit pada Ayam</title>
</head>
<body>
	<?php include '../templates/nav.php'; ?>
	<div class="container">
		<div class="row">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Gejala</th>
						<th>Nama Gejala Penyakit</th>
					</tr>
				</thead>
				<?php if(isset($daftarGejala)): ?>
					<tbody>
						<?php $i=1; foreach($daftarGejala as $gejala): ?>
						<tr>
							<td><?= $i++ ?></td>
							<td><?= $gejala[GEJALA_KODE] ?></td>
							<td><?= $gejala[GEJALA_NAMA] ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			<?php endif ?>
		</table>
	</div>
</div>
<?php include '../templates/footer.php' ?>