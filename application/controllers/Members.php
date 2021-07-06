<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Members extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_members');
	}

	function foto()
	{
		cek_session_members();
		if (isset($_POST['submit'])) {
			$this->model_members->modupdatefoto();
			redirect('members/dashboard');
		} else {
			redirect('members/dashboard');
		}
	}

	function dashboard()
	{
		cek_session_members();
		$id = $this->session->id_pengguna;
		$data['title'] = 'Dashboard';
		$data['breadcrumb'] = 'Dashboard';
		$row = $this->db->get_where('tb_pengguna', "id_pengguna='$id'")->row_array();
		$data['record'] = $row;
		$id_alamat = $row['id_alamat'];
		$data['rows'] = $this->model_app->alamat_konsumen($id_alamat)->row_array();
		$this->template->load('home/template', 'home/profile/view_dashboard', $data);
	}
	function listtoko()
	{
		cek_session_members();
		$id = $this->session->id_pengguna;
		$data['title'] = 'Toko Saya';
		$data['breadcrumb'] = 'Toko Saya';
		// $row = $this->db->get_where('tb_toko_supplier', "id_pengguna='$id'")->row_array();
		// $data['record'] = $row;
		
		
		$data['record'] = $this->model_app->tampil_data_toko('tb_toko_supplier',$id)->result();
		
		
		$this->template->load('home/template', 'home/profile/view_listtoko', $data);
	}
	function produk_id()
	{
		
		$id_supplier = $this->uri->segment(3);
		$data['title'] = 'Produk Saya';
		$data['breadcrumb'] = 'Produk Saya';
		
		
		$data['record'] = $this->model_app->tampil_data_produk('tb_toko_produk',$id_supplier)->result();
		
		
		$this->template->load('home/template', 'home/profile/view_produk',$data);
	}
	function toko()
	{
		cek_session_members();

		if (isset($_POST['submit'])) {
			$data = array(
				'nama_supplier' => $this->input->post('nama_supplier'),
				'kontak_person' => $this->input->post('kontak_person'),
				'alamat_lengkap' => $this->input->post('alamat_lengkap'),
				// 'alamat_email' => $this->input->post('e'),
				'kode_pos' => $this->input->post('kode_pos'),
				'no_hp' => $this->input->post('no_hp'),
				// 'fax' => $this->input->post('h'),
				'keterangan' => $this->input->post('i'),
				'id_pengguna' => $$this->input->post('id_pengguna'),
			);
			$this->model_app->insert('tb_toko_supplier', $data);
			redirect('members/toko');
		} else {

			$data['title'] = 'Tambah Toko';
			$this->template->load('home/template', 'home/profile/view_toko', $data);
		}
		
	}
	function produk_tambah()
	{

		if (isset($_POST['submit'])) {
			$config['upload_path'] = 'assets/images/produk/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '5000'; // kb
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->do_upload('g');
			$hasil = $this->upload->data();
			if ($hasil['file_name'] == '') {
				$data = array(
					'id_supplier' => $this->input->post('supplier'),
					'id_kategori_produk' => $this->input->post('a'),
					'nama_produk' => $this->input->post('b'),
					'produk_seo' => $this->db->escape_str(seo_title($this->input->post('b'))),
					'satuan' => $this->input->post('c'),
					'harga_beli' => $this->input->post('d'),
					'harga_konsumen' => $this->input->post('f'),
					'diskon' => $this->input->post('diskon'),
					'berat' => $this->input->post('berat'),
					'stok' => $this->input->post('stok'),
					'keterangan' => $this->input->post('ff'),
					'waktu_input' => date('Y-m-d H:i:s'),

				);
			} else {
				$data = array(
					'id_supplier' => $this->input->post('supplier'),
					'id_kategori_produk' => $this->input->post('a'),
					'nama_produk' => $this->input->post('b'),
					'produk_seo' => $this->db->escape_str(seo_title($this->input->post('b'))),
					'satuan' => $this->input->post('c'),
					'harga_beli' => $this->input->post('d'),
					'harga_konsumen' => $this->input->post('f'),
					'diskon' => $this->input->post('diskon'),
					'berat' => $this->input->post('berat'),
					'stok' => $this->input->post('stok'),
					'gambar' => $hasil['file_name'],
					'keterangan' => $this->input->post('ff'),
					'waktu_input' => date('Y-m-d H:i:s'),

				);
			}
			$this->model_app->insert('tb_toko_produk', $data);
			redirect('members/listtoko');
		} else {

			$data['title'] = 'Tambah Produk - Sibook Store';
			$data['record'] = $this->model_app->view_ordering('tb_toko_kategoriproduk', 'id_kategori_produk', 'DESC');
			$data['supp'] = $this->model_app->view_ordering('tb_toko_supplier', 'id_supplier', 'DESC');
			$this->template->load('home/template', 'home/profile/produk_tambah', $data);
		}
	}
	
	function input_data_toko()
	{
		$this->load->model('model_members', 'model');
		$this->model->input_data_toko();
		redirect('members/toko');
	}


	function edit_profile()
	{
		cek_session_members();
		if (isset($_POST['submit'])) {
			$this->model_members->profile_update($this->session->id_pengguna);
			redirect('members/edit_profile');
		} else {
			$data['title'] = 'Ubah Profil Saya';
			$data['breadcrumb'] = 'Ubah Profil';
			$data['row'] = $this->model_app->profile_konsumen($this->session->id_pengguna)->row_array();
			$data['kota'] = $this->model_app->view('tb_kota');
			$this->template->load('home/template', 'home/profile/view_profile_edit', $data);
		}
	}

	function edit_alamat()
	{
		cek_session_members();
		$row = $this->db->get_where('tb_pengguna', array('id_pengguna' => $this->session->id_pengguna))->row_array();
		$id_alamat = $row['id_alamat'];
		if (isset($_POST['submit'])) {
			$this->model_members->alamat_update(decrypt_url($this->input->post('id')));
			redirect('members/edit_alamat');
		} else {
			$data['title'] = 'Ubah Alamat Saya';
			$data['breadcrumb'] = 'Ubah Alamat';
			$data['row'] = $this->db->get_where('tb_alamat', array('id_alamat' => $id_alamat))->row_array();
			$data['kota'] = $this->model_app->view('tb_kota');
			$this->template->load('home/template', 'home/profile/view_alamat', $data);
		}
	}

	function password()
	{
		cek_session_members();
		$id = $this->session->id_pengguna;
		$pass = $this->input->post('pass');
		$pass_new = $this->input->post('pass1');

		$this->form_validation->set_rules('pass1', 'Password', 'required|trim|min_length[6]', [
			'min_length' => 'Password terlalu pendek',
			'required' => 'Password baru wajib diisi'
		]);

		$this->form_validation->set_rules('pass2', 'Password', 'required|trim|matches[pass1]', [
			'matches' => 'Password tidak sama',
			'required' => 'Konfirmasi password baru wajib diisi'
		]);

		$this->form_validation->set_rules('pass', 'Password', 'required|trim', [
			'required' => 'Password saat ini wajib diisi'
		]);

		if ($this->form_validation->run() == FALSE) {

			$data['title'] = 'Ganti Password';
			$data['breadcrumb'] = 'Ganti Password';
			$this->template->load('home/template', 'home/profile/view_password', $data);
		} else {

			$this->db->from('tb_pengguna');
			$this->db->where("(tb_pengguna.id_pengguna = '$id')");
			$user = $this->db->get()->row_array();

			if (password_verify($pass, $user['password'])) {
				$data = array('password' => password_hash($pass_new, PASSWORD_DEFAULT));
				$where = array('id_pengguna' => $id);
				$this->model_app->update('tb_pengguna', $data, $where);
				$this->session->set_flashdata('message', '
				<div class="alert alert-success" role="alert">
            	<center>Password berhasil diganti</center>
				</div>');
				redirect('members/password');
			} else {
				$this->session->set_flashdata('message1', '
				<div class="alert alert-danger" role="alert">
            	<center>Password salah</center>
				</div>');
				redirect('members/password');
			}
		}
	}

	function riwayat_belanja()
	{
		cek_session_members();
		$data['title'] = 'Riwayat Belanja';
		$data['breadcrumb'] = 'Riwayat Belanja';

		$data['record'] = $this->model_app->view_where_ordering('tb_toko_penjualan', array('id_pembeli' => $this->session->id_pengguna), 'id_penjualan', 'DESC');
		$this->template->load('home/template', 'home/profile/view_history', $data);
	}

	function history()
	{
		cek_session_members();
		$data['title'] = 'History Orderan anda';
		$data['record'] = $this->model_app->view_where_ordering('tb_toko_penjualan', array('id_pembeli' => $this->session->id_pengguna), 'id_penjualan', 'DESC');
		$this->template->load('home/template', 'home/produk/view_transaksi_laporan', $data);
	}
}
