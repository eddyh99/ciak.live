<?php

/*----------------------------------------------------------
    Modul Name  : Modul Message
    Desc        : Modul ini di gunakan untuk mengirim dan menerima 
                  pesan antara sesama Member

    Sub fungsi  : 
    - index                 : Tampilan beranda chating
    - message_detail        : Proses chating dengan member
    - history_chat          : Proses History Chat
    - follower_search       : Proses Mencari member followers
    - delete_message        : Proses Menghapus delete chat
------------------------------------------------------------*/ 

defined('BASEPATH') or exit('No direct script access allowed');

class Message extends CI_Controller
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
        $lastchat   = apiciaklive(URLAPI . "/v1/member/message/get_lastchat")->message;
        $data = array(
            'title'         => NAMETITLE . ' - Message',
            'content'       => 'apps/member/message/app-message',
            'botbar'        => 'apps/member/app-botbar',
            'popup'         => 'apps/member/app-popup',
            'mn_profile'    => 'active',
            'lastchat'      => $lastchat,
            'extra'         => 'apps/member/message/js/js-message-preview',
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function message_detail($ucode)
    {
        $member = apiciaklive(URLAPI . "/auth/getmember_byucode?ucode=".$ucode)->message;
        $data = array(
            'title'         => NAMETITLE . ' - Message',
            'content'       => 'apps/member/message/message-detail',
            'botbar'        => 'apps/member/message-botbar',
            'member'        => $member,
            'extra'         => 'apps/member/message/js/js-message'
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }
    
    public function history_chat(){
        $to_ucode   = $this->security->xss_clean($this->input->post("to_user_id"));
        $profile    = (array) apiciaklive(URLAPI . "/v1/member/message/chat_history?to_id=".$to_ucode)->message;
        echo json_encode($profile);
    }
    
    public function follower_search(){
        $term=$this->security->xss_clean($_GET["term"]);
        $url = URLAPI . "/v1/member/follow/get_searchfollower?term=".$term;
        $result = @apiciaklive($url)->message;

        $data['search'] = $result;

        $this->load->view('apps/member/message/app-profile-result', $data);
    }

    public function delete_message($to_id){
        $url = URLAPI . "/v1/member/message/delete_chat?to_id=".$to_id;
        $result = @apiciaklive($url);
        redirect('message');
    }
}
