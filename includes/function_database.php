<?php
	function checkPakarBy($column, $value) {
		include 'mysqli_connect.php';

		try {
			$stmt = $mysqli->prepare('SELECT `'.PAKAR_ID.'` FROM `'.PAKAR_TABLE.'` WHERE `'.$column.'` = ? LIMIT 1');
			$stmt->bind_param('s', $value);
			$stmt->execute();
			$hasil = $stmt->get_result();
			$stmt->close();

			return $hasil->num_rows ? true : false;
		} catch (Exception $e) {
			error_log($e->getMessage());
			exit('Gagal terhubung dengan database');
		}
	}

	function insertPakar($namaDepan, $namaBelakang, $nomorHp, $email, $password) {
		include 'mysqli_connect.php';

		try {
			$stmt = $mysqli->prepare('INSERT INTO `'.PAKAR_TABLE.'` (`'.PAKAR_NAMA_DEPAN.'`, `'.PAKAR_NAMA_BELAKANG.'`, `'.PAKAR_NOMOR_HP.'`, `'.PAKAR_EMAIL.'`, `'.PAKAR_PASSWORD.'`) VALUES (?, ?, ?, ?, ?)');
			$stmt->bind_param('sssss', $namaDepan, $namaBelakang, $nomorHp, $email, $password);
			$stmt->execute();
			$stmt->close();
		} catch (Exception $e) {
			error_log($e->getMessage());
			exit('Gagal menyimpan data ke database');
		}
	}

	function login($username, $password) {
		include 'mysqli_connect.php';

		try {
			$stmt = $mysqli->prepare('SELECT * FROM `'.PAKAR_TABLE.'` WHERE `'.PAKAR_EMAIL.'` = ? LIMIT 1');
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$hasil = $stmt->get_result();
			$stmt->close();

			if ($hasil->num_rows == 0) {
				return false;
			} else {
				$row = $hasil->fetch_assoc();

				if (password_verify($password, $row[PAKAR_PASSWORD])) {
					session_regenerate_id();
					$_SESSION['id'] = $row[PAKAR_ID];
					$_SESSION['email'] = $row[PAKAR_EMAIL];
					$_SESSION['nama'] = trim($row[PAKAR_NAMA_DEPAN].' '.$row[PAKAR_NAMA_BELAKANG]);
					$_SESSION['password'] = $row[PAKAR_PASSWORD];

					return true;
				} else {
					return false;
				}
			}
		} catch (Exception $e) {
			error_log($e->getMessage());
			exit('Gagal terhubung dengan database');
		}
	}

	function getAllPenyakit() {
		include 'mysqli_connect.php';

		try {
			$stmt = $mysqli->prepare('SELECT * FROM `'.PENYAKIT_TABLE.'`');
			$stmt->execute();
			$hasil = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
			$stmt->close();

			return $hasil;
		} catch (Exception $e) {
			error_log($e->getMessage());
			exit('Gagal mengambil data penyakit dari database');
		}
	}

	function getAllGejala() {
		include 'mysqli_connect.php';

		try {
			$stmt = $mysqli->prepare('SELECT * FROM `'.GEJALA_TABLE.'`');
			$stmt->execute();
			$hasil = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
			$stmt->close();

			return $hasil;
		} catch (Exception $e) {
			error_log($e->getMessage());
			exit('Gagal mengambil data gejala dari database');
		}
	}

	function getAllGejalaByKodePenyakit($kodePenyakit) {
		include 'mysqli_connect.php';

		try {
			$stmt = $mysqli->prepare('SELECT `'.GEJALA_TABLE.'`.* FROM `'.GEJALA_TABLE.'`, `'.GEJALA_PENYAKIT_TABLE.'` WHERE (`'.GEJALA_PENYAKIT_TABLE.'`.`'.GEJALA_PENYAKIT_KODE_PENYAKIT.'`="'.$kodePenyakit.'" AND `'.GEJALA_PENYAKIT_TABLE.'`.`'.GEJALA_PENYAKIT_KODE_GEJALA.'`=`'.GEJALA_TABLE.'`.`'.GEJALA_KODE.'`)');
			$stmt->execute();
			$hasil = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
			$stmt->close();

			return $hasil;
		} catch (Exception $e) {
			error_log($e->getMessage());
			exit('Gagal mengambil data gejala penyakit dari database');
		}
	}

	function getAllPencegahan() {
		include 'mysqli_connect.php';

		try {
			$stmt = $mysqli->prepare('SELECT * FROM `'.PENCEGAHAN_TABLE.'`');
			$stmt->execute();
			$hasil = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
			$stmt->close();

			return $hasil;
		} catch (Exception $e) {
			error_log($e->getMessage());
			exit('Gagal mengambil data pencegahan dari database');
		}
	}

	function getAllPencegahanByKodePenyakit($kodePenyakit) {
		include 'mysqli_connect.php';

		try {
			$stmt = $mysqli->prepare('SELECT `'.PENCEGAHAN_TABLE.'`.* FROM `'.PENCEGAHAN_TABLE.'`, `'.PENCEGAHAN_PENYAKIT_TABLE.'` WHERE (`'.PENCEGAHAN_PENYAKIT_TABLE.'`.`'.PENCEGAHAN_PENYAKIT_KODE_PENYAKIT.'`="'.$kodePenyakit.'" AND `'.PENCEGAHAN_PENYAKIT_TABLE.'`.`'.PENCEGAHAN_PENYAKIT_KODE_PENCEGAHAN.'`=`'.PENCEGAHAN_TABLE.'`.`'.PENCEGAHAN_KODE.'`)');
			$stmt->execute();
			$hasil = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
			$stmt->close();

			return $hasil;
		} catch (Exception $e) {
			error_log($e->getMessage());
			exit('Gagal mengambil data pencegahan penyakit dari database');
		}
	}

	function getPenyakitByGejala($daftarGejalaUser){
		$daftarPenyakit = getAllPenyakit();

		foreach ($daftarPenyakit as $penyakit) {
			$daftarGejala = getAllGejalaByKodePenyakit($penyakit[PENYAKIT_KODE]);
			$samaAll = true;

			foreach ($daftarGejala as $gejala) {
				$sama = false;
				
				foreach ($daftarGejalaUser as $gejalaUser) {
					if($gejala[GEJALA_KODE]==$gejalaUser[GEJALA_KODE]){
						$sama = true;
						break;
					}
				}

				if(!$sama){
					$samaAll = false;
					break;
				}
			}

			if($samaAll){
				return $penyakit;
			}
		}

		return 0;
	}





	

	function checkEventById($id) {
		include 'mysqli_connect.php';

		try {
			$stmt = $mysqli->prepare('SELECT * FROM `'.EVENT_TABLE.'` WHERE `'.EVENT_ID.'` = ? LIMIT 1');
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$hasil = $stmt->get_result();
			$stmt->close();

			return $hasil->num_rows ? true : false;
		} catch (Exception $e) {
			error_log($e->getMessage());
			exit('Gagal terhubung dengan database');
		}
	}

	function checkTransaksiBy($id, $idMember) {
		include 'mysqli_connect.php';

		try {
			$stmt = $mysqli->prepare('SELECT * FROM `'.TRANSAKSI_TABLE.'` WHERE `'.TRANSAKSI_ID.'` = ? AND `'.TRANSAKSI_ID_MEMBER.'` = ? LIMIT 1');
			$stmt->bind_param('ii', $id, $idMember);
			$stmt->execute();
			$hasil = $stmt->get_result();
			$stmt->close();

			return $hasil->num_rows ? true : false;
		} catch (Exception $e) {
			error_log($e->getMessage());
			exit('Gagal terhubung dengan database');
		}
	}

	function getJumlahEvent() {
		include 'mysqli_connect.php';

		try {
			$stmt = $mysqli->prepare('SELECT count(`'.EVENT_ID.'`) FROM `'.MEMBER_TABLE.'`');
			$stmt->execute();
			$hasil = $stmt->get_result();
			$stmt->close();
		} catch (Exception $e) {
			error_log($e->getMessage());
			exit('Gagal terhubung dengan database');
		}
	}

	function getTotalEvent() {
		include 'mysqli_connect.php';

		try {
			$stmt = $mysqli->prepare('SELECT COUNT(*) AS jumlahEvent FROM `'.EVENT_TABLE.'`');
			$stmt->execute();
			$hasil = $stmt->get_result()->fetch_assoc();
			$stmt->close();

			return $hasil['jumlahEvent'];
		} catch (Exception $e) {
			error_log($e->getMessage());
			exit('Gagal mengambil data event dari database');
		}
	}

	function getEventById($id) {
		include 'mysqli_connect.php';

		try {
			$stmt = $mysqli->prepare('SELECT * FROM `'.EVENT_TABLE.'` WHERE `'.EVENT_ID.'` = ?');
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$hasil = $stmt->get_result()->fetch_assoc();
			$stmt->close();

			return $hasil;
		} catch (Exception $e) {
			error_log($e->getMessage());
			exit('Gagal menyimpan data event ke database');
		}
	}

	function tambahPesanan($kode, $memberId, $eventId, $jumlahReguler, $jumlahSilver, $jumlahGold, $total) {
		include 'mysqli_connect.php';

		try {
			$stmt = $mysqli->prepare('INSERT INTO `'.TRANSAKSI_TABLE.'` (`'.TRANSAKSI_KODE.'`, `'.TRANSAKSI_ID_EVENT.'`, `'.TRANSAKSI_ID_MEMBER.'`, `'.TRANSAKSI_JUMLAH_REGULER.'`, `'.TRANSAKSI_JUMLAH_SILVER.'`, `'.TRANSAKSI_JUMLAH_GOLD.'`, `'.TRANSAKSI_TAGIHAN.'`, `'.TRANSAKSI_TERBAYAR.'`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
			$stmt->bind_param('iiiiiiii', $kode, $eventId, $memberId, $jumlahReguler, $jumlahSilver, $jumlahGold, $total, $bayar = 0);
			$stmt->execute();
			$stmt->close();
		} catch (Exception $e) {
			error_log($e->getMessage());
			exit('Gagal menyimpan data ke database');
		}
	}

	function getTransaksiById($id) {
		include 'mysqli_connect.php';

		try {
			$stmt = $mysqli->prepare('SELECT * FROM `'.TRANSAKSI_TABLE.'` WHERE `'.TRANSAKSI_ID.'` = ?');
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$hasil = $stmt->get_result()->fetch_assoc();
			$stmt->close();

			return $hasil;
		} catch (Exception $e) {
			error_log($e->getMessage());
			exit('Gagal menyimpan data event ke database');
		}
	}

	function uploadBuktiTransfer($id, $bayar) {
		include 'mysqli_connect.php';

		try {
			$stmt = $mysqli->prepare('UPDATE `'.TRANSAKSI_TABLE.'` SET `'.TRANSAKSI_TERBAYAR.'` = ? WHERE `'.TRANSAKSI_ID.'` = ?');

			$stmt->bind_param('ii', $bayar, $id);
			$stmt->execute();
			$hasil = $stmt->affected_rows;
			$stmt->close();

			return $hasil>0 ? true : false;
		} catch (Exception $e) {
			error_log($e->getMessage());
			exit('Gagal menyimpan data ke database');
		}
	}