<?php
session_start();

include_once '../includes/constant.php';
include '../includes/function_database.php';
$daftarPencegahan = getAllPencegahan();

include '../templates/header.php';
?>
<title>Pencegahan Penyakit pada Ayam</title>
</head>
<body>
	<?php include '../templates/nav.php'; ?>
	<div class="container">
		<div class="row">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Pencegahan</th>
						<th>Nama Pencegahan Penyakit</th>
					</tr>
				</thead>
				<?php if(isset($daftarPencegahan)): ?>
					<tbody>
						<?php $i=1; foreach($daftarPencegahan as $pencegahan): ?>
						<tr>
							<td><?= $i++ ?></td>
							<td><?= $pencegahan[PENCEGAHAN_KODE] ?></td>
							<td><?= $pencegahan[PENCEGAHAN_NAMA] ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			<?php endif ?>
		</table>
	</div>
</div>
<?php include '../templates/footer.php' ?>