<?php

/*----------------------------------------------------------
    Modul Name  : Modul Notification
    Desc        : Modul ini di gunakan untuk menerima notification
                  pada Member 

    Sub fungsi  : 
        - index    	        : Tampilan semua notifikasi yang masuk
        - clear_notif       : Proses menghapus semua notifikasi masuk
        - delete_notif      : Proses menghapus secara spesifik notifikasi masuk
------------------------------------------------------------*/ 

defined('BASEPATH') or exit('No direct script access allowed');

class Notification extends CI_Controller
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
        $followers   = apiciaklive(URLAPI . "/v1/member/follow/getlist_follower")->message;
        $result = apiciaklive(URLAPI . "/v1/member/notification/getnotif")->message;

        $data = array(
            'title'         => NAMETITLE . ' - Notification',
            'content'       => 'apps/member/app-notif',
            'botbar'        => 'apps/member/app-botbar',
            'popup'         => 'apps/member/app-popup',
            'extra'         => 'apps/js/js-index',
            'notif'         =>  $result,
            'followers'     =>  @$followers
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function clear_notif()
    {
        $url = URLAPI . "/v1/member/notification/clearnotif";
		$result = apiciaklive($url)->message;
        redirect("notification");
    }
    
    public function delete_notif($notif,$type){
        if ($type=="follow"){
            $url=URLAPI . "/v1/member/notification/delete_byid?notif_id=".$notif."&type=follow";
        }elseif ($type=="like"){
            $url=URLAPI . "/v1/member/notification/delete_byid?notif_id=".$notif."&type=like";
        }elseif ($type=="post"){
            $url=URLAPI . "/v1/member/notification/delete_byid?notif_id=".$notif."&type=post";
        }elseif ($type="subscribe"){
            $url=URLAPI . "/v1/member/notification/delete_byid?notif_id=".$notif."&type=subscribe";
        }elseif($type="tip"){
            $url=URLAPI . "/v1/member/notification/delete_byid?notif_id=".$notif."&type=tip";
        }
        $result = apiciaklive($url);
        redirect("notification");
    }
}
