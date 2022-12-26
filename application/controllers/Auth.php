<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function index()
	{
		$data = [
			'title' => NAMETITLE,
			'content' => 'apps/auth/app-index',
		];
		$this->load->view('apps/template/wrapper-auth', $data);
	}

	public function form_login()
	{
		$data = [
			'title' => NAMETITLE . ' - Login',
			'content' => 'apps/auth/app-login',
		];
		$this->load->view('apps/template/wrapper-auth', $data);
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
		$data = [
			'title' => NAMETITLE . ' - Signup',
			'content' => 'apps/auth/app-signup',
		];
		$this->load->view('apps/template/wrapper-auth', $data);
	}

	public function signup_success()
	{
		$data = [
			'title' => NAMETITLE . ' - Signup Success',
			'content' => 'apps/auth/app-signup-success',
		];
		$this->load->view('apps/template/wrapper-auth', $data);
	}

	public function forget_pass()
	{
		$data = [
			'title' => NAMETITLE . ' - Forgot Password',
			'content' => 'apps/auth/app-forgotpass',
		];
		$this->load->view('apps/template/wrapper-auth', $data);
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