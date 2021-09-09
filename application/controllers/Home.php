<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('role_id') == 1) {
		$data['title'] = 'Halaman Kontingen';
		$data['kontingen'] = $this->M_model->KontingenData();
		// $this->M_model->kirimPesan('Test mengri pesan');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('templates/index', $data);
		$this->load->view('templates/footer');
	} else{
		redirect('auth');
	}
	}

	public function tambah_data()
	{
		$data['title'] = 'Halaman Tambah Kontingen';
		$data['kontingen'] = $this->M_model->KontingenData();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('home/tambah_data', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_data()
	{
		$this->M_model->proses_tambah_data();
		$this->session->set_flashdata('pesan' , '<div class="alert alert-info alert-dismissible fade show">
			Data berhasil di tambah!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('Home');
	}

	public function hapus_data($kontingen_id)
	{
		$this->M_model->hapus_data($kontingen_id);
		$this->session->set_flashdata('pesan' , '<div class="alert alert-info alert-dismissible fade show">
			Data berhasil di hapus!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('Home');
	}

	public function edit_data($kontingen_id)
	{
		$data['title'] = 'Halaman Edit Kontingen';
		$data['kontingen'] = $this->M_model->ambil_id_kontingen($kontingen_id);
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('home/edit_data', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_data()
	{
		$this->M_model->proses_edit_data($kontingen_id);
		$this->session->set_flashdata('pesan' , '<div class="alert alert-info alert-dismissible fade show">
			Data berhasil di edit!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('Home');
	}

	public function v_cabor()
	{
		if ($this->session->userdata('role_id') == 1) {
			
		$data['title'] = 'Halaman Cabor';
		$data['cabor'] = $this->M_model->CaborData();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('templates/v_cabor', $data);
		$this->load->view('templates/footer');
		} else {
			redirect('auth');
		}
	}

	public function tambah_cabor()
	{
		$data['title'] = 'Halaman Tambah Cabor';
		$data['cabor'] = $this->M_model->CaborData();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('home/tambah_cabor', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_cabor()
	{
		$this->M_model->proses_tambah_cabor();
		$this->session->set_flashdata('pesan' , '<div class="alert alert-info alert-dismissible fade show">
			Data berhasil di tambah!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('Home/v_cabor');
	}

	public function detail_cabor($cabor_id=0)
	{
		$data['title'] = 'Halaman Tambah Cabor';
		$data['cabordetail'] = $this->M_model->cabordetail($cabor_id);
		$data['kontingendata'] = $this->M_model->kontingenData();
		$data['lokasidata'] = $this->M_model->lokasidata();
		// $data['event'] = $this->M_model->proses_tambahevent();
		//$data['cabor'] = $this->M_model->CaborData($cabor_id);
		$data['lokasicabor'] = $this->M_model->lokasicabor($cabor_id);
		$data['cabor'] = $this->M_model->CaborData();
		$data['cabor_id'] = $cabor_id;


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('home/detail_cabor', $data);
		$this->load->view('home/tambah_lokasi', $data);
		// $this->load->view('templates/tambah_lokasi', $data);
		$this->load->view('templates/footer');
	}

	public function hapus_cabor($cabor_id)
	{
		$this->M_model->hapus_cabor($cabor_id);
		$this->session->set_flashdata('pesan' , '<div class="alert alert-info alert-dismissible fade show">
			Data berhasil di hapus!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('Home/v_cabor');
	}

	public function edit_cabor($cabor_id)
	{
		$data['title'] = 'Halaman Edit Cabor';
		$data['cabor'] = $this->M_model->ambil_id_cabor($cabor_id);
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('home/edit_cabor', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_cabor()
	{
		$this->M_model->proses_edit_cabor($cabor_id);
		$this->session->set_flashdata('pesan' , '<div class="alert alert-info alert-dismissible fade show">
			Data berhasil di edit!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('Home/v_cabor');
	}

	public function v_event($cabor_id=0)
	{
		if ($this->session->userdata('role_id') == 1) {
		$data['title'] = 'Halaman Event';
		$data['cabor_id'] = $cabor_id;
		$data['event'] = $this->M_model->EventData();
		// print_r($data['event']); end();
		$data['cabordata'] = $this->M_model->CaborData();
		$data['medaliref'] = $this->M_model->medaliref();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('templates/v_event', $data);
		$this->load->view('templates/footer');
	} else {
		redirect('auth');
	}
	}

	public function tambah_event($cabor_id=0)
	{
		$data['title'] = 'Halaman Tambah Event';
		$data['cabor_id'] = $cabor_id;
		$data['event'] = $this->M_model->proses_tambahevent();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('home/tambah_event', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_event()
	{
		$this->M_model->proses_tambah_event();
		$this->session->set_flashdata('pesan' , '<div class="alert alert-info alert-dismissible fade show">
			Data berhasil di tambah!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('Home/v_event');
	}

	public function detail_event($event_id=0)
	{
		$data['title'] = 'Halaman Detail Event';
		$data['event_id'] = $event_id;
		$data['eventdetail'] = $this->M_model->eventdetail($event_id);
		$data['medalievent'] = $this->M_model->medalievent($event_id);
		$data['medaliref'] = $this->M_model->medaliref();
		$data['kontingendata'] = $this->M_model->kontingenData();
		$data['eventdata'] = $this->M_model->eventdata();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('home/detail_event', $data);
		$this->load->view('home/tambah_medali', $data);
		$this->load->view('templates/footer');
	}

	public function hapus_event($event_id)
	{
		$this->M_model->hapus_event($event_id);
		$this->session->set_flashdata('pesan' , '<div class="alert alert-info alert-dismissible fade show">
			Data berhasil di hapus!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('Home/v_event');
	}

	public function edit_event($event_id)
	{
		$data['title'] = 'Halaman Edit Cabor';
		$data['event'] = $this->M_model->ambil_id_event($event_id);
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('home/edit_event', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_event()
	{
		$this->M_model->proses_edit_event($event_id);
		$this->session->set_flashdata('pesan' , '<div class="alert alert-info alert-dismissible fade show">
			Data berhasil di edit!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('Home/v_event');
	}

	public function v_medali()
	{
		$data['title'] = 'Halaman Medali';
		$data['medali'] = $this->M_model->MedaliData();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('templates/v_medali', $data);
		$this->load->view('home/tambah_medali', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_medali($event_id=0, $medali_id=0)
	{
		$data['title'] = 'Halaman Tambah Medali';
		
		$data['event_id']=$event_id;
		$data['medaliref'] = $this->M_model->medaliref();
		$data['kontingendata'] = $this->M_model->kontingenData();
		$data['eventdata'] = $this->M_model->eventdata();
		// $data['medali'] = $this->M_model->proses_tambahmedali();
		$data['medali_id'] = $medali_id;
		//print_r($data); die();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('home/tambah_medali', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_medali($event_id=0)
	{
		$this->M_model->proses_tambah_medali();
		$this->session->set_flashdata('pesan' , '<div class="alert alert-info alert-dismissible fade show">
			Data berhasil di tambah!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('Home/detail_event/'.$event_id);
	}

	public function hapus_medali($event_id=0)
	{
		$id = $this->input->post('id');
		$this->M_model->hapus_medali($id);
		$this->session->set_flashdata('pesan' , '<div class="alert alert-info alert-dismissible fade show">
			Data berhasil di hapus!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('Home/detail_event/'.$event_id);
	}

	public function edit_medali($id)
	{
		$data['title'] = 'Halaman Edit Medali';
		$data['medali'] = $this->M_model->ambil_id_medali($id);
		$data['medaliref'] = $this->M_model->medaliref();
		$data['kontingendata'] = $this->M_model->kontingenData();
		$data['lokasidata'] = $this->M_model->lokasidata();

		// $data['medaliedit'] = $this->M_model->medaliedit($id);
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('home/edit_medali', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_medali($event_id=0)
	{
		$this->M_model->proses_edit_medali($id);
		$this->session->set_flashdata('pesan' , '<div class="alert alert-info alert-dismissible fade show">
			Data berhasil di edit!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('Home/detail_event/'.$event_id);
	}

	public function v_rekap()
	{
		if ($this->session->userdata('email')) {
		$data['title'] = 'Halaman Rekap';
		$data['rekap'] = $this->M_model->RekapData();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('templates/v_rekap', $data);
		$this->load->view('templates/footer');
	} else {
		redirect('auth');
	}
}

	

	public function tambah_lokasi($cabor_id=0)
	{
		$data['title'] = 'Halaman Rekap';
		// $data['rekap'] = $this->M_model->RekapData();
		$data['kontingendata'] = $this->M_model->kontingenData($cabor_id);
		$data['cabor_id'] = $cabor_id;
		$data['event'] = $this->M_model->proses_tambahevent($cabor_id);
		$data['cabor'] = $this->M_model->CaborData();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('templates/tambah_lokasi', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_lokasi($cabor_id=0)
	{
		$this->M_model->proses_tambah_lokasi();
		$this->session->set_flashdata('pesan' , '<div class="alert alert-info alert-dismissible fade show">
			Data berhasil di tambah!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('Home/detail_cabor/'.$cabor_id);
	}

	public function hapus_lokasi($cabor_id=0)
	{
		$id = $this->input->post('lokasi_id');
		$this->M_model->hapus_lokasi($lokasi_id);
		$this->session->set_flashdata('pesan' , '<div class="alert alert-info alert-dismissible fade show">
			Data berhasil di hapus!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('Home/detail_cabor/'.$cabor_id);
	}

	public function edit_lokasi($lokasi_id)
	{
		$data['title'] = 'Halaman Edit Medali';
		$data['medali'] = $this->M_model->ambil_id_medali($id);
		$data['medaliref'] = $this->M_model->medaliref();
		$data['kontingendata'] = $this->M_model->kontingenData();
		$data['lokasicabor'] = $this->M_model->lokasicabor($cabor_id);
		$data['medalievent'] = $this->M_model->medalievent($event_id);
		

		// $data['medaliedit'] = $this->M_model->medaliedit($id);
		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('home/edit_medali', $data);
		$this->load->view('templates/footer');
	}

	public function proses_edit_lokasi($cabor_id=0)
	{
		$this->M_model->proses_edit_lokasi($lokasi_id);
		$this->session->set_flashdata('pesan' , '<div class="alert alert-info alert-dismissible fade show">
			Data berhasil di edit!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('Home/detail_cabor/'.$cabor_id);
	}

}
