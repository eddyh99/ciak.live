<?php
/*----------------------------------------------------------
    Modul Name  : Modul Statistic
    Desc        : Modul ini di gunakan untuk Profile melihat
                  List dari Subscriber dan lainnya

    Sub fungsi  : 
        - subscription      : Untuk mengetahui subscription member
        - subscriber        : Untuk mengetahui subscriber member
        - following         : Untuk mengetahui siapa saja yang memfollow member
        - followers         : Untuk mengetahui siapa saja yang member follow
        - bookmarks         : Untuk mengetahui siapa saja yang member bookmarks
        - blocked            : Untuk mengetahui siapa saja yang member Block

        
------------------------------------------------------------*/ 

defined('BASEPATH') or exit('No direct script access allowed');

class Statistic extends CI_Controller
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
        $statistik   = apiciaklive(URLAPI . "/v1/member/profile/getstatistik")->message;
        //echo '<pre>'.print_r($statistik,true)."</pre>";
        //die;
        $data = array(
            'title'         => NAMETITLE . ' - Statistic',
            'content'       => 'apps/member/statistic/app-statistic',
            'botbar'        => 'apps/member/app-botbar',
            'popup'         => 'apps/member/app-popup',
            'statistik'     => $statistik,
            'mn_statistic'  => 'active',
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function category()
    {
        $category   = apiciaklive(URLAPI . "/v1/member/profile/getlist_category")->message;
        // echo '<pre>'.print_r($category,true)."</pre>";
        // print_r(json_encode($category));
        // die;

        $data = array(
            'title'         => NAMETITLE . ' - Category List',
            'content'       => 'apps/member/statistic/app-detail',
            'botbar'        => 'apps/member/app-botbar',
            'popup'         => 'apps/member/app-popup',
            'mn_statistic'  => 'active',
            'cssextra'      => 'apps/member/statistic/css/_css_detail',
            'detail'        => 'Category List',
            'category'      => $category,
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }
    
    public function subscription()
    {
        $subscription   = apiciaklive(URLAPI . "/v1/member/subscription/getlist_subscription")->message;
        // echo '<pre>'.print_r($subscription,true)."</pre>";
        // die;

        $data = array(
            'title'         => NAMETITLE . ' - Subscription',
            'content'       => 'apps/member/statistic/app-detail',
            'botbar'        => 'apps/member/app-botbar',
            'popup'         => 'apps/member/app-popup',
            'mn_statistic'  => 'active',
            'detail'        => 'Subscription',
            'subscription'  => $subscription,
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function subscriber()
    {
        $subscriber   = apiciaklive(URLAPI . "/v1/member/subscription/getlist_subscriber")->message;
        // echo '<pre>'.print_r($subscriber,true)."</pre>";
        // die;
        $data = array(
            'title'         => NAMETITLE . ' - Subscriber',
            'content'       => 'apps/member/statistic/app-detail',
            'botbar'        => 'apps/member/app-botbar',
            'popup'         => 'apps/member/app-popup',
            'mn_statistic'  => 'active',
            'detail'        => 'Subscriber',
            'subscriber'    => $subscriber,
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function following()
    {
        $following   = apiciaklive(URLAPI . "/v1/member/follow/getlist_following")->message;

        $data = array(
            'title'         => NAMETITLE . ' - Following',
            'content'       => 'apps/member/statistic/app-detail',
            'botbar'        => 'apps/member/app-botbar',
            'popup'         => 'apps/member/app-popup',
            'mn_statistic'  => 'active',
            'extra'         => 'apps/js/js-index',
            'detail'        => 'Following',
            'following'     => $following,
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }
    
    public function followers()
    {
        $followers   = apiciaklive(URLAPI . "/v1/member/follow/getlist_follower")->message;
        // echo '<pre>'.print_r($followers,true)."</pre>";
        // die;

        $data = array(
            'title'         => NAMETITLE . ' - Followers',
            'content'       => 'apps/member/statistic/app-detail',
            'botbar'        => 'apps/member/app-botbar',
            'popup'         => 'apps/member/app-popup',
            'mn_statistic'  => 'active',
            'extra'         => 'apps/js/js-index',
            'detail'        => 'Followers',
            'followers'     => $followers,
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function bookmarks()
    {
        $bookmarks   = apiciaklive(URLAPI . "/v1/member/bookmark/getlist_bookmark")->message;
        // echo '<pre>'.print_r($bookmarks,true)."</pre>";
        // die;

        $data = array(
            'title'         => NAMETITLE . ' - Bookmarks',
            'content'       => 'apps/member/statistic/app-detail',
            'botbar'        => 'apps/member/app-botbar',
            'popup'         => 'apps/member/app-popup',
            'mn_statistic'  => 'active',
            'extra'         => 'apps/js/js-index',
            'detail'        => 'Bookmarks',
            'bookmarks'     => $bookmarks,
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function blocked()
    {
        $blocked   = apiciaklive(URLAPI . "/v1/member/profile/getlist_blocked")->message;
        // echo '<pre>'.print_r($blocked,true)."</pre>";
        // die;

        $data = array(
            'title'         => NAMETITLE . ' - Blocked Users',
            'content'       => 'apps/member/statistic/app-detail',
            'botbar'        => 'apps/member/app-botbar',
            'popup'         => 'apps/member/app-popup',
            'mn_statistic'  => 'active',
            'extra'         => 'apps/js/js-index',
            'detail'        => 'Blocked Users',
            'blocked'       => $blocked,
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }
    
    public function removenote($ucode){
        $blocked   = apiciaklive(URLAPI . "/v1/member/profile/remove_note?ucode=".$ucode)->message;
        redirect('statistic/category');
    }

}
