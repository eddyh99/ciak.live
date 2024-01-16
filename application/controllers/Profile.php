<?php
/*----------------------------------------------------------
    Modul Name  : Modul Profile
    Desc        : Modul ini di gunakan untuk Profile pada sisi
                  Member

    Sub fungsi  : 
        - index                     : Tampilan halaman profile
        - load_more_profile_public  : Infinite load profile type public
        - load_more_profile_private : Infinite load profile type private
        - load_more_profile_special : Infinite load profile type special
        - load_more_profile_download: Infinite load profile type download

        - guest_profile             : berfungsi masuk ke dalam profile guest
        - load_more_guest_public    : Infinite load guest type public
        - load_more_guest_private   : Infinite load guest type private
        - load_more_guest_special   : Infinite load guest type special
        - load_more_guest_download  : Infinite load guest type download

        - follow            : Proses follow atau unfollow pada guest 
        - guest_note        : Tampilan halaman guest note
        - savenote          : proses menyimpan note guest
        - setting_profile   : Tampilan halaman Edit profile member
        - saveprofile       : berfungsi proses menyimpan hasil edit profil
        - setting_price     : berfungsi proses mengedit pada subcription member 
        - setting_promotion : berfungsi proses mengedit promosi member
        
------------------------------------------------------------*/ 

