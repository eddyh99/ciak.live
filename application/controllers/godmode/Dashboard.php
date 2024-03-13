<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $currency = allcurrency();
        
        $ciak = ciakadmin(URLAPI . "/v1/admin/mwallet/get_ciakBalance")->message;

        $ciakbalance=array();
        foreach ($currency as $dt){
            $temp["currency"] = $dt;
            $temp["amount"] = 0;
            foreach ($ciak as $cb){
                if ($cb->currency==$dt){
                    $temp["amount"] = $cb->amount;
                    break;
                }
            }
            array_push($ciakbalance,$temp);
        }
        
        
        $trackless= ciakadmin(URLAPI."/v1/trackless/mwallet/getAllBalance")->message;
        $mifbalance=array();
        foreach ($currency as $dt){
            $temp["currency"] = $dt;
            $temp["amount"] = 0;
            foreach ($trackless as $tc){
                if ($tc->currency==$dt){
                    $temp["amount"] = $tc->amount;
                    break;
                }
            }
            array_push($mifbalance,$temp);
        }


        $data = array(
            "title"     => NAMETITLE . " - Admin Dashboard",
            "content"   => "admin/dashboard",
            "mn_dashboard"  => "active",
            "currency"      => $currency,
            "ciakbalance"   => $ciakbalance,
            "trackless"     => $mifbalance
        );

        $this->load->view('admin_template/wrapper', $data);
    }

    public function history()
    {
        $this->form_validation->set_rules('tgl', 'Date', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            header("HTTP/1.1 500 Internal Server Error");
            $error = array(
                "token"     => $this->security->get_csrf_hash(),
                "message"   => validation_errors()
            );
            echo json_encode($error);
            return;
        }

        $input = $this->input;
        $tgl = explode("-", $this->security->xss_clean($input->post("tgl")));
        $awal = date_format(date_create($tgl[0]), "Y-m-d");
        $akhir = date_format(date_create($tgl[1]), "Y-m-d");

        $mdata = array(
            "currency"  => $_SESSION["currency"],
            "date_start" => $awal,
            "date_end"  => $akhir,
            "timezone"  => $_SESSION["time_location"]
        );
        $result = apitrackless(URLAPI . "/v1/admin/wallet/gethistory_bycurrency", json_encode($mdata));
        echo json_encode($result);
    }
}