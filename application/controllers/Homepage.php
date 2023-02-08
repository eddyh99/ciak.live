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
            'post' => 'apps/member/app-posts',
            'mn_home' => 'active',
            'extra' => 'apps/js/js-index',
        ];
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function search()
    {
        $data = [
            'title' => NAMETITLE . ' - Search',
            'content' => 'apps/member/app-search',
            'botbar' => 'apps/member/app-botbar',
            'popup' => 'apps/member/app-popup',
            'post' => 'apps/member/app-posts',
            'mn_search' => 'active',
        ];
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function notif()
    {
        $data = [
            'title' => NAMETITLE . ' - Notification',
            'content' => 'apps/member/app-notif',
            'botbar' => 'apps/member/app-botbar',
            'popup' => 'apps/member/app-popup',
            'post' => 'apps/member/app-posts',
            'mn_search' => 'active',
        ];
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function chat()
    {
        $data = [
            'title' => NAMETITLE . ' - Chats',
            'content' => 'apps/member/app-chat',
            'botbar' => 'apps/member/app-botbar',
            'popup' => 'apps/member/app-popup',
            'post' => 'apps/member/app-posts',
            'mn_search' => 'active',
        ];
        $this->load->view('apps/template/wrapper-member', $data);
    }
}