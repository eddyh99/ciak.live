<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mwallet extends CI_Controller
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
        if (!empty($_GET["cur"])) {
            $url = URLAPI . "/v1/admin/mwallet/balance_ByCurrency?currency=" . $_GET["cur"];
            $tcurl = URLAPI . "/v1/trackless/mwallet/balance_ByCurrency?currency=" . $_GET["cur"];

            $result = ciakadmin($url);
            $restc = ciakadmin($tcurl);
            
            if ($result->code == 200) {
                $_SESSION["currency"] = @$_GET["cur"];
                $_SESSION["symbol"] = $_GET["cur"];
                $_SESSION["balance"] = $result->message->balance;
                $_SESSION["tcbalance"]=$restc->message->balance;
            } else {
                $_SESSION["currency"] = "USD";
                $_SESSION["symbol"] = "&dollar;";
                $_SESSION["balance"] = ciakadmin(URLAPI . "/v1/admin/wallet/balance_ByCurrency?currency=USD")->message->balance;
                $_SESSION["tcbalance"]= ciakadmin(URLAPI . "/v1/trackless/wallet/balance_ByCurrency?currency=USD")->message->balance;
            }
        }

        $data = array(
            "title"     => NAMETITLE . " - Master Wallet",
            "content"   => "admin/mwallet/master-wallet",
            "mn_mwallet" => "active",
            "extra"     => "admin/mwallet/js/js_masterwallet",
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function get_history()
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
        $result = ciakadmin(URLAPI . "/v1/admin/mwallet/gethistory_bycurrency", json_encode($mdata));
        $data["token"] = $this->security->get_csrf_hash();
        $data["history"] = $result->message;
        echo json_encode($data);
    }

    public function withdraw()
    {
        $data = array(
            "title"     => NAMETITLE . " - Withdraw Master Wallet",
            "content"   => "admin/mwallet/withdraw-mwallet",
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function wdlocal()
    {
        $currencyCode = array(
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

        $mdata = array(
            "title"     => NAMETITLE . " - Withdraw Local",
            "extra"     => "admin/mwallet/currency/js/js_form_currency",
            "content"   => "admin/mwallet/withdraw-local",
            "mn_mwallet" => "active",
        );

        $this->load->view('admin_template/wrapper2', $mdata);
    }

    public function wdinter()
    {
        $currencyCode = array(
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
        if (@$currencyCode[$_SESSION['currency']] == '') {
            $codecur = '';
        } else {
            $url = URLAPI . "/v1/member/wallet/getBankCode?country=" . $currencyCode[$_SESSION['currency']];
            $codecur   = ciakadmin($url)->message->values;
        }

        $bankcost = ciakadmin(URLAPI . "/v1/admin/cost/getCost?currency=" . $_SESSION['currency']);

        $fee = (balanceadmin($_SESSION["currency"]) * $bankcost->message->walletbank_outside_pct) + $bankcost->message->walletbank_outside_fxd;

        if ((balanceadmin($_SESSION["currency"]) * 100) <= 0) {
            $fee = 0;
        }

        if ((balanceadmin($_SESSION["currency"]) * 100) < ($fee * 100)) {
            $fee = balanceadmin($_SESSION["currency"]);
        }

        $data = array(
            "title"     => NAMETITLE . " - Withdraw International",
            "extra"     => "admin/mwallet/currency/js/js_form_currency",
            "content"   => "admin/mwallet/withdraw-inter",
            "codecur"   => $codecur,
            "bankcost"   => $fee,
            'currencycode' => @$currencyCode[$_SESSION['currency']],
        );

        $this->load->view('admin_template/wrapper2', $data);
    }




    public function wdconfirm()
    {
        $amount = $this->security->xss_clean($this->input->post("amount"));

        $a = $this->input->post("amount");
        $b = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', $a);
        $_POST["amount"] = $b;


        $input    = $this->input;
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('causal', 'Causal', 'trim|required');
        $this->form_validation->set_rules(
            'transfer_type',
            'Transfer Type',
            array(
                'trim',
                'required',
                array(
                    'undefined',
                    function ($str) {
                        return $str === "circuit" || $str === "outside";
                    }
                )
            ),
            array(
                'undefined' => 'Unknown {field} [' . $this->input->post('transfer_type') . ']',
            )
        );

        $this->form_validation->set_rules('accountHolderName', 'Recipient Name', 'trim|required');

        if ($_SESSION["currency"] == "USD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim|required');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
            $this->form_validation->set_rules('firstLine', 'First Line', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country initial', 'trim');
            $this->form_validation->set_rules('state', 'State initial', 'trim');
            $this->form_validation->set_rules('abartn', 'Abartn', 'trim');
            $this->form_validation->set_rules('swiftCode', 'swift Code', 'trim');
        }

        if ($_SESSION["currency"] == "EUR") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
        }


        if ($_SESSION["currency"] == "AUD") {
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

        if ($_SESSION["currency"] == "CAD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('institutionNumber', 'Institution Number', 'trim');
            $this->form_validation->set_rules('transitNumber', 'Transit Number', 'trim');
            $this->form_validation->set_rules('interacAccount', 'Interac registered email', 'trim');
        }


        if ($_SESSION["currency"] == "GBP") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
            $this->form_validation->set_rules('sortCode', 'Sort Code', 'trim');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed", validation_errors());
            redirect(base_url() . "godmode/mwallet/" . $this->security->xss_clean($input->post("url")));
        }

        $amount = $this->security->xss_clean($input->post("amount"));
  
        if ($_SESSION["role"]=="admin"){
            
            if($amount < $_SESSION['balance']->amount ){
                echo '<pre>'.print_r("MASUK SINI",true).'</pre>';
                $mdata = array(
                    // "userid"            => $_SESSION["user_id"],
                    "currency"          => $_SESSION["currency"],
                    "amount"            => $amount,
                    "transfer_type"     => $this->security->xss_clean($input->post("transfer_type")),
                );            
                $result = ciakadmin(URLAPI . "/v1/admin/withdraw/withdraw_Summary", json_encode($mdata));
            }else{
                $this->session->set_flashdata("failed", 'Your balance less than amount');
                redirect(base_url() . "godmode/mwallet/wdlocal");
            }
  
        }else{

            if($amount < $_SESSION['tcbalance']->amount ){
                $mdata = array(
                    "currency"          => $_SESSION["currency"],
                    "amount"            => $amount,
                    "transfer_type"     => $this->security->xss_clean($input->post("transfer_type")),
                );
                $result = ciakadmin(URLAPI . "/v1/trackless/withdraw/WDCiak_Summary", json_encode($mdata));

            }else{
                $this->session->set_flashdata("failed", 'Your management balance less than amount');
                redirect(base_url() . "godmode/mwallet/wdlocal");
            }

        }


        if (@$result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect(base_url() . "godmode/mwallet/" . $this->security->xss_clean($input->post("url")));
        }

        $transfer_type  = $this->security->xss_clean($input->post("transfer_type"));
        $temp["fee"]               = $result->message->fee;
        $temp["deduct"]            = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', @$result->message->deduct);
        $temp["amt_trans"]         = preg_replace('/,(?=[\d,]*\.\d{2}\b)/', '', @$result->message->amt_trans);
        $temp["accountHolderName"] = $this->security->xss_clean($input->post("accountHolderName")) . ' xxx';
        $temp["amount"]            = $this->security->xss_clean($input->post("amount"));
        $temp["causal"]            = $this->security->xss_clean($input->post("causal"));
        $temp["transfer_type"]     = $transfer_type;

        if ($_SESSION["currency"] == "USD") {
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

        if ($_SESSION["currency"] == "EUR") {
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["swiftCode"] = $this->security->xss_clean($input->post("swiftCode"));
        }


        if ($_SESSION["currency"] == "AUD") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["city"] = $this->security->xss_clean($input->post("city"));
            $temp["postCode"] = $this->security->xss_clean($input->post("postCode"));
            $temp["firstLine"] = $this->security->xss_clean($input->post("firstLine"));
            $temp["countryCode"] = $this->security->xss_clean($input->post("countryCode"));
            $temp["state"] = $this->security->xss_clean($input->post("state"));
            $temp["bsbCode"] = $this->security->xss_clean($input->post("bsbCode"));
            $temp["billerCode"] = $this->security->xss_clean($input->post("billerCode"));
            $temp["customerReferenceNumber"] = $this->security->xss_clean($input->post("customerReferenceNumber"));
        }

        if ($_SESSION["currency"] == "CAD") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["accountType"] = $this->security->xss_clean($input->post("accountType"));
            $temp["institutionNumber"] = $this->security->xss_clean($input->post("institutionNumber"));
            $temp["transitNumber"] = $this->security->xss_clean($input->post("transitNumber"));
            $temp["interacAccount"] = $this->security->xss_clean($input->post("interacAccount"));
        }

        if ($_SESSION["currency"] == "GBP") {
            $temp["accountNumber"] = $this->security->xss_clean($input->post("accountNumber"));
            $temp["IBAN"] = $this->security->xss_clean($input->post("IBAN"));
            $temp["sortCode"] = $this->security->xss_clean($input->post("sortCode"));
        }

        $data = array(
            "title"     => NAMETITLE . " - Withdraw Confirm",
            "content"   => "admin/mwallet/wdconfirm",
            "extra"     => "admin/js/js_btn_disabled",
            "mn_mwallet" => "active",
            "data"      => $temp
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function wdnotif()
    {
        $this->form_validation->set_rules('amount', 'Amount', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('causal', 'Causal', 'trim|required');
        $this->form_validation->set_rules(
            'transfer_type',
            'Transfer Type',
            array(
                'trim',
                'required',
                array(
                    'undefined',
                    function ($str) {
                        return $str === "circuit" || $str === "outside";
                    }
                )
            ),
            array(
                'undefined' => 'Unknown {field} [' . $this->input->post('transfer_type') . ']',
            )
        );

        if ($_SESSION["currency"] == "USD") {
            $this->form_validation->set_rules('accountHolderName', 'Recipient Name', 'trim|required');
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim|required');
            $this->form_validation->set_rules('city', 'City', 'trim');
            $this->form_validation->set_rules('postCode', 'Post Code', 'trim');
            $this->form_validation->set_rules('firstLine', 'First Line', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('countryCode', 'Country initial', 'trim');
            $this->form_validation->set_rules('state', 'State initial', 'trim');
            $this->form_validation->set_rules('abartn', 'Abartn', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
        }

        if ($_SESSION["currency"] == "EUR") {
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('swiftCode', 'Swift Code', 'trim');
        }

        if ($_SESSION["currency"] == "AUD") {
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

        if ($_SESSION["currency"] == "CAD") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('accountType', 'Account Type', 'trim');
            $this->form_validation->set_rules('institutionNumber', 'Institution Number', 'trim');
            $this->form_validation->set_rules('transitNumber', 'Transit Number', 'trim');
            $this->form_validation->set_rules('interacAccount', 'Interac registered email', 'trim');
        }

        if ($_SESSION["currency"] == "GBP") {
            $this->form_validation->set_rules('accountNumber', 'Account Number', 'trim');
            $this->form_validation->set_rules('IBAN', 'IBAN', 'trim');
            $this->form_validation->set_rules('sortCode', 'Sort Code', 'trim');
        }

      
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("failed", validation_errors());
            redirect(base_url() . "godmode/mwallet/wdlocal");
        }

        $input = $this->input;
        $transfer_type = $this->security->xss_clean($input->post("transfer_type"));
        $accountHolderName = $this->security->xss_clean($input->post("accountHolderName"));
        $amount = $this->security->xss_clean($input->post("amount"));
        $causal = $this->security->xss_clean($input->post("causal"));
        $transfer_type = $transfer_type;

        if ($_SESSION["currency"] == "USD") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $city = $this->security->xss_clean($input->post("city"));
            $postCode = $this->security->xss_clean($input->post("postCode"));
            $firstLine = $this->security->xss_clean($input->post("firstLine"));
            $accountType = $this->security->xss_clean($input->post("accountType"));
            $countryCode = $this->security->xss_clean($input->post("countryCode"));
            $state = $this->security->xss_clean($input->post("state"));
            $abartn = $this->security->xss_clean($input->post("abartn"));
            $swiftCode = $this->security->xss_clean($input->post("swiftCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
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

        if ($_SESSION["currency"] == "EUR") {
            $IBAN = $this->security->xss_clean($input->post("IBAN"));
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $swiftCode = $this->security->xss_clean($input->post("swiftCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
                "transfer_type"     => $transfer_type,
                "bank_detail"   => array(
                    "accountHolderName" => $accountHolderName,
                    "IBAN"              => $IBAN,
                    "accountNumber"     => @$accountNumber,
                    "swiftCode"         => @$swiftCode,
                    "causal"            => @$causal,
                )
            );
        }

        if ($_SESSION["currency"] == "AUD") {
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
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
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

       
        if ($_SESSION["currency"] == "CAD") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $accountType = $this->security->xss_clean($input->post("accountType"));
            $institutionNumber = $this->security->xss_clean($input->post("institutionNumber"));
            $transitNumber = $this->security->xss_clean($input->post("transitNumber"));
            $interacAccount = $this->security->xss_clean($input->post("interacAccount"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
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

        if ($_SESSION["currency"] == "GBP") {
            $accountNumber = $this->security->xss_clean($input->post("accountNumber"));
            $IBAN = $this->security->xss_clean($input->post("IBAN"));
            $sortCode = $this->security->xss_clean($input->post("sortCode"));

            $mdata = array(
                "userid"            => $_SESSION["user_id"],
                "currency"          => $_SESSION["currency"],
                "amount"            => $amount,
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


     
        if ($_SESSION["role"]=="admin"){
            $result = ciakadmin(URLAPI . "/v1/admin/withdraw/withdraw_Transfer", json_encode($mdata));
        }else{
            $result = ciakadmin(URLAPI . "/v1/trackless/withdraw/WDCiak_Transfer", json_encode($mdata));
        }


        if (@$result->code != 200) {
            if (@$result->code == 5055) {
                $this->session->set_flashdata("failed", $result->message);
                redirect(base_url() . "godmode/mwallet/wdlocal");
            }
            $this->session->set_flashdata("failed", $result->message);
            redirect(base_url() . "godmode/mwallet/wdlocal");
        }

        $data = array(
            "title"     => NAMETITLE . " - Withdraw Success",
            "content"   => "admin/mwallet/wdnotif",
            "mn_mwallet" => "active",
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function getbranchCode()
    {
        $this->form_validation->set_rules('currencycode', 'Country', 'trim|required');
        $this->form_validation->set_rules('bankCode', 'Bank Code', 'trim|required');
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
        $country = $this->security->xss_clean($input->post("currencycode"));
        $bankCode = $this->security->xss_clean($input->post("bankCode"));

        $url = URLAPI . "/v1/member/wallet/getBranchCode?country=" . $country . "&bankcode=" . $bankCode;
        $result = ciakadmin($url)->message->values;
        $data['bankCode'] = $result;
        $response = array(
            "token"     => $this->security->get_csrf_hash(),
            "message"   => utf8_encode($this->load->view('admin/mwallet/currency/js/branchCode', $data, TRUE))
        );

        echo json_encode($response);
    }
}
