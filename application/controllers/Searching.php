<?php
/*----------------------------------------------------------
    Modul Name  : Modul Searching
    Desc        : Modul ini di gunakan untuk menemukan postingan 
                  member secara random

    Sub fungsi  : 
    - index             : Tampilan halaman Searching
    - member_search     : Proses searching post, member, email, contact, surename
        
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
            'extra'         => 'apps/js/js-index',
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }
    
    public function member_search(){
        $term=$this->security->xss_clean($_GET["term"]);
        $type=$this->security->xss_clean($_GET["type"]);
        
        if (empty($type)){
            $url = URLAPI . "/v1/member/post/search_post?term=".$term;
        }else{
            $url = URLAPI . "/v1/member/post/search_post?term=".$term."&type=".$type;
        }

        $result = @apiciaklive($url);
        $data['search'] = @apiciaklive($url)->message;

        $this->load->view('apps/member/searching/app-result', $data);
    }
}