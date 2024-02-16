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

        $balance = apiciaklive(URLAPI . "/v1/member/wallet/getBalance?currency=USDX&userid=" . $_SESSION["user_id"])->message->balance;
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
        $this->form_validation->set_rules('usdx', 'USDX', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
            redirect("withdraw");
            return;
        }
    
        $input              = $this->input;
        $currencycode       = $this->security->xss_clean($input->post("currencycode") );
        $usdx               = $this->security->xss_clean($input->post("usdx"));

        $mdata = array(
            "usdx"          => $usdx,
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

        $this->form_validation->set_rules('currencycode', 'Currency Code', 'trim|required');
        $this->form_validation->set_rules('usdx', 'USDX', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
            redirect("withdraw");
            return;
        }
    
        $input              = $this->input;
        $currencycode       = $this->security->xss_clean($input->post("currencycode") );
        $usdx               = $this->security->xss_clean($input->post("usdx"));

        $mdata = array(
            "usdx"          => $usdx,
            "currencycode"  => $currencycode
        );

        $this->session->set_userdata('withdraw', $mdata);

        $currencyCodeAdd = array(
            "BDT" => "BD",
            "CZK" => "CZ",
            "CLP" => "CL",
            "EGP" => "EG",
            "GHS" => "GH",
            "HKD" => "HK",
            "IDR" => "ID",
            "ILS" => "IL",
            "INR" => "IN",
            "JPY" => "JP",
            "KES" => "KE",
            "LKR" => "LK",
            "MAD" => "MA",
            "NGN" => "NG",
            "NPR" => "NP",
            "PEN" => "PE",
            "PHP" => "PH",
            "RUB" => "RU",
            "SGD" => "SG",
            "THB" => "TH",
            "VND" => "VN",
            "ZAR" => "ZA"
        );

        if (@$currencyCodeAdd[$mdata['currencycode']] == '') {
            $getcodecur = '';
        } else {
            $getcodecur = apiciaklive(URLAPI . "/v1/member/wallet/getBankCode?country=" . $currencyCodeAdd[$mdata['currencycode']])->message->values;
        }
        

        $EURCountry = array(
            array("name"=>"Austria","code"=>"AT"),
            array("name"=>"Netherlands (the),","code"=>"NL"),
            array("name"=>"Belgium","code"=>"BE"),
            array("name"=>"Bulgaria","code"=>"BG"),
            array("name"=>"Croatia","code"=>"HR"),
            array("name"=>"Cyprus","code"=>"CYP"),
            array("name"=>"Denmark","code"=>"DNK"),
            array("name"=>"Estonia","code"=>"EST"),
            array("name"=>"Finland","code"=>"FIN"),
            array("name"=>"France","code"=>"FRA"),
            array("name"=>"Germany","code"=>"DEU"),
            array("name"=>"Hungary","code"=>"HUN"),
            array("name"=>"Ireland","code"=>"IRL"),
            array("name"=>"Italy","code"=>"IT"),
            array("name"=>"Latvia","code"=>"LVA"),
            array("name"=>"Lithuania","code"=>"LTU"),
            array("name"=>"Luxembourg","code"=>"LUX"),
            array("name"=>"Malta","code"=>"MLT"),
            array("name"=>"Poland","code"=>"POL"),
            array("name"=>"Portugal","code"=>"PRT"),
            array("name"=>"Romania","code"=>"ROU"),
            array("name"=>"Slovenia","code"=>"SVN"),
            array("name"=>"Slovakia","code"=>"SVK"),
            array("name"=>"Spain","code"=>"ESP"),
            array("name"=>"Sweden","code"=>"SWE")
        );


        $data = array(
            'title'         => NAMETITLE . ' - Wallet Withdraw',
            'content'       => 'apps/member/wallet/withdraw/app-withdraw-national',
            'mn_wallet'     => 'active',
            'codecur'       => @$getcodecur,
            'withdraw'      => $mdata,
            'countryEUR'    => $EURCountry,
            'extra'         => 'apps/member/wallet/withdraw/currency/js/_js_form_currency',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function getbranchCode()
    {


        $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim|required');
        $this->form_validation->set_rules('trimcurrency', 'Currency Code', 'trim|required');

        $input = $this->input;
        $bankCode = $this->security->xss_clean($input->post("bankCode"));
        $trimcurrency = $this->security->xss_clean($input->post("trimcurrency"));


        $url = URLAPI . "/v1/member/wallet/getBranchCode?country=".$trimcurrency."&bankcode=".$bankCode;
        $result = apiciaklive($url)->message->values;

        echo json_encode($result);
    }

    public function withdraw_international()
    {

        $data = array(
            'title'         => NAMETITLE . ' - Wallet Withdraw',
            'content'       => 'apps/member/wallet/withdraw/app-withdraw-international',
            'mn_wallet'     => 'active',
            'extra'         => 'apps/js/js-index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }


    public function withdraw_confirm()
    { 
             
        /* Endpoint untuk untuk proses bank transfer summary
          "/v1/member/wallet/bankSummary
          
          data dikirimkan :
          userid => yang melakukan wd
          amount => jumlah yang di tarik
          currency => target currency
          transfer_type => tipe transfer (circuit, outside)
          
        */

        $this->form_validation->set_rules('usdxamount', 'USDX Amount', 'trim|required');
        $this->form_validation->set_rules('accountHolderName', 'Recipient Name', 'trim|required');
        $this->form_validation->set_rules('causal', 'Causal', 'trim|required');
        $this->form_validation->set_rules('transfer_type', 'Transfer Type', 'trim|required');
        // $this->form_validation->set_rules(
        //     'transfer_type',
        //     'Transfer Type',
        //     array(
        //         'trim',
        //         'required',
        //         array(
        //             'undefined',
        //             function ($str) {
        //                 return $str === "circuit" || $str === "outside";
        //             }
        //         )
        //     ),
        //     array(
        //         'undefined' => 'Unknown {field} [' . $this->input->post('transfer_type') . ']',
        //     )
        // );
   
        

        if($_SESSION['withdraw']['currencycode'] == 'EUR'){
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
            $this->form_validation->set_rules('firstLine', 'First Line', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
        }

        if($_SESSION['withdraw']['currencycode'] == 'USD'){
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim|required');
            $this->form_validation->set_rules('firstLine', 'First Line', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('state', 'State initial', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country initial', 'trim');
            $this->form_validation->set_rules('abartn', 'Abartn', 'trim');
            $this->form_validation->set_rules('swiftCode', 'swift Code', 'trim');
        }

        if($_SESSION['withdraw']['currencycode'] == 'AED'){
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if($_SESSION['withdraw']['currencycode'] == 'ARS'){
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('taxId', 'TAX ID', 'trim');
        }

        if($_SESSION['withdraw']['currencycode'] == 'AUD'){
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
            $this->form_validation->set_rules('firstLine', 'First Line', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country initial', 'trim');
            $this->form_validation->set_rules('state', 'State initial', 'trim');
            $this->form_validation->set_rules('bsbCode', 'BSB Code', 'trim');
            $this->form_validation->set_rules('billerCode', 'BPAY biller code', 'trim');
            $this->form_validation->set_rules('customerReferenceNumber', 'Customer Reference Number (CRN)', 'trim');
        }

        if($_SESSION['withdraw']['currencycode'] == 'BDT'){
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('taxId', 'TAX ID', 'trim');
        }

        if($_SESSION['withdraw']['currencycode'] == 'CAD'){
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('institutionNumber', 'Institution Number', 'trim');
            $this->form_validation->set_rules('transitNumber', 'Transit Number', 'trim');
            $this->form_validation->set_rules('interacAccount', 'Interac registered email', 'trim');
        }

        if($_SESSION['withdraw']['currencycode'] == 'CLP'){
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('rut', 'Rut', 'trim');
            $this->form_validation->set_rules('phoneNumber', 'Phone Number', 'trim');
        }

        if($_SESSION['withdraw']['currencycode'] == 'CNY'){
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "CZK") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'bank Code', 'trim');
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "DKK") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "EGP") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "GBP") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
            $this->form_validation->set_rules('sortCode', 'Sort Code', 'trim');
        }

        
        if ($_SESSION['withdraw']['currencycode'] == "GEL") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "GHS") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('branchCode', 'Branch Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "HKD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "HRK") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "HUF") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        
        if ($_SESSION['withdraw']['currencycode'] == "IDR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "ILS") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "INR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('ifscCode', 'ifsc Code', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "JPY") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('branchCode', 'Branch Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "KES") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "KRW") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('dateOfBirth', 'Date of Birth', 'trim');
        }

        
        if ($_SESSION['withdraw']['currencycode'] == "LKR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('branchCode', 'Branch Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "MAD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "MXN") {
            $this->form_validation->set_rules('clabe', 'Clabe', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "MYR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "NGN") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "NOK") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "NPR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "NZD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('BIC', 'BIC', 'trim');
        }

        
        if ($_SESSION['withdraw']['currencycode'] == "PHP") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "PKR") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "PLN") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "RON") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "SEK") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "SGD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "THB") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "TRY") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "UAH") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
            $this->form_validation->set_rules('phoneNumber', 'Phone Number', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "VND") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "ZAR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
        }

        


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('failed', "<p style='color:black'>" . validation_errors() . "</p>");
            redirect("withdraw");
        }
    
        $input              = $this->input;
        $usdxamount         = $this->security->xss_clean($input->post("usdxamount"));
        $transfer_type      = $this->security->xss_clean($input->post("transfer_type"));
        $accountHolderName  = $this->security->xss_clean($input->post("accountHolderName"));
        $causal             = $this->security->xss_clean($input->post("causal"));
        
        $mdata=array(
            "userid"        => $_SESSION['user_id'],
            "amount"        => $usdxamount,
            "currency"      => $_SESSION['withdraw']['currencycode'] ,
            "transfer_type" => $transfer_type,
        );




        $summary = apiciaklive(URLAPI . "/v1/member/wallet/bankSummary", json_encode($mdata));
        // echo "<pre>".print_r($summary,true)."</pre>";
        // die;
        $balance = apiciaklive(URLAPI . "/v1/member/wallet/getBalance?currency=USDX&userid=" . $_SESSION["user_id"])->message->balance;

        if (@$summary->code != 200) {
            $this->session->set_flashdata("failed", $summary->message);
            redirect("withdraw");
        }

        $temp["usdxamount"]             = $usdxamount;
        $temp["accountHolderName"]      = $accountHolderName;
        $temp["causal"]                 = $causal;
        $temp["transfer_type"]          = $transfer_type;


        if($_SESSION['withdraw']['currencycode'] == 'EUR'){
            $temp["iban"]           = $this->security->xss_clean($input->post("iban"));
            $temp["accountNumber"]  = @$this->security->xss_clean($input->post("accountNumber"));
            $temp["swiftCode"]      = @$this->security->xss_clean($input->post("swiftCode"));
            $temp["firstLine"]      = $this->security->xss_clean($input->post("firstLine"));
            $temp["postCode"]       = $this->security->xss_clean($input->post("postCode"));
            $temp["city"]           = $this->security->xss_clean($input->post("city"));
            $temp["countryCode"]    = $this->security->xss_clean($input->post("countryCode"));
        }

        if($_SESSION['withdraw']['currencycode'] == 'USD'){
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["city"] = $this->security->xss_clean($input->post("city"));
            $temp["postCode"] = $this->security->xss_clean($input->post("postCode"));
            $temp["firstLine"] = $this->security->xss_clean($input->post("firstLine"));
            $temp["accountType"] = $this->security->xss_clean($input->post("accountType"));
            $temp["state"] = $this->security->xss_clean($input->post("state"));
            $temp["countryCode"] = $this->security->xss_clean($input->post("countryCode"));
            $temp["abartn"] = $this->security->xss_clean($input->post("abartn"));
            $temp["swiftCode"] = $this->security->xss_clean($input->post("swiftCode"));
        }

        if($_SESSION['withdraw']['currencycode'] == 'AED'){
            $temp["iban"]           = $this->security->xss_clean($input->post("iban"));
        }

        if($_SESSION['withdraw']['currencycode'] == 'ARS'){
            $temp["accountNumber"]  = $this->security->xss_clean($input->post("accountNumber"));
            $temp["taxId"]      = $this->security->xss_clean($input->post("taxId"));
        }

        if($_SESSION['withdraw']['currencycode'] == 'AUD'){
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["city"] = $this->security->xss_clean($input->post("city"));
            $temp["postCode"] = $this->security->xss_clean($input->post("postCode"));
            $temp["firstLine"] = $this->security->xss_clean($input->post("firstLine"));
            $temp["countryCode"] = $this->security->xss_clean($input->post("countryCode"));
            $temp["state"] = $this->security->xss_clean($input->post("state"));
            $temp["bsbCode"] = $this->security->xss_clean($input->post("bsbCode"));
            $temp["billerCode"] = $this->security->xss_clean($input->post("billerCode"));
        }

        if($_SESSION['withdraw']['currencycode'] == 'BDT'){
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["branchCode"] = $this->security->xss_clean($input->post("branchCode"));
        }

        if($_SESSION['withdraw']['currencycode'] == 'CAD'){
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["accountType"] = $this->security->xss_clean($input->post("accountType"));
            $temp["institutionNumber"] = $this->security->xss_clean($input->post("institutionNumber"));
            $temp["transitNumber"] = $this->security->xss_clean($input->post("transitNumber"));
            $temp["interacAccount"] = $this->security->xss_clean($input->post("interacAccount"));
        }

        if($_SESSION['withdraw']['currencycode'] == 'CLP'){
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["accountType"] = $this->security->xss_clean($input->post("accountType"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["rut"] = $this->security->xss_clean($input->post("rut"));
            $temp["phoneNumber"] = $this->security->xss_clean($input->post("phoneNumber"));
        }

        if($_SESSION['withdraw']['currencycode'] == 'CNY'){
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "CZK") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["iban"] = $this->security->xss_clean($input->post("iban"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "DKK") {
            $temp["iban"] = $this->security->xss_clean($input->post("iban"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "EGP") {
            $temp["iban"] = $this->security->xss_clean($input->post("iban"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "GBP") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["iban"] = $this->security->xss_clean($input->post("iban"));
            $temp["sortCode"] = $this->security->xss_clean($input->post("sortCode"));
        }

        
        if ($_SESSION['withdraw']['currencycode'] == "GEL") {
            $temp["iban"] = $this->security->xss_clean($input->post("iban"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "GHS") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["branchCode"] = $this->security->xss_clean($input->post("branchCode"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "HKD") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "HRK") {
            $temp["iban"] = $this->security->xss_clean($input->post("iban"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "HUF") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["iban"] = $this->security->xss_clean($input->post("iban"));
        }

        
        if ($_SESSION['withdraw']['currencycode'] == "IDR") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "ILS") {
            $temp["iban"] = $this->security->xss_clean($input->post("iban"));
            $temp["countryCode"] = $this->security->xss_clean($input->post("countryCode"));
            $temp["city"] = $this->security->xss_clean($input->post("city"));
            $temp["firstLine"] = $this->security->xss_clean($input->post("firstLine"));
            $temp["postCode"] = $this->security->xss_clean($input->post("postCode"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "INR") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["ifscCode"] = $this->security->xss_clean($input->post("ifscCode"));
            $temp["countryCode"] = $this->security->xss_clean($input->post("countryCode"));
            $temp["city"] = $this->security->xss_clean($input->post("city"));
            $temp["firstLine"] = $this->security->xss_clean($input->post("firstLine"));
            $temp["postCode"] = $this->security->xss_clean($input->post("postCode"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "JPY") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["accountType"] = $this->security->xss_clean($input->post("accountType"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["branchCode"] = $this->security->xss_clean($input->post("branchCode"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "KES") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "KRW") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["dateOfBirth"] = $this->security->xss_clean($input->post("dateOfBirth"));
        }

        
        if ($_SESSION['withdraw']['currencycode'] == "LKR") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["branchCode"] = $this->security->xss_clean($input->post("branchCode"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "MAD") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["countryCode"] = $this->security->xss_clean($input->post("countryCode"));
            $temp["city"] = $this->security->xss_clean($input->post("city"));
            $temp["firstLine"] = $this->security->xss_clean($input->post("firstLine"));
            $temp["postCode"] = $this->security->xss_clean($input->post("postCode"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "MXN") {
            $temp["clabe"] = $this->security->xss_clean($input->post("clabe"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "MYR") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["swiftCode"] = $this->security->xss_clean($input->post("swiftCode"));
            $temp["accountType"] = $this->security->xss_clean($input->post("accountType"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "NGN") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "NOK") {
            $temp["iban"] = $this->security->xss_clean($input->post("iban"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "NPR") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "NZD") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["BIC"] = $this->security->xss_clean($input->post("BIC"));
        }

        
        if ($_SESSION['withdraw']['currencycode'] == "PHP") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["countryCode"] = $this->security->xss_clean($input->post("countryCode"));
            $temp["city"] = $this->security->xss_clean($input->post("city"));
            $temp["firstLine"] = $this->security->xss_clean($input->post("firstLine"));
            $temp["postCode"] = $this->security->xss_clean($input->post("postCode"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "PKR") {
            $temp["iban"] = $this->security->xss_clean($input->post("iban"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "PLN") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["iban"] = $this->security->xss_clean($input->post("iban"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "RON") {
            $temp["iban"] = $this->security->xss_clean($input->post("iban"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "SEK") {
            $temp["iban"] = $this->security->xss_clean($input->post("iban"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "SGD") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "THB") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["bankCode"] = $this->security->xss_clean($input->post("bankCode"));
            $temp["countryCode"] = $this->security->xss_clean($input->post("countryCode"));
            $temp["city"] = $this->security->xss_clean($input->post("city"));
            $temp["firstLine"] = $this->security->xss_clean($input->post("firstLine"));
            $temp["postCode"] = $this->security->xss_clean($input->post("postCode"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "TRY") {
            $temp["iban"] = $this->security->xss_clean($input->post("iban"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "UAH") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["iban"] = $this->security->xss_clean($input->post("iban"));
            $temp["phoneNumber"] = $this->security->xss_clean($input->post("phoneNumber"));
            $temp["countryCode"] = $this->security->xss_clean($input->post("countryCode"));
            $temp["city"] = $this->security->xss_clean($input->post("city"));
            $temp["firstLine"] = $this->security->xss_clean($input->post("firstLine"));
            $temp["postCode"] = $this->security->xss_clean($input->post("postCode"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "VND") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["swiftCode"] = $this->security->xss_clean($input->post("swiftCode"));
        }

        if ($_SESSION['withdraw']['currencycode'] == "ZAR") {
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
        $this->form_validation->set_rules('usdxamount', 'USDX Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('accountHolderName', 'Recipient Name', 'trim|required');
        $this->form_validation->set_rules('causal', 'Causal', 'trim|required');
        $this->form_validation->set_rules('transfer_type', 'Transfer Type', 'trim|required');
        
        if($_SESSION['withdraw']['currencycode'] == 'EUR'){
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
            $this->form_validation->set_rules('firstLine', 'First Line', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
        }

        if($_SESSION['withdraw']['currencycode'] == 'USD'){
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim|required');
            $this->form_validation->set_rules('firstLine', 'First Line', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('state', 'State initial', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country initial', 'trim');
            $this->form_validation->set_rules('abartn', 'Abartn', 'trim');
            $this->form_validation->set_rules('swiftCode', 'swift Code', 'trim');
        }

        if($_SESSION['withdraw']['currencycode'] == 'AED'){
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }
        
        if ($_SESSION["withdraw"]['currencycode'] == "ARS") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('taxId', 'TAX ID', 'trim');
        }

        if ($_SESSION["withdraw"]['currencycode'] == "AUD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
            $this->form_validation->set_rules('firstLine', 'First Line', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country initial', 'trim');
            $this->form_validation->set_rules('state', 'State initial', 'trim');
            $this->form_validation->set_rules('bsbCode', 'BSB Code', 'trim');
            $this->form_validation->set_rules('billerCode', 'BPAY biller code', 'trim');
            $this->form_validation->set_rules('customerReferenceNumber', 'Customer Reference Number (CRN)', 'trim');
        }

        if ($_SESSION["withdraw"]['currencycode'] == "BDT") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('branchCode', 'Branch Code', 'trim');
        }

        if ($_SESSION["withdraw"]['currencycode'] == "CAD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('institutionNumber', 'Institution Number', 'trim');
            $this->form_validation->set_rules('transitNumber', 'Transit Number', 'trim');
            $this->form_validation->set_rules('interacAccount', 'Interac registered email', 'trim');
        }

        if ($_SESSION["withdraw"]['currencycode'] == "CLP") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('rut', 'Rut', 'trim');
            $this->form_validation->set_rules('phoneNumber', 'Phone Number', 'trim');
        }

        if($_SESSION['withdraw']['currencycode'] == 'CNY'){
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "CZK") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'bank Code', 'trim');
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "DKK") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "EGP") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "GBP") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
            $this->form_validation->set_rules('sortCode', 'Sort Code', 'trim');
        }

        
        if ($_SESSION['withdraw']['currencycode']  == "GEL") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode']  == "GHS") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('branchCode', 'Branch Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode']  == "HKD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode']  == "HRK") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode']  == "HUF") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        
        if ($_SESSION['withdraw']['currencycode'] == "IDR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'bank Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "ILS") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "INR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('ifscCode', 'ifsc Code', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "JPY") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('branchCode', 'Branch Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "KES") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "KRW") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('dateOfBirth', 'Date of Birth', 'trim');
        }

        
        if ($_SESSION['withdraw']['currencycode'] == "LKR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('branchCode', 'Branch Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "MAD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "MXN") {
            $this->form_validation->set_rules('clabe', 'Clabe', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "MYR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "NGN") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "NOK") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "NPR") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "NZD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('BIC', 'BIC', 'trim');
        }

        
        if ($_SESSION['withdraw']['currencycode'] == "PHP") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "PKR") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "PLN") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "RON") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "SEK") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "SGD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "THB") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "TRY") {
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "UAH") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('iban', 'IBAN', 'trim');
            $this->form_validation->set_rules('phoneNumber', 'Phone Number', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country Code', 'trim');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('firstLine', 'FirstLine', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "VND") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
        }

        if ($_SESSION['withdraw']['currencycode'] == "ZAR") {
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
        $usdxamount         = $this->security->xss_clean($input->post("usdxamount"));
        $causal             = $this->security->xss_clean($input->post("causal"));
        $transfer_type      = $this->security->xss_clean($input->post("transfer_type"));




        if($_SESSION['withdraw']['currencycode'] == 'EUR'){
            $iban           = $this->security->xss_clean($input->post("iban"));
            $accountNumber  = $this->security->xss_clean($input->post("accountNumber"));
            $swiftCode      = $this->security->xss_clean($input->post("swiftCode"));
            $firstLine      = $this->security->xss_clean($input->post("firstLine"));
            $postCode       = $this->security->xss_clean($input->post("postCode"));
            $city           = $this->security->xss_clean($input->post("city"));
            $countryCode    = $this->security->xss_clean($input->post("countryCode"));

            $mdata= array (
                "userid"            => $_SESSION['user_id'],
                "currency"          => $_SESSION['withdraw']['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => @$iban,
                    "address.country"           => @$countryCode,
                    "address.city"              => @$city,
                    "address.firstLine"         => @$firstLine,
                    "address.postCode"          => @$postCode,
                    "causal"            => @$causal,
                    "accountNumber"     => @$accountNumber,
                    "swiftCode"         => @$swiftCode,
                )
            );
            
        // echo "<pre>".print_r($mdata,true)."</pre>";
        // die;
        }

        if($_SESSION['withdraw']['currencycode'] == 'USD'){
            $accountNumber  = $this->security->xss_clean($input->post("accountNumber"));
            $city           = $this->security->xss_clean($input->post("city"));
            $postCode       = $this->security->xss_clean($input->post("postCode"));
            $firstLine      = $this->security->xss_clean($input->post("firstLine"));
            $accountType    = $this->security->xss_clean($input->post("accountType"));
            $countryCode    = $this->security->xss_clean($input->post("countryCode"));
            $state          = $this->security->xss_clean($input->post("state"));
            $abartn         = $this->security->xss_clean($input->post("abartn"));
            $swiftCode      = $this->security->xss_clean($input->post("swiftCode"));

            $mdata= array (
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => @$accountNumber,
                    "accountType"       => $accountType,
                    "abartn"            => $abartn,
                    "firstLine"         => $firstLine,
                    "city"              => $city,
                    "state"             => $state,
                    "postCode"          => $postCode,
                    "swiftCode"         => $swiftCode,
                    "countryCode"       => @$countryCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "AED") {
            $iban = $this->security->xss_clean($input->post("iban"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $iban,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "ARS") {
            $accountNumber  = $this->security->xss_clean($input->post("accountNumber"));
            $taxId          = $this->security->xss_clean($input->post("taxId"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'] ,
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "taxId"             => $taxId,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "AUD") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $city = $this->security->xss_clean($input->post("city"));
            $postCode = $this->security->xss_clean($input->post("postCode"));
            $firstLine = $this->security->xss_clean($input->post("firstLine"));
            $countryCode = $this->security->xss_clean($input->post("countryCode"));
            $state = $this->security->xss_clean($input->post("state"));
            $bsbCode = $this->security->xss_clean($input->post("bsbCode"));
            $billerCode = $this->security->xss_clean($input->post("billerCode"));
            $customerReferenceNumber = $this->security->xss_clean($input->post("customerReferenceNumber"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'] ,
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "city"              => $city,
                    "postCode"          => $postCode,
                    "firstLine"         => $firstLine,
                    "countryCode"       => $countryCode,
                    "state"             => $state,
                    "bsbCode"           => $bsbCode,
                    "billerCode"        => $billerCode,
                    "customerReferenceNumber" => $customerReferenceNumber,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "BDT") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $branchCode = $this->security->xss_clean($input->post("branchCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "branchCode"        => $branchCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "CAD") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $accountType = $this->security->xss_clean($input->post("accountType"));
            $institutionNumber = $this->security->xss_clean($input->post("institutionNumber"));
            $transitNumber = $this->security->xss_clean($input->post("transitNumber"));
            $interacAccount = $this->security->xss_clean($input->post("interacAccount"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "accountType"       => $accountType,
                    "institutionNumber" => $institutionNumber,
                    "transitNumber"     => $transitNumber,
                    "interacAccount"     => $interacAccount,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "CLP") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $accountType = $this->security->xss_clean($input->post("accountType"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $rut = $this->security->xss_clean($input->post("rut"));
            $phoneNumber = $this->security->xss_clean($input->post("phoneNumber"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "accountType"       => $accountType,
                    "bankCode"          => $bankCode,
                    "rut"               => $rut,
                    "phoneNumber"       => $phoneNumber,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "CNY") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "CZK") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $IBAN = $this->security->xss_clean($input->post("iban"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "DKK") {
            $IBAN = $this->security->xss_clean($input->post("iban"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "EGP") {
            $IBAN = $this->security->xss_clean($input->post("iban"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode']  == "GBP") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $IBAN = $this->security->xss_clean($input->post("iban"));
            $sortCode = $this->security->xss_clean($input->post("sortCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'] ,
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "IBAN"              => $IBAN,
                    "sortCode"          => $sortCode,
                    "causal"            => @$causal,
                )
            );
        }

        
        if ($_SESSION["withdraw"]['currencycode'] == "GEL") {
            $IBAN = $this->security->xss_clean($input->post("iban"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "GHS") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $branchCode = $this->security->xss_clean($input->post("branchCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "branchCode"        => $branchCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "HKD") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "HRK") {
            $IBAN = $this->security->xss_clean($input->post("iban"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "HUF") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $iban = $this->security->xss_clean($input->post("iban"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "IBAN"              => $iban,
                    "causal"            => @$causal,
                )
            );
        }

        
        if ($_SESSION["withdraw"]['currencycode'] == "IDR") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "ILS") {
            $IBAN = $this->security->xss_clean($input->post("iban"));
            $countryCode = $this->security->xss_clean($input->post("countryCode"));
            $city = $this->security->xss_clean($input->post("city"));
            $firstLine = $this->security->xss_clean($input->post("firstLine"));
            $postCode = $this->security->xss_clean($input->post("postCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "countryCode"       => $countryCode,
                    "city"              => $city,
                    "firstLine"         => $firstLine,
                    "postCode"          => $postCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "INR") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $ifscCode = $this->security->xss_clean($input->post("ifscCode"));
            $countryCode = $this->security->xss_clean($input->post("countryCode"));
            $city = $this->security->xss_clean($input->post("city"));
            $firstLine = $this->security->xss_clean($input->post("firstLine"));
            $postCode = $this->security->xss_clean($input->post("postCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "ifscCode"          => $ifscCode,
                    "countryCode"       => $countryCode,
                    "city"              => $city,
                    "firstLine"         => $firstLine,
                    "postCode"          => $postCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "JPY") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $accountType = $this->security->xss_clean($input->post("accountType"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $branchCode = $this->security->xss_clean($input->post("branchCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "accountType"       => $accountType,
                    "bankCode"          => $bankCode,
                    "branchCode"        => $branchCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "KES") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "KRW") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $dateOfBirth = $this->security->xss_clean($input->post("dateOfBirth"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "dateOfBirth"       => $dateOfBirth,
                    "causal"            => @$causal,
                )
            );
        }

        
        if ($_SESSION["withdraw"]['currencycode'] == "LKR") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $branchCode = $this->security->xss_clean($input->post("branchCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "branchCode"        => $branchCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "MAD") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $countryCode = $this->security->xss_clean($input->post("countryCode"));
            $city = $this->security->xss_clean($input->post("city"));
            $firstLine = $this->security->xss_clean($input->post("firstLine"));
            $postCode = $this->security->xss_clean($input->post("postCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "countryCode"       => $countryCode,
                    "city"              => $city,
                    "firstLine"         => $firstLine,
                    "postCode"          => $postCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "MXN") {
            $clabe = $this->security->xss_clean($input->post("clabe"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "clabe"             => $clabe,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "MYR") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $swiftCode = $this->security->xss_clean($input->post("swiftCode"));
            $accountType = $this->security->xss_clean($input->post("accountType"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "accountType"       => $accountType,
                    "swiftCode"         => $swiftCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "NGN") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "NOK") {
            $IBAN = $this->security->xss_clean($input->post("iban"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "NPR") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "NZD") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $BIC = $this->security->xss_clean($input->post("BIC"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "BIC"               => $BIC,
                    "causal"            => @$causal,
                )
            );
        }

        
        if ($_SESSION["withdraw"]['currencycode'] == "PHP") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $countryCode = $this->security->xss_clean($input->post("countryCode"));
            $city = $this->security->xss_clean($input->post("city"));
            $firstLine = $this->security->xss_clean($input->post("firstLine"));
            $postCode = $this->security->xss_clean($input->post("postCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "countryCode"       => $countryCode,
                    "city"              => $city,
                    "firstLine"         => $firstLine,
                    "postCode"          => $postCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "PKR") {
            $IBAN = $this->security->xss_clean($input->post("iban"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "PLN") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $IBAN = $this->security->xss_clean($input->post("iban"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "RON") {
            $IBAN = $this->security->xss_clean($input->post("iban"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "SEK") {
            $IBAN = $this->security->xss_clean($input->post("iban"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }


        if ($_SESSION["withdraw"]['currencycode'] == "SGD") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "THB") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $bankCode = $this->security->xss_clean($input->post("bankCode"));
            $countryCode = $this->security->xss_clean($input->post("countryCode"));
            $city = $this->security->xss_clean($input->post("city"));
            $firstLine = $this->security->xss_clean($input->post("firstLine"));
            $postCode = $this->security->xss_clean($input->post("postCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "bankCode"          => $bankCode,
                    "countryCode"       => $countryCode,
                    "city"              => $city,
                    "firstLine"         => $firstLine,
                    "postCode"          => $postCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "TRY") {
            $IBAN = $this->security->xss_clean($input->post("iban"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "UAH") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $IBAN = $this->security->xss_clean($input->post("iban"));
            $phoneNumber = $this->security->xss_clean($input->post("phoneNumber"));
            $countryCode = $this->security->xss_clean($input->post("countryCode"));
            $city = $this->security->xss_clean($input->post("city"));
            $firstLine = $this->security->xss_clean($input->post("firstLine"));
            $postCode = $this->security->xss_clean($input->post("postCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "IBAN"              => $IBAN,
                    "phoneNumber"          => $phoneNumber,
                    "countryCode"       => $countryCode,
                    "city"              => $city,
                    "firstLine"         => $firstLine,
                    "postCode"          => $postCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "VND") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $swiftCode = $this->security->xss_clean($input->post("swiftCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "swiftCode"         => $swiftCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["withdraw"]['currencycode'] == "ZAR") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $swiftCode = $this->security->xss_clean($input->post("swiftCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["withdraw"]['currencycode'],
                "amount"            => $usdxamount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "accountNumber"     => $accountNumber,
                    "swiftCode"         => $swiftCode,
                    "causal"            => @$causal,
                )
            );
        }


        // echo '<pre>'.print_r($mdata,true).'</pre>';

        $result = apiciaklive(URLAPI . "/v1/member/wallet/bankTransfer", json_encode($mdata));

        echo '<pre>'.print_r($result,true).'</pre>';
        die;

        if (@$result->code != 200) {
            if (@$result->code == 5055) {
                $this->session->set_flashdata("failed", @$result->message->errors[0]->message . '<br>' . @$result->message->errors[1]->message  . '<br>' . @$result->message->errors[2]->message  . '<br>' . @$result->message->errors[3]->message);
                redirect(base_url() . "withdraw");
            }
            $this->session->set_flashdata("failed", @$result->message->errors[0]->message . '<br>' . @$result->message->errors[1]->message  . '<br>' . @$result->message->errors[2]->message  . '<br>' . @$result->message->errors[3]->message);
            redirect(base_url() . "withdraw");
        }
        
        redirect (base_url()."withdraw/withdraw_success");
    }
    
    public function withdraw_success(){
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
