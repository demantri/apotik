<?php defined('BASEPATH') or exit('No direct script access allowed');
require_once 'functions.php';
/**
 * This is Example Controller
 */
class Example extends CI_Controller
{
	public function landingpage()
	{
		$this->load->view('index');
	}

	function __construct()
	{
		parent::__construct();
		$this->load->model('apotek_data');
		$this->load->database();
		$this->load->helper(array('form', 'url'));

		$data['nullstock'] = $this->apotek_data->countstock();
		$data['nullex'] = $this->apotek_data->countex();
		$this->template->write_view('sidenavs', 'template/default_sidenavs', true);
		$this->template->write_view('navs', 'template/default_topnavs.php', $data, true);
	}



	function index()
	{
		$data['stockobat'] = $this->apotek_data->count_med();
		$data['stockkat'] = $this->apotek_data->count_cat();
		$data['sup'] = $this->apotek_data->count_sup();
		$data['unit'] = $this->apotek_data->count_unit();
		$data['inv'] = $this->apotek_data->count_inv();
		$data['pur'] = $this->apotek_data->count_pur();
		$data['totpur'] = $this->apotek_data->count_totpur();
		$data['totinv'] = $this->apotek_data->count_totinv();

		$this->template->write('title', 'Beranda', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/mypage', $data, true);

		$this->template->render();
	}



	function dashboard()
	{
		$this->template->write('title', 'Dashboard', TRUE);
		$this->template->write('header', 'Dashboard');
		$this->template->write_view('content', 'tes/dashboard', '', true);

		$this->template->render();
	}



	function table_exp()
	{
		$data['table_exp'] = $this->apotek_data->expired()->result();
		$data['table_alex'] = $this->apotek_data->almostex()->result();
		$this->template->write('title', 'Obat kedaluwarsa', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/table_exp', $data, true);

		$this->template->render();
	}

	function table_stock()
	{
		$data['table_stock'] = $this->apotek_data->outstock()->result();
		$data['table_alstock'] = $this->apotek_data->almostout()->result();
		$this->template->write('title', 'Obat Habis', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/table_stock', $data,  true);

		$this->template->render();
	}

	function form_cat()
	{
		$this->template->write('title', 'Tambah Kategori', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/form_cat', '', true);

		$this->template->render();
	}

	function form_unit()
	{
		$this->template->write('title', 'Tambah Unit', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/form_unit', '', true);

		$this->template->render();
	}

	function form_med()
	{
		$data['get_cat'] = $this->apotek_data->get_category();
		$data['get_sup'] = $this->apotek_data->get_supplier();
		$data['get_unit'] = $this->apotek_data->get_unit();
		$this->template->write('title', 'Tambah Obat', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/form_med', $data, true);

		$this->template->render();
	}


	function table_med()
	{

		$data['table_med'] = $this->apotek_data->medicine()->result();
		$this->template->write('title', 'Lihat Obat', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/table_med', $data, true);

		$this->template->render();
	}

	function table_unit()
	{

		$data['table_unit'] = $this->apotek_data->unit()->result();
		$this->template->write('title', 'Lihat Unit', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/table_unit', $data, true);

		$this->template->render();
	}


	function invoice_report()
	{
		$this->template->write('title', 'Grafik Penjualan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/invoice_report', true);

		$this->template->render();
	}

	function purchase_report()
	{

		$this->template->write('title', 'Grafik Pembelian', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/purchase_report', true);

		$this->template->render();
	}

	function report()
	{
		$data['totpur'] = $this->apotek_data->count_totpur();
		$data['totinv'] = $this->apotek_data->count_totinv();
		$data['report'] = $this->apotek_data->get_report();
		$this->template->write('title', 'Laporan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/report', $data, true);

		$this->template->render();
	}

	function table_cat()
	{

		$data['table_cat'] = $this->apotek_data->category()->result();
		$this->template->write('title', 'Lihat Kategori', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/table_cat', $data, true);

		$this->template->render();
	}

	function table_sup()
	{
		$data['table_sup'] = $this->apotek_data->supplier()->result();

		$this->template->write('title', 'Lihat Pemasok', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/table_sup', $data, true);

		$this->template->render();
	}



	function form_sup()
	{
		$this->template->write('title', 'Tambah Pemasok', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/form_sup', '', true);

		$this->template->render();
	}




	function form_invoice()
	{
		$data['table_med'] = $this->apotek_data->medicine()->result();
		$data['get_cat'] = $this->apotek_data->get_category();
		$data['get_med'] = $this->apotek_data->get_medicinenotnol();
		$data['get_unit'] = $this->apotek_data->get_unit();
		$this->template->write('title', 'Tambah Penjualan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/form_invoice', $data, true);

		$this->template->render();
	}


	function form_purchase()
	{
		$data['table_med'] = $this->apotek_data->medicine()->result();
		$data['get_sup'] = $this->apotek_data->get_supplier();

		$data['get_med'] = $this->apotek_data->get_medicine();

		$this->template->write('title', 'Tambah Pembelian', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/form_purchase', $data, true);

		$this->template->render();
	}

	function table_purchase()
	{
		$data['table_purchase'] = $this->apotek_data->purchase()->result();

		$this->template->write('title', 'Lihat Pembelian', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/table_purchase', $data, true);

		$this->template->render();
	}

	function getmedbysupplier()
	{
		$nama_pemasok = $this->input->post('nama_pemasok');
		$data = $this->apotek_data->getmedbysupplier($nama_pemasok);
		echo json_encode($data);
	}




	function form_customer()
	{
		$this->template->write('title', 'Tambah Pelanggan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/form_customer', '', true);

		$this->template->render();
	}



	function table_customer()
	{
		$this->template->write('title', 'Lihat Pelanggan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/table_customer', '', true);

		$this->template->render();
	}

	function table_invoice()
	{
		$data['table_invoice'] = $this->apotek_data->invoice()->result();
		$this->template->write('title', 'Lihat Penjualan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/table_invoice', $data, true);

		$this->template->render();
	}

	public function akun()
	{
		$data['akun'] = $this->db->get('akun')->result();
		$this->template->write('title', 'Akun', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'akun/index', $data, true);

		$this->template->render();
	}

	public function add_akun()
	{
		// code...
		$data['get_cat'] = $this->apotek_data->get_category();
		$data['get_sup'] = $this->apotek_data->get_supplier();
		$data['get_unit'] = $this->apotek_data->get_unit();
		$this->template->write('title', 'Tambah Akun', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'akun/form', $data, true);

		$this->template->render();
	}

	public function save_akun()
	{
		$nm_akun = $this->input->post('nm_akun');
		$no_akun = $this->input->post('no_akun');
		$saldo_awal = $this->input->post('saldo_awal');
		$header = substr($no_akun, 0, 1);

		$this->form_validation->set_rules('nm_akun', 'nama akun', 'is_unique[akun.nm_akun]', array(
			'is_unique' => '* %s sudah terdaftar sebelumnya.'
		));
		// $this->form_validation->set_message('is_unique[akun.nm_akun]', 'Sudah terdaftar sebelumnya.');
		if ($this->form_validation->run() == FALSE) {
			# code...
			$this->add_akun();
		} else {
			$data = [
				'kd_akun' => $no_akun,
				'header_akun' => $header,
				'nm_akun' => $nm_akun,
				'saldo_awal' => $saldo_awal,
			];
			$this->db->insert('akun', $data);

			$this->session->set_flashdata('akun_added', 'Akun berhasil ditambahkan');
			redirect('example/akun');
		}
	}

	public function update_akun()
	{
		$id = $this->input->post('id');
		$saldo_awal = $this->input->post('saldo_awal');

		$data = [
			'saldo_awal' => $saldo_awal
		];

		$this->db->where('id', $id);
		$this->db->update('akun', $data);

		redirect('example/akun');
	}

	public function jurnal()
	{
		// $data['akun'] = $this->db->get('akun')->result();
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		// print_r($start);exit;
		if (isset($start, $end)) {
			// code...
			$jurnal = $this->apotek_data->jurnal($start, $end)->result();
			$data = [
				'jurnal' => $jurnal
			];
			$this->template->write('title', 'Jurnal Umum', TRUE);
			$this->template->write('header', 'Jurnal Umum');
			$this->template->write_view('content', 'laporan/jurnal', $data, true);
			$this->template->render();
		} else {
			$jurnal = $this->apotek_data->jurnal($start, $end)->result();
			$data = [
				'jurnal' => $jurnal
			];
			$this->template->write('title', 'Jurnal Umum', TRUE);
			$this->template->write('header', 'Jurnal Umum');
			$this->template->write_view('content', 'laporan/jurnal', $data, true);
			$this->template->render();
		}
	}

	public function kartu_stok()
	{
		$nm_obat = $this->input->post('nm_obat');
		if (isset($nm_obat)) {
			$this->db->where('no_obat =', $nm_obat);
			$kartu_stok = $this->db->get('table_stock_card')->result();
			$obat = $this->db->get('table_med')->result();
			$data = [
				'list' => $kartu_stok,
				'obat' => $obat,
				'nm_obat' => $nm_obat
			];

			$this->template->write('title', 'Kartu Gudang', TRUE);
			$this->template->write('header', 'Kartu Gudang');
			$this->template->write_view('content', 'laporan/kartu_stok', $data, true);
			$this->template->render();
		} else {
			$this->db->where('no_obat =', $nm_obat);
			$kartu_stok = $this->db->get('table_stock_card')->result();
			$obat = $this->db->get('table_med')->result();
			$data = [
				'list' => $kartu_stok,
				'obat' => $obat,
				'nm_obat' => '-'
			];

			$this->template->write('title', 'Kartu Gudang', TRUE);
			$this->template->write('header', 'Kartu Gudang');
			$this->template->write_view('content', 'laporan/kartu_stok', $data, true);
			$this->template->render();
		}
	}

	public function bukubesar()
	{
		$periode = $this->input->post('periode');
		$no_coa = $this->input->post('no_coa');

		if (isset($periode, $no_coa)) {
			$tahun1 = date('Y', strtotime($periode));
			$bulan1 = date('m', strtotime($periode));
			$cek = date('m-d-Y', mktime(0, 0, 0, 1, $bulan1 - 1, $tahun1));
			$bulan = substr($cek, 3, 2);
			$tahun = substr($cek, 6, 5);
			$query = "SELECT sum(nominal) as debit , 
			(
				SELECT sum(nominal) 
				FROM jurnal 
				WHERE no_coa = '$no_coa' 
				AND MONTH(tgl_input) <= '$bulan' 
				AND YEAR(tgl_input) <= '$tahun' 
				and posisi_dr_cr = 'k' 
			) AS kredit 
			FROM jurnal 
			WHERE no_coa = '$no_coa' 
			AND MONTH(tgl_input) <= '$bulan' 
			AND YEAR(tgl_input) <= '$tahun' 
			and posisi_dr_cr = 'd'
			";
			$saldo_awal = $this->db->query($query)->row();
			$list = $this->apotek_data->getBB($periode, $no_coa)->result();
			$akun = $this->db->get('akun')->result();
			$saldo = $this->apotek_data->getBB($periode, $no_coa)->row()->saldo_awal ?? 0;
			$kd_akun = $this->apotek_data->getBB($periode, $no_coa)->row()->no_coa;
			$nm_akun = $this->apotek_data->getBB($periode, $no_coa)->row()->nm_akun;
			// print_r($list);exit;
			$data = [
				'list' => $list,
				'akun' => $akun,
				'saldo' => $saldo,
				'saldo_awal' => $saldo_awal,
				'nm_akun' => $nm_akun,
				'kd_akun' => $kd_akun,
			];
			// print_r($data);exit;
			$this->template->write('title', 'Buku Besar', TRUE);
			$this->template->write('header', 'Buku Besar');
			$this->template->write_view('content', 'laporan/bukubesar', $data, true);
			$this->template->render();
		} else {
			$list = $this->apotek_data->getBB($periode, $no_coa)->result();
			$akun = $this->db->get('akun')->result();
			$saldo = 0;
			$tahun1 = date('Y', strtotime($periode));
			$bulan1 = date('m', strtotime($periode));
			$cek = date('m-d-Y', mktime(0, 0, 0, 1, $bulan1 - 1, $tahun1));
			$bulan = substr($cek, 3, 2);
			$tahun = substr($cek, 6, 5);
			$query = "SELECT sum(nominal) as debit , 
			(
				SELECT sum(nominal) 
				FROM jurnal 
				WHERE no_coa = '$no_coa' 
				AND MONTH(tgl_input) <= '$bulan' 
				AND YEAR(tgl_input) <= '$tahun' 
				and posisi_dr_cr = 'k' 
			) AS kredit 
			FROM jurnal 
			WHERE no_coa = '$no_coa' 
			AND MONTH(tgl_input) <= '$bulan' 
			AND YEAR(tgl_input) <= '$tahun' 
			and posisi_dr_cr = 'd'
			";
			$saldo_awal = $this->db->query($query)->row();
			$data = [
				'list' => $list,
				'akun' => $akun,
				'saldo' => $saldo,
				'saldo_awal' => $saldo_awal,
				'nm_akun' => '-',
				'kd_akun' => '-'
			];
			// print_r($list);exit;
			$this->template->write('title', 'Buku Besar', TRUE);
			$this->template->write('header', 'Buku Besar');
			$this->template->write_view('content', 'laporan/bukubesar', $data, true);
			$this->template->render();
		}
	}


	function add_medicine()
	{
		$nama_obat = $this->input->post('nama_obat');
		$penyimpanan = $this->input->post('penyimpanan');
		$stok = $this->input->post('stok');
		$unit = $this->input->post('unit');
		$nama_kategori = $this->input->post('nama_kategori');
		$kedaluwarsa = date("Y-m-d", strtotime($this->input->post('kedaluwarsa')));
		$des_obat = $this->input->post('des_obat');
		$harga_beli = $this->input->post('harga_beli');
		$harga_jual = $this->input->post('harga_jual');
		$nama_pemasok = $this->input->post('nama_pemasok');

		$data = array(
			'nama_obat' => $nama_obat,
			'penyimpanan' => $penyimpanan,
			'stok' => $stok,
			'unit' => $unit,
			'nama_kategori' => $nama_kategori,
			'kedaluwarsa' => $kedaluwarsa,
			'des_obat' => $des_obat,
			'harga_beli' => $harga_beli,
			'harga_jual' => $harga_jual,
			'nama_pemasok' => $nama_pemasok,

		);
		$this->apotek_data->insert_data($data, 'table_med');

		$tb_detail_trans = [
			'id_ref' => $nama_obat,
			'jenis' => 'Persediaan Awal',
			'jumlah' => $stok,
			// 'jumlah_akhir' => $stok,
		];
		$this->db->insert('table_detail_transaksi', $tb_detail_trans);

		$this->session->set_flashdata('med_added', 'Obat berhasil ditambahkan');
		redirect('example/table_med');
	}


	function add_category()
	{
		$nama_kategori = $this->input->post('nama_kategori');
		$des_kat = $this->input->post('des_kat');

		$data = array(
			'nama_kategori' => $nama_kategori,
			'des_kat' => $des_kat,

		);
		$this->apotek_data->insert_data($data, 'table_cat');

		$this->session->set_flashdata('cat_added', 'Kategori berhasil ditambahkan');
		redirect('example/table_cat');
	}

	function add_unit()
	{
		$unit = $this->input->post('unit');
		$data = array(
			'unit' => $unit,


		);
		$this->apotek_data->insert_data($data, 'table_unit');

		$this->session->set_flashdata('unit_added', 'Unit berhasil ditambahkan');
		redirect('example/table_unit');
	}


	function add_supplier()
	{
		$nama_pemasok = $this->input->post('nama_pemasok');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');

		$data = array(
			'nama_pemasok' => $nama_pemasok,
			'alamat' => $alamat,
			'telepon' => $telepon,
		);
		$this->apotek_data->insert_data($data, 'table_sup');

		$this->session->set_flashdata('sup_added', 'Pemasok berhasil ditambahkan');
		redirect('example/table_sup');
	}




	function add_invoice()
	{

		$nama_pembeli = $this->input->post('nama_pembeli');
		$tgl_beli = date("Y-m-d", strtotime($this->input->post('tgl_beli')));
		$grandtotal = $this->input->post('grandtotal');
		$this->db->select('RIGHT(table_invoice.ref,5) as ref', FALSE);
		$this->db->order_by('ref', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('table_invoice');
		if ($query->num_rows() <> 0) {
			$dataku = $query->row();
			$ref = intval($dataku->ref) + 1;
		} else {
			$ref = 1;
		}

		$batas = str_pad($ref, 5, "0", STR_PAD_LEFT);
		$koderef = "PNJ-" . $batas;
		$nama_obat = $this->input->post('nama_obat');
		$harga_jual = $this->input->post('harga_jual');
		$harga_beli = $this->input->post('harga_beli');
		$banyak = $this->input->post('banyak');
		$subtotal = $this->input->post('subtotal');

		foreach ($nama_obat as $key => $val) {

			// edit di no coa \\ jurnal penjualan
			$kas = [
				'id_invoice' => $koderef,
				'tgl_input' => date('Y-m-d'),
				'no_coa' => 111,
				'posisi_dr_cr' => "d",
				'nominal' => $subtotal[$key],
			];
			$this->db->insert("jurnal", $kas);

			$penjualan = [
				'id_invoice' => $koderef,
				'tgl_input' => date('Y-m-d'),
				'no_coa' => 400,
				'posisi_dr_cr' => "k",
				'nominal' => $subtotal[$key],
			];
			$this->db->insert("jurnal", $penjualan);

			$hpp = [
				'id_invoice' => $koderef,
				'tgl_input' => date('Y-m-d'),
				'no_coa' => 511,
				'posisi_dr_cr' => "d",
				'nominal' => $harga_beli[$key],
			];
			$this->db->insert("jurnal", $hpp);

			$pers_obat = [
				'id_invoice' => $koderef,
				'tgl_input' => date('Y-m-d'),
				'no_coa' => 112,
				'posisi_dr_cr' => "k",
				'nominal' => $harga_beli[$key],
			];
			$this->db->insert("jurnal", $pers_obat);

			$tb_detail_trans = [
				'nm_obat' => $val,
				'jenis' => 'Penjualan',
				'jumlah' => $banyak[$key],
				'harga_jual' => $harga_jual[$key],
				'subtotal' => $subtotal[$key],
				// 'jumlah_akhir' => $banyak[$key],
			];
			$this->db->insert('table_detail_transaksi', $tb_detail_trans);

			$data[] = array(
				'nama_pembeli' => $nama_pembeli,
				'tgl_beli' => $tgl_beli,
				'grandtotal' => $grandtotal,
				'ref' => $koderef,
				'nama_obat' => $val,
				'harga_jual' => $harga_jual[$key],
				'banyak' => $banyak[$key],
				'subtotal' => $subtotal[$key],

			);
			// print_r($data);exit;
			$this->db->set('stok', 'stok-' . $banyak[$key], FALSE);
			$this->db->where('nama_obat', $val);
			$updated = $this->db->update('table_med');
		}

		$this->db->insert_batch('table_invoice', $data);
		//stock card
		$this->db->where('ref', $koderef);
		$list_data = $this->db->get('table_invoice')->result_array();

		foreach ($list_data as $data) {

			$pengurang = $data['banyak'];
			$no_obat = $data['nama_obat'];

	        $query111 = "SELECT * FROM table_detail_transaksi WHERE jenis = 'Pembelian' AND nm_obat = '$no_obat' AND  jumlah_akhir > 0 ORDER by id ASC";
	        $row = $this->db->query($query111)->result_array();

	     	foreach($row as $row) {

	          $tgl  = $row['id'];
	          $stok = $row['jumlah_akhir'];
	          	if($pengurang > 0) { 
					$temp = $pengurang;
					$pengurang = $pengurang - $stok;
					if($pengurang > 0) {      
						$stok_update = 0;
					}else{
						$stok_update = $stok - $temp;
					}
	            $this->db->set('jumlah_akhir', $stok_update);
	            $this->db->where('nm_obat', $no_obat);
	            $this->db->where('id', $tgl);
	            $this->db->update('table_detail_transaksi');
		        }
			}
		}

		//
		$this->db->where('ref', $koderef);
		$val0 = $this->db->get('table_invoice')->result_array();
		foreach ($val0 as $data) {
			$this->db->where('nm_obat', $data['nama_obat']);
			$this->db->where('jumlah_akhir >', 0);
			$val1 = $this->db->get('table_detail_transaksi');

			if($val1->num_rows() > 0){
				foreach ($val1->result_array() as $data1){
				$no_obat1 = $data1['nm_obat'];
				$this->db->where('nama_obat', $no_obat1);
				$harga = $this->db->get('table_med')->row()->harga_beli;
				$d1 = array('no_trans' => $koderef,
				'no_obat' => $no_obat1,
				'unit1' => '-',
				'harga1' => '-',
				'total1' => '-',
				'unit2' => '-',
				'harga2' => '-',
				'total2' => '-',
				'unit3' => $data1['jumlah_akhir'],
				'harga3' => $harga,
				'total3' => $data1['jumlah_akhir'] * $harga);
				$this->db->insert('table_stock_card', $d1);
				}
				//
				$this->db->where('no_trans', $koderef);
				$this->db->where('no_obat', $data['nama_obat']);
				$this->db->order_by('no ASC');
				$cek_no = $this->db->get('table_stock_card')->row_array()['no'];
				//
				$this->db->where('no', $cek_no);
				$this->db->set('unit2', $data['banyak']);
				$this->db->set('harga2', $data['harga_jual']);
				$this->db->set('total2', $data['subtotal']);
				$this->db->update('table_stock_card');
					
			}else{
				$d1 = array(
					'no_trans' => $koderef,
					'no_obat' 	=> $data['nama_obat'],
					'unit1' 	=> '-',
					'harga1' 	=> '-',
					'total1'	=> '-',
					'unit2' 	=> $data['banyak'],
					'harga2' 	=> $data['harga_jual'],
					'total2' 	=> $data['subtotal'],
					'unit3' 	=> $data['banyak'],
					'harga3' 	=> $data['harga_beli'],
					'total3' 	=> $data['subtotal'], 
				);
				$this->db->insert('table_stock_card', $d1);
			}
		}

		$this->session->set_flashdata('inv_added', 'Penjualan berhasil ditambahkan');
		redirect('example/table_invoice');
	}

	function add_purchase()
	{

		$nama_pemasok = $this->input->post('nama_pemasok');
		$tgl_beli = date("Y-m-d", strtotime($this->input->post('tgl_beli')));
		$grandtotal = $this->input->post('grandtotal');
		$this->db->select('RIGHT(table_purchase.ref,5) as ref', FALSE);
		$this->db->order_by('ref', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('table_purchase');
		if ($query->num_rows() <> 0) {
			$dataku = $query->row();
			$ref = intval($dataku->ref) + 1;
		} else {
			$ref = 1;
		}

		$batas = str_pad($ref, 5, "0", STR_PAD_LEFT);
		$kode = "PMB-" . $batas;
		$nama_obat = $this->input->post('nama_obat');
		$harga_beli = $this->input->post('harga_beli');
		$banyak = $this->input->post('banyak');
		$subtotal = $this->input->post('subtotal');

		foreach ($nama_obat as $key => $val) {

			$pembelian = [
				'id_invoice' => $kode,
				'tgl_input' => date('Y-m-d'),
				'no_coa' => 500,
				'posisi_dr_cr' => "d",
				'nominal' => $subtotal[$key],
			];
			$this->db->insert("jurnal", $pembelian);

			$kas = [
				'id_invoice' => $kode,
				'tgl_input' => date('Y-m-d'),
				'no_coa' => 111,
				'posisi_dr_cr' => "k",
				'nominal' => $subtotal[$key],
			];
			$this->db->insert("jurnal", $kas);
			// print_r($kas);exit;

			$tb_detail_trans = [
				'nm_obat' => $val,
				'jenis' => 'Pembelian',
				'jumlah' => $banyak[$key],
				'harga_jual' => $harga_beli[$key],
				'subtotal' => $subtotal[$key],
				'jumlah_akhir' => $banyak[$key],
			];
			$this->db->insert('table_detail_transaksi', $tb_detail_trans);

			$data[] = array(
				'nama_pemasok' => $nama_pemasok,
				'tgl_beli' => $tgl_beli,
				'grandtotal' => $grandtotal,
				'ref' => $kode,
				'nama_obat' => $val,
				'harga_beli' => $harga_beli[$key],
				'banyak' => $banyak[$key],
				'subtotal' => $subtotal[$key],
			);

			$this->db->set('stok', 'stok+' . $banyak[$key], FALSE);
			$this->db->where('nama_obat', $val);
			$updated = $this->db->update('table_med');
		}

		$this->db->insert_batch('table_purchase', $data);
		
		$this->db->where('ref', $kode);
		$val0 = $this->db->get('table_purchase')->result_array();
		foreach ($val0 as $data) {

			$this->db->where('nm_obat', $data['nama_obat']);
			$this->db->where('jumlah_akhir >', 0);
			$val1 = $this->db->get('table_detail_transaksi');

			if($val1->num_rows() > 0){
				foreach ($val1->result_array() as $data1){
				$no_obat1 = $data1['nm_obat'];
				$this->db->where('nama_obat', $no_obat1);
				$harga = $this->db->get('table_med')->row()->harga_beli;
				$d1 = array('no_trans' => $kode,
				'no_obat' => $no_obat1,
				'unit1' => '-',
				'harga1' => '-',
				'total1' => '-',
				'unit2' => '-',
				'harga2' => '-',
				'total2' => '-',
				'unit3' => $data1['jumlah_akhir'],
				'harga3' => $harga,
				'total3' => $data1['jumlah_akhir'] * $harga);
				$this->db->insert('table_stock_card', $d1);
				}
				//
				$this->db->where('no_trans', $kode);
				$this->db->where('no_obat', $data['nama_obat']);
				$this->db->order_by('no ASC');
				$cek_no = $this->db->get('table_stock_card')->row_array()['no'];
				//
				$this->db->where('no', $cek_no);
				$this->db->set('unit1', $data['banyak']);
				$this->db->set('harga1', $data['harga_beli']);
				$this->db->set('total1', $data['subtotal']);
				$this->db->update('table_stock_card');
					
			}else{
				$d1 = array(
					'no_trans' => $kode,
					'no_obat' 	=> $data['nama_obat'],
					'unit1' 	=> $data['banyak'],
					'harga1' 	=> $data['harga_beli'],
					'total1'	=> $data['subtotal'],
					'unit2' 	=> '-',
					'harga2' 	=> '-',
					'total2' 	=> '-',
					'unit3' 	=> $data['banyak'],
					'harga3' 	=> $data['harga_beli'],
					'total3' 	=> $data['subtotal'], 
				);
				$this->db->insert('table_stock_card', $d1);
			}
		}

		$this->session->set_flashdata('pur_added', 'Pembelian berhasil ditambahkan');
		redirect('example/table_purchase');
	}



	function invoice_page($ref)
	{
		$where = array('ref' => $ref);
		$data['table_invoice'] = $this->apotek_data->show_data($where, 'table_invoice')->result();
		$data['show_invoice'] = $this->apotek_data->show_invoice($where, 'table_invoice')->result();
		$this->template->write('title', 'Invoice Penjualan', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/invoice', $data, true);

		$this->template->render();
	}


	function purchase_page($ref)
	{
		$where = array('ref' => $ref);
		$data['table_purchase'] = $this->apotek_data->show_data($where, 'table_purchase')->result();
		$data['show_invoice'] = $this->apotek_data->show_invoice($where, 'table_purchase')->result();
		$this->template->write('title', 'Invoice Pembelian', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/purchase', $data, true);

		$this->template->render();
	}


	function edit_form_cat($id_kat)
	{
		$where = array('id_kat' => $id_kat);
		$data['table_cat'] = $this->apotek_data->edit_data($where, 'table_cat')->result();
		$this->template->write('title', 'Ubah Kategori', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/edit_form_cat', $data, true);

		$this->template->render();
	}

	function update_category()
	{
		$id_kat = $this->input->post('id_kat');
		$nama_kategori = $this->input->post('nama_kategori');
		$des_kat = $this->input->post('des_kat');

		$data = array(
			'nama_kategori' => $nama_kategori,
			'des_kat' => $des_kat,
		);

		$where = array(
			'id_kat' => $id_kat
		);

		$this->apotek_data->update_data($where, $data, 'table_cat');

		$this->session->set_flashdata('cat_added', 'Data kategori berhasil diperbarui');
		redirect('example/table_cat');
	}

	function edit_form_med($id_obat)
	{
		$data['get_cat'] = $this->apotek_data->get_category();
		$data['get_sup'] = $this->apotek_data->get_supplier();
		$data['get_unit'] = $this->apotek_data->get_unit();
		$where = array('id_obat' => $id_obat);
		$data['table_med'] = $this->apotek_data->edit_data($where, 'table_med')->result();
		$this->template->write('title', 'Ubah Obat', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/edit_form_med', $data, true);

		$this->template->render();
	}

	function update_medicine()
	{
		$id_obat = $this->input->post('id_obat');
		$nama_obat = $this->input->post('nama_obat');
		$penyimpanan = $this->input->post('penyimpanan');
		$stok = $this->input->post('stok');
		$unit = $this->input->post('unit');
		$nama_kategori = $this->input->post('nama_kategori');
		$kedaluwarsa = date("Y-m-d", strtotime($this->input->post('kedaluwarsa')));
		$des_obat = $this->input->post('des_obat');
		$harga_beli = $this->input->post('harga_beli');
		$harga_jual = $this->input->post('harga_jual');
		$nama_pemasok = $this->input->post('nama_pemasok');

		$data = array(
			'nama_obat' => $nama_obat,
			'penyimpanan' => $penyimpanan,
			'stok' => $stok,
			'unit' => $unit,
			'nama_kategori' => $nama_kategori,
			'kedaluwarsa' => $kedaluwarsa,
			'des_obat' => $des_obat,
			'harga_beli' => $harga_beli,
			'harga_jual' => $harga_jual,
			'nama_pemasok' => $nama_pemasok,
		);

		$where = array(
			'id_obat' => $id_obat
		);

		$this->apotek_data->update_data($where, $data, 'table_med');
		$this->session->set_flashdata('med_added', 'Data obat berhasil diperbarui');
		redirect('example/table_med');
	}


	function edit_form_sup($id_pem)
	{
		$where = array('id_pem' => $id_pem);
		$data['table_sup'] = $this->apotek_data->edit_data($where, 'table_sup')->result();
		$this->template->write('title', 'Ubah Pemasok', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/edit_form_sup', $data, true);

		$this->template->render();
	}

	function edit_form_unit($id_unit)
	{
		$where = array('id_unit' => $id_unit);
		$data['table_unit'] = $this->apotek_data->edit_data($where, 'table_unit')->result();
		$this->template->write('title', 'Ubah Unit', TRUE);
		$this->template->write('header', 'Sistem Informasi Apotek');
		$this->template->write_view('content', 'tes/edit_form_unit', $data, true);

		$this->template->render();
	}


	function update_supplier()
	{
		$id_pem = $this->input->post('id_pem');
		$nama_pemasok = $this->input->post('nama_pemasok');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');

		$data = array(
			'nama_pemasok' => $nama_pemasok,
			'alamat' => $alamat,
			'telepon' => $telepon,
		);

		$where = array(
			'id_pem' => $id_pem
		);

		$this->apotek_data->update_data($where, $data, 'table_sup');

		$this->session->set_flashdata('sup_added', 'Data pemasok berhasil diperbarui');
		redirect('example/table_sup');
	}

	function update_unit()
	{
		$id_unit = $this->input->post('id_unit');
		$unit = $this->input->post('unit');

		$data = array(
			'unit' => $unit,

		);

		$where = array(
			'id_unit' => $id_unit
		);

		$this->apotek_data->update_data($where, $data, 'table_unit');

		$this->session->set_flashdata('unit_added', 'Data unit berhasil diperbarui');
		redirect('example/table_unit');
	}


	function remove_med($id_obat)
	{
		$where = array('id_obat' => $id_obat);
		$this->apotek_data->delete_data($where, 'table_med');
		redirect('example/table_med');
	}

	function remove_cat($id_kat)
	{
		$where = array('id_kat' => $id_kat);
		$this->apotek_data->delete_data($where, 'table_cat');
		redirect('example/table_cat');
	}

	function remove_sup($id_pem)
	{
		$where = array('id_pem' => $id_pem);
		$this->apotek_data->delete_data($where, 'table_sup');
		redirect('example/table_sup');
	}

	function remove_unit($id_unit)
	{
		$where = array('id_unit' => $id_unit);

		$this->apotek_data->delete_data($where, 'table_unit');
		redirect('example/table_unit');
	}


	function remove_inv($ref)
	{
		$where = array('ref' => $ref);
		$this->apotek_data->delete_data($where, 'table_invoice');


		redirect('example/table_invoice');
	}

	function remove_purchase($ref)
	{
		$where = array('ref' => $ref);
		$this->apotek_data->delete_data($where, 'table_purchase');
		redirect('example/table_purchase');
	}


	function product()
	{
		$nama_obat = $this->input->post('nama_obat');
		$data = $this->apotek_data->get_product($nama_obat);
		echo json_encode($data);
	}




	function chart()
	{
		$data = $this->apotek_data->get_chart_cat();
		echo json_encode($data);
	}

	function chart_unit()
	{
		$data = $this->apotek_data->get_chart_unit();
		echo json_encode($data);
	}


	function chart_trans()
	{
		$tahun_beli = $this->input->post('tahun_beli');
		$data = $this->apotek_data->get_chart_trans($tahun_beli);
		echo json_encode($data);
	}

	function chart_purchase()
	{
		$tahun_beli = $this->input->post('tahun_beli');
		$data = $this->apotek_data->get_chart_purchase($tahun_beli);
		echo json_encode($data);
	}

	function gabung()
	{
		$tahun_beli = $this->input->post('tahun_beli');
		$data = $this->apotek_data->get_gabung($tahun_beli);
		echo json_encode($data);
	}

	function topdemand()
	{
		$tahun_beli = $this->input->post('tahun_beli');
		$data = $this->apotek_data->topDemanded($tahun_beli);
		echo json_encode($data);
	}

	function leastdemand()
	{
		$tahun_beli = $this->input->post('tahun_beli');
		$data = $this->apotek_data->leastDemanded($tahun_beli);
		echo json_encode($data);
	}

	function highearn()
	{
		$tahun_beli = $this->input->post('tahun_beli');
		$data = $this->apotek_data->highestEarners($tahun_beli);
		echo json_encode($data);
	}

	function lowearn()
	{
		$tahun_beli = $this->input->post('tahun_beli');
		$data = $this->apotek_data->lowestEarners($tahun_beli);
		echo json_encode($data);
	}

	function toppurchase()
	{
		$tahun_beli = $this->input->post('tahun_beli');
		$data = $this->apotek_data->topPurchase($tahun_beli);
		echo json_encode($data);
	}

	function leastpurchase()
	{
		$tahun_beli = $this->input->post('tahun_beli');
		$data = $this->apotek_data->leastPurchase($tahun_beli);
		echo json_encode($data);
	}

	function highpurchase()
	{
		$tahun_beli = $this->input->post('tahun_beli');
		$data = $this->apotek_data->highestPurchase($tahun_beli);
		echo json_encode($data);
	}

	function lowpurchase()
	{
		$tahun_beli = $this->input->post('tahun_beli');
		$data = $this->apotek_data->lowestPurchase($tahun_beli);
		echo json_encode($data);
	}



	function totale()
	{
		$tahun_beli = $this->input->post('tahun_beli');
		$data = $this->apotek_data->get_tot($tahun_beli);
		echo json_encode($data);
	}
}