defined('BASEPATH') or exit('No direct script access allowed');
use gimucco\TikTokLoginKit;
use Instagram\FacebookLogin\FacebookLogin;
use Instagram\AccessToken\AccessToken;
use Instagram\User\User;
use Instagram\Page\Page;
use Instagram\User\Media;
use Instagram\User\MediaPublish;



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
        $maxpost = apiciaklive(URLAPI . "/v1/member/post/getmax_memberpost");


        // echo "<pre>".print_r($result,true)."</pre>";
		// die;
        // print_r(json_encode($post));
        
        $data = array(
            'title'         => NAMETITLE . ' - Profile',
            'content'       => 'apps/member/profile/app-profile',
            'profile'       => $result,
            'botbar'        => 'apps/member/app-botbar',
            'popup'         => 'apps/member/app-popup',
            'allpost'       => $post,
            'max_post'      => $maxpost->message,
            'mn_profile'    => 'active',
            'extra'         => 'apps/member/profile/js/_js_settings_profile',
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function convert_heic(){
        $image  = $_FILES["image"]["tmp_name"];
        $heictojpg = new Maestroerror\HeicToJpg(); 
        $jpg = $heictojpg->convert($image)->get();
        echo 'data:image/jpg;base64,' . base64_encode($jpg);
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

    public function user($ucode=NULL)
    {
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
        $maxpost = apiciaklive(URLAPI . "/v1/member/post/getmax_memberpost?ucode=".$ucode);


    
	    // echo "<pre>".print_r($profile,true)."</pre>";
        // print_r(json_encode($profile));
        // die;

        $data = array(
            'title'         => NAMETITLE . ' - Guest Profile',
            'content'       => 'apps/member/profile/guest-profile',
            'botbar'        => 'apps/member/app-botbar',
            'popup'         => 'apps/member/app-popup-guest',
            'profile'       => $profile,
            'guestpost'     => $post,
            'ucodeguest'    => @$ucode,
            'max_post'      => $maxpost->message,
            'extra'         => 'apps/member/profile/js/_js_guest',
        );

        $this->load->view('apps/template/wrapper-member', $data);
    }

    public function load_more_guest_public($ucode, $id)
    {
        $data['guestpost'] = apiciaklive(URLAPI . "/v1/member/post/get_memberpost?ucode=".$ucode."&page=".$id)->message;
        $this->load->view('apps/member/loadcontent/guest/load-guest-public', $data);
    }

    public function load_more_guest_private($ucode, $id)
    {
        $data['guestpost'] = apiciaklive(URLAPI . "/v1/member/post/get_memberpost?ucode=".$ucode."&page=".$id)->message;
        $this->load->view('apps/member/loadcontent/guest/load-guest-private', $data);
    }

    public function load_more_guest_special($ucode, $id)
    {
        $data['guestpost'] = apiciaklive(URLAPI . "/v1/member/post/get_memberpost?ucode=".$ucode."&page=".$id)->message;
        $this->load->view('apps/member/loadcontent/guest/load-guest-special', $data);
    }

    public function load_more_guest_download($ucode, $id)
    {
        $data['guestpost'] = apiciaklive(URLAPI . "/v1/member/post/get_memberpost?ucode=".$ucode."&page=".$id)->message;
        $this->load->view('apps/member/loadcontent/guest/load-guest-download', $data);
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
        $pricing = apiciaklive(URLAPI . "/v1/member/subscription/getPrice?userid=".$_SESSION["user_id"])->message;
        //    echo "<pre>".print_r($pricing,true)."</pre>";
	    // 	die;
        $data = array(
            'title'         => NAMETITLE . ' - Setting Profile',
            'profile'       => $profile->message,
            'rtmp'          => $rtmp,
            'pricing'       => $pricing,
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
            $comment        = @$this->security->xss_clean($this->input->post("comment"));
            $shareprofile   = @$this->security->xss_clean($this->input->post("shareprofile"));
            $shareemail     = @$this->security->xss_clean($this->input->post("shareemail"));
            $sharecontact   = @$this->security->xss_clean($this->input->post("sharecontact"));
            $imgpp          = $this->security->xss_clean($this->input->post("imgpp"));
            $imgbanner      = $this->security->xss_clean($this->input->post("imgbanner"));

        }

    //   echo "INI COMMENT : " . $comment;


        $mdata=array(
                "userid"    => $_SESSION["user_id"],
                "username"  => $username,
                "firstname" => $firstname,
                "surename"  => $surename,
                "bio"       => $bio,
                "web"       => $web,
                "email"     => $email,
                "contact"   => $phone,
                "is_comment"=> (@$comment=="yes")?"yes":"no",
                "is_share"  => (@$shareprofile=="yes")?"yes":"no",
                "is_emailshare"     => (@$shareemail=="yes")?"yes":"no",
                "is_kontakshare"    => (@$sharecontact=="yes")?"yes":"no",
                "profile"   => $imgpp,
                "header"    => $imgbanner 
            );
            
        
        // echo "<pre>".print_r($mdata,true)."</pre>";
        // die;
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
        $triallong  = @$this->security->xss_clean($this->input->post("triallong"));
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
        echo json_encode($result);
        // echo "<pre>".print_r($result,true)."</pre>";
		// die;
		// if (@$result->code!=200){
		//     $this->session->set_flashdata("failed","Failed update subscription, please try again later");
		//     redirect("profile/setting_price");
		// }
        // redirect("profile");
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
        
        $balance    = apiciaklive(URLAPI . "/v1/member/wallet/getBalance?currency=USDX&userid=" . $_SESSION["user_id"])->message->balance;
        $price      = apiciaklive(URLAPI . "/v1/member/subscription/getPrice?userid=".$subscribe_id)->message;

        if (($jenis=="sub7") && ($balance-$price->sub7)<0){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
		            "success"   => false,
		            "message"   => "Insufficient USDX funds"
		        );
		    echo json_encode($message);
    	    die;
        }elseif (($jenis=="sub30") && ($balance-$price->sub30)<0){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
		            "success"   => false,
		            "message"   => "Insufficient USDX funds"
		        );
		    echo json_encode($message);
    	    die;
        }elseif (($jenis=="sub365") && ($balance-$price->sub365)<0){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
		            "success"   => false,
		            "message"   => "Insufficient USDX funds"
		        );
		    echo json_encode($message);
    	    die;
        }elseif (($jenis=="trial") && ($balance-$price->trial)<0){
            header("HTTP/1.0 406 Not Acceptable");
            $message=array(
		            "success"   => false,
		            "message"   => "Insufficient USDX funds"
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
        // redirect("profile/guest_profile/".$subscribe_id);
        // redirect('profile/guest_profile/'.$subscribe_id);
        
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
    
    public function get_content_type_guest($id)
    {
        $explicit = $_GET['type'];

        if($explicit == 'explicit'){
            setcookie('content', 'yes', time()+3600*24*365*10, '/');
            redirect("profile/guest_profile/".$id);
        }else{
            setcookie('content', 'no', time()+3600*24*365*10, '/');
            redirect("profile/guest_profile/".$id);
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
    
    public function instagram_post(){
        $token='EAAOOF3WMW4sBO34aM0igZB0MUoDBlpc7ZAZA75DOrWJZAado1UDMO5ZAeRceUsQuevir9DgtTmdquGZAKMRABAAh90KitQyzE5gLkK4hwDhZC1FpzkuiD0ebLpSIBhxSSXltZAURVJTtEWrKFOqWapxmeUwMf27AGG32mQOQUCwXE3QU1quPhWOk4jSgdEqNlvXw';
        $config = array( // instantiation config params
            'access_token' => $token,
        );

        // instantiate and get the users info
        $user = new User( $config );
        
        // get the users pages
        $pages = $user->getUserPages();
        
        $config = array( // instantiation config params
            'user_id' => '105985289275436',
            'access_token' => $token,
        );
        
        // instantiate user for use
        $user = new User( $config );
        
        // get user info
        $userInfo = $user->getSelf();
        echo "<pre>".print_r($userInfo,true)."</pre>";
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
                'instagram_basic',
                'instagram_content_publish', 
                'instagram_manage_insights', 
                'instagram_manage_comments',
                'pages_show_list', 
                'ads_management', 
                'business_management', 
                'pages_read_engagement'                
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
        		redirect(base_url()."profile/instagram_post/".$newtoken);
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
    
    public function instagram_link()
    {

        
         $appId = '1000656337656715';
         $appSecret = 'f116694de32707cbae9c56dc08496057';

         $config = array( // instantiation config params
            'app_id' => $appId, // facebook app id
            'app_secret' => $appSecret, // facebook app secret
        );


        // uri facebook will send the user to after they login
        $redirectUri = 'https://ciak.live.local/profile/instagram_link';

        if(isset($_GET['code'])){
            
            // instantiate our access token class
            $accessToken = new AccessToken( $config );
            
            // exchange our code for an access token
            $newToken = $accessToken->getAccessTokenFromCode( $_GET['code'], $redirectUri );
                    
            if ( !$accessToken->isLongLived() ) { // check if our access token is short lived (expires in hours)
                // exchange the short lived token for a long lived token which last about 60 days
                $newToken = $accessToken->getLongLivedAccessToken( $newToken['access_token'] );
            } 

            // echo "<pre>".print_r($newToken,true)."</pre>";
            // die;
            $this->session->set_userdata('token_ig', $newToken['access_token']);
   
        } else {


            
            $permissions = array( // permissions to request from the user
                'instagram_basic',
                'instagram_content_publish', 
                'instagram_manage_insights', 
                'instagram_manage_comments',
                'pages_show_list', 
                'ads_management', 
                'business_management', 
                'pages_read_engagement'
            );
            
            // instantiate new facebook login
            $facebookLogin = new FacebookLogin( $config );
            
            // display login dialog link
            echo '<a href="' . $facebookLogin->getLoginDialogUrl( $redirectUri, $permissions ) . '">' .
                'Log in with Facebook' .
            '</a>';
        }
    }

    public function instagram_bussines_userid()
    {
        $config = array( // instantiation config params
            'access_token' => $_SESSION['token_ig'],
        );

        // instantiate and get the users info
        $user = new User( $config );

        // get the users pages
        $pages = $user->getUserPages();



        $config = array( // instantiation config params
            'page_id' => '105985289275436',
            'access_token' => $_SESSION['token_ig'],
        );

        // instantiate page        
        $page = new Page( $config );

        // get info
        $pageInfo = $page->getSelf();

        echo "<pre>".print_r( $pageInfo ,true)."</pre>";
        die;

    }

    public function instagram_userprofile()
    {
        $config = array( // instantiation config params
            'user_id' => '17841460858921256',
            'access_token' => $_SESSION['token_ig'],
        );
        
        // instantiate user for use
        $user = new User( $config );
        
        // get user info
        $userInfo = $user->getSelf();

        echo "<pre>".print_r( $userInfo ,true)."</pre>";
        die;
    }

    public function instagram_post_container()
    {

        $config = array( // instantiation config params
            'user_id' => '17841460858921256',
            'access_token' => $_SESSION['token_ig'],
        );

        // instantiate user media
        $media = new Media( $config );

        $imageContainerParams = array( // container parameters for the image post
            'caption' => 'First Post', // caption for the post
            'image_url' => 'https://api.ciak.live/users/posts/8qm8k38-170247971701.jpg', // url to the image must be on a public server
        );

        // create image container
        $imageContainer = $media->create( $imageContainerParams );

        // get id of the image container
        $imageContainerId = $imageContainer['id'];
        echo "<pre>".print_r( $imageContainerId ,true)."</pre>";
        die;
    }

    public function instagram_post_publish()
    {
        $config = array( // instantiation config params
            'user_id' => '17841460858921256',
            'access_token' => $_SESSION['token_ig'],
        );

        // instantiate media publish
        $mediaPublish = new MediaPublish( $config );

        // post our container with its contents to instagram
        $publishedPost = $mediaPublish->create( '18017633344982291' );
        echo "<pre>".print_r( $publishedPost ,true)."</pre>";
        die;
    }


    // public function instagram_link()
    // {

    //     $adapter = new Hybridauth\Provider\Instagram( [
    //         'callback' => base_url().'profile/instagram_link',
    //         'keys'     => [
    //                         'id' => '6971869409595981',
    //                         'secret' => 'cc0e34d4588fda302daf7aa3b1310de3',
    //                         'default_graph_version' => 'v5.0',
    //                     ],
    //     ]);

    //     try {
    //         $adapter->authenticate();
    //         $token = $adapter->getAccessToken();
    //         $userProfile = $adapter->getUserProfile();
    //         // $userPage = $adapter->getUserPages();

    //         // print_r(json_encode($userProfile));
    //         echo "token : " . $token['access_token'];
    //         echo "<br>";
    //         echo "User Name : " . $userProfile->displayName;
    //         echo "<br>";
    //         echo "Photo URL : " . $userProfile->profileURL;
    //         // echo "<br>";
    //         // echo "USER ID : " . $userProfile->identifier;
    //         // echo "<br>";
    //         // echo "USER ID CONTACT : " . $userProfileContact->identifier;
    //         die;
    //     }
    //     catch( Exception $e ){
    //         echo "ERROR DISINI";
    //         echo $e->getMessage() ;
    //     }
    // }

    public function linkedin_link()
    {
        $adapter = new Hybridauth\Provider\LinkedIn( [
            'callback' => base_url().'profile/linkedin_link',
            'keys'     => [
                            'id' => '86hzwlo2nhnklx',
                            'secret' => 'LMzMTFfhCcOzVvIx'
                        ],
            'scope'    => "openid profile email r_liteprofile",
        ]);

        // ACCESS TOKEN
        // getAccessToken()

        try {
            $adapter->authenticate();
            $token = $adapter->getAccessToken();
            // $userProfile = $adapter->getUserProfile();

            // print_r(json_encode($userProfile));
            echo "token : " . $token['access_token'];
            // echo "USER PROFILE : " . $userProfile;
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

        $_TK = new TikTokLoginKit\Connector($api_key, $api_secret, $redirect_uri);

        // echo "<pre>".print_r($_TK,true)."</pre>";
        // die;
        // $_TK = new TikTokLoginKit($api_key, $api_secret, $redirect_uri);
        

        if (TikTokLoginKit\Connector::receivingResponse()) { // Check if you're receiving the Authorisation Code
            try {
                $token = $_TK->verifyCode($_GET[TikTokLoginKit\Connector::CODE_PARAM]); // Verify the Authorisation code and get the Access Token
                /****  Your logic to store the access token goes here ****/
                
                $user = $_TK->getUser(); // Retrieve the User Object
                // echo "<pre>".print_r($token->getAccessToken(),true)."</pre>";
                // echo "<br>";
                // echo "<pre>".print_r($user->getOpenID(),true)."</pre>";
                // die;
                // echo "<pre>".print_r($user,true)."</pre>";
                // die;
        
                /****  Your logic to store or use the User Info goes here ****/
        
                // Print some HTML as example
                echo <<<HTML
                <table width="500">
                    <tr>
                        <td with="200"><img src="{$user->getAvatar()}"></td>
                        <td>
                            <br />
                            <strong>Open ID</strong>: {$token->getOpenId()}<br /><br />
                            <strong>ACCESS TOKEN</strong>: {$token->getAccessToken()}<br /><br />
                        </td>
                    </tr>
                </table>
                HTML;
            } catch (Exception $e) {
                echo "Error: ".$e->getMessage();
                echo '<br /><a href="?">Retry</a>';
            }
        } else { // Print the initial login button that redirects to TikTok
            redirect($_TK->getRedirect());
            // echo '<a href="'.$_TK->getRedirect().'">Log in with TikTok</a>';
        }
    }
}
