<?php

/*----------------------------------------------------------
    Modul Name  : Modul Homepage
    Desc        : Modul ini di gunakan untuk segala aktivitas di homepage
                  atau halaman beranda

    Sub fungsi  : 
    - index    	        : Tampilan halaman beranda member ciak
    - load_more         : Proses Infite Scroll load page.
    - recomend_friends  : Tampilan Recomend member ketika pertama kali login.
    - get_content_type  : Proses Direct segment dengan cookie untuk mendapatkan content explicit dan non 
------------------------------------------------------------*/ 


defined('BASEPATH') or exit('No direct script access allowed');

class Homepage extends CI_Controller
{

    public function index()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/form_login');
        }
        
        $_SESSION["path"]="homepage";

		$nonfollow = apiciaklive(URLAPI . "/v1/member/home/randomuser");
		$post = apiciaklive(URLAPI . "/v1/member/post/getall_post?page=1");
        $notif = apiciaklive(URLAPI . "/v1/member/notification/getnotif");
        $notifmsg = apiciaklive(URLAPI . "/v1/member/notification/chat_notif");
        $maxpage = apiciaklive(URLAPI . "/v1/member/post/getmax_page");

        //print_r(json_encode($post->message));
        // echo "<pre>".print_r($_SESSION,true)."</pre>";
        // die;
        $data = array(
            'title'         => NAMETITLE . ' - Homepage',
            'content'       => 'apps/member/app-index',
            'botbar'        => 'apps/member/app-botbar',
            'popup'         => 'apps/member/app-popup-homepage',
            'post'          => 'apps/member/app-posts',
            'nonfollow'     => @$nonfollow->message,
            'allpost'       => @$post->message,
            'notif'         => @$notif->message,
            'notifmsg'      => @$notifmsg->message,
            'max_page'      => @$maxpage->message, 
            'mn_home'       => 'active',
            'extra'         => 'apps/js/js-index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }
    
    public function ceknotif_chat(){
        $notifmsg = apiciaklive(URLAPI . "/v1/member/notification/chat_notif");
        echo json_encode($notifmsg);
    }

    public function load_more($id)
    {
        $data['allpost'] = apiciaklive(URLAPI . "/v1/member/post/getall_post?page=".$id)->message;
        $this->load->view('apps/member/loadcontent/load-homepage', $data);
    }

    public function recomend_friends()
    {
        $data = [
            'title' => NAMETITLE . ' - Search Friend',
            'content' => 'apps/member/app-recomend-friends',
            'popup' => 'apps/member/app-popup',
            'extra' => 'apps/js/js-index',
        ];
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function get_content_type()
    {
        $explicit = $_GET['type'];

        if($explicit == 'explicit'){
            setcookie('content', 'yes', time()+3600*24*365*10, '/');
            redirect("homepage");
        }else{
            setcookie('content', 'no', time()+3600*24*365*10, '/');
            redirect("homepage");
        }
    }

    // public function get_stitch_content()
    // {
    //     $posts = apiciaklive(URLAPI . "/v1/member/post/getall_post?page=1")->message;
    //     $stitchs = apiciaklive(URLAPI . "/v1/member/post/getall_post?page=1")->message;

    //     $stitch_temp = [];
    //     foreach($stitchs as $stitch){
    //         if(!empty($stitch->id_stitch)){
    //             $stitch_temp = $stitch; 
    //         }
    //     }

        // foreach($stitch_temp as $dt){
        //     echo $dt;
        // }
    //     echo "<pre>".print_r($stitch_temp,true)."</pre>";
    // }


}
