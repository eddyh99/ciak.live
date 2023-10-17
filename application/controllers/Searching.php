<?php
/*----------------------------------------------------------
    Modul Name  : Modul Searching
    Desc        : Modul ini di gunakan untuk menemukan postingan 
                  member secara random

    Sub fungsi  : 


        
------------------------------------------------------------*/ 

defined('BASEPATH') or exit('No direct script access allowed');

class Searching extends CI_Controller
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

        $data = array(
            'title'         => NAMETITLE . ' - Searching',
            'content'       => 'apps/member/searching/app-searching',
            'botbar'        => 'apps/member/app-botbar',
            // 'popup'         => 'apps/member/app-popup-search',
            'extra'         => 'apps/js/js-index',
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }
    
    public function member_search(){
        $term=$this->security->xss_clean($_GET["term"]);
        $url = URLAPI . "/v1/member/post/search_post?term=".$term;
        $result = @apiciaklive($url)->message;

        // echo "<pre>".print_r($result,true)."</pre>";
	    // die;

        $data['search'] = @apiciaklive($url)->message;
        // $data['popupsingle']  = $this->load->view('apps/member/app-popup-search');
        

        $this->load->view('apps/member/searching/app-result', $data);
    }
}