<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
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
        $data = array(
            "title"     => NAMETITLE." - Member",
            "content"   => "admin/member/member",
            "mn_member" => "active",
            "sendmail"  => "sendmail_cur",
            "extra"     => "admin/member/js/js_member"
        );

        $this->load->view('admin_template/wrapper', $data);
    }

    public function member()
    {
        $data = array(
            "title"     => NAMETITLE." - Member",
            "content"   => "admin/member/member",
            "bank"      => apitrackless(URLAPI . "/v1/trackless/member/getAll_bank")->message,
            "mn_member" => "active",
            "sendmail" => "sendmail",
            "extra"     => "admin/member/js/js_member"
        );

        $this->load->view('admin_template/wrapper', $data);
    }

    public function history($id)
    {
        $data = array(
            "title"     => "TracklessBank - Member History",
            "content"   => "admin/member/member-history",
            "user_id"      => $id,
            "mn_member" => "active",
            "extra"     => "admin/member/js/js_history"
        );

        $this->load->view('admin_template/wrapper2', $data);
    }

    public function get_history_user($id)
    {
        $input = $this->input;
        $user_id = $id;
        $tgl = explode("-", $this->security->xss_clean($input->post("tgl")));
        $awal = date_format(date_create($tgl[0]), "Y-m-d");
        $akhir = date_format(date_create($tgl[1]), "Y-m-d");

        $mdata = array(
            "userid" => $user_id,
            "date_start" => $awal,
            "date_end"  => $akhir,
            "currency"  => $_SESSION["currency"],
            "timezone"  => $_SESSION["time_location"]
        );
        $result = apitrackless(URLAPI . "/v1/trackless/user/getHistory", json_encode($mdata));
        $data["token"] = $this->security->get_csrf_hash();
        $data["history"] = $result->message;
        echo json_encode($data);
    }

    public function get_all()
    {
        $result = ciakadmin(URLAPI . "/v1/admin/member/getAll");
        if (@$result->code == 200) {
            $dt_disabled_filter = array();
            $dt_active_filter   = array();
            $dt_new_filter      = array();
            foreach ($result->message as $key) {
                if ($key->status == 'active') {
                    $dt_active_filter[] = $key;
                }
                if ($key->status == 'disabled') {
                    $dt_disabled_filter[] = $key;
                }
                if ($key->status == 'new'){
                    $dt_new_filter[] = $key;
                }
            }

            if ($_GET['status'] == 'active') {
                $data["member"] = $dt_active_filter;
            } elseif ($_GET['status'] == 'disabled') {
                $data["member"] = $dt_disabled_filter;
            } elseif ($_GET['status'] == 'new') {
                $data["member"] = $dt_new_filter;
            } else {
                $data["member"] = $dt_active_filter;
            }
        } else {
            $data["member"] = NULL;
        }

        echo json_encode($data);
    }

    public function activate($id)
    {
        $id = $this->security->xss_clean($id);
        $result = ciakadmin(URLAPI . "/v1/admin/member/setMember?status=activate&userid=" . $id);
        if ($result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect('godmode/member?status=active');
        } else {
            $this->session->set_flashdata("success", $result->message);
            redirect('godmode/member?status=active');
        }
    }

    public function enabled($id)
    {
        $id = $this->security->xss_clean($id);
        $result = ciakadmin(URLAPI . "/v1/admin/member/setMember?status=enabled&userid=" . $id);
        if ($result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect('godmode/member?status=disabled2');
        } else {
            $this->session->set_flashdata("success", $result->message);
            redirect('godmode/member?status=disabled2');
        }
    }

    public function delete($id)
    {
        $id = $this->security->xss_clean($id);
        $result = ciakadmin(URLAPI . "/v1/admin/member/delMember?userid=" . $id);
        if ($result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect('godmode/member?status=new');
        } else {
            $this->session->set_flashdata("success", $result->message);
            redirect('godmode/member?status=new');
        }
    }


    public function disabled($id)
    {
        $id = $this->security->xss_clean($id);
        $result = ciakadmin(URLAPI . "/v1/admin/member/setMember?status=disabled&userid=" . $id);
        if ($result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect('godmode/member?status=active');
        } else {
            $this->session->set_flashdata("success", $result->message);
            redirect('godmode/member?status=active');
        }
    }
    
    public function post()
    {
        $data = array(
            "title"     => NAMETITLE." - Post",
            "content"   => "admin/member/post",
            "extra"     => "admin/member/js/js_search",
            "mn_change" => "active",
        );

        $this->load->view('admin_template/wrapper', $data);
    }

    public function detail_post()
    {
        $id = $this->security->xss_clean($_GET["post_id"]);
        $result = ciakadmin(URLAPI . "/v1/member/post/get_singlepost?post_id=".$id);
        $data = array(
            "post"      => $result->message
        );
    
        $this->load->view('admin/member/detailpost', $data);
        
    }    

    function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds')
    {
        $sets = array();
        if (strpos($available_sets, 'l') !== false)
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        if (strpos($available_sets, 'u') !== false)
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        if (strpos($available_sets, 'd') !== false)
            $sets[] = '23456789';
        if (strpos($available_sets, 's') !== false)
            $sets[] = '!@#$%&*?';

        $all = '';
        $password = '';
        foreach ($sets as $set) {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }

        $all = str_split($all);
        for ($i = 0; $i < $length - count($sets); $i++)
            $password .= $all[array_rand($all)];

        $password = str_shuffle($password);

        if (!$add_dashes)
            return $password;

        $dash_len = floor(sqrt($length));
        $dash_str = '';
        while (strlen($password) > $dash_len) {
            $dash_str .= substr($password, 0, $dash_len) . '-';
            $password = substr($password, $dash_len);
        }
        $dash_str .= $password;
        return $dash_str;
    }

    public function changepass()
    {
    }

    public function sendmail_listmember()
    {
        if ($_GET["bank"] == "all") {
            $mdata = array(
                "timezone"  => $_SESSION["time_location"],
                "currency"  => $_SESSION["currency"]
            );
        } else {
            $mdata = array(
                "bank_id"   => $_GET["bank"],
                "timezone"  => $_SESSION["time_location"],
                "currency"  => $_SESSION["currency"]
            );
        }

        $result = apitrackless(URLAPI . "/v1/trackless/user/getAll", json_encode($mdata));
        if (@$result->code == 200) {
            $data['member'] = $result->message;
            $data['bank'] = $_GET["bank"];
        } else {
            $data['member'] = NULL;
            $data['bank'] = $_GET["bank"];
        }
        
        $response = array(
            "message"   => utf8_encode($this->load->view('admin/member/list-member', $data, TRUE))
        );
        echo json_encode($response);
    }

    public function sendmail_cur()
    {
        $data = array(
            "title"     => "Freedybank - Send Email",
            "content"   => "admin/member/sendmail",
            "bank"      => apitrackless(URLAPI . "/v1/trackless/member/getAll_bank")->message,
            "mn_member" => "active",
            "extra"     => "admin/member/js/js_email"
        );

        $this->load->view('admin_template/wrapper2', $data);
    }
    
    public function sendmail()
    {
        $data = array(
            "title"     => "Freedybank - Send Email",
            "content"   => "admin/member/sendmail",
            "bank"      => apitrackless(URLAPI . "/v1/trackless/member/getAll_bank")->message,
            "mn_member" => "active",
            "sendmail" => "sendmail",
            "extra"     => "admin/member/js/js_email"
        );

        $this->load->view('admin_template/wrapper', $data);
    }

    public function sendmail_proses()
    {
        $input      = $this->input;
        $email      = $this->security->xss_clean($input->post("tujuan"));
        $all        = $this->security->xss_clean($input->post("all"));
        $message    = $this->security->xss_clean($input->post("message"));
        $subject    = $this->security->xss_clean($input->post("subject"));
        if ($all == "all") {
            $mdata = array(
                "timezone"  => $_SESSION["time_location"],
                "currency"  => $_SESSION["currency"]
            );
            $result = apitrackless(URLAPI . "/v1/trackless/user/getAll", json_encode($mdata));
            $member = array();
            foreach ($result->message as $key) {
                if ($key->status == 'active' || $key->status == 'new') {
                    $member[]=$key->email;
                }
            }
            
            $member=array_unique($member);
            foreach ($member as $dt){
                mail_member($this->phpmailer_lib->load(), $dt, $subject, $message);
            }
        } else {
            foreach ($email as $dt){
                mail_member($this->phpmailer_lib->load(), $dt, $subject, $message);
            }
        }
        $this->session->set_flashdata('success', "<p style='color:black'>Email is successfully schedule to send</p>");
        redirect(base_url() . "godmode/member/sendmail");
        return;
    }
    
    public function bulk_activate(){
        $mdata=$_POST["id"];
        $result = apitrackless(URLAPI . "/v1/trackless/user/bulk_activate", json_encode($mdata));
         if ($result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect('godmode/member?status=new');
        } else {
            $this->session->set_flashdata("success", $result->message);
            redirect('godmode/member?status=new');
        }
    }
    
}