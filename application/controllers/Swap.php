<?php
/*----------------------------------------------------------
    Modul Name  : Modul Withdraw
    Desc        : Modul ini di gunakan melakukan Swap
                  pada wallet

    Sub fungsi  : 
        - withdraw_payment  : View untuk memilih jenis transaksi
        - withdraw_national  : Menginputkan withdraw


        
------------------------------------------------------------*/ 
defined('BASEPATH') or exit('No direct script access allowed');

class Swap extends CI_Controller
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
    //    echo "<pre>".print_r($currency,true)."</pre>";
    //     die;
        $data = array(
            'title'         => NAMETITLE . ' - Swap ',
            'content'       => 'apps/member/wallet/swap/app-swap',
            'mn_wallet'     => 'active',
            'currency'      => $currency,
            'extra'         => 'apps/js/js-index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }

    
    public function swap_receive()
    {
        $_SESSION["currency"]=$_GET["cur"];
        $data = array(
            'title'         => NAMETITLE . ' - Swap',
            'content'       => 'apps/member/wallet/swap/app-swap-receive',
            'mn_wallet'     => 'active',
            'extra'         => 'apps/member/wallet/swap/js/js-swap',
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
            // echo "<pre>".print_r($mdata,true)."</pre>";
            
            $result = apiciaklive(URLAPI . "/v1/member/swap/getSummary", json_encode($mdata));
            // echo "<pre>".print_r($result,true)."</pre>";
            // die;


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
    
    public function swap_confirm()
    {
        $amount = $this->input->post("amount");
        $new_amount = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $amount);
        $_POST["amount"]=$new_amount;

        $amountget = $this->input->post("amountget");
        $new_amountget = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $amountget);
        $_POST["amountget"]=$new_amountget;
        
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('quoteid', 'quoteid', 'trim');
        $this->form_validation->set_rules('amountget', 'Amount Get', 'trim|required|greater_than[0]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed", validation_errors());
            redirect('swap');
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

        $symbol = apiciaklive(URLAPI . "/v1/member/currency/getByCurrency?currency=" . $target)->message->symbol;

        // print_r($symbol);
        // die;
        
        $data = array(
            'title'         => NAMETITLE . ' - Swap',
            'content'       => 'apps/member/wallet/swap/app-swap-confirm',
            'mn_wallet'     => 'active',
            "target"        => $target,
            "amount"        => $this->security->xss_clean($input->post("amount")),
            "quoteid"       => $this->security->xss_clean($input->post("quoteid")),
            "amountget"     => $this->security->xss_clean($input->post("amountget")),
            "symbol"        => $symbol,
        );
        
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function swap_notif()
    {
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('quoteid', 'quoteid', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed", validation_errors());
            redirect('swap');
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
            print_r(json_encode($mdata));
            // print_r(json_encode($result));
            die;
            if (@$result->code != 200) {
                $this->session->set_flashdata("failed", $result->message);
                redirect('swap');
            }

            $data = array(
                'title'         => NAMETITLE . ' - Swap',
                'content'       => 'apps/member/wallet/swap/app-swap-notif',
                'mn_wallet'     => 'active',
                "amount"    => $amount,
                "amountget" => $result->message->receive,
                "symbol"    => apiciaklive(URLAPI . "/v1/member/currency/getByCurrency?currency=" . $target)->message->symbol
            );
            $this->load->view('apps/template/wrapper-member', $data);
        }
    }
}