<?php
/*----------------------------------------------------------
    Modul Name  : Modul Link
    Desc        : Modul ini di gunakan untuk segala aktivitas di Landing Page

    Sub fungsi  : 
    - index    	        :   Menampikan landing page ciak.live.
    - guide             :   Menampilkan tentang guide secara general. 
    - guides            :   Menampilkan detail guide secara spesifik.
    - wallet            :   Menampilkan tentang wallet.
    - privacy_police    :   Menampilkan Privacy Policy.
    - term_condition    :   Menampilkan Term Condition.
------------------------------------------------------------*/ 
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


    public function privacy_police()
    {
        $data = array(
            'title' => NAMETITLE . ' - Privacy Policy',
            'content' => 'landingpage/privacy_policy',
            'extra' => 'landingpage/js/js_index',
        );

        $this->load->view('landingpage/template/wrapper', $data);
    }

    public function term_condition()
    {
        $data = array(
            'title' => NAMETITLE . ' - Term Condition',
            'content' => 'landingpage/term_condition',
            'extra' => 'landingpage/js/js_index',
        );

        $this->load->view('landingpage/template/wrapper', $data);
    }
}