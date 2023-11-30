<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reported extends CI_Controller
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
            "title"     => NAMETITLE." - Reported Post",
            "content"   => "admin/report/index",
            "mn_report" => "active",
            "extra"     => "admin/report/js/js_index"
        );

        $this->load->view('admin_template/wrapper', $data);
    }

   public function get_all(){
        $input      = $this->input;
        $category   = $this->security->xss_clean($input->post("category"));
        $result     = ciakadmin(URLAPI . "/v1/admin/post/get_all?category=".$category)->message;
        echo json_encode($result);
   }
   
   public function post_lock($id)
    {
        $id = $this->security->xss_clean($id);
        $result = ciakadmin(URLAPI . "/v1/admin/post/lockpost?post_id=" . $id);
        if ($result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect('godmode/reported');
        } else {
            $this->session->set_flashdata("success", $result->message);
            redirect('godmode/reported');
        }
    }
   
   public function unlockpost($id)
    {
        $id = $this->security->xss_clean($id);
        $result = ciakadmin(URLAPI . "/v1/admin/post/unlockpost?post_id=" . $id);
        if ($result->code != 200) {
            $this->session->set_flashdata("failed", $result->message);
            redirect('godmode/reported');
        } else {
            $this->session->set_flashdata("success", $result->message);
            redirect('godmode/reported');
        }
    }    
    
}