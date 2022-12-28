<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{

    public function index()
    {
        $data = [
            'title' => NAMETITLE . ' - Homepage',
            'content' => 'apps/member/app-index',
            'botbar' => 'apps/member/app-botbar',
            'popup' => 'apps/member/app-popup',
            'mn_home' => 'active',
        ];
        $this->load->view('apps/template/wrapper-member', $data);
    }
}