<?php
/*----------------------------------------------------------
    Modul Name  : Modul Profile
    Desc        : Modul ini di gunakan untuk Profile pada sisi
                  Member

    Sub fungsi  : 
        - guest_profile     : berfungsi masuk ke dalam profile guest
        - setting_profile   : berfungsi mengedit profile member
        - saveprofile       : berfungsi menyimpan hasil edit profil
        - setting_price     : berfungsi mengedit pada subcription member 
        - setting_promotion : berfungsi mengedit promosi member
        
------------------------------------------------------------*/ 

defined('BASEPATH') or exit('No direct script access allowed');
use gimucco\TikTokLoginKit;

class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$path=explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        if (!$this->session->userdata('user_id') && ($path[2]!='user') && ($path[2]!='post')) {
            redirect('/');
        }
	}

    public function index()
    {
        $_SESSION["path"]="profile";

    	$url = URLAPI . "/v1/member/profile/getProfile?userid=".$_SESSION["user_id"];
		$result = apiciaklive($url)->message;
		$post = apiciaklive(URLAPI . "/v1/member/post/get_memberpost?page=1")->message;
        // echo "<pre>".print_r($post,true)."</pre>";
		// die;
        // print_r(json_encode($post));
        
        $data = array(
            'title'         => NAMETITLE . ' - Profile',
            'content'       => 'apps/member/profile/app-profile',
            'profile'       => $result,
            'botbar'        => 'apps/member/app-botbar',
            'popup'         => 'apps/member/app-popup',
            'allpost'       => $post,
            'mn_profile'    => 'active',
            'extra'         => 'apps/member/profile/js/_js_settings_profile',
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function load_more_profile_public($id)
    {
        $data['allpost'] = apiciaklive(URLAPI . "/v1/member/post/get_memberpost?page=".$id)->message;
        $data['profile'] = apiciaklive(URLAPI . "/v1/member/profile/getProfile?userid=".$_SESSION["user_id"])->message;
        $this->load->view('apps/member/loadcontent/profile/load-profile-public', $data);
    }

    public function load_more_profile_private($id)
    {
        $data['allpost'] = apiciaklive(URLAPI . "/v1/member/post/get_memberpost?page=".$id)->message;
        $data['profile'] = apiciaklive(URLAPI . "/v1/member/profile/getProfile?userid=".$_SESSION["user_id"])->message;
        $this->load->view('apps/member/loadcontent/profile/load-profile-private', $data);
    }

    public function load_more_profile_special($id)
    {
        $data['allpost'] = apiciaklive(URLAPI . "/v1/member/post/get_memberpost?page=".$id)->message;
        $data['profile'] = apiciaklive(URLAPI . "/v1/member/profile/getProfile?userid=".$_SESSION["user_id"])->message;
        $this->load->view('apps/member/loadcontent/profile/load-profile-special', $data);
    }

    public function load_more_profile_download($id)
    {
        $data['allpost'] = apiciaklive(URLAPI . "/v1/member/post/get_memberpost?page=".$id)->message;
        $data['profile'] = apiciaklive(URLAPI . "/v1/member/profile/getProfile?userid=".$_SESSION["user_id"])->message;
        $this->load->view('apps/member/loadcontent/profile/load-profile-download', $data);
    }

    
    public function user($ucode=NULL){
        $url = URLAPI . "/auth/getmember_byucode?ucode=".$ucode;
		$result = apiciaklive($url);
        //cek if failed arahin halaman 404 untuk login dan ada tombol untuk register/login

        if (@$_SESSION["user_id"]==$result->message->id){
            redirect("profile");
        }elseif (!empty($_SESSION["user_id"])){
            redirect("profile/guest_profile/".$ucode);
        }
		$ref = @$result->message->refcode;
		$this->input->set_cookie("ref", @$ref, time()+60 * 60 * 24);

        $data = array(
            'title'         => NAMETITLE . ' - Profile',
            'content'       => 'apps/member/profile/app-public-profile',
            'profile'       => $result->message,
            'extra'         => 'apps/member/profile/js/_js_settings_profile',
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function guest_profile($ucode)
    {
        if ($ucode==$_SESSION["ucode"]){
            redirect("profile");
        }
		$profile                 = (array) apiciaklive(URLAPI . "/auth/getmember_byucode?ucode=".$ucode)->message;

        $profile["is_follow"]    = apiciaklive(URLAPI . "/v1/member/profile/is_follow?follow_id=".$profile["id"])->message;
        $profile["is_block"]     = apiciaklive(URLAPI . "/v1/member/profile/is_block?block_id=".$profile["id"])->message;
        $profile["is_blocked"]   = apiciaklive(URLAPI . "/v1/member/profile/is_blocked?block_id=".$profile["id"])->message;
        $profile["dayleft"]      = apiciaklive(URLAPI . "/v1/member/subscription/days_subscribe?follow_id=".$profile["id"])->message;
        $profile["price"]        = apiciaklive(URLAPI . "/v1/member/subscription/getPrice?userid=".$profile["id"])->message;
        $post = apiciaklive(URLAPI . "/v1/member/post/get_memberpost?ucode=".$ucode."&page=1")->message;
	    // echo "<pre>".print_r($post,true)."</pre>";
        // die;
	    // print_r(json_encode($post));
        // die;

        $data = array(
            'title'         => NAMETITLE . ' - Guest Profile',
            'content'       => 'apps/member/profile/guest-profile',
            'botbar'        => 'apps/member/app-botbar',
            'popup'         => 'apps/member/app-popup-guest',
            'profile'       => $profile,
            'guestpost'     => $post,
            'extra'         => 'apps/js/js-index',
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function load_more_guest_public($ucode, $id)
    {
        $data['guestpost'] = apiciaklive(URLAPI . "/v1/member/post/get_memberpost?ucode=".$ucode."&page=".$id)->message;
        // $data['profile'] = apiciaklive(URLAPI . "/v1/member/profile/getProfile?userid=".$_SESSION["user_id"])->message;
        $this->load->view('apps/member/loadcontent/profile/load-guest-public', $data);
    }

  
    
    public function follow(){
        $input      = $this->input;
        $status     = $this->security->xss_clean($this->input->post("status"));
        $follow_id  = $this->security->xss_clean($this->input->post("follow_id"));
        if ($status=="Unfollow"){
            $url = URLAPI . "/v1/member/profile/remove_follow?follow_id=".$follow_id;
        }else{
            $url = URLAPI . "/v1/member/profile/add_follow?follow_id=".$follow_id;
        }
	    $result = apiciaklive($url);
	    if ($result->code!=200){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
    	            "success"   => false,
    	            "message"   => $result->message
    	        );
    	    echo json_encode($message);
    	    die;
        }
        $message=array(
	            "success"   => true,
	            "message"   => true
	        );
	    echo json_encode($message);
    }
    
    public function guest_note($ucode)
    {

        $url = URLAPI . "/v1/member/profile/getguestNote?ucode=".$ucode;
		$result = apiciaklive($url);
		// print_r($result);
		// die;
        $data = array(
            'title'         => NAMETITLE . ' - Guest Note',
            'content'       => 'apps/member/profile/guest-note',
            'botbar'        => 'apps/member/app-botbar',
            'popup'         => 'apps/member/app-popup',
            'extra'         => 'apps/member/profile/js/_js_guest_note',
            'cssextra'      => 'apps/member/profile/css/_css_guest_note',
            'ucode'         => $ucode,
            'note'          => @$result->message
        );
        
        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function savenote(){
        $input      = $this->input;
        $this->form_validation->set_rules('guest_ucode', 'ucode', 'trim|required');
        $this->form_validation->set_rules('guestnote', 'Guest Note', 'trim|required');

        $ucode      = $this->security->xss_clean($this->input->post("guest_ucode"));
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("error","Something error, please try again later");
            redirect("profile/guest_note/".$ucode);
            return;
        }

        $guestnote  = $this->security->xss_clean($this->input->post("guestnote"));
        $mdata=array(
                "ucode"     => $ucode,
                "guestnote" => $guestnote
            );
    	$url = URLAPI . "/v1/member/profile/setguestNote";
		$result = apiciaklive($url,json_encode($mdata));
        redirect("profile/guest_note/".$ucode);
    }
    
    
    public function setting_profile()
    {
        
    	$profile = apiciaklive(URLAPI . "/v1/member/profile/getProfile?userid=".$_SESSION["user_id"]);
        $rtmp   = apiciaklive(URLAPI . "/v1/member/perform/get_rtmp")->message;

   	    // echo "<pre>".print_r($profile,true)."</pre>";
        // die;
        
        $data = array(
            'title'         => NAMETITLE . ' - Setting Profile',
            'profile'       => $profile->message,
            'rtmp'          => $rtmp,
            'content'       => 'apps/member/profile/app-setting-profile',
            'popup'         => 'apps/member/app-popup',
            'cssextra'      => 'apps/member/profile/css/_css_settings_profile',
            'extra'         => 'apps/member/profile/js/_js_settings_profile',
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }
    
    public function setting_profile_data()
    {
                
    	$url = URLAPI . "/v1/member/profile/getProfile?userid=".$_SESSION["user_id"];
		$result = apiciaklive($url);
        echo json_encode($result->message);
    }

    public function saveprofile(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
			redirect("profle/setting_profile");
			return;
		} else {
            $input          = $this->input;
            $username       = $this->security->xss_clean($this->input->post("username"));
            $firstname      = $this->security->xss_clean($this->input->post("firstname"));
            $surename       = $this->security->xss_clean($this->input->post("surename"));
            $bio            = $this->security->xss_clean($this->input->post("bio"));
            $web            = $this->security->xss_clean($this->input->post("web"));
            $email          = $this->security->xss_clean($this->input->post("email"));
            $phone          = $this->security->xss_clean($this->input->post("phone"));
            $comment        = $this->security->xss_clean($this->input->post("comment"));
            $shareprofile   = $this->security->xss_clean($this->input->post("shareprofile"));
            $shareemail     = $this->security->xss_clean($this->input->post("shareemail"));
            $sharecontact   = $this->security->xss_clean($this->input->post("sharecontact"));
            $imgpp          = $this->security->xss_clean($this->input->post("imgpp"));
            $imgbanner      = $this->security->xss_clean($this->input->post("imgbanner"));

        }

        $mdata=array(
                "userid"    => $_SESSION["user_id"],
                "username"  => $username,
                "firstname" => $firstname,
                "surename"  => $surename,
                "bio"       => $bio,
                "web"       => $web,
                "email"     => $email,
                "contact"   => $phone,
                "is_comment"=> ($comment=="yes")?"yes":"no",
                "is_share"  => ($shareprofile=="yes")?"yes":"no",
                "is_emailshare"     => ($shareemail=="yes")?"yes":"no",
                "is_kontakshare"    => ($sharecontact=="yes")?"yes":"no",
                "profile"   => $imgpp,
                "header"    => $imgbanner
            );
            
        
    	$url = URLAPI . "/v1/member/profile/setProfile";
		$result = apiciaklive($url,json_encode($mdata));

        
		if ($result->code!=200){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
    	            "success"   => false,
    	            "message"   => $result->message
    	        );

    	    echo json_encode($message);
        }
        $_SESSION["username"]=$username;

        $message=array(
	            "success"   => true,
	            "message"   => true
	        );
	    echo json_encode($message);
    }

    public function setting_price()
    {
    	$url = URLAPI . "/v1/member/subscription/getPrice?userid=".$_SESSION["user_id"];
		$result = apiciaklive($url);

        $url_profile = URLAPI . "/v1/member/profile/getProfile?userid=".$_SESSION["user_id"];
		$result_profile = apiciaklive($url_profile)->message;

        $data = array(
            'title'         => NAMETITLE . ' - Setting Subscription',
            'pricing'       => $result->message,
            'profile'       => $result_profile,
            'content'       => 'apps/member/profile/app-setting-price',
            'popup'         => 'apps/member/app-popup',
            'extra'         => 'apps/member/profile/js/_js_setting_subscription',
        
        );
        $this->load->view('apps/template/wrapper-member', $data);
    }
    
    public function savesubscription(){
        $input      = $this->input;
        $weekly     = $this->security->xss_clean($this->input->post("weekly"));
        $monthly    = $this->security->xss_clean($this->input->post("monthly"));
        $yearly     = $this->security->xss_clean($this->input->post("yearly"));
        $is_trial   = $this->security->xss_clean($this->input->post("is_trial"));
        $triallong  = $this->security->xss_clean($this->input->post("triallong"));
        $trialamount= $this->security->xss_clean($this->input->post("trialamount"));
        
        
        $mdata=array(
                "userid"    => $_SESSION["user_id"],
                "sub7"      => $weekly,
                "sub30"     => $monthly,
                "sub365"    => $yearly,
                "trial"     => ($is_trial=='yes') ? $trialamount : 0,
                "trial_long"=> ($is_trial=='yes') ? $triallong : 0,
            );
    	$url = URLAPI . "/v1/member/subscription/setSubscription";
		$result = apiciaklive($url,json_encode($mdata));
		if (@$result->code!=200){
		    $this->session->set_flashdata("failed","Failed update subscription, please try again later");
		    redirect("profile/setting_price");
		}
        redirect("profile");
    }

    public function setting_promotion()
    {

        $data = array(
            'title'         => NAMETITLE . ' - Setting Promote',
            'content'       => 'apps/member/profile/app-setting-promotion',
            'popup'         => 'apps/member/app-popup',
            'extra'         => 'apps/member/profile/js/_js_settings_profile',
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }
    
    public function subscribe(){
        $input          = $this->input;
        $subscribe_id   = $this->security->xss_clean($this->input->post('ucode'));
        $jenis          = $this->security->xss_clean($this->input->post('jenis'));
        
        $balance    = apiciaklive(URLAPI . "/v1/member/wallet/getBalance?currency=XEUR&userid=" . $_SESSION["user_id"])->message->balance;
        $price      = apiciaklive(URLAPI . "/v1/member/subscription/getPrice?userid=".$subscribe_id)->message;

        if (($jenis=="sub7") && ($balance-$price->sub7)<0){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
		            "success"   => false,
		            "message"   => "Insufficient XEUR funds"
		        );
		    echo json_encode($message);
    	    die;
        }elseif (($jenis=="sub30") && ($balance-$price->sub30)<0){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
		            "success"   => false,
		            "message"   => "Insufficient XEUR funds"
		        );
		    echo json_encode($message);
    	    die;
        }elseif (($jenis=="sub365") && ($balance-$price->sub365)<0){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
		            "success"   => false,
		            "message"   => "Insufficient XEUR funds"
		        );
		    echo json_encode($message);
    	    die;
        }elseif (($jenis=="trial") && ($balance-$price->trial)<0){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
		            "success"   => false,
		            "message"   => "Insufficient XEUR funds"
		        );
		    echo json_encode($message);
    	    die;
        }
        
        $mdata  = array(
                "subscribe_id"  => $subscribe_id,
                "jenis"         => $jenis
            );
            
        $url    = URLAPI . "/v1/member/subscription/add";
        $result = apiciaklive($url,json_encode($mdata));
        if ($result->code!=200){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
    	            "success"   => false,
    	            "message"   => $result->message
    	        );
    	    echo json_encode($message);
    	    die;
        }
        $message=array(
	            "success"   => true,
	            "message"   => true
	        );
	    echo json_encode($message);
        
    }
    
    public function givelike(){
        $input      = $this->input;
        $status     = $this->security->xss_clean($this->input->post("status"));
        $post_id    = $this->security->xss_clean($this->input->post("post_id"));
        if ($status=="like"){
            $url = URLAPI . "/v1/member/profile/add_like?post_id=".$post_id;
        }else{
            $url = URLAPI . "/v1/member/profile/remove_like?post_id=".$post_id;
        }
	    $result = apiciaklive($url);

	    if ($result->code!=200){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
    	            "success"   => false,
    	            "message"   => $result->message
    	        );
    	    echo json_encode($message);
    	    die;
        }
        $message=array(
	            "success"   => true,
	            "message"   => true
	        );
	    echo json_encode($message);
    }
    
    public function giverating(){
        $input      = $this->input;
        $star     = $this->security->xss_clean($this->input->post("star"));
        $post_id    = $this->security->xss_clean($this->input->post("post_id"));

        $url = URLAPI . "/v1/member/profile/add_star?post_id=".$post_id."&star=".$star;
	    $result = apiciaklive($url);
	    if ($result->code!=200){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
    	            "success"   => false,
    	            "is_rerate" => false,
    	            "message"   => $result->message
    	        );
    	    echo json_encode($message);
    	    die;
        }

        if ($result->message->rerate=='yes'){
            $message=array(
    	            "success"   => true,
    	            "is_rerate" => true,
    	            "message"   => true
    	        );
        }else{
            $message=array(
    	            "success"   => true,
    	            "is_rerate" => false,
    	            "message"   => true
    	        );
        }
	    echo json_encode($message);
    }
    
    public function givebookmark(){
        $input      = $this->input;
        $status     = $this->security->xss_clean($this->input->post("status"));
        $post_id    = $this->security->xss_clean($this->input->post("post_id"));
        if ($status=="bookmark"){
            $url = URLAPI . "/v1/member/profile/add_bookmark?post_id=".$post_id;
        }else{
            $url = URLAPI . "/v1/member/profile/remove_bookmark?post_id=".$post_id;
        }
	    $result = apiciaklive($url);
	    if ($result->code!=200){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
    	            "success"   => false,
    	            "message"   => $result->message
    	        );
    	    echo json_encode($message);
    	    die;
        }
        $message=array(
	            "success"   => true,
	            "message"   => true
	        );
	    echo json_encode($message);
    }
    
    public function deletepost($post_id){
        $post_id    = $this->security->xss_clean($post_id);
        $url        = URLAPI . "/v1/member/profile/delete_post?post_id=".$post_id;
        $result     = apiciaklive($url);
        if ($_SESSION["path"]=="profile"){
            redirect("profile");
        }elseif ($_SESSION["path"]=="homepage"){
            redirect("homepage");
        }
    }
    
    public function sendtips(){
        $input      = $this->input;
        $amount     = $this->security->xss_clean($this->input->post("tipsamount"));
        $id_member  = $this->security->xss_clean($this->input->post("id_membertips"));
        if ($amount<0.5){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
    	            "success"   => false,
    	            "message"   => "Minimum amount is 0.5"
    	        );
    	    echo json_encode($message);
    	    die;
        }
        
        $mdata=array(
                "receiver_id"   => $id_member,
                "amount"        => $amount
            );
        $url        = URLAPI . "/v1/member/profile/towallet";
        $result     = apiciaklive($url,json_encode($mdata));
        if ($result->code!=200){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
    	            "success"   => false,
    	            "message"   => $result->message
    	        );
    	    echo json_encode($message);
    	    die;
        }
        $message=array(
	            "success"   => true,
	            "message"   => true
	        );
	    echo json_encode($message);
    }
    
    public function reportpost($post_id,$reason){
        $post_id    = $this->security->xss_clean($post_id);
        $reason     = $this->security->xss_clean($reason);
        $url = URLAPI . "/v1/member/profile/report?post_id=".$post_id."&reason=".$reason;
        $mdata=array(
               'ipaddress'=> $this->input->ip_address()
            );
	    $result = apiciaklive($url,json_encode($mdata));
	    if ($result->code!=200){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
    	            "success"   => false,
    	            "message"   => $result->message
    	        );
    	    echo json_encode($message);
    	    die;
        }
        $message=array(
	            "success"   => true,
	            "message"   => true
	        );
	    echo json_encode($message);
    }
    
    public function blockeduser($id){
        $id_block   = $this->security->xss_clean($id);
        $url        = URLAPI . "/v1/member/profile/blocked_user?id_block=".$id_block;
	    $result     = apiciaklive($url)->message;
	    redirect ("profile/guest_profile/".$result);
    }
    
    public function unblockuser($id){
        $id_block   = $this->security->xss_clean($id);
        $url        = URLAPI . "/v1/member/profile/unblocked_user?id_block=".$id_block;
	    $result     = apiciaklive($url)->message;
	    redirect ("profile/guest_profile/".$result);
    }
    
    public function post($id){
        $post_id   = $this->security->xss_clean($id);
        if (!empty ($_SESSION["user_id"])){
            $url        = URLAPI . "/v1/member/post/get_singlepost?post_id=".$id;
        }else{
            $url        = URLAPI . "/auth/get_singlepost?post_id=".$id;
        }
	    $result     = apiciaklive($url)->message;
        // echo "<pre>".print_r($result,true)."</pre>";
        // die;
        $data = array(
            'title'         => NAMETITLE . ' - '.$result->username." Post",
            'content'       => 'apps/member/app-single-posts',
            'popup'         => 'apps/member/app-popup-single',
            'posts'         => $result,
            'extra'         => 'apps/js/js-index',
        );
        

        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function get_content_type()
    {
        $explicit = $_GET['type'];

        if($explicit == 'explicit'){
            setcookie('content', 'yes', time()+3600*24*365*10, '/');
            redirect("profile");
        }else{
            setcookie('content', 'no', time()+3600*24*365*10, '/');
            redirect("profile");
        }
    }
    
    public function youtube_link(){
        $client = new Google\Client();

        if (stripos($_SERVER['HTTP_HOST'], 'sandbox') === 0) {
            $client->setAuthConfig(FCPATH.'assets/service/youtube.json');
        } else {
            $client->setAuthConfig(FCPATH.'assets/service/youtube-prod.json');
        }
        $client->addScope(Google_Service_YouTube::YOUTUBE_FORCE_SSL);
        $client->setRedirectUri(base_url()."profile/youtube_callback");

        $client->setAccessType('offline');
        $client->setPrompt('consent');
        $client->setIncludeGrantedScopes(true);     
        
        //redirect to youtube
        $auth_url = $client->createAuthUrl();
        redirect ($auth_url);
    }
    
    public function youtube_callback(){
    
        $client = new Google\Client();
        if (stripos($_SERVER['HTTP_HOST'], 'sandbox') === 0) {
            $client->setAuthConfig(FCPATH.'assets/service/youtube.json');
        } else {
            $client->setAuthConfig(FCPATH.'assets/service/youtube-prod.json');
        }
        $client->addScope(Google_Service_YouTube::YOUTUBE_FORCE_SSL);
        $client->setRedirectUri(base_url()."profile/youtube_callback");
        $client->authenticate($_GET['code']);
        $access_token = $client->getAccessToken();
        // Check to ensure that the access token was successfully acquired.
        if ($client->getAccessToken()) {
          try {
            $youtube = new Google_Service_YouTube($client);

            $streamSnippet = new Google_Service_YouTube_LiveStreamSnippet();
            $streamSnippet->setTitle("Ciak Live Streaming");

            $cdn = new Google_Service_YouTube_CdnSettings();
            $cdn->setResolution("1080p");
            $cdn->setFrameRate("30fps");
            $cdn->setIngestionType('rtmp');

            $streamInsert = new Google_Service_YouTube_LiveStream();
            $streamInsert->setSnippet($streamSnippet);
            $streamInsert->setCdn($cdn);
            $streamInsert->setKind('youtube#liveStream');

            $liveStream = $youtube->liveStreams->insert('snippet,cdn',$streamInsert, array());

            $rtmp_address   = $liveStream->cdn->ingestionInfo->ingestionAddress."/";
            $streamkey      = $liveStream->cdn->ingestionInfo->streamName;
            
            $rtmp_address   .=$streamkey;

            $mdata=array(
                    "address_rtmp"   => $rtmp_address
                );
    
            $url        = URLAPI . "/v1/member/perform/set_streamingrtmp?rtmp=youtube";
    	    $result     = apiciaklive($url,json_encode($mdata));

            $this->session->set_flashdata('success', "Your account success connected to YouTube");
            redirect("profile/setting_profile");

          }catch(Exception $e) {
                $this->session->set_flashdata("failed","Your account not ready for live stream");
                redirect("profile/setting_profile");
            }
            
        }
    }
    
    public function facebook_link(){
        $fb = new Facebook\Facebook([
            'app_id' => '1000656337656715',
            'app_secret' => 'f116694de32707cbae9c56dc08496057',
            'default_graph_version' => 'v5.0',
        ]);
        
        $permissions = [
                'publish_video',
                'public_profile',
        ];    
        
        $helper = $fb->getRedirectLoginHelper();
        $loginUrl = $helper->getLoginUrl(base_url()."profile/facebook_callback",$permissions);
        redirect ($loginUrl);
    }
    
    public function facebook_callback(){
        $fb = new Facebook\Facebook([
            'app_id' => '1000656337656715',
            'app_secret' => 'f116694de32707cbae9c56dc08496057',
            'default_graph_version' => 'v5.0',
        ]);
        
        $helper = $fb->getRedirectLoginHelper();
        $accessToken = $helper->getAccessToken();
        
        if (isset($accessToken)) {
                $token = (string) $accessToken;
        		$oAuth2Client = $fb->getOAuth2Client();
        		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($token);
        		$newtoken= (string) $longLivedAccessToken;
        		$fb->setDefaultAccessToken($newtoken);

                $createLiveVideo = $fb->post('/me/live_videos?status=LIVE_NOW', ['title' => 'Ciak Live Streaming', 'description' => 'ciak live Streaming']);
            	$createLiveVideo = $createLiveVideo->getGraphNode()->asArray();

            	// to get live video info
            	$LiveVideo = $fb->get('/'.$createLiveVideo["id"]);
            	$LiveVideo = $LiveVideo->getGraphNode()->asArray();

                $mdata=array(
                        "address_rtmp"   => $LiveVideo["stream_url"]
                    );
        
                $url        = URLAPI . "/v1/member/perform/set_streamingrtmp?rtmp=facebook";
        	    $result     = apiciaklive($url,json_encode($mdata));

                $this->session->set_flashdata('success', "Your account success connected to Facebook");
                redirect("profile/setting_profile");
        }
    }    

    public function linkedin_link()
    {
        $adapter = new Hybridauth\Provider\LinkedIn( [
            'callback' => base_url().'profile/linkedin_link',
            'keys'     => [
                            'id' => '78q1ppp3b53hca',
                            'secret' => 'J9zKtY9bLIn5DzYS'
                        ],
            'scope'    => "openid profile email",
        ]);

        // ACCESS TOKEN
        // getAccessToken()

        try {
            $adapter->authenticate();
            $token = $adapter->getAccessToken();

            // print_r(json_encode($token['access_token']));
            echo "<pre>".print_r($token['access_token'],true)."</pre>";
            die;
        }
        catch( Exception $e ){
            echo "ERROR DISINI";
            echo $e->getMessage() ;
        }

    }



    public function tiktok_link()
    {

        $api_key = 'awgjaa9rn3qxcrp7'; // Your API Key, as obtained from TikTok Developers portal
        $api_secret = 'CBDYb1xiKjLB7s7S5ZUsBwH4TUbAA4dM'; // Your API Secret, as obtained from TikTok Developers portal
        $redirect_uri = base_url().'profile/tiktok_link'; // Where to return after authorization. Must be approved in the TikTok Developers portal

        $_TK = new TikTokLoginKit($api_key, $api_secret, $redirect_uri);
        
        echo "<pre>".print_r($_TK,true)."</pre>";
        die;

        if (TikTokLoginKit\Connector::receivingResponse()) { // Check if you're receiving the Authorisation Code
            try {
                $token = $_TK->verifyCode($_GET[TikTokLoginKit\Connector::CODE_PARAM]); // Verify the Authorisation code and get the Access Token
        
                /****  Your logic to store the access token goes here ****/
        
                $user = $_TK->getUser(); // Retrieve the User Object
        
                /****  Your logic to store or use the User Info goes here ****/
        
                // Print some HTML as example
                echo <<<HTML
                <table width="500">
                    <tr>
                        <td with="200"><img src="{$user->getAvatarLarger()}"></td>
                        <td>
                            <br />
                            <strong>ID</strong>: {$user->getOpenID()}<br /><br />
                            <strong>Name</strong>: {$user->getDisplayName()}
                        </td>
                    </tr>
                </table>
                HTML;
            } catch (Exception $e) {
                echo "Error: ".$e->getMessage();
                echo '<br /><a href="?">Retry</a>';
            }
        } else { // Print the initial login button that redirects to TikTok
            echo '<a href="'.$_TK->getRedirect().'">Log in with TikTok</a>';
        }
    }
}
