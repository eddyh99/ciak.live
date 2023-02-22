<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if ($this->session->userdata('user_id')) {
			if ($this->session->userdata('role') == 'member') {
				redirect('homepage');
			} elseif ($this->session->userdata('role') == 'admin') {
				redirect('/admin/dashboard');
			}
		}

		$data = [
			'title' => NAMETITLE,
			'content' => 'apps/auth/app-index',
		];
		$this->load->view('apps/template/wrapper-auth', $data);
	}

	public function form_login()
	{
		if ($this->session->userdata('user_id')) {
			if ($this->session->userdata('role') == 'member') {
				redirect('homepage');
			} elseif ($this->session->userdata('role') == 'admin') {
				redirect('/admin/dashboard');
			}
		}

		$data = [
			'title' => NAMETITLE . ' - Login',
			'content' => 'apps/auth/app-login',
		];

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('apps/template/wrapper-auth', $data);
			return;
		} else {
			$uname = $this->security->xss_clean($this->input->post('email'));
			$pass = $this->security->xss_clean($this->input->post('pass'));

			$mdata = array(
				'email' => $uname,
				'password' => sha1($pass)
			);

			$url = URLAPI . "/auth/signin";
			$result = apiciaklive($url, json_encode($mdata));
			if (@$result->code != 200) {
				$this->session->set_flashdata('failed', $result->message);
				$this->load->view('apps/template/wrapper-auth', $data);
				return;
			}

			$session_data = array(
				'user_id'   => $result->message->id,
				'ucode'     => $result->message->ucode,
				'referral'  => $result->message->refcode,
				'time_location' => $result->message->time_location,
			);
			$this->session->set_userdata($session_data);
			redirect('homepage');
		}
	}

	public function signup_referral()
	{
		$data = [
			'title' => NAMETITLE . ' - Signup',
			'content' => 'apps/auth/app-signup-referral',
		];
		$this->load->view('apps/template/wrapper-auth', $data);
	}

	public function form_signup()
	{
		if ($this->session->userdata('user_id')) {
			if ($this->session->userdata('role') == 'member') {
				redirect('homepage');
			} elseif ($this->session->userdata('role') == 'admin') {
				redirect('/admin/dashboard');
			}
		}

		$data = [
			'title' => NAMETITLE . ' - Signup',
			'content' => 'apps/auth/app-signup',
		];

		$this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('pass', 'Password', 'trim|required|min_length[9]');
		$this->form_validation->set_rules('passconfirm', 'Confirm Password', 'trim|required|matches[pass]');
		$this->form_validation->set_rules(
			'agree',
			'Agreement',
			'required',
			[
				'required' => 'Please checked agreement!'
			]
		);
		// please tick consent at the bottom
		$this->form_validation->set_rules('referral', 'Referral', 'trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('apps/template/wrapper-auth', $data);
			return;
		} else {
			$input = $this->input;
			$email = $this->security->xss_clean($input->post("email"));
			$username = $this->security->xss_clean($input->post("username"));
			$pass = $this->security->xss_clean($input->post("pass"));
			$referral = $this->security->xss_clean($input->post("referral"));
			$time_location = $this->security->xss_clean($input->post("time_location"));

			if ($referral) {
				$urlref = URLAPI . "/auth/getmember_byrefcode?referral=" . $referral;
				$resultref = apiciaklive($urlref);
				if ($resultref->code != 200) {
					$this->session->set_flashdata('failed', $resultref->message);
					$this->load->view('apps/template/wrapper-auth', $data);
					return;
				}
			}

			if (empty($time_location)) {
				$time_location = "Asia/Singapore";
			}

			$mdata = array(
				'email' => $email,
				'username' => $username,
				'password' => $pass,
				'referral' => $referral,
				'timezone' => $time_location
			);

			$url = URLAPI . "/auth/register";
			$result = apiciaklive($url, json_encode($mdata));
			if ($result->code == 200) {
				$token = $result->message->token;
				$ucode = $result->message->ucode;

				$this->session->set_flashdata('token', $token);
				$this->session->set_flashdata('ucode', $ucode);

				redirect('auth/signup_success');
			} else {
				$this->session->set_flashdata('failed', $result->message);
				$this->load->view('apps/template/wrapper-auth', $data);
			}
		}
	}

	public function signup_success()
	{
		$data = [
			'title' => NAMETITLE . ' - Signup Success',
			'content' => 'apps/auth/app-signup-success',
		];
		$this->load->view('apps/template/wrapper-auth', $data);
	}

	public function signup_activate($token)
	{
		$url = URLAPI . "/auth/activate?token=" . $token;
		$result = apiciaklive($url);
		if ($result->code == 200) {
			$this->session->set_flashdata('actived', $result->message);
			redirect('auth/form_login');
		}

		$this->session->set_flashdata('failed', $result->message);
		redirect('auth/form_login');
	}

	public function forget_pass()
	{
		$data = [
			'title' => NAMETITLE . ' - Forgot Password',
			'content' => 'apps/auth/app-forgotpass',
		];
		$this->load->view('apps/template/wrapper-auth', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('success', 'You Have been logged out');
		redirect('auth/form_login');
	}

	public function mode()
	{
		$this->session->unset_userdata('mode');

		$mode = $this->input->post('mode');
		if ($mode == 'dark') {
			$session_data = array(
				'mode'   => NULL,
			);
		} else {
			$session_data = array(
				'mode'   => 'checked',
			);
		}
		$this->session->set_userdata($session_data);
	}
}
