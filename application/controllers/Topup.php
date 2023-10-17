<?php
/*----------------------------------------------------------
    Modul Name  : Modul Withdraw
    Desc        : Modul ini di gunakan melakukan topup
                  pada wallet

    Sub fungsi  : 
        - withdraw_payment  : View untuk memilih jenis transaksi
        - withdraw_national  : Menginputkan withdraw


        
------------------------------------------------------------*/ 
defined('BASEPATH') or exit('No direct script access allowed');

class Topup extends CI_Controller
{

    public function __construct()
	{
		parent::__construct();
        if (!$this->session->userdata('user_id')) {
            redirect('/');
        }
	}

    public function index()
    {
        
        $currency   = apiciaklive(URLAPI . "/v1/member/currency/getall?depo=yes")->message;

        $data = array();
        foreach ($currency as $dt) {
            if ($dt->status == 'active') {
                $temp["currency"] = $dt->currency;
                $temp["symbol"] = $dt->symbol;
                $temp["status"] = $dt->status;
                $temp["balance"] = apiciaklive(URLAPI . "/v1/member/wallet/getBalance?currency=" . $dt->currency . "&userid=" . $_SESSION["user_id"])->message->balance;
                array_push($data, (object) $temp);
            }
        }

        $currency = (object)$data;
        $data = array(
            'title'         => NAMETITLE . ' - Wallet Topup',
            'content'       => 'apps/member/wallet/topup/app-topup',
            'mn_wallet'     => 'active',
            'currency'      => $currency,
            'extra'         => 'apps/js/js-index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }

    
    public function topup_receive()
    {
        $_SESSION["currency"]=$_GET["cur"];
        $data = array(
            'title'         => NAMETITLE . ' - Wallet Topup',
            'content'       => 'apps/member/wallet/topup/app-topup-receive',
            'mn_wallet'     => 'active',
            'extra'         => 'apps/member/wallet/topup/js/js-topup',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }
    
   public function swapcalculate()
    {
        $amount = $this->input->post("amount");
        $new_amount = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $amount);
        $_POST["amount"]=$new_amount;
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
        $target        = "USDX";
        $amount        = $this->security->xss_clean($input->post("amount"));

        if ($amount > 0) {
            $mdata  = array(
                "source"    => $_SESSION["currency"],
                "target"    => $target,
                "amount"    => $amount,
                "userid"    => $_SESSION["user_id"]
            );
            $result = apiciaklive(URLAPI . "/v1/member/swap/getSummary", json_encode($mdata));
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
    
    public function topup_confirm()
    {
        $amount = $this->input->post("amount");
        $new_amount = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $amount);
        $_POST["amount"]=$new_amount;

        $amountget = $this->input->post("amountget");
        $new_amountget = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $amountget);
        $_POST["amountget"]=$new_amountget;
        
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('quoteid', 'quoteid', 'trim|required');
        $this->form_validation->set_rules('amountget', 'Amount Get', 'trim|required|greater_than[0]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed", validation_errors());
            redirect('topup');
        }

        $input      = $this->input;
        $amount     = $this->security->xss_clean($this->input->post("amount"));
        $target     = 'USDX';
        
        $mdata  = array(
            "source"    => $_SESSION["currency"],
            "target"    => $target,
            "amount"    => $amount,
            "userid"    => $_SESSION["user_id"]
        );

        $result = apiciaklive(URLAPI . "/v1/member/swap/getSummary", json_encode($mdata));
        
        if (@$result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect('topup');
        }
        
        $data = array(
            'title'         => NAMETITLE . ' - Wallet Topup',
            'content'       => 'apps/member/wallet/topup/app-topup-confirm',
            'mn_wallet'     => 'active',
            "target"        => $target,
            "amount"        => $this->security->xss_clean($input->post("amount")),
            "quoteid"       => $this->security->xss_clean($input->post("quoteid")),
            "amountget"     => $this->security->xss_clean($input->post("amountget")),
            "symbol"        => apiciaklive(URLAPI . "/v1/member/currency/getByCurrency?currency=" . $target)->message->symbol
        );
        
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function topup_notif()
    {
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('quoteid', 'quoteid', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed", validation_errors());
            echo "<pre>".print_r(validation_errors(),true)."</pre>";
            die;
            redirect('topup');
        }

        $input    = $this->input;
        $target = 'USDX';
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

            $result = apiciaklive(URLAPI . "/v1/member/swap/swapCurrency", json_encode($mdata));
            if (@$result->code != 200) {
                $this->session->set_flashdata("failed", $result->message);
                redirect('topup');
            }

            $data = array(
                'title'         => NAMETITLE . ' - Wallet Topup',
                'content'       => 'apps/member/wallet/topup/app-topup-notif',
                'mn_wallet'     => 'active',
                "amount"    => $amount,
                "amountget" => $result->message->receive,
                "symbol"    => apiciaklive(URLAPI . "/v1/member/currency/getByCurrency?currency=" . $target)->message->symbol
            );
            $this->load->view('apps/template/wrapper-member', $data);
        }
    }
}