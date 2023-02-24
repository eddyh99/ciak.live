<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function index()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/form_login');
        }

        $data = [
            'title' => NAMETITLE . ' - Profile',
            'content' => 'apps/member/app-profile',
            'botbar' => 'apps/member/app-botbar',
            'popup' => 'apps/member/app-popup',
            'mn_profile' => 'active',
            'extra' => 'apps/js/js-index',
        ];
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function setting_profile()
    {
        $data = [
            'title' => NAMETITLE . ' - Setting Profile',
            'content' => 'apps/member/app-setting-profile',
            'popup' => 'apps/member/app-popup',
            'extra' => 'apps/js/js-index',
        ];
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function setting_price()
    {
        $data = [
            'title' => NAMETITLE . ' - Setting Subscription',
            'content' => 'apps/member/app-setting-price',
            'popup' => 'apps/member/app-popup',
            'extra' => 'apps/js/js-index',
        ];
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function setting_promotion()
    {
        $tes = $this->security->xss_clean($this->input->post("type"));

        $data = [
            'title' => NAMETITLE . ' - Setting Promote',
            'content' => 'apps/member/app-setting-promotion',
            'popup' => 'apps/member/app-popup',
            'extra' => 'apps/js/js-index',
            'tes' => $tes
        ];
        $this->load->view('apps/template/wrapper-member', $data);
    }
}
