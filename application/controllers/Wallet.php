<?php
/*----------------------------------------------------------
    Modul Name  : Modul Wallet
    Desc        : Modul ini di gunakan memanajemen wallet yang 
                  dimiliki member dan melakukan proses deposit

    Sub fungsi  : 
        - deposit           : untuk memilih jenis deposit yang akan dilakukan
                              member diantaranya -> national, international, wallet2wallet
        - deposit_national  : Ketika member memilih nasional akan diarahkan untuk memasukan
                              nominal jumlah yang akan deposit
        - national_confirm  : Memberikan konfirmasi kepada member
        - national_info     : Memberikan informasi yang bisa disalin kepada member

        - deposit_international : Ketika member memilih international akan diarahkan untuk memasukan
                                  nominal jumlah yang akan deposit


        - deposit_towallet : Ketika member memilih wallet2wallet akan diarahkan untuk memasukan
                                  nominal jumlah yang akan deposit




        
------------------------------------------------------------*/ 
defined('BASEPATH') or exit('No direct script access allowed');

class Wallet extends CI_Controller
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
        
        // print_r(json_encode($_SESSION));
        // die;

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
            'title'         => NAMETITLE . ' - Wallet',
            'content'       => 'apps/member/wallet/app-wallet',
            'botbar'        => 'apps/member/app-botbar',
            'popup'         => 'apps/member/app-popup',
            'currency'      => $currency,
            'mn_wallet'     => 'active',
            'extra'         => 'apps/js/js-index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function deposit()
    {
        $currency = $_GET["cur"];
        $_SESSION["currency"]=$currency;
        $data = array(
            'title'         => NAMETITLE . ' - Wallet Deposit',
            'content'       => 'apps/member/wallet/deposit/comingsoon',
            'mn_wallet'     => 'active',
            'extra'         => 'apps/js/js-index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function deposit_national()
    {

        $data = array(
            'title'         => NAMETITLE . ' - Wallet Deposit',
            'content'       => 'apps/member/wallet/deposit/national/app-deposit-national',
            'mn_wallet'     => 'active',
            'extra'         => 'apps/js/js-index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function national_confirm()
    {
        $_POST["amount"]=preg_replace("/,(?=[\d,]*\.\d{2}\b)/", '', $_POST["amount"]);
        $_POST["confirm_amount"]=preg_replace("/,(?=[\d,]*\.\d{2}\b)/", '', $_POST["confirm_amount"]);

        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('confirm_amount', 'Confirm Amount', 'trim|required|greater_than[0]|matches[amount]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
            redirect("wallet/deposit_national");
            return;
        }

        $input              = $this->input;
        $amount             = $this->security->xss_clean($input->post("amount"));

        $data = array(
            'title'         => NAMETITLE . ' - Wallet Deposit',
            'content'       => 'apps/member/wallet/deposit/national/app-deposit-national-confirm',
            'amount'        => $amount,
            'mn_wallet'     => 'active',
            'extra'         => 'apps/js/js-index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function national_info()
    {
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
            redirect("wallet/national_deposit");
            return;
        }

        $input              = $this->input;
        $amount             = $this->security->xss_clean($input->post("amount"));
        
        $mdata = array(
            'userid'        => $_SESSION["user_id"],
            'amount'        => $amount,
            'currency'      => $_SESSION["currency"],
            'transfer_type' => 'topup national'
        );
        

        $result = apiciaklive(URLAPI . "/v1/member/wallet/topup", json_encode($mdata));
        print_r(json_encode($result));
        die;
        
        if (@$result->code != "200") {
            $this->session->set_flashdata('failed', $result->message);
            redirect("wallet/national_deposit");
            return;
        }
        //$result='{"content":{"payinBank":{"bankName":"Wise Europe SA\/NV","bankAddress":{"country":"BE","firstLine":"Avenue Louise 54, Room s52","postCode":"1050","city":"Brussels","state":null}},"payinBankAccount":{"currency":"EUR","details":[{"type":"recipientName","label":"Recipient name","value":"TransferWise Europe SA"},{"type":"IBAN","label":"IBAN","value":"BE79967040785533"},{"type":"BIC","label":"Bank code (BIC\/SWIFT)","value":"TRWIBEB1XXX"}]},"wiseInformation":{"localCompanyName":"Wise Europe SA","localAddress":{"country":"BE","firstLine":"Avenue Louise 54\/S52","postCode":"1050","city":"Brussels","state":null}}},"causal":"RCPT026837"}}';

        $data['title'] = NAMETITLE . " - Top Up Process";

        $data = array(
            'title'         => NAMETITLE . ' - Wallet Deposit',
            'content'       => 'apps/member/wallet/deposit/national/app-deposit-national-info',
            'mn_wallet'     => 'active',
            'extra'         => 'apps/js/js-index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function deposit_international()
    {

        $data = array(
            'title'         => NAMETITLE . ' - Wallet Deposit',
            'content'       => 'apps/member/wallet/deposit/international/app-deposit-international',
            'mn_wallet'     => 'active',
            'extra'         => 'apps/js/js-index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function deposit_towallet()
    {

        $data = array(
            'title'         => NAMETITLE . ' - Wallet Deposit',
            'content'       => 'apps/member/wallet/deposit/towallet/app-deposit-towallet',
            'mn_wallet'     => 'active',
            'extra'         => 'apps/js/js-index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }

}