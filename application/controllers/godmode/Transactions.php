<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transactions extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('user_id'))) {
            redirect(base_url());
        }
    }

    public function topup()
    {
        $data = array(
            "title"     => NAMETITLE . " - History Transactions Topup",
            "content"   => "admin/history/topup",
            "extra"     => "admin/history/js/js_topup",
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function historytopup()
    {
        $input = $this->input;
        $tgl = explode("-", $this->security->xss_clean($input->post("tgl")));
        $awal = date_format(date_create($tgl[0]), "Y-m-d");
        $akhir = date_format(date_create($tgl[1]), "Y-m-d");

        $mdata = array(
            "date_start" => $awal,
            "date_end"  => $akhir,
            "currency"  => $_SESSION["currency"],
            "timezone"  => $_SESSION["time_location"]
        );
        $result = ciakadmin(URLAPI . "/v1/admin/mwallet/gethistory_topup", json_encode($mdata));
        $data["history"] = $result->message;
        echo json_encode($data);
    }

    public function towallet()
    {
        $data = array(
            "title"     => NAMETITLE . " - History Transactions",
            "content"   => "admin/history/towallet",
            "extra"     => "admin/history/js/js_towallet",
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function historywallet()
    {
        $input = $this->input;
        $tgl = explode("-", $this->security->xss_clean($input->post("tgl")));
        $awal = date_format(date_create($tgl[0]), "Y-m-d");
        $akhir = date_format(date_create($tgl[1]), "Y-m-d");

        $mdata = array(
            "date_start" => $awal,
            "date_end"  => $akhir,
            "currency"  => $_SESSION["currency"],
            "timezone"  => $_SESSION["time_location"]
        );
        $result = ciakadmin(URLAPI . "/v1/admin/mwallet/gethistory_wallet", json_encode($mdata));
        $data["history"] = $result->message;
        echo json_encode($data);
    }

    public function tobank()
    {
        $data = array(
            "title"     => NAMETITLE . " - History Transactions Withdraw",
            "content"   => "admin/history/tobank",
            "extra"     => "admin/history/js/js_tobank",
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function historybank()
    {
        $input = $this->input;
        $tgl = explode("-", $this->security->xss_clean($input->post("tgl")));
        $awal = date_format(date_create($tgl[0]), "Y-m-d");
        $akhir = date_format(date_create($tgl[1]), "Y-m-d");

        $mdata = array(
            "date_start" => $awal,
            "date_end"  => $akhir,
            "currency"  => $_SESSION["currency"],
            "timezone"  => $_SESSION["time_location"]
        );
        $result = ciakadmin(URLAPI . "/v1/admin/mwallet/gethistory_tobank", json_encode($mdata));
        $data["history"] = $result->message;
        echo json_encode($data);
    }
}