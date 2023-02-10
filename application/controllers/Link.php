<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Link extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => NAMETITLE,
            'content' => 'landingpage/index',
            'extra' => 'landingpage/js/js_index',
        ];
        $this->load->view('landingpage/template/wrapper', $data);
    }

    public function guide()
    {
        $data = [
            'title' => NAMETITLE,
            'content' => 'landingpage/guide',
            'extra' => 'landingpage/js/js_index',
        ];
        $this->load->view('landingpage/template/wrapper', $data);
    }

    public function guides($menus, $titles)
    {
        $menu = base64_decode($menus);
        $title = base64_decode($titles);
        
        $data = [
            'title' => NAMETITLE,
            'content' => 'landingpage/guides',
            'menu' => $menu,
            'title' => $title,
            'extra' => 'landingpage/js/js_index',
        ];
        $this->load->view('landingpage/template/wrapper', $data);
    }

    public function wallet()
    {
        $data = [
            'title' => NAMETITLE,
            'content' => 'landingpage/wallet',
            'extra' => 'landingpage/js/js_index',
        ];
        $this->load->view('landingpage/template/wrapper', $data);
    }
}