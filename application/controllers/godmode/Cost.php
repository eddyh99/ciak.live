<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cost extends CI_Controller
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
        $currency = ["EUR", "USD", "AUD","CAD","GBP"];
		$data = array(
			"title"     => NAMETITLE . " - Management Cost",
			"content"   => "admin/cost/cost",
			"mn_cost"    => "active",
			"extra"     => "admin/cost/js/js_cost",
			"currency"  => $currency,
		);

		$this->load->view('admin_template/wrapper', $data);
	}

	public function getcost()
	{
		$currency		= $this->security->xss_clean($_GET["currency"]);

		$mfee = ciakadmin(URLAPI . "/v1/trackless/cost/getCost?currency=" . $currency);

		$mdata = array();
		if (@$mfee->code == 200) {
			$mdata = array(
				"topup_circuit_fxd"      => number_format($mfee->message->topup_nasional_fxd, 2, ".", ","),
				"topup_circuit_pct"      => number_format($mfee->message->topup_nasional_pct * 100, 2, ".", ","),
				"walletbank_circuit_fxd" => number_format($mfee->message->withdraw_nasional_fxd, 2, ".", ","),
				"walletbank_circuit_pct" => number_format($mfee->message->withdraw_nasional_pct * 100, 2, ".", ","),
				"walletbank_outside_fxd" => number_format($mfee->message->withdraw_inter_fxd, 2, ".", ","),
				"walletbank_outside_pct" => number_format($mfee->message->withdraw_inter_pct * 100, 2, ".", ","),
				"swap"                   => number_format($mfee->message->swap * 100, 2, ".", ","),
			);
		} else {
			$mdata = array(
				"topup_circuit_fxd" => number_format(0, 2, ".", ","),
				"topup_circuit_pct" => number_format(0, 2, ".", ","),
				"walletbank_circuit_fxd" => number_format(0, 2, ".", ","),
				"walletbank_circuit_pct" => number_format(0, 2, ".", ","),
				"walletbank_outside_fxd" => number_format(0, 2, ".", ","),
				"walletbank_outside_pct" => number_format(0, 2, ".", ","),
				"swap"                   => number_format(0, 2, ".", ","),
			);
		}
		echo json_encode($mdata);
	}
	
	public function editcost()
	{
		$this->form_validation->set_rules('currency', 'Currency', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', validation_errors());
			redirect(base_url() . "godmode/cost");
			return;
		}

		$input = $this->input;

		$curr = $this->security->xss_clean($input->post("currency"));

		$mfee = ciakadmin(URLAPI . "/v1/trackless/cost/getCost?currency=" . $curr);
        
		$mdata = array();
		if (@$mfee->code == 200) {
			$mdata = array(
				"topup_circuit_fxd"      => number_format($mfee->message->topup_nasional_fxd, 2, ".", ","),
				"topup_circuit_pct"      => number_format($mfee->message->topup_nasional_pct * 100, 2, ".", ","),
				"walletbank_circuit_fxd" => number_format($mfee->message->withdraw_nasional_fxd, 2, ".", ","),
				"walletbank_circuit_pct" => number_format($mfee->message->withdraw_nasional_pct * 100, 2, ".", ","),
				"walletbank_outside_fxd" => number_format($mfee->message->withdraw_inter_fxd, 2, ".", ","),
				"walletbank_outside_pct" => number_format($mfee->message->withdraw_inter_pct * 100, 2, ".", ","),
				"swap"                   => number_format($mfee->message->swap * 100, 2, ".", ","),
			);
		} else {
			$mdata = array(
				"topup_circuit_fxd" => number_format(0, 2, ".", ","),
				"topup_circuit_pct" => number_format(0, 2, ".", ","),
				"walletbank_circuit_fxd" => number_format(0, 2, ".", ","),
				"walletbank_circuit_pct" => number_format(0, 2, ".", ","),
				"walletbank_outside_fxd" => number_format(0, 2, ".", ","),
				"walletbank_outside_pct" => number_format(0, 2, ".", ","),
				"swap"                   => number_format(0, 2, ".", ","),
			);
		}
		
        $currency = ["EUR", "USD", "AUD","CAD","GBP"];
		$data = array(
			"title"     => NAMETITLE . "- Management Cost",
			"content"   => "admin/cost/cost-edit",
			"mn_dcost"  => "active",
			"extra"     => "admin/js/js_btn_disabled",
			"currency"  => $currency,
			"dcost"  	=> $mdata,
			"curr"		=> $curr,
		);

		$this->load->view('admin_template/wrapper', $data);
	}
	
