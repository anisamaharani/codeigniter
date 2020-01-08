<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cMhs extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mMhs');
	}

	public function index()
	{
		$data['tabTitle'] = 'MAHASISWA';
		$data['mahasiswa'] = $this->mMhs->getAll();

		$this->load->view('Template/header', $data);
		$this->load->view('Mhs/list', $data);
		$this->load->view('Template/footer');
	}

	public function showAddForm()
	{
		$data['tabTitle'] = 'MAHASISWA';
		$data['pageTitle'] = 'Tambah Data Mahasiswa';
	}

	public function addItem()
	{
		$data = [
			'name'       => $this->input->post("name"),
			'nim'         => $this->input->post("nim"),
			'jurusan'    => $this->input->post("jurusan"),
			'prodi'         => $this->input->post("prodi"),
			'kelas'         => $this->input->post("kelas")
		];

		$this->mMhs->addItem($data);

		$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.</div>');
		redirect('cMhs');
	}
	function deleteItem()
	{
		$this->mMhs->deleteItem();
		redirect('cMhs');
	}

	function editItem($id)
	{
		$where = array('id' => $id);
		$data['user'] = $this->m_data->edit($where, 'id')->result();
		$this->load->view('edit', $data);
	}

	function updateItem()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$nim = $this->input->post('nim');
		$jurusan = $this->input->post('jurusan');
		$prodi = $this->input->post('prodi');
		$kelas = $this->input->post('kelas');

		$where = array(
			'id' => $id
		);

		$this->mMhs->updateItem($where, 'id');
	}
}
