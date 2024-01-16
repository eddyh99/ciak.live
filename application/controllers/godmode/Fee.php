<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fee extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('user_id'))) {
			redirect(base_url());
		}
	}

	public function index()
	{

		$data = array(
			"title"     => NAMETITLE . " - Ciak Fee",
			"content"   => "admin/fee/fee",
			"mn_fee"    => "active",
			"extra"     => "admin/fee/js/js_fee",
		);

		$this->load->view('admin_template/wrapper', $data);
	}

	public function getfee()
	{
		$mfee = ciakadmin(URLAPI . "/v1/admin/fee/getciakFee?currency=USDX");
		$mdata = array();
		if (@$mfee->code == 200) {
			$mdata = array(
				"wallet2wallet_pct" => number_format($mfee->message->wallet2wallet_pct * 100, 2, ".", ","),
				"referral_lv1" => number_format($mfee->message->referral_lv1 * 100, 2, ".", ","),
				"referral_lv2" => number_format($mfee->message->referral_lv2 * 100, 2, ".", ","),
			);
		} else {
			$mdata = array(
				"wallet2wallet_pct" => number_format(0, 2, ".", ","),
				"referral_lv1" => number_format(0, 2, ".", ","),
				"referral_lv2" => number_format(0, 2, ".", ","),
			);
		}
		echo json_encode($mdata);
	}

	public function editfee()
	{
		$mfee = ciakadmin(URLAPI . "/v1/admin/fee/getciakFee?currency=USDX");

		$mdata = array();
		if (@$mfee->code == 200) {
			$mdata = array(
				"wallet2wallet_pct" => number_format($mfee->message->wallet2wallet_pct * 100, 2, ".", ","),
				"referral_lv1" => number_format($mfee->message->referral_lv1 * 100, 2, ".", ","),
				"referral_lv2" => number_format($mfee->message->referral_lv2 * 100, 2, ".", ","),
			);
		} else {
			$mdata = array(
				"wallet2wallet_pct" => number_format(0, 2, ".", ","),
				"referral_lv1" => number_format(0, 2, ".", ","),
				"referral_lv2" => number_format(0, 2, ".", ","),
			);
		}

		$data = array(
			"title"     => NAMETITLE . " - Edit Ciak Fee",
			"content"   => "admin/fee/editfee",
			"extra"     => "admin/js/js_btn_disabled",
			"mn_fee"    => "active",
			"fee"       => $mdata,
		);

		$this->load->view('admin_template/wrapper', $data);
	}

	public function updatefee()
	{
		$input		= $this->input;

		$new_wallet2wallet_pct = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("wallet2wallet_pct"));
        $_POST["wallet2wallet_pct"]=$new_wallet2wallet_pct;
		$new_referral_lv1 = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("referral_lv1"));
        $_POST["referral_lv1"]=$new_referral_lv1;
		$new_referral_lv2 = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $this->input->post("referral_lv2"));
        $_POST["referral_lv2"]=$new_referral_lv2;

		$this->form_validation->set_rules('wallet2wallet_pct', 'Transaction fee (%)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('referral_lv1', 'Referral Lv 1 (%)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('referral_lv2', 'Referral Lv 2 (%)', 'trim|required|greater_than_equal_to[0]');


		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
			redirect(base_url() . "godmode/fee/editfee/" . $currency);
			return;
		}

		$wallet2wallet_pct = $this->security->xss_clean($input->post("wallet2wallet_pct"));
		$referral_lv1 = $this->security->xss_clean($input->post("referral_lv1"));
		$referral_lv2 = $this->security->xss_clean($input->post("referral_lv2"));

		if ($wallet2wallet_pct == '') {
			$wallet2wallet_pct = 0;
		}
		if ($referral_lv1 == '') {
			$referral_lv1 = 0;
		}
		if ($referral_lv2 == '') {
			$referral_lv2 = 0;
		}

		$mdata = array(
			"currency"           => "USDX",
			"wallet2wallet_pct" => $wallet2wallet_pct / 100,
			"referral_lv1"      => $referral_lv1 / 100,
			"referral_lv2"      => $referral_lv2 / 100,
		);
		
		$result = ciakadmin(URLAPI . "/v1/admin/fee/setFee", json_encode($mdata));
        
		if (@$result->code == 200) {
			$this->session->set_flashdata("success", "Default Fee is successfully updated");
			redirect('godmode/fee');
		} else {
			$this->session->set_flashdata("failed", $result->message);
			redirect(base_url() . "godmode/fee/editfee/" . $currency);
		}
	}
}