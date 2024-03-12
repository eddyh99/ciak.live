<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Swap extends CI_Controller
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

        $mdata = array(
            "userid" => $_SESSION["user_id"]
        );

        echo '<pre>'.print_r($_SESSION,true).'</pre>';

        $url = URLAPI . "/v1/trackless/currency/getAllCurrency";
        $result  = apitrackless($url, json_encode($mdata))->message;

        $mdata = array(
            "title"     => NAMETITLE." - Swap",
            "content"   => "admin/swap/index",
            "mn_swap"   => "active",
            "extra"     => "admin/swap/js/js_index"
        );

        $this->load->view('admin_template/wrapper2', $mdata);
    }

    public function swapcalculate()
    {
        $amount        = $this->security->xss_clean($this->input->post("amount"));
        $a = $this->input->post("amount");
        $b = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $a);
        $_POST["amount"]=$b;

        $this->form_validation->set_rules('toswap', 'Currency Target', 'trim|required|max_length[3]|min_length[3]');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');

        if ($this->form_validation->run() == FALSE) {
            header("HTTP/1.1 500 Internal Server Error");
            $error = array(
                "token"     => $this->security->get_csrf_hash(),
                "message"   => validation_errors()
            );
            echo json_encode($error);
            return;
        }

        $input        = $this->input;
        $target        = $this->security->xss_clean($input->post("toswap"));
        $amount        = $this->security->xss_clean($input->post("amount"));

        if ($amount > 0) {
            $mdata  = array(
                "source"    => $_SESSION["currency"],
                "target"    => $target,
                "amount"    => $amount
            );

            if($_SESSION["role"]=="super admin"){
                $result = ciakadmin(URLAPI . "/v1/trackless/swap/swaptrackless_summary", json_encode($mdata));
                // print_r(json_encode($result));
                // die;
            } else {
                $result = ciakadmin(URLAPI . "/v1/admin/swap/swap_summary", json_encode($mdata));
                // print_r(json_encode($result));
                // die;
            }
            if (@$result->code != 200) {
                header("HTTP/1.1 500 Internal Server Error");
                $error = array(
                    "token"     => $this->security->get_csrf_hash(),
                    "message"   => $result->message
                );
                echo json_encode($error);
                return;
            }

            $data = array(
                "quoteid"   => $result->message->quoteid,
                "token"     => $this->security->get_csrf_hash(),
                "receive"   => $result->message->receive
            );
            echo json_encode($data);
        } else {
            header("HTTP/1.1 500 Internal Server Error");
            $error = array(
                "token"     => $this->security->get_csrf_hash(),
                "message"   => "Amount swap can't be negative"
            );
            echo json_encode($error);
            return;
        }
    }

    public function admin_confirm()
    {
        $amount        = $this->security->xss_clean($this->input->post("amount"));
        $a = $this->input->post("amount");
        $b = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $a);
        $_POST["amount"]=$b;

        $this->form_validation->set_rules('toswap', 'Currency Target', 'trim|required|max_length[3]|min_length[3]');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('quoteid', 'quoteid', 'trim|required');
        $this->form_validation->set_rules('amountget', 'Amount Get', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed", validation_errors());
            redirect('godmode/swap');
        }

        $input    = $this->input;
        $target = $this->security->xss_clean($input->post("toswap"));
        $data = array(
            "target"    => $target,
            "amount"    => $this->security->xss_clean($input->post("amount")),
            "quoteid"   => $this->security->xss_clean($input->post("quoteid")),
            "amountget" => $this->security->xss_clean($input->post("amountget")),
            "symbol"    => ciakadmin(URLAPI . "/v1/trackless/currency/getsymbol?currency=" . $target)->message
        );



        $data = array(
            "title"     => NAMETITLE . " - Swap",
            "content"   => "admin/swap/swap-confirm",
            "mn_swap"    => "active",
            "extra"     => "admin/swap/js/js_swap",
            "data"     => $data,
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function admin_notif()
    {
        $this->form_validation->set_rules('toswap', 'Currency Target', 'trim|required|max_length[3]|min_length[3]');
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('quoteid', 'quoteid', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed", validation_errors());
            redirect('godmode/swap');
        }

        $input    = $this->input;
        $target = $this->security->xss_clean($input->post("toswap"));
        $amount = $this->security->xss_clean($input->post("amount"));
        $quoteid = $this->security->xss_clean($input->post("quoteid"));

        if ($amount > 0) {
            $mdata = array(
                "userid"    => $_SESSION["user_id"],
                "source"    => $_SESSION["currency"],
                "target"    => $target,
                "amount"    => $amount,
                "quoteid"   => $quoteid,
            );

            if($_SESSION["role"]=="super admin"){
                $result = ciakadmin(URLAPI . "/v1/trackless/swap/swaptracklessProcess", json_encode($mdata));

            }else {
                $result = ciakadmin(URLAPI . "/v1/admin/swap/swapProcess", json_encode($mdata));
            }

            if (@$result->code != 200) {
                $this->session->set_flashdata("failed", $result->message);
                redirect('godmode/swap');
            }

            $datatc = array(
                "amount"    => $amount,
                "amountget" => $result->message->receive,
                // "symbol"    => ciakadmin(URLAPI . "/v1/admin/currency/getsymbol?currency=" . $target)->message
            );

            $data = array(
                "title"     => NAMETITLE . " - Swap",
                "content"   => "admin/swap/swap-notif",
                "mn_swap"    => "active",
                "extra"     => "admin/swap/js/js_swap",
                "data"     => $datatc,
            );

            $this->load->view('admin_template/wrapper2', $data);
        }
    }
}