<?php
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