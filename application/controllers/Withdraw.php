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
        $data = array(
            'title'         => NAMETITLE . ' - Wallet Withdraw',
            'content'       => 'apps/member/wallet/withdraw/app-withdraw',
            'mn_wallet'     => 'active',
            'balance'       => apiciaklive(URLAPI . "/v1/member/wallet/getBalance?currency=XEUR&userid=" . $_SESSION["user_id"])->message->balance,
            'currency'      => apiciaklive(URLAPI . "/v1/member/currency/getall")->message
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }

    
    public function withdraw_payment()
    {

        $this->form_validation->set_rules('currencycode', 'Currency Code', 'trim|required');
        $this->form_validation->set_rules('xeur', 'XEUR', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
            redirect("withdraw");
            return;
        }
    
        $input              = $this->input;
        $currencycode       = $this->security->xss_clean($input->post("currencycode") );
        $xeur               = $this->security->xss_clean($input->post("xeur"));

        $mdata = array(
            "xeur"      => $xeur,
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

        $data = array(
            'title'         => NAMETITLE . ' - Wallet Withdraw',
            'content'       => 'apps/member/wallet/withdraw/national/app-withdraw-national',
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
        // $this->form_validation->set_rules('usdx', 'USDX', 'trim|required');
        // $this->form_validation->set_rules('recipientname', 'Recipient Name', 'trim|required');
        // $this->form_validation->set_rules('iban', 'IBAN', 'trim|required');
        // $this->form_validation->set_rules('causal', 'Causal', 'trim|required');

        // if ($this->form_validation->run() == FALSE) {
        //     $this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
        //     redirect("withdraw");
        //     return;
        // }

        
        // $input              = $this->input;
        // $currencycode       = $this->security->xss_clean($input->post("currencycode") );
        // $usdx               = $this->security->xss_clean($input->post("usdx"));

        
        /* Endpoint untuk untuk proses bank transfer summary
          "/v1/member/wallet/bankSummary
          
          data dikirimkan :
          userid => yang melakukan wd
          amount => jumlah yang di tarik
          currency => target currency
          transfer_type => tipe transfer (circuit, outside)
          
          */
        $mdata=array(
                "userid"    => 2,
                "amount"    => 8,
                "currency"  => "EUR",
                "transfer_type" => "circuit"
            );
        $result=apiciaklive(URLAPI . "/v1/member/wallet/bankSummary",json_encode($mdata));
        print_r($result);
        die;
        $data = array(
            'title'         => NAMETITLE . ' - Wallet Withdraw',
            'content'       => 'apps/member/wallet/withdraw/app-withdraw-national-confirm',
            'mn_wallet'     => 'active',
            'balance'       => apiciaklive(URLAPI . "/v1/member/wallet/getBalance?currency=XEUR&userid=" . $_SESSION["user_id"])->message->balance,
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
