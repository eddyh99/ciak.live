<?php
/*----------------------------------------------------------
    Modul Name  : Modul Withdraw
    Desc        : Modul ini di gunakan melakukan withdraw
                  pada wallet

    Sub fungsi  : 
        - withdraw_payment  : View untuk memilih jenis transaksi
        - withdraw_national  : Menginputkan withdraw


        
------------------------------------------------------------*/ 
defined('BASEPATH') or exit('No direct script access allowed');

class Withdraw extends CI_Controller
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

        $balance = apiciaklive(URLAPI . "/v1/member/wallet/getBalance?currency=XEUR&userid=" . $_SESSION["user_id"])->message->balance;
        $currency = apiciaklive(URLAPI . "/v1/member/currency/getall")->message;


        $data = array(
            'title'         => NAMETITLE . ' - Wallet Withdraw',
            'content'       => 'apps/member/wallet/withdraw/app-withdraw',
            'mn_wallet'     => 'active',
            'balance'       => $balance,
            'currency'      => $currency,
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }

    
    public function withdraw_payment()
    {

        $this->form_validation->set_rules('currencycode', 'Currency Code', 'trim|required');
        $this->form_validation->set_rules('xeur', 'XEUR', 'trim|required|greater_than[0]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
            redirect("withdraw");
            return;
        }
    
        $input              = $this->input;
        $currencycode       = $this->security->xss_clean($input->post("currencycode") );
        $xeur               = $this->security->xss_clean($input->post("xeur"));

        $mdata = array(
            "xeur"          => $xeur,
            "currencycode"  => $currencycode
        );

        $this->session->set_userdata('withdraw', $mdata);
        
        $data = array(
            'title'         => NAMETITLE . ' - Wallet Withdraw',
            'content'       => 'apps/member/wallet/withdraw/app-withdraw-payment',
            'mn_wallet'     => 'active',
            'extra'         => 'apps/js/js-index',
        );
                
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function withdraw_national()
    {        

        // print_r($_SESSION);
        // die;

        $data = array(
            'title'         => NAMETITLE . ' - Wallet Withdraw',
            'content'       => 'apps/member/wallet/withdraw/app-withdraw-national',
            'mn_wallet'     => 'active',
            'extra'         => 'apps/js/js-index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function withdraw_international()
    {

        $data = array(
            'title'         => NAMETITLE . ' - Wallet Withdraw',
            'content'       => 'apps/member/wallet/withdraw/international/app-withdraw-international',
            'mn_wallet'     => 'active',
            'extra'         => 'apps/js/js-index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }


    public function withdraw_confirm()
    { 
        // $this->form_validation->set_rules('currencycode', 'Currency Code', 'trim|required');
        $this->form_validation->set_rules('xeuramount', 'XEUR Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('accountHolderName', 'Recipient Name', 'trim|required');
        $this->form_validation->set_rules('causal', 'Causal', 'trim|required');
        $this->form_validation->set_rules('transfer_type', 'Transfer Type', 'trim|required');





        if ($this->form_validation->run() == FALSE) {
            // $this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
            // redirect("withdraw");
            print_r("ERROR VALIDASI");
            return;
        }

        
        $input              = $this->input;
        // $currencycode       = $this->security->xss_clean($input->post("currencycode") );
        $xeuramount         = $this->security->xss_clean($input->post("xeuramount"));
        $transfer_type      = $this->security->xss_clean($input->post("transfer_type"));
        $accountHolderName  = $this->security->xss_clean($input->post("accountHolderName"));
        $causal             = $this->security->xss_clean($input->post("causal"));


        // $iban               = $this->security->xss_clean($input->post("iban"));
        
        
        /* Endpoint untuk untuk proses bank transfer summary
          "/v1/member/wallet/bankSummary
          
          data dikirimkan :
          userid => yang melakukan wd
          amount => jumlah yang di tarik
          currency => target currency
          transfer_type => tipe transfer (circuit, outside)
          
        */
        

        if($_SESSION['withdraw']['currencycode'] == 'EUR'){
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
        }
    
        $mdata=array(
            "userid"        => $_SESSION['user_id'],
            "amount"        => $xeuramount,
            "currency"      => $_SESSION['withdraw']['currencycode'] ,
            "transfer_type" => $transfer_type,
        );



        $summary = apiciaklive(URLAPI . "/v1/member/wallet/bankSummary", json_encode($mdata));
        $balance = apiciaklive(URLAPI . "/v1/member/wallet/getBalance?currency=XEUR&userid=" . $_SESSION["user_id"])->message->balance;
        // print_r(json_encode($summary));
        // die;

        if (@$summary->code != 200) {
            $this->session->set_flashdata("failed", $summary->message);
            redirect("withdraw");
        }


        $temp["xeuramount"]             = $xeuramount;
        $temp["accountHolderName"]      = $accountHolderName;
        $temp["causal"]                 = $causal;
        $temp["transfer_type"]          = $transfer_type;


        if($_SESSION['withdraw']['currencycode'] == 'EUR'){
            $temp["iban"] = $this->security->xss_clean($input->post("iban"));
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["swiftCode"] = $this->security->xss_clean($input->post("swiftCode"));
        }

        $inputdata = (object)$temp;


        // echo "<pre>".print_r($inputdata,true)."</pre>";
        // die;

        $data = array(
            'title'         => NAMETITLE . ' - Wallet Withdraw',
            'content'       => 'apps/member/wallet/withdraw/app-withdraw-national-confirm',
            'mn_wallet'     => 'active',
            'balance'       => $balance,
            'summary'       => $summary->message,
            'dataWD'        => $inputdata,
            'extra'         => 'apps/js/js-index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }



    public function withdraw_notif()
    {
        /* Endpoint untuk untuk proses bank transfer
          "/v1/member/wallet/bankTransfer
          
          data dikirimkan :
          userid => yang melakukan wd
          amount => jumlah yang di tarik
          currency => target currency
          transfer_type => tipe transfer (circuit, outside)
          bank_detail => seperti pada bank          
        */

        // $this->form_validation->set_rules('currencycode', 'Currency Code', 'trim|required');
        $this->form_validation->set_rules('xeuramount', 'XEUR Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('accountHolderName', 'Recipient Name', 'trim|required');
        $this->form_validation->set_rules('causal', 'Causal', 'trim|required');
        $this->form_validation->set_rules('transfer_type', 'Transfer Type', 'trim|required');
        
        if($_SESSION['withdraw']['currencycode'] == 'EUR'){
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
        }

        // VALIDATION INPUT
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed", validation_errors());
            redirect('withdraw');
        }

        $input              = $this->input;
        $accountHolderName  = $this->security->xss_clean($input->post("accountHolderName")) . ' xxx';
        // $currencycode       = $this->security->xss_clean($input->post("currencycode") );
        $xeuramount         = $this->security->xss_clean($input->post("xeuramount"));
        $causal             = $this->security->xss_clean($input->post("causal"));
        $transfer_type      = $this->security->xss_clean($input->post("transfer_type"));


        if($_SESSION['withdraw']['currencycode'] == 'EUR'){
            $iban = $this->security->xss_clean($input->post("iban"));
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $swiftCode = $this->security->xss_clean($input->post("swiftCode"));

            $mdata= array (
                "userid"            => $_SESSION['user_id'],
                "currency"          => $_SESSION['withdraw']['currencycode'],
                "amount"            => $xeuramount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => @$iban,
                    "accountNumber"     => @$accountNumber,
                    "swiftCode"         => @$swiftCode,
                    "causal"            => @$causal,
                )
            );
        }


        $result = apiciaklive(URLAPI . "/v1/member/wallet/bankTransfer", json_encode($mdata));


        $data = array(
            'title'         => NAMETITLE . ' - Wallet Withdraw',
            'content'       => 'apps/member/wallet/withdraw/app-withdraw-national-notif',
            'mn_wallet'     => 'active',
            'extra'         => 'apps/js/js-index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }


    public function to_wallet()
    {

        $data = array(
            'title'         => NAMETITLE . ' - Wallet Withdraw',
            'content'       => 'apps/member/wallet/withdraw/to_wallet/app-to-wallet',
            'mn_wallet'     => 'active',
            'extra'         => 'apps/js/js-index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function to_wallet_wd()
    {

        $data = array(
            'title'         => NAMETITLE . ' - Wallet Withdraw',
            'content'       => 'apps/member/wallet/withdraw/to_wallet/app-to-wallet-wd',
            'mn_wallet'     => 'active',
            'extra'         => 'apps/js/js-index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }
}
