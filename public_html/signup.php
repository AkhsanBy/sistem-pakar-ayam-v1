<?php
	session_start();

	if (isset($_SESSION['id'])) {
		header('location: /');
	}

	if (isset($_POST['submit'])) {
		$pakar = $_POST['pakar'];
		$pakar['namaDepan'] = ucfirst(strtolower(trim($pakar['namaDepan'])));
		$pakar['namaBelakang'] = ucfirst(strtolower(trim($pakar['namaBelakang'])));
		$pakar['nomorHp'] = trim($pakar['nomorHp']);
		$pakar['email'] = strtolower(trim($pakar['email']));

		//validasi nama depan
		if (empty($pakar['namaDepan'])) {
			$error = 'Anda belum mengisi Nama Depan';
		} elseif (!preg_match('/^[a-zA-Z]*$/', $pakar['namaDepan'])) {
			$error = 'Nama Depan Anda tidak valid';
		}

		//validasi nama belakang
		elseif (!preg_match('/^[a-zA-Z]*$/', $pakar['namaBelakang'])) {
			$error = 'Nama Belakang Anda tidak valid';
		}

		//validasi nomor hp
		elseif (empty($pakar['nomorHp'])) {
			$error = 'Anda belum mengisi Nomor HP';
		} elseif (!preg_match('/^[0-9]*$/', $pakar['nomorHp'])) {
			$error = 'Nomor HP Anda tidak valid';
		}

		//validasi alamat email
		elseif (empty($pakar['email'])) {
			$error = 'Alamat email Anda masih kosong';
		} elseif (!filter_var($pakar['email'], FILTER_VALIDATE_EMAIL)) {
			$error = 'Alamat email Anda tidak valid';
		}

		//password
		elseif (empty($pakar['password'])) {
			$error = 'Anda belum mengisi password';
		} elseif (strlen($pakar['password']) < 8) {
			$error = 'Gunakan minimal 8 karakter password';
		} elseif ($pakar['password'] !== $pakar['konfirmasiPassword']) {
			$error = 'Konfirmasi password Anda tidak sama';
		}

		//semua aman
		else {
			include __DIR__.'/../includes/function_database.php';
			include_once __DIR__.'/../includes/constant.php';

			if (checkPakarBy(PAKAR_EMAIL, $pakar['email'])) {
				$error = 'Alamat email <strong>'.$pakar['email'].'</strong> sudah digunakan oleh pakar lain';
			} else {
				$pakar['password'] = password_hash($pakar['password'], PASSWORD_DEFAULT);

				insertPakar($pakar['namaDepan'], $pakar['namaBelakang'], $pakar['nomorHp'], $pakar['email'], $pakar['password']);

				setcookie('registrasi', 1, time()+1);
				header('location: /');
			}
		}
	}

	include '../templates/header.html.php';
?>
<title>Sistem Pakar - Pendaftaran Pakar</title>
</head>
<body>
	<?php include '../templates/nav.html.php'; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<?php if(!empty($error)): ?>
					<div class="alert alert-warning alert-dismissible fade in">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<?= $error ?>
					</div>
				<?php endif ?>
				<div class="panel-group">
					<div class="panel panel-primary">
						<div class="panel-heading text-center"><strong>FORM PENDAFTARAN PAKAR</strong></div>
						<div class="panel-body">
							<form action="" method="post">
								<div class="row">
									<div class="form-group col-md-6">
										<label for="namaDepan">Nama Depan</label>
										<input type="text" maxlength="20" id="namaDepan" class="form-control" name="pakar[namaDepan]" placeholder="Nama Depan" value="<?= $pakar['namaDepan'] ?? '' ?>">
									</div>
									<div class="form-group col-md-6">
										<label for="namaBelakang">Nama Belakang</label>
										<input type="text" maxlength="20" id="namaBelakang" class="form-control" name="pakar[namaBelakang]" placeholder="Nama Belakang" value="<?= $pakar['namaBelakang'] ?? '' ?>">
									</div>
								</div>
								<div class="form-group">
									<label for="hp">Nomor HP</label>
									<input type="text" maxlength="15" id="hp" class="form-control" name="pakar[nomorHp]" placeholder="Nomor HP" value="<?= $pakar['nomorHp'] ?? '' ?>">
								</div>
								<div class="form-group">
									<label for="email">Alamat Email</label>
									<input type="text" maxlength="100" id="email" class="form-control" name="pakar[email]" placeholder="Alamat Email" value="<?= $pakar['email'] ?? '' ?>">
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label for="password">Password</label>
										<input type="password" maxlength="100" id="password" class="form-control" name="pakar[password]" placeholder="Password" value="<?= $pakar['password'] ?? '' ?>">
									</div>
									<div class="form-group col-md-6">
										<label for="konfirmasiPassword">Konfirmasi Password</label>
										<input type="password" maxlength="100" id="konfirmasiPassword" class="form-control" name="pakar[konfirmasiPassword]" placeholder="Konfirmasi Password">
									</div>
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-primary" name="submit" value="submit">Daftar</button>
								</div>
							</form>
						</div>
						<div class="panel-footer">Sudah punya akun? <a href="/login.php"><strong>Masuk</strong></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include '../templates/footer.html.php' ?>