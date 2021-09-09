<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('email')) {
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array(); 
		

		$data['title'] = 'Halaman Rekap';
		$data['rekap'] = $this->M_model->RekapData();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar', $data);
		$this->load->view('user/user_rekap', $data);
		$this->load->view('templates/footer', $data);
	} else {
		redirect('auth/blocked');
	}
	}

}