public function editcost_prosses()
	{
		$input = $this->input;
		$curr = $this->security->xss_clean($input->post("currency"));
		
		$topup_circuit_fxd = $this->security->xss_clean($input->post("topup_circuit_fxd"));
		$topup_circuit_pct = $this->security->xss_clean($input->post("topup_circuit_pct"));
		$walletbank_circuit_fxd = $this->security->xss_clean($input->post("walletbank_circuit_fxd"));
		$walletbank_circuit_pct = $this->security->xss_clean($input->post("walletbank_circuit_pct"));
		$walletbank_outside_fxd = $this->security->xss_clean($input->post("walletbank_outside_fxd"));
		$walletbank_outside_pct = $this->security->xss_clean($input->post("walletbank_outside_pct"));
		$swap = $this->security->xss_clean($input->post("swap"));

        $new_topup_circuit_fxd = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $topup_circuit_fxd);
        $new_topup_circuit_pct = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $topup_circuit_pct);
        $new_walletbank_circuit_fxd = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $walletbank_circuit_fxd);
        $new_walletbank_circuit_pct = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $walletbank_circuit_pct);
        $new_walletbank_outside_fxd = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $walletbank_outside_fxd);
        $new_walletbank_outside_pct = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $walletbank_outside_pct);
        $new_swap = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $swap);

        $_POST["topup_circuit_fxd"]     = $new_topup_circuit_fxd;
        $_POST["topup_circuit_pct"]     = $new_topup_circuit_pct;
        $_POST["walletbank_circuit_fxd"]= $new_walletbank_circuit_fxd;
        $_POST["walletbank_circuit_pct"]= $new_walletbank_circuit_pct;
        $_POST["walletbank_outside_fxd"]= $new_walletbank_outside_fxd;
        $_POST["walletbank_outside_pct"]= $new_walletbank_outside_pct;
        $_POST["swap"]                  = $new_swap;

		if (($curr == "USD") ||
			($curr == "EUR") ||
			($curr == "AUD") ||
			($curr == "NZD") ||
			($curr == "CAD") ||
			($curr == "HUF") ||
			($curr == "SGD") ||
			($curr == "TRY") ||
			($curr == "GBP") ||
			($curr == "RON")
		) {
			$this->form_validation->set_rules('topup_circuit_fxd', 'Topup Circuit (Fixed)', 'trim|required|greater_than_equal_to[0]');
			$this->form_validation->set_rules('topup_circuit_pct', 'Topup Circuit (%)', 'trim|required|greater_than_equal_to[0]');

				if (($curr == "USD") ||
					($curr == "EUR")
				) {
					$this->form_validation->set_rules('walletbank_outside_fxd', 'Walletbank Outside (Fixed)', 'trim|required|greater_than_equal_to[0]');
					$this->form_validation->set_rules('walletbank_outside_pct', 'Walletbank Outside (%)', 'trim|required|greater_than_equal_to[0]');
				}
			}
			
		

		$this->form_validation->set_rules('currency', 'Currency', 'trim|required');
		$this->form_validation->set_rules('walletbank_circuit_fxd', 'Walletbank Circuit (Fixed)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('walletbank_circuit_pct', 'Walletbank Circuit (%)', 'trim|required|greater_than_equal_to[0]');
		$this->form_validation->set_rules('swap', 'Swap (%)', 'trim|required|greater_than_equal_to[0]');


		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('failed', validation_errors());
			redirect(base_url() . "godmode/cost");
			return;
		}

		$topup_circuit_fxd = $this->security->xss_clean($input->post("topup_circuit_fxd"));
		$topup_circuit_pct = $this->security->xss_clean($input->post("topup_circuit_pct"));
		$walletbank_circuit_fxd = $this->security->xss_clean($input->post("walletbank_circuit_fxd"));
		$walletbank_circuit_pct = $this->security->xss_clean($input->post("walletbank_circuit_pct"));
		$walletbank_outside_fxd = $this->security->xss_clean($input->post("walletbank_outside_fxd"));
		$walletbank_outside_pct = $this->security->xss_clean($input->post("walletbank_outside_pct"));
		$swap = $this->security->xss_clean($input->post("swap"));

		if ($topup_circuit_fxd == '') {
			$topup_circuit_fxd = 0;
		}
		if ($topup_circuit_pct == '') {
			$topup_circuit_pct = 0;
		}
		if ($walletbank_circuit_fxd == '') {
			$walletbank_circuit_fxd = 0;
		}
		if ($walletbank_circuit_pct == '') {
			$walletbank_circuit_pct = 0;
		}
		if ($walletbank_outside_fxd == '') {
			$walletbank_outside_fxd = 0;
		}
		if ($walletbank_outside_pct == '') {
			$walletbank_outside_pct = 0;
		}
		if ($swap == '') {
			$swap = 0;
		}

		$dataUpdate = array(
			"topup_nasional_fxd" => $topup_circuit_fxd,
			"topup_nasional_pct" => $topup_circuit_pct / 100,
			"withdraw_nasional_fxd" => $walletbank_circuit_fxd,
			"withdraw_nasional_pct" => $walletbank_circuit_pct / 100,
			"withdraw_inter_fxd" => $walletbank_outside_fxd,
			"withdraw_inter_pct" => $walletbank_outside_pct / 100,
			"swap"              => $swap / 100,
			"currency"          => $curr,
		);

		$result = ciakadmin(URLAPI . "/v1/trackless/cost/setCost", json_encode($dataUpdate));
		if (@$result->code != 200) {
			$this->session->set_flashdata("failed", $result->message);
			redirect("godmode/cost");
		} else {
			$this->session->set_flashdata("success", "Default Cost Already Set");
			redirect("godmode/cost");
		}
	}	
}