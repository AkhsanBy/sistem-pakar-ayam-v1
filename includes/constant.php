<?php	
	// tabel pakar
	define('PAKAR_TABLE', 'tb_pakar');
	define('PAKAR_ID', 'id');
	define('PAKAR_NAMA_DEPAN', 'namaDepan');
	define('PAKAR_NAMA_BELAKANG', 'namaBelakang');
	define('PAKAR_NOMOR_HP', 'nomorHp');
	define('PAKAR_EMAIL', 'email');
	define('PAKAR_PASSWORD', 'password');

	// tabel penyakit
	define('PENYAKIT_TABLE', 'tb_penyakit');
	define('PENYAKIT_KODE', 'kode');
	define('PENYAKIT_NAMA', 'nama');
	define('PENYAKIT_KETERANGAN', 'keterangan');

	// tabel gejala
	define('GEJALA_TABLE', 'tb_gejala');
	define('GEJALA_KODE', 'kode');
	define('GEJALA_NAMA', 'keterangan');
	
	// tabel pencegahan
	define('PENCEGAHAN_TABLE', 'tb_pencegahan');
	define('PENCEGAHAN_KODE', 'kode');
	define('PENCEGAHAN_NAMA', 'keterangan');

	// tabel gejala penyakit
	define('GEJALA_PENYAKIT_TABLE', 'tb_gejalaPenyakit');
	define('GEJALA_PENYAKIT_KODE_PENYAKIT', 'kodePenyakit');
	define('GEJALA_PENYAKIT_KODE_GEJALA', 'kodeGejala');

	// tabel pencegahan penyakit
	define('PENCEGAHAN_PENYAKIT_TABLE', 'tb_pencegahanPenyakit');
	define('PENCEGAHAN_PENYAKIT_KODE_PENYAKIT', 'kodePenyakit');
	define('PENCEGAHAN_PENYAKIT_KODE_PENCEGAHAN', 'kodePencegahan');