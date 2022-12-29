<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Link extends CI_Controller
{
    public function index()
    {
        $data = [
            'title' => NAMETITLE,
            'content' => 'landingpage/index',
        ];
        $this->load->view('landingpage/template/wrapper', $data);
    }
}