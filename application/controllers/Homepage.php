<?php
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
    
    
        //print_r(json_encode($post->message));
        // echo "<pre>".print_r($post,true)."</pre>";
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
            'mn_home'       => 'active',
            'extra'         => 'apps/js/js-index',
        );
        $this->load->view('apps/template/wrapper-member', $data);
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
