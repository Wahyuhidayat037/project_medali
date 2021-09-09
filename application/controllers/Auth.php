<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {

			$data['title'] = 'Login';
			$this->load->view('templateslogin/login_header', $data);
			$this->load->view('templateslogin/login');
			$this->load->view('templateslogin/login_footer');
		} else {
			$this->_login();
		}
	}

	private function _login() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// $user = $this->db->get_where('user', ['email' => $email])->row_array();
		$user = $this->db->query("
			SELECT A.*, B.*
			FROM user A
			LEFT JOIN user_role B
			ON A.role_id=B.id
			WHERE A.email='$email'
			")->row_array();
		
		if ($user) {
			if ($user['is_active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id'],
						'role' => $user['role'],
						'name' => $user['name'],
						'waktu_buat' => $user['waktu_buat']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('Home');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
						Paswword salah!!
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
						</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
					Email belum aktivasi!!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
				Email belum terdaftar!!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('auth');
		}
	}

	public function registrasi()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email sudah digunakan!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Pasword tidak sama!',
			'min_length' => 'Pasword harus 3 karakter!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
			
			$data['title'] = 'Registrasi';
			$this->load->view('templateslogin/login_header', $data);
			$this->load->view('templateslogin/registrasi');
			$this->load->view('templateslogin/login_footer');

		} else {


			$email = $this->input->post('email', true);
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($email),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0,
				'waktu_buat' => time()
			];

			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'date_token' => time()
			];

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);

			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
				Email berhasil ditambah!!. Silahkan aktivasi
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('auth');

		}

	}

	public function _sendEmail($token, $type) {
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'wh260200@gmail.com',
			'smtp_pass' => 'wahyu260200',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"
		];


		$this->load->library('email', $config);  
		$this->email->initialize($config); 
		
		$this->email->from('wh260200@gmail.com', 'Web Programing wahyu');
		$this->email->to($this->input->post('email'));
		if ($type == 'verify') {
			
			$this->email->subject('Account Verification');
			$this->email->message('Klik untuk verifikasi : <a href="'.base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token).'">Activ</a>');
		} else if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Klik untuk Reset password : <a href="'.base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token).'">Reset Password</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function verify() {
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
		} 

		if ($user_token) {
			if (time() - $user_token['date_token'] < (60*60*24)) {
				$this->db->set('is_active', 1);
				$this->db->where('email', $email);
				$this->db->update('user');

				$this->db->delete('user_token', ['email' => $email]);

				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
					' . $email . ' berhasil aktivasi!! silahkan login.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('auth');
			} else {
				$this->db->delete('user', ['email' => $email]);
				$this->db->delete('user_token', ['email' => $email]);

				$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
					Anda gagal registrasi. Token expired!!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('auth');

			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible fade show">
				Anda gagal registrasi!!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('auth');
		}
	}

	public function logout() {
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
			Anda berhasil logout!!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div>');
		redirect('auth');
	}

	public function blocked() {
		$this->load->view('templateslogin/blocked');
	}

	public function forgotPassword() {
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Lupa Password';
			$this->load->view('templateslogin/login_header', $data);
			$this->load->view('templateslogin/forgot-password');
			$this->load->view('templateslogin/login_footer');
		} else {
			$email = $this->input->post('email');
			$user  = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

			if($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_token' => time()
				];

				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
					Cek emai, Untuk reset!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('auth/forgotpassword');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
					Email belum terdaftar!! or aktivasi
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('auth/forgotpassword');
			}
		}
	}

	public function resetPassword() {
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
			if ($user_token) {
				$this->session->set_flashdata('reset_email', $email);
				$this->changePassword();
			}else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
					Reset password gagal!!. Token failed
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>');
				redirect('auth/forgotpassword');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
				Reset password gagal!!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('auth/forgotpassword');
		}
	}

	public function changePassword() {

		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Lupa Password';
			$this->load->view('templateslogin/login_header', $data);
			$this->load->view('templateslogin/change-password');
			$this->load->view('templateslogin/login_footer');
		} else {
			$password = password_hash($this->input->post('password1'),PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
				Password berhasil di ubah!!. Sialhkan login.
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('auth');
		}
	}

}